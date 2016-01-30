<?php
?>
<div class="photoOne">
    <?= CHtml::image("/uploads/galery/category/".$data->image, Yii::app()->language == 'ru' ? $data->name_ru : $data->name_uk); ?>
    <div class="description">
        <p class="-date-italic">&nbsp; <span class="fa fa-calendar"></span> <?=date("d-m-Y", strtotime($data->date));?></p>
        <?= CHtml::link(Yii::app()->language == 'ru' ? $data->name_ru : $data->name_uk, array('/site/photos', 'id'=>$data->id), array('class'=>'textDescription')); ?>
        <p class="numberPhoto"><span><?= CHtml::encode(sizeof($data->photos)); ?></span> <br> фото</p>
    </div>
    <?= CHtml::link('<span class="fa fa-camera"></span>', array('/site/photos', 'id'=>$data->id), array('class'=>'seenPhoto')); ?>
</div>