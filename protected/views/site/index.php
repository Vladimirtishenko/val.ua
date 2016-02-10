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
                     <span class="val-news-view"><?=$news->views;?></span>
                     <span class="val-content-news-data"><?= ($dateNow == date('Y-m-d', strtotime($news->date))) ? date('H:i', strtotime($news->date)) : intval(date('d', strtotime($news->date))).' '.Yii::app()->controller->getMonth($news->date).' '.date('Y', strtotime($news->date)); ?></span>
                    <h3 class="val-content-news-title-small"><?=CHtml::encode(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk);?></h3>
                </div>
            </a>
        <?php endforeach; ?>
        </div>
        <div class="val-line-news-without-image">
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
        <a href="/"><span>Больше новостей</span></a>
    </div>
    <div class="val-steam-block">
        <h2 class="val-title-uppercase">
            Прямые включения
        </h2>
        <div class="val-iframe-streams" data-src="<?= Streem::model()->findByPk(1)->url; ?>, <?= Streem::model()->findByPk(2)->url; ?>">
            
        </div>
    </div>
    <div class="val-multimedia-block">
        <h2 class="val-title-uppercase">
            <span>Мультимедиа</span>
            <a href="#">Все видеорепортажи</a>
            <a href="#">Все фоторепортажи</a>
        </h2>
        <div class="val-conteiner-multimedia">
            <?php foreach($multimedia as $videos): ?> 
                <div class="val-conteiner-multimedia-items">
                    <? if(isset($videos->video)) : ?>
                        <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$videos->id)); ?>">
                            <span class="val-ico-multimedia-video"></span>
                            <img src="http://img.youtube.com/vi/<?= $videos->video; ?>/mqdefault.jpg" alt="image01" />
                        </a>
                    <? else: ?>
                        <a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$videos->id)); ?>">
                            <span class="val-ico-multimedia-photo"></span>
                            <?= CHtml::image(Yii::app()->baseUrl.'/uploads/galery/category/'.$videos->image, (Yii::app()->language == 'ru') ? $videos->name_ru : $videos->name_uk); ?>
                        </a>
                    <? endif; ?>
                </div>
             <?php endforeach; ?>
        </div>
    </div>
