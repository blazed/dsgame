<?php


Route::get('/', array(
    'as'   => 'index',
    'uses' => 'DsGame\Controllers\HomeController@getIndex',
));

/**
 * Auth Routes
 */

Route::get('login', array(
    'as'   => 'login',
    'uses' => 'DsGame\Controllers\AuthController@getLogin',
));
Route::post('login', array(
    'uses' => 'DsGame\Controllers\AuthController@postLogin',
));
Route::get('logout', array(
    'as'   => 'logout',
    'uses' => 'DsGame\Controllers\AuthController@getLogout',
));
Route::get('activate/{code}', array(
    'as'   => 'activate_user',
    'uses' => 'DsGame\Controllers\AuthController@getActivate',
));
Route::get('forgot-password', array(
    'as'   => 'forgot_password',
    'uses' => 'DsGame\Controllers\AuthController@getForgotPassword',
));
Route::post('forgot-password', array(
    'uses' => 'DsGame\Controllers\AuthController@postForgotPassword',
));

/**
 * Register Routes
 */
Route::get('register', array(
    'as'   => 'register',
    'uses' => 'DsGame\Controllers\RegisterController@getRegister',
));
Route::post('register', array(
    'uses' => 'DsGame\Controllers\RegisterController@postRegister',
));
Route::get('register/race', array(
    'as'   => 'register_race',
    'uses' => 'DsGame\Controllers\RegisterController@getRace',
));
Route::post('register/race', array(
    'uses' => 'DsGame\Controllers\RegisterController@postRace',
));
Route::get('register/zone', array(
    'as'   => 'register_zone', 
    'uses' => 'DsGame\Controllers\RegisterController@getZone',
));
Route::post('register/zone', array(
    'uses' => 'DsGame\Controllers\RegisterController@postZone',
));
Route::get('register/colonel', array(
    'as'   => 'register_colonel',
    'uses' => 'DsGame\Controllers\RegisterController@getColonel',
));
Route::post('register/colonel', array(
    'uses' => 'DsGame\Controllers\RegisterController@postColonel',
));

/**
 * Image Routes
 */
Route::get('colonel/image/{user_id}/{size}', array(
    'as'   => 'colonel_image',
    'uses' => 'ColonelsController@getColonelImage',
));

/**
 * Auth Group
 */
Route::group(array('before' => 'sentry'), function()
{
    /**
     * Planet Overview
     */
    Route::get('overview', array(
        'as'   => 'overview',
        'uses' => 'DsGame\Controllers\PlanetController@getOverview',
    ));
    
    /**
     * Profile
     */
    Route::get('player/{id?}', array(
        'as'   => 'player', 
        'uses' => 'DsGame\Controllers\PlayersController@getPlayerProfile',
    ));
    Route::get('edit', array(
        'as'   => 'player_edit',
        'uses' => 'DsGame\Controllers\PlayersController@getPlayerEdit',
    ));

    /**
     * Stats
     */
    Route::get('statistics/{stats?}', array(
        'as'   => 'stats',
        'uses' => 'DsGame\Controllers\StatisticsController@getStatsView',
    ));

    /**
     * Colonel
     */
    Route::get('colonel', array(
        'as'   => 'colonel',
        'uses' => 'DsGame\Controllers\ColonelsController@getColonelView',
    ));
    Route::get('colonel/appearance', array(
        'as'   => 'colonel_look',
        'uses' => 'DsGame\Controllers\ColonelsController@getColonelLook',
    ));
});

/**
 * Admin Routes
 */
Route::group(array('prefix' => 'admin', 'before' => 'admin_auth'), function()
{
    /**
     * User Management
     */
    Route::get('/', array(
        'as'   => 'admin_dashboard',
        'uses' => 'DsGame\Controllers\Admin\DashboardController@showIndex',
    ));
    Route::get('users', array(
        'as'   => 'admin_users',
        'uses' => 'DsGame\Controllers\Admin\UsersController@showIndex',
    ));
    Route::get('planets', array(
        'as'   => 'admin_planets',
        'uses' => 'DsGame\Controllers\Admin\DashboardController@showIndex',
    ));
});

Route::get('creategroups', array(
    'uses' => 'DsGame\Controllers\TestController@createGroups',
));

Route::get('addusertogroup', array(
    'uses' => 'DsGame\Controllers\TestController@addUserToGroup',
));

