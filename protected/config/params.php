<?php
return array(
	// 管理员邮箱
	'adminEmail' => 'bevin1984@gmail.com',

	//时间格式
    'formatDateTime' => 'Y-m-d H:i:s',
    'formatShortDateTime' => 'Y-m-d H:i',
    'formatDate' => 'Y-m-d',
    'formatTime' => 'H:i:s',
    'formatShortTime' => 'H:i',

	// 找回密码有效期，默认3天
    'getPasswordUrlExpire' => 3*24*60*60,

	// 邮件优先级
    'priorityRegister' => 1000,
    'priorityForgetPasswd' => 1000,

);