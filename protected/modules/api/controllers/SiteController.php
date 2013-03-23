<?php
/**
 * API入口Controller
 * @author Bevin
 */
class SiteController extends Controller
{
	/**
	 * IndexAction
	 */
	public function actionIndex()
	{
	    $args = $_GET;
	    $method = strip_tags(trim($args['method']));
	    $apikey = strip_tags(trim($args['apikey']));
	    $format = ApiBase::checkFormat($args['format']);
	    
	    try {
	        ApiBase::checkApiKey($apikey);
	    } catch (CException $e) {
	        $data = array('errorCode'=>$e->getCode(), 'errorMessage'=>$e->getMessage());
	        ApiBase::renderData($data, $format);
	        exit(0);
	    }
	    
	    try {
            list($class, $method) = ApiBase::checkMethod($method);
	    } catch (CException $e) {
	        $data = array('errorCode'=>$e->getCode(), 'errorMessage'=>$e->getMessage());
	        ApiBase::renderData($data, $format);
	        exit(0);
	    }
	    
		try {
	    	$object = new $class;
	    	$data = $object->$method($args, $format);
	        ApiBase::renderData($data, $format);
	    }  catch (CException $e) {
	        $data = array('errorCode'=>$e->getCode(), 'errorMessage'=>$e->getMessage());
	        ApiBase::renderData($data, $format);
	        exit(0);
	    }
	}
}