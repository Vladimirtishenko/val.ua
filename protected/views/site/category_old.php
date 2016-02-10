<?php
/* @var $this SiteController */
/* @var $mostViewed News */
/* @var $provider News */
?>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ TOP SLIDER \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<div class="forBlogH3 forIndexTop">
    <h3>Найважливiше</h3>
</div>
<div class="topSlider">
    <div class="val-outer-slider">
        <span class="val-controls val-next" data-arrow="next"></span>
        <span class="val-controls val-prev" data-arrow="prev"></span>
        <div class="val-inner-slider">
            <span class="val-slide-preloads"></span>
            <ul class="val-list-slider">
            <?php foreach($mostViewed as $news): ?>
                <li>
                    <a href="<?= Yii::app()->createUrl('/site/news', array('id'=>$news->id)); ?>">
                        <img src="<?=Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image?>" alt="">
                        <h3><?=CHtml::encode(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk);?></h3>
                        <p><?=$this->getShortDescription(Yii::app()->language == 'ru' ? $news->description_ru : $news->description_uk, 300)?></p>
                    </a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<div class="marketLeftGenMax">
    <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>3)); ?>
</div>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END TOP SLIDER \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ VIDEO BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<div class="streamBlock">
    <h3 class="top_h3">високий вал <span class="btn btn-default">онлайн</span></h3>
    <div class="tab-content">
      <div class="tab-pane in active" id="stream1">
            <p><span><i><?= Yii::app()->language == 'ru' ? Streem::model()->findByPk(1)->name_ru : Streem::model()->findByPk(1)->name_uk; ?></i></span></p>
            <iframe width="100%" height="270px" src="<?= Streem::model()->findByPk(1)->url; ?>?chat=0" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="tab-pane" id="stream2">
            <p><span><i><?= Yii::app()->language == 'ru' ? Streem::model()->findByPk(2)->name_ru : Streem::model()->findByPk(2)->name_uk; ?></i></span></p>
            <iframe width="100%" height="270px" src="<?= Streem::model()->findByPk(2)->url; ?>?chat=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
      <ul class="nav nav-tabs">
      <li class="active"><a href="#stream1" data-toggle="tab">Трансляция №1</a></li>
      <li><a href="#stream2" data-toggle="tab">Трансляция №2</a></li>
    </ul>
</div>
<div class="fotogalery">
    <h3 class="top_h3"><?= Yii::t('main', 'фоторепортажі'); ?></h3>
    <?php $this->widget('application.components.widgets.PhotoNewsWidget'); ?>
</div>

<div class="marketPieLeftDownStream">
    <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>4)); ?>
</div>
<div class="marketPieRightDownVideo">
    <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>5)); ?>
</div>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END VIDEO BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->


<div class="blogSlider">
    <div class="forBlogH3">
        <h3><?= Yii::t('main', 'Блогери'); ?></h3> <span class="fa fa-user"></span> <a><?= Yii::t('main', 'блоги'); ?></a>
    </div>
    <div class="val-outer-blog-slider">
        <span class="val-blog-controls val-next" data-arrow="next"></span>
        <span class="val-blog-controls val-prev" data-arrow="prev"></span>
        <div class="val-inner-blog-slider">
        <span class="val-slide-preloads"></span>
            <ul class="val-list-blog-slider">
            <?php foreach($popularBlogers as $bloger): ?>
                <li>
                 <?php $articles = Articles::model()->findAll(array('condition'=>'author_id = :id', 'params'=>array(':id'=>$bloger->id), 'limit'=>1, 'order'=>'date DESC')); ?>
                    <a href="http://val.ua/blog/default/post/<?=$articles[0]['id']?>/uk.html" target="_blank">
                        <img src="<?=Yii::app()->baseUrl.'/uploads/users/avatars/'.$bloger->avatar;?>" alt="">
                        <div class="val-outer-text-description">
                            <div class="-cell">
                                <h3><?=$bloger->name;?></h3>
                                <?php foreach($articles as $article): ?>
                                    <span><?=$article->date;?></span>
                                    <p><?=$article->title;?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </a>
                </li>
            <? endforeach;?>    
            </ul>
        </div>
    </div>
