<article class="val-column-left">
     <h3 class="val-title-uppercase-with-line">
        <?=Yii::t('main', 'Всi новини')?>
     </h3>
    
    <div class="val-outer-line-news">
        <div class="val-gen-news-column -category">
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$allNews,
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
        </div>
    </div>
</article>