<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';

?>

<div class="val-outer-error">
	
	<h2 class="val-outer-error__title"><span><?= Yii::t('main', 'Помилка'); ?> #</span> <i><?php echo $code; ?></i></h2>

	<div class="val-outer-error__description">
		<?php echo CHtml::encode($message); ?>
	</div>
	<div class="val-outer-error__home">
		<a href="/" class="button -gen-green"><?= Yii::t('main', 'На головну'); ?></a>
	</div>
</div>
