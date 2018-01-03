
Event.handler('Crumb.onchange', function () {
	$('.multirange').each(function(){
		var range = $(this);
		var min = range.find('.min');
		var max = range.find('.max');
		var minval = range.find('.min-val');
		var maxval = range.find('.max-val');
		range.find('.min').change( function (){
			if (Number(max.val()) < Number(min.val())) max.val(min.val());
			maxval.text(max.val());
			minval.text(min.val());
		}).mousemove(function(){
			minval.text(min.val());
		});
		range.find('.max').change( function (){
			if (Number(max.val()) < Number(min.val())) min.val(max.val());
			maxval.text(max.val());
			minval.text(min.val());
		}).mousemove(function(){
			maxval.text(max.val());
		});

	});
});