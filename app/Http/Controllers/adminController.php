<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use App\Files;
use Input;
use Auth;
use Redirect;
use Session;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard')->with('message','');
    }

    public function changePassword()
    {
        $user = Users::where('username', Input::get('username'))->firstOrFail();
        if ($user) //user already exist
        {
            if (Input::get('oldPassword')==($user->password)){
                $user->password = Input::get('newPassword');
                $user->save();
                return view('admin.dashboard')->with('message', 'change password success');
            }
            else return view('admin.dashboard')->with('message', 'wrong password');
        }
        else 
        {
            return view('admin.dashboard')->with('message', 'admin does not exist');
        }
    }

    public function usersView()
    {
        $message = '';
        $users = Users::all();
        return view('admin.users', compact('message', 'users'));
    }

    public function createUser()
    {
        $user = Users::where('username', Input::get('username'))->get();
        if (count($user)==0) //user not exist
        {
            if (Input::get('username')=='' || Input::get('email')=='' || Input::get('password')=='' || Input::get('address')=='') 
            {  
                $message = 'all fields must be filled!';
                $users = Users::all();
                return view('admin.users', compact('message', 'users'));
            }
            else 
            {
                if (!filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL)) {
                    $message = 'invalid email address';
                    $users = Users::all();
                    return view('admin.users', compact('message', 'users'));
                }
                else {
                    Users::create([
                        'username' => Input::get('username'),
                        'email' => Input::get('email'),
                        'password' => Input::get('password'),
                        'address' => Input::get('address'),
                        'role' => Input::get('role')
                    ]);
                    $message = 'user has successfully added';
                    $users = Users::all();
                    return view('admin.users', compact('message', 'users'));
                }
            }
        }
        else {
            $message = 'user is already exist';
            $users = Users::all();
            return view('admin.users', compact('message', 'users'));
        }
    }

    public function editUser()
    {
        $user = Users::where('username', Input::get('username'))->firstOrFail();
        if ($user)
        {
            $message = '';
            return view('admin.editUser', compact('message', 'user'));
        }
        else 
        {
            $message = 'databse error';
            return view('admin.editUser', compact('message', 'user'));
        }
    }

    public function updateUser()
    {
        $user = Users::where('username', Input::get('username'))->firstOrFail();

        if (Input::get('password')!='' && Input::get('address')!='' && Input::get('email')!='' && filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL)) {
            $user->password = Input::get('password');
            $user->address = Input::get('address');
            $user->email = Input::get('email');
            $user->save();
            $message = 'edit user success';
            return view('admin.editUser', compact('message', 'user'));
        }
        else {
            $message = 'field cannot be blank, email must be correct';
            return view('admin.editUser', compact('message', 'user'));
        }
    }

    public function deleteUser()
    {
        $user = Users::where('username', Input::get('username'))->firstOrFail();
        $user->delete();
        $message = "user has succesfully deleted";
        $users = Users::all();
        return view('admin.users', compact('message', 'users'));
    }

    public function showFiles()
    {
        $files = Files::orderBy('status')->get();
        return view('admin.files', compact('files'));
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
