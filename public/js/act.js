

$(document).ready( function() {

    // $(".updater").on('click', function () {
    //     alert("OOOOOOOOOOO");
    // });

    $(".update-form").on('submit', function (e) {
        e.preventDefault();
        console.log(this.id.value);
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
        var url = this.route.value;
        alert(url);
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
                console.log(response);
                // if(response.result === 'success'){
                //     $this.find('#update-btn').notify(
                //         response.message,
                //         "success"
                //     );
                //     setTimeout(function(){
                //         location.replace ('/musics');
                //     },1500);
                //
                // } else {
                //     $this.find('#update-btn').notify(
                //         response.message,
                //         "error"
                //     );
                // }
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

});