<div id="list" class="col-lg-3">
    <table class="table">
        <thead>
        <tr>
            <th style="min-width: 100px">Name </th>
            <th>Link</th>
            <th style="width: 10px">Available</th>
            @if(!Auth::guest())<th></th>@endif
        </tr>
        </thead>
        <tbody id="fullList">
        @foreach($musics as $music)
        <tr id="m{{ $music->id }}">
            <td>{{$music->name}}</td>
            <td>{{$music->link}}</td>
            <td>{{$music->duration}}</td>
            @if(!Auth::guest())<td><a href="musics/{{ $music->id }}/edit" class="btn btn-primary">Edit</a></td>@endif
        </tr>
        @endforeach
        </tbody>
    </table>
</div>