<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="./assets/ico/favicon.png">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <!--- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/dist/css/bootstrap.min.css">
    <!-- Optional theme -->
    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="/dist/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="/dist/js/jquery-1.11.3.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.3/jquery.xdomainrequest.min.js"></script>
    <!--- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> -->
    <script src="/dist/js/bootstrap.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.8.3.js"></script>


    <!-- Custom styles for this template -->
    <link media="all" type="text/css" rel="stylesheet" href="http://quote.shipwithsonic.com/datepicker/css/datepicker.css">

    <link media="all" type="text/css" rel="stylesheet" href="http://quote.shipwithsonic.com/assets/css/bs-callout.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/assets/js/html5shiv.js"></script>
    <script src="/assets/js/respond.min.js"></script>
    <![endif]-->


    <script type="text/javascript">
        function test(){

            if( $('#MoveType').val() == "0" ){

                $("#errorMessage").show();

                return false;
            }
            else {

                return true;

            }
        }
    </script>
    @yield('javascript')
</head>
<body>


<style>

    body { margin: 0px; padding-top: 0px; min-height: 300px; background-color: #342d25; background-attachment: fixed;
        background-image: url("/images/splash-bg2.jpg");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .container { border: 0px solid #303030; }
    #header {
        padding-left: 35px;
        height: 60px;
        margin: 0px;
        padding-top: 10px;
        background-color: #006325;
    }
    #footer {
        width: 100%;
        height: 30px;
        padding-top: 5px; padding-bottom: 5px;
        background-color: #006325;
        bottom: 0; position: fixed;
        color: #ffffff;
        text-align: center;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    #call { display: none; }
    #GetAQuoteBox { border-left: 1px solid lightgrey; }
    @media  screen and (max-width: 600px) {
        body{
            padding-top:0;
        }
        #header {
            border-bottom: 0px;
            width: 100%;
            max-height: 80px;
            margin-left: auto; margin-right: auto;


        }
        #header img {
            width: 100%;
        }
        #call {
            display: block;
        }
        #multivin{
            display: none;
        }
        #GetAQuoteBox{
            border: 0px;
        }
    }
    .panel { border: 2px solid #2B2B2B; margin-top: 50px;}
    .panel > .panel-heading {
        background-image: none;
        color: white;
        font-weight: bold;
        background-color: #419641;

    }

</style>
@yield('style')

<div class="container-fluid">

    <div class="row">
        <div id="header">
            <a href="http://metrogistics.com">
                <img src="http://new.metrogistics.com/wp-content/uploads/2015/03/logo.png">
            </a>
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>

</div> <!-- /container -->

<div id="footer" class="container-fluid">
    Copyright © {!! Carbon\Carbon::now()->format('Y') !!}, MetroGistics, LLC. All rights reserved
</div>
</body>
</html>