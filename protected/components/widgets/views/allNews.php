<?php
/* @var $allNews News */
?>
<?php 
    $dateNow = (new DateTime())->format('Y-m-d');
?>
<?php foreach($allNews as $key=>$news): ?>
    <div class="val-block-item-line-news">
        <span class="val-date-line-news"><?= ($dateNow == date('Y-m-d', strtotime($news->date))) ? date('H:i', strtotime($news->date)) : intval(date('d', strtotime($news->date))).' '.Yii::app()->controller->getMonth($news->date).' '.date('Y', strtotime($news->date)); ?></span>
        <?php if($news->marker == News::BOLD): ?>
            <b><?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?></b>
        <?php elseif($news->marker == News::CAPS_BOLD): ?>
            <b><?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id), array('style'=>'text-transform: uppercase')); ?></b>
        <?php else: ?>
            <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?>
        <?php endif; ?>
    </div>
<?php endforeach; ?>