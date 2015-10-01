@extends('customer.customerLayout')
@section('content')
	 <h2>Edit User</h2>
    
    <div class="warningMessage">
        @if ($message!=null)
            {{$message}}
        @endif
    </div>

    <div class="container">
        <div class="registerForm">
            <!-- ada validasi javascript disini -->
            <form id="registerForm" onsubmit="#" action="/updateUser" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <li>
                    Username: {{$user->username}}
                    <input type="hidden" name="username" value="{{$user->username}}"> 
                </li>
                <li>
                    Email:
                    <input id="email" name="email" type="text" placeholder="{{$user->email}}" value="{{$user->email}}"> </input>
                </li>
                <li>
                    Password:
                    <input id="password" name="password" type="password" placeholder="{{$user->password}} " value="{{$user->password}}"> </input>
                </li>
                <li>
                    Address:
                    <input id="address" name="address" type="text" placeholder="{{$user->address}}" value="{{$user->address}}">  </input>
                </li>
                <div class="p-container">
                        <input type="submit" onclick="#" value="SUBMIT" >
                        <div class="clear"> </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection