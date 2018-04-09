$(function () {

    //#region Sizing by devices

    if ($(window).width() < 768)
    {
        $('#menu-container').css('position', 'static');
        $('#menu-container').children().css('text-align', 'center');
        $('#menu-container').children().css('width', $(window).width());
    }
    else
    {
        $('#menu-container').css('position', 'fixed');
        $('#main-container').css('float', 'right');
        $('#main-container').css('width', 'calc(100% - 22%)')
    }

    $(window).resize(function() {

        if ($(window).width() < 768)
        {
            $('#menu-container').css('position', 'static');
            $('#menu-container').children().css('text-align', 'center');
            $('#main-container').css('width', '100%');
            $('#main-container').css('float', 'none')
        }
        else
        {
            $('#menu-container').css('position', 'fixed');
            $('#main-container').css('float', 'right');
            $('#main-container').css('width', 'calc(100% - 22%)')
        }

    });

    //#endregion

    //#region Changing selected values

    var bloodgroup = document.getElementById($('select#bloodgroup').attr('value'));
    var city = document.getElementById($('select#city').attr('value'));
    var gender = document.getElementById($('select#gender').attr('value'));

    bloodgroup.selected = true;
    city.selected = true;
    gender.selected = true;

    //#endregion

    // Saving modification from profile edit page
    $('#edit-button').click(function () {
        $('#edit-form').submit();
    });

    // Load file upload dialog on link click
    $("#upload-btn").click(function () {
        $('#img-file').click();
    });

    $("#img-file").change(function () {
        console.log('Changed');
        var files = $('#img-file').prop('files');
        $('#oavatar').attr('src', window.URL.createObjectURL(files[0]));
    })

});