@extends('admin.adminLayout')
@section('content')
	 <h2>CRUD Users</h2>
    
    <div class="warningMessage">
        @if ($message!=null)
            {{$message}}
        @endif
    </div>

    <div class="container">
        <div class="registerForm">
            <!-- ada validasi javascript disini -->
            <form id="registerForm" onsubmit="#" action="/createUser" method="POST">
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
                <li>
                    <select name="role">
                      <option value="admin">Admin</option>
                      <option value="customer">Customer</option>
                      <option value="agent">Agent</option>
                    </select>
                </li>
                <div class="p-container">
                        <input type="submit" onclick="#" value="SUBMIT" >
                        <div class="clear"> </div>
                </div>
            </form>
        </div>
    </div>

    @if (!$users->count())
    @else
        <div class="usersList">
            <ul>
                @foreach( $users as $user )
                    @if ($user->role!='admin') <!--admin tidak boleh mengedit admin lainnya -->
                    <li> 
                        <form id="userDetail" onsubmit="#" action="/editUser" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="username" value="{{ $user->username }}">
                            {{$user->username}} | {{$user->role}}
                            <div class="p-container">
                                <input id="edit" type="submit" onclick="#" value="Edit" >
                                <div class="clear"> </div>
                            </div>
                        </form>
                        <form id="deleteUser" onsubmit="#" action="/deleteUser" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="username" value="{{ $user->username }}">
                            <div class="p-container">
                                <input id="delete" type="submit" onclick="#" value="Delete" >
                                <div class="clear"> </div>
                            </div>
                        </form>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif

@endsection