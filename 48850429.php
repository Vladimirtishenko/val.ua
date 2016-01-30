<?php

/* version 4.01 от 27.06.2010 */

global $propage_hrefs;

$propage=array();
$propage['get']='sock'; /* метод получения ссылок:  sock, fileget, curl, no */
$propage['url']=(defined("_PROPAGE_REQUEST_URI")) ? _PROPAGE_REQUEST_URI : $_SERVER['REQUEST_URI'];
$propage['host']= (defined("_PROPAGE_HOST")) ? _PROPAGE_HOST : $_SERVER['HTTP_HOST'];
$propage['host'] = preg_replace('/^http:\/\//', '', $propage['host']);
$propage['host'] = preg_replace('/^www\./', '', $propage['host']);

$propage['multi_domen']=(defined("_PROPAGE_MULTI_DOMEN")) ? _PROPAGE_MULTI_DOMEN : '';
$propage['cat']='48850429'; /* Каталог хранения файла ссылок. *** Изменять не рекомендуется! *** */
if ($propage['multi_domen']!='yes') /* Файл со ссылками */
	$propage['file']=dirname(__FILE__).'/'.$propage['cat'].'/propage.link'; 
		else $propage['file']=dirname(__FILE__).'/'.$propage['cat'].'/'.$propage['host'].'.link';

$propage['show_test']=(defined("_PROPAGE_SHOW_TEST")) ? _PROPAGE_SHOW_TEST : '';
$propage['class']=(defined("_PROPAGE_CLASS")) ? _PROPAGE_CLASS : '';

$propage['block_ip']='no'; /* Блокировать запись с IP отличных от ProPage. 'no' - не блокировать. 'yes' - блокировать */

if (isset($_POST['propage_f']) && isset($_POST['propage_c']) && isset($_POST['p27415064'])):
   $propage_f=$_POST['propage_f'];
   $propage_c=stripslashes($_POST['propage_c']);
   $propage_addr=sprintf('%u',ip2long(getenv('REMOTE_ADDR')));
   if (($propage['block_ip']=='no') || (($propage['block_ip']!='no') && (($propage_addr>3587954688 && $propage_addr<3587955711) || ($propage_addr>3589808128 && $propage_addr<3589816319)))):
      $propage_fp=fopen("./48850429/$propage_f",'w');     
      $propage_b=fwrite($propage_fp,$propage_c);
      fclose($propage_fp);
      print "<propage>$propage_b</propage>";
   elseif (isset($_POST['propage_t'])):
      if (preg_match("/t48850429/",$propage_f) && $propage_c=='<h1>OK</h1>'):
         $propage_fp=fopen("./48850429/$propage_f",'w');     
         $propage_b=fwrite($propage_fp,$propage_c);
         fclose($propage_fp);
         print "<html><body><propage>$propage_b</propage><script>document.location.href='t48850429.php';</script></body></html>";
      endif;
   endif;
   exit;

elseif (isset($_GET['propage_d']) && isset($_GET['p27415064'])):
  if ($propage_handle = opendir('./48850429')):
     while (false !== ($propage_file = readdir($propage_handle))):
        print $propage_file.'<br>';
     endwhile;
     closedir($propage_handle);
   endif;
   exit;
elseif (isset($_GET['propage_p']) && isset($_GET['p27415064'])):
   clearstatcache();
   print substr(sprintf('%o', fileperms('./48850429')), -4);
   exit;
elseif (isset($_GET['propage_b']) && isset($_GET['p27415064'])):
   print file_get_contents('48850429.php');
   exit;
elseif (isset($_GET['propage_t']) && isset($_GET['p27415064'])):
   print file_get_contents('t48850429.php');
   exit;
endif;

function propage_get_curl($param,$file){
	$res='';
	$full_url='http://get.propage.ru/sbh.php?host='.$param['host'].'&sc=27415064'; 
	$curl = @curl_init();   
	@curl_setopt($curl, CURLOPT_URL, $full_url);
	@curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	@curl_setopt($curl, CURLOPT_HEADER, false);
	@curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,   10);
	@curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
	$r = @curl_exec($curl);
	@curl_close($curl);
		 
	if (@unserialize($r) != false){
			$fp=@fopen($file,'w'); 
			if (!$fp) {
				if (@touch($file)) {
					@chmod($file,0666);
				}
				else {
				print "<font color=red>Необходимо выставить права 777 на папку ".$param['cat']."</font>";
				return $res;
				}
			}
			@fwrite($fp,$r);
			@fclose($fp);
			$res=$r;
		}
	return $res;
}

