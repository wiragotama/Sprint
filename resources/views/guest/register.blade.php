@extends('guest.guestLayout')
@section('content')
	 <h2>Register New</h2>
    
    <div class="warningMessage">
        @if ($message!=null)
            {{$message}}
        @endif
    </div>

    <div class="container">
        <div class="registerForm">
            <!-- ada validasi javascript disini -->
            <form id="registerForm" onsubmit="#" action="/register" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <li>
                    <input id="username" name="username" type="text" class="text" placeholder="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}"> </input>
                </li>
                <li>
                    <input id="email" name="email" type="text" placeholder="E-MAIL" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-MAIL';}"> </input>
                </li>
                <li>
                    <input id="password" name="password" type="password" placeholder="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}"> </input>
                </li>
                <li>
                    <input id="address" name="address" type="text" placeholder="ADDRESS" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ADDRESS';}"> </input>
                </li>
                <div class="p-container">
                        <input type="submit" onclick="#" value="SUBMIT" >
                        <div class="clear"> </div>
                </div>
            </form>
        </div>
    </div>
@endsection