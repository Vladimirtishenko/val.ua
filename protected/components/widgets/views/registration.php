<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 04.11.14
 * Time: 23:32
 */ ?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'registration-form',
    'action'=>'/site/registration',
    'enableClientValidation'=>true,
    'enableAjaxValidation' => true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
<?php echo $form->emailField($model,'username', array('placeholder'=>strip_tags($form->labelEx($model,'username')), 'class'=>'form-control', 'required'=>'required')); ?>

<?php echo $form->passwordField($model,'password', array('placeholder'=>strip_tags($form->labelEx($model,'password')), 'class'=>'form-control', 'required'=>'required')); ?>

<?= CHtml::tag('button',
    array('class' => 'btn btn-info'),
    '<span class="fa fa-sign-in"></span>'); ?>
<?php $this->endWidget(); ?>