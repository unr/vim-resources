(function($) {

var Vim = {
  common: {
    init: function() {
		// Turn on highlighting
		hljs.initHighlightingOnLoad();
    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Vim;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');
    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery);
