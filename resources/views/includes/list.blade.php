<div id="list" class="col-lg-8 col-xs-12" >
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th class="col-lg-2">Name </th>
            <th class="col-lg-2">Available</th>
            @if(!Auth::guest())<th></th>@endif
        </tr>
        </thead>
        <tbody id="fullList">
        @foreach($musics as $music)
        <tr id="m{{ $music->id }}">
            <td>{{$music->name}}</td>
            <td>{{$music->duration}}</td>
            @if(!Auth::guest())<td><a href="musics/{{ $music->id }}/edit" class="btn btn-primary">Edit</a></td>@endif
        </tr>
        @endforeach
        </tbody>
    </table>
</div>