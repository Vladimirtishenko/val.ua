<div class="outMarqueGrey">
    <div class="outMarqueGreen">
        <div class="blockMargue">
            <div class="arrowList">
                <p><?= Yii::t('main', 'Останні новини'); ?>&nbsp; <span class="fa fa-play"></span></p>
            </div>
            <div class="str1 str_wrap">
                <?php foreach($lastNews as $news): ?>
                    <?php if($news->marker == News::BOLD): ?>
                        <b><?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?></b>
                    <?php elseif($news->marker == News::CAPS_BOLD): ?>
                        <b><?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id), array('style'=>'text-transform: uppercase')); ?></b>
                    <?php else: ?>
                        <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>