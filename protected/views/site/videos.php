<div class="marketInOneCategoryPagebottom">
<?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>43)); ?>
</div>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$data,
    'ajaxUpdate'=>false,
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
    'pagerCssClass'=>'navigation',
    'sortableAttributes'=>array(
        'rating',
        'create_time',
    ),
    'itemsCssClass'=>'videoBlockGalery',
));
?>
<div class="marketOwnNewA">

</div>
