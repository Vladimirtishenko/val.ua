<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 31.08.14
 * Time: 22:01
 */
?>
<?php foreach($allNews as $news): ?>
    <div class="line_news">
        <p class="date-side date_line">
            <span class="glyphicon glyphicon-calendar"></span>
            <?=date('d-m-Y H:m:s', strtotime($news->date)); ?></p>
        &nbsp;
        <p class="date_line_text">
            <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?>
        </p>
    </div>
<?php endforeach; ?>
<?= CHtml::ajaxLink(Yii::t('main', 'Показати ще'), array('/ajax/moreNews', 'limit'=>$limit), array('update'=>'#more-news'), array('class'=>'btn btn-danger')); ?>