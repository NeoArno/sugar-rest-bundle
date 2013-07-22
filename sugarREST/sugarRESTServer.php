<?php
namespace NeoArno\sugarRESTBundle\SugarREST ;

use NeoArno\sugarRESTBundle\SugarREST\SugarRESTResult;
use NeoArno\sugarRESTBundle\SugarREST\SugarRESTCall;

class SugarRESTServer
{
    private $rest_call ;
        
    public function __construct ($rest_call) {
        
        $this->rest_call = $rest_call ;
    }
  
    //
    // SugarGetEntryInfo
    // Get an object Information
    //
    public function GetServerInfo($sessionID) {
                
        $result = $this->rest_call->call("get_server_info", "");
        return ($result);
    }

    //
    // GetModuleLayout
    // Retrieve the layout metadata for a given module given a specific type and view.
    //
    public function GetModuleLayout($sessionID, $module_name  = array(), $views = array("edit"), $type = array("default"), $acl_check = true, $md5 = false)
    {           
        $server_parameters = array(
            "session"=> $sessionID,
            "a_module_names" => $module_name,
            "a_type" => $type,
            "a_view" => $views,
            "acl_check" => $acl_check,
            "md5" => $md5
        );
        
        $param_encode = json_encode($server_parameters) ;

        $result = $this->rest_call->call("get_module_layout", $param_encode);
        
        return ($result);
    }    

    //
    // GetModuleFieldsMD5
    // Retrieve the md5 hash of the vardef entries for a particular module.
    //
    public function GetModuleFieldsMD5($sessionID, $module_name)
    {           
        $server_parameters = array(
            "session"=> $sessionID,
            "module_names" => $module_name,
        );
        
        $param_encode = json_encode($server_parameters) ;

        $result = $this->rest_call->call("get_module_fields_md5", $param_encode);
        
        return ($result);
    }    

    //
    // GetModuleFields
    // Retrieve vardef information on the fields of the specified bean.
    //
    public function GetModuleFields($sessionID, $module_name, $fields = array())
    {           
        $server_parameters = array(
            "session"=> $sessionID,
            "module_names" => $module_name,
            "fields" => $fields
        );
        
        $param_encode = json_encode($server_parameters) ;

        $result = $this->rest_call->call("get_module_fields", $param_encode);
        
        return ($result);
    }    

    //
    // GetModuleLayoutMD5
    // Retrieve the md5 hash of a layout metadata for a given module given a specific type and view.
    //
    public function GetModuleLayoutMD5($sessionID, $module_name  = array(), $views = array("edit"), $type = array("default"), $acl_check = true)
    {           
        $server_parameters = array(
            "session"=> $sessionID,
            "module_names" => $module_name,
            "type" => $type,
            "view" => $views,
            "acl_check" => $acl_check,
        );
        
        $param_encode = json_encode($server_parameters) ;

        $result = $this->rest_call->call("get_module_layout_md5", $param_encode);
        
        return ($result);
    }    

    //
    // GetLanguageDef
    // Retrieve the md5 hash of a layout metadata for a given module given a specific type and view.
    //
    public function GetLanguageDef($sessionID, $module_name  = array(), $md5 = false)
    {           
        $server_parameters = array(
            "session"=> $sessionID,
            "module_names" => $module_name,
            "MD5" => $md5,
        );
        
        $param_encode = json_encode($server_parameters) ;

        $result = $this->rest_call->call("get_language_definition", $param_encode);
        
        return ($result);
    }    
    
}


?>
