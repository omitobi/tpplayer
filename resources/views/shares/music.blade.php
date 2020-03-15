<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playing...</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
{{--    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="/css/css.css">
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body>

    <div class="container" align="center">

        <div class="row">
            <div class="col-md-4 col-sm-0">
            </div>
            <div class="col-md-4 col-sm-12">
                <div>
                    <img src="{{asset('images/cover.jpg')}}" width="100%">
                </div>
                <audio controls="controls" src="{{ $music->link }}" id="player" style="width:100%;">
                    Your browser does not support the audio element.
                </audio>
                <div id="controller" align="center" class="row">
                    <div class="col-xs-2 offset-1">
                        <a class="btn btn-primary" id="vup" onclick="document.getElementById('player').volume += 0.1">^</a>
                    </div>
                    <div class="col-xs-2">
                        <a class="btn btn-success" id="vdown" onclick="document.getElementById('player').volume -= 0.1">v</a>
                    </div>
                    <div class="col-xs-2">
                        <a class="btn btn-danger" id="mute" onclick="document.getElementById('player').volume = 0">(X)</a>
                    </div>
                    <div class="col-xs-2" >
                        <a class="btn btn-danger" id="unmute" onclick="document.getElementById('player').volume = 1">(&gt;)</a>
                    </div>
                    <div class="col-xs-2 offset-1" >
                        <a class="btn btn-primary"> (o) </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-0">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-0">
            </div>
            <div class="col-md-4 offset-2 col-sm-12">
                <hr>
                Playing: <h4>{{ $music->name }}</h4>
            </div>
            <div class="col-md-4 col-sm-0">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-0">
            </div>
            <div class="col-md-4 offset-2 col-sm-12">
                <hr>
               More at: <a href="{{ url('/musics') }}">Tp Player</a>
            </div>
            <div class="col-md-4 col-sm-0">
            </div>
        </div>
    </div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
{{--    <script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    <script src="/js/general.js"></script>
</body>
</html>