</article>
<article class="val-column-right">
    <div class="val-column-outer-right-line-news">
         <h3 class="val-title-uppercase-small"><span>Не пропустите</span><a href="#">Все новости</a></h3>
        <div class="val-line-news-with-img">
        <?php foreach($allNewsPhoto as $key=>$news): ?>
           <a href="<?= Yii::app()->createUrl('/site/news', array('id'=>$news->id)); ?>" class="val-block-gen-news -val-with-image-line-news">
                <div class="val-image-block-gen-news">
                   <img src="<?=Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image?>" alt="">
                </div>
                <div class="val-description-block-gen-news -val-no-padding">
                    <span class="val-date-line-news"><?= ($dateNow == date('Y-m-d', strtotime($news->date))) ? date('H:i', strtotime($news->date)) : intval(date('d', strtotime($news->date))).' '.Yii::app()->controller->getMonth($news->date).' '.date('Y', strtotime($news->date)); ?></span>
                    <p class="val-description-line-news-with-img"><?=Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk;?></p>
                </div>
            </a>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="val-blogers-column">
        <h2 class="val-title-uppercase">Блоги и Блогеры</h2>
        <div class="val-bloger-top">
            <div class="val-text-article-text">
                <a href="/blog/default/post/<?=$popularBlogers['article_id']?>/uk.html"><?=$popularBlogers['article_title'];?></a>
            </div>
            <div class="val-bloger-info">
                <img class="val-bloger-avatar" src="/uploads/users/avatars/<?=$popularBlogers['user_avatar'];?>" alt="">
                <div class="val-bloger-info-description">
                    <span class="val-content-news-data"><?= ($dateNow == date('Y-m-d', strtotime($popularBlogers['article_date']))) ? date('H:i', strtotime($news->date)) : intval(date('d', strtotime($popularBlogers['article_date']))).' '.Yii::app()->controller->getMonth($popularBlogers['article_date']).' '.date('Y', strtotime($popularBlogers['article_date'])); ?></span>
                    <a href="/blog/default/bloger/<?=$popularBlogers['user_id']?>/uk.html" class="val-info-bloger-name"><?=$popularBlogers['user_name'];?></a>
                    <p class="val-info-bloger-prof"><?=$popularBlogers['user_profession'];?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="val-accordeons-block">

        <ul class="val-list-accard">
        <li class="val-list-item-accrd">
                <div class="val-outer-block-item-accard">
                    <span class="val-title-item-accard -gren-line-accrad">
                        <b>Календарь</b>
                    </span>
                    <div class="val-outer-hide-accrad -kalendar">
                       <input type="text" id="datepicker">
                    </div>
                </div>
            </li>
            <li class="val-list-item-accrd">
                <div class="val-outer-block-item-accard">
                    <span class="val-title-item-accard">
                        <img src="<?=Yii::app()->baseUrl.'/public/images/sinoptic.jpg';?>" alt="">
                    </span>
                    <div class="val-outer-hide-accrad -sinoptic">
                        <div class="val-innre-hide-accard"> 
                            <div id="SinoptikInformer" style="width:300px; margin-bottom: 10px;" class="SinoptikInformer type5c1"><div class="siHeader"><div class="siLh"><div class="siMh"><a onmousedown="siClickCount();" href="https://ua.sinoptik.ua/" target="_blank">Погода</a><a onmousedown="siClickCount();" class="siLogo" href="https://ua.sinoptik.ua/" target="_blank"> </a> <span id="siHeader"></span></div></div></div><div class="siBody"><div class="siCity"><div class="siCityName"><a onmousedown="siClickCount();" href="https://ua.sinoptik.ua/погода-київ" target="_blank">Погода у <span>Києві</span></a></div><div id="siCont0" class="siBodyContent"><div class="siLeft"><div class="siTerm"></div><div class="siT" id="siT0"></div><div id="weatherIco0"></div></div><div class="siInf"><p>вологість: <span id="vl0"></span></p><p>тиск: <span id="dav0"></span></p><p>вітер: <span id="wind0"></span></p></div></div></div><div class="siCity"><div class="siCityName"><a onmousedown="siClickCount();" href="https://ua.sinoptik.ua/погода-чернігів" target="_blank">Погода у <span>Чернігові</span></a></div><div id="siCont1" class="siBodyContent"><div class="siLeft"><div class="siTerm"></div><div class="siT" id="siT1"></div><div id="weatherIco1"></div></div><div class="siInf"><p>вологість: <span id="vl1"></span></p><p>тиск: <span id="dav1"></span></p><p>вітер: <span id="wind1"></span></p></div></div></div><div class="siCity"><div class="siCityName"><a onmousedown="siClickCount();" href="https://ua.sinoptik.ua/погода-ніжин" target="_blank">Погода у <span>Ніжині</span></a></div><div id="siCont2" class="siBodyContent"><div class="siLeft"><div class="siTerm"></div><div class="siT" id="siT2"></div><div id="weatherIco2"></div></div><div class="siInf"><p>вологість: <span id="vl2"></span></p><p>тиск: <span id="dav2"></span></p><p>вітер: <span id="wind2"></span></p></div></div></div><div class="siCity"><div class="siCityName"><a onmousedown="siClickCount();" href="https://ua.sinoptik.ua/погода-новгород-сіверський" target="_blank">Погода у <span>Новгородi-Сіверському</span></a></div><div id="siCont3" class="siBodyContent"><div class="siLeft"><div class="siTerm"></div><div class="siT" id="siT3"></div><div id="weatherIco3"></div></div><div class="siInf"><p>вологість: <span id="vl3"></span></p><p>тиск: <span id="dav3"></span></p><p>вітер: <span id="wind3"></span></p></div></div></div><div class="siCity"><div class="siCityName"><a onmousedown="siClickCount();" href="https://ua.sinoptik.ua/погода-прилуки" target="_blank">Погода у <span>Прилуках</span></a></div><div id="siCont4" class="siBodyContent"><div class="siLeft"><div class="siTerm"></div><div class="siT" id="siT4"></div><div id="weatherIco4"></div></div><div class="siInf"><p>вологість: <span id="vl4"></span></p><p>тиск: <span id="dav4"></span></p><p>вітер: <span id="wind4"></span></p></div></div></div><div class="siLinks"></div></div><div class="siFooter"><div class="siLf"><div class="siMf"></div></div></div></div><script async="true" type="text/javascript" charset="UTF-8" src="//sinoptik.ua/informers_js.php?title=4&amp;wind=2&amp;cities=303010783,303028915,303016980,303017594,303021959&amp;lang=ua"></script>
                        </div>
                    </div>
                </div>
            </li>
            <li class="val-list-item-accrd">
                <div class="val-outer-block-item-accard">
                    <span class="val-title-item-accard">
                        <img src="<?=Yii::app()->baseUrl.'/public/images/twitter.jpg';?>" alt="">
                    </span>
                    <div class="val-outer-hide-accrad -else">
                        <div class="val-innre-hide-accard">
                            <div class="twitter">
                                <a data-chrome="noscrollbar"  class="twitter-timeline" href="https://twitter.com/svoboda_fm" data-widget-id="534429435424804864">Tweets by @svoboda_fm</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.setAttribute('async', 'true');js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</article>
<article class="val-full-width-category"></article>