<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){ 
    return View::make('pages/home'); 
});

Route::get('/account',
    array('before' => 'auth',  # Only authenticated users can come here
    function(){ 
        return View::make('pages/account'); 
    }
));

Route::match(
    array('GET','POST'),       # Allow GET and POST for viewing page and form submission
    '/log-in',                 # The route
    array('before' => 'guest', # Authenticated users cannot come here
    function(){
        if(Request::isMethod('post')){
            $credentials = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
                'is_active' => true
                );
            if(Auth::attempt($credentials)){
                # Redirect to previously clicked page if got here by 
                # Redirect::guest('/log-in'), which happens when 
                # 'before'=>'auth' filter runs; otherwise go to /account.
                return Redirect::intended('/account');
            }
        }
        return View::make('pages/log-in');
    })
);

Route::get(
    '/log-out', 
    function(){
        Auth::logout();
        return Redirect::to('/');
});

Route::match(
    array('GET', 'POST'),      # Allow GET and POST for viewing page and form submission
    '/sign-up',                # The route
    array('before' => 'guest', # Authenticated users cannot come here
    function(){
        $validator = null;
        if(Request::isMethod('post')){
            $user = new User;
            $user->first_name = Input::get('first_name');
            $user->last_name  = Input::get('last_name');
            $user->email      = Input::get('email');
            $user->password   = Input::get('password');
            
            if($user->save()){
                Auth::login($user);
                return Redirect::to('/account');
            }
            $validator = $user->validator;
        }
        return View::make('pages/sign-up')->withErrors($validator);
    }
));