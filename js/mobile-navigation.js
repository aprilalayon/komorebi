jQuery(function($){
    	     $( '.menu-toggle' ).click(function(){
    	     $('.nav-mobile').toggleClass('expand')
    	     })
        })

jQuery(document).ready(function($){
	    $( '.menu-item-has-children' ).click(function(){
    	     $('.dropdown-menu > li').slideDown()
    	     })
	});