</div>
<div class="custom-market">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- custum banner -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:695px;height:90px"
         data-ad-client="ca-pub-2479511460292648"
         data-ad-slot="7553549215"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ ANALITIC & COMMENTS BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<div class="accordionBlock">
    <h3 class="top_h3 forAccordion"><?= Yii::t('main','Аналітика'); ?></h3>


    <section class="ac-container">
        <?php foreach($analitic as $i => $news): ?>
            <div>
                <input id="wer-<?= $news->id; ?>" name="accordion-<?= $news->category_id; ?>" <?php if($i == 0): ?> checked="" <?php endif; ?> type="radio" />
                <label for="wer-<?= $news->id; ?>">
                    <?= CHtml::encode(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk); ?>
                </label>
                <article class="ac-large">
                    <?= CHtml::link(CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image, Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk), array('/site/news', 'id'=>$news->id)); ?>
                    <p>
                        <?= CHtml::link(strip_tags($this->getShortDescription(Yii::app()->language == 'ru' ? $news->description_ru : $news->description_uk, 150).'...'), array('/site/news', 'id'=>$news->id)); ?>
                    </p>
                </article>
            </div>
        <?php endforeach; ?>
    </section>

</div>

<div class="videoBlock">
    <h3 class="top_h3"><?= Yii::t('main','Останні відеорепортажі'); ?></h3>    
        <div class="val-p-grid -photo-outer-label">
            <span class="controls-grid val-next-grid" data-arrow="prev"></span>
            <div class="val-inner-grid -photo-label" data-count="4">
            <?php foreach($lastVideos as $video): ?>
                <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$video->id)); ?>" class="item-grid">
                    <span class="val-mask">
                        <i class="big-ico fa fa-play-circle-o"></i>
                        <p><?= Yii::app()->language == 'ru' ? $video->title_ru : $video->title_uk ?></p>
                        <i class="small-ico fa fa-play-circle-o"></i>
                    </span>
                    <img src="http://img.youtube.com/vi/<?= $video->video; ?>/mqdefault.jpg" alt="image01" />
                </a>
            <?php endforeach; ?>
            </div>
            <span class="controls-grid val-prev-grid" data-arrow="next"></span>
        </div>
</div>
<div style="clear: both"></div>
<div class="marketMaxTwolevelPhotoAnalitika">
    <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>6)); ?>
</div>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END ANALITIC & COMMENTS BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ POLITIC & ECONOMIC BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<?php foreach($provider as $key=>$newsArray): ?>
    <div class="outerBlock">
    <div class="accordionBlockEconomic">
        <h3 class="top_h3 forAccordion"><?= CHtml::encode($key); ?></h3>

        <section class="ac-container">
            <?php foreach($newsArray as $i => $news): ?>
                <div>
                    <input id="wer-<?= $news->id; ?>" name="accordion-<?= $news->category_id; ?>" <?php if($i == 0): ?> checked="" <?php endif; ?> type="radio" />
                    <label for="wer-<?= $news->id; ?>">
                        <?= CHtml::encode(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk); ?>
                    </label>
                    <article class="ac-large">
                        <?= CHtml::link(CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image, Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk), array('/site/news', 'id'=>$news->id)); ?>
                        <p>
                            <?= CHtml::link(strip_tags($this->getShortDescription(Yii::app()->language == 'ru' ? $news->description_ru : $news->description_uk, 150).'...'), array('/site/news', 'id'=>$news->id)); ?>
                        </p>
                    </article>
                </div>
                
            <?php endforeach; ?>
        </section>
       
    </div>
     <div class="marketPieForAccordeonNews" id="<?= $news->category_id; ?>">
         <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>'marketPieForAccordeonNews'.ucfirst($news->category->alias))); ?>
    </div>
    </div>
    
<?php endforeach; ?>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END POLITIC & ECONOMIC BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->