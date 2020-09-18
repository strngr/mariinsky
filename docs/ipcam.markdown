---
layout: page
title:  Камеры
permalink: /ipcam/
---
<style>
    video#building {
        width: 100%;
    }
</style>

{% comment %}
<iframe width="100%" height="360px" allowfullscreen="allowfullscreen" src="https://live-tv.od.ua/ipcam/mariin/" allowtransparency="" frameborder="0" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no" style="padding: 0px; margin: 0px; border: 0px;"></iframe>
{% endcomment %}

<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<video id="building"></video>
<script>
  var video = document.getElementById('building');
  var videoSrc = 'https://cdn1.live-tv.od.ua:8083/mariin/mariin/playlist.m3u8';
  if (Hls.isSupported()) {
    var hls = new Hls();
    hls.loadSource(videoSrc);
    hls.attachMedia(video);
    hls.on(Hls.Events.MANIFEST_PARSED, function() {
      video.play();
    });
  } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
    video.src = videoSrc;
    video.addEventListener('loadedmetadata', function() {
      video.play();
    });
  }
</script>
