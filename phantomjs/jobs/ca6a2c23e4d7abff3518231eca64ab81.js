var page = require('webpage').create();
page.viewportSize = {width: 1366, height: 768};
page.clipRect = {"width":1366,"height":768,"top":0,"left":0};
page.open('http://localhost/niggs', function () {
	/* This will set the page background color white */
		page.evaluate(function() {
		document.body.bgColor = '#FFFFFF';
	});
	
	page.render('C:\\wamp64\\www\\av-code\\phantomjs/screencapture\\2018May01-worksaurus.png');
	phantom.exit();
});