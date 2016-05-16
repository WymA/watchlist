$(function(){

    var path = window.location.protocol+"//"+window.location.host+"/watchlist" ;

    $.i18n.init({

	resGetPath: path+ '/locales/__lng__/__ns__.json',
	ns: 'translation'
	
    }, function() {

	$("html").i18n();
    });

});
