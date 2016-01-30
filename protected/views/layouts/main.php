<!DOCTYPE html>
<html>
<head>
    <title><?= $this->pageTitle; ?></title>
    <?php if(Yii::app()->language == 'uk'): ?>
        <meta http-equiv="Content-Language" content="ua" />
    <?php else: ?>
       <meta http-equiv="Content-Language" content="ru" />
    <?php endif; ?>
    <meta name='advmaker-verification' content='e2a7df1857a007dac67afadcd9004aee'/>
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
    <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/prodaction/bundle.min.css">
</head>
<body>
<style>
    .marketHeadLeft {
        width: 250px;
        height: 62px;
        left: 0;
        top: 15px;
    }
    .marketHeadRight {
        right: 0px;
        top: 17px;
        width: 235px;
        height: 60px;
    }
    .market-block{
        margin: 10px auto;
        display: table;
    }
    .custom-market{
        margin: 0 auto 10px;
        display: table;
    }
</style>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ MAIN BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<!---- Flash message ---->
<?php $this->widget('application.components.widgets.FlashWidget'); ?>
<!---- End Flash message ---->

<div class="modal-background-pop-up">
	<div class="arhive -drop-down-pop-up" data-attr="arhive">
	    <?php
	    $this->beginWidget('CActiveForm', array(
	        'id'=>'srhiv',
	        'method'=>'get',
	        'action'=>array('/site/search'),
	    ));
	    ?>
		
	    <?= CHtml::textField('find', '', array('class'=>'form-control', 'placeholder'=>Yii::t('main', 'Шукати...'))); ?>
	    <?= CHtml::dropDownList('category',
	        '',
	        CHtml::listData( NewsCategory::model()->findAll(),'id', Yii::app()->language == 'ru' ? 'name_ru' : 'name_uk') + array('video'=>Yii::t('main','Відео'), 'photo'=>Yii::t('main','Фото')),
	        array('class'=>'form-control', 'placeholder'=>Yii::t('main', 'Шукати...'), 'empty'=>Yii::t('main', 'Всі категорії'))
	    ); ?>
	   <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
	        'name'=>'publishDate',
	        'language'=>'uk',
	        'options'=>array(
	            'showAnim'=>'fold',
	            'dateFormat' => 'yy-mm-dd',
	        ),
	        'htmlOptions'=>array(
	            'class'=>'form-control',
	            'placeholder'=>"Дата..."
	        ),
	    ));
	    ?>
        <!-- <?= CHtml::textField('find', '', array('class'=>'form-control single-date', 'placeholder'=>Yii::t('main', 'Шукати...'))); ?> -->
	    <?= CHtml::tag('button',
	        array('class' => 'btn btn-info'),
	        '<span class="fa fa-search"></span>'); ?>
	    <?php $this->endWidget(); ?>
	</div>



	<div class="logins -drop-down-pop-up" data-attr="login">
	    <?php $this->widget('application.components.widgets.AuthWidget'); ?>
	</div>


	<div class="reg -drop-down-pop-up" data-attr="registration">
	    <?php $this->widget('application.components.widgets.RegistrationWidget'); ?>
	</div>



	<div class="redakcia -drop-down-pop-up" data-attr="redakcia">
	    <div class="resIn">
	        <h3>Інтернет-видання "Високий Вал"</h3>
	        <p>

	            <b>Інтернет-видання "Високий Вал"</b><br><br>

	            <b>e-mail:</b> <a href="mailto:news@svoboda.fm">news@svoboda.fm</a><br><br>

	            <b>ICQ:</b> 392-699-056


	        <h3>Наша кнопка</h3>



	        <br /><p>Код для вставки кнопки:</p>

	        <code>
	            &#32;&#60;&#97;&#32;&#104;&#114;&#101;&#102;&#61;&#34;&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#110;&#101;&#119;&#118;&#118;&#46;&#110;&#101;&#116;&#47;&#34;&#32;&#116;&#105;&#116;&#108;&#101;&#61;&#34;&#1063;&#1077;&#1088;&#1085;&#1110;&#1075;&#1110;&#1074;&#32;&#58;&#58;&#32;&#1030;&#1085;&#1090;&#1077;&#1088;&#1085;&#1077;&#1090;&#45;&#1075;&#1072;&#1079;&#1077;&#1090;&#1072;&#58;&#32;&#1053;&#1086;&#1074;&#1080;&#1085;&#1080;&#44;&#32;&#1072;&#1085;&#1072;&#1083;&#1110;&#1090;&#1080;&#1082;&#1072;&#44;&#32;&#1087;&#1086;&#1083;&#1110;&#1090;&#1080;&#1082;&#1072;&#44;&#32;&#1082;&#1091;&#1083;&#1100;&#1090;&#1091;&#1088;&#1072;&#44;&#32;&#1089;&#1087;&#1086;&#1088;&#1090;&#44;&#32;&#1082;&#1088;&#1080;&#1084;&#1110;&#1085;&#1072;&#1083;&#46;&#32;&#1053;&#1072;&#1081;&#1082;&#1088;&#1072;&#1097;&#1110;&#32;&#1089;&#1077;&#1088;&#1074;&#1110;&#1089;&#1080;&#58;&#32;&#1087;&#1086;&#1096;&#1090;&#1072;&#44;&#32;&#1073;&#1083;&#1086;&#1075;&#1080;&#44;&#32;&#1088;&#1072;&#1076;&#1110;&#1086;&#44;&#32;&#1079;&#1085;&#1072;&#1081;&#1086;&#1084;&#1089;&#1090;&#1074;&#1072;&#44;&#32;&#1086;&#1075;&#1086;&#1083;&#1086;&#1096;&#1077;&#1085;&#1085;&#1103;&#44;&#32;&#1092;&#1086;&#1090;&#1086;&#34;&#32;&#97;&#108;&#116;&#61;&#34;&#1063;&#1077;&#1088;&#1085;&#1110;&#1075;&#1110;&#1074;&#32;&#58;&#58;&#32;&#1030;&#1085;&#1090;&#1077;&#1088;&#1085;&#1077;&#1090;&#45;&#1075;&#1072;&#1079;&#1077;&#1090;&#1072;&#58;&#32;&#1053;&#1086;&#1074;&#1080;&#1085;&#1080;&#44;&#32;&#1072;&#1085;&#1072;&#1083;&#1110;&#1090;&#1080;&#1082;&#1072;&#44;&#32;&#1087;&#1086;&#1083;&#1110;&#1090;&#1080;&#1082;&#1072;&#44;&#32;&#1082;&#1091;&#1083;&#1100;&#1090;&#1091;&#1088;&#1072;&#44;&#32;&#1089;&#1087;&#1086;&#1088;&#1090;&#44;&#32;&#1082;&#1088;&#1080;&#1084;&#1110;&#1085;&#1072;&#1083;&#46;&#32;&#1053;&#1072;&#1081;&#1082;&#1088;&#1072;&#1097;&#1110;&#32;&#1089;&#1077;&#1088;&#1074;&#1110;&#1089;&#1080;&#58;&#32;&#1087;&#1086;&#1096;&#1090;&#1072;&#44;&#32;&#1073;&#1083;&#1086;&#1075;&#1080;&#44;&#32;&#1088;&#1072;&#1076;&#1110;&#1086;&#44;&#32;&#1079;&#1085;&#1072;&#1081;&#1086;&#1084;&#1089;&#1090;&#1074;&#1072;&#44;&#32;&#1086;&#1075;&#1086;&#1083;&#1086;&#1096;&#1077;&#1085;&#1085;&#1103;&#44;&#32;&#1092;&#1086;&#1090;&#1086;&#34;&#32;&#62;&#60;&#105;&#109;&#103;&#32;&#115;&#114;&#99;&#61;&#34;&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#110;&#101;&#119;&#118;&#118;&#46;&#110;&#101;&#116;&#47;&#112;&#117;&#98;&#108;&#105;&#99;&#47;&#105;&#109;&#97;&#103;&#101;&#115;&#47;&#117;&#97;&#47;&#98;&#117;&#116;&#116;&#111;&#110;&#46;&#103;&#105;&#102;&#34;&#32;&#47;&#62;&#60;&#47;&#97;&#62;&#32;
	        </code>

	        </p>
	    </div>
	</div>

	<div class="project -drop-down-pop-up" data-attr="project">
	    <div class="resIn">
	        <h3>Про Проект</h3>
	        <p>
	            "Високий Вал" — Інтернет-видання, яке ставить за мету максимально широко та об'єктивно відображати політичне, економічне, культурне життя Чернігівської області і України. "Високий Вал" – незалежна медіа-структура, яка у своїй діяльності дотримується принципів відкритості та прозорості, традицій класичної журналістики з неупередженою і збалансованою подачею інформації. <b>"Високий Вал" заснований 2001-го року Олегом Головатенком.</b><br /><br />
	            З 2004-го року до Інтернет-видання долучилися провідні журналісти Чернігівської області, зокрема <b>Владислав САВЕНОК у якості головного редактора видання.</b><br /><br />
	            7 липня 2005-го року зареєстрований обласний тижневик <b>"Високий Вал" (засновник - Олег Головатенко, <spanns>свідоцтво про реєстрацію ЧГ №324 від 07.07.2005 р</spanns>.)</b> .<br /><br />
	            У 2007-му році Поліський фонд міжнародних та регіональних досліджень презентував результати експертного дослідження "Чернігівщина експертна-2006". За його результатами <b>"Високий Вал" став найбільш впливовим виданням регіону. Найвпливовішим чернігівським ЗМІ "Високий Вал" був визнаний також у 2007-му і 2009-му роках.</b><br /><br />
	            Наприкінці 2007-го року була створена однойменна Телерадіокомпанія, з якою у лютому 2011-го року Інтернет-видання "Високий Вал" і його засновник Олег Головатенко припинив стосунки у зв'язку з невиконанням співзасновником ТОВ ТРК "Високий Вал" взятих на себе зобов'язань і нанесенні шкоди репутації Інтернет-видання.<br /><br />

	            <span style="color:#1fa49f;">Увага! Інтернет-ресурси, розташовані поза доменними іменами val.ua, svoboda.fm і newvv.net, не мають жодного стосунку до Інтернет-видання "Високий Вал", його колективу, і є шахрайською підробкою їх власників.</span><br /><br />
	        <div class="forCenter">"Високий Вал" відкритий до співпраці з журналістами та зацікавленими у поширенні інформації медіа структурами.<br /><br />

	            <b>Наші координати:</b><br />
	            Tel.: (+380462) 931-931, (+38044) 491-88-85.<br />
	            ICQ: 392-699-056; <br />
	            Skype: o.holovatenko.<br />
	            E-mail: <a href="mailto:news@svoboda.fm">news@svoboda.fm</a><br />

	        </div>


	        </p>
	    </div>
	</div>
