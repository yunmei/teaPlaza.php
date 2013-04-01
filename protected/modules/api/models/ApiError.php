<?php
/**
* API错误码文件
*/

/**
 * API错误码提示类
 */
class ApiError
{
	/**
	 * 没有错误信息
	 */
	const SUCCESS = "0";
	
	/**
	 * 错误失败
	 */
	const FAIL = "1000";
	
	/**
	 * 用户验证失败
	 */
	const USER_CHECK_INVALID = "1";
	
	/**
	 * session验证失败
	 */
	const SID_CHECK_INVALID = "2";
	
	/**
	 * 缺少method参数
	 */
    const METHOD_NO_PARAM = "100";
    
    /**
     * 参数不正确
     */
    const METHOD_INVALID = "101";
    
    /**
     * 缺少apikey参数
     */
    const APIKEY_NO_EXIST = "200";
    
    /**
     * apikey不能用
     */
    const APIKEY_INVALID = "201";
    
    /**
     * 缺少输出方法
     */
    const RENDER_NO_METHOD = "300";
    
    /**
     * 系统参数错误
     */
    const BASE_PARAM_INVALID = "301";
    
    /**
     * 参数错误
     */
    const ARGS_INVALID = "400";
    
    /**
     * 用户已存在
     */
    const USER_EXISTS = "401";
    
    /**
     * 邮箱已存在
     */
    const USER_EMAIL_EXISTS = "402";
}