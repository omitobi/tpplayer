

$(document).ready( function() {

    // $(".updater").on('click', function () {
    //     alert("OOOOOOOOOOO");
    // });

    $(".update-form").on('submit', function (e) {
        e.preventDefault();
        $this = $(this);
        $.ajax({
            type: "POST",
            url: "/api/musics/"+this.id.value,
            cache: false,
            data: {
                name: this.name.value,
                link: this.link.value,
                duration: this.duration.value,
                _token: this._token.value,
                _method: this._method.value
            },
            success: function (response) {
                response = JSON.parse(response);
                if(response.result === 'success'){
                    $this.find('#update-btn').notify(
                        response.message,
                        "success"
                    );
                    setTimeout(function(){
                        location.replace ('/musics');
                    },1500);

                } else {
                    $this.find('#update-btn').notify(
                        response.message,
                        "error"
                    );
                }
                // if (typeof response.error !== 'undefined'){
                //
                // }
            }
        });

    });


    $(".new-music").on('submit', function (e) {
        e.preventDefault();
        // var url = this.route.value;
        $this = $(this);
        $.ajax({
            type: "POST",
            url: "/api/musics",
            cache: false,
            data: {
                link: this.link.value,
                _token: this._token.value
            },
            success: function (response) {
                response = JSON.parse(response);
                if(response.result === 'success'){
                    $this.find('.form-control').notify(
                        response.message,
                        "success"
                    );
                    if(response.params)
                    {
                        console.log(response.params);
                        $('#fullList').append("" +
                            "<tr id='m"+response.params.id+"'>" +
                            "<td>"+response.params.name+"</td>" +
                            "<td>"+response.params.link+"</td>" +
                            "<td>"+response.params.duration+"</td>" +
                            "</tr>")
                    }

                } else {
                    $this.find('.form-control').notify(
                        response.message,
                        "error", { position:"right" }
                    );
                }
                // if (typeof response.error !== 'undefined'){
                //
                // }
            }
        });
    });
    
    
    // $.ajax({
    //     type: "PATCH",
    //     url: "/api/musics/update",
    //     dataType: "json",
    //     cache: false,
    //     data: {
    //         name: $('input#c_name').val(),
    //         address1: $('input#c_address1').val(),
    //         address2: $('input#c_address2').val(),
    //         address3: $('input#c_address3').val(),
    //         address4: $('input#c_address4').val(),
    //         company: $('input#c_company').val(),
    //         email: $('input#c_email').val(),
    //         mobile: $('input#c_mobile').val()
    //     },
    //     success: function (response) {
    //         $('#profile .main').css('opacity', '1');
    //         if (typeof response.error !== 'undefined') { // We have errors
    //             if (response.error.length > 0) { // We had input validation errors, append those
    //                 for (var i = 0; i < response.error.length; i++) {
    //                     Materialize.toast(response.error[i], 3000, 'rounded red');
    //                 }
    //             }
    //         } else { // We did not have any errors, close modal and reload page
    //             Materialize.toast(i18n.t('userInfo.detailsChanged'), 3000, 'rounded');
    //             $('#profile .editcustomer.errors').empty();
    //         }
    //     }
    // });


    var music_id = null;
    $(".delete-btn").on('click', function () {
        var sel_music = $(this).closest('tr');
        var sel_name = sel_music.children(':first-child').text();
        // $('#delete-modal').find('#exampleModalLabel').text('Delete '+ sel_name);
        var del_modal = $('#delete-modal');
        music_id =  sel_music.attr('id').split("m").pop();
        del_modal.find('h5').text(sel_name);
        del_modal.find('form input').val(music_id);
    });

    /**
     * Delete a music
     */
    $(".delete-music-btn").on('click', function (e) {
        $this = $(this);
        $.ajax({
            type: "DELETE",
            url: "/api/musics/" + music_id,
            cache: false,
            data: {_token: $('#delete-music-form').children(':first-child').val()},
            success: function (response) {
                if (response.result === 'success') {
                    $this.notify(
                        'Music deleted successfully',
                        "success"
                    );

                    setTimeout(function () {
                        location.replace('/musics');
                    }, 1500);

                } else {
                    $this.notify(
                        response.message,
                        "error"
                    );
                }
            }
        });
    });



});