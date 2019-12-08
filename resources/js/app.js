/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

function copyToClipboard(text) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(text).select();
    document.execCommand("copy");
    $temp.remove();
}

app = {};

app.init = function () {
	app.Cms.init();
}

app.Cms = {
	init: function () {
		app.Cms.copyLinks();
		app.Cms.confirmSubmit();
	},
	copyLinks: function () {
		$('.js-copy-link').on('click', function () {
			let link = $(this).closest('.link-wrapper').find('.link').attr('href');
			copyToClipboard(link);
			alert('Enlace copiado');
		});
	},
	confirmSubmit: function () {
		$('.js-confirm').on('submit', function () {
			let message = $(this).data('message');
			return confirm(message);
		});
	}
}


$( document ).ready(function() {
    app.init();
});

