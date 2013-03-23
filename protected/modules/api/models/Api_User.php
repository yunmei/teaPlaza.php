<?php
/**
* 用户API文件
*/

/**
 * 用户API类
 */
class Api_User
{
	/**
	 * 获取一个已登陆用户的Session
	 * @version 1.0
	 */
	public function getSid($args, $format)
	{
		$user = ApiBase::checkUserPw($format);
		$user->last_login_time = time();
		$user->last_login_ip = $_SERVER['REMOTE_ADDR'];
		$user->login_nums++;
		$user->save();
		
		$session = new UserSession();
		$session->user_id = $user->id;
		$session->session = md5($user->id . time());
		$session->active_ip = $_SERVER['REMOTE_ADDR'];
		$session->active_time = time() + 3600*12;
		$session->active_sign = ApiBase::getActiveSign();
		if($session->save()) {
			$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'', 'result'=>array(
				'sid'=>$session->session
			));
			return $data;
		}
		return ApiBase::$fail;
	}
	
	/**
	 * 用户注册
	 * @version 1.0
	 */
	public function register($args, $format)
	{
		$username = strip_tags(trim($_POST['username']));
		$password = trim($_POST['password']);
		$email = strip_tags(trim($_POST['email']));
		if(!$username || !$password) {
			return ApiBase::$fail;
		}
		$criteria = new CDbCriteria();
		$criteria->addColumnCondition(array('username'=>$username));
		$user = User::model()->find($criteria);
		if(null === $user) {
			$user = new User();
			$user->username = $username;
			$user->password = $password;
			$user->email = $email;
			$user->state = STATE_ENABLED;
			if($user->save()) {
				return ApiBase::$success;
			} else {
				return ApiBase::$fail;
			}
		}
		$data = array('errorCode' => ApiError::USER_EXISTS, 'errorMessage'=>'用户已存在');
		return $data;
	}

	public function test($args, $format)
	{
		$array = array(
			'content' => 'aaa'
		);
		$data = array('errorCode' => ApiError::SUCCESS, 'errorMessage'=>'', 'result'=>$array);
		return $data;
	}
}