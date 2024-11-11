(function($) {
	$.fn.btnAni = function(options) {
		var settings = $.extend({
			'location'         : 'top',
			'background-color' : 'blue'
		}, options);
		return this.each(function() {
			if(!$(this).data('btnany')) {
				const text = $.trim($(this).text()).replace(/\s/g, '\xa0'),
					regex = /(.)/g,
					subst = `<span>$1</span>`;
				this.innerHTML = text.replace(regex, subst);
				$(this).attr({
					'data-before': text
				}).data({
					'btnany': true
				});
			}
		});
	};
})(jQuery);