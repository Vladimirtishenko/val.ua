<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22.08.14
 * Time: 15:55
 */
?>
<?php foreach($blogers as $bloger): ?>
    <div class="line_vip_blogs">
        <?= CHtml::image(Yii::app()->baseUrl.'/uploads/users/avatars/'.$bloger->avatar, $bloger->name); ?>
        <div class="for_blog_text">
            <?= CHtml::link($bloger->name, array('/blog/default/bloger', 'id'=>$bloger->id)); ?><br>

            <?php $post = Articles::model()->find(array('condition'=>'author_id = :author', 'params'=>array(':author'=>$bloger->id), 'order'=>'date DESC', 'limit'=>1, 'select'=>'id, title, date')); ?>

            <span><span class="glyphicon glyphicon-calendar"></span> &nbsp; <?= $post->date; ?></span>
            <p><?= CHtml::encode($post->title); ?></p>
        </div>
    </div>
<?php endforeach; ?>