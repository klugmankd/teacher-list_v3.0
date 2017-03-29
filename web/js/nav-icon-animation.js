$(document).ready(function(){
    $('#nav-icon').click(function(){
        $(this).toggleClass('open');
        if (this.className == 'open')
            $("#navButtonsList").animate({height: "show"}, 300);
        else
            $("#navButtonsList").animate({height: "hide"}, 300);
    });
});