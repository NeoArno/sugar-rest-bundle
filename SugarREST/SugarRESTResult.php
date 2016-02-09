<?php
namespace NeoArno\sugarRESTBundle\SugarREST;

class SugarRESTResult
{
    private $error_nb ;
    private $error_name ;
    private $error_description ;

    private $session_id ;

    private $result_array ;

    private $rest_result ;

    public function __construct($result_array = NULL) {

        $this->result_array = $result_array ;

        if ($result_array == null) {
            $this->setError(-1, "REST : no return from server", "REST : no return from server");
        } else {

            if (!empty($result_array->number))
                $this->error_nb = $result_array->number;
            else
                $this->error_nb = 0;

            if (!empty($result_array->name))
                $this->error_name = $result_array->name;
            else
                $this->error_name = "";

            if (!empty($result_array->description))
                $this->error_description = $result_array->description;
            else
                $this->error_description = "";

            if (!empty($result_array->id))
                $this->session_id = $result_array->id;
            else
                $this->session_id = "";

            if (!empty($result_array->name_value_list))
                $this->rest_result = $result_array->name_value_list;
            else
                $this->rest_result = array();
        }
    }

    public function setError($code, $message, $description) {

        $this->error_nb = $code;
        $this->error_name = $message ;
        $this->error_description = $description ;

        $this->result_array = NULL;
        $this->rest_result = NULL ;
    }



    public function isError() {
        if ($this->error_nb == 0) {
            return(false) ;
        } else {
            return(true) ;
        }
    }

    public function getErrorNb() {
        return ($this->error_nb) ;
    }

    public function getErrorMsg() {
        return ($this->error_name) ;
    }

    public function getErrorDesc() {
        return($this->error_description) ;
    }

    public function getSessionID() {
        return($this->session_id) ;
    }

    public function getRestResult() {
        return($this->rest_result) ;
    }

    public function getResultArray() {
        if (is_object($this->result_array)) {
            $local_result = $this->result_array ;
            return $this->Object2Array($local_result) ;
        } else {
            return (array(0 => $this->result_array));
        }
    }

    private function Object2Array($the_object) {
        if (is_object($the_object)) {
                // Gets the properties of the given object
                // with get_object_vars function
                $the_object = get_object_vars($the_object);
        }

        if (is_array($the_object)) {
                /*
                * Return array converted to object
                * Using __FUNCTION__ (Magic constant)
                * for recursive call
                */
                return array_map('self::Object2Array', $the_object);
        }
        else {
                // Return array
                return $the_object;
        }
    }

}


?>
