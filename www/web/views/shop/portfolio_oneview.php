


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->

<!-- fotorama.css & fotorama.js. -->
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->

<div style="background-color:#fff;">
  <div style="width:100%; height:32px; margin-top:15px; margin-right:15px;">
  <a href="#" onclick="window.history.go(-1); return false;"><img align = "right" src="/static/webimage/close.png" width="24px;" height="24px;"></a>
</div>
<!-- 2. Add images to <div class="fotorama"></div>. -->
<div class="fotorama" data-nav="thumbs" style="position:relative;  left: 50%; margin-top:60px; margin-left:-300px;">
        <?php for($i = 0 ; $i < count($portfolioOne[0]['photolist']) ; $i++){ ?>
          <img class="img-responsive full-width" src="/static/portfolio/<?php echo $portfolioOne[0]['photolist'][$i]['devidefolder'] .'/'. $portfolioOne[0]['photolist'][$i]['imageunqname']; ?>">

        <?php } ?>
</div>
<h4><b>제목 : <?php echo $portfolioOne[0]['introduce']; ?></b></h4>
<h4>프로젝트기간 : <?php echo $portfolioOne[0]['startdate'];?> ~ <?php echo $portfolioOne[0]['finishdate'];?>
</div>
