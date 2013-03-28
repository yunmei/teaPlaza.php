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
			array('id'=>'1', 'image'=>'http://teaplaza.maimaicha.com/upload/ad/1.png'),
			array('id'=>'2', 'image'=>'http://teaplaza.maimaicha.com/upload/ad/2.png'),
			array('id'=>'3', 'image'=>'http://teaplaza.maimaicha.com/upload/ad/3.png'),
			array('id'=>'4', 'image'=>'http://teaplaza.maimaicha.com/upload/ad/4.png')
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
		$criteria = new CDbCriteria();
		$criteria->select = "id, icon, name";
		$criteria->addColumnCondition(array('state'=>1));
		$criteria->order = 'usenum desc';
		$criteria->limit = $num;
		$rowset = App::model()->findAll($criteria);
		$attributes = array('id', 'icon', 'name');
		foreach ($rowset as $n) {
			$array[] = ApiBase::object2array($n, $attributes);
		}
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
		$criteria = new CDbCriteria();
		$criteria->select = "id, listimage, `desc`, usenum, name";
		$criteria->addColumnCondition(array('state'=>1));
		$criteria->order = 'usenum desc';
		$criteria->limit = $num;
		$rowset = App::model()->findAll($criteria);
		$attributes = array('id', 'listimage', 'desc', 'usenum', 'name');
		foreach ($rowset as $n) {
			$array[] = ApiBase::object2array($n, $attributes);
		}
		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'', 'result'=>$array);
		return $data;
	}

	/**
	 * 获取应用详情
	 * version 1.0
	 */
	public function getAppContent($args, $format)
	{
		$id = intval($_GET['id']);
		$criteria = new CDbCriteria();
		$criteria->addColumnCondition(array('state'=>1, 'id'=>$id));
		$row = App::model()->find($criteria);
		$attributes = array('id', 'name', 'urlschemes', 'ituneslink', 'html');
		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'', 'result'=>ApiBase::object2array($row, $attributes));
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
		$version = trim($_GET['version']);
		if(1) {
			return ApiBase::$success;
		} else {
			return ApiBase::$fail;
		}
	}
}