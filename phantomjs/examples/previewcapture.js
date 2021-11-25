var webPage = require('webpage');
var page = webPage.create();
var fs = require('fs');
var system = require('system');
    

var output = system.args[1];
var address =  'https://advancecv.com/'+output;
// var address =  'http://127.0.0.1/av-code/'+output;
var filename ='preview/'+output.substr(12, output.length-17)+'.jpeg'

// page.viewportSize = { width: 2480, height: 3508 };
page.viewportSize = { width: 1000, height: 1414 };
// page.viewportSize = { width: 1920, height: 1080 };

page.open(address, function start(status) {
  if (status !== 'success') {
    console.log(address);
    console.log('Unable to load the address!');
    phantom.exit(1);
  } else {
    window.setTimeout(function () {
    page.render(filename, {format: 'jpeg', quality: '100'});
    phantom.exit();
  }, 10);
  }
});
