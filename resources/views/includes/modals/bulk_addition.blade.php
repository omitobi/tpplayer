<div class="modal fade bulk-modal-lg" tabindex="-1" role="dialog" id="bulk-add-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Bulk Musics</h4>
            </div>

            <div class="modal-body">

                <div class="row">
                    <form id="bulk-add-form">
                        {{ csrf_field() }}
                        <input type="hidden" name="route" id="bulk-route" value="{{ route('api.music.bulk') }}">
                        <div class="col-xs-9   col-lg-8 col-lg-offset-2 col-xs-offset-0">
                            <div class="form-group">
                                <input type="text" name="bulk-link"  id="bulk-link" class="form-control"
                                       value="" placeholder="Enter site's Url" >
                            </div>
                        </div>

                        <div class="col-xs-2 col-lg-2">
                            <input type="submit" value="Find" class="btn btn-success load-bulk-btn">
                        </div>
                    </form>
                </div>

                <div id="bulk-site">

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger add-bulk-button">Add Musics</button>
            </div>
        </div>
    </div>
</div>