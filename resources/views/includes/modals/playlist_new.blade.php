<div class="modal fade new-playlist-sm" tabindex="-1" role="dialog" id="new-playlist-modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Playlist</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                        <form id="new-playlist-form">
                            <div class="form-group">
                                {{ csrf_field() }}
                                <input type="text" name="name" placeholder="Name" required="required" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" value="">
                                <input type="text" name="type" placeholder="Type of playlist" class="form-control {{ $errors->has('type') ? 'has-error' : '' }}" value="">
                                <textarea name="description" placeholder="description" class="form-control {{ $errors->has('description') ? 'has-error' : '' }}"></textarea>
                            </div>
                            <input type="submit" value="Add" name="submit" class="btn btn-primary" id="new-playlist-form-btn" >
                        </form>
                    </div>
                <div class="col-md-1"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>