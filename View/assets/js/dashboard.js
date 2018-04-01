$(function () {

    //#region Sizing by devices
    
    if ($(window).width() < 768)
    {
        $('#menu-container').css('position', 'static')
        $('#menu-container').children().css('text-align', 'center')
        $('#menu-container').children().css('width', $(window).width())
    }
    else
    {
        $('#menu-container').css('position', 'fixed')
        $('#main-container').css('float', 'right')
        $('#main-container').css('width', 'calc(100% - 22%)')
    }
    
    $(window).resize(function() {
                
        $width = $(window).width()
        
        if ($width < 768)
        {
            $('#menu-container').css('position', 'static')
            $('#menu-container').children().css('text-align', 'center')
            $('#main-container').css('width', '100%')
            $('#main-container').css('float', 'none')
        }
        else
        {
            $('#menu-container').css('position', 'fixed')
            $('#main-container').css('float', 'right')
            $('#main-container').css('width', 'calc(100% - 22%)')
        }
        
    });
    
    //#endregion
    
});