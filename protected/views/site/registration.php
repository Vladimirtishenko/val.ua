<?php
/* @var $this SiteController */
/* @var $model User */
/* @var $form CActiveForm */
?>
<div class="politics">
    <h3>регистрация</h3>
</div>
<div class="reg_form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'registration-form',
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
    <?php echo $form->labelEx($model,'username'); ?>
    <?php echo $form->textField($model,'username', array('placeholder'=>'Введите фамилию, имя и отчество', 'class'=>'form-control')); ?>
    <?php echo $form->error($model,'username'); ?>

    <?php echo $form->labelEx($model,'name'); ?>
    <?php echo $form->textField($model,'name', array('placeholder'=>'Введите ваш Email', 'class'=>'form-control')); ?>
    <?php echo $form->error($model,'name'); ?>

    <?php echo $form->labelEx($model,'password'); ?>
    <?php echo $form->textField($model,'password', array('placeholder'=>'Придумайте пароль', 'class'=>'form-control')); ?>
    <?php echo $form->error($model,'password'); ?>

    <?php echo $form->labelEx($model,'password_2'); ?>
    <?php echo $form->textField($model,'password_2', array('placeholder'=>'Подтвердите пароль', 'class'=>'form-control')); ?>
    <?php echo $form->error($model,'password_2'); ?>

    <?php echo $form->labelEx($model,'birth_date'); ?>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'birth_date',
        'model' => $model,
        'attribute' => 'birth_date',
        'language' => 'ru',
        'options' => array(
            'showAnim' => 'fold',
        ),
        'htmlOptions' => array(
            'class' => 'form-control',
        ),
    ));
    ?>
    <?php echo $form->error($model,'birth_date'); ?>

    <?php echo $form->labelEx($model,'sex'); ?>
    <?php echo $form->dropDownList($model,'sex', array(1=>Yii::t('main', 'Чоловіча'), 2=>Yii::t('main', 'Жіноча')), array('class'=>'form-control', 'empty'=>Yii::t('main', 'Виберіть стать'))); ?>
    <?php echo $form->error($model,'sex'); ?>


    <div class="capcha">
        <?php echo $form->labelEx($model,'verifyCode'); ?>
        <?php $this->widget('CCaptcha', array('id'=>'Captcha_1')); ?>
        <?php echo $form->textField($model,'verifyCode', array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'verifyCode',$htmlOptions=array()); ?>
    </div>

    <div class="l_b margins">
        <input type="checkbox" value="subscribe" checked>&nbsp; <span class="glyphicon glyphicon-envelope"></span> Подписаться на новости
        <p class="help-block">Получайте всегда свежие новости по почте.</p>
    </div>
    <div class="margins">
        <?php echo CHtml::submitButton(Yii::t('main', 'Зареэструватись'), array('class'=>'btn btn-danger')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
<div class="politics">
    <h3>Советы при регистрации</h3>
    <p>

        Реєстрація на «Високому Валі» дозволяє отримати єдиний логін і пароль для всіх сервісів сайту. Надалі Вам буде не потрібно заповнювати додаткові поля, щоб залишати свої коментарі під публікаціями сайту. Логін і пароль, отримані під час реєстрації, Ви можете використовувати для керування своїми оголошеннями, блогами та повідомленнями на форумі. Зареєструвавши скриньку   newvv.net, Ви отримуєте необмежену поштову скриньку без спаму і вірусів, з багатьма перевагами, можливостями пошуку і чатом безпосередньо у поштовій консолі. <br><br>
        Вибираючи собі пароль, не використовуйте дату свого народження або своє ім'я, тому що це найпростіший спосіб для зловмисника одержати доступ до Вашої скриньки.<br><br>
        Заповнюйте правильно всі поля, особливо дату народження, країну проживання і секретне запитання. Ці дані допоможуть Вам відновити доступ до скриньки, якщо Ви випадково забудете свій пароль.<br><br>
        Після закінчення роботи з поштою не забудьте натиснути на "вихід". Це необхідно зробити для завершення сесії, якою може скористатися зловмисник, якщо зможе її перехопити.<br><br>
        Щоб не одержувати багато непотрібної кореспонденції (СПАМ), не залишайте свою e-mail адресу на різних сайтах. Ці сайти можуть скануватися спамерами і Ваша адреса потім потрапить у бази даних, за якими розсилається СПАМ. Відписатися від нього практично неможливо.<br><br>
        На нашому порталі поле e-mail захищене від такого сканування, тому в ньому можна вказувати свою адресу.
    </p>
</div>