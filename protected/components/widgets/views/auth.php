<?php ?>



<?php $form=$this->beginWidget('CActiveForm', array(
    'htmlOptions' =>array('class'=>'sing'),
    'id'=>'login-form',
    'action'=>'/site/login',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>



<?php echo $form->emailField($model,'username', array('placeholder'=>'Введите Email...', 'class'=>'form-control', 'required'=>'required')); ?>


<?php echo $form->passwordField($model,'password', array('placeholder'=>'Введите пароль...', 'class'=>'form-control', 'required'=>'required')); ?>

<?= CHtml::tag('button', array('class' => 'button -gen-green -no-margin-left-only-right'), 'Войти') ?>
<a href="#" class="-val-remember-pass">Напомнить пароль</a>


<?php $this->endWidget(); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'htmlOptions' =>array('class'=>'remember'),
    'id'=>'rem-form',
    'action'=>'/site/remember',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

<?php echo $form->textField($remember,'email', array('placeholder'=>'Введите Email...', 'class'=>'form-control', 'required'=>'required')); ?>

<?= CHtml::tag('button',
    array('class' => 'btn btn-default'),
    '<span class="glyphicon glyphicon-log-in"></span>'); ?>
    <button type="button" class="btn btn-info back"><span class="glyphicon glyphicon-arrow-left"></span></button>
<?php $this->endWidget(); ?>
