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
		$array = array(
			array('id'=>'1', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/1.png'),
			array('id'=>'2', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/2.png'),
			array('id'=>'3', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/3.png'),
			array('id'=>'4', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/4.png'),
			array('id'=>'5', 'icon'=>'http://teaplaza.maimaicha.com/upload/icon/5.png')
		);
		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'', 'result'=>$array);
		return $data;
	}
}
