<?php if(empty($searchNews->data) && empty($searchPhotos->data) && empty($searchVideos->data)): ?>

    <div class="forBlogH3">
        <h3><?= Yii::t('main', 'Результати пошуку'); ?></h3> <span class="fa fa-search-minus"></span>
    </div>
    <div class="new-class">
        <?= Yii::t('main', 'Нічого не знайдено'); ?>
    </div>

<?php endif; ?>
<?php if(!empty($searchNews->data)): ?>
<div class="forBlogH3">
    <h3><?= Yii::t('main', 'Результати пошуку'); ?></h3> <span class="fa fa-search-plus"></span> <a><?= Yii::t('main', 'Новини'); ?></a>
</div>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$searchNews,
    'ajaxUpdate'=>true,
    'itemView'=>'_category',
    'template'=>'{items}{pager}',
    'cssFile'=>false,
    'pager'=>array(
        'maxButtonCount' => 5,
        'lastPageLabel'=>'>>',
        'nextPageLabel'=>'>',
        'prevPageLabel'=>'<',
        'firstPageLabel'=>'<<',
        'class'=>'CLinkPager',
        'header'=>false,
        'cssFile'=>'/css/pager.css', // устанавливаем свой .css файл
        'htmlOptions'=>array('class'=>'sfd'),
    ),
    'pagerCssClass'=>'pager',
    'sortableAttributes'=>array(
        'rating',
        'create_time',
    ),
    'itemsCssClass'=>'category',
));
?>
<?php endif; ?>
<?php if(!empty($searchPhotos->data)): ?>
    <div class="forBlogH3">
        <h3><?= Yii::t('main', 'Результати пошуку'); ?></h3> <span class="fa fa-camera"></span> <a><?= Yii::t('main', 'Фоторепортажі'); ?></a>
    </div>
    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$searchPhotos,
        'itemView'=>'_albums',
        'template'=>'{items}{pager}',
        'cssFile'=>false,
        'pager'=>array(
            'lastPageLabel'=>'>>',
            'nextPageLabel'=>'>',
            'prevPageLabel'=>'<',
            'firstPageLabel'=>'<<',
            'class'=>'CLinkPager',
            'header'=>false,
            'cssFile'=>false, // устанавливаем свой .css файл
            'htmlOptions'=>array('class'=>'pager'),
        ),
        'sortableAttributes'=>array(
            'rating',
            'create_time',
        ),
        'pagerCssClass'=>'pager',
        'itemsCssClass'=>'photoBlock',
    ));
    ?>
<?php endif; ?>
<?php if(!empty($searchVideos->data)): ?>
<div class="forBlogH3">
    <h3><?= Yii::t('main', 'Результати пошуку'); ?></h3> <span class="fa fa-play-circle-o"></span> <a><?= Yii::t('main', 'Відеосюжети'); ?></a>
</div>

    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$searchVideos,
        'ajaxUpdate'=>true,
        'itemView'=>'_video',
        'template'=>'{items}{pager}',
        'cssFile'=>false,
        'pager'=>array(
            'maxButtonCount' => 5,
            'lastPageLabel'=>'>>',
            'nextPageLabel'=>'>',
            'prevPageLabel'=>'<',
            'firstPageLabel'=>'<<',
            'class'=>'CLinkPager',
            'header'=>false,
            'htmlOptions'=>array('class'=>'sfd'),
        ),
        'pagerCssClass'=>'pager',
        'sortableAttributes'=>array(
            'rating',
            'create_time',
        ),
        'itemsCssClass'=>'videoBlockGalery',
    ));
    ?>
<?php endif; ?>