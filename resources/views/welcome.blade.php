<!DOCTYPE html>
<head>
    <title>Play your music </title>

    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    {{--<link rel="stylesheet" type="text/css" href="css/style.css">--}}
    <script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/js.js"></script>
    <script type="text/javascript" src="/js/act.js"></script>
    <script type="text/javascript" src="js/html5slider.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div style="width: 100%">
        <select id="mlist">
            <option value="http://stansarea.com/Christian/ChristianMusic/RevivalHynms06Ajukebox_files/Lord%20Have%20Mercy.mp3">--- Select Music ---</option>
            <option value="http://stansarea.com/Christian/ChristianMusic/RevivalHynms06Ajukebox_files/Yes,%20I%20Know%20--%20Gaither%20Vocal%20Band.mp3">Come Ye Sinners</option>
        </select>
        <a class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Music!</a>
    </div>


    <div style="margin-left: 5px; margin-right: 10px; background-color: black">
        <div style="margin-top: 5px; width: 25%; float: left; border: 5px">
            <div style="width: 79%; height: 300px; background-image:url('images/cover.jpg')">

            </div>
            <audio controls="controls" src="" id="player">
                Your browser does not support the audio element.
            </audio>
            <div id="controller">
                <a id="dur">Last Duration</a>
                <a class="button gradient" id="next">Next</a>
                <a class="button gradient" id="prev">Previous</a>
                <a class="button gradient" id="pause">Pause</a>
                <a class="button gradient" id="play">Play</a>
                <a class="button" id="vup" onclick="document.getElementById('player').volume += 0.1"></a>
                <a class="button" id="vdown" onclick="document.getElementById('player').volume -= 0.1"></a>
                <a class="button" id="mute" onclick="document.getElementById('player').volume = 0">Mute </a>
            </div>
        </div>
        <div id="list" class="" style="width: 75%; float: left">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name </th>
                    <th>Link</th>
                    <th>Available</th>
                </tr>
                </thead>
                <tbody id="fullList">
                <tr>

                </tr>
                </tbody>
            </table>
        </div>
    </div>
        <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add more Music (URL)</h4>
                </div>
                <div class="modal-body" id="mURLBody">
                    <p>
                        <form>
                        <input type="text" placeholder="http//something.com/music/GodIsgood.mp3" class="urlBox" required id="urlAdd">
                        <button type="button" class="btn btn-success" id="urlAdd">Add</button>
                        </form>
                    </p>
                    <input type="checkbox" id="pageCheck" />
                    <label for="pageCheck">Load Links from Page as well?</label>
                    <input type="checkbox" id="grabCheck" />
                    <label for="grabCheck">grab all mp3 links from this page?</label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    {{--<img class="cover" src="images/cover.jpg" alt="">--}}

    {{--<div class="player gradient">--}}

        {{--<a class="button gradient" id="play" href="" title=""></a>--}}
        {{--<a class="button gradient" id="mute" href="" title=""></a>--}}


        {{--<input type="range" id="seek" value="0" max=""/>--}}


        {{--<a class="button gradient" id="close" href="" title=""></a>--}}

    {{--</div><!-- / player -->--}}

    {{--</div><!-- / Container-->--}}
</body>
</html>