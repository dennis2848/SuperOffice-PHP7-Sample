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

		
class SoConfigurationAgent extends SoAgent
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
        parent::__construct($endpoint."Configuration.svc", "WcfConfiguration.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new DiaryViewEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New DiaryViewEntity with default values
     */
     function CreateDefaultDiaryViewEntity()
     {
		$result = $this->sendRequest("CreateDefaultDiaryViewEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing DiaryViewEntity or creates a new DiaryViewEntity if the id parameter is empty
     * 
     * @return New or updated DiaryViewEntity
     */
	function SaveDiaryViewEntity($diaryViewEntity)
	{
		$result = $this->sendRequest("SaveDiaryViewEntity", array("DiaryViewEntity"=>$diaryViewEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the DiaryViewEntity
	 * 
	 * @$diaryViewEntityId		The identity of the DiaryViewEntity
	 */
	function DeleteDiaryViewEntity($diaryViewEntityId)
	{
		$result = $this->sendRequest("DeleteDiaryViewEntity", array("DiaryViewEntity"=>$diaryViewEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

    /**
     * Loading default values into a new SystemEventEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New SystemEventEntity with default values
     */
     function CreateDefaultSystemEventEntity()
     {
		$result = $this->sendRequest("CreateDefaultSystemEventEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing SystemEventEntity or creates a new SystemEventEntity if the id parameter is empty
     * 
     * @return New or updated SystemEventEntity
     */
	function SaveSystemEventEntity($systemEventEntity)
	{
		$result = $this->sendRequest("SaveSystemEventEntity", array("SystemEventEntity"=>$systemEventEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the SystemEventEntity
	 * 
	 * @$systemEventEntityId		The identity of the SystemEventEntity
	 */
	function DeleteSystemEventEntity($systemEventEntityId)
	{
		$result = $this->sendRequest("DeleteSystemEventEntity", array("SystemEventEntity"=>$systemEventEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

	/** 
	 * Summary
	 * Return the application configuration. This is a list of pages, with information about the name, main panel and preference mappings of each page.
	 *
	 *@$application		The application name, for instance 'SixWeb'
	 *@$instance		The instance name for the application, like 'MainInstance'
	 *
	 *@return: XML structure containing the application configuration
	 */
	function GetApplicationConfiguration($application, $instance)
	{
		$result = $this->sendRequest("GetApplicationConfiguration", array("Application"=>$application, "Instance"=>$instance));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the configuration for one whole web page, including all its panels etc.  totally asynchronous items like menus are not included, but all references are resolved and all special processing is applied.
	 *
	 *@$application		The application name, for instance 'SixWeb
	 *@$instance		The instance name for the application, like 'MainInstance'
	 *@$page		Page name, must correspond to one of the pages in the Application Configuration
	 *
	 *@return: XML containing the configuration for the given page, from the page down to the control level.
	 */
	function GetPageConfiguration($application, $instance, $page)
	{
		$result = $this->sendRequest("GetPageConfiguration", array("Application"=>$application, "Instance"=>$instance, "Page"=>$page));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the object mappings, i.e., the what code objects should be instantiated to handle the entities of the client configuration.
	 *
	 *@$application		The application name, for instance 'SixWeb'
	 *@$instance		The instance name for the application, like 'MainInstance'
	 *
	 *@return: XML containing the object mappings, including assembly and class names
	 */
	function GetObjectMapping($application, $instance)
	{
		$result = $this->sendRequest("GetObjectMapping", array("Application"=>$application, "Instance"=>$instance));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the list of filters to be used for processing the configuration data for this application.
	 *
	 *@$application		The application name, for instance 'SixWeb'
	 *@$instance		The instance name for the application, like 'MainInstance'
	 *
	 *@return: XML representing the list of filters and any configuration data they may need.
	 */
	function GetFilterList($application, $instance)
	{
		$result = $this->sendRequest("GetFilterList", array("Application"=>$application, "Instance"=>$instance));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Configuration XML's may be expensive to build and parse, and are therefore cached to the database. <para/>Cahcing is per application/instance/associate, and can be turned off through the config file. <para/>If caching is on, and the configuration is changed, it is necessary to clear the cached configurations from the database, through this call.<para/>Note that changes to the externalapplication table require cache invalidation. SoAdmin will do so automatically.
	 *
	 *@$application		The application name, for instance 'SixWeb'
	 *@$instance		The instance name for the application, like 'MainInstance'
	 *@$forAllAssociates		If false, only the current associate's configuration is cleared. If true, configurations are cleared for all associates.
	 *
	 *@return: There is no return value.
	 */
	function ClearConfigurationCache($application, $instance, $forAllAssociates)
	{
		$result = $this->sendRequest("ClearConfigurationCache", array("Application"=>$application, "Instance"=>$instance, "ForAllAssociates"=>$forAllAssociates));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get one defined configuration fragment, with full reference resolution and parsing applied. This is essentially the same service as the GetPageConfiguration, except that this service is not locked to objects of type Page.
	 *
	 *@$application		The application name, for instance Six.Web
	 *@$instance		The instance name, for instance Main
	 *@$item		The configuration item name (first component of file name)
	 *@$type		The configuration item type (second component of file name)
	 *
	 *@return: Fully resolved and parsed configuration XML, as string.
	 */
	function GetAnyConfiguration($application, $instance, $item, $type)
	{
		$result = $this->sendRequest("GetAnyConfiguration", array("Application"=>$application, "Instance"=>$instance, "Item"=>$item, "Type"=>$type));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$language		
	 *
	 *@return: 
	 */
	function GetEMarketingUrl($language)
	{
		$result = $this->sendRequest("GetEMarketingUrl", array("Language"=>$language));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * This method will convert a module name into a CS URL.
	 *
	 *@$language		By setting this parameter, you can change the CS language for the current user.
	 *@$programName		In this parameter you must specify which CS program you want to create an URL for. Valid examples are "ticket", "rms", "spm" etc.
	 *@$action		Here you can optionally specify the action for the current program. This will enable you to go to a specific screen.
	 *@$extraParameters		If an action is specified, you can specify extra parameters here. This can be used to set specific behaviour for the chosen screen/action. If an empty action is supplied, this parameter will be ignored.
	 *
	 *@return: Returns a valid CS URL composed of the give parameters.
	 */
	function GetCsProgramUrl($language, $programName, $action, $extraParameters)
	{
		$result = $this->sendRequest("GetCsProgramUrl", array("Language"=>$language, "ProgramName"=>$programName, "Action"=>$action, "ExtraParameters"=>$extraParameters));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Will generate an url to the emarketing module
	 *
	 *@$language		By setting this parameter, you can change the CS language for the current user.
	 *@$programName		In this parameter you must specify which CS program you want to create an URL for. Valid examples are "ticket", "rms", "spm" etc.
	 *@$action		Here you can optionally specify the action for the current program. This will enable you to go to a specific screen.
	 *@$extraParameters		If an action is specified, you can specify extra parameters here. This can be used to set specific behaviour for the chosen screen/action. If an empty action is supplied, this parameter will be ignored.
	 *
	 *@return: Returns a valid CS URL composed of the give parameters.
	 */
	function GetCSAuthUrl($language, $programName, $action, $extraParameters)
	{
		$result = $this->sendRequest("GetCSAuthUrl", array("Language"=>$language, "ProgramName"=>$programName, "Action"=>$action, "ExtraParameters"=>$extraParameters));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the configuration for one whole web page, including all its panels etc.  totally asynchronous items like menus are not included, but all references are resolved and all special processing is applied. Does not use cache for fetching, but updates the cache with refreshed configuration.
	 *
	 *@$application		The application name, for instance 'SixWeb
	 *@$instance		The instance name for the application, like 'MainInstance'
	 *@$page		Page name, must correspond to one of the pages in the Application Configuration
	 *
	 *@return: XML containing the configuration for the given page, from the page down to the control level.
	 */
	function GetRefreshedPageConfiguration($application, $instance, $page)
	{
		$result = $this->sendRequest("GetRefreshedPageConfiguration", array("Application"=>$application, "Instance"=>$instance, "Page"=>$page));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a DiaryViewEntity object.
	 * 
	 * @$diaryViewEntityId		The identifier of the DiaryViewEntity object
	 *
	 * @returns DiaryViewEntity
	 */ 
	function GetDiaryViewEntity($diaryViewEntityId)
	{
		$result = $this->sendRequest("GetDiaryViewEntity", array("DiaryViewEntityId"=>$diaryViewEntityId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a WindowPosSize object.
	 * 
	 * @$windowPosSizeId		The identifier of the WindowPosSize object
	 *
	 * @returns WindowPosSize
	 */ 
	function GetWindowPosSize($windowPosSizeId)
	{
		$result = $this->sendRequest("GetWindowPosSize", array("WindowPosSizeId"=>$windowPosSizeId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves a window and dialog position and size setting.
	 *
	 *@$windowPosSize		The item that is saved
	 *
	 *@return: The saved item
	 */
	function SaveWindowPosSize($windowPosSize)
	{
		$result = $this->sendRequest("SaveWindowPosSize", array("WindowPosSize"=>$windowPosSize));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes a window and dialog position and size setting.
	 *
	 *@$windowPosSizeId		Id of the window and dialog position and size settings item.
	 *
	 *@return: 
	 */
	function DeleteWindowPosSize($windowPosSizeId)
	{
		$result = $this->sendRequest("DeleteWindowPosSize", array("WindowPosSizeId"=>$windowPosSizeId));	
		return $this->getResultFromResponse($result, true);
	}

	/**
	 * Summary
	 * Gets an array of WindowPosSize objects.
	 * 
	 * @$windowPosSizeIds		The identifiers of the WindowPosSize object
	 *
	 * @returns Array of WindowPosSize objects
	 */ 
	function GetWindowPosSizeList($windowPosSizeIds)
	{
		$result = $this->sendRequest("GetWindowPosSizeList", array("WindowPosSizeIds"=>$windowPosSizeIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the window and dialog position and size settings belonging to the currently logged on user
	 *
	 *
	 *@return: Array of window and dialog position and size settings
	 */
	function GetMyWindowPosSizes()
	{
		$result = $this->sendRequest("GetMyWindowPosSizes", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the window and dialog position and size settings belonging to the specified person
	 *
	 *@$personId		Person id of the associate owning these window settings
	 *
	 *@return: Array of window and dialog position and size settings
	 */
	function GetWindowPosSizesOnPersonId($personId)
	{
		$result = $this->sendRequest("GetWindowPosSizesOnPersonId", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the window and dialog position and size settings belonging to the specified associate
	 *
	 *@$associateId		Associate id of the Associate/Person owning these window settings
	 *
	 *@return: Array of window and dialog position and size settings
	 */
	function GetWindowPosSizesOnAssociateId($associateId)
	{
		$result = $this->sendRequest("GetWindowPosSizesOnAssociateId", array("AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves a set of window and dialog position and size settings.
	 *
	 *@$windowPosSizes		The items that are saved
	 *
	 *@return: The saved items
	 */
	function SaveWindowPosSizes($windowPosSizes)
	{
		$result = $this->sendRequest("SaveWindowPosSizes", array("WindowPosSizes"=>$windowPosSizes));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a SystemEventEntity object.
	 * 
	 * @$systemEventEntityId		The identifier of the SystemEventEntity object
	 *
	 * @returns SystemEventEntity
	 */ 
	function GetSystemEventEntity($systemEventEntityId)
	{
		$result = $this->sendRequest("GetSystemEventEntity", array("SystemEventEntityId"=>$systemEventEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Is there a system event with the given key?
	 *
	 *@$key		The key to match on
	 *
	 *@return: The system event
	 */
	function ExistsSystemEvent($key)
	{
		$result = $this->sendRequest("ExistsSystemEvent", array("Key"=>$key));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

