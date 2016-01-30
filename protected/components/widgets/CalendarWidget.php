<?php
class CalendarWidget extends CWidget
{
    public $model;

    public function init()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 'date';
        $criteria->distinct = true;
        $criteria->limit = 500;
        $criteria->order = 'date DESC';
        $this->model = News::model()->findAll($criteria);
    }
    public function run()
    {
        $this->render('calendar', array('arr'=>$this->getArray($this->model)));
    }

    public  function getArray($model)
    {
        $arr =array();
        foreach($model as $date)
        {
            $dt = explode(' ',$date->date);
            $arr[] = $dt[0];
        }
        return array_unique($arr);
    }
}