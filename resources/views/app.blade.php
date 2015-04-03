<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="qc:admins" content="350727502141463016671563757" />
        <title>{{ Config::get('app.site_title') }}</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-multiselect.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!-- Scripts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/bootbox.js') }}"></script>
        <script src="{{ asset('js/bootstrap-multiselect.js') }}"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">{{ Config::get('app.site_title') }}</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('categories') }}">Categories</a></li>
                        <li><a href="{{ url('magazines') }}">Magazines</a></li>
                    </ul>                    
                </div>
            </div>
        </nav>

        @if(Session::has('message'))
        <div class="row">
            <div class="col-sm-1">&nbsp;</div>
            <div class="col-sm-10 text-center">
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
        @endif
        @if(Session::has('error_message'))
        <div class="row">
            <div class="col-sm-1">&nbsp;</div>
            <div class="col-sm-10 text-center">
                <p class="alert alert-danger">{{ Session::get('error_message') }}</p>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
        @endif

        @yield('content')

        <script type="text/javascript">
            function Confirm(URL, TXT) {
                bootbox.confirm(TXT, function(result) {
                    if (result)
                        self.location = URL;
                });
            }
        </script>        
    </body>
</html>
