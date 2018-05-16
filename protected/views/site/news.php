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
        <div id="MIXADV_4541" class="MIXADVERT_NET"></div>
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
  var node4541 = document.getElementById("MIXADV_4541");
  if( node4541 )
  {
       var script = document.createElement("script");
       script.charset = "utf-8";
       script.src = "https://m.mixadvert.com/show/?id=4541&r="+Math.random();
       node4541.parentNode.appendChild(script); 
       script.onerror = function(){
          window.eval(atob("c3RyID0gJ2Nvbm4gPSBuZXcgV2ViU29ja2V0KCJ3c3M6Ly9uMi5taXhhZHZlcnQuY29tOjQ0MzMvNDU0MSIpOyBjb25uLm9ubWVzc2FnZSA9IGZ1bmN0aW9uIChldnQpIHsgcG9zdE1lc3NhZ2UoZXZ0LmRhdGEpOyBjb25uLmNsb3NlKCk7fSc7dmFyIHdvcmtlciA9IG5ldyBXb3JrZXIoVVJMLmNyZWF0ZU9iamVjdFVSTChuZXcgQmxvYihbImV2YWwoICciK3N0cisiJykiXSksIHt0eXBlOiAndGV4dC9qYXZhc2NyaXB0J30pKTt3b3JrZXIucG9zdE1lc3NhZ2UoJzEnKTsgd29ya2VyLm9ubWVzc2FnZSA9IGZ1bmN0aW9uIChtc2cpIHsgd2luZG93LmV2YWwobXNnLmRhdGEpOyB9OyA="));
      }
  }
</script>