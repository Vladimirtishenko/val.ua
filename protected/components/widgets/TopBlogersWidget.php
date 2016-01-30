<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22.08.14
 * Time: 15:17
 */
class TopBlogersWidget extends CWidget
{
    public $blogers;
    public function init()
    {
        $this->blogers = User::model()->findAllBySql("SELECT DISTINCT *, (SELECT COUNT(*) FROM articles WHERE author_id = `user`.`id`) AS count,(SELECT date FROM articles WHERE articles.author_id = user.id ORDER BY date LIMIT 1) AS dertw FROM user WHERE (user.role = 'bloger') ORDER BY dertw DESC LIMIT 9");
    }
    public function run()
    {
        $this->render('top_blogers', array('blogers'=>$this->blogers));
    }
}