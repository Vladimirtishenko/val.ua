<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <?= $content; ?>
	<article class="val-column-right">  
   <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
   <ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px; margin-bottom: 30px"
     data-ad-client="ca-pub-3024978264681114"
     data-ad-slot="‎2792872191"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <div class="val-column-outer-right-line-news">
         <h3 class="val-title-uppercase-small">
            <span><?=Yii::t('main', 'Не пропустіть');?></span>
            <?= CHtml::link(Yii::t('main', 'Всi новини'), array('/site/allNews')) ?>
        </h3>
        <div class="val-line-news-with-img">
            <?php $this->widget('application.components.widgets.AllNewsWidget'); ?>
        </div>
    </div>
    <div class="val-blogers-column">
        <h2 class="val-title-uppercase"><?=Yii::t('main', 'Блоги і Блогери');?></h2>
        <?php $this->widget('application.components.widgets.BloggerLayout'); ?>
    </div>
    <div id="val-only-else-pages">
        <?php $this->widget('application.components.widgets.AccordeonWidget'); ?>
    </div>
</article>
<?php $this->endContent(); ?>