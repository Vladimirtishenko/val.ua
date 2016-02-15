<?php
/*@var $data dataProvider*/
?>
<?php 
    $dateNow = (new DateTime())->format('Y-m-d');
?>
<a href="<?= Yii::app()->createUrl('/site/news', array('id'=>$data->id)); ?>" class="val-block-gen-news">
    <div class="val-image-block-gen-news">
       <?=CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$data->image); ?>
    </div>
    <div class="val-description-block-gen-news">
         <span class="val-news-view"><?=$data->views;?></span>
         <span class="val-content-news-data"><?= ($dateNow == date('Y-m-d', strtotime($data->date))) ? date('H:i', strtotime($data->date)) : intval(date('d', strtotime($data->date))).' '.Yii::app()->controller->getMonth($data->date).' '.date('Y', strtotime($data->date)); ?></span>
        <h3 class="val-content-news-title-small"><?=Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk;?></h3>
    </div>
</a>