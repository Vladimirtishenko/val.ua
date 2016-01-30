<?php if(Yii::app()->user->hasFlash('error')): ?>
    <div class="alert alert-danger" style="display: none">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <p><?php  echo Yii::app()->user->getFlash('error'); ?></p>
    </div>
<?php elseif (Yii::app()->user->hasFlash('success')): ?>
    <div class="alert alert-info" style="display: none">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <p><?php  echo Yii::app()->user->getFlash('success'); ?></p>
    </div>
<?php endif; ?>
<?php
Yii::app()->clientScript->registerScript(
    'myShowHideEffect',
    '
        jQuery(".alert").fadeIn(1200);
    ',
    CClientScript::POS_READY
); ?>