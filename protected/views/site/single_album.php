<?php
/* @var $this SiteController */
/* @var $page PhotoCategory */
/* @var $photos Photo */
$this->pageTitle = Yii::app()->language == 'ru' ? $category->meta_title_ru : $category->meta_title_uk;
$this->pageDescription = Yii::app()->language == 'ru' ? $category->meta_description_ru : $category->meta_description_uk;
?>

<div class="forBlogH3">
    <h3><?= Yii::t('main', 'Фоторепортажі'); ?></h3> <span class="fa fa-camera"></span> <?= CHtml::link(Yii::t('main', 'Мультимедіа'), array('/site/photos')); ?>
</div>

<div class="marketInOnePhotoPageTop">
    <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>17)); ?>
</div>

<div class="oneNewsBlock">
    <h3 class="title">
        <?= (Yii::app()->language == 'ru') ? $category->name_ru : $category->name_uk; ?>
    </h3>
    <div class="dateTimeSocial -with-padding">
        <div class="dateTime">
            <p><?= date('d.m.Y | H:m', strtotime($category->date)); ?></p>
        </div>
        <div class="Social">
             <div class="share42init" data-url="<?=Yii::app()->createAbsoluteUrl(Yii::app()->request->url);?>" data-title="<?= CHtml::encode(Yii::app()->language == 'ru' ? $category->name_ru : $category->name_uk); ?>" data-image="http://val.ua/uploads/images/<?=$photos[0]->name;?>"></div>
        </div>
    </div>
        <div class="-val-outer-all-slider">
            <mark></mark>
            <div class="outer-for-controls">
                <span class="val-prev-single -conrols" data-arrow="prevent"></span>
                <div class="val-outer-slide">
                <?php foreach($photos as $key => $photo): ?>
                    <a href="#"><?= CHtml::image("/uploads/images/".$photo->name, $photo->name, array('data-num' => $key)); ?>
                    
                    <?php if(!empty($photo->description_ru) && !empty($photo->description_uk)): ?>
                    <span><?= CHtml::encode(Yii::app()->language == 'ru' ? $photo->description_ru : $photo->description_uk); ?></span>
                    <? endif; ?>


                    </a>
                <?php endforeach; ?>
                </div>
                <span class="val-next-single -conrols" data-arrow="next"></span>
            </div>
            <div class="val-peview">
                <div class="-overflow-previe"></div>
            </div>
            <span class="val-prev-single-bottom -conrols" data-arrow="prevent"></span>
            <span class="val-next-single-bottom -conrols" data-arrow="next"></span>
        </div>
    <div class="dateTimeSocial">
        <div class="dateTime">
            <p>Автор: <?= $category->author; ?> </p>
        </div>
        <div class="Social"> 
            <div class="share42init" data-url="<?=Yii::app()->createAbsoluteUrl(Yii::app()->request->url);?>" data-title="<?= CHtml::encode(Yii::app()->language == 'ru' ? $category->name_ru : $category->name_uk); ?>" data-image="http://val.ua/uploads/images/<?=$photos[0]->name;?>"></div>
        </div>
    </div>
  <div class="marketInOnePhotoPagebottom">
      <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>18)); ?>
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
<!-- TovarroComposite End -->
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
<script type="text/javascript">
    teasernet_blockid = 690379;
    teasernet_padid = 278808;
</script>
<script type="text/javascript" src="http://legandruk.com/48f/1/0cb01058e400.js"></script>
<div class="forBlogH3">
    <h3><?= Yii::t('main', 'Дивіться також'); ?></h3> <span class="fa fa-camera"></span> <?= CHtml::link(Yii::t('main', 'Фоторепортажі'), array('/site/photos')); ?>
</div>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$data,
    'itemView'=>'_albums',
    'template'=>'{items}{pager}',
    'cssFile'=>false,
    'pager'=>array(
        'lastPageLabel'=>'>>',
        'nextPageLabel'=>'>',
        'prevPageLabel'=>'<',
        'firstPageLabel'=>'<<',
        'class'=>'CLinkPager',
        'header'=>false,
        'cssFile'=>false, // устанавливаем свой .css файл
        'htmlOptions'=>array('class'=>'pager'),
    ),
    'sortableAttributes'=>array(
        'rating',
        'create_time',
    ),
    'pagerCssClass'=>'pager',
    'itemsCssClass'=>'photoBlock',
));
?>
<div class="marketOwnNewA">

</div>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/share42.js',CClientScript::POS_END, array('defer'=>true)); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/single-slider.js',CClientScript::POS_END, array('defer'=>true)); ?>