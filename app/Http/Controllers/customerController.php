<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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
        $files = Files::where('uploaderName', Session::get('username'))->orderBy('updated_at', 'DESC')->get();
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
        $user = Users::where('username', Session::get('username'))->firstOrFail();

        if (Input::get('oldPassword')==$user->password && Input::get('address')!='' && Input::get('email')!='' && Input::get('handphone')!='' && filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL)) {
            $user->password = Input::get('newPassword');
            $user->address = Input::get('address');
            $user->email = Input::get('email');
            $user->handphone = Input::get('handphone');
            $user->save();

            $files = Files::where('uploaderName', Session::get('username'))->get();
            foreach ($files as $file) 
            {
                $file->uploaderContact = Input::get('handphone');
                $file->save();
            }

            $message = 'profile successfully saved';
            return view('customer.editProfile', compact('message', 'user'));
        }
        else {
            $message = 'field cannot be blank, email must be correct';
            return view('customer.editProfile', compact('message', 'user'));
        }
    }

    public function cancelOrder()
    {
        $file = Files::where('id', Input::get('id'))->first();
        $file->delete();
        $message = "order has successfully deleted";
        $files = Files::orderBy('updated_at','DESC')->get();
        File::delete($file->filePath);

        return view('customer.home', compact('message', 'files'));
    }

    public function logout()
    {
        Session:flush();
        return redirect('/');
    }

    public function showUploader()
    {
        $message = '';
        $user = Users::where('username', Session::get('username'))->first();
        return view('customer.userUpload', compact('message', 'user'));
    }

    public function uploadFile()
    {
        $file = Input::file('file');
        $filename = $file->getClientOriginalName();
        $uploader = Users::where('username', Session::get('username'))->firstOrFail();
        $agent = Users::where('username', 'agent')->firstOrFail();

        Storage::disk('local')->put($file->getClientOriginalName(),  File::get($file));
        $path = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix()."/".$filename;

        Files::create([
            'filename' => $filename,
            'filePath' => $path,
            'uploaderName' => Session::get('username'),
            'uploaderContact' => $uploader->handphone,
            'agentName' => 'agent',
            'agentContact' => $agent->handphone,
            'deliveryAddress' => Input::get('address'),
            'printType' => Input::get('printType'),
            'paperSize' => Input::get('paperSize'),
            'numPages' => '10', //anggap aja masih dummy
            'harga' => '10000', //anggap aja masih dummy
            'status' => 'In Queue',
            'mime' => $file->getClientMimeType()
        ]);

        $message = 'file is successfully uploaded';
        $user = Users::where('username', Session::get('username'))->first();
        return view('customer.userUpload', compact('message', 'user'));
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
