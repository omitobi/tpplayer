<div id="list" class="col-lg-8 col-xs-12" >
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>Name </th>
            <th>Link</th>
            <th style="width: 10px">Available</th>
        </tr>
        </thead>
        <tbody id="fullList">
        @foreach($musics as $music)
        <tr id="m{{ $music->id }}">
            <td>{{$music->name}}</td>
            <td>{{$music->link}}</td>
            <td>{{$music->duration}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>