<div class="language">
    <?= CHtml::link(
        'Укр',
        $this->getOwner()->createMultilanguageReturnUrl('uk'),
        array('class'=>'ukr')
    ); ?>
    <p class="languageText"><?= Yii::t('main', 'Мова'); ?></p>
    <?= CHtml::link(
        'Рус',
        $this->getOwner()->createMultilanguageReturnUrl('ru'),
        array('class'=>'rus')
    ); ?>
</div>