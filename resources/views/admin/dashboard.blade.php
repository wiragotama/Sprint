@extends('admin.adminLayout')
@section('content')
	 <h2>Admin Profile</h2>
    
    <div class="warningMessage">
        @if ($message!=null)
            {{$message}}
        @endif
    </div>

    <div class="container">
        <div class="registerForm">
            <!-- ada validasi javascript disini -->
            <form id="registerForm" onsubmit="#" action="/adminDashboard" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <li>
                    <input id="username" name="username" type="text" class="text" placeholder="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}"> </input>
                </li>
                <li>
                    <input id="oldPassword" name="oldPassword" type="password" class="text" placeholder="OLD PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'OLDPASSWORD';}"> </input>
                </li>
                <li>
                    <input id="newPassword" name="newPassword" type="password" placeholder="NEW PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'NEW PASSWORD';}"> </input>
                </li>
                <div class="p-container">
                        <input type="submit" onclick="#" value="SUBMIT" >
                        <div class="clear"> </div>
                </div>
            </form>
        </div>
    </div>
@endsection