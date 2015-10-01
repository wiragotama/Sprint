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


class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $message = '';
        $files = Files::where('uploaderName', Session::get('username'))->orderBy('updated_at')->get();
        return view('customer.home', compact('message', 'files'));
    }

    public function showUser()
    {
        $user = Users::where('username', Session::get('username'))->first();
        $message = '';
        return view('customer.editProfile', compact('message','user'));
    }

    public function editUser()
    {
        $user = Users::where('username', Input::get('username'))->firstOrFail();
        if ($user)
        {
            $message = '';
            return view('customer.editProfile', compact('message', 'user'));
        }
        else 
        {
            $message = 'databse error';
            return view('customer.editProfile', compact('message', 'user'));
        }
    }

    public function updateProfile()
    {
        $user = Users::where('username', Input::get('username'))->firstOrFail();

        if (Input::get('oldPassword')==$user->password && Input::get('address')!='' && Input::get('email')!='' && filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL)) {
            $user->password = Input::get('newPassword');
            $user->address = Input::get('address');
            $user->email = Input::get('email');
            $user->save();
            $message = 'profile successfully saved';
            return view('customer.editProfile', compact('message', 'user'));
        }
        else {
            $message = 'field cannot be blank, email must be correct';
            return view('customer.editProfile', compact('message', 'user'));
        }
    }

    public function uploadFile()
    {
        $message = '';
        return view('customer.uploadFile', compact('message'));
    }

    public function cancelOrder()
    {
        $file = Files::where('id', Input::get('id'))->first();
        $file->delete();
        $message = "order has successfully deleted";
        $files = Files::orderBy('updated_at','DESC')->get();
        return view('customer.home', compact('message', 'files'));
    }

    public function logout()
    {
        Session:flush();
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
