<!DOCTYPE html>
<html>
<head>
    <title><?= $this->pageTitle; ?></title>
    <?php if(Yii::app()->language == 'uk'): ?>
        <meta http-equiv="Content-Language" content="ua" />
    <?php else: ?>
       <meta http-equiv="Content-Language" content="ru" />
    <?php endif; ?>
    <meta name="Description" content="<?= $this->pageDescription; ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=1280, initial-scale=-1">
    <meta name="author" content="Високий Вал">
    <meta name="copyright" content="copyright ©2005-2015 Високий Вал" /> 
    <meta content="<?= $this->pageDescription; ?>" name="description">
    <meta property = "og:title" content = "<?= $this->pageTitle; ?>" />
    <meta property = "og:type" content = "website" />
    <meta property="article:author" content="Високий Вал">
    <meta property="og:url" content="<?='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>">
    <meta property = "og:description" content = "<?= $this->pageDescription; ?>" />  
    <meta property="og:site_name" content="Val.ua" />
    <?php foreach ($this->metaAttributes as $value) {
        echo $value;
    } ?>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="<?='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>">
    <meta name="twitter:title" content="<?= $this->pageTitle; ?>">
    <meta name="twitter:description" content="<?= $this->pageDescription; ?>">
    <meta name="twitter:site" content="Val.ua">
    <meta name="google-site-verification" content="ZKjQqhmkC9GTAIJI6KoY8DGJFhe_uTALVdqMQ2GrwZo" />
    <link rel="Shortcut Icon" type="image/x-icon" href="<?= Yii::app()->baseUrl; ?>/images/favicon.ico">
    <link rel="alternate" href="http://val.ua/feed/rss/" type="application/xml" title="Val.ua Rss">
    <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>public/prodaction/bundle.min.css">
</head>
<body>
    <section class="val-all-outer">
        <section class="val-header-outer-block">
            <header class="val-header">
                <div class="val-top-line">
                    <div class="val-outer-left-button">
                        <a href="#" class="val-button-menu">Меню</a>
                        <a href="#" class="val-button-search">Поиск</a> 
                    </div>
                    <div class="val-outer-social-button">
                        <ul>
                            <li>
                                <a href="#" class="val-twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="val-vk"></a>
                            </li>
                            <li>
                                <a href="#" class="val-g"></a>
                            </li>
                            <li>
                                <a href="#" class="val-youtube"></a>
                            </li>
                            <li>
                                <a href="#" class="val-fb"></a>
                            </li>
                            <li>
                                <a href="#" class="val-rss"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="val-outer-right-button">
                        <button class="button -gen-green">Вход</button>
                        <button class="button -gen-blue">Регистрация</button>
                    </div>
                </div>
                <div class="val-logo-line">
                    <?= CHtml::link(CHtml::image(Yii::app()->baseUrl.'public/images/logo.png', 'logo'),array('/site/index')); ?>
                </div>
                <div class="val-widget-line">
                    <ul>
                        <li>
                            <span class="val-data-today"><?= $this->getCurrentDate(); ?></span>
                        </li>
                        <li>
                            <a href="#" class="val-redaction">Редакция</a>
                        </li>
                        <li>
                            <a href="#" class="val-market">Реклама</a>
                        </li>
                        <li>
                            <div class="-with-before -currency-val" href="#">
                                <span class="val-currency-text">Валюта</span>
                            </div>
                        </li>
                        <li>
                            <div class="outer-for-weather"></div>
                        </li>
                    </ul>
                    
                </div>
                <div class="val-menu-line">
                    <ul class="val-menu-list">
                        <li><?= CHtml::link(Yii::t('main', 'Політика'), array('/site/category', 'alias'=>'politics')); ?></li>
                        <li><?= CHtml::link(Yii::t('main', 'Економіка'), array('/site/category', 'alias'=>'economic')); ?></li>
                        <li><?= CHtml::link(Yii::t('main', 'Суспільство'), array('/site/category', 'alias'=>'social')); ?></li>
                        <li><?= CHtml::link(Yii::t('main', 'Культура'), array('/site/category', 'alias'=>'culture')); ?></li>
                        <li><?= CHtml::link(Yii::t('main', 'Надзвичайнi подii'), array('/site/category', 'alias'=>'crime')); ?></li> 
                        <li><?= CHtml::link(Yii::t('main', 'Технології'), array('/site/category', 'alias'=>'it')); ?></li>
                        <li><?= CHtml::link(Yii::t('main', 'Спорт'), array('/site/category', 'alias'=>'sport')); ?></li>
                        <li><?= CHtml::link(Yii::t('main', 'Курйози'), array('/site/category', 'alias'=>'curiosities')); ?></li>
                        <li><?= CHtml::link(Yii::t('main', 'Аналітика'), array('/site/category', 'alias'=>'analitic')); ?></li>
                        <li><?= CHtml::link(Yii::t('main', 'Вкраїна'), array('/site/category', 'alias'=>'vkraina')); ?></li>
                        <li><?= CHtml::link(Yii::t('main', 'Блоги'), array('/blog/default/index')); ?></li>
                        <li><?= CHtml::link(Yii::t('main', 'Фото'), array('/site/photos')); ?></li>
                        <li><?= CHtml::link(Yii::t('main', 'Відео'), array('/site/videos')); ?></li> 
                    </ul>
                </div>
            </header>   
                
        </section>
        <section class="val-outer-news-block">
            <?= $content; ?>
        </section> 
    </section>
    <script src="public/js/controller.js"></script>
</body>
</html>