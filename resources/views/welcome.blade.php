<!DOCTYPE html>
<head>
    <title>HTML5 Audio Tutorial</title>

    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/js.js"></script>
    <script type="text/javascript" src="js/html5slider.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<script>
    $(document).ready( function(){
//        $('audio').attr('src', 'http://dataup.sdasofia.org/MUSIC/Music-christian/The%20Forester%20Sister/Greatest%20Gospel%20Hits/Precious%20Memories.mp3');
//        document.getElementById('mlist').options[document.getElementById('mlist').selectedIndex].value
        $('#urlAdd').click(function () {
            var $url = $(".urlBox").val();
            if ($('.err').length) {
                $( ".err" ).empty();
            }
            if($url == ''|| $url == 'http//something.com/music/GodIsgood.mp3' || !/^http/.test($url)){
                $( "form" ).after( "<p style='color: red' class='err'><i>You need to add a URL</i></p>" );
            } else {

                var $sName = $url.substring($url.lastIndexOf('/') + 1);
                $('#mlist').append($('<option>',
                        {
                            value: $url,
                            text: $sName
                        }));
            }

        });

        var $musicNow = $('#mlist').val();
        $('audio').attr('src', $musicNow);
    });
</script>
</head>

<body>


    <div>
        <select id="mlist">
            <option value="0"> ------- first Music ------ </option>
            <option value="http://dataup.sdasofia.org/MUSIC/Music-christian/The%20Forester%20Sister/Greatest%20Gospel%20Hits/Precious%20Memories.mp3">Precious Memories</option>
        </select>
        <a class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Music!</a>
    </div>
    <div id="list" class="">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name </th>
                <th>Link</th>
                <th>Available</th>
            </tr>
            </thead>
            <tbody>
            <tr>

            </tr>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add more Music (URL)</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            <form>
                            <input type="text" placeholder="http//something.com/music/GodIsgood.mp3" class="urlBox" required>
                            <button type="button" class="btn btn-success" id="urlAdd">Add</button>
                            </form>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
    </div>
    <div class="container gradient">

    {{--<img class="cover" src="images/cover.jpg" alt="">--}}

    {{--<div class="player gradient">--}}

        {{--<a class="button gradient" id="play" href="" title=""></a>--}}
        {{--<a class="button gradient" id="mute" href="" title=""></a>--}}


        {{--<input type="range" id="seek" value="0" max=""/>--}}


        {{--<a class="button gradient" id="close" href="" title=""></a>--}}

    {{--</div><!-- / player -->--}}

    {{--</div><!-- / Container-->--}}
        <audio controls="controls" src="" id="player">
            Your browser does not support the audio element.
        </audio>
        <a class="button gradient" id="next" onclick="document.getElementById('player').src =''"></a>
        <a class="button gradient" id="play" onclick="document.getElementById('player').play()"></a>
        <a class="button gradient" id="pause" onclick="document.getElementById('player').pause()"></a>
        <a class="button gradient" id="vup" onclick="document.getElementById('player').volume += 0.1"></a>
        <a class="button gradient" id="vdown" onclick="document.getElementById('player').volume -= 0.1"></a>
        <a class="button gradient" id="mute" onclick="document.getElementById('player').volume = 0">Mute </a>
    </div>
</body>
</html>