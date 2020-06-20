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

		
class SoArchiveAgent extends SoAgent
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
        parent::__construct($endpoint."Archive.svc", "WcfArchive.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new ArchiveListResult.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ArchiveListResult with default values
     */
     function CreateDefaultArchiveListResult()
     {
		$result = $this->sendRequest("CreateDefaultArchiveListResult", array());
		return $this->getResultFromResponse($result);
     }
        

	/** 
	 * Summary
	 * Get activity filter for the specified list.
	 *
	 *
	 *@return: The activity filter for the specified list
	 */
	function GetActivityFilter()
	{
		$result = $this->sendRequest("GetActivityFilter", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Set activity filter for the specified list.
	 *
	 *@$activityFilter		New activity filter
	 *
	 *@return: 
	 */
	function SetActivityFilter($activityFilter)
	{
		$result = $this->sendRequest("SetActivityFilter", array("ActivityFilter"=>$activityFilter));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns the  associate ids that belongs to the given groups
	 *
	 *@$groupIds		Array of group ids
	 *
	 *@return: Array of associate ids
	 */
	function GetGroupAssociateIds($groupIds)
	{
		$result = $this->sendRequest("GetGroupAssociateIds", array("GroupIds"=>$groupIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the configuration for one archive. The configuration is keyed by a combination of archive provider name and gui name. The archive provider name must match an archive provider plugin; the gui name is an arbitrary string used to distinguish multiple occurrences of the same underlying provider in a gui.
	 *
	 *@$guiName		String that identifies the archive in the GUI, must be the same when fetching and storing configurations, but does not otherwise have to match anything.
	 *@$providerName		Name of archive provider, must match one of the plugins known to the ArchiveProviderFactory.
	 *
	 *@return: Archive configuration consisting of column information, orderby information and entities
	 */
	function GetArchiveConfiguration($guiName, $providerName)
	{
		$result = $this->sendRequest("GetArchiveConfiguration", array("GuiName"=>$guiName, "ProviderName"=>$providerName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the configuration for one archive, with context parameter. The configuration is keyed by a combination of archive provider name and gui name. The archive provider name must match an archive provider plugin; the gui name is an arbitrary string used to distinguish multiple occurrences of the same underlying provider in a gui.
	 *
	 *@$guiName		String that identifies the archive in the GUI, must be the same when fetching and storing configurations, but does not otherwise have to match anything.
	 *@$providerName		Name of archive provider, must match one of the plugins known to the ArchiveProviderFactory.
	 *@$context		Context parameter, url-encoded string context parameter for ArchiveProvider constructor
	 *
	 *@return: Archive configuration consisting of column information, orderby information and entities
	 */
	function GetArchiveConfigurationWithContext($guiName, $providerName, $context)
	{
		$result = $this->sendRequest("GetArchiveConfigurationWithContext", array("GuiName"=>$guiName, "ProviderName"=>$providerName, "Context"=>$context));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Set the column widths for the given set of columns and GUI name. 
	 *
	 *@$guiName		String that identifies the archive in the GUI, must be the same when fetching and storing configurations, but does not otherwise have to match anything.
	 *@$columnWidths		Array of column widths. A column width is specified either as a fixed number of character (10c) or as a percentage (10%). Percentages will be recalculated so that they add up to exactly 100 when the configuration is fetched again.
	 *
	 *@return: 
	 */
	function SetColumnWidths($guiName, $columnWidths)
	{
		$result = $this->sendRequest("SetColumnWidths", array("GuiName"=>$guiName, "ColumnWidths"=>$columnWidths));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Set the currently chosen entities for the given gui name/provider name combination. This service corresponds to the SetSelected method of the SelectableMDOList service, for a list called archiveEntities: plus the archive provider name and gui name as its additionalInfo.
	 *
	 *@$guiName		String that identifies the archive in the GUI, must be the same when fetching and storing configurations, but does not otherwise have to match anything.
	 *@$providerName		Name of archive provider, must match one of the plugins known to the ArchiveProviderFactory.
	 *@$entities		Array of entity names
	 *
	 *@return: 
	 */
	function SetChosenEntities($guiName, $providerName, $entities)
	{
		$result = $this->sendRequest("SetChosenEntities", array("GuiName"=>$guiName, "ProviderName"=>$providerName, "Entities"=>$entities));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Set the currently chosen columns for the given gui name/provider name combination. This service corresponds to the SetSelected method of the SelectableMDOList service, for a list called archiveColumns: plus the archive provider name and gui name as its additionalInfo.
	 *
	 *@$guiName		String that identifies the archive in the GUI, must be the same when fetching and storing configurations, but does not otherwise have to match anything.
	 *@$providerName		Name of archive provider, must match one of the plugins known to the ArchiveProviderFactory.
	 *@$chosenColumns		Array of column names, where array order indicates left to right order in the archive.
	 *
	 *@return: 
	 */
	function SetChosenColumns($guiName, $providerName, $chosenColumns)
	{
		$result = $this->sendRequest("SetChosenColumns", array("GuiName"=>$guiName, "ProviderName"=>$providerName, "ChosenColumns"=>$chosenColumns));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get a page of results for an archive list, explicitly specifying the restrictions, orderby and chosen columns.
	 *
	 *@$providerName		The name of the archive provider to use; it will be created via the ArchiveProviderFactory from a plugin
	 *@$columns		An array of the names of the columns wanted.
	 *@$sortOrder		Sort order for the archive. Can be null, which indicates 'no particular order'
	 *@$restriction		Archive restrictions. Archives will generally throw an exception if no restrictions are set. Pass in an empty array if you really do not want restrictions, but remember that you may end up fetching the first page of millions of rows.
	 *@$entities		Which entities to include. Can be null, which indicates 'include all entities'
	 *@$page		Page number, page 0 is the first page
	 *@$pageSize		Page size, which should be kept reasonable (say, no more than 1000 rows at a time)
	 *
	 *@return: Array of archive list items, where each item represents one row of data (row level data + the requested columns)
	 */
	function GetArchiveListByColumns($providerName, $columns, $sortOrder, $restriction, $entities, $page, $pageSize)
	{
		$result = $this->sendRequest("GetArchiveListByColumns", array("ProviderName"=>$providerName, "Columns"=>$columns, "SortOrder"=>$sortOrder, "Restriction"=>$restriction, "Entities"=>$entities, "Page"=>$page, "PageSize"=>$pageSize));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a page of results for an archive list with context parameter, explicitly specifying the restrictions, orderby and chosen columns.
	 *
	 *@$providerName		The name of the archive provider to use; it will be created via the ArchiveProviderFactory from a plugin
	 *@$columns		An array of the names of the columns wanted.
	 *@$sortOrder		Sort order for the archive. Can be null, which indicates 'no particular order'
	 *@$restriction		Archive restrictions. Archives will generally throw an exception if no restrictions are set. Pass in an empty array if you really do not want restrictions, but remember that you may end up fetching the first page of millions of rows.
	 *@$entities		Which entities to include. Can be null, which indicates 'include all entities'
	 *@$page		Page number, page 0 is the first page
	 *@$pageSize		Page size, which should be kept reasonable (say, no more than 1000 rows at a time)
	 *@$context		Context parameter, url-encoded string context parameter for ArchiveProvider constructor
	 *
	 *@return: Array of archive list items, where each item represents one row of data (row level data + the requested columns)
	 */
	function GetArchiveListByColumnsWithContext($providerName, $columns, $sortOrder, $restriction, $entities, $page, $pageSize, $context)
	{
		$result = $this->sendRequest("GetArchiveListByColumnsWithContext", array("ProviderName"=>$providerName, "Columns"=>$columns, "SortOrder"=>$sortOrder, "Restriction"=>$restriction, "Entities"=>$entities, "Page"=>$page, "PageSize"=>$pageSize, "Context"=>$context));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a page of data for an archive. The columns returned will be those set as chosen columns, using either the SetChosenColumns service or the corresponding SelectableMDOList.SetSelected.
	 *
	 *@$guiName		The GUI name of the archive list, used to retrieve the currently configured set of columns (otherwise manipulated using the ArchiveConfiguration service)
	 *@$providerName		The name of the archive provider to use; it will be created via the ArchiveProviderFactory from a plugin
	 *@$sortOrder		Sort order for the archive. Can be null, which indicates 'no particular order'
	 *@$restriction		Archive restrictions. Archives will generally throw an exception if no restrictions are set. Pass in an empty array if you really do not want restrictions, but remember that you may end up fetching the first page of millions of rows.
	 *@$entities		Which entities to include. Can be null, which indicates 'include all entities'
	 *@$page		Page number, page 0 is the first page
	 *@$pageSize		Page size, which should be kept reasonable (say, no more than 1000 rows at a time)
	 *
	 *@return: Array of archive list items, where each item represents one row of data (row level data + the requested columns)
	 */
	function GetArchiveList($guiName, $providerName, $sortOrder, $restriction, $entities, $page, $pageSize)
	{
		$result = $this->sendRequest("GetArchiveList", array("GuiName"=>$guiName, "ProviderName"=>$providerName, "SortOrder"=>$sortOrder, "Restriction"=>$restriction, "Entities"=>$entities, "Page"=>$page, "PageSize"=>$pageSize));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a page of data for an archive, with context parameter. The columns returned will be those set as chosen columns, using either the SetChosenColumns service or the corresponding SelectableMDOList.SetSelected.
	 *
	 *@$guiName		The GUI name of the archive list, used to retrieve the currently configured set of columns (otherwise manipulated using the ArchiveConfiguration service)
	 *@$providerName		The name of the archive provider to use; it will be created via the ArchiveProviderFactory from a plugin
	 *@$sortOrder		Sort order for the archive. Can be null, which indicates 'no particular order'
	 *@$restriction		Archive restrictions. Archives will generally throw an exception if no restrictions are set. Pass in an empty array if you really do not want restrictions, but remember that you may end up fetching the first page of millions of rows.
	 *@$entities		Which entities to include. Can be null, which indicates 'include all entities'
	 *@$page		Page number, page 0 is the first page
	 *@$pageSize		Page size, which should be kept reasonable (say, no more than 1000 rows at a time)
	 *@$context		Context parameter, url-encoded string context parameter for ArchiveProvider constructor
	 *
	 *@return: Array of archive list items, where each item represents one row of data (row level data + the requested columns)
	 */
	function GetArchiveListWithContext($guiName, $providerName, $sortOrder, $restriction, $entities, $page, $pageSize, $context)
	{
		$result = $this->sendRequest("GetArchiveListWithContext", array("GuiName"=>$guiName, "ProviderName"=>$providerName, "SortOrder"=>$sortOrder, "Restriction"=>$restriction, "Entities"=>$entities, "Page"=>$page, "PageSize"=>$pageSize, "Context"=>$context));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a page of results for an archive list, explicitly specifying the restrictions, orderby and chosen columns; as well as a name/value string formatted set of options. The return value includes a header that has various extra information, in addition to the actual rows.
	 *
	 *@$providerName		The name of the archive provider to use; it will be created via the ArchiveProviderFactory from a plugin
	 *@$columns		An array of the names of the columns wanted.
	 *@$sortOrder		Sort order for the archive. Can be null, which indicates 'no particular order'
	 *@$restriction		Archive restrictions. Archives will generally throw an exception if no restrictions are set. Pass in an empty array if you really do not want restrictions, but remember that you may end up fetching the first page of millions of rows.
	 *@$entities		Which entities to include. Can be null, which indicates 'include all entities'
	 *@$page		Page number, page 0 is the first page
	 *@$pageSize		Page size, which should be kept reasonable (say, no more than 1000 rows at a time)
	 *@$options		name=value&amp;... formatted set of options. rowcount=true will cause the rowcount to be calculated and populated.
	 *
	 *@return: Header with optional row count, plus array of archive list items, where each item represents one row of data (row level data + the requested columns)
	 */
	function GetArchiveListByColumnsWithHeader($providerName, $columns, $sortOrder, $restriction, $entities, $page, $pageSize, $options)
	{
		$result = $this->sendRequest("GetArchiveListByColumnsWithHeader", array("ProviderName"=>$providerName, "Columns"=>$columns, "SortOrder"=>$sortOrder, "Restriction"=>$restriction, "Entities"=>$entities, "Page"=>$page, "PageSize"=>$pageSize, "Options"=>$options));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Return list of all archive provider names
	 *
	 *
	 *@return: Array of all archive provider names. 
	 */
	function GetProviderNames()
	{
		$result = $this->sendRequest("GetProviderNames", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a page of results for an archive list, with context parameter, explicitly specifying the restrictions, orderby and chosen columns; as well as a name/value string formatted set of options. The return value includes a header that has various extra information, in addition to the actual rows.
	 *
	 *@$providerName		The name of the archive provider to use; it will be created via the ArchiveProviderFactory from a plugin
	 *@$columns		An array of the names of the columns wanted.
	 *@$sortOrder		Sort order for the archive. Can be null, which indicates 'no particular order'
	 *@$restriction		Archive restrictions. Archives will generally throw an exception if no restrictions are set. Pass in an empty array if you really do not want restrictions, but remember that you may end up fetching the first page of millions of rows.
	 *@$entities		Which entities to include. Can be null, which indicates 'include all entities'
	 *@$page		Page number, page 0 is the first page
	 *@$pageSize		Page size, which should be kept reasonable (say, no more than 1000 rows at a time)
	 *@$options		name=value&amp;... formatted set of options. rowcount=true will cause the rowcount to be calculated and populated.
	 *@$context		Context parameter, url-encoded string context parameter for ArchiveProvider constructor
	 *
	 *@return: Header with optional row count, plus array of archive list items, where each item represents one row of data (row level data + the requested columns)
	 */
	function GetArchiveListByColumnsWithHeaderWithContext($providerName, $columns, $sortOrder, $restriction, $entities, $page, $pageSize, $options, $context)
	{
		$result = $this->sendRequest("GetArchiveListByColumnsWithHeaderWithContext", array("ProviderName"=>$providerName, "Columns"=>$columns, "SortOrder"=>$sortOrder, "Restriction"=>$restriction, "Entities"=>$entities, "Page"=>$page, "PageSize"=>$pageSize, "Options"=>$options, "Context"=>$context));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

