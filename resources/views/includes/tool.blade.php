
<div class="col-lg-3 col-xs-12">
    <div class="row">
        <div>
            <div >
                <img src="images/cover.jpg" width="100%">
            </div>
            <audio controls="controls" id="player" style="width:100%;">
                Your browser does not support the audio element.
            </audio>
            <div id="controller" class="row">
                <div class="col-xs-2">
                    <a class="btn active small" id="prev"> &lt;&lt;</a>
                </div>
                <div class="col-xs-2 col-lg-offset-1">
                    <a class="btn active small" id="next">&gt;&gt;</a>
                </div>
                <div class="col-xs-2  col-lg-3 col-lg-offset-1">
                    <a class="btn btn-primary" id="vup" onclick="document.getElementById('player').volume += 0.1">^</a>
                </div>
                <div class="col-xs-2 col-lg-3 ">
                    <a class="btn btn-success" id="vdown" onclick="document.getElementById('player').volume -= 0.1">v</a>
                </div>
                <div class="col-xs- col-lg-3">
                    <a class="btn btn-danger" id="mute" onclick="document.getElementById('player').volume = 0">(X)</a>
                </div>
                <div class="col-xs-2 col-lg-3" >
                    <a class="btn btn-danger" id="unmute" onclick="document.getElementById('player').volume = 1">(&gt;)</a>
                </div>
                <div class="col-xs-2 col-lg-3" >
                    <a class="btn" id="random">(~)</a>

                </div><div class="col-xs-2 col-lg-3" >
                    <a class="btn btn-block" id="repeat"> (o) </a>
                </div>
                {{--<a id="dur">Last Duration</a>--}}


                {{--<a class="button gradient" id="pause">Pause</a>--}}
                {{--<a class="button gradient" id="play">Play</a>--}}




                {{--<a class="button loadAll" style="cursor: auto">All</a>--}}
            </div>
        </div>
    </div>
    <div class="row">
        <hr>
    </div>
    <div class="row" id="now_playing">
        <div>
            <table class="table" id="now-playing-tb">
                <thead>
                <tr>
                    <td colspan="2" align="center" class="active"><b>Now Playing...</b></td>
                </tr>
                </thead>
                <tr>
                    <td><b>Name</b></td>
                    <td id="np_name"></td>
                </tr>
                <tr>
                    <td><b>Artist</b></td>
                    <td id="np_artist">Don Moen</td>
                </tr>
                <tr>
                    <td><b>Duration</b></td>
                    <td id="np_duration"></td>
                    <td id="np_core" class="hidden"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <a class="btn btn-info add-to-playlist-btn" data-toggle="modal" data-target=".music-to-playlist-sm">
                            Add to my Playlist
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">

                        <div class="row">
                            <div class="col-md-1"></div>

                            <form id="new-music">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="route" value="{{ route('api.music.add') }}">
                                        <input align="center" class="form-control-lg" type="text" placeholder="Add another music">
                                        <span class="input-group-btn">
                                            <a href="" id="_new_music_add_btn" class="btn-sm btn-default">
                                                <i class="glyphicon glyphicon-plus-sign alert-danger"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </td>

                </tr>
            </table>
        </div>

    </div>


</div>