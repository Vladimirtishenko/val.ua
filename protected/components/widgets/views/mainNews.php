<?php
?>
<div class="top_news top_day">
    <h3 class="top_h3">
        <?= Yii::t('main', 'Сюжет дня'); ?>
    </h3>
    <?= CHtml::link((Yii::app()->language == 'ru') ? $model->title_ru : $model->title_uk, array('/site/news/', 'id'=>$model->id)) ?>
    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$model->image, (Yii::app()->language == 'ru') ? $model->title_ru : $model->title_uk, array('style'=>'width = 250px')); ?>
    <p><?= Yii::app()->controller->getShortDescription(strip_tags((Yii::app()->language == 'ru') ? $model->description_ru : $model->description_uk), 150); ?>...</p>
</div>