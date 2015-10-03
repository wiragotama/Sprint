
<!DOCTYPE HTML>
<html>

<head>
	<title>SPRINT</title>
	<!-- Bootstrap -->
	
	<!--  webfonts  -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<!-- // webfonts  -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
	<!-- start plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="header_bg"><!-- start header -->
		<div class="container">
			<div class="row header">
			<nav class="navbar" role="navigation">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="index.html"><img src="images/pemkot.png" alt="" class="img-responsive" style="width:80px;"/> </a>
				</div>
				
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					SPRINT
			      <ul class="menu nav navbar-nav navbar-right">
			        <li id="profileLink"> <a href="./adminDashboard">Profile</a></li>
			        <li id="usersLink"> <a href="./adminUsers">Users</a></li>
			        <li id="filesLink"> <a href="./adminFiles">Files</a></li>
			        <li id="filesLink"> <a href="./adminLogout">Logout</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			</div>
			<ol class="breadcrumb">
			</ol>
		</div>
	</div>

	<div class="main">
	<!-- start main -->
		@yield('content')
	</div>

	<div class="footer_bg"><!-- start footre -->
		<div class="container">
			<div class="row  footer">
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div class="footer_btm"><!-- start footer_btm -->
		<div class="container">
			<div class="row  footer1">
				<div class="col-md-5">
					<div class="soc_icons">
						<ul class="list-unstyled">
							<div class="clearfix"></div>
						</ul>	
					</div>
				</div>
				<div class="col-md-7 copy">
					<p class="link text-right"><span>&copy; Sprint 2015 </span></p>
				</div>
			</div>
		</div>
	</div>
</body>

</html>