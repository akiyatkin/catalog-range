
Event.handler('Controller.onshow', function () {
	$('.multirange[multiranged!=true]').attr('multiranged','true').each(function(){
		var range = $(this);
		var min = range.find('.min');
		var max = range.find('.max');
		var minval = range.find('.minval');
		var maxval = range.find('.maxval');
		
		var m = range.data('m');
		var path = range.data('path');
		var step = Number(min.attr('step'));
		if (range.data('path') == "cost") {
			var pr = function(txt){
				return Template.scope['~cost'](txt);
			}
		} else {
			var pr = function(txt){
				return txt;
			}	
		}
		var set = function () {
			maxval.html(pr(max.val()));
			minval.html(pr(min.val()));
		}
		var go = function () {
			Ascroll.once = false;
			if (min.attr('min') == min.val() && min.attr('max') == max.val()) {
				Crumb.go('/catalog?m=' + m + ':'+path+'.minmax');
			}else if (min.val() == max.val()) {
				var minv = min.val() - step;
				var maxv = Number(max.val()) + step;
				console.log(maxv,typeof(maxv));
				if (minv < min.attr('min')) minv = min.attr('min');
				if (maxv > min.attr('max')) maxv = min.attr('max');

				Crumb.go('/catalog?m=' + m + ':' + path + '.minmax=' + minv + '/' + maxv);
			} else {
				Crumb.go('/catalog?m=' + m + ':' + path + '.minmax='+min.val()+'/'+max.val());
			}
			
		}
		
		range.find('.min').change( function (){
			if (Number(max.val()) < Number(min.val())) max.val(min.val());
			set();
			go();
		}).mousemove(function(){
			set();
		});
		range.find('.max').change( function (){
			if (Number(max.val()) < Number(min.val())) min.val(max.val());
			set();
			go();
		}).mousemove(function(){
			set();
		});
		set();
	});
});