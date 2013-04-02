<?php

namespace DsGame\Controllers;

use DsGame\Models\Config;
use DsGame\Models\User;
use Auth;
use Formly;
use Input;
use Redirect;
use Request;
use Session;
use Sentry;
use Validator;
use View;

/**
 * 
 **/
class AuthController extends BaseController
{
    
    public function __construct()
    {
        // code...  
    }

    public function getLogin()
    {
        //$form = Formly::make();

        return View::make('dsgame::auth.login');
    }

    public function postLogin()
    {
        try {

            $loginData = array(
                'login' => Input::get('username'),
                'password' => Input::get('password'),
           );

            if (Sentry::authenticate($loginData)) {
                $user = Sentry::getUser();

                $user->last_login = date("Y-m-d H:i:s");
                $user->reset_token = '';
                $user->reset_requested_at = '';
                $user->save();

                Session::put('planet_id', $user->last_planet_id);

                return Redirect::route('overview');
            }
        }

        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Login field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
           echo 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
           echo 'User is not activated.';
        }

        // The following is only required if throttle is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            echo 'User is suspended.';
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            echo 'User is banned.';
        }

        /*if (Auth::attempt($loginData))
        {
            $user = Auth::user();

            $confirmed = $user->confirmed;

            if (!$confirmed) {
                return Redirect::route('login')
                            ->with('alert', trans('dsgame::login.not_activated'));
            } elseif ($confirmed and $user->access == '0') {
                return Redirect::route('register_race');
            } else {
                $user->last_login = date("Y-m-d H:i:s");
                $user->reset_token = '';
                $user->reset_requested_at = '';
                $user->save();

                Session::put('planet_id', $user->last_planet_id);

                return Redirect::route('overview');
            }
        } else {
            $errors = new \Illuminate\Support\MessageBag;
            $errors->add('login', trans('dsgame::login.wrong_information'));

            return Redirect::route('login')
                        ->withInput(Input::get())
                        ->with('errors', $errors);
        }*/
    }
    
    public function getLogout()
    {
        Sentry::logout();
        return Redirect::route('login');
    }

    public function getActivate($code = null)
    {
        try {
            if (is_null($code)) {
                die('Code_Error');
            } else {
                $user = Sentry::getUserProvider()->findByActivationCode($code);

                if ($user->attemptActivation($code)) {
                    $user->activation_code = '';
                    $user->activated = 1;
                    $user->save();

                    return Redirect::route('register_race')
                        ->with('message', trans('dsgame::login.activation_comp'));
                }
            }
        }

        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }

        catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e)
        {
            echo 'User is already activated.';
        }


        /*if (is_null($code)) {
            die('General Error.');
        } else {
            $user = User::where('activation_token', '=', $code)->first();

            if (is_null($user))
            {
                return Redirect::route('login')
                        ->with('alert', trans('dsgame::login.wrong_code'));
            } else {
                $user->activation_token = '';
                $user->confirmed = 1;
                $user->save();

                return Redirect::route('register_race')
                        ->with('message', trans('dsgame::login.activation_comp'));
            }
        }*/
    }
}

