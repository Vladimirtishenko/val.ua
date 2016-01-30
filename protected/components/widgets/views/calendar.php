<?php
function my_calendar($fill=array()) {
    if(Yii::app()->language == 'ru')
    {
        $month_names=array("январь","февраль","март","апрель","май","июнь",
            "июль","август","сентябрь","октябрь","ноябрь","декабрь");
    }
    else
    {
        $month_names=array("січень","лютий","березень","квітень","травень","червень",
            "липень","серпень","вересень","жовтень","листопад","грудень");
    }


    if (isset($_GET['y'])) $y=$_GET['y'];
    if (isset($_GET['m'])) $m=$_GET['m'];
    if (isset($_GET['date']) AND strstr($_GET['date'],"-")) list($y,$m)=explode("-",$_GET['date']);
    if (!isset($y) OR $y < 1970 OR $y > 2037) $y=date("Y");
    if (!isset($m) OR $m < 1 OR $m > 12) $m=date("m");

    $month_stamp=mktime(0,0,0,$m,1,$y);
    $day_count=date("t",$month_stamp);
    $weekday=date("w",$month_stamp);
    if ($weekday==0) $weekday=7;
    $start=-($weekday-2);
    $last=($day_count+$weekday-1) % 7;
    if ($last==0) $end=$day_count; else $end=$day_count+7-$last;
    $today=date("Y-m-d");
    $prev=date('?\m=m&\y=Y',mktime (0,0,0,$m-1,1,$y));
    $next=date('?\m=m&\y=Y',mktime (0,0,0,$m+1,1,$y));
    $i=0;
    ?>
            <table class="calendarTable">
            <tr>
                <td colspan=7>
                    <table width="100%" border=0 cellspacing=0 cellpadding=0>
                        <tr class="gen_anons">
                            <td align="left"><a href="<? echo $prev ?>">&larr;</a></td>
                            <td align="center"><? echo $month_names[$m-1]," ",$y ?></td>
                            <td align="right"><a href="<? echo $next ?>">&rarr;</a></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php if(Yii::app()->language == 'ru'): ?>
            <tr class="day_of_anons"><td align="center">Пн</td><td align="center">Вт</td><td align="center">Ср</td><td align="center">Чт</td><td align="center">Пт</td><td align="center">Сб</td><td align="center">Вс</td><tr>
                <?php else: ?>
            <tr class="day_of_anons"><td>Пн</td><td>Вт</td><td>Ср</td><td>Чт</td><td>Пт</td><td>Сб</td><td>Нд</td><tr>
                <?php endif; ?>

                <?
                for($d=$start;$d<=$end;$d++) {
                    if (!($i++ % 7)) echo " <tr>\n";
                    echo '  <td align="center"><div><b>';
                    if ($d < 1 OR $d > $day_count)
                    {
                        echo "<span class='noneEmpty'></span>";
                    }
                    else
                    {
                        $now="$y-$m-".sprintf("%02d",$d);
                        if (is_array($fill) AND in_array($now,$fill))
                        {
                            echo CHtml::link($d, array('/site/news/', 'date'=>$now));
                        }
                        else
                        {
                            echo $d;
                        }
                    } 
                    echo "</b></div></td>\n";
                    if (!($i % 7))  echo " </tr>\n";
                } 
                ?> 
                </table>
<? } ?>
<?php my_calendar($arr); ?>