<?php
class GlobalTools
{
	/**
	 * 创建目录
	 */
	public static function mkdirs($dir) {
   		return is_dir($dir) || (self::mkdirs(dirname($dir)) && mkdir($dir, 0777));
	}
	
    /**
     * 获取客户端IP地址
     * @return string 客户端IP地址
     */
    public static function getClientIp()
    {
        if ($_SERVER['HTTP_CLIENT_IP']) {
	      $ip = $_SERVER['HTTP_CLIENT_IP'];
	 	} elseif ($_SERVER['HTTP_X_FORWARDED_FOR']) {
	      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	 	} else {
	      $ip = $_SERVER['REMOTE_ADDR'];
	 	}
        
        return $ip;
    }

    /**
     * Curl
     */
	public static function curl($url,$post='')
	{
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
}