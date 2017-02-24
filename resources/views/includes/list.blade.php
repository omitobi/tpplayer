<div id="list" class="col-lg-8 col-xs-12" >
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th class="col-lg-2">Name </th>
            <th class="col-lg-2">Available</th>
            @if(!Auth::guest())<th></th>@endif
            @if(!Auth::guest())<th></th>@endif
        </tr>
        </thead>
        <tbody id="fullList">
        @foreach($musics as $music)
        <tr id="m{{ $music->music->id }}">
            <td>{{$music->music->name}}</td>
            <td>{{$music->music->duration}}</td>
            @if(!Auth::guest())<td><a href="musics/{{ $music->music->id }}/edit" class="btn btn-primary">Edit</a></td>@endif
            @if(!Auth::guest())<td><a class="btn btn-danger delete-btn" data-toggle="modal" data-target=".bs-example-modal-sm">Delete</a></td>@endif
        </tr>
        @endforeach
        </tbody>
    </table>
</div>