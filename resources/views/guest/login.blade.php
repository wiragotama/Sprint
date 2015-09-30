@extends('guest.guestLayout')
@section('content')
    <div class="warningMessage">
        @if ($message!=null)
            {{$message}}
        @endif
    </div>

    <div class="container">
        <div class="loginForm">
            <!-- ada validasi javascript disini -->
            <form id="loginForm" onsubmit="#" action="/register" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <li>
                    <input id="username" name="username" type="text" class="text" placeholder="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}"> </input>
                </li>
                <li>
                    <input id="password" name="password" type="password" placeholder="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}"> </input>
                </li>
                <div class="p-container">
                        <input type="submit" onclick="#" value="SIGN IN" >
                        <div class="clear"> </div>
                </div>
            </form>
        </div>
    </div>
@stop