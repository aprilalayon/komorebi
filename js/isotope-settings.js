
jQuery(function ($) {

	
	// layout Isotope after each image loads
	$('.gallery-grid').imagesLoaded().progress( function() {
		$('.gallery-grid').isotope('layout');
	});

	

});


// Isotope Function
jQuery(function ($) {

	var $container = $('.gallery-grid'); //The ID for the list with all the work items
	$container.isotope({ //Isotope options, 'item' matches the class in the PHP
		itemSelector : '.item', 
		percentPosition: true,
  		layoutMode : 'masonry',
        masonry: {
			columnWidth: 10,
			hiddenStyle: {
				position: 'absolute'
				display: 'none'
			},
			visibleStyle: {
				position: 'none'
				display: 'block'
			},
			// resize: true,
			stagger: 50,
            // rowHeight: 50,
			// gutter: 10,
			// horizontalOrder: false,
            fitWidth: true,
          }
	});

	//Add the class selected to the item that is clicked, and remove from the others
	var $optionSets = $('#filters'),
	$optionLinks = $optionSets.find('a');

	$optionLinks.click(function(){
	var $this = $(this);
	// don't proceed if already selected
	if ( $this.hasClass('selected') ) {
	  return false;
	}
	var $optionSet = $this.parents('#filters');
	$optionSets.find('.selected').removeClass('selected');
	$this.addClass('selected');

	//When an item is clicked, sort the items.
	 var selector = $(this).attr('data-filter');
	$container.isotope({ filter: selector });

	return false;
	});
});
