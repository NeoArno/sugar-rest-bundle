<?php
namespace NeoArno\sugarRESTBundle\SugarREST ;

use NeoArno\sugarRESTBundle\SugarREST\SugarRESTResult;
use NeoArno\sugarRESTBundle\SugarREST\SugarRESTCall;

class SugarRESTBean
{
    //curl object
    private $rest_call ;

    public function __construct ($rest_call) {
        
        $this->rest_call = $rest_call ;
    }

    //
    // GetEntry
    // Get specific entry Data based on an ID
    //
    public function GetEntry($sessionID, $module_name, $obj_id, $fields_list = array(), $link_name_to_fields_array = array(), $track_view = FALSE) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "module_name" => $module_name,
            "id" => $obj_id,
            "select_fields" => $fields_list,
            "link_name_to_fields_array" => $link_name_to_fields_array,
            "track_view" => $track_view
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("get_entry", $param_encode);
                    
        return ($result);
        
    }
    
    //
    // SetEntry
    // Update or create a single SugarBean
    //
    public function SetEntry($sessionID, $module_name, $name_value_list = array(), $track_view = FALSE) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "module_name" => $module_name,
            "name_value_list" => $name_value_list,
            "track_view" => $track_view
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("set_entry", $param_encode);
                    
        return ($result);
        
    }

    //
    // GetEntries
    // Get specific entries Data based on an array of IDs
    //
    public function GetEntries($sessionID, $module_name, $IDs_array, $fields_list = array(), $link_name_to_fields_array = array()) {

        $entries_parameters = array(
            "session"=> $sessionID,
            "module_name" => $module_name,
            "id" => $IDs_array,
            "select_fields" => $fields_list,
            "link_name_to_fields_array" => $link_name_to_fields_array
        );
        $param_encode = json_encode($entries_parameters) ;

        $result = $this->rest_call->call("get_entries", $param_encode);
                    
        return ($result);
        
    }

    //
    // GetEntriesCount
    // Retrieve number of records in a given module
    //
    public function GetEntriesCount($sessionID, $module_name, $query = "", $deleted = false) {

        $entries_parameters = array(
            "session"=> $sessionID,
            "module_name" => $module_name,
            "query" => $query,
            "deleted" => $deleted
        );
        $param_encode = json_encode($entries_parameters) ;

        $result = $this->rest_call->call("get_entries_count", $param_encode);
                    
        return ($result);
        
    }

    //
    // SetEntries
    // Update or create a list of SugarBeans
    //
    public function SetEntries($sessionID, $module_name, $name_value_lists = array()) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "module_name" => $module_name,
            "name_value_lists" => $name_value_lists
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("set_entries", $param_encode);
                    
        return ($result);
        
    }
    
    //
    // GetListEntries
    // Retrieve a list of Beans answer to a specific request
    //
    public function GetListEntries($sessionID, $module_name, $query = "", $order_by = "", $offset = 0, $fields_list = array(), $link_name_to_fields_array = array(), $max_results = "10", $deleted = 0, $favorites = false) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "module_name" => $module_name,
            "query" => $query,
            "order_by" => $order_by,
            "offset" => $offset,
            "select_fields" => $fields_list,
            "link_name_to_fields_array" => $link_name_to_fields_array,
            "max_results" => $max_results,
            "deleted" => $deleted,
            "Favorites" => $favorites
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("get_entry_list", $param_encode);
                    
        return ($result);
        
    }

    //
    // SearchbyModule
    // Given a list of modules to search and a search string, return the id, module_name, along with the fields
    // We will support Accounts, Bug Tracker, Cases, Contacts, Leads, Opportunities, Project, ProjectTask, Quotes
    //
    public function SearchbyModule($sessionID, $search_string, $modules = array(), $offset = 0, $max_results = "10", $assigned_user_id = "", $select_fields = array(), $unified_search_only = false,   $favorites = false) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "search_string" => $search_string,
            "modules" => $modules,
            "offset" => $offset,
            "max_results" => $max_results,
            "assigned_user_id" => $assigned_user_id,
            "select_fields" => $select_fields,
            "unified_search_only" => $unified_search_only,
            "favorites" => $favorites
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("search_by_module", $param_encode);
                    
        return ($result);
        
    }

    //
    // GetRelationships
    // retrieve a collection of beans that are related to the specified bean and, optionnally, returns relationship data
    //
    public function GetRelationships($sessionID, $module_name, $module_id, $link_field_name, $related_module_query, $related_fields = array(), $related_module_link_name_to_fields_array = array(), $deleted = 0, $order_by = "", $offset = 0, $limit = 0) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "module_name" => $module_name,
            "module_id" => $module_id,
            "link_field_name" => $link_field_name,
            "related_module_query" => $related_module_query,
            "related_fields" => $related_fields,
            "related_module_link_name_to_fields_array" => $related_module_link_name_to_fields_array,
            "deleted" => $deleted,
            "order_by" => $order_by,
            "offset" => $offset,
            "limit" => $limit,

        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("get_relationships", $param_encode);
                    
        return ($result);        
    }

    //
    // GetModifiedRelationships
    // retrieve a collection of beans that are related to the specified bean and, optionnally, returns relationship data
    //
    // NOT WORKING FOR INSTANCE !!!!
    // 
    public function GetModifiedRelationships($sessionID, $module_name, $related_module, $from_date = "1970-01-01 00:00:00", $to_date = "", $select_fields = array(), $relationship_name = "", $offset = 0, $max_results = -99, $deleted = 0, $module_user_id = "", $deletion_date = "") {

        // If no to_date specified so today
        if ($to_date == "")
            $to_date = date ("Y-m-d H:i:s");

        // idem for deletion_date
        //if ($deletion_date == "")
        //    $deletion_date = date ("Y-m-d H:i:s");

        $entry_parameters = array(
            "session"=> $sessionID,
            "module_name" => $module_name,
            "related_module" => $related_module,
            "from_date" => $from_date,
            "to_date" => $to_date,
            "offset" => $offset,
            "max_results" => $max_results,
            "deleted" => $deleted,
            "module_user_id" => $module_user_id,
            "select_fields" => $select_fields,
            "relationship_name" => $relationship_name,
            "deletion_date" => $deletion_date,
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("get_modified_relationships", $param_encode);
                    
        return ($result);        
    }
    
    
    //
    // SetRelationship
    // Sets a single relationship between two SugarBeans 
    //
    public function SetRelationship($sessionID, $module_name, $module_id, $link_field_name, $relatedIDs = array(), $name_value_list = array(), $delete = false ) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "module_name" => $module_name,
            "module_id" => $module_id,
            "link_field_name" => $link_field_name,
            "related_ids" => $relatedIDs,
            "name_value_list" => $name_value_list,
            "delete" => $delete
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("set_relationship", $param_encode);
                    
        return ($result);        
    }

    //
    // SetRelationships
    // Sets multiple relationships between two SugarBeans 
    //
    public function SetRelationships($sessionID, $module_names = array(), $module_ids = array(), $link_field_names = array(), $relatedIDs = array(), $name_value_list = array(), $delete = false) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "module_names" => $module_names,
            "module_ids" => $module_ids,
            "link_field_names" => $link_field_names,
            "related_ids" => $relatedIDs,
            "name_value_list" => $name_value_list,
            "delete" => $delete
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("set_relationships", $param_encode);
                    
        return ($result);        
    }

    //
    // GetQuotePDF
    // Get the base64 contents of a quote pdf 
    //
    public function GetQuotePDF($sessionID, $quote_id, $pdf_format = 'Standard') {

        $entry_parameters = array(
            "session"=> $sessionID,
            "quote_id" => $quote_id,
            "pdf_format" => $pdf_format
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("get_quotes_pdf", $param_encode);
                    
        return ($result);        
    }

    //
    // GetReportPDF
    // Get the base64 contents of a report pdf 
    //
    public function GetReportPDF($sessionID, $report_id) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "report_id" => $report_id
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("get_report_pdf", $param_encode);
                    
        return ($result);        
    }

    //
    // GetReportEntries
    // Retrieve a list of Reports info based on provided IDs.
    //
    public function GetReportEntries($sessionID, $ids, $select_fields = "") {

        $entry_parameters = array(
            "session"=> $sessionID,
            "ids" => $ids,
            "select_fields" => $select_fields
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("get_report_entries", $param_encode);
                    
        return ($result);        
    }

    //
    // GetNoteAttachment
    // Retrieve an attachment from a note
    //
    public function GetNoteAttachment($sessionID, $note_id) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "id" => $note_id
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("get_note_attachment", $param_encode);
                    
        return ($result);        
    }

    //
    // SetNoteAttachment
    // Add or replace the attachment on a Note.
    // Optionally you can set the relationship of this note to Accounts/Contacts and so on by setting related_module_id, related_module_name
    //
    public function SetNoteAttachment($sessionID, $the_note = array()) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "note" => $the_note
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("set_note_attachment", $param_encode);
                    
        return ($result);        
    }

    //
    // GetDocumentRevision
    // This method is used as a result of the .htaccess lock down on the cache directory. It will allow a
    // properly authenticated user to download a document that they have proper rights to download.
    //
    public function GetDocumentRevision($sessionID, $doc_id) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "id" => $note_id
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("get_document_revision", $param_encode);
                    
        return ($result);        
    }

    //
    // SetDocumentRevision
    // sets a new revision for this document
    //
    public function SetDocumentRevision($sessionID, $document_revision = array()) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "document_revision" => $document_revision
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("set_document_revision", $param_encode);
                    
        return ($result);        
    }
    
}


?>
