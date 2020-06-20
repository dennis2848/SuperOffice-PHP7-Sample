<?php
include_once(dirname(__FILE__).'/../SoAgent.php');
/**
 * SoContactAgent short summary.
 *
 * SoContactAgent description.
 *
 * @version 1.0
 * @author yanjunl
 */

		
class SoImportAgent extends SoAgent
{

	/**
     * @$endpoint       web service end point
     * @$ticket     NetServer ticket
     * @$application#token      private token of application
     * @$headerNamespace        namespace for request header
     * @$timeout        request timeout time
     * @$responseTimeout        response timeout time
     * @$portName web service port
     */
    function __construct($endpoint, $ticket = "", $applicationToken = "", $headerNamespace = "", $timeout = 0, $responseTimeout = 30, $portName = '')        
    {
        parent::__construct($endpoint."Import.svc", "WcfImport.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Preview the import
	 *
	 *@$importLines		The rows that will be manipulated and according to Import rules
	 *@$columnDefinition		An array of the columndefinitions, like firstname, lastname, ...
	 *@$culture		The current culture used in the import. Used to match language specific strings
	 *@$context		Optional context for the import.
	 *
	 *@return: An array of the the rows that can be imported, manipulated according to Import rules given
	 */
	function PreviewImport($importLines, $columnDefinition, $culture, $context)
	{
		$result = $this->sendRequest("PreviewImport", array("ImportLines"=>$importLines, "ColumnDefinition"=>$columnDefinition, "Culture"=>$culture, "Context"=>$context));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Do the actual import
	 *
	 *@$importLines		The rows that will be imported
	 *@$columnDefinition		An array of the columndefinitions, like firstname, lastname, ...
	 *@$createSelection		true if a selection of the imported entities shall be made
	 *@$culture		The current culture used in the import. Used to match language specific strings
	 *@$context		Optional context for the import.
	 *
	 *@return: First part: the id of the selection created after the import, 0 if no selection is created. Second part: The number of rows actually imported
	 */
	function SaveImport($importLines, $columnDefinition, $createSelection, $culture, $context)
	{
		$result = $this->sendRequest("SaveImport", array("ImportLines"=>$importLines, "ColumnDefinition"=>$columnDefinition, "CreateSelection"=>$createSelection, "Culture"=>$culture, "Context"=>$context));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a new empty import row with x count of values
	 *
	 *@$countColumns		The count of values that will can be filled out
	 *
	 *@return: A new ImportLine
	 */
	function CreateDefaultImportLine($countColumns)
	{
		$result = $this->sendRequest("CreateDefaultImportLine", array("CountColumns"=>$countColumns));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Populates the ImportLines and columnDefs basedfrom erp system
	 *
	 *@$restriction		Archive restrictions.
	 *@$columns		Columns.
	 *@$connectionId		Connection id for Erp system
	 *@$erpActorType		Erp Actor type
	 *
	 *@return: The ImportLines and ColumnDefs
	 */
	function CreateErpImportData($restriction, $columns, $connectionId, $erpActorType)
	{
		$result = $this->sendRequest("CreateErpImportData", array("Restriction"=>$restriction, "Columns"=>$columns, "ConnectionId"=>$connectionId, "ErpActorType"=>$erpActorType));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

