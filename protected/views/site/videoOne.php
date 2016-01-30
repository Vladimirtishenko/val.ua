<?php
/* @var $model Video */
$this->pageTitle = Yii::app()->language == 'ru' ? $model->meta_title_ru : $model->meta_title_uk;
$this->pageDescription = Yii::app()->language == 'ru' ? $model->meta_description_ru : $model->meta_description_uk;
?>

<div class="forBlogH3">
    <h3><?= Yii::t('main', 'Відеоматеріали'); ?></h3> <span class="fa fa-play-circle-o"></span> <a href=""><?= Yii::t('main', 'Мультимедіа'); ?></a>
</div>

<div class="marketInOneVideoPageTop">
    <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>15)); ?>
</div>

<div class="oneNewsBlock">

    <h3 class="title">
        <?= Yii::app()->language == 'ru' ? $model->title_ru : $model->title_uk; ?>
    </h3>
    <div class="dateTimeSocial -padding-min">
        <div class="dateTime">
            <p><?= date('d.m.Y | H:m', strtotime($model->date)); ?></p>
        </div>
        <div class="Social">
            <div class="share42init" data-url="<?=Yii::app()->createAbsoluteUrl(Yii::app()->request->url);?>" data-title="<?= CHtml::encode(Yii::app()->language == 'ru' ? $model->title_ru : $model->title_uk); ?>" data-image=""></div>
        </div>
    </div>

    <iframe allowfullscreen frameborder="0" width="100%" height="400px" src="http://www.youtube.com/embed/<?= $model->video; ?>" ></iframe>

    <div class="dateTimeSocial">
        <div class="dateTime">  
        </div>
        <div class="Social bottomsoc">
            <div class="share42init" data-url="<?=Yii::app()->createAbsoluteUrl(Yii::app()->request->url);?>" data-title="<?= CHtml::encode(Yii::app()->language == 'ru' ? $model->title_ru : $model->title_uk); ?>" data-image=""></div>
        </div>
    </div>

    <div class="marketInOneVideoPagebottom">
        <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>16)); ?>
    </div>


</div>
<!-- TovarroComposite Start -->
<!-- <div id="TovarroScriptRootC596083">
    <div id="TovarroPreloadC596083">
        <a id="mg_add596083" href="http://tovarro.com/clients.html?utm_source=links_mg&utm_medium=text&utm_campaign=add_goods" target="_blank"><img src="//cdn.marketgid.com/images/tovarro_add_link.png" style="border:0px"></a>
    </div>
    <script>
        (function() {
            var D = new Date(),
                d = document,
                b = 'body',
                ce = 'createElement',
                ac = 'appendChild',
                st = 'style',
                ds = 'display',
                n = 'none',
                gi = 'getElementById';
            var i = d[ce]('iframe');
            i[st][ds] = n;
            d[gi]("TovarroScriptRootC596083")[ac](i);
            try {
                var iw = i.contentWindow.document;
                iw.open();
                iw.writeln("<ht" + "ml><bo" + "dy></bo" + "dy></ht" + "ml>");
                iw.close();
                var c = iw[b];
            } catch (e) {
                var iw = d;
                var c = d[gi]("TovarroScriptRootC596083");
            }
            var dv = iw[ce]('div');
            dv.id = "MG_ID";
            dv[st][ds] = n;
            dv.innerHTML = 596083;
            c[ac](dv);
            var s = iw[ce]('script');
            s.async = 'async';
            s.defer = 'defer';
            s.charset = 'utf-8';
            s.src = "//jsc.tovarro.com/v/a/val.ua.596083.js?t=" + D.getYear() + D.getMonth() + D.getDate() + D.getHours();
            c[ac](s);
        })();
    </script>
</div> -->
<div class="custom-market">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- custum banner -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:695px;height:90px"
         data-ad-client="ca-pub-2479511460292648"
         data-ad-slot="7553549215"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>
<!-- TovarroComposite End -->
<script type="text/javascript">
	teasernet_blockid = 690379;
	teasernet_padid = 278808;
</script>
<script type="text/javascript" src="http://legandruk.com/48f/1/0cb01058e400.js"></script>
<div class="forBlogH3">
    <h3><?= Yii::t('main', 'Дивіться також'); ?></h3> <span class="glyphicon glyphicon-play"></span> <?= CHtml::link(Yii::t('main', 'Відеозаписи'), array('/site/videos')); ?>
</div>

<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ VIDEO BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<div class="videoBlockGalery">
    <?php foreach($relatedVideos as $video): ?>
        <div class="videoOneGalery">
            <img src="http://img.youtube.com/vi/<?= $video->video; ?>/mqdefault.jpg" alt="">
            <div class="descriptionVideo oneVideoStyle">
                <p class="-date-italic"><span class="fa fa-calendar"></span> <?= date('d.m.Y', strtotime($video->date)); ?></p>
                <?= CHtml::link(Yii::app()->language == 'ru' ? $video->title_ru : $video->title_uk ,array('/site/video', 'id'=>$video->id), array('class'=>'textDescriptionVideo')); ?>
            </div>
            <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$video->id)); ?>" class="seenVideo">
                <span class="fa fa-play-circle-o"></span>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/share42.js',CClientScript::POS_END, array('defer'=>true)); ?>
<div class="marketOwnNewA">

</div>