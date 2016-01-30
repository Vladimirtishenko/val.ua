<?php

class PhotoNewsWidget extends CWidget
{
    public $model;
    public function init()
    {
        $this->model = PhotoCategory::model()->findAll(array('order'=>'date DESC', 'limit'=>12, 'select'=>'name_ru, name_uk, id, image'));
    }
    public function run()
    {
        $this->render('photoNews', array('model'=>$this->model));
    }
}