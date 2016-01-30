<div class="gen_politics">
    <div class="gen_one_block">
        <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/full/'.$data->image); ?>
    </div>
    <div class="gen_two_block">
        <h3><a href=""><?= CHtml::link(Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk, array('/site/news', 'id'=>$data->id)); ?></a></h3>
        <p class="-date-italic">
            <span>
                <span class="fa fa-calendar"></span>
                <?= Yii::t('main', 'Опубліковано'); ?>: <?= date('d m Y', strtotime($data->date)); ?></p>
            </span>
        </p>
        <p><?= $this->getShortDescription(Yii::app()->language == 'ru' ? $data->description_ru : $data->description_uk, 350).'...'; ?></p>
        <?= CHtml::link(Yii::t('main', 'Читать далее'), array('/site/news', 'id'=>$data->id), array('class'=>'btn btn-default')); ?>
    </div>
</div>