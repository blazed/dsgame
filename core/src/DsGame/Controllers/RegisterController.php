<?php

namespace DsGame\Controllers;

use DsGame\Models\User;
use DsGame\Models\Generator;
use DsGame\Models\Mailer;
use Auth;
use Input;
use Redirect;
use Request;
use Session;
use Sentry;
use Validator;
use View;

class RegisterController extends BaseController 
{
    public function __construct()
    {
    }

    public function getRegister()
    {
        return View::make('dsgame::register.register');
    }

    public function postRegister()
    {

        $input = Input::get();

        try
        {
            $rules = array(
                'username' => 'required|unique:users|min:3',
                'email'    => 'required|unique:users|email',
                'password' => 'required',
            );

            $validation = Validator::make($input, $rules);
            if ($validation->fails()) {
                return Redirect::route('register')
                    ->withInput(Input::get())
                    ->with('errors', $validation->messages());
            }

            $user_data = array(
                'username'           => Input::get('username'),
                'email'              => Input::get('email'),
                'password'           => Input::get('password'),
                'public_token'       => Generator::generateToken('public_token'),
                'reset_token'        => '',
                'reset_requested_at' => '',
                'last_login'         => '',
            );

            $user = Sentry::register($user_data);

            $activationCode = $user->getActivationCode();

            Mailer::sendWelcomeMail($user);

        /*$rules = array(
            'username' => 'required|unique:users|min:3',
            'email'    => 'required|unique:users|email',
            'password' => 'required',
            //'rules'    => 'accepted',
        );

        $validation = Validator::make(Input::get(), $rules);
        if ($validation->fails()) {
            return Redirect::route('register')
                    ->withInput(Input::get())
                    ->with('errors', $validation->messages());
        }

        $user_data = array(
            'username'           => Input::get('username'),
            'email'              => Input::get('email'),
            'password'           => Input::get('password'),
            'public_token'       => Generator::generateToken('public_token'),
            'reset_token'        => '',
            'reset_requested_at' => '',
            'last_login'         => '',
        );

        $user = Sentry::register($user_data);

        $user->sendWelcomeMail();*/

            return Redirect::route('index')
                    ->with('message', trans('dsgame::register.reg_complete'));
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            echo 'Login field is required.';
        }

        catch (Cartalyst\Sentry\Users\UserExistsException $e) {
            echo 'User with this login already exists.';
        }
    }

    public function getRace()
    {
        return View::make('dsgame::register.race');
    }

    public function postRace()
    {
        $rules = array(
            'race' => 'required',
        );

        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fail()) {
            return Redirect::route('register_race')
                    ->withInput()
                    ->with('errors', $validation->errors());
        } else {
            $race = Input::get('race');
            Session::put('race', $race);

            return Redirect::route('register_zone')
                    ->with('message', 'Ras vald: ' . $race);
        }
    }
}

