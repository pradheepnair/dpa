<?php
/**
 * The template for displaying home page videos.
 *
 * @package     Dubai Private Adventure Theme
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0.0
 */
global $post;
?>
<script src="https://www.youtube.com/iframe_api"></script>
<script>
  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('video-placeholder', {
      videoId: 'kNiBYvHCI6M',
      playerVars: {
        'autoplay': 1,
        'controls': 0,
        'start': 0,
        'end': 43,
        'mute': 1,
        'loop': 1,
        'playlist': 'kNiBYvHCI6M'
      },
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
  }

  function onPlayerReady(event) {
    event.target.playVideo();
  }

  function onPlayerStateChange(event) {
    if (event.data === YT.PlayerState.PLAYING) {
      setTimeout(checkTime, 1000);
    }
  }

  function checkTime() {
    var currentTime = player.getCurrentTime();
    if (currentTime >= 42) { // Restart just before it ends
      player.seekTo(0);
    }
    setTimeout(checkTime, 1000);
  }
</script>
<!-- banner starts -->
    <section class="banner overflow-hidden">
        <div class="banner-main">
            <div class="banner-image" style="background-image: url('<?php echo DPA_THEME_URI; ?>/assets/images/2023/bg/bg-video.jpg'); background-repeat: no-repeat; background-size: cover;">
                <div class="video-banner-yt"> 
                    <iframe id="video-placeholder" src="https://www.youtube.com/embed/kNiBYvHCI6M?autoplay=1&mute=1&controls=0&loop=1&playlist=kNiBYvHCI6M&enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                </div>
                <div class="dot-overlay"></div>
            </div>
            <div class="banner-content"> 
                <?php echo $post->post_content; ?>
            </div>
            
        </div>
    </section>
    <!-- banner ends -->