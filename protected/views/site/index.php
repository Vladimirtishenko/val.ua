<?php
/* @var $this SiteController */
/* @var $mostViewed News */
/* @var $provider News */
?>
<?php 
    $dateNow = (new DateTime())->format('Y-m-d');
?>
<article class="val-column-left">
    <div class="val-slider-general-news">
        <ul class="val-list-slider">
        <?php foreach($mostViewedSlider as $news): ?> 
            <li class="val-list-slider-item">
                <a href="<?= Yii::app()->createUrl('/site/news', array('id'=>$news->id)); ?>">
                    <div class="val-left-in-slide">
                        <img src="<?=Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image?>" alt="">
                    </div>
                    <div class="val-right-in-slide">
                        <span class="val-content-news-data"><?= ($dateNow == date('Y-m-d', strtotime($news->date))) ? date('H:i', strtotime($news->date)) : intval(date('d', strtotime($news->date))).' '.Yii::app()->controller->getMonth($news->date).' '.date('Y', strtotime($news->date)); ?></span>
                        <h3 class="val-content-news-title"><?=CHtml::encode(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk);?></h3>
                        <p class="val-content-news-description"><?=$this->getShortDescription(Yii::app()->language == 'ru' ? $news->description_ru : $news->description_uk, 100).'...'?></p>
                    </div>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
        <div class="val-display-controls"></div>
    </div>
    <div class="val-outer-line-news">
        <div class="val-gen-news-column">
        <?php foreach($mostViewedLine as $news): ?> 
            <a href="<?= Yii::app()->createUrl('/site/news', array('id'=>$news->id)); ?>" class="val-block-gen-news">
                <div class="val-image-block-gen-news">
                   <img src="<?=Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image?>" alt="">
                </div>
                <div class="val-description-block-gen-news">
                     <span class="val-news-view"><?=$news->views;?></span>
                     <span class="val-content-news-data"><?= ($dateNow == date('Y-m-d', strtotime($news->date))) ? date('H:i', strtotime($news->date)) : intval(date('d', strtotime($news->date))).' '.Yii::app()->controller->getMonth($news->date).' '.date('Y', strtotime($news->date)); ?></span>
                    <h3 class="val-content-news-title-small"><?=Yii::app()->language == 'ru' ? mb_substr($news->title_ru, 0, 50, 'UTF-8') . '...' : mb_substr($news->title_uk, 0, 50, 'UTF-8') . '...' ?></h3>
                </div>
            </a>
        <?php endforeach; ?>
        </div>
        <div class="val-line-news-without-image">
            <h3 class="val-title-uppercase-small val-title-with-line">
                <span><?=Yii::t('main', 'Останні новини');?></span>
                <?= CHtml::link(Yii::t('main', 'Всі новини'), array('/site/allNews')) ?>
            </h3>
            <?php foreach($allNewsLine as $key=>$news): ?>
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
        </div>
    </div>
    <div class="val-more-news">
        <a href="/"><span><?=Yii::t('main', 'Більше новин');?></span></a>
    </div>
    <div class="val-steam-block">
        <h2 class="val-title-uppercase">
            <?=Yii::t('main', 'Прямі включення');?>
        </h2>
        <div class="val-iframe-streams" data-src='<?= Streem::model()->findByPk(1)->url; ?>, <?= Streem::model()->findByPk(2)->url; ?>' >
            
        </div>
    </div>
    <div class="val-multimedia-block">
        <h2 class="val-title-uppercase">
            <span><?=Yii::t('main', 'Мультимедіа');?></span>
            <a href="/site/Multimedia"><?=Yii::t('main', 'Мультимедіа');?></a>
        </h2>
        <div class="val-conteiner-multimedia">
            <?php foreach($photo as $photos): ?> 
                <div class="val-conteiner-multimedia-items">
                    <a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$photos->id)); ?>">
                        <span class="val-ico-multimedia-photo"></span>
                        <?= CHtml::image('http://val.ua/uploads/galery/category/'.$photos->image, (Yii::app()->language == 'ru') ? $photos->name_ru : $photos->name_uk); ?>
                    </a>
                </div>
             <?php endforeach; ?>
        </div>
    </div>
</article>
<article class="val-column-right">
    <a href="http://desna.football/" target="_blank" style="display:block; margin-bottom: 20px">
        <?=CHtml::image(Yii::app()->baseUrl.'/public/images/football_banner.jpg', 'Футбол')?>
    </a> 
    <div class="val-column-outer-right-line-news">
         <h3 class="val-title-uppercase-small">
            <span><?=Yii::t('main', 'Відео');?></span>
            <?= CHtml::link(Yii::t('main', 'Мультимедіа'), array('/site/Multimedia')) ?>
        </h3>
        <div class="val-line-news-with-img">
        <?php foreach($video as $key=>$news): ?>
           <a href="<?= Yii::app()->createUrl('/site/video/', array('id'=>$news->id)); ?>" class="val-block-gen-news val-height-auto -val-with-image-line-news">
                <div class="val-image-block-gen-news">
                   <img src="http://img.youtube.com/vi/<?= $news->video; ?>/mqdefault.jpg"" />
                </div>
                <div class="val-description-block-gen-news -val-no-padding">
                    <span class="val-date-line-news"><?= ($dateNow == date('Y-m-d', strtotime($news->date))) ? date('H:i', strtotime($news->date)) : intval(date('d', strtotime($news->date))).' '.Yii::app()->controller->getMonth($news->date).' '.date('Y', strtotime($news->date)); ?></span>
                    <p class="val-description-line-news-with-img"><?=Yii::app()->language == 'ru' ? mb_substr($news->title_ru, 0, 45, 'UTF-8') . '...' : mb_substr($news->title_uk, 0, 45, 'UTF-8') . '...' ?></p>
                </div>
            </a>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="val-blogers-column">
        <h2 class="val-title-uppercase"><?=Yii::t('main', 'Блоги і Блогери');?></h2>
        <?php $this->widget('application.components.widgets.BloggerLayout'); ?>
    </div>
    <?php $this->widget('application.components.widgets.AccordeonWidget'); ?>
</article>
<article class="val-full-width-category"></article>