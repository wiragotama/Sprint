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
        $message = '';
        $message2 = '';
        return view('guest.home', compact('message', 'message2'));
    }
    
    public function register()
    {
        $message = '';
        $message2 = '';
        return view('guest.home', compact('message', 'message2'));
    }

    public function showLogin()
    {
        $message = '';
        $message2 = '';
        return view('guest.home', compact('message', 'message2'));
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
                    return redirect('agentHome');
                }
            }
            else 
            {
                $message = 'Login failed';
                $message2 = '';
                return view('guest.home', compact('message', 'message2'));
            }
        }
        else
        {
            $message = 'Login failed';
            $message2 = '';
            return view('guest.home', compact('message', 'message2'));
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
            $message = '';
            $message2 = 'user is already exist';
            return view('guest.home', compact('message', 'message2'));
        }
        else if (Input::get('username')=='' || Input::get('email')=='' || Input::get('password')=='' || Input::get('address')=='') 
        {
            $message = '';
            $message2 = 'all fields must be filled!';
            return view('guest.home', compact('message', 'message2'));
        }
        else {
            if (!filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL)) {
                $message = '';
                $message2 = 'invalid email address';
                return view('guest.home', compact('message', 'message2'));
            }
            else {
                Users::create([
                    'username' => Input::get('username'),
                    'email' => Input::get('email'),
                    'password' => Input::get('password'),
                    'address' => Input::get('address'),
                    'role' => 'customer'
                ]);
                $message = '';
                $message2 = 'register success, you may login';
                return view('guest.home', compact('message', 'message2'));
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
