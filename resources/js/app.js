const { forOwn } = require('lodash');

require('./bootstrap');

require('alpinejs');

function foo(url)
{
  var video = document.getElementById('videoplayer');
  video.src = "MyUploads/"+url;
  video.play();
}