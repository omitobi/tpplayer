
<div>
<div class="row">
    <div class="col-lg-8">
       Playlists
    </div>
    <div class="col-lg-4">
        <a class="btn bg-info" id="new-playlist-toggle" data-toggle="modal" data-target=".new-playlist-sm">Create new Playlist</a>
    </div>
</div>
<div class="row">


    <div class="col-md-8">
        <div class="col-md-9">
            <div class="col-md-4">
                <form action="#" method="get">
                    <div class="input-group">
                        <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table table-list-search" id="pl_list_tb">
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
                        <td class="hidden pl_core">{{ $playlist->id }}</td>
                        <td class="pl_name"><b>{{ $playlist->name }}</b></td>
                        <td class="pl_type">{{ $playlist->type }}</td>
                        <td class="pl_description">{{ $playlist->description }}</td>
                        <td><a href="/musics?playlist={{ $playlist->id }}" style="height: 25px" class="label label-info pl_play">
                                <i class="glyphicon glyphicon-music"></i>Play</a></td>
                        <td><a style="height: 25px" class="label label-success pl_edit" data-toggle="modal" data-target=".update-playlist-sm">
                                <i class="glyphicon glyphicon-pencil"></i></a></td>
                        <td><a style="height: 25px" class="label label-primary pl_settings">
                                <i class="glyphicon glyphicon-star"></i></a></td>
                        <td><a style="height: 25px" class="label label-danger pl_delete" data-toggle="modal" data-target=".pl-delete-modal-sm">
                                <i class="glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
