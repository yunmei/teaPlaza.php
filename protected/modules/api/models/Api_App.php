<?php
/**
* APP API文件
*/

/**
 * APP API类
 */
class Api_App
{
	/**
	 * 获取广告列表
	 * @version 1.0
	 */
	public function getAdList($args, $format)
	{
		$array = array(
			array('id'=>'1', 'image'=>'http://teaplaza.maimaicha.com/upload/ad/1.jpg'),
			array('id'=>'2', 'image'=>'http://teaplaza.maimaicha.com/upload/ad/2.jpg'),
			array('id'=>'3', 'image'=>'http://teaplaza.maimaicha.com/upload/ad/3.jpg')
		);
		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'', 'result'=>$array);
		return $data;
	}
	
	/**
	 * 获取应用列表
	 * version 1.0
	 */
	public function getAppList($args, $format)
	{
		$num = intval($_GET['num']);
		$num = $num ? $num : 8;
		$array = array(
			array('id'=>'1', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/1.png', 'name'=>'开心茶园'),
			array('id'=>'2', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/2.png', 'name'=>'买买茶'),
			array('id'=>'3', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/6.png', 'name'=>'茶百科'),
			array('id'=>'4', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/4.png', 'name'=>'单店ERP'),
			array('id'=>'5', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/5.png', 'name'=>'御青茗茶'),
			array('id'=>'6', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/3.png', 'name'=>'我来泡茶'),
			array('id'=>'1', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/1.png', 'name'=>'开心茶园'),
			array('id'=>'2', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/2.png', 'name'=>'买买茶'),
			array('id'=>'3', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/6.png', 'name'=>'茶百科'),
			array('id'=>'4', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/4.png', 'name'=>'单店ERP'),
			array('id'=>'5', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/5.png', 'name'=>'御青茗茶'),
			array('id'=>'6', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/3.png', 'name'=>'我来泡茶'),
		);
		$array = array_slice($array, 0, $num);
		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'', 'result'=>$array);
		return $data;
	}

	/**
	 * 获取列表详情
	 * version 1.0
	 */
	public function getListInfo($args, $format)
	{
		$num = intval($_GET['num']);
		$num = $num ? $num : 8;
		$array = array(
			array('id'=>'1', 'listimage'=>'http://teaplaza.maimaicha.com/upload/ad/1.jpg', 'desc' => '很好玩的游戏，欢迎来玩！', 'usenum' => '3213', 'name'=>'开心茶园'),
			array('id'=>'2', 'listimage'=>'http://teaplaza.maimaicha.com/upload/ad/2.jpg', 'desc' => '很好玩的游戏，欢迎来玩！', 'usenum' => '789', 'name'=>'买买茶'),
			array('id'=>'3', 'listimage'=>'http://teaplaza.maimaicha.com/upload/ad/3.jpg', 'desc' => '很好玩的游戏，欢迎来玩！', 'usenum' => '6554', 'name'=>'茶百科'),
			array('id'=>'4', 'listimage'=>'http://teaplaza.maimaicha.com/upload/ad/3.jpg', 'desc' => '很好玩的游戏，欢迎来玩！', 'usenum' => '11257', 'name'=>'单店ERP'),
		);
		$array = array_slice($array, 0, $num);
		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'', 'result'=>$array);
		return $data;
	}

	/**
	 * 获取应用详情
	 * version 1.0
	 */
	public function getAppContent($args, $format)
	{
		$array = array(
			'id' => '1',
			'name' => '开心茶园',
			'icon' => 'http://teaplaza.maimaicha.com/upload/icon/1.png',
			'listimage' => 'http://teaplaza.maimaicha.com/upload/ad/1.jpg',
			'desc' => '很好玩的游戏，欢迎来玩！',
			'urlschemes' => 'com.maimaicha.chabaike://haha',
			'ituneslink' => 'https://itunes.apple.com/cn/app/cha-bai-ke/id527790886?mt=8',
			'html' => '<html><header></header><body style="margin:0px; padding:0px; background-color:#00ffff;"><div style="font-size:24px; color:red;"><strong>开心茶园</strong><br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园<br />开心茶园</div></body></html>',
			'version' => '1.0',
			'usenum' => '218'
		);
		$array = array_slice($array, 0, $num);
		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'', 'result'=>$array);
		return $data;
	}
	
	/**
	 * 获取当前应用的版本号
	 * version 1.0
	 */
	public function getCurrentVersion($args, $format)
	{
		$version = floatval($_GET['version']);
		$currentVersion = "1.0";
		if ($currentVersion > $version) {
			$array = array('update' => 'YES');
		} else {
			$array = array('update' => 'NO');
		}
		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'', 'result'=>$array);
		return $data;
	}

	/**
	 * 意见反馈
	 * version 1.0
	 */
	public function feedback($args, $format)
	{
		$content = trim($_GET['content']);
		$contact = trim($_GET['contact']);
		if(1) {
			return ApiBase::$success;
		} else {
			return ApiBase::$fail;
		}
	}
}