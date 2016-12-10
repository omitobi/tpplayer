<div class="col-lg-10 container">
    <form action="{{ route('music.add') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="link">Music URL:</label>
            <input type="text" name="link" class="form-control">
        </div>
        <input type="submit" value="Add" class="btn btn-success">
    </form>
    <div class="nv-indexLine"></div>
</div>