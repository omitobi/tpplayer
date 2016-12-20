$(document).ready( function() {
    var player = document.getElementById('player');

    // // $(player).attr('src', 'http://lgfkc.gcichurches.org/worshipmusic/mp3/Glorious Day (Living He Loved Me).mp3');
    //
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
        // alert('hurray!');
        // for(j=0; j<IDs.length; j++){
        //     if($('#'.concat(IDs[j])).hasClass('active')){
        //         alert('yeah'.concat('#'.concat(IDs[j])));
        //         $( '#'.concat(IDs[j]) ).removeClass('active');
        //         $( '#'.concat(IDs[j]) ).next().addClass('active');
        //         break;
        //     }
        // }
        setNext();
        playNext();
        // $(player).on("error", function (e) {
        //     playNext();
        //     return false;
        // });
        // $musicList.val($('#mlist option:selected').next().val()).change();
    });

    function setNext(){
        for(k=0; k<IDs.length; k++){
            if($('#'.concat(IDs[k])).hasClass('active')){
                console.log('yeah playing next'.concat('#'.concat(IDs[k])));
                if(!$('#fullList #'.concat(IDs[k])).is(":last-child")) {
                    $('#'.concat(IDs[k])).removeClass('active');
                    $('#'.concat(IDs[k])).next().addClass('active');
                    break;
                }else {
                    $( '#'.concat(IDs[k]) ).removeClass('active');
                    playFirst();
                    break;
                }

            }
        }


    }

    function setPrev(){
        for(k=(IDs.length-1); k>=0; k--){
            if($('#'.concat(IDs[k])).hasClass('active')){
                console.log('yeah Previous next'.concat('#'.concat(IDs[k])));
                if(!$('#fullList #'.concat(IDs[k])).is(":first-child")) {
                $( '#'.concat(IDs[k]) ).removeClass('active');
                $( '#'.concat(IDs[k]) ).prev().addClass('active');
                break;
            }else{
                    $( '#'.concat(IDs[k]) ).removeClass('active');
                    playLast();
                    break;
                }
            }
        }
    }

    // isWorkingMusic('http://lgfkc.gcichurches.org/worshipmusic/mp33/Glorious Day (Living He Loved Me).mp3');
    // function isWorkingMusic($src) {
    //     $(player).attr('src', $src);
    //
    //     // try {
    //     //     $('#player').play();
    //     // } catch (e) {
    //     //     alert("Error playing file!");
    //     // }
    //
    //     $(player).on("error", function (e) {
    //         alert('error');
    //         return false;
    //     });
    //     alert('playing...');
    //     return true;
    // }


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

    $("#controller").find('#next').on('click', function () {
        setNext();
        playNext();
    });

    $("#controller").find('#prev').on('click', function () {
        setPrev();
        playNext();
    });

    function playLast() {
        var first = $("#fullList").find('tr').last();
        $(first).addClass('active');
        playNext();
    }

    function playFirst() {
        var first = $("#fullList").find('tr')[0];
        $(first).addClass('active');
        playNext();
    }

    playFirst();

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
    // makePlayList();
    function makePlayList() {
        var list = [];
        $.ajax({
            url: '/api/musics',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
            },
            error: 'something went wrong!'
        });
    }
});