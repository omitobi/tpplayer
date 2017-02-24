
<div>
<div class="row">
    <div class="col-lg-8">
       Playlists
    </div>
    <div class="col-lg-4">
        <a href="" class="btn bg-info">Create new Playlist</a>
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
                <table class="table table-list-search">
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
                        <td>{{ $playlist->name }}</td>
                        <td>{{ $playlist->type }}</td>
                        <td>{{ $playlist->description }}</td>
                        <td><a style="height: 25px" class="label label-info">Select playlist</a></td>
                        <td class="hidden">{{ $playlist->id }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>