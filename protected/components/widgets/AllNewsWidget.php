<?php
class AllNewsWidget extends CWidget
{
    public $allNews;

    public function init()
    {
         $this->allNews = News::model()->findAll(array(
            'select'=>'id, date, image, title_ru, title_uk, views, marker',
            'limit'=>'15',
            'order'=>'date DESC',
            'condition'=>'date < :now','params'=>array(':now'=>date("Y-m-d H:i:s",time()+3600))
        ));
    }
    public function run()
    {
        $this->render('allNews', array('allNews' => $this->allNews));
    }
}