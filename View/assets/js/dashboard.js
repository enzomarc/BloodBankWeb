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
        $('#main-container').css('width', 'calc(100% - 22%)');
    }

    $(window).resize(function() {

        if ($(window).width() < 768)
        {
            $('#menu-container').css('position', 'static');
            $('#menu-container').children().css('text-align', 'center');
            $('#main-container').css('width', '100%');
            $('#main-container').css('float', 'none');
        }
        else
        {
            $('#menu-container').css('position', 'fixed');
            $('#main-container').css('float', 'right');
            $('#main-container').css('width', 'calc(100% - 22%)');
        }

    });

    //#endregion

    //#region Changing selected values

    var bloodgroup = document.getElementById($('select#bloodgroup').attr('value'));
    var city = document.getElementById($('select#city').attr('value'));
    var gender = document.getElementById($('select#gender').attr('value'));

    if (bloodgroup != null) bloodgroup.selected = true;
    if (city != null) city.selected = true;
    if (gender != null) gender.selected = true;

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
        var files = $('#img-file').prop('files');
        $('#oavatar').attr('src', window.URL.createObjectURL(files[0]));
    });

    //#region Donation & Request Section

    $('a.donate-btn').click(function () {
        var hospital = $(this).prop('id');
        var unit = $('input#unit').val();
        $.ajax({
            url: "Controller/Donation/AddDonation.php",
            method: "POST",
            data: "hospital=" + hospital + "&unit=" + unit,
            success: function(data) {
                if (data === "Success")
                    location.replace('index.php?p=dashboard&v=donations');
                else
                    alert(data);
            },
            error: function(data) {
                if (data === "Success")
                    location.replace('index.php?p=dashboard&v=donations');
                else
                    alert(data);
            }
        });
    });

    $('a.cancel-btn').click(function () {
        var donation_id = $(this).prop('id');
        $.ajax({
            url: "Controller/Donation/DeleteDonation.php",
            method: "POST",
            data: "id=" + donation_id,
            success: function(data) {
                if (data === "Success")
                    location.replace('index.php?p=dashboard&v=donations');
                else
                    alert(data);
            },
            error: function(data) {
                if (data === "Success")
                    location.replace('index.php?p=dashboard&v=donations');
                else
                    alert(data);
            }
        });
    });

    $('a.req-cancel-btn').click(function () {
        var request_id = $(this).prop('id');
        $.ajax({
            url: "Controller/Request/DeleteRequest.php",
            method: "POST",
            data: "id=" + request_id,
            success: function (data) {
                if (data === "Success")
                    location.replace('index.php?p=dashboard&v=requests');
                else
                    alert(data);
            },
            error: function (data) {
                if (data === "Success")
                    location.replace('index.php?p=dashboard&v=requests');
                else
                    alert(data);
            }
        });
    });

    $('a#search-request-btn').click(function () {
        $('#searching-label').fadeIn(200);
        var unit = $('input#unit').val();
        var bloodgroup = $('span.user-bg').prop('id').toUpperCase();
        $('tbody').empty();
        $.ajax({
            url: "Controller/Hospital/RequestHospital.php",
            method: "POST",
            data: "amount=" + unit + "&bloodgroup=" + bloodgroup,
            success: function (data) {
                $('tbody').append(data);
            },
            error: function (data) {
                $('tbody').append(data);
            }
        });
        $('#select-title').fadeIn(200);
        $('#result-table').fadeIn(200);
        $('#searching-label').fadeOut(200);
    });

    $('a.hospital-donate-btn').click(function () {
        var unit = $(this).parent().parent().children('.unit-td').children()[0].value;
        var request_id = $(this).parent().parent().prop('id');
        $.ajax({
            url: "Controller/Donation/AddDonation.php",
            method: "POST",
            data: "id=" + request_id + "&unit=" + unit,
            success: function (data) {
                if (data === "Success")
                    location.replace('index.php?p=dashboard&v=donations');
                else
                    alert(data);
            },
            error: function (data) {
                if (data === "Success")
                    location.replace('index.php?p=dashboard&v=donations');
                else
                    alert(data);
            }
        });
    });

    //#endregion

});