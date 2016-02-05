<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="leftBlock">
	    <?= $content; ?>
    </div>
    <div class="rightBlock">
        <div class="lineNews">
            <h3 class="top_h3"><?= Yii::t('main', 'Останні новини'); ?></h3>
            <?php $this->widget('application.components.widgets.AllNewsWidget'); ?>
            <hr size="1px"/>
            <?= CHtml::link(Yii::t('main', 'Всi новини'), array('/site/allNews'), array('class'=>'allNewsGo')) ?>
        </div>
        <div class="subscribe">
            <?php if(Yii::app()->language == 'uk'): ?>
                <span class="fa fa-pencil"></span> <p>Ви можете <a href="#" class="btnSubscribe">підписатися</a> на новинні стрiчки інтернет видання Високий Вал</p>
            <?php else: ?>
                <span class="fa fa-pencil"></span> <p>Вы можете <a href="#" class="btnSubscribe">подписаться</a> на новосные ленты интернет издательства Високий Вал</p>
            <?php endif; ?>
        </div>
         <div class="emailSub">  
        <form action="">
                <div class="input-group fadeOnToogle">
                  <input type="email" class="form-control" placeholder="Ведiть ваш Email:" required>
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="fa fa-envelope"></span></button>
                  </span>
                </div><!-- /input-group -->
        </form>
        </div>
        <div class="successSub">
         <?php if(Yii::app()->language == 'ru'): ?>
            <p><span class="fa fa-envelope"></span> &nbsp; Вы успешно подписаны на рассылку новостей интернет издания Высокий Вал</p>
          <?php else: ?>
             <p><span class="fa fa-envelope"></span> &nbsp; Ви успішно підписані на розсилку новин інтернет видання Високий Вал</p>
          <?php endif; ?>
        </div>
        <div class="market-block">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- big block -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:600px"
                 data-ad-client="ca-pub-2479511460292648"
                 data-ad-slot="8530754818"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
       </div>
        <div class="marketColummRight">
            <?php
                if(isset($this->rightReclameId)) {
                    $this->widget('application.components.widgets.ReclameWidget', array('id'=>$this->rightReclameId));
                }
            ?>
        </div> 
        <div id="SinoptikInformer" style="width:307px; margin-bottom: 10px;" class="SinoptikInformer type5c1"><div class="siHeader"><div class="siLh"><div class="siMh"><a onmousedown="siClickCount();" href="https://ua.sinoptik.ua/" target="_blank">Погода</a><a onmousedown="siClickCount();" class="siLogo" href="https://ua.sinoptik.ua/" target="_blank"> </a> <span id="siHeader"></span></div></div></div><div class="siBody"><div class="siCity"><div class="siCityName"><a onmousedown="siClickCount();" href="https://ua.sinoptik.ua/погода-київ" target="_blank">Погода у <span>Києві</span></a></div><div id="siCont0" class="siBodyContent"><div class="siLeft"><div class="siTerm"></div><div class="siT" id="siT0"></div><div id="weatherIco0"></div></div><div class="siInf"><p>вологість: <span id="vl0"></span></p><p>тиск: <span id="dav0"></span></p><p>вітер: <span id="wind0"></span></p></div></div></div><div class="siCity"><div class="siCityName"><a onmousedown="siClickCount();" href="https://ua.sinoptik.ua/погода-чернігів" target="_blank">Погода у <span>Чернігові</span></a></div><div id="siCont1" class="siBodyContent"><div class="siLeft"><div class="siTerm"></div><div class="siT" id="siT1"></div><div id="weatherIco1"></div></div><div class="siInf"><p>вологість: <span id="vl1"></span></p><p>тиск: <span id="dav1"></span></p><p>вітер: <span id="wind1"></span></p></div></div></div><div class="siCity"><div class="siCityName"><a onmousedown="siClickCount();" href="https://ua.sinoptik.ua/погода-ніжин" target="_blank">Погода у <span>Ніжині</span></a></div><div id="siCont2" class="siBodyContent"><div class="siLeft"><div class="siTerm"></div><div class="siT" id="siT2"></div><div id="weatherIco2"></div></div><div class="siInf"><p>вологість: <span id="vl2"></span></p><p>тиск: <span id="dav2"></span></p><p>вітер: <span id="wind2"></span></p></div></div></div><div class="siCity"><div class="siCityName"><a onmousedown="siClickCount();" href="https://ua.sinoptik.ua/погода-новгород-сіверський" target="_blank">Погода у <span>Новгородi-Сіверському</span></a></div><div id="siCont3" class="siBodyContent"><div class="siLeft"><div class="siTerm"></div><div class="siT" id="siT3"></div><div id="weatherIco3"></div></div><div class="siInf"><p>вологість: <span id="vl3"></span></p><p>тиск: <span id="dav3"></span></p><p>вітер: <span id="wind3"></span></p></div></div></div><div class="siCity"><div class="siCityName"><a onmousedown="siClickCount();" href="https://ua.sinoptik.ua/погода-прилуки" target="_blank">Погода у <span>Прилуках</span></a></div><div id="siCont4" class="siBodyContent"><div class="siLeft"><div class="siTerm"></div><div class="siT" id="siT4"></div><div id="weatherIco4"></div></div><div class="siInf"><p>вологість: <span id="vl4"></span></p><p>тиск: <span id="dav4"></span></p><p>вітер: <span id="wind4"></span></p></div></div></div><div class="siLinks"></div></div><div class="siFooter"><div class="siLf"><div class="siMf"></div></div></div></div><script type="text/javascript" charset="UTF-8" src="//sinoptik.ua/informers_js.php?title=4&amp;wind=2&amp;cities=303010783,303028915,303016980,303017594,303021959&amp;lang=ua"></script>
        <!-- TovarroComposite Start -->
        <!-- <div id="TovarroScriptRootC596085">
            <div id="TovarroPreloadC596085">
                <a id="mg_add596085" href="http://tovarro.com/clients.html?utm_source=links_mg&utm_medium=text&utm_campaign=add_goods" target="_blank"><img src="//cdn.marketgid.com/images/tovarro_add_link.png" style="border:0px"></a>
                <br> <a href="http://tovarro.com/" target="_blank">Загрузка...</a>
            </div>
            <script>
                (function() {
                    var D = new Date(),
                        d = document,
                        b = 'body',
                        ce = 'createElement',
                        ac = 'appendChild',
                        st = 'style',
                        ds = 'display',
                        n = 'none',
                        gi = 'getElementById';
                    var i = d[ce]('iframe');
                    i[st][ds] = n;
                    d[gi]("TovarroScriptRootC596085")[ac](i);
                    try {
                        var iw = i.contentWindow.document;
                        iw.open();
                        iw.writeln("<ht" + "ml><bo" + "dy></bo" + "dy></ht" + "ml>");
                        iw.close();
                        var c = iw[b];
                    } catch (e) {
                        var iw = d;
                        var c = d[gi]("TovarroScriptRootC596085");
                    }
                    var dv = iw[ce]('div');
                    dv.id = "MG_ID";
                    dv[st][ds] = n;
                    dv.innerHTML = 596085;
                    c[ac](dv);
                    var s = iw[ce]('script');
                    s.async = 'async';
                    s.defer = 'defer';
                    s.charset = 'utf-8';
                    s.src = "//jsc.tovarro.com/v/a/val.ua.596085.js?t=" + D.getYear() + D.getMonth() + D.getDate() + D.getHours();
                    c[ac](s);
                })();
            </script>
        </div> -->
        <!-- TovarroComposite End -->
        <!--         <div id="n4p_14605"></div>
        <script type="text/javascript" charset="utf-8">
          (function(d,s){
            var o=d.createElement(s);
            o.async=true;
            o.type="text/javascript";
            o.charset="utf-8";
            if (location.protocol == "https:") {
              o.src="https://js-goods.redtram.com/ticker_14605.js";
            }
            else {
              o.src="http://js.grt02.com/ticker_14605.js";
            }
            var x=d.getElementsByTagName(s)[0];
            x.parentNode.insertBefore(o,x);
          })(document,"script");
        </script> -->
         <script type="text/javascript">
            teasernet_blockid = 690392;
            teasernet_padid = 278808;
        </script>
        <script type="text/javascript" src="http://legandruk.com/d9u0b25026c4fa63a45af32.js"></script>
       <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ VOTE \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
        <div class="twitter">
            <h3 class="top_h3"><?= Yii::t('main', 'Ми в Twitter'); ?></h3>
            <a data-chrome="noscrollbar"  class="twitter-timeline" href="https://twitter.com/svoboda_fm" data-widget-id="534429435424804864">Tweets by @svoboda_fm</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
        <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END VOTE \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

        <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ FOTOGALERY \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
        <!-- <div class="videoBlock commentsBlock">
            <h3 class="top_h3"><?= Yii::t('main', 'Коментарі'); ?></h3>
             <script type="text/javascript" src="http://visokiyval.disqus.com/recent_comments_widget.js?num_items=3&hide_avatars=0&avatar_size=32&excerpt_length=200"></script>
            <div id="mc-last"></div>
            <script type="text/javascript">
            cackle_widget = window.cackle_widget || [];
            cackle_widget.push({widget: 'CommentRecent', id: 37384});
            (function() {
            var mc = document.createElement('script');
            mc.type = 'text/javascript';
            mc.async = true;
            mc.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cackle.me/widget.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
            })();
            </script>
        </div> -->
        <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END FOTOGALERY \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

        <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ VOTE \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

        
        <?php $this->widget('application.components.widgets.PoolsWidget'); ?>
        
        <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END VOTE \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

        
         <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ CALENDAR \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
        <div class="market-block">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:250px"
                 data-ad-client="ca-pub-2479511460292648"
                 data-ad-slot="7274347614"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        
        <div class="calendar">
            <h3 class="top_h3"><?= Yii::t('main', 'Архів матеріалів'); ?></h3>
            <div class="single"></div>
        </div>
        <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END CALENDAR \\\\\\\\\\\\\\\\\\\\\\\\\\\\ --> 

    </div>
<?php $this->endContent(); ?>