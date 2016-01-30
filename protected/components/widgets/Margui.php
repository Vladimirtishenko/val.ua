<?php
class Margui extends CWidget
{
    public $lastNews = array();

    public function init()
    {
        $this->lastNews = News::model()->findAll(array('select'=> 'id, title_ru, title_uk, marker','condition'=>'date < :now','params'=>array(':now'=>date('Y-m-d H:i:s', time())), 'order'=>'date DESC', 'limit'=>5));
    }
    public function run()
    {
        $this->render('margui', array('lastNews' => $this->lastNews));
    }
}