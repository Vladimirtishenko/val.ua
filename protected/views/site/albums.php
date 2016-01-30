<?php
/* @var $this SiteController */
/* @var $data PhotoCategory */
/* @var $page Pages */
?>
<div class="marketInOneCategoryPagebottom">
<?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>44)); ?>
</div>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$data,
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
<div class="marketOwnNewA">

</div>




