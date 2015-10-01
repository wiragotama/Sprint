<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use App\User;
use Auth;
use Input;
use Redirect;
use Session;

class guestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest.home');
    }
    
    public function register()
    {
        return view('guest.register')->with('message','');
    }

    public function showLogin()
    {
        return view('guest.login')->with('message','');
    }

    public function login()
    {
        $user = Users::where('username', Input::get('username'))->first();
        if (count($user))
        {
            if ($user->password == Input::get('password')) {
                Session::put('username', $user->username);
                if ($user->role=='admin')
                {
                    return redirect('adminDashboard');
                }
                else if ($user->role=='customer')
                {
                    return redirect('customerHome');
                }
                else if ($user->role=='agent')
                {
                    echo ('not supported yet!');
                }
            }
            else 
            {
                $message = 'Login failed';
                return view('guest.login')->with('message','');
            }
        }
        else
        {
            $message = 'Login failed';
            return view('guest.login')->with('message','');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Users::where('username', Input::get('username'))->get();
        if (count($user)) //user already exist
        {
            $message = 'user is already exist';
            return view('guest.register')->with('message', $message);
        }
        else if (Input::get('username')=='' || Input::get('email')=='' || Input::get('password')=='' || Input::get('address')=='') 
        {
            $message = 'all fields must be filled!';
            return view('guest.register')->with('message',$message);
        }
        else {
            if (!filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL)) {
                return view('guest.login')->with('message','invalid email address');
            }
            else {
                Users::create([
                    'username' => Input::get('username'),
                    'email' => Input::get('email'),
                    'password' => Input::get('password'),
                    'address' => Input::get('address'),
                    'role' => 'customer'
                ]);
                $message = 'register success, you may login';
                return view('guest.login')->with('message', $message);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
