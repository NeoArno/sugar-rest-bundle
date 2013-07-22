<?php
namespace NeoArno\sugarRESTBundle\SugarREST ;

use NeoArno\sugarRESTBundle\SugarREST\SugarRESTResult;
use NeoArno\sugarRESTBundle\SugarREST\SugarRESTCall;

class SugarRESTUser
{
    //curl object
    private $rest_call ;
        
    public function __construct ($rest_call) {
        
        $this->rest_call = $rest_call ;
    }
  
    //
    // Connect
    // Create Instance Object connected to the rigthinstance of SugarCRM
    //
    public function Connect($user, $password, $language ="en_US", $notifyonsave = false)
    {           
        $login_parameters = array(
            "user_auth"=>array(
                 "user_name"=>$user,
                 "password"=>md5($password),
                 "version"=>"1"
            ),
            "application_name"=> "",
            "name_value_list"=> array(
                    array("name" => "language",
                          "value" => $language),
                    array("name" => "notifyonsave",
                          "value" => $notifyonsave),
            ),
        );
        $param_encode = json_encode($login_parameters) ;

        $result = $this->rest_call->call("login", $param_encode);
        
        return ($result);
    }
    
    //
    // Logout
    // Disconnect from the current instance
    //
    public function Logout($sessionID)
    {
        $logout_parameters = array(
            "user_auth"=>array("session" => $sessionID )
        );

        $result = $this->rest_call->call("logout", $logout_parameters);
                    
        return ($result);
    }

    //
    // SeamlessLogin
    // verify if the sessionID is relative to an active session
    //
    public function SeamlessLogin($sessionID)
    {
        $seamless_login_parameters = array(
            "user_auth"=>array("session" => $sessionID )
        );

        $result = $this->rest_call->call("seamless_login", $seamless_login_parameters);
                    
        return ($result);
    }

    //
    // GetUserID
    // Return the user_id of the user that is logged into the current session.
    //
    public function GetUserID($sessionID)
    {           
        $user_parameters = array(
            "session" => $sessionID,
        );
        
        $param_encode = json_encode($user_parameters) ;

        $result = $this->rest_call->call("get_user_id", $param_encode);
        
        return ($result);
    }

    //
    // GetAvailableModules
    // Retrieve the list of available modules on the system available to the currently logged in user.
    //
    public function GetAvailableModules($sessionID, $filter = "all")
    {           
        $user_parameters = array(
            "session" => $sessionID,
            "filter"  => $filter
        );
        
        $param_encode = json_encode($user_parameters) ;

        $result = $this->rest_call->call("get_available_modules", $param_encode);
        
        return ($result);
    }

    //
    // GetlastViewed
    // Retrieve a list of recently viewed records by module.
    //
    public function GetlastViewed($sessionID, $module_array = array("Home"))
    {           
        $user_parameters = array(
            "session" => $sessionID,
            "module_names"  => $module_array
        );
        
        $param_encode = json_encode($user_parameters) ;

        $result = $this->rest_call->call("get_last_viewed", $param_encode);
        
        return ($result);
    }

    //
    // GetUpcomingActivities
    // Retrieve a list of upcoming activities including Calls, Meetings,Tasks and Opportunities.
    //
    public function GetUpcomingActivities($sessionID)
    {           
        $user_parameters = array(
            "session" => $sessionID,
        );
        
        $param_encode = json_encode($user_parameters) ;

        $result = $this->rest_call->call("get_upcoming_activities", $param_encode);
        
        return ($result);
    }

    //
    // GetUserTeamID
    // Return the ID of the default team for the user that is logged into the current session.
    //
    public function GetUserTeamID($sessionID)
    {           
        $user_parameters = array(
            "session" => $sessionID,
        );
        
        $param_encode = json_encode($user_parameters) ;

        $result = $this->rest_call->call("get_user_team_id", $param_encode);
        
        return ($result);
    }
    
}


?>
