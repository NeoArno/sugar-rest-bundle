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
    // Logs user into the SugarCRM application
    // Parameters :
    //      $user - String - user login to the application.
    //      $password - String - password associated to the user.
    //      $language - String - language code for this user ("en_US" by default).
    //      $notifyonsave - Bool - generate an email notification when a record is saved
    // return result object 
    //      return the sessionID and an array of information on connected user
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
    // Logs out the current user
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    // return result object 
    //      no specific information
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    // return result object 
    //      if $result->error_nb is equal to 0 the session is already connected
    //      if $result->error_nb is equal to 1 the session il not connected
    //
    public function SeamlessLogin($sessionID)
    {
        $seamless_login_parameters = array("session" => $sessionID );
        
        $param_encode = json_encode($seamless_login_parameters) ;

        $result = $this->rest_call->call_seamlesslogin($param_encode);
                    
        return ($result);
    }

    //
    // GetUserID
    // Return the user_id of the user that is logged into the current session.
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    // return result object 
    //      result[0] is the current user ID
    //
    public function GetUserID($sessionID)
    {           
        $user_parameters = array("session" => $sessionID);
        
        $param_encode = json_encode($user_parameters) ;

        $result = $this->rest_call->call("get_user_id", $param_encode);
        
        return ($result);
    }

    //
    // GetAvailableModules
    // Retrieve the list of available modules on the system available to the currently logged in user.
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $filter - String - "all" : return all modules
    //                         "default" : Return all visible modules for the application
    //                         "mobile" : Return all visible modules for the mobile view
    // return result object 
    //      return information on each module (key, name, favorite enabled, acls)
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $module_array - Array - array of requested modules
    //      
    // return result object 
    //      Array List of upcoming activities
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    // return result object 
    //      Array List of upcoming activities
    //
    public function GetUpcomingActivities($sessionID)
    {           
        $user_parameters = array("session" => $sessionID);
        
        $param_encode = json_encode($user_parameters) ;

        $result = $this->rest_call->call("get_upcoming_activities", $param_encode);
        
        return ($result);
    }

    //
    // GetUserTeamID
    // Return the ID of the default team for the user that is logged into the current session.
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    // return result object 
    //      Array List of upcoming activities
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
