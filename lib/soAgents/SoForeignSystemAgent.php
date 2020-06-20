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

		
class SoForeignSystemAgent extends SoAgent
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
        parent::__construct($endpoint."ForeignSystem.svc", "WcfForeignSystem.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new ForeignAppEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ForeignAppEntity with default values
     */
     function CreateDefaultForeignAppEntity()
     {
		$result = $this->sendRequest("CreateDefaultForeignAppEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing ForeignAppEntity or creates a new ForeignAppEntity if the id parameter is empty
     * 
     * @return New or updated ForeignAppEntity
     */
	function SaveForeignAppEntity($foreignAppEntity)
	{
		$result = $this->sendRequest("SaveForeignAppEntity", array("ForeignAppEntity"=>$foreignAppEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the ForeignAppEntity
	 * 
	 * @$foreignAppEntityId		The identity of the ForeignAppEntity
	 */
	function DeleteForeignAppEntity($foreignAppEntityId)
	{
		$result = $this->sendRequest("DeleteForeignAppEntity", array("ForeignAppEntity"=>$foreignAppEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

	/**
	 * Summary
	 * Gets a ForeignAppEntity object.
	 * 
	 * @$foreignAppEntityId		The identifier of the ForeignAppEntity object
	 *
	 * @returns ForeignAppEntity
	 */ 
	function GetForeignAppEntity($foreignAppEntityId)
	{
		$result = $this->sendRequest("GetForeignAppEntity", array("ForeignAppEntityId"=>$foreignAppEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the ForeignApp with the given name.
	 *
	 *@$applicationName		The name of the foreign application.
	 *
	 *@return: The ForeignApp that matches the name.
	 */
	function GetAppByName($applicationName)
	{
		$result = $this->sendRequest("GetAppByName", array("ApplicationName"=>$applicationName));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ForeignDevice object.
	 * 
	 * @$foreignDeviceId		The identifier of the ForeignDevice object
	 *
	 * @returns ForeignDevice
	 */ 
	function GetForeignDevice($foreignDeviceId)
	{
		$result = $this->sendRequest("GetForeignDevice", array("ForeignDeviceId"=>$foreignDeviceId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets a ForeignDevice with deviceName that belongs to the application with applicationName.
	 *
	 *@$applicationName		The name of the foreign application.
	 *@$deviceName		The name of the foreign device.
	 *
	 *@return: The ForeignDevice.
	 */
	function GetDeviceByName($applicationName, $deviceName)
	{
		$result = $this->sendRequest("GetDeviceByName", array("ApplicationName"=>$applicationName, "DeviceName"=>$deviceName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets a ForeignDevice with deviceName and deviceIdentifier that belongs to the application with applicationName.
	 *
	 *@$applicationName		The name of the foreign application.
	 *@$deviceName		The name of the foreign device.
	 *@$deviceIdentifier		Optional unique id of device (Palm pilot device ID, version number, etc)
	 *
	 *@return: The ForeignDevice.
	 */
	function GetDeviceByIdentifier($applicationName, $deviceName, $deviceIdentifier)
	{
		$result = $this->sendRequest("GetDeviceByIdentifier", array("ApplicationName"=>$applicationName, "DeviceName"=>$deviceName, "DeviceIdentifier"=>$deviceIdentifier));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves a foreign device for an foreign application
	 *
	 *@$foreignDevice		Foreign device to save
	 *@$applicationName		The name of the foreign application.
	 *
	 *@return: Returns the saved foreign device
	 */
	function SaveForeignDevice($foreignDevice, $applicationName)
	{
		$result = $this->sendRequest("SaveForeignDevice", array("ForeignDevice"=>$foreignDevice, "ApplicationName"=>$applicationName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes a foreign device from an application
	 *
	 *@$foreignDevice		foreign device to delete
	 *@$applicationName		Name of application to delete from
	 *
	 *@return: 
	 */
	function DeleteForeignDevice($foreignDevice, $applicationName)
	{
		$result = $this->sendRequest("DeleteForeignDevice", array("ForeignDevice"=>$foreignDevice, "ApplicationName"=>$applicationName));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Gets all devices that belong to a foreign application.
	 *
	 *@$applicationName		The foreign application name
	 *
	 *@return: Array of ForeignDevices
	 */
	function GetApplicationDevices($applicationName)
	{
		$result = $this->sendRequest("GetApplicationDevices", array("ApplicationName"=>$applicationName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returning a foreign key by its key name, that belongs to the specified device and application. A table name and record ID can also be specified.
	 *
	 *@$applicationName		The name of the foreign application.
	 *@$deviceName		The name of the foreign device.
	 *@$keyName		The name of the foreign key.
	 *@$tableName		Table name, transformed to and from numeric table id by the service layer.<p/>Use an empty string to indicate that your key is not bound to any specific table.
	 *@$recordId		Id of record that this key refers to. If the table name was blank, then this parameter must be 0. It can also be 0 to mean that the foreign key record was not bound to any particular record of the target table.
	 *
	 *@return: The ForeignKey.
	 */
	function GetKey($applicationName, $deviceName, $keyName, $tableName, $recordId)
	{
		$result = $this->sendRequest("GetKey", array("ApplicationName"=>$applicationName, "DeviceName"=>$deviceName, "KeyName"=>$keyName, "TableName"=>$tableName, "RecordId"=>$recordId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the string value of a ForeignKey, that belongs to the specified device and application. A table name and record ID can also be specified.
	 *
	 *@$applicationName		The name of the foreign application.
	 *@$deviceName		The name of the foreign device.
	 *@$keyName		The name of the foreign key.
	 *@$tableName		Table name, transformed to and from numeric table id by the service layer.<p/>Use an empty string to indicate that your key is not bound to any specific table.
	 *@$recordId		Id of record that this key refers to. If the table name was blank, then this parameter must be 0. It can also be 0 to mean that the foreign key record was not bound to any particular record of the target table.
	 *
	 *@return: The ForeignKey value as string.
	 */
	function GetKeyValue($applicationName, $deviceName, $keyName, $tableName, $recordId)
	{
		$result = $this->sendRequest("GetKeyValue", array("ApplicationName"=>$applicationName, "DeviceName"=>$deviceName, "KeyName"=>$keyName, "TableName"=>$tableName, "RecordId"=>$recordId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returning a foreign key by its key name and device identifier, that belongs to the specified device and application. A table name and record ID can also be specified.
	 *
	 *@$applicationName		The name of the foreign application.
	 *@$deviceName		The name of the foreign device.
	 *@$deviceIdentifier		The device identifier.
	 *@$keyName		The name of the foreign key.
	 *@$tableName		Table name, transformed to and from numeric table id by the service layer.<p/>Use an empty string to indicate that your key is not bound to any specific table.
	 *@$recordId		Id of record that this key refers to. If the table name was blank, then this parameter must be 0. It can also be 0 to mean that the foreign key record was not bound to any particular record of the target table.
	 *
	 *@return: The ForeignKey.
	 */
	function GetKeyOnDeviceIdentifier($applicationName, $deviceName, $deviceIdentifier, $keyName, $tableName, $recordId)
	{
		$result = $this->sendRequest("GetKeyOnDeviceIdentifier", array("ApplicationName"=>$applicationName, "DeviceName"=>$deviceName, "DeviceIdentifier"=>$deviceIdentifier, "KeyName"=>$keyName, "TableName"=>$tableName, "RecordId"=>$recordId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returning a foreign key string value by its key name and device identifier, that belongs to the specified device and application. A table name and record ID can also be specified.
	 *
	 *@$applicationName		The name of the foreign application.
	 *@$deviceName		The name of the foreign device.
	 *@$deviceIdentifier		The device identifier.
	 *@$keyName		The name of the foreign key.
	 *@$tableName		Table name, transformed to and from numeric table id by the service layer.<p/>Use an empty string to indicate that your key is not bound to any specific table.
	 *@$recordId		Id of record that this key refers to. If the table name was blank, then this parameter must be 0. It can also be 0 to mean that the foreign key record was not bound to any particular record of the target table.
	 *
	 *@return: The ForeignKey's string value.
	 */
	function GetKeyValueOnDeviceIdentifier($applicationName, $deviceName, $deviceIdentifier, $keyName, $tableName, $recordId)
	{
		$result = $this->sendRequest("GetKeyValueOnDeviceIdentifier", array("ApplicationName"=>$applicationName, "DeviceName"=>$deviceName, "DeviceIdentifier"=>$deviceIdentifier, "KeyName"=>$keyName, "TableName"=>$tableName, "RecordId"=>$recordId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves a key belonging to the ForeignApp and ForeignDevice specified.
	 *
	 *@$foreignKey		Foreign key to save
	 *@$applicationName		
	 *@$deviceName		The name of the foreign device.
	 *@$deviceIdentifier		The device identifier. Optional if device identifier is not used.
	 *
	 *@return: The new or updated ForeignKey
	 */
	function SaveForeignKey($foreignKey, $applicationName, $deviceName, $deviceIdentifier)
	{
		$result = $this->sendRequest("SaveForeignKey", array("ForeignKey"=>$foreignKey, "ApplicationName"=>$applicationName, "DeviceName"=>$deviceName, "DeviceIdentifier"=>$deviceIdentifier));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes all specified occurrences of a key, belonging to the ForeignApp and ForeignDevice, table and record specified. Specifying a blank table name will delete ALL keys of the given name; specifying a recordId of 0 will delete ALL keys of the given name for the given table.
	 *
	 *@$foreignKey		
	 *@$applicationName		The name of the foreign application.
	 *@$deviceName		The name of the foreign device.
	 *@$deviceIdentifier		The device identifier. Optional if device identifier is not used.
	 *@$tableName		Table name, transformed to and from numeric table id by the service layer.<p/>Use an empty string to delete ALL keys that otherwise match; this may be dangerous and can take a long time if there are many items to delete.
	 *@$recordId		Id of record that this key refers to. If the table name was blank, then this parameter must be 0. It can also be 0 to mean that the foreign key record was not bound to any particular record of the target table.<p/>Specifying a zero recordId will remove the recordId restriction and delete all keys that otherwise match.
	 *
	 *@return: 
	 */
	function DeleteForeignKey($foreignKey, $applicationName, $deviceName, $deviceIdentifier, $tableName, $recordId)
	{
		$result = $this->sendRequest("DeleteForeignKey", array("ForeignKey"=>$foreignKey, "ApplicationName"=>$applicationName, "DeviceName"=>$deviceName, "DeviceIdentifier"=>$deviceIdentifier, "TableName"=>$tableName, "RecordId"=>$recordId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get a foreignkey based on its name and value, that belongs to the specified device and application.
	 *
	 *@$applicationName		The name of the foreign application.
	 *@$deviceName		The name of the foreign device.
	 *@$keyName		The name of the foreign key.
	 *@$keyValue		Foreignkey value
	 *@$tableName		Table name, transformed to and from numeric table id by the service layer.<p/>Use an empty string to indicate that your key is not bound to any specific table.
	 *
	 *@return: The ForeignKey.
	 */
	function GetKeyByValue($applicationName, $deviceName, $keyName, $keyValue, $tableName)
	{
		$result = $this->sendRequest("GetKeyByValue", array("ApplicationName"=>$applicationName, "DeviceName"=>$deviceName, "KeyName"=>$keyName, "KeyValue"=>$keyValue, "TableName"=>$tableName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all ForeignKeys that belong to a device.
	 *
	 *@$applicationName		The name of the foreign application.
	 *@$deviceName		The name of the foreign device.
	 *
	 *@return: Array of all ForeignKeys in the ForeignDevice.
	 */
	function GetDeviceKeys($applicationName, $deviceName)
	{
		$result = $this->sendRequest("GetDeviceKeys", array("ApplicationName"=>$applicationName, "DeviceName"=>$deviceName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all ForeignKeys that belong to an application.
	 *
	 *@$applicationName		The name of the foreign application.
	 *
	 *@return: Array of all ForeignKeys in the ForeignApp.
	 */
	function GetApplicationKeys($applicationName)
	{
		$result = $this->sendRequest("GetApplicationKeys", array("ApplicationName"=>$applicationName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all ForeignKeys that belong to a device with a given deviceIdentifier.
	 *
	 *@$applicationName		The name of the foreign application.
	 *@$deviceName		The name of the foreign device.
	 *@$deviceIdentifier		Identifier for a unique grouping of keys within a device.
	 *
	 *@return: Array of all ForeignKeys in the ForeignDevice that belong to the DeviceIdentifier.
	 */
	function GetDeviceKeysOnDeviceIdentifier($applicationName, $deviceName, $deviceIdentifier)
	{
		$result = $this->sendRequest("GetDeviceKeysOnDeviceIdentifier", array("ApplicationName"=>$applicationName, "DeviceName"=>$deviceName, "DeviceIdentifier"=>$deviceIdentifier));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all ForeignKeys that belong to a device with a given deviceIdentifier and table name.
	 *
	 *@$applicationName		The name of the foreign application.
	 *@$deviceName		The name of the foreign device.
	 *@$deviceIdentifier		Identifier for a unique grouping of keys within a device.
	 *@$tableName		Table name, transformed to and from numeric table id by the service layer.<p/>Use an empty string to indicate that your key is not bound to any specific table.
	 *
	 *@return: Array of all ForeignKeys in the ForeignDevice that belong to the DeviceIdentifier.
	 */
	function GetDeviceKeysOnDeviceIdentifierTable($applicationName, $deviceName, $deviceIdentifier, $tableName)
	{
		$result = $this->sendRequest("GetDeviceKeysOnDeviceIdentifierTable", array("ApplicationName"=>$applicationName, "DeviceName"=>$deviceName, "DeviceIdentifier"=>$deviceIdentifier, "TableName"=>$tableName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all ForeignKeys that belong to a device with a given deviceIdentifier and table name, as well as record id.
	 *
	 *@$applicationName		The name of the foreign application.
	 *@$deviceName		The name of the foreign device.
	 *@$deviceIdentifier		Identifier for a unique grouping of keys within a device.
	 *@$tableName		Table name, transformed to and from numeric table id by the service layer.<p/>Use an empty string to indicate that your key is not bound to any specific table.
	 *@$recordId		Id of record that this key refers to. If the table name was blank, then this parameter must be 0. It can also be 0 to mean that the foreign key record was not bound to any particular record of the target table.
	 *
	 *@return: Array of all ForeignKeys in the ForeignDevice that match the criteria
	 */
	function GetDeviceKeysOnDeviceIdentifierTableRecordId($applicationName, $deviceName, $deviceIdentifier, $tableName, $recordId)
	{
		$result = $this->sendRequest("GetDeviceKeysOnDeviceIdentifierTableRecordId", array("ApplicationName"=>$applicationName, "DeviceName"=>$deviceName, "DeviceIdentifier"=>$deviceIdentifier, "TableName"=>$tableName, "RecordId"=>$recordId));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

