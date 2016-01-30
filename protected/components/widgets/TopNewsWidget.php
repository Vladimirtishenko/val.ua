<?php
class TopNewsWidget extends CWidget
{
    public $topNews;

    public function init()
    {
        $this->topNews = News::model()->findAll(array('limit'=>5, 'order'=>'views DESC'));
    }
    public function run()
    {
        $this->render('topNews', array('topNews' => $this->topNews));
    }
}