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
                        <p class="val-content-news-description"><?=$this->getShortDescription(Yii::app()->language == 'ru' ? $news->description_ru : $news->description_uk, 150).'...'?></p>
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
                     <span class="val-content-news-data"><?= ($dateNow == date('Y-m-d', strtotime($news->date))) ? date('H:i', strtotime($news->date)) : intval(date('d', strtotime($news->date))).' '.Yii::app()->controller->getMonth($news->date).' '.date('Y', strtotime($news->date)); ?></span>
                    <h3 class="val-content-news-title-small"><?=CHtml::encode(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk);?></h3>
                </div>
            </a>
        <?php endforeach; ?>
        </div>
        <div class="val-line-news-without-image">
            <?php $this->widget('application.components.widgets.AllNewsWidget'); ?>
        </div>
    </div>
    <div class="val-more-news">
        <a href="/"><span>Больше новостей</span></a>
    </div>
    <div class="val-steam-block">
        <h2 class="val-title-uppercase">
            Прямые включения
        </h2>
        <div class="val-iframe-streams">
            <div class="val-outer-frame">
                <span class="val-ico-online"><i>Online</i></span>
                <iframe width="100%" height="270px" src="<?= Streem::model()->findByPk(1)->url; ?>?chat=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="val-outer-frame">
                <span class="val-ico-online"><i>Online</i></span>
                <iframe width="100%" height="270px" src="<?= Streem::model()->findByPk(2)->url; ?>?chat=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="val-multimedia-block">
        <h2 class="val-title-uppercase">
            Мультимедиа
        </h2>
        <div class="val-conteiner-multimedia">
            <?php foreach($multimedia as $videos): ?> 
                <div class="val-conteiner-multimedia-items">
                    <? if(isset($videos->video)) : ?>
                        <img src="http://img.youtube.com/vi/<?= $videos->video; ?>/mqdefault.jpg" alt="image01" />
                    <? else: ?>
                        <?= CHtml::image(Yii::app()->baseUrl.'/uploads/galery/category/'.$videos->image, (Yii::app()->language == 'ru') ? $videos->name_ru : $video->name_uk); ?>
                    <? endif; ?>
                </div>
             <?php endforeach; ?>
        </div>
    </div>
</article>
<article class="val-column-right">
    
</article>