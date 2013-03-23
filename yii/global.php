<?php
/**
 * @author Chris Chen(cdcchen@gmail.com)
 * @version v1.0
 * @since 2010-9-7 10:39
 */
/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

/**
 * This is the shortcut to Yii::app()
 * @return CApplication Yii::app()
 */
function app()
{
    return Yii::app();
}

/**
 * This is the shortcut to Yii::app()->clientScript
 * @return CClientScript Yii::app()->clientScript
 */
function cs()
{
    return Yii::app()->clientScript;
}

/**
 * This is the shortcut to Yii::app()->createUrl()
 * @param string $route
 * @param array $params
 * @param string $anchor
 * @param string $ampersand
 * @return string 相对url地址
 */
function url($route, array $params=array(), $anchor = null, $ampersand='&')
{
    return Yii::app()->createUrl($route, $params, $ampersand) . ($anchor !== null ? '#' . $anchor : '');
}
/**
 * This is the shortcut to Yii::app()->createAbsoluteUrl()
 * @param string $route
 * @param array $params
 * @param string $anchor
 * @param string $ampersand
 * @return string 绝对url地址
 */
function aurl($route, array $params=array(), $schema='', $anchor = null, $ampersand='&')
{
    return Yii::app()->createAbsoluteUrl($route, $params, $schema, $ampersand) . ($anchor !== null ? '#' . $anchor : '');
}
 
/**
 * This is the shortcut to CHtml::link()
 * @param string $text 链接显示文本
 * @param string $url 链接地址
 * @param array $htmlOptions <a>标签附加属性
 * @return string <a>链接html代码
 */
function l($text, $url = '#', $htmlOptions = array())
{
    return CHtml::link($text, $url, $htmlOptions);
}

/**
 * This is the shortcut to CHtml::encode
 * @param string $text 待处理字符串
 * @return string 使用CHtml::encode(即htmlspecialchars)处理过的字符串
 */
function h($text)
{
    return CHtml::encode($text);
}

/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 * @param string $name 参数名称
 * @return mixed 参数值
 */
function param($name)
{
    return Yii::app()->params[$name];
}

/**
 * This is the shortcut to Yii::app()->user.
 * @return CWebUser
 */
function user()
{
    return Yii::app()->user;
}

/**
 * This is the shortcut to Yii::app()->authManager.
 * @return IAuthManager Yii::app()->authManager
 */
function auth()
{
    return Yii::app()->authManager;
}

/**
 * 此函数返回附件地址的BaseUrl
 * @param string $url 附件文件相对url地址
 * @return string
 */
function sbu($url = null)
{
    static $staticBaseUrl = null;
    if ($staticBaseUrl === null)
        $staticBaseUrl = rtrim(param('attachmentsBaseUrl'), '/') . '/';
    
    return $url === null ? $staticBaseUrl : $staticBaseUrl . ltrim($url, '/');
}

/**
 * 此函数返回附件地址的BaseUrl
 * @param string $url 静态资源文件相对url地址
 * @return string
 */
function resBu($url = null)
{
    static $resourceBaseUrl = null;
    if ($resourceBaseUrl === null)
        $resourceBaseUrl = rtrim(param('resourceBaseUrl'), '/') . '/';
    
    return $url === null ? $resourceBaseUrl : $resourceBaseUrl . ltrim($url, '/');
}

/**
 * This is the shortcut to Yii::app()->request
 * @return CHttpRequest
 */
function request()
{
    return Yii::app()->request;
}

function curl($url,$post='') {
   	$cookiefile = "cookie.txt";
   	$timeout = 30;
   	$jump = true;
   	$nobody = false;
   	$header = false;
   	$user_agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8';
   	$moreopt = false;

   	$ch = curl_init($url);
   	if($post){
    	$mainopt=array(
	     	CURLOPT_CONNECTTIMEOUT=>$timeout,
	     	//CURLOPT_COOKIEFILE=>$cookiefile,
	     	//CURLOPT_COOKIEJAR=>$cookiefile,
	     	CURLOPT_AUTOREFERER=>$jump,//自动跳转
	     	CURLOPT_FOLLOWLOCATION=>$jump,//自动跳转
	     	CURLOPT_USERAGENT=>$user_agent,//设定浏览器
	     	CURLOPT_RETURNTRANSFER=>true,//返回字符串
	     	CURLOPT_SSL_VERIFYPEER=>false,
	     	CURLOPT_POST=>1,
	     	CURLOPT_POSTFIELDS=>$post,
	     	CURLOPT_HEADER=>$header,
	     	CURLOPT_NOBODY=>$nobody
    	);
    	curl_setopt_array($ch, $mainopt);
   	} else {
    	$mainopt=array(
		    CURLOPT_CONNECTTIMEOUT=>$timeout,
		    //CURLOPT_COOKIEFILE=>$cookiefile,
		    //CURLOPT_COOKIEJAR=>$cookiefile,
		    CURLOPT_AUTOREFERER=>$jump,//自动跳转
		    CURLOPT_FOLLOWLOCATION=>$jump,//自动跳转
		    CURLOPT_USERAGENT=>$user_agent,
		    CURLOPT_SSL_VERIFYPEER=>false,
		    CURLOPT_HEADER=>$header,
		    CURLOPT_NOBODY=>$nobody,
		    CURLOPT_RETURNTRANSFER=>true
    	);
    	curl_setopt_array($ch, $mainopt);
   	}

   	if($moreopt)
   		curl_setopt_array($ch,$moreopt);

   	$string=curl_exec($ch);
   	if(!$string){
    	return false;
   	}

	$curlinfo=curl_getinfo($ch);
	//unlink($cookiefile);
	curl_close($ch);
	return $string;
}