</div>


<div class="fixedBlockMenu">
    <h3 class="menuLeftH3">Рубрики &nbsp; <span>&#9660;</span></h3>
    <ul class="menuCategory">
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
        <li><?= CHtml::link(Yii::t('main', 'Відео'), array('/site/videos')); ?></li>
        <li><?= CHtml::link(Yii::t('main', 'Фотогалерея'), array('/site/photos')); ?></li>
    </ul>

    <h3 class="menuLeftH3"><?= Yii::t('main', 'Регіони'); ?> &nbsp; <span>&#9660;</span></h3>
    <ul class="menuCategory">
        <li><a href="<?= Yii::app()->createUrl('/site/regions', array('region'=>'Прилуки')); ?>"><?= Yii::t('main', 'Прилуки'); ?></a></li>
        <li><a href="<?= Yii::app()->createUrl('/site/regions', array('region'=>'Нежин')); ?>"><?= Yii::t('main', 'Ніжин'); ?></a></li>
        <li><a href="<?= Yii::app()->createUrl('/site/regions', array('region'=>'Новгород-Северский')); ?>"><?= Yii::t('main', 'Новгород-Сіверський'); ?></a></li>
    </ul>
     <div class="socTopMenu">
            <a class="-val-g" href="#"><i class="fa fa-google-plus"></i></a>
            <a class="-val-vk" href="https://vk.com/val_ua" target="_blank"><i class="fa fa-vk"></i></a>
            <a class="-val-face" href="https://www.facebook.com/VysokyiVal" target="_blank"><i class="fa fa-facebook"></i></a>
            <a class="-val-twit" href="https://twitter.com/svoboda_fm" target="_blank"><i class="fa fa-twitter"></i></a>
            <a class="-val-yt" href="#"><i class="fa fa-youtube-play"></i></a> 
            <a class="-val-rss" href="http://val.ua/feed/rss"><i class="fa fa-rss"></i></a>
        </div>
