$( document ).ready(function() {
    var clickCheck = 0;
    $('.table-striped .btn-info').click(function () {
        $('#status-menu').hide();
        var position = $(this).position();
        var cPosition = $('#chat-menu').position();
        $('#chat-menu').css({top: position.top+35, left: position.left, position:'absolute'});
        if(position.top+35 == cPosition.top && clickCheck == 1 ){
            $('#chat-menu').hide();
            clickCheck = 0;
        }else {
            $('#chat-menu').show();
            clickCheck = 1;
        }
    });

    $('#chat-menu li').click(function(){
       var litext = $(this).text();
        $('#chat-menu').hide();
        clickCheck = 0;
    });

    var currentStatus = false; var clickCheckS = 0;
    $('.table-striped .btnsts').click(function(){
        currentStatus = $(this);
        $('#chat-menu').hide(); clickCheck = 0;
        var position = $(this).position();  var sPosition = $('#status-menu').position();
        $('#status-menu').css({top: position.top+55, left: position.left, position:'absolute'});
        if(position.top+55 == sPosition.top && clickCheckS == 1 ){
            $('#status-menu').hide();
            clickCheckS = 0;
        }else {
            $('#status-menu').show();
            clickCheckS = 1;
        }
     });

    $('#status-menu li').click(function(){
        currentStatus.removeClass();
        var litext = $(this).text();
        var licls = $(this).attr("title");
        currentStatus.addClass("btnsts status "+licls);
        currentStatus.html("<span>"+litext+"</span>");
        $('#status-menu').hide();clickCheckS = 0;
    });


    $('.table-striped .btn-success').click(function(){
        var phone = $(this).attr('phone');
        // Call our ajax endpoint on the server to initialize the phone call
        $.ajax({
            url: '/vendor/call.php',
            method: 'POST',
            dataType: 'json',
            data: {
                userPhone: phone
            }
        }).done(function(data) {
            // The JSON sent back from the server will contain a success message
            alert(data.message);
        }).fail(function(error) {
            alert(JSON.stringify(error));
        });

    });



});