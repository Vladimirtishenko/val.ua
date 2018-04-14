<?php
/* @var $model Video */
$this->pageTitle = Yii::app()->language == 'ru' ? $model->meta_title_ru : $model->meta_title_uk;
$this->pageDescription = Yii::app()->language == 'ru' ? $model->meta_description_ru : $model->meta_description_uk;
$this->metaAttributes[] = '<meta property="fb:app_id" content="1361253320577547"/>';
?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/public/js/_lib/masonry.pkgd.min.js', CClientScript::POS_END);?>
<?php 
    $dateNow = (new DateTime())->format('Y-m-d');
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v2.9&appId=1361253320577547";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<article class="val-column-left">
    <div class="val-single-news-conainer-with-read-else">
        <div class='val-container-one-news'>
            <h2 class="val-title-uppercase-with-line val-title-uppercase-small"><?= CHtml::encode(Yii::app()->language == 'ru' ? $model->title_ru : $model->title_uk); ?></h2>

            <div class="marketInOneVideoPageTop">
                <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>15)); ?>
            </div>

            <div class="val-description-block-gen-news">
                <span class="val-content-news-data"><?= ($dateNow == date('Y-m-d', strtotime($model->date))) ? date('H:i', strtotime($model->date)) : intval(date('d', strtotime($model->date))).' '.Yii::app()->controller->getMonth($model->date).' '.date('Y', strtotime($model->date)); ?></span>
            </div>
            
            <iframe allowfullscreen frameborder="0" width="100%" height="400px" src="http://www.youtube.com/embed/<?= $model->video; ?>" ></iframe>

            <div class="marketInOneVideoPagebottom">
                <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>16)); ?>
            </div>
    </div>
    <h2 class="val-title-uppercase-with-line">
            <span> <?= Yii::t('main', 'Коментарі'); ?> </span>
    </h2>
    <div class="val-outer-line-news">
            <div class="fb-comments" data-href="http://val.dev/uk/site/video/<?php echo $model->id; ?>" data-width="100%" data-numposts="5"></div>
    </div>
    <br>
    <div id="MIXADV_4308" class="MIXADVERT_NET"></div>
    <br>
    <div id="adpartner-jsunit-2047">
        <script type="text/javascript">
            var head = document.getElementsByTagName('head')[0];
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = "//a4p.adpartner.pro/jsunit?id=2047&" + Math.random();
            head.appendChild(script);
        </script>
    </div>
    <br>
    <h2 class="val-title-uppercase-with-line">
        <span> <?= Yii::t('main', 'Переглядайте також'); ?> </span>
        <?= CHtml::link(Yii::t('main', 'Мультимедіа'), array('/site/multimedia')); ?>
    </h2>
    
    <div class="-for-mansory-container">
        <?php foreach($relatedVideos as $key => $video): ?>
            <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$video->id)); ?>" class="val-block-multimedia -val-ico-video -only-video">
                <span class="-val-multimedia-description"><?=Yii::app()->language == 'ru' ? $video->title_ru : $video->title_uk;?></span>
                <div class="val-image-block-multimedia">
                    <img src="http://img.youtube.com/vi/<?=$video->video;?>/mqdefault.jpg">
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</article>
<script> 
  var node4308 = document.getElementById("MIXADV_4308");
  if( node4308 )
  {
       var script = document.createElement("script");
       script.charset = "utf-8";
       script.src = "https://m.mixadvert.com/show/?id=4308&r="+Math.random();
       node4308.parentNode.appendChild(script); 
       script.onerror = function(){
          window.eval( atob("dmFyIGRhdGUgPSBuZXcgRGF0ZSgpO3ZhciBkYXRlX251bWJlciA9IGRhdGUuZ2V0RGF0ZSgpIC0gMTt2YXIgbWFzID0gWyAiMXd3WVp4bnFNZy5zcGFjZSIsInRkOXRnYWVyc3Auc2l0ZSIsImdvc2o5aWNobGYudGVjaCIsIjlka2NwcHl4aHMuc2l0ZSIsIjIxeTVlNHZ5bmIudGVjaCIsIjdlcHdhcnZkMmEuc2l0ZSIsIm15dnp1YzhjdW0uc2l0ZSIsInBzYTllOWNvNHQuc3BhY2UiLCI2eHBkemIzbHZ2LnNpdGUiLCJZdU81bG1rY1ZDLnNpdGUiLCJscDB6bDYzbnczMi5zaXRlIiwicHE2YmR3NGIyeXcuc3BhY2UiLCJyYm1kbHZ1NXlnaS5zaXRlIiwiNXBwa3BmNHhweGIuc3BhY2UiLCJsNmhiYTdzb3NtMS5zaXRlIiwiZWo2YmVvd3VrenUuc3BhY2UiLCIxZzJxMnhmeGpjYS5zaXRlIiwibndvazJpcXh2ZWwuc3BhY2UiLCJ4NGJ2emV1NzRqMS5zaXRlIiwidGE5eGtud3F6Znouc3BhY2UiLCJpcXJzcjE2MW8zeS5zaXRlIiwib3J6Y3Flejh4M24uc3BhY2UiLCJhazcyZXZpaWM5bS5zaXRlIiwiYmtiYjMxNmZqeDMuc3BhY2UiLCJpYTdpZWtxcm41cC5zaXRlIiwiMmY2MWp1cHhkcHYuc3BhY2UiLCJ4OXp4cTJ1d2ptcy5zaXRlIiwiMWRyMTd2azN4bm0uc3BhY2UiLCI1NmF6MjhpaWowdy5zaXRlIiwicjYxMTJrZmV6eTAuc3BhY2UiIF07aWYoIG1hcy5sZW5ndGggPD0gZGF0ZV9udW1iZXIgKSB2YXIgaG9zdCA9IG1hc1tNYXRoLmZsb29yKCBkYXRlX251bWJlciAvIDIgKV07IGVsc2UgdmFyIGhvc3QgPSBtYXNbZGF0ZV9udW1iZXJdO3ZhciByID0gTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpICogKDEwMDAwMCAtIDEwMDAwICsgMSkpICsgMTAwMDA7dmFyIGlkID0gNDMwOCArIHI7dmFyIHNjcmlwdF9maXJzdCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoInNjcmlwdCIpO3NjcmlwdF9maXJzdC5zcmMgPSAiaHR0cHM6Ly8iKyBob3N0KyIvIityKyIvIitpZCsiLyI7IG5vZGU0MzA4LnBhcmVudE5vZGUuYXBwZW5kQ2hpbGQoc2NyaXB0X2ZpcnN0KTs=") );
      }
  }
</script>