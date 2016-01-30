<?php
 $propage_test_version='4.00';

 //define ('_PROPAGE_REQUEST_URI',$_SERVER['REQUEST_URI']); /* Используется при необходимости задать для страницы request_uri */
 define ('_PROPAGE_SHOW_TEST','yes');

$propage_system_file=$_SERVER['DOCUMENT_ROOT'].'/48850429.php';
if (file_exists($propage_system_file)) {
 include($propage_system_file);
 if (count($propage_hrefs)):
  print implode(' | ',propage_hrefs());
 else:
  print "Есть проблемы!<br>";
 endif;
}
 else print "<font color=red>Не найден системный файл!<br>$propage_system_file</font><br>Проверьте его наличие.<br>";

/* Информационная часть */
 print '<code><p>Если Вы видите выше текст "PROPAGE SHOW TEST", значит всё в порядке<br><br><font color=blue>Дополнительная проверка:</font><p>';
 print "Версия тестового файла: $propage_test_version<p>";
// print "ID сайта: "._PROPAGE_SITE_ID."<br>";
 $p=substr(sprintf('%o', fileperms('./48850429')), -4);
 print 'Права доступа к системному каталогу: ';
 if ($p=='0777') print '<font color=green>OK</font><p>'; else print '<font color=red>Необходимо установить права 0777</font><p>';
 if (dirname(__FILE__)!=$_SERVER['DOCUMENT_ROOT']) print '<font color=red>Некорректная работа переменной <b>$_SERVER[\'DOCUMENT_ROOT\']</b></font><p>';
 print 'Абсолютный путь к файлу 48850429.php <b>'.dirname(__FILE__).'/48850429.php</b><p>';
 print '$_SERVER[\'DOCUMENT_ROOT\']='.$_SERVER['DOCUMENT_ROOT'].'<p>';
 print '$_SERVER[\'REQUEST_URI\']='.$_SERVER['REQUEST_URI'].'<p>';
 //Проверка на запись.

 //Проверка на перезапись.

/* Доступные методы загрузки */
@ini_set('allow_url_fopen', 1);
@ini_set('default_socket_timeout',10);
@ini_set('user_agent', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
 
function get_remote_file($host,$url){ 
$res='';
   if (function_exists('curl_init')): 
       $data='';
       $full_url='http://'.$host.'/'.$url; 
       $curl = curl_init();   
       curl_setopt($curl, CURLOPT_URL, $full_url);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_HEADER, false);
       curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,   10);
       curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
       $data = curl_exec($curl);
       curl_close($curl);
       $res.="<b>curl</b> result=$data<br>";
   endif;

   $fp = @fsockopen($host, 80, $errno, $errstr, 10);
       $data='';
      if ($fp): //2           
         $out="GET /$url"." HTTP/1.1\r\n";
         $out.="Host: $host\r\n";
	 $out.="User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)\r\n"; 
         $out.="Connection: Close\r\n\r\n";
         @fwrite($fp, $out);
         $b=0;          
         $data='';
         while(!@feof($fp)):
            $s=@fgets($fp,1024);
            if ($b) $data.=$s; 
            if ($s=="\r\n") $b=1;
         endwhile;
         @fclose($fp);
         $res.="<b>sock</b> result=$data<br>";
      else:
	   print "<font color=red>fsockopen ERROR:<br>$errno<br>$errstr<br></font>";
	endif;

   if (function_exists('file_get_contents') &&  ini_get('allow_url_fopen') == 1): 
       $data='';
	   $full_url='http://'.$host.'/'.$url;
       $data = file_get_contents($full_url);
       $res.="<b>fileget</b> result=$data<br>";
   endif;
 
return $res;
}	

print "<font color=blue>Доступные методы загрузки:</font><br>";
$res=get_remote_file('www.propage.ru','get.html');
print $res.'</code>';
?>