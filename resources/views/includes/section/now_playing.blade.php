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