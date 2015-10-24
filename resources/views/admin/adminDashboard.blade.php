<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background:black">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="./adminDashboard">sprint</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#dashboard"> Edit Profile </a>
                    </li>
                    <li class="dropdown">
                          <a href="#users" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a class="page-scroll" href="#registerUser" style="background-color:#5D5D5D">Create User</a></li>
                            <li><a class="page-scroll" href="#listUser" style="background-color:#5D5D5D">List User</a></li>
                          </ul>
                    </li>
                    <li class="dropdown">
                          <a href="#printStatus" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Print Status <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a class="page-scroll" href="#printingQueue" style="background-color:#5D5D5D">Printing Queue</a></li>
                            <li><a class="page-scroll" href="#printedFiles" style="background-color:#5D5D5D">Printed Files</a></li>
                            <li><a class="page-scroll" href="#delivered" style="background-color:#5D5D5D">Delivered</a></li>
                          </ul>
                    </li>
                    <li>
                        <a class="page-scroll" href="./adminLogout">Log Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <br>

    <!-- Dashboard Section -->
    <section id="dashboard" class="bg-light-gray">
        <div class="container">
            @if ($message!=null)
                <div class="col-lg-12 text-center" style="border: medium solid #FF9900; background-color:#FF9900;">
                    <h5 class="section-heading" style="color:black"> Message!!! <br> {{$message}} </h5>
                </div>
            @endif
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Edit Profile</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form id="registerForm" onsubmit="#" action="/editAdminProfile" method="POST">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    	
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <b> Username: {{$user->username}} </b>
                                </div>
                                <div class="form-group">
                                    <b> Old Password </b>
                                    <input type="password" class="form-control" placeholder="Old Password" id="oldPassword" name="oldPassword" value="{{$user->password}}" required data-validation-required-message="Please enter your old password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <b> New Password </b>
                                    <input type="password" class="form-control" placeholder=" New Password" id="newPassword" name="newPassword" value="{{$user->password}}" required data-validation-required-message="Please enter your new password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <b> Email </b>
                                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{$user->email}}" required data-validation-required-message="Please enter your email.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                	<b> Address </b>
                    				<input type="text" class="form-control" id="address" name="address" placeholder="{{$user->address}}" value="{{$user->address}}" required data-validation-required-message="Please enter your new password.">  </input>
                            	 </div>
                                 <div class="form-group">
                                    <b> Handphone </b>
                                    <input type="text" class="form-control" id="handphone" name="handphone" placeholder="{{$user->handphone}}" value="{{$user->handphone}}" required data-validation-required-message="Please enter your handphone.">  </input>
                                 </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- register Section -->
    <section id="registerUser" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Create User</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form id="registerForm" onsubmit="#" action="/createUser" method="POST">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" id="username" name="username" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required data-validation-required-message="Please enter your password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address" id="address" name="address" required data-validation-required-message="Please enter your address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" required data-validation-required-message="Please enter your email.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Handphone" id="handphone" name="handphone" required data-validation-required-message="Please enter your contact.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                	<label> Role </label>
	                                <select name="role" class="form-control">
				                      <option value="admin">Admin</option>
				                      <option value="customer">Customer</option>
				                      <option value="agent">Agent</option>
				                    </select>
		                       	</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- list User Section -->
    <section id="listUser" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <h2 class="section-heading">List User</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <table class="table table-bordered">
                        <thead>
                            <th class="text-center"> Username </th>
                            <th class="text-center"> Role </th>
                            <th class="text-center"> Option1 </th>
                            <th class="text-center"> Option2 </th>
                        </thead>
                        <tbody>
                        @if (!$listUsers->count())
					    @else
					        
			                @foreach( $listUsers as $user )
			                    @if ($user->role!='admin') <!--admin tidak boleh mengedit admin lainnya -->
			                    <tr>
			                    	<td> {{$user->username}} </td> 
		                            <td> {{$user->role}} </td>
		                            <td>
				                        <form id="userDetail" onsubmit="#" action="/showEditUser" method="POST">
				                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
				                            <input type="hidden" name="username" value="{{ $user->username }}"> 
			                                <input id="edit" type="submit" onclick="#" value="Edit" >   
				                        </form>
				                    </td>
				                    <td>
				                        <form id="deleteUser" onsubmit="#" action="/deleteUser" method="POST">
				                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
				                            <input type="hidden" name="username" value="{{ $user->username }}">
			                                <input id="delete" type="submit" onclick="#" value="Delete" >
				                        </form>
			                        </td>
			                    </tr>
			                    @endif
			                @endforeach  
					    @endif
					    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Printing Status Section -->
    <section id="printingQueue" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <h2 class="section-heading">Printing Queue</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <table class="table table-bordered">
                        <thead>
                            <th class="text-center"> ID </th>
                            <th class="text-center"> Filename </th>
                            <th class="text-center"> Uploader Name </th>
                            <th class="text-center"> Uploader Contact </th>
                            <th class="text-center"> Agent Name </th>
                            <th class="text-center"> Agent Contact </th>
                            <th class="text-center"> Create Time</th>
                            <th class="text-center"> Update Time</th>
                            <th class="text-center"> Harga </th>
                        </thead>
                        <tbody>
                        @foreach( $files as $file)
	                        @if ($file->status=='In Queue')
	                        <tr>
			                    <td> 
			                        {{$file->id}}
			                    </td>
			                    <td> 
			                        {{$file->filename}}
			                    </td>
			                    <td> 
			                        {{$file->uploaderName}}
			                    </td>
                                <td>
                                    {{$file->uploaderContact}}
                                </td>
			                    <td> 
			                        {{$file->agentName}}
			                    </td>
                                <td>
                                    {{$file->agentContact}}
                                </td>
			                    <td> 
			                        {{$file->created_at}}
			                    </td>
			                    <td> 
			                        {{$file->updated_at}}
			                    </td>
			                    <td> 
			                        {{$file->harga}}
			                    </td>
		                    </tr>
			                @endif
		                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section id="printedFiles" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <h2 class="section-heading">Printed Files</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <table class="table table-bordered">
                        <thead>
                            <th class="text-center"> ID </th>
                            <th class="text-center"> Filename </th>
                            <th class="text-center"> Uploader Name </th>
                            <th class="text-center"> Uploader Contact </th>
                            <th class="text-center"> Agent Name </th>
                            <th class="text-center"> Agent Contact </th>
                            <th class="text-center"> Create Time</th>
                            <th class="text-center"> Update Time</th>
                            <th class="text-center"> Harga </th>
                        </thead>
                        <tbody>
                        @foreach( $files as $file)
	                        @if ($file->status=='Printed')
	                        <tr>
			                    <td> 
			                        {{$file->id}}
			                    </td>
			                    <td> 
			                        {{$file->filename}}
			                    </td>
			                    <td> 
			                        {{$file->uploaderName}}
			                    </td>
                                <td>
                                    {{$file->uploaderContact}}
                                </td>
			                    <td> 
			                        {{$file->agentName}}
			                    </td>
                                <td>
                                    {{$file->agentContact}}
                                </td>
			                    <td> 
			                        {{$file->created_at}}
			                    </td>
			                    <td> 
			                        {{$file->updated_at}}
			                    </td>
			                    <td> 
			                        {{$file->harga}}
			                    </td>
		                    </tr>
			                @endif
		                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section id="delivered" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <h2 class="section-heading">Delivered</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <table class="table table-bordered">
                        <thead>
                            <th class="text-center"> ID </th>
                            <th class="text-center"> Filename </th>
                            <th class="text-center"> Uploader Name </th>
                            <th class="text-center"> Uploader Contact </th>
                            <th class="text-center"> Agent Name </th>
                            <th class="text-center"> Agent Contact </th>
                            <th class="text-center"> Create Time</th>
                            <th class="text-center"> Update Time</th>
                            <th class="text-center"> Harga </th>
                        </thead>
                        <tbody>
                        @foreach( $files as $file)
	                        @if ($file->status=='Delivered')
	                        <tr>
			                    <td> 
			                        {{$file->id}}
			                    </td>
			                    <td> 
			                        {{$file->filename}}
			                    </td>
			                    <td> 
			                        {{$file->uploaderName}}
			                    </td>
                                <td>
                                    {{$file->uploaderContact}}
                                </td>
			                    <td> 
			                        {{$file->agentName}}
			                    </td>
                                <td>
                                    {{$file->agentContact}}
                                </td>
			                    <td> 
			                        {{$file->created_at}}
			                    </td>
			                    <td> 
			                        {{$file->updated_at}}
			                    </td>
			                    <td> 
			                        {{$file->harga}}
			                    </td>
		                    </tr>
			                @endif
		                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">&copy; Sprint 2015</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
