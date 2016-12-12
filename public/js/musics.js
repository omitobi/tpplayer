$(document).ready( function() {
    var player = document.getElementById('player');

    // $(player).attr('src', 'http://lgfkc.gcichurches.org/worshipmusic/mp3/Glorious Day (Living He Loved Me).mp3');

    // playNow();
    // var $playlist = getMusics();
    // console.log($playlist);
    // playNow(playlist[0]);
    // alert(getMusics());

    function playNow(src) {
        $(player).attr('src', src);
        player.play();
    }

    IDs = [];
    $("#fullList").find("tr") .each(
        function(){
            IDs.push(this.id);
        });
    // alert(IDs);

    //When the track ends, play again
    $(player).on('ended', function() {
        alert('hurray!');
        for(j=0; j<IDs.length; j++){
            if($('#'.concat(IDs[j])).hasClass('active')){
                alert('yeah'.concat('#'.concat(IDs[j])));
                $( '#'.concat(IDs[j]) ).removeClass('active');
                $( '#'.concat(IDs[j]) ).next().addClass('active');
                break;
            }
        }
        playNext();
        // $musicList.val($('#mlist option:selected').next().val()).change();
    });
    isWorkingMusic('http://lgfkc.gcichurches.org/worshipmusic/mp311/Glorious Day (Living He Loved Me).mp3');
    function isWorkingMusic($url) {
        $.ajax( $url )
            .always(function (jqXHR) {
                    console.log(jqXHR.status);
                });
    }

    // function makePlayList() {
    //     // alert('yes');
    //     var list = [];
    //     $.ajax({
    //         url: '/api/musics',
    //         type: 'get',
    //         dataType: 'json',
    //         beforeSend: function () {
    //             //     if (!$modal.find('.dimmer').hasClass('active')) {
    //             //         $modal.find('.dimmer').addClass('active');
    //             //     }
    //
    //         },
    //         success: function (data) {
    //             // alert(data[1].link);
    //             // $.each(data, function (i, obj) {
    //             //         $.each(obj, function (key, val) {
    //             //             list.push(val);
    //             //         });
    //             //     // list.push(val.link);
    //             // });
    //             for(i=0; i<data.length; i++){
    //                 list.push(data[i].link)
    //             }
    //             // alert (list[0]);
    //             console.log(list);
    //             return list;
    //         },
    //         error: "something"
    //     });
    // }
    // alert($("#fullList").find("#m5").text());
    $("#fullList").find("#m6").addClass('active');
    playNext();
    function playNext() {
        var ID = $("#fullList").find("tr.active").attr('id')[1];
        $.ajax({
            url: '/api/musics/'.concat(ID),
            type: 'get',
            dataType: 'json',
            success: function (data) {
                playNow(data.link);
            },
            error: 'something went wrong!'
        });
    }
});