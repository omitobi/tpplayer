<div class="modal fade update-playlist-sm" tabindex="-1" role="dialog" id="update-playlist-modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">Update playlist</h5>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                        <form id="update-playlist-form">
                            <div class="form-group">
                                {{ csrf_field() }}
                                <input type="hidden" name="upl_core_playlist"  class="upl_core_playlist"  value="" />
                                <input type="text" name="name" placeholder="Name" required="required" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}">
                                <input type="text" name="type" placeholder="Type of playlist" class="form-control {{ $errors->has('type') ? 'has-error' : '' }}" >
                                <textarea name="description" placeholder="description" class="form-control {{ $errors->has('description') ? 'has-error' : '' }}"> </textarea>
                            </div>
                            <input type="submit" value="Update" name="submit" class="btn btn-primary update_pl_btn" >
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