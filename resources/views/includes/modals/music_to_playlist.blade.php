@if(Auth::check())
    <div class="modal fade music-to-playlist-sm" tabindex="-1" role="dialog" id="music-to-playlist-modal">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title">Add to Music</h5>
                </div>

                <div class="modal-body">
                    <div class="row">
                            <table class="table table-list-search" id="add-to-playlist-tb">
                                {{ csrf_field() }}
                                <thead>
                                <tr>
                                    <th><i>Name</i></th>
                                    <th><i>Type</i></th>
                                    <th><i>Description</i></th>
                                    <th><i></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($playlists as $playlist)
                                    <tr>
                                        <td class="hidden mtp_core_pl">{{ $playlist->id }}</td>
                                        <td>{{ $playlist->name }}</td>
                                        <td>{{ $playlist->type }}</td>
                                        <td>{{ $playlist->description }}</td>
                                        <td class="mtp_core_add"><a style="height: 25px" class="label label-info">
                                                <i class="glyphicon glyphicon-plus"></i></a></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="hidden" id="mtp_core_music"></td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif