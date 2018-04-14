<?php
$this->pageTitle = Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk;
$this->pageDescription = Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk;
$this->metaAttributes[] = '<meta property="og:image" content="http://val.ua'.Yii::app()->baseUrl.'/uploads/news/full/'.$data->image.'" />';
$this->metaAttributes[] = '<meta property="fb:app_id" content="1361253320577547"/>';
$data->views ++;
$data->save();
?>
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
            <h2 class="val-title-uppercase-with-line val-title-uppercase-small"><?= CHtml::encode(Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk); ?></h2>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
              <ins class="adsbygoogle"
                   style="display:block; text-align:center; margin-bottom: 30px"
                   data-ad-format="fluid"
                   data-ad-layout="in-article"
                   data-ad-client="ca-pub-3024978264681114"
                   data-ad-slot="‎2700716315"></ins>
            <script> (adsbygoogle = window.adsbygoogle || []).push({});</script>
            <?= CHtml::image('http://val.ua//uploads/news/full/'.$data->image, Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk, array('class'=>'genImages')); ?>
            <div class="val-description-block-gen-news">
                <span class="val-news-view"><?=$data->views;?></span>
                <span class="val-content-news-data"><?= ($dateNow == date('Y-m-d', strtotime($data->date))) ? date('H:i', strtotime($data->date)) : intval(date('d', strtotime($data->date))).' '.Yii::app()->controller->getMonth($data->date).' '.date('Y', strtotime($data->date)); ?></span>
            </div>
            <div class="val-text-from-content-manager-wright">
                <?= Yii::app()->language == 'ru' ? $data->description_ru : $data->description_uk; ?>
            </div>
            <div class="dateTimeSocial">
                <div class="Social">
                   <div class="share42init" data-url="http://val.ua<?=Yii::app()->request->requestUri;?>" data-title="<?= CHtml::encode(Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk); ?>" data-image="http://val.ua/uploads/news/full/<?=$data->image;?> " data-description="<?=$this->getShortDescription(Yii::app()->language == 'ru' ? $data->description_ru : $data->description_uk, 100)?>..."></div>
                </div>
            </div>
            <div class="marketInOneNewsPagebottom">
                  <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>20)); ?>
            </div>

        </div>
        <h2 class="val-title-uppercase-with-line">
            <span> <?= Yii::t('main', 'Коментарі'); ?> </span>
        </h2>
        <div class="val-outer-line-news">
            <div class="fb-comments" data-href="http://val.ua/uk/<?php echo $data->id; ?>" data-width="100%" data-numposts="5"></div>
        </div>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:block; text-align:center; margin: 20px 0"
             data-ad-format="fluid"
             data-ad-layout="in-article"
             data-ad-client="ca-pub-3024978264681114"
             data-ad-slot="‎7481613163"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
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
        <br>
        <h2 class="val-title-uppercase-with-line">
            <span> <?= Yii::t('main', 'Читайте також'); ?> </span>
            <?= CHtml::link(Yii::app()->language == 'ru' ? $data->category->name_ru : $data->category->name_uk, array('/site/category', 'id'=>$data->category->id)); ?>
        </h2>
        <div class="val-outer-line-news">
            <div class="val-gen-news-column -category">
             <?php foreach($relatedNews as $news): ?>
                <a href="<?= Yii::app()->createUrl('/site/news', array('id'=>$news->id)); ?>" class="val-block-gen-news">
                    <div class="val-image-block-gen-news">
                       <?=CHtml::image('http://val.ua/uploads/news/thumb/'.$news->image); ?>
                    </div>
                    <div class="val-description-block-gen-news">
                         <span class="val-news-view"><?=$news->views;?></span>
                         <span class="val-content-news-data"><?= ($dateNow == date('Y-m-d', strtotime($news->date))) ? date('H:i', strtotime($news->date)) : intval(date('d', strtotime($news->date))).' '.Yii::app()->controller->getMonth($news->date).' '.date('Y', strtotime($news->date)); ?></span>
                        <h3 class="val-content-news-title-small"><?=Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk;?></h3>
                    </div>
                </a>
            <?php endforeach; ?>
            </div>
        </div>
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