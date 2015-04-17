<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Input, Auth, Redirect, Session, Validator, Hash;

class SessionController extends Controller {

	/**
     * Show the form for creating a new Session
     */
    public function create()
    {
        return View('session.create');
    }

    public function store()
    {
        $user = array(
            'email' => Input::get('email'), 'password' => Input::get('password')
        );
        if (Auth::attempt($user)) {
            return Redirect::intended('home');
        }
        // authentication failure! lets go back to the login page
        return Redirect::to('login')
        ->with('errors', 'Your Email Address/password combination was incorrect.')
        ->withInput();



    }

    public function destroy()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }

}
