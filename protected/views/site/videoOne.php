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
    <br />
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