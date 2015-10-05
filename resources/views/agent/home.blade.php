@extends('agent.agentLayout')
@section('content')

    <!-- edit profile Section -->
    <section id="register" class="bg-light-gray">
        <div class="container">
            @if ($message!=null)
                <div class="col-lg-12 text-center" style="border: medium solid #FF9900; background-color:#FF9900">
                    <h5 class="section-heading" style="color:black"> {{$message}} </h5>
                </div>
            @endif
        </div>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="color:black">Edit Profile</h2>
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="col-lg-12">
                    <form id="editForm" onsubmit="#" action="/agentProfile" method="POST">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
                                <div class="form-group">
                                    <label class="section-heading" style="color:black">Old Password</label>
                                    <input type="password" class="form-control" placeholder="Old Password" id="oldPassword" name="oldPassword" value="{{$user->password}}" required data-validation-required-message="Please enter your old password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label class="section-heading" style="color:black">New Password</label>
                                    <input type="password" class="form-control" placeholder="Password" id="newPassword" name="newPassword" value="{{$user->password}}" required data-validation-required-message="Please enter your new password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label class="section-heading" style="color:black">Address</label>
                                    <input type="text" class="form-control" placeholder="Address" id="address" name="address" value="{{$user->address}}" required data-validation-required-message="Please enter your address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label class="section-heading" style="color:black">Email</label>
                                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{$user->email}}" required data-validation-required-message="Please enter your email.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label class="section-heading" style="color:black">Handphone</label>
                                    <input type="text" class="form-control" placeholder="Handphone" id="handphone" name="handphone" value="{{$user->handphone}}" required data-validation-required-message="Please enter your handphone.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>    
@endsection