</div>


<div class="main">
<header>
    <div class="headerMenu">

        <a href="" class="btnClickMenu"><span class="font18 fa fa-bars"></span> &nbsp; меню</a>
        <a href="" id="arhive" class="-click-to-menu"><span class="font18 fa fa-search"></span> &nbsp; <?= Yii::t('main', 'Пошук'); ?></a>

        <div class="socTopMenu">
            <a class="-val-g" href="#"><i class="fa fa-google-plus"></i></a>
            <a class="-val-vk" href="https://vk.com/val_ua" target="_blank"><i class="fa fa-vk"></i></a>
            <a class="-val-face" href="https://www.facebook.com/VysokyiVal" target="_blank"><i class="fa fa-facebook"></i></a>
            <a class="-val-twit" href="https://twitter.com/svoboda_fm" target="_blank"><i class="fa fa-twitter"></i></a>
            <a class="-val-yt" href="#"><i class="fa fa-youtube-play"></i></a> 
             <a class="-val-rss" href="http://val.ua/feed/rss"><i class="fa fa-rss"></i></a>
        </div>

    </div>

    <?php $this->widget('application.components.widgets.LanguageSelector'); ?>


    <div class="btnLeft">
     	<a href="" class="infoAbout -click-to-menu" id="project"><i class="fa fa-info"></i></a>  <!-- Добавить этот класс btnClickProject -->
        <?php if(Yii::app()->user->isGuest): ?>
            <a href="" class="btn btn-info -click-to-menu" id="registration"><?= Yii::t('main', 'Реєстрація'); ?></a>
            <a href="" class="btn btn-info -click-to-menu" id="login"><?= Yii::t('main', 'Вхід'); ?></a>
        <?php else: ?>
            <a href="<?= Yii::app()->createUrl('/site/logout'); ?>" class="btn btn-info"><?= Yii::t('main', 'Вихід'); ?></a>
            <a href="<?= Yii::app()->createUrl('/blog/cabinet/index'); ?>" class="btn btn-info"><?= Yii::t('main', 'Особистий кабінет'); ?></a>
        <?php endif; ?>
    </div>
