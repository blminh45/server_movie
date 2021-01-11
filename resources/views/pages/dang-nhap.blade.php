<!DOCTYPE html>

<head>
    <title>Five Boy Cinema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>

    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}" type="text/css" />
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/morris.css') }}" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="{{ asset('css/monthly.css') }}">
    <!-- //calendar -->
    <link href="{{ asset('css/phim.css') }}" rel='stylesheet' type='text/css' />
    <!-- //font-awesome icons -->
    <script src="{{ asset('js/jquery2.0.3.min.js') }}"></script>
    <script src="{{ asset('js/raphael-min.js') }}"></script>
    <script src="{{ asset('js/morris.js') }}"></script>
</head>

<body>
    <style>
        body{
            box-sizing: border-box;
        }
        .main{
            width: 40%;
            margin: 200px auto;
            background: white;
            padding: 3em;
                    
        }
        input{
            width: 100%;
        }
        button{
            width: 100%;
            margin: 10px auto;
        }
        h1{
            margin-bottom: 1em;
        }
    </style>
    <div class="container">
        <div class="main">
            <h1 class="text-center">Đăng nhập</h1>
            <form method="POST" action="{{url('/login')}}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control "
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>    
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="password" type="password"
                            class="form-control" name="password" required
                            autocomplete="current-password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input col-md-1" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                           Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/style.js') }}"></script>
</body>

</html>
