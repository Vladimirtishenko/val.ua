<?php
/* @var $allNews News */
$oldDate = '';
?>
<?php foreach($allNews as $key=>$news): ?>
	<?php 
		if($key == 0) {
			echo '<span class="news-date-line">'.date('d', strtotime($news->date)).' '.Yii::app()->controller->getMonth($news->date).' '.date('Y', strtotime($news->date)).'</span>';
			$oldDate = date('d-m-Y', strtotime($news->date));
		}
		else {
			if($oldDate != date('d-m-Y', strtotime($news->date))) {
				echo '<span class="news-date-line">'.date('d', strtotime($news->date)).' '.Yii::app()->controller->getMonth($news->date).' '.date('Y', strtotime($news->date)).'</span>';
				$oldDate = date('d-m-Y', strtotime($news->date));
			}
		}

	?>
    <div class="textLineNews">
        <span><?=date('H:i', strtotime($news->date)); ?></span>
        <?php if($news->marker == News::BOLD): ?>
            <b><?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?></b>
        <?php elseif($news->marker == News::CAPS_BOLD): ?>
            <b><?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id), array('style'=>'text-transform: uppercase')); ?></b>
        <?php else: ?>
            <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?>
        <?php endif; ?>
    </div>
<?php endforeach; ?>