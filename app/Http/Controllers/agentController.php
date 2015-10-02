<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Users;
use App\Files;
use Input;
use Auth;
use Redirect;
use Session;


class agentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $message = '';
        $user = Users::where('username', Session::get('username'))->first();
        return view('agent.home', compact('message', 'user'));
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
            return view('agent.home', compact('message', 'user'));
        }
        else {
            $message = 'field cannot be blank, email must be correct';
            return view('agent.home', compact('message', 'user'));
        }
    }

    public function updateQueue()
    {
        $file = Files::where('id', Input::get('id'))->first();
        $file->status = 'Printed';
        $file->save();
        $message = "status has successfully updated - new printed file available";
        $files = Files::orderBy('updated_at','DESC')->get();

        return view('agent.filesDetail', compact('message', 'files'));
    }

    public function updatePrinted()
    {
        $file = Files::where('id', Input::get('id'))->first();
        $file->status = 'Delivered';
        $file->save();
        $message = "status has successfully updated - new printed file available";
        $files = Files::orderBy('updated_at','DESC')->get();

        return view('agent.filesDetail', compact('message', 'files'));
    }

    public function getFile()
    {
        $entry = Files::where('id',  $_GET['id'])->first();
        return response()->download($entry->filePath);
    }

    public function showFiles()
    {
        $files = Files::where('agentName', Session::get('username'))->get();
        $message = '';
        return view ('agent.filesDetail', compact('message', 'files'));
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
