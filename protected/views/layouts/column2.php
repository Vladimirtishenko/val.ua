<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <?= $content; ?>
	<article class="val-column-right">
    <div class="val-column-outer-right-line-news">
         <h3 class="val-title-uppercase-small">
            <span><?=Yii::t('main', 'Не пропустіть');?></span>
            <?= CHtml::link(Yii::t('main', 'Всi новини'), array('/site/allNews')) ?>
        </h3>
        <div class="val-line-news-with-img">
            <?php $this->widget('application.components.widgets.AllNewsWidget'); ?>
        </div>
    </div>
    <a target="_blank"style="margin-top: 10px; display:inline-block" href="https://kub.pb.ua/get-credit"><?=CHtml::image(Yii::app()->baseUrl.'/public/images/kub.jpg', 'kub.pb.ua')?></a>
    <div class="val-blogers-column">
        <h2 class="val-title-uppercase"><?=Yii::t('main', 'Блоги і Блогери');?></h2>
        <?php $this->widget('application.components.widgets.BloggerLayout'); ?>
    </div>
    <div id="val-only-else-pages">
        <?php $this->widget('application.components.widgets.AccordeonWidget'); ?>
    </div>
</article>
<?php $this->endContent(); ?>