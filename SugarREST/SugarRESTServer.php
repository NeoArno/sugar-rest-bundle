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
    // Gets server info. This will return information like version, flavor and gmt_time.
    // return result object 
    //      - flavor - String - Retrieve the specific flavor of sugar.
    //      - version - String - Retrieve the version number of Sugar that the server is running.
    //      - gmt_time - String - Return the current time on the server in the format 'Y-m-d H:i:s'. This time is in GMT.    
    //
    public function GetServerInfo() {
                
        $result = $this->rest_call->call("get_server_info", "");
        return ($result);
    }

    //
    // GetModuleLayout
    // Retrieve the layout metadata for a given module given a specific type and view.
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $module_name - Array - The name of the module(s) to return records from. This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method)..
    //      $view - Array - The view(s) requested.  Current supported types are edit, detail, list, and subpanel.
    //      $type - Array - The type(s) of views requested. Current supported types are 'default' (for application) and 'wireless' (for mobile)
    //      $acl_check : verify the ACL for module and requested view for the session user. By default : “true”
    //      $md5 : if true, return only the MD5 number for requested module and view
    // return result object 
    //      For each module, each type and each view requested return the metadata array (look at SugarCRM document or in the metadata directory of the module)
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to Connect.
    //      $module_name - String - The name of the module to return records from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method).
    //      $fields - Array - Optional, if passed then retrieve vardef information on these fields only.
    // return result object 
    //      'module_fields' - Array - The vardef information on the selected fields.
    //      'link_fields' - Array - The vardef information on the link fields
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
    // Retrieve the language metadata for given module(s).
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to Connect.
    //      $module_name - Array - The name of the module to return records from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method).
    //      $md5 : if true, return only the MD5 number for requested module and view. By default, the value is false
    // return result object 
    //      return the language metadata array for the module(s) and current user defautlt language
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
