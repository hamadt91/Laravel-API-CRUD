<?php



if (!function_exists('error_response')) {

    /**
     * Return the error response
     * @param $code
     * @param $status
     * @param $msg
     * @param $errors
     * @return array Of response that are created based on arguments
     */
    function error_response($msg, $errors, $code = '422',$status = 'Error'){
        return [
            'statusCode' => $code,
            'status' => $status,
            'message' => $msg,
            'errors' => $errors
        ];
    }

}

if(!function_exists('success_response')){

    /**
     * Return Success response
     * @param $msg
     * @param array $data
     * @param string $code
     * @param string $status
     * @return array of response that are created based on arguments
     */
    function success_response($msg, $data = array(), $code = '200', $status = 'Success'){
        return [
            'statusCode' => $code,
            'status' => $status,
            'message' => $msg,
            'data' => $data
        ];
    }
}
if(!function_exists('success_response')){

    /**
     * Return Success response
     * @param $msg
     * @param array $data
     * @param string $code
     * @param string $status
     * @return array of response that are created based on arguments
     */
    function success_response($msg, $data = array(), $code = '200', $status = 'Success'){
        return [
            'statusCode' => $code,
            'status' => $status,
            'message' => $msg,
            'data' => $data
        ];
    }
}
