<?php
$this->pageTitle = Yii::app()->language == 'ru' ? $category->meta_title_ru : $category->meta_title_uk;
$this->pageDescription = Yii::app()->language == 'ru' ? $category->meta_description_ru : $category->meta_description_uk;
?>
<div class="forBlogH3">
    <h3>
        <?= Yii::t('main', 'ТОП матеріали'); ?>
    </h3>
    <span class="fa fa-file-o"></span>
    <?php if(is_object($category)): ?>
        <?= CHtml::link(Yii::t('main', '').' '.(Yii::app()->language == 'ru' ? $category->name_ru : $category->name_uk), array('/site/category', 'alias'=>$category->alias)); ?>
    <?php else: ?>
        <?= Yii::t('main', $category); ?>
    <?php endif; ?>
</div>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ TOP SLIDER \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<div class="topSlider categoryCat">
<div class="topSlider">
    <div class="val-outer-slider">
        <span class="val-controls val-next" data-arrow="next"></span>
        <span class="val-controls val-prev" data-arrow="prev"></span>
        <div class="val-inner-slider">
            <span class="val-slide-preloads"></span>
            <ul class="val-list-slider">
            <?php foreach($mostViewed as $news): ?>
                <li>
                    <a href="#">
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
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END TOP SLIDER \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<div class="marketInOneCategoryPagebottom">
    <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>'marketInOneCategory'.ucfirst($category->alias))); ?>
</div>
<div>
    <div class="forBlogH3">
        <h3><?= Yii::t('main', 'Всі новини'); ?></h3>
        <span class="fa fa-file-o"></span>
        <?php if(is_object($category)): ?>
            <?= CHtml::link(Yii::t('main', '').' '.(Yii::app()->language == 'ru' ? $category->name_ru : $category->name_uk), array('/site/category', 'alias'=>$category->alias)); ?>
        <?php else: ?>
            <?= Yii::t('main', $category); ?>
        <?php endif; ?>
    </div>
    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'ajaxUpdate'=>false,
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
            'htmlOptions'=>array('class'=>'sad'),
        ),
        'pagerCssClass'=>'pager',
        'sortableAttributes'=>array(
            'rating',
            'create_time',
        ),
        'itemsCssClass'=>'category',
    ));
    ?>
</div>
<div class="marketOwnNewA">

</div>