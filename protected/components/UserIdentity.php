<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$username = strtolower($this->username);
	    $user = User::model()->find('LOWER(username) = ?', array($username));
		
		if ($user === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		elseif ($user->password != $this->password)
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else {
			$this->errorCode = self::ERROR_NONE;
			$this->_id = $user->id;
			$this->setUserStates($user);
			$user->afterLogin();
		}
		return !$this->errorCode;
	}
	
	public function getId()
	{
	    return $this->_id;
	}
	
	/**
	 * 设置用户资料，放入session中
	 * @param User $user
	 */
	private function setUserStates($user)
	{
	    $session = app()->session;
        $session['email'] = $user->email;
        $session['state'] = $user->state;
        $session['realname'] = $user->realname;
        $session['login_nums'] = $user->login_nums;
        $session['create_time'] = $user->create_time;
        $session['create_ip'] = $user->create_ip;
        $session['last_login_time'] = $user->last_login_time;
        $session['last_login_ip'] = $user->last_login_ip;
        $session['ismanage'] = $user->ismanage;
	}
}