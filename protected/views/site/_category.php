<?php
/*@var $data dataProvider*/
?>
<div class="listCategoryUnit">
    <?= CHtml::link(CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$data->image), array('/site/news', 'id'=>$data->id)); ?>
    <div class="seenAndComments">
        <div class="seen">
            <span class="fa fa-eye"></span>
            <?= $data->views; ?>
        </div>
        <div class="date">
            <span class="fa fa-calendar"></span>
            <?= date('d.m.Y', strtotime($data->date)); ?>
        </div>
    </div>
    <h3>
        <?= CHtml::link(Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk, array('/site/news', 'id'=>$data->id)); ?>
    </h3>
    <div class="forTextAllCategory">
        <?= CHtml::link(strip_tags($this->getShortDescription(Yii::app()->language == 'ru' ? $data->description_ru : $data->description_uk, 300).'...'), array('/site/news', 'id'=>$data->id)); ?>
    </div>
    <span class="maskbottom"></span>
</div>