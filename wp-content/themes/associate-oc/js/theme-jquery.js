jQuery(document).ready(function($) {    
    $('ul li:first-child').addClass('first-child');
    $('ul li:last-child').addClass('last-child');
    $('ul li:nth-child(even)').addClass('even');
    $('ul li:nth-child(odd)').addClass('odd');
    $('table tr:first-child').addClass('first-child');
    $('table tr:last-child').addClass('last-child');
    $('table tr:nth-child(even)').addClass('even');
    $('table tr:nth-child(odd)').addClass('odd');
    $('tr td:first-child').addClass('first-child');
    $('tr td:last-child').addClass('last-child');
    $('tr td:nth-child(even)').addClass('even');
    $('tr td:nth-child(odd)').addClass('odd');
    $('div:first-child').addClass('first-child');
    $('div:last-child').addClass('last-child');
    $('div:nth-child(even)').addClass('even');
    $('div:nth-child(odd)').addClass('odd');


    $('#footer-widgets div.widget:first-child').addClass('first-child');
    $('#footer-widgets div.widget:last-child').addClass('last-child');
    $('#footer-widgets div.widget:nth-child(even)').addClass('even');
    $('#footer-widgets div.widget:nth-child(odd)').addClass('odd');
    
    var numwidgets = $('#footer-widgets div.widget').length;
    $('#footer-widgets').addClass('cols-'+numwidgets);
    
    //special for lifestyle
    $('.ftr-menu ul.menu>li').after(function(){
        if(!$(this).hasClass('last-child') && $(this).hasClass('menu-item') && $(this).css('display')!='none'){
            return '<li class="separator">|</li>';
        }
    });
    
    $('.header_tool_toggler').click(function(){
        $('.header_social_block').addClass('head_hided');
        $('div.header_tool_block').removeClass('toggled');
        $(this).parent('.header_tool_block').addClass('toggled');
    });
    $('.header_social_toggler').click(function(){
        $('div.header_tool_block').removeClass('toggled');
        $('.header_social_block').removeClass('head_hided');
    });
});