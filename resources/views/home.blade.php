<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DataBoksi</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('la-assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('la-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet"> 

    <link href="{{ asset('la-assets/css/databoksi.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-4 brand">
                    <img src="images/logo.png" class="pull-left" />
                    <h1>DATA<span>BOKSI</span></h1>
                </div>
                <div class="col-md-8 navs">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#LoginModal">Login</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#JoinModal">Join</a></li>
                        <li>Datasets</li>
                        <li class="active">Home</li>
                    </ul>
                </div>
            </div><!-- close div .row -->
        </div><!-- close div .container -->
    </header>

    <div class="container search">
        <div class="col-md-7">
            <h4>EXPLORE, VIEW AND DOWNLOAD OUR DATA.</h4>
        </div>
        <div class="col-md-5">
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" placeholder="Search here" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div><!-- close div .search -->

    <br />
    <br />

    <div class="container contents">
        <div class="row featured">
            <h1>DATASET CATEGORIES</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                <br />Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <hr />
        </div>

        <br />
        <br />

        <div class="row">
            <div class="col-md-4">
                <div class="dataset type-1 border-bottom-10px-yellow">
                    <img src="images/first-aid-kit.png" />
                    <h3>AFYA</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-md-4">
               <div class="dataset type-2 border-bottom-10px-red">
                    <img src="images/harvest.png" />
                    <h3>KILIMO</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dataset type-1 border-bottom-10px-green">
                    <img src="images/cow.png" />
                    <h3>MIFUGO</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div><!-- close div .row -->

        <br />
        <br />

        <div class="row">
            <div class="col-md-4">
                <div class="dataset type-1 border-bottom-10px-yellow">
                    <img src="images/books.png" />
                    <h3>ELIMU</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-md-4">
               <div class="dataset type-1 border-bottom-10px-red">
                    <img src="images/house.png" />
                    <h3>MAJENGO</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dataset type-1 border-bottom-10px-green">
                    <img src="images/economy.png" />
                    <h3>UCHUMI</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div><!-- close div .row -->

        <br />
        <br />
        <br />

        <div class="row featured">
            <h1>RESOURCES</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                <br />Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <hr />
        </div>

        <br />
        <br />

        <div class="row">
            <div class="col-md-6">
                <div class="resource-horizontal resource-horizontal-type-1 border-right-10px-yellow">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="images/video-camera.png" />
                        </div>
                        <div class="col-md-9">
                            <h3>HOW TO VIDEOS</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua sed do eiusmod tempor incididunt ut labore et dolore sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        </div>
                    </div><!-- close div .row -->
                </div><!-- close div .resource-horizontal -->
            </div>

            <div class="col-md-6">
                <div class="resource-horizontal resource-horizontal-type-1 border-right-10px-red">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="images/support.png" />
                        </div>
                        <div class="col-md-9">
                            <h3>SUPPORT</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua sed do eiusmod tempor incididunt ut labore et dolore sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        </div>
                    </div><!-- close div .row -->
                </div>
            </div>
        </div><!-- close div .row -->

        <br />
        <br />

        <div class="row">
            <div class="col-md-6">
                <div class="resource-horizontal resource-horizontal-type-1 border-right-10px-green">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="images/api.png" />
                        </div>
                        <div class="col-md-9">
                            <h3>API</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua sed do eiusmod tempor incididunt ut labore et dolore sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        </div>
                    </div><!-- close div .row -->
                </div>
            </div>

            <div class="col-md-6">
                <div class="resource-horizontal resource-horizontal-type-1 border-right-10px-yellow">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="images/question.png" />
                        </div>
                        <div class="col-md-9">
                            <h3>HELP</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua sed do eiusmod tempor incididunt ut labore et dolore sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        </div>
                    </div><!-- close div .row -->
                </div>
            </div>
        </div><!-- close div .row -->
    </div><!-- close div .container -->

    <footer>
        <h4><strong>DATA</strong>BOKSI</h4>
        <span>&copy;2017 CodeForTanzania</span>
    </footer>

    <!-- Login Modal -->
    <div class="modal fade" id="LoginModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-top-10px-red">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="col-md-12 brand-form">
                        <h1>LOGIN</h1>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="box-body" style="overflow:auto;">
                        <div class="form-group">
                            <label for="email">Email Adress</label>
                            <input type="email" class="form-control" id="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-green pull-right col-md-3" data-dismiss="modal">LOGIN</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Join Modal -->
    <div class="modal fade" id="JoinModal" role="dialog"  tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-top-10px-red">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="col-md-12 brand-form">
                        <h1>REQUEST ACCESS</h1>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="box-body" style="overflow:auto;">
                        <div class="form-group">
                            <label for="email">Fullname</label>
                            <input type="email" class="form-control" id="email" placeholder="Fullname">
                        </div>
                        <div class="form-group">
                            <label for="email">Mobile Phone</label>
                            <input type="email" class="form-control" id="email" placeholder="Mobile Phone">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Adress</label>
                            <input type="email" class="form-control" id="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Registration Reason</label>
                            <textarea class="form-control" placeholder="Registration Reason"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-green pull-right col-md-3" data-dismiss="modal">JOIN NOW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('la-assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>

<html>