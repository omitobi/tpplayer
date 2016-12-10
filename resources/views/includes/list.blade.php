<div id="list" class="pull-right" style="width: 60%">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name </th>
            <th>Link</th>
            <th style="width: 10px">Available</th>
        </tr>
        </thead>
        <tbody id="fullList">
        @foreach($musics as $music)
        <tr>
            <td>{{$music->name}}</td>
            <td>{{$music->link}}</td>
            <td>{{$music->duration}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>