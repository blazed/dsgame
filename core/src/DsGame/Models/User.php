<?php

namespace DsGame\Models;

use Illuminate\Auth\UserInterface;
use Auth;
use Config;
use Hash;
use Mail;

class User extends Base implements UserInterface
{

    protected $table = 'users';

    const GUEST = 1;

    public static function current()
    {
        static $current = null;

        if (Auth::guest())
        {
            if (!isset($current)) {
                $current = new Guest;
            }

            return $current;
        }

        return Auth::user();
    }

    public function guest()
    {
        return $this->id == static::GUEST;
    }

    public function isActivated()
    {
        return (bool) $this->activated;
    }
    
    public function getPassword()
    {
        return $this->password;
    }

    public function checkPassword($password)
    {
        return $this->checkHash($password, $this->getPassword());
    }

    public function isMember()
    {
        return !$this->guest();
    }

    public function isAdmin()
    {
        return $this->isAdmin() or $this->isModerator();
    }

    public function isModerator()
    {
        return $this->group->g_moderator == 1;
    }

    public function sendWelcomeMail()
    {
        $user = $this;

        $data = array(
            'user' => $user,
        );

        Mail::plain('dsgame:mail::welcome', $data, function($mail)  use ($user)
        {
            $subject = trans('dsgame::register.mail_welcome_subject', array('server' => Config::get('game.server')));

            $mail->to($user->email)
                 ->subject($subject);
        });
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}

