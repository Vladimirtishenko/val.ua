<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 14.09.14
 * Time: 17:04
 */
class MainNewsWidget extends CWidget
{
    public $model = array();
    public function init()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'main = :main';
        $criteria->params = array(':main'=>1);
        $criteria->order = 'date DESC';
        $this->model = News::model()->find($criteria);
    }
    public function run()
    {
        $this->render('mainNews', array('model'=>$this->model));
    }
}