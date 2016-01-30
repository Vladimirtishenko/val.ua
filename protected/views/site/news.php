<?php
$this->pageTitle = Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk;
$this->pageDescription = Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk;
$this->metaAttributes[] = '<meta property="og:image" content="http://val.ua'.Yii::app()->baseUrl.'/uploads/news/full/'.$data->image.'" />';
$data->views ++;
$data->save();
?>
<div class="forBlogH3">
    <h3><?= Yii::t('main', 'Новини'); ?></h3> <span class="fa fa-file-o"></span>
    
    <?= CHtml::link(Yii::t('main', '').' '.(Yii::app()->language == 'ru' ? $data->category->name_ru : $data->category->name_uk), array('/site/category', 'alias'=>$data->category->alias)); ?>
    <div class="Social">
           <div class="share42init" data-url="http://val.ua<?=Yii::app()->request->requestUri;?>" data-title="<?= CHtml::encode(Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk); ?>" data-image="http://val.ua/uploads/news/full/<?=$data->image;?> " data-description="<?=$this->getShortDescription(Yii::app()->language == 'ru' ? $data->description_ru : $data->description_uk, 100)?>..."></div>
    </div>
</div>
<div class="marketInOneNewsPageTop">
    <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>19)); ?>
</div>
<div class="oneNewsBlock">
    <h3 class="title">
        <?= CHtml::encode(Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk); ?>
    </h3>
    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/full/'.$data->image, Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk, array('class'=>'genImages')); ?>
    <div class="textOneNews">
        <p><?= date('d.m.Y | H:i', strtotime($data->date)); ?></p>
        <?= Yii::app()->language == 'ru' ? $data->description_ru : $data->description_uk; ?>
    </div>
    <div class="dateTimeSocial">
        <div class="dateTime">
            <p> Автор: <?= CHtml::encode($data->author); ?></p> <p><span class="fa fa-eye"></span> Перегляди: <?= $data->views; ?></p>
        </div>
        <div class="Social">
           <div class="share42init" data-url="http://val.ua<?=Yii::app()->request->requestUri;?>" data-title="<?= CHtml::encode(Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk); ?>" data-image="http://val.ua/uploads/news/full/<?=$data->image;?> " data-description="<?=$this->getShortDescription(Yii::app()->language == 'ru' ? $data->description_ru : $data->description_uk, 100)?>..."></div>
        </div>
    </div>
      <div class="marketInOneNewsPagebottom">
          <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>20)); ?>
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
   <div id="mc-container"></div>
    <div class="forBlogH3">
        <h3><?= Yii::t('main', 'Читайте також'); ?></h3> <span class="fa fa-file-o"></span>
        <?= CHtml::link(Yii::t('main', 'Категорія').' '.(Yii::app()->language == 'ru' ? $data->category->name_ru : $data->category->name_uk), array('/site/category', 'alias'=>$data->category->alias)); ?>
    </div>
    <div class="category">
        <?php foreach($relatedNews as $news): ?>
            <div class="listCategoryUnit">
                <?= CHtml::link(CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image), array('/site/news', 'id'=>$news->id)); ?>
                <div class="seenAndComments">
                    <div class="seen">
                        <span class="fa fa-eye"></span> <?= (int)$news->views; ?>
                    </div>
                    <div class="date">
                        <span class="fa fa-calendar"></span> <?= date('d.m.Y', strtotime($news->date)); ?>
                    </div>
                </div>
                <h3><?= CHtml::link(CHtml::encode(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk), array('/site/news', 'id'=>$news->id)); ?></h3>
                <div class='forTextAllCategory'><?= CHtml::link($this->getShortDescription((Yii::app()->language == 'ru') ? $news->description_ru : $news->description_uk, 350).'...', array('/site/news', 'id'=>$news->id)); ?></div>
                <span class="maskbottom"></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="marketOwnNewA">

</div>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/share42.js',CClientScript::POS_END, array('defer'=>true)); ?>