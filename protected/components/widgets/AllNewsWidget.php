<?php
class AllNewsWidget extends CWidget
{
    public $allNews;

    public function init()
    {
        $this->allNews = News::model()->findAll(array('limit'=>15, 'order'=>'date DESC', 'condition'=>'date < :now','params'=>array(':now'=>date('Y-m-d H:i:s', time()))));

        $this->$allNewsPhoto = array_slice($this->allNews, 0, 5);
        $this->$allNewsLine = array_slice($this->allNews, 5, 15);

    }
    public function run()
    {
        $this->render('allNews', array('allNewsLine' => $this->allNewsLine, 'allNewsPhoto' => $allNewsPhoto));
    }
}