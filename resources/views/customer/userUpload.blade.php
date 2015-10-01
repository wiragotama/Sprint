<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sprint</title>

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
<body id="page-top" class="index" style="background-color:black">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Sprint</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="./customerHome">Home</a>
                    </li>
                    <li>
                        <a href="./customerProfile">Edit Profile</a>
                    </li>
                    <li>
                        <a href="./customerUpload">Upload</a>
                    </li>
                    <li>
                        <a href="./customerLogout">Log Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Upload Section -->
    <section id="register" class="bg-black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="color:white">Upload</h2>
                </div>
            </div>
            <br>
        </div>
        
        <div class="container">
            @if ($message!=null)
                <div class="col-lg-12 text-center" style="border: medium solid #FF9900; background-color:#FF9900">
                    <h5 class="section-heading" style="color:black"> {{$message}} </h5>
                </div>
            @endif
        </div>
        <br>

        {!! Form::open(array('url'=>'customerUpload','files'=>true)) !!}
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" style="color:white">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">File input :</label>
                                {!!Form::file('file','',array('id'=>'file','class'=>'')) !!}
                                <p class="help-block" style="color:white">Please upload file here.</p>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Type :</label>
                                <select class="form-control" id="printType" name="printType">
                                    <option>Dokumen</option>
                                    <option>Poster</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Paper Size :</label>
                                <select class="form-control" id="paperSize" name="paperSize">
                                    <option>A0</option>
                                    <option>A1</option>
                                    <option>A2</option>
                                    <option>A3</option>
                                    <option>A4</option>
                                    <option>A5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Delivery Address :</label>
                                <br>
                                <input class="form-control" id="address" name="address" type="text" placeholder="{{$user->address}}" value="{{$user->address}}">  </input>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-warning">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        {!!Form::close() !!}
    </section>
</body>
</html>
