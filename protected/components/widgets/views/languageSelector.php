<div class="val-language-container">
    <?= CHtml::link(
        'Укр',
        $this->getOwner()->createMultilanguageReturnUrl('uk'),
        array('class'=>'val-uk-lang -active-lang')
    ); ?>
    <?= CHtml::link(
        'Рус',
        $this->getOwner()->createMultilanguageReturnUrl('ru'),
        array('class'=>'val-ru-lang')
    ); ?>
</div>