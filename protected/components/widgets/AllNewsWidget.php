<?php
class AllNewsWidget extends CWidget
{
    public $allNews;

    public function init()
    {
        $this->allNews = News::model()->findAll(array('limit'=>30, 'order'=>'date DESC', 'condition'=>'date < :now','params'=>array(':now'=>date('Y-m-d H:i:s', time()))));
    }
    public function run()
    {
        $this->render('allNews', array('allNews' => $this->allNews));
    }
}