</header>


<div class="logo">
<div class="marketHeadLeft">
    <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>1)); ?>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <ins class="adsbygoogle"
         style="display:inline-block;width:234px;height:60px"
         data-ad-client="ca-pub-2479511460292648"
         data-ad-slot="2914650417"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>
<div class="marketHeadRight">
    <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>2)); ?>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- right banner -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:234px;height:60px"
         data-ad-client="ca-pub-2479511460292648"
         data-ad-slot="4112182012"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>
<?php if(Yii::app()->language == 'uk'): ?>
    <?= CHtml::link(
        CHtml::image(Yii::app()->baseUrl.'/images/logo.png', 'logo'),
        array('/site/index')
    ); ?>
<?php else: ?>
    <?= CHtml::link(
        CHtml::image(Yii::app()->baseUrl.'/images/logorus.png', 'logo'),
        array('/site/index')
    ); ?>
<?php endif; ?>
</div>
<div class="dateOther"> 
    <ul class="-menu-weather-currency-other">
        <li class="-menu-item-all">
            <span class="curDate"><?= $this->getCurrentDate(); ?></span>  
        </li>
        <li class="-menu-item-all">
           <a class="-with-before (Расскоментировать) -click-to-menu" id="redakcia" href="#"><i class="font16 fa fa-share-alt"></i><?= Yii::t('main', 'Редакція'); ?></a> 
        </li>
        <li class="-menu-item-all">
            <a href="#" class="-with-before"><i class="font16 fa fa-bullhorn"></i> Реклама</a><?// CHtml::link(Yii::t('main', 'Реклама'), array('/market/index')); ?>
        </li>
        <li class="-menu-item-all">
          <div class="-with-before -currency-val" href="#">
            <span><i class="font16 fa fa-bar-chart"></i> Валюта </span>
          
          </div>  
        </li>
        <li class="-menu-item-all">
           <div class="outer-for-weather"></div> 
        </li>
    </ul>
</div>

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ MENU \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<div class="menu">
    <ul class="listMenu">
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
        <li><a href="" id="region"><?= Yii::t('main', 'Регіони'); ?></a></li>
    </ul>
</div>


<div class="menuSlide" id="forRegion">
    <ul class="listMenuSlide">
        <li><a href="<?= Yii::app()->createUrl('/site/regions', array('region'=>'Прилуки')); ?>"><?= Yii::t('main', 'Прилуки'); ?></a></li>
        <li><a href="<?= Yii::app()->createUrl('/site/regions', array('region'=>'Нежин')); ?>"><?= Yii::t('main', 'Ніжин'); ?></a></li>
        <li><a href="<?= Yii::app()->createUrl('/site/regions', array('region'=>'Новгород-Северский')); ?>"><?= Yii::t('main', 'Новгород-Сіверский'); ?></a></li>
    </ul>
