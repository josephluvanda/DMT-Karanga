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
                    <a href="/">
                        <img src="images/logo.png" class="pull-left" />
                        <h1>DATA<span>BOKSI</span></h1>
                    </a>
                </div>
                <div class="col-md-8 navs">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#LoginModal">Login</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#JoinModal">Join</a></li>
                        <li class="active"><a href="/datasets">Datasets</a></li>
                        <li><a href="/">Home</a></li>
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
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-green pull-right" data-dismiss="modal">NEW DATASET</button>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-4 vertical-menus">
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        <span class="glyphicon glyphicon-file"></span>&nbsp;
                        Datasets
                        <span class="glyphicon glyphicon-chevron-right pull-right"></span>
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="glyphicon glyphicon-th-list"></span>&nbsp;
                        Categories
                        <span class="glyphicon glyphicon-chevron-up pull-right"></span>
                    </a>
                    <a href="#" class="list-group-item child">
                        <span class="glyphicon glyphicon-stop" style="font-size:12px;"></span>&nbsp;
                        Elimu</a>
                    <a href="#" class="list-group-item child">
                        <span class="glyphicon glyphicon-stop" style="font-size:12px;"></span>&nbsp;
                        Afya</a>
                    <a href="#" class="list-group-item child">
                        <span class="glyphicon glyphicon-stop" style="font-size:12px;"></span>&nbsp;
                        Kilimo</a>
                    <a href="#" class="list-group-item"><span class="fa fa-map-marker"></span>&nbsp; Regions <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                    <a href="#" class="list-group-item"><span class="fa fa-map-marker"></span>&nbsp; Districts<span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                    <a href="#" class="list-group-item"><span class="fa fa-map-marker"></span>&nbsp; Wards <span class="glyphicon glyphicon-chevron-up pull-right"></span></a>
                    <a href="#" class="list-group-item child"><span class="glyphicon glyphicon-stop" style="font-size:12px;"></span>&nbsp;Temeke</a>
                    <a href="#" class="list-group-item child"><span class="glyphicon glyphicon-stop" style="font-size:12px;"></span>&nbsp;Mbagala</a>
                    <a href="#" class="list-group-item child"><span class="glyphicon glyphicon-stop" style="font-size:12px;"></span>&nbsp;Sinza</a>
                    <a href="#" class="list-group-item">
                        <span class="glyphicon glyphicon-tags"></span>&nbsp;
                        Tags <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                </div>
            </div>
            <div class="col-md-8 results">
                <h2>5 Results</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dataset-row type-2">
                            <h3>Shule za Sekondari zilizo sajiliwa Mbeya.</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <br />
                            <strong class="red" style="margin-right:30px;"><span class="glyphicon glyphicon-th-list"></span> Elimu</strong>
                            <strong class="green"><span class="fa fa-map-marker"></span> Kyela, Mbeya</strong>
                            <button type="button" class="btn btn-green btn-xs pull-right" data-dismiss="modal">View</button>
                        </div>

                        <div class="dataset-row type-2">
                            <h3>Bei za Dawa zinazopatikana kwenye Dispensari.</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <br />
                            <strong class="red" style="margin-right:30px;"><span class="glyphicon glyphicon-th-list"></span> Afya</strong>
                            <strong class="green"><span class="fa fa-map-marker"></span> Makangarawe - Temeke, Dar es Salaam</strong>
                            <button type="button" class="btn btn-green btn-xs pull-right" data-dismiss="modal">View</button>
                        </div>

                        <div class="dataset-row type-2">
                            <h3>Document Title</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <br />
                            <strong class="red" style="margin-right:30px;"><span class="glyphicon glyphicon-th-list"></span> Category Name</strong>
                            <strong class="green"><span class="fa fa-map-marker"></span> Ward - District, Region</strong>
                            <button type="button" class="btn btn-green btn-xs pull-right" data-dismiss="modal">View</button>
                        </div>

                        <div class="dataset-row type-2">
                            <h3>Document Title</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <br />
                            <strong class="red" style="margin-right:30px;"><span class="glyphicon glyphicon-th-list"></span> Category Name</strong>
                            <strong class="green"><span class="fa fa-map-marker"></span> Ward - District, Region</strong>
                            <button type="button" class="btn btn-green btn-xs pull-right" data-dismiss="modal">View</button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- close div .row -->

    </div><!-- close div .container -->

    <footer>
        <h4><strong>DATA</strong>BOX</h4>
        <span>&copy;2017 CodeForTanzania</span>
    </footer>

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('la-assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>

<html>