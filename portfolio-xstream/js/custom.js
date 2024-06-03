jQuery(document).ready(function($) {

	function getMaxOfArray(numArray) {
	  return Math.max.apply(null, numArray);
	}

	//Set elements equail height
	function setHeight(el) {
		var height = [];
		$(el).each(function(index, el) {
			height.push($(this).height());
		});
		$(el).css('min-height', getMaxOfArray(height)+5);
	}

	$(window).on('resize', function(){

		setHeight('#news .col-sm-4 p');
		setHeight('#news .col-sm-4 h5');
	})

	setHeight('#news .col-sm-4 p');
	setHeight('#news .col-sm-4 h5');
	
});