<?php

namespace DsGame\Models;

use Config;
use Mail;
use Sentry;

class Mailer extends Base
{

	public static function sendWelcomeMail($user)
    {

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
}

