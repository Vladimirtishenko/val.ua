<?php
?>
<div class="val-grid -video-outer-label">
    <span class="controls-grid val-next-grid" data-arrow="prev"></span>
    <div class="val-inner-grid -video-label" data-count="3">
        <?php foreach ($model as $news): ?>
            <a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$news->id)); ?>" class="item-grid">
                <span class="val-mask">
                    <i class="big-ico fa fa-camera"></i>
                    <p><?= Yii::app()->language == 'ru' ? $news->name_ru : $news->name_uk ?></p>
                    <i class="small-ico fa fa-camera"></i>
                </span>
                 <?= CHtml::image(Yii::app()->baseUrl.'/uploads/galery/category/'.$news->image, (Yii::app()->language == 'ru') ? $news->name_ru : $news->name_uk); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <span class="controls-grid val-prev-grid" data-arrow="next"></span>
</div>