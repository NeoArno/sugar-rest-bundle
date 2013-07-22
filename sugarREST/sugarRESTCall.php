<?php
namespace NeoArno\sugarRESTBundle\SugarREST ;

use NeoArno\sugarRESTBundle\SugarREST\SugarRESTResult;
use Lsw\ApiCallerBundle\Call\HttpPostJson;

class SugarRESTCall
{
    private $ApiVersion ;
    private $RESTurl ;
    
    private $rest_error ;
    private $rest_response ;
    private $rest_result ;
    
    private $curl_session ;
    
    private $rest_options ;

        
    public function __construct ($curl_req, $Url, $ApiVersion) {
        
        $this->ApiVersion = $ApiVersion ;
        $this->RESTurl = $Url ;
        $this->rest_error = "";
        $this->rest_response = "";
        
        
        $this->rest_options =  array(
            'CURLOPT_NOBODY'=> TRUE,
        );
        
        $this->curl_session = $curl_req ;
    }
      
    public function call ($method, $obj_parameter)
    {
        $post_parameters = array(
             "method" => $method,
             "input_type" => "JSON",
             "response_type" => "JSON",
             "rest_data" => $obj_parameter
        );

        $result_call = $this->curl_session->call(new HttpPostJson($this->RESTurl, $post_parameters));
        
        $this->rest_result = new SugarRESTResult($result_call);
        
        return($this->rest_result);
        
    }

    public function getResult () {
        return($this->rest_result);
    }

    public function getApiVersion () {
        return($this->ApiVersion);
    }
    
}


?>