</div>
<a href="/mainMarket"></a>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ MENU \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->


<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ MARQUE \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<?php $this->widget('application.components.widgets.Margui'); ?>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END MARQUE \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<div class="google-market-top-full-banner" style="display: block; margin: 0 auto 20px">
    <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <ins class="adsbygoogle"
         style="display:inline-block;width:970px;height:90px"
         data-ad-client="ca-pub-2479511460292648"
         data-ad-slot="1646616412"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script> -->
   <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-2479511460292648"
         data-ad-slot="4626886017"
         data-ad-format="auto"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>

<?= $content; ?>

<footer>
    <div class="cloudTag">
        <p class="textFooter"><b>© 2001-2014 "Високий Вал"</b><br>
             При будь-якому використанні матеріалів гіперпосилання на <a href="">Val.ua</a> є обов'язковим. <br><br>
             Передрук в газетах і електронних ЗМІ - виключно за наявності письмової угоди з Редакцією! <br><br>
             E-mail редакції: <a href="mailto:news@val.ua">news@val.ua</a><br><br>
             <b>Тел.Чернігiв: 931-931 <br> 
             Тел.Киiв: 232-79-79 <br> 
             Тел.Нью-Йорку: +1-917-200-9214.</b> 
        </p> 
    </div>
    <div class="lastNews">
       <p><?= CHtml::link(Yii::t('main', 'Всi новини'), array('/site/allNews')); ?></p>
       <p><?= CHtml::link(Yii::t('main', 'Фоторепортажi'), array('/site/photos')); ?></p>
       <p><?= CHtml::link(Yii::t('main', 'Вiдеоматерiали'), array('/site/videos')); ?></p>
       <p><?= CHtml::link(Yii::t('main', 'Реклама на сайтi'), array('/market/index')); ?></p>
       <p><a href="#" class="btnClickRedakcia(Расскомениторать)">Про редакцiю</a></p>
       <p><a href="#" class="btnClickProject">Проект Високий Вал</a></p>
        <div class="subscribeFooter">
           <form action=" ">
                <div class="input-group fadeOnToogle" style="opacity: 1;">
                  <input type="email" class="form-control" placeholder="Пiдписатися на новини:" required>
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="fa fa-envelope"></span></button>
                  </span>
                </div><!-- /input-group -->
            </form>
        </div>
    </div>
    <div class="parthers">
        <h5>Вiдповiдальнiсть та зобов`язання</h5>
       <p>Редакція може не поділяти точку зору авторів і не несе відповідальності за зміст републікованих матеріалів.</p> <br>
       <p class="infoDunger"><i class="fa fa-exclamation-circle"></i><b>ШАНОВНІ КОМЕНТАТОРИ!</b> Редакція веб-сайту не має намірів обмежувати свободу слова, але залишає за собою право видаляти висловлювання з уживанням нецензурної лексики та образ на адресу авторів матеріалів і їх фігурантів.</p><br> 
       <p class="socFoot">Високий Вал у соцiальних мережах: </p>
      <div class="socTopMenu">
            <a class="-val-g" href="#"><i class="fa fa-google-plus"></i></a>
            <a class="-val-vk" href="https://vk.com/val_ua" target="_blank"><i class="fa fa-vk"></i></a>
            <a class="-val-face" href="https://www.facebook.com/VysokyiVal" target="_blank"><i class="fa fa-facebook"></i></a>
            <a class="-val-twit" href="https://twitter.com/svoboda_fm" target="_blank"><i class="fa fa-twitter"></i></a>
            <a class="-val-yt" href="#"><i class="fa fa-youtube-play"></i></a> 
            <a class="-val-rss" href="http://val.ua/feed/rss"><i class="fa fa-rss"></i></a>
        </div>
    </div>
</footer>
</div>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/prodaction/bundle.min.js',CClientScript::POS_END, array('defer'=>true)); ?>
<script>
window.addEventListener("DOMContentLoaded", function(){
    (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,"script","//www.google-analytics.com/analytics.js","ga");ga("create","UA-61883338-1","auto");ga("send","pageview");
})
</script>

</body>
</html>