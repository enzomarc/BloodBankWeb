$(function () {

    //#region Sizing by devices
    
    if ($(window).width() < 768)
    {
        $('#menu-container').css('position', 'static')
    }
    else
    {
        $('#menu-container').css('position', 'fixed')
        $('#main-container').css('float', 'right')
        $('#main-container').css('width', 'calc(100% - 22%)')
    }
    
    $(window).resize(function() {
        
        console.log($(window).width())
        
        $width = $(window).width()
        
        if ($width < 768)
        {
            $('#menu-container').css('position', 'static')
            $('#main-container').css('width', 'auto')
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