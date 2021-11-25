// var fs = require('fs'),
//     args = require('system').args,
//     page = require('webpage').create();

// page.content = fs.read(args[1]);

// page.viewportSize = {
//     width: 1024,
//     height: 1024
// };

// page.paperSize = {
//     format: 'A4',
//     orientation: 'portrait',
//     margin: '1cm'
// };

// window.setTimeout(function () {
//     page.render(args[1]);
//     phantom.exit();
// }, 3000);

var output = "previewhtml/bb2a2667481755c210bb7cc557c60bd9.html";
var filename ='preview/'+output.substr(12, output.length-17)+'.jpeg'
console.log(filename);
phantom.exit()