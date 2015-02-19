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

    // GetEntry
    // Get specific entry Data based on an ID
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $module_name - String - The name of the module to return records from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method).
    //      $obj_id - String - The SugarBean's ID value.
    //      $fields_list - Array - A list of the fields to be included in the results. This optional parameter allows for only needed fields to be retrieved.
    //      $link_name_to_fields_array - Array - A list of link_names and for each link_name, what fields value to be returned. For ex.'link_name_to_fields_array' => array(array('name' =>  'email_addresses', 'value' => array('id', 'email_address', 'opt_out', 'primary_address')))
    //      $trackView - Boolean - Should we track the record accessed
    // return result object 
    //      return an array of each fields, values and relationships list
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $module_name - String - The name of the module to return records from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method).
    //      $name_value_list - Array - The keys of the array are the SugarBean attributes, the values of the array are the values the attributes should have.
    //      $trackView - Boolean - Should we track the record accessed
    // return result object 
    //      the ID of the bean that was written to (-1 on error)
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

    // GetEntries
    // Get specific entry Data based on an array of IDs
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $module_name - String - The name of the module to return records from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method).
    //      $IDs_array - Array - The SugarBeans' IDs array.
    //      $fields_list - Array - A list of the fields to be included in the results. This optional parameter allows for only needed fields to be retrieved.
    //      $link_name_to_fields_array - Array - A list of link_names and for each link_name, what fields value to be returned. For ex.'link_name_to_fields_array' => array(array('name' =>  'email_addresses', 'value' => array('id', 'email_address', 'opt_out', 'primary_address')))
    // return result object 
    //      return an array of each fields, values and relationships list
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $module_name - String - The name of the module to return records from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method).
    //      $query - String - SQL where clause without the word 'where'
    //      $deleted - Boolean - specify whether or not to include deleted records
    // return result object 
    //      result_count - integer - Total number of records for a given module and query
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $module_name - String - The name of the module to return records from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method).
    //      $name_value_list - Array - Array of Bean specific Arrays where the keys of the array are the SugarBean attributes, the values of the array are the values the attributes should have.
    // return result object 
    //      'ids' -- Array of the IDs of the beans that was written to (-1 on error)
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $module_name - String - The name of the module to return records from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method).
    //      $query - String - SQL where clause without the word 'where'
    //      $order_by - String - SQL order by clause without the phrase 'order by'
    //      $offset - Integer - The record offset to start from
    //      $fields_list - Array - A list of the fields to be included in the results. This optional parameter allows for only needed fields to be retrieved.
    //      $link_name_to_fields_array - Array - A list of link_names and for each link_name, what fields value to be returned. For ex.'link_name_to_fields_array' => array(array('name' =>  'email_addresses', 'value' => array('id', 'email_address', 'opt_out', 'primary_address')))
    //      $max_results - Integer - The maximum number of records to return.  The default is the sugar configuration value for 'list_max_entries_per_page'
    //      $deleted - Boolean - false if deleted records should not be include, true if deleted records should be included
    // return result object 
    //      'result_count' -- integer - The number of records returned
    //      'next_offset' -- integer - The start of the next page (This will always be the previous offset plus the number of rows returned.  It does not indicate if there is additional data unless you calculate that the next_offset happens to be closer than it should be.
    //      'entry_list' -- Array - The records that were retrieved
    //	    'relationship_list' -- Array - The records link field data. The example is if asked about accounts email address then return data would look like Array ( [0] => Array ( [name] => email_addresses [records] => Array ( [0] => Array ( [0] => Array ( [name] => id [value] => 3fb16797-8d90-0a94-ac12-490b63a6be67 ) [1] => Array ( [name] => email_address [value] => hr.kid.qa@example.com ) [2] => Array ( [name] => opt_out [value] => 0 ) [3] => Array ( [name] => primary_address [value] => 1 ) ) [1] => Array ( [0] => Array ( [name] => id [value] => 403f8da1-214b-6a88-9cef-490b63d43566 ) [1] => Array ( [name] => email_address [value] => kid.hr@example.name ) [2] => Array ( [name] => opt_out [value] => 0 ) [3] => Array ( [name] => primary_address [value] => 0 ) ) ) ) )
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $search_string - String - string to search
    //      $modules - Array - array of modules to query
    //      $offset - Integer - The record offset to start from
    //      $max_results - Integer - The maximum number of records to return.  The default is the sugar configuration value for 'list_max_entries_per_page'
    //      $assigned_user_id - String - a user id to filter all records by, leave empty to exclude the filter
    //      $select_fields - Array - An array of fields to return.  If empty the default return fields will be from the active list view defs
    //      $unified_search_only - Boolean - A boolean indicating if we should only search against those modules participating in the unified search
    //      $favorites - Boolean - A boolean indicating if we should only search against records marked as favorites.
    // return result object
    //      return array of return_search_result
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $module_name - String - The name of the module that the primary record is from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method)..
    //      $module_id - String - The ID of the bean in the specified module
    //      $link_field_name - String - The name of the link field to return records from.  This name should be the name of the relationship.
    //      $related_module_query - String - A portion of the where clause of the SQL statement to find the related items.  The SQL query will already be filtered to only include the beans that are related to the specified bean.
    //      $related_fields - Array - Array of related bean fields to be returned.
    //      $related_module_link_name_to_fields_array - Array - For every related bean returrned, specify link fields name to fields info for that bean to be returned. For ex.'link_name_to_fields_array' => array(array('name' =>  'email_addresses', 'value' => array('id', 'email_address', 'opt_out', 'primary_address'))).
    //      $deleted - Boolean - false if deleted records should not be include, true if deleted records should be included
    //      $order_by - String - SQL order by clause without the phrase 'order by'
    //      $offset - Integer - The record offset to start from
    //      $limit - Integer - number of results to return (defaults to all)    
    // return result object
    //      'entry_list' -- Array - The records that were retrieved
    //      'relationship_list' -- Array - The records link field data.
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $module_name - String - The name of the module that the primary record is from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method)..
    //      $module_id - String - The ID of the bean in the specified module
    //      $link_field_name - String - name of the link field which relates to the other module for which the relationship needs to be generated.
    //      $relatedIDs - Array - array of related record ids for which relationships needs to be generated.
    //      $name_value_list - Array - The keys of the array are the SugarBean attributes, the values of the array are the values the attributes should have.
    //      $deleted - Boolean - Optional, if the value 0 or nothing is passed then it will add the relationship for related_ids and if 1 is passed, it will delete this relationship for related_ids
    // return result object
    //      created - integer - How many relationships has been created
    //      failed - integer - How many relationsip creation failed
    //      deleted - integer - How many relationships were deleted
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $module_names - Array - Array of the name of the module that the primary record is from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method)..
    //      $module_ids - Array - The array of ID of the bean in the specified module_name
    //      $link_field_names - Array - Array of the name of the link field which relates to the other module for which the relationships needs to be generated.
    //      $relatedIDs - Array - array of related record ids for which relationships needs to be generated.
    //      $name_value_lists - Array - Array of Array. The keys of the inner array are the SugarBean attributes, the values of the inner array are the values the attributes should have.
    //      $deleted - Boolean - Optional, if the value 0 or nothing is passed then it will add the relationship for related_ids and if 1 is passed, it will delete this relationship for related_ids
    // return result object
    //      created - integer - How many relationships has been created
    //      failed - integer - How many relationsip creation failed
    //      deleted - integer - How many relationships were deleted
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $quote_id - String - ID of quote bean
    //      $pdf_format - String - name of the output ex. 'Standard' or 'Invoice'
    // return result object
    //      return base64 content pdf file
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $report_id - String - ID of report bean
    // return result object
    //      return base64 content pdf file
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $ids - Array - An array of Report IDs
    //      $select_fields - String - A list of the fields to be included in the results. This optional parameter allows for only needed fields to be retrieved.
    // return result object
    //      'field_list' -- Array of Var def information about the returned fields
    //      'entry_list' -- Array of the records that were retrieved
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $note_id - String - The ID of the appropriate Note
    // return result object
    //      'id' -- The ID of the Note containing the attachment
    //      'filename' -- The file name of the attachment
    //      'file' -- The binary contents of the file.
    //      'related_module_id' -- module id to which this note is related
    //      'related_module_name' - module name to which this note is related
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $the _note - Array - Array of Note information
    // return result object
    //      'id' -- The ID of the Note 
    //
    public function SetNoteAttachment($sessionID, $the_note = array()) {

        $entry_parameters = array(
            "session"=> $sessionID,
            "note" => $note_id,
            "filename" => $filename,
            "file" => $file,
            "related_module_id" => $related_module_id,
            "related_module_name" => $related_module_name
        );
        $param_encode = json_encode($entry_parameters) ;

        $result = $this->rest_call->call("set_note_attachment", $param_encode);
                    
        return ($result);        
    }

    //
    // GetDocumentRevision
    // This method is used as a result of the .htaccess lock down on the cache directory. It will allow a
    // properly authenticated user to download a document that they have proper rights to download.
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $doc_id - String - The ID of the appropriate Note
    // return result object
    //      'id' -- The ID of the Note 
    //      'document_name' -- name of the document
    //      'revision' - The revision value for this revision
    //      'filename' -- The file name of the attachment
    //      'file' -- The binary contents of the file.
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
    // Parameters :
    //      $sessionID - String - Session ID returned by a previous call to login.
    //      $document_revision - Array - Array of document revision information
    // return result object
    //      'id' -- The ID of the Note 
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
