<?php foreach($topNews as $news): ?>
    <div class="one_top_news">
        <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/full/'.$news->image, Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk); ?>
        <div class="text_for_top_news">
        <p><?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?></p>
        <p class="date-side"><span class="glyphicon glyphicon-calendar"></span> &nbsp; <?=date('d F Y', strtotime($news->date)); ?></p></div>
    </div>
<?php endforeach; ?>