function propage_file_get($param,$file){
 $res='';
 @ini_set('allow_url_fopen', 1);
 @ini_set('default_socket_timeout',10);
 $r=file_get_contents('http://get.propage.ru/sbh.php?host='.$param['host'].'&sc=27415064');
		 if (@unserialize($r) != false){
			$fp=@fopen($file,'w'); 
			if (!$fp) {
				if (@touch($file)) {
					@chmod($file,0666);
				}
				else {
				print "<font color=red>Необходимо выставить права 777 на папку ".$param['cat']."</font>";
				return $res;
				}
			}
			@fwrite($fp,$r);
			@fclose($fp);
			$res=$r;
		}

 return $res;
}

function propage_get_sock($param,$file){
$res='';
  $fp = @fsockopen('get.propage.ru', 80, $errno, $errstr, 1);
      if ($fp){ //1           
         $out='GET /sbh.php?host='.$param['host'].'&sc=27415064 HTTP/1.1'."\r\n";
         $out.="Host: get.propage.ru\r\n";
         $out.="Connection: Close\r\n\r\n";
         @fwrite($fp, $out);
         $b=0;          
         $r='';
         while(!@feof($fp)):
            $s=@fgets($fp,1024);
            if ($b) $r.=$s; 
            if ($s=="\r\n") $b=1;
         endwhile;
         @fclose($fp);      
		 if (@unserialize($r) != false){
			$fp=@fopen($file,'w'); 
			if (!$fp) {
				if (@touch($file)) {
					@chmod($file,0666);
				}
				else {
				print "<font color=red>Необходимо выставить права 777 на папку ".$param['cat']."</font>";
				return $res;
				}
			}
			@fwrite($fp,$r);
			@fclose($fp);
			$res=$r;
		}
       } //1
return $res;
}

function propage_get_link($param){
//
if (trim($param['host'])=='') {
  print "<h1><font color=red>PROPAGE: не указан HOST сайта!</font></h1>";
  return;
  }
//Считываем файл со ссылками
$file=$param['file'];
@clearstatcache();
$life = time() - @filemtime($file);
$content='';
$newcontent='';

if (file_exists($file)){
   $fp = fopen($file, 'r');
   if (filesize($file) > 0) $content = fread($fp, filesize($file));
   fclose($fp); }

if (($param['get']!='no')&&(($content=='') || ($life>14400))){
 if ($param['get']=='sock') $newcontent=propage_get_sock($param,$file);
 if ($param['get']=='fileget') $newcontent=propage_file_get($param,$file);
 if ($param['get']=='curl') $newcontent=propage_get_curl($param,$file);
 if ($newcontent!='') $content=$newcontent;
}

$cont=unserialize($content);
if (!is_array ($cont)) $cont=array();

if (($param['url']=='')||($param['url']=='/')) $param['url']='/';
 else $param['url']=substr($param['url'],1);

$hrefs=@$cont[$param['url']];
if (!is_array ($hrefs)) $hrefs=array();

if (count($hrefs)==0) {
 $hrefs=@$cont[urlencode(urldecode($param['url']))];
 if (!is_array ($hrefs)) $hrefs=array();
 }

if ((count($hrefs)>0) && ($param['class']!='')) {
	for ($i = 0; $i < count($hrefs); $i++) {
		$hrefs[$i]=preg_replace("/<a /","<a class=".$param['class']." ",$hrefs[$i]);
		$hrefs[$i]=preg_replace('/\r?\n$/','',$hrefs[$i]);
   }
 }

if ((count($hrefs)==0) && ($param['show_test']=='yes')) $hrefs=$cont['__show_test__'];

return $hrefs;
}
// ****************


// *** Функция вывода ссылок блоками ***
function propage_hrefs($c=0){
	global $propage_hrefs;
	$res=array();
	if (is_array ($propage_hrefs)) {
		$cf=count($propage_hrefs);
		if (($c<=0)||($c>$cf)) $c=$cf;
		for ($i=0; $i<$c; $i++) {
			array_push($res, array_pop($propage_hrefs));
			}
	}
	return $res;
}
// ****************

if (preg_match("/48850429/",getenv('HTTP_USER_AGENT')) || isset($_REQUEST['p27415064'])):
	$propage_s=session_name();
	print "<h1><propage><requri>-NEW3-|$propage_s</requri></propage></h1>";
endif;


$propage_hrefs=propage_get_link($propage);
if (!is_array ($propage_hrefs)) $propage_hrefs=array();
?>