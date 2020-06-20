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

		
class SoErpSyncAgent extends SoAgent
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
        parent::__construct($endpoint."ErpSync.svc", "WcfErpSync.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new ErpSyncConnectorEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ErpSyncConnectorEntity with default values
     */
     function CreateDefaultErpSyncConnectorEntity()
     {
		$result = $this->sendRequest("CreateDefaultErpSyncConnectorEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing ErpSyncConnectorEntity or creates a new ErpSyncConnectorEntity if the id parameter is empty
     * 
     * @return New or updated ErpSyncConnectorEntity
     */
	function SaveErpSyncConnectorEntity($erpSyncConnectorEntity)
	{
		$result = $this->sendRequest("SaveErpSyncConnectorEntity", array("ErpSyncConnectorEntity"=>$erpSyncConnectorEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the ErpSyncConnectorEntity
	 * 
	 * @$erpSyncConnectorEntityId		The identity of the ErpSyncConnectorEntity
	 */
	function DeleteErpSyncConnectorEntity($erpSyncConnectorEntityId)
	{
		$result = $this->sendRequest("DeleteErpSyncConnectorEntity", array("ErpSyncConnectorEntity"=>$erpSyncConnectorEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

	/** 
	 * Summary
	 * Get the current mappings for one connection/actor; connection+actor type = unique key
	 *
	 *@$erpConnectionId		The ERP connection ID
	 *@$actorType		The actor type
	 *
	 *@return: The current mapping from the database
	 */
	function GetActorTypeMapping($erpConnectionId, $actorType)
	{
		$result = $this->sendRequest("GetActorTypeMapping", array("ErpConnectionId"=>$erpConnectionId, "ActorType"=>$actorType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Link a crm entity to an erp entity
	 *
	 *@$erpConnectionId		The ERP connection ID
	 *@$crmRecordId		The ID of the CRM entity to connect to
	 *@$crmActorType		Identifies the CRM actor type corresponding to this CRM entity
	 *@$erpKey		The ERP entity identifier
	 *@$erpActorType		The ERP actor type
	 *
	 *@return: True if success
	 */
	function CreateActorLink($erpConnectionId, $crmRecordId, $crmActorType, $erpKey, $erpActorType)
	{
		$result = $this->sendRequest("CreateActorLink", array("ErpConnectionId"=>$erpConnectionId, "CrmRecordId"=>$crmRecordId, "CrmActorType"=>$crmActorType, "ErpKey"=>$erpKey, "ErpActorType"=>$erpActorType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Remove the link between a CRM entity and an ERP entity
	 *
	 *@$erpConnectionId		The ERP connection ID
	 *@$crmRecordId		The ID of the CRM entity to connect to
	 *@$crmActorType		Identifies the CRM actor type corresponding to this CRM entity
	 *
	 *@return: True if success
	 */
	function BreakActorLink($erpConnectionId, $crmRecordId, $crmActorType)
	{
		$result = $this->sendRequest("BreakActorLink", array("ErpConnectionId"=>$erpConnectionId, "CrmRecordId"=>$crmRecordId, "CrmActorType"=>$crmActorType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create ErpActor from crm entity
	 *
	 *@$connectionId		The connection ID
	 *@$crmEntityId		The ID of the CRM entity to create an ERP actor from
	 *@$erpActorType		The ERP actor type
	 *@$crmActorType		The CRM actor type
	 *@$erpFieldKeyValues		A map of matching erp field keys and values to set for the new erp entity
	 *
	 *@return: Created ERP actor with success
	 */
	function CreateErpActorFromCrm($connectionId, $crmEntityId, $erpActorType, $crmActorType, $erpFieldKeyValues)
	{
		$result = $this->sendRequest("CreateErpActorFromCrm", array("ConnectionId"=>$connectionId, "CrmEntityId"=>$crmEntityId, "ErpActorType"=>$erpActorType, "CrmActorType"=>$crmActorType, "ErpFieldKeyValues"=>$erpFieldKeyValues));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save mappings for a connection/actor
	 *
	 *@$mapping		The mapping to be saved; new mapping rows will be created in the database if needed
	 *
	 *@return: The current mapping from the database
	 */
	function SaveActorTypeMapping($mapping)
	{
		$result = $this->sendRequest("SaveActorTypeMapping", array("Mapping"=>$mapping));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Clear field info from table SUPERLISTCOLUMNSIZE if field mapping changed on given connection
	 *
	 *@$listOwner		GUI name used in archive control config
	 *@$erpConnectionId		The ERP connection ID
	 *
	 *@return: Validated ArchiveColumnConfig
	 */
	function ValidateArchiveColumnConfig($listOwner, $erpConnectionId)
	{
		$result = $this->sendRequest("ValidateArchiveColumnConfig", array("ListOwner"=>$listOwner, "ErpConnectionId"=>$erpConnectionId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Gets all supported actor types, and all fields for each actor type, and save this state to the CRM database
	 *
	 *@$erpConnectionId		The ERP connection ID
	 *
	 *@return: Success or fail
	 */
	function UpdateConnectionFields($erpConnectionId)
	{
		$result = $this->sendRequest("UpdateConnectionFields", array("ErpConnectionId"=>$erpConnectionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Retrieves the CrmActorType that are mapped to a specific ErpActorType for this connection
	 *
	 *@$erpConnectionId		The ERP connection ID
	 *@$erpActorType		The ERP actor type
	 *
	 *@return: The CrmActorType
	 */
	function GetCrmActorType($erpConnectionId, $erpActorType)
	{
		$result = $this->sendRequest("GetCrmActorType", array("ErpConnectionId"=>$erpConnectionId, "ErpActorType"=>$erpActorType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the current status of the Sync engine
	 *
	 *
	 *@return: The current status of the engine
	 */
	function GetEngineStatus()
	{
		$result = $this->sendRequest("GetEngineStatus", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Change the current running/stopped status of the Sync engine
	 *
	 *@$run		If true, then start the engine; otherwise stop it (requests to the Batch system, may not be immediately reflected)
	 *
	 *@return: The current status of the engine
	 */
	function ChangeEngineStatus($run)
	{
		$result = $this->sendRequest("ChangeEngineStatus", array("Run"=>$run));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Change the interval for each run of the Sync Engine
	 *
	 *@$interval		The run interval for the engine
	 *
	 *@return: 
	 */
	function ChangeEngineInterval($interval)
	{
		$result = $this->sendRequest("ChangeEngineInterval", array("Interval"=>$interval));	
		return $this->getResultFromResponse($result, true);
	}

	/**
	 * Summary
	 * Gets a ErpSyncConnectorEntity object.
	 * 
	 * @$erpSyncConnectorEntityId		The identifier of the ErpSyncConnectorEntity object
	 *
	 * @returns ErpSyncConnectorEntity
	 */ 
	function GetErpSyncConnectorEntity($erpSyncConnectorEntityId)
	{
		$result = $this->sendRequest("GetErpSyncConnectorEntity", array("ErpSyncConnectorEntityId"=>$erpSyncConnectorEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Can we delete the connector?
	 *
	 *@$erpSyncConnectorId		The ID of the ErpSync connector to check if can be deleted
	 *
	 *@return: Enum response says ok or what is wrong
	 */
	function CanDeleteErpSyncConnectorEntity($erpSyncConnectorId)
	{
		$result = $this->sendRequest("CanDeleteErpSyncConnectorEntity", array("ErpSyncConnectorId"=>$erpSyncConnectorId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Test if connector urls anwers
	 *
	 *@$url		The url to test connection on
	 *
	 *@return: Enum response says ok or what is wrong
	 */
	function TestConnectorUrl($url)
	{
		$result = $this->sendRequest("TestConnectorUrl", array("Url"=>$url));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a summary of the current ErpSync configuration/setup
	 *
	 *@$erpSyncConnectionId		The ID of the ErpSync connection for which information is sought
	 *
	 *@return: Summary of connection information, and one summary element per configured actor type
	 */
	function GetErpSyncConnectionSummary($erpSyncConnectionId)
	{
		$result = $this->sendRequest("GetErpSyncConnectionSummary", array("ErpSyncConnectionId"=>$erpSyncConnectionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save information about a default value for an ERP field
	 *
	 *@$erpSyncDefaultValue		The id of the ERPfield to save
	 *
	 *@return: The newly saved ErpSyncDefaultValue
	 */
	function SaveDefaultValueInfo($erpSyncDefaultValue)
	{
		$result = $this->sendRequest("SaveDefaultValueInfo", array("ErpSyncDefaultValue"=>$erpSyncDefaultValue));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get information about default value for an ERP field
	 *
	 *@$erpFieldId		The id of the ERP field
	 *
	 *@return: Object with information about default values
	 */
	function GetDefaultValueInfo($erpFieldId)
	{
		$result = $this->sendRequest("GetDefaultValueInfo", array("ErpFieldId"=>$erpFieldId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all connection statuses and fields for a given entity
	 *
	 *@$crmActorType		The type of the CRM entity
	 *@$entityId		The id of the entity
	 *
	 *@return: An array of ErpConnectionData carriers
	 */
	function GetConnectionsAndDisplayFields($crmActorType, $entityId)
	{
		$result = $this->sendRequest("GetConnectionsAndDisplayFields", array("CrmActorType"=>$crmActorType, "EntityId"=>$entityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the values for the specified fields from the ERP connection
	 *
	 *@$erpConnectionId		The id of the connection
	 *@$crmActorType		The type of the CRM entity
	 *@$entityId		The id of the entity
	 *@$fieldKeys		The fields for which you want to get the values
	 *
	 *@return: An array containing the values for the specified fields, in the same order
	 */
	function GetErpFieldValues($erpConnectionId, $crmActorType, $entityId, $fieldKeys)
	{
		$result = $this->sendRequest("GetErpFieldValues", array("ErpConnectionId"=>$erpConnectionId, "CrmActorType"=>$crmActorType, "EntityId"=>$entityId, "FieldKeys"=>$fieldKeys));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the fields that must be filled out when creating a new ERP actor
	 *
	 *@$erpConnectionId		The id of the connection
	 *@$erpActorType		The type of the ERP actor to create
	 *
	 *@return: The fields that are required for the new ERP actor
	 */
	function GetFieldsForNewErpActor($erpConnectionId, $erpActorType)
	{
		$result = $this->sendRequest("GetFieldsForNewErpActor", array("ErpConnectionId"=>$erpConnectionId, "ErpActorType"=>$erpActorType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the specified connection.
	 *
	 *@$erpConnectionId		Primary key of the connection
	 *
	 *@return: The connection
	 */
	function GetConnection($erpConnectionId)
	{
		$result = $this->sendRequest("GetConnection", array("ErpConnectionId"=>$erpConnectionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves a connection to the database.
	 *
	 *@$connection		The connection to save.
	 *
	 *@return: The resulting connection.
	 */
	function SaveConnection($connection)
	{
		$result = $this->sendRequest("SaveConnection", array("Connection"=>$connection));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes a connection from the database.
	 *
	 *@$erpConnectionId		Primary key of the connection
	 *
	 *@return: A void return
	 */
	function DeleteConnection($erpConnectionId)
	{
		$result = $this->sendRequest("DeleteConnection", array("ErpConnectionId"=>$erpConnectionId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns all fields needed to connect to the given connector
	 *
	 *@$erpConnectorId		The id of the erp connector
	 *
	 *@return: The fields
	 */
	function GetConfigurationFields($erpConnectorId)
	{
		$result = $this->sendRequest("GetConfigurationFields", array("ErpConnectorId"=>$erpConnectorId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the config fields for the connection.
	 *
	 *@$erpConnectionId		Primary key of the erp connection
	 *
	 *@return: Config Fields
	 */
	function GetErpConnectionConfigFields($erpConnectionId)
	{
		$result = $this->sendRequest("GetErpConnectionConfigFields", array("ErpConnectionId"=>$erpConnectionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Toggles the Active state of the connection
	 *
	 *@$erpConnectionId		Primary key of the erp connection
	 *
	 *@return: Contains the reason for why the toggle failed. Empty if operation was successful
	 */
	function ToggleErpConnectionActive($erpConnectionId)
	{
		$result = $this->sendRequest("ToggleErpConnectionActive", array("ErpConnectionId"=>$erpConnectionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Tests to see if we can establish a connection with the given config fields
	 *
	 *@$erpConnectionId		The id of the connection
	 *
	 *@return: Returns true if success
	 */
	function TestConnectionById($erpConnectionId)
	{
		$result = $this->sendRequest("TestConnectionById", array("ErpConnectionId"=>$erpConnectionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Tests to see if the given connection has a valid connection to its connector
	 *
	 *@$erpConnectionId		The id of the connector we try to connect to
	 *@$configFields		The config fields used to test connection
	 *
	 *@return: Returns true if success
	 */
	function TestConnectionByConfig($erpConnectionId, $configFields)
	{
		$result = $this->sendRequest("TestConnectionByConfig", array("ErpConnectionId"=>$erpConnectionId, "ConfigFields"=>$configFields));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Takes an array of the ErpConnection ids and saves these as ordered sync priorities
	 *
	 *@$erpConnectionIds		The id put in array in the same order as the priorities
	 *
	 *@return: Returns true if new sync priorities is saved
	 */
	function SaveErpConnectionSyncPriorities($erpConnectionIds)
	{
		$result = $this->sendRequest("SaveErpConnectionSyncPriorities", array("ErpConnectionIds"=>$erpConnectionIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Moves the rank of the erp field up or down
	 *
	 *@$erpFieldId		The id of the erp field to move
	 *@$direction		Positive value to increase rank, negative to decrease.
	 *@$erpConnectionId		The id of the connection
	 *@$erpActorType		The actor type for which we want to rank fields
	 *
	 *@return: 
	 */
	function MoveErpFieldItem($erpFieldId, $direction, $erpConnectionId, $erpActorType)
	{
		$result = $this->sendRequest("MoveErpFieldItem", array("ErpFieldId"=>$erpFieldId, "Direction"=>$direction, "ErpConnectionId"=>$erpConnectionId, "ErpActorType"=>$erpActorType));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Indicates if the connection supports advanced search for the given erp actor
	 *
	 *@$erpConnectionId		Ths id of the connection
	 *@$erpActorType		The erp actor type to check for
	 *
	 *@return: True if advanced search is supported
	 */
	function SupportsAdvancedSearch($erpConnectionId, $erpActorType)
	{
		$result = $this->sendRequest("SupportsAdvancedSearch", array("ErpConnectionId"=>$erpConnectionId, "ErpActorType"=>$erpActorType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a link between Erp and Crm and set default values
	 *
	 *@$erpConnectionId		ErpConnectionId
	 *@$crmRecordId		CrmRecordId
	 *@$crmActorType		The Crm Actor type
	 *@$erpKey		
	 *@$erpActorType		The Erp Actor type
	 *@$fieldValues		The Crm Fields
	 *
	 *@return: 
	 */
	function ConnectActor($erpConnectionId, $crmRecordId, $crmActorType, $erpKey, $erpActorType, $fieldValues)
	{
		$result = $this->sendRequest("ConnectActor", array("ErpConnectionId"=>$erpConnectionId, "CrmRecordId"=>$crmRecordId, "CrmActorType"=>$crmActorType, "ErpKey"=>$erpKey, "ErpActorType"=>$erpActorType, "FieldValues"=>$fieldValues));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get Crm Field values
	 *
	 *@$recordId		The id of the CRM entity
	 *@$actorTypeCrm		CRM Actor type
	 *
	 *@return: The Crm Fields
	 */
	function GetFieldValuesFromCrm($recordId, $actorTypeCrm)
	{
		$result = $this->sendRequest("GetFieldValuesFromCrm", array("RecordId"=>$recordId, "ActorTypeCrm"=>$actorTypeCrm));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get Erp Field values
	 *
	 *@$erpConnectionId		Erp connection id
	 *@$actorTypeErp		ERP Actor type
	 *@$erpKey		Primary key for the erp actor
	 *
	 *@return: The Erp Fields
	 */
	function GetFieldValuesFromErp($erpConnectionId, $actorTypeErp, $erpKey)
	{
		$result = $this->sendRequest("GetFieldValuesFromErp", array("ErpConnectionId"=>$erpConnectionId, "ActorTypeErp"=>$actorTypeErp, "ErpKey"=>$erpKey));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Sync all active connections
	 *
	 *
	 *@return: The response
	 */
	function SyncAll()
	{
		$result = $this->sendRequest("SyncAll", array());	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

