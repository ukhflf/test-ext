<?php
/**
 * 全局帮助函数
 * @version 1.0.0
 * @author zdk 317583717@qq.com
 */

if(!function_exists("successOutput")){
    
    /**
     * 成功返回帮助函数
     * @param array $data
     * @param int $code
     * @param string $msg
     * @return string
     */
    function successOutput(array $data , string $msg='ok' , int $code = 200 ){
        $result = array(
            'code' => $code,
            'message' => $msg,
            'result' => $data
        );
        return json_encode($result);
    }
}

if(!function_exists("errorOutput")){
    /**
     * 失败返回帮助函数
     * @param int $code
     * @param string $msg
     * @return string
     */
    function errorOutput( string $msg='' , int $code = 400){
        $result = array(
            'code' => $code,
            'message' => $msg,
            'result' => array(),
        );
        return json_encode($result);
    }
}

if(!function_exists("signature")){
    /**
     * 接口鉴权加密函数
     * @param array $data
     * @param string $nonce
     * @param string $secretKey
     * @return string
     */
    function signature(array $data , string $nonce , string $secretKey){
        ksort($data);
        $paramString = '';
        foreach ($data as $k=>$v){
            $paramString.=$k.$v;
        }
        $paramString.=$secretKey.$nonce;
        $md5String = md5($paramString);
        return $md5String;
    }
}