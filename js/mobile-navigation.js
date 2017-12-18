jQuery(function($){
    	     $( '.menu-toggle' ).click(function(){
                 $('.nav-mobile').slideToggle('expand');
    	     })
        })





jQuery(document).ready(function($){
    $( '.menu-item-has-children' ).click(function(){
    	    $('.dropdown-menu > li').slideToggle();
                $(this).toggleClass('toggle-on');
    	     
        });
        
	});