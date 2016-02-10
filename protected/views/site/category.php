<?php
$this->pageTitle = Yii::app()->language == 'ru' ? $category->meta_title_ru : $category->meta_title_uk;
$this->pageDescription = Yii::app()->language == 'ru' ? $category->meta_description_ru : $category->meta_description_uk;
?>
