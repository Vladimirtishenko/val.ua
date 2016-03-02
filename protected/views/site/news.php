<?php
$this->pageTitle = Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk;
$this->pageDescription = Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk;
$this->metaAttributes[] = '<meta property="og:image" content="http://val.ua'.Yii::app()->baseUrl.'/uploads/news/full/'.$data->image.'" />';
$data->views ++;
$data->save();
?>
<?php 
    $dateNow = (new DateTime())->format('Y-m-d');
?>
<article class="val-column-left">
    <div class="val-single-news-conainer-with-read-else">
        <div class='val-container-one-news'>
            <h2 class="val-title-uppercase-with-line val-title-uppercase-small"><?= CHtml::encode(Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk); ?></h2>
            <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/full/'.$data->image, Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk, array('class'=>'genImages')); ?>
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
            <span> <?= Yii::t('main', 'Читайте також'); ?> </span>
            <?= CHtml::link(Yii::app()->language == 'ru' ? $data->category->name_ru : $data->category->name_uk, array('/site/category', 'id'=>$data->category->id)); ?>
        </h2>
        <div class="val-outer-line-news">
            <div class="val-gen-news-column -category">
             <?php foreach($relatedNews as $news): ?>
                <a href="<?= Yii::app()->createUrl('/site/news', array('id'=>$news->id)); ?>" class="val-block-gen-news">
                    <div class="val-image-block-gen-news">
                       <?=CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image); ?>
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
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/share42.js',CClientScript::POS_END, array('defer'=>true)); ?>
    