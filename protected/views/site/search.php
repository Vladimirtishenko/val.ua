<?php 
    $dateNow = (new DateTime())->format('Y-m-d');
?>
<article class="val-column-left">
    <?php if(empty($searchNews->data) && empty($searchPhotos->data) && empty($searchVideos->data)): ?>

        <div class="forBlogH3">
            <h3><?= Yii::t('main', 'Результати пошуку'); ?></h3> <span class="fa fa-search-minus"></span>
        </div>
        <div class="new-class">
            <?= Yii::t('main', 'Нічого не знайдено'); ?>
        </div>

    <?php endif; ?>

    <?php if(!empty($searchNews->data)): ?>
    
    <h3 class="val-title-uppercase-with-line">
        <span> <?=Yii::t('main', 'Результати пошуку');?> </span>
        <?= CHtml::link(Yii::t('main', 'Новини'), array('/site/allNews')); ?>
     </h3>

    <div class="val-outer-line-news val-margin-bottom">
        <div class="val-gen-news-column -category">
            <?php foreach ($searchNews->data as $key => $item): ?>

                <a href="/<?=Yii::app()->language;?>/site/news/<?=$item['id']?>" class="val-block-gen-news">
                    <div class="val-image-block-gen-news">
                        <img src="/uploads/news/thumb/<?=$item['image'];?>">
                    </div>
                    <div class="val-description-block-gen-news">
                         <span class="val-news-view"><?=$item['views'];?></span>
                         <span class="val-content-news-data">
                         <?= 
                            ($dateNow == date('Y-m-d', strtotime($item['date']))) ? 
                                date('H:i', strtotime($item['date'])) : 
                                intval(date('d', strtotime($item['date']))).' '.Yii::app()->controller->getMonth($item['date']).' '.date('Y', strtotime($item['date'])); 
                        ?>
                        </span>
                        <h3 class="val-content-news-title-small"><?=CHtml::encode(Yii::app()->language == 'ru' ? $item['title_ru'] : $item['title_uk']);?></h3>
                    </div>
                </a>
           <? endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if(!empty($searchPhotos->data)): ?>
         <h3 class="val-title-uppercase-with-line">
            <span> <?=Yii::t('main', 'Результати пошуку');?> </span>
            <?= CHtml::link(Yii::t('main', 'Фоторепортажі'), array('/site/photos')); ?>
         </h3>
         
         <div class="val-outer-line-news val-margin-bottom">
             <div class="val-gen-news-column -category">
             <?php foreach ($searchPhotos->data as $keys => $items): ?>
                <a href="/<?=Yii::app()->language;?>/site/news/<?=$item['id']?>" class="val-block-gen-news">
                    <div class="val-image-block-gen-news">
                        <img src="/uploads/news/thumb/<?=$item['image'];?>">
                    </div>
                    <div class="val-description-block-gen-news">
                         <span class="val-content-news-data">
                         <?= 
                            ($dateNow == date('Y-m-d', strtotime($item['date']))) ? 
                                date('H:i', strtotime($item['date'])) : 
                                intval(date('d', strtotime($item['date']))).' '.Yii::app()->controller->getMonth($item['date']).' '.date('Y', strtotime($item['date'])); 
                        ?>
                        </span>
                        <h3 class="val-content-news-title-small"><?=CHtml::encode(Yii::app()->language == 'ru' ? $item['title_ru'] : $item['title_uk']);?></h3>
                    </div>
                </a>
           <? endforeach; ?>
            </div>  
            </div>
    <?php endif; ?>
    <?php if(!empty($searchVideos->data)): ?>
     <h3 class="val-title-uppercase-with-line">
        <span> <?=Yii::t('main', 'Результати пошуку');?> </span>
        <?= CHtml::link(Yii::t('main', 'Відеосюжети'), array('/site/videos')); ?>
     </h3>
        <div class="val-outer-line-news val-margin-bottom">
             <div class="val-gen-news-column -category">
             <?php foreach ($searchVideos->data as $keys => $item): ?>
                <a href="/<?=Yii::app()->language;?>/site/video/<?=$item['id']?>.html" class="val-block-gen-news">
                    <div class="val-image-block-gen-news">
                        <img class="val-video-template" src="http://img.youtube.com/vi/<?=$item['video']?>/mqdefault.jpg">
                    </div>
                    <div class="val-description-block-gen-news">
                         <span class="val-content-news-data">
                         <?= 
                            ($dateNow == date('Y-m-d', strtotime($item['date']))) ? 
                                date('H:i', strtotime($item['date'])) : 
                                intval(date('d', strtotime($item['date']))).' '.Yii::app()->controller->getMonth($item['date']).' '.date('Y', strtotime($item['date'])); 
                        ?>
                        </span>
                        <h3 class="val-content-news-title-small"><?=CHtml::encode(Yii::app()->language == 'ru' ? $item['title_ru'] : $item['title_uk']);?></h3>
                    </div>
                </a>
           <? endforeach; ?>
            </div>  
            </div>
    <?php endif; ?>
</article>