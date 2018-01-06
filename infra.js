
Event.handler('Controller.onshow', function () {
	$('.multirange[multiranged!=true]').attr('multiranged','true').each(function(){
		var range = $(this);
		var min = range.find('.min');
		var max = range.find('.max');
		var minval = range.find('.minval');
		var maxval = range.find('.maxval');
		
		var m = range.data('m');
		var path = range.data('path');

		if (range.data('path') == "cost") {
			var pr = function(txt){
				return Template.scope['~cost'](txt);
			}
		} else {
			var pr = function(txt){
				return txt;
			}	
		}
		var set = function(){
			maxval.html(pr(max.val()));
			minval.html(pr(min.val()));
		}
		
		range.find('.min').change( function (){

			if (Number(max.val()) < Number(min.val())) max.val(min.val());
			set();

			Ascroll.once = false;
			Crumb.go('/catalog?m=' + m + ':'+path+'.minmax='+min.val()+'/'+max.val());
			
		}).mousemove(function(){
			set();
		});
		range.find('.max').change( function (){

			if (Number(max.val()) < Number(min.val())) min.val(max.val());
			set();

			Ascroll.once = false;
			Crumb.go('/catalog?m=' + m + ':'+path+'.minmax='+min.val()+'/'+max.val());

		}).mousemove(function(){
			set();
		});
		set();
	});
});