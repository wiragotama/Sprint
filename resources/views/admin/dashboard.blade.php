@extends('admin.adminLayout')
@section('content')
	 <h2>Admin Profile</h2>
    
    <br>

    <div class="container">
        <div class="registerForm">
            <!-- ada validasi javascript disini -->
            <div class="container">
                @if ($message!=null)
                    <div style="border: medium solid #FF9900; background-color:#FF9900; margin-top:100px;">
                        <h5 class="section-heading" style="color:black"> {{$message}} </h5>
                    </div>
                @endif
            </div>
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