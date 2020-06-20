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

		
class SoFindAgent extends SoAgent
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
        parent::__construct($endpoint."Find.svc", "WcfFind.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Get criteria information from a set of saved criteria. The result contains the restrictions in two forms: fully populated ArchiveRestrictionInfo objects, used to display details and for saving changes; and as a list suitable for an Archive control
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of archive provider that is the intended consumer of the restrictions
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search
	 *@$staticColumns		Optional array of restrictions that are to be EXCLUDED from the CriteriaArchiveRows part of the result. In the Find dialogs, that corresponds to the 'static' fields, to avoid duplicating them in the 'Match also' criteria list. This array can be null, indicating that all restrictions should be included in the criteria list.
	 *
	 *@return: The result contains the restrictions in two forms: fully populated ArchiveRestrictionInfo objects, used to display details and for saving changes; and as a list suitable for an Archive control
	 */
	function GetCriteriaInformation($storageType, $providerName, $storageKey, $staticColumns)
	{
		$result = $this->sendRequest("GetCriteriaInformation", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey, "StaticColumns"=>$staticColumns));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get criteria information from a set of saved criteria. The result contains the restrictions in two forms: fully populated ArchiveRestrictionInfo objects, used to display details and for saving changes; and as a list suitable for an Archive control
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of archive provider that is the intended consumer of the restrictions
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search
	 *@$staticColumns		Optional array of restrictions that are to be EXCLUDED from the CriteriaArchiveRows part of the result. In the Find dialogs, that corresponds to the 'static' fields, to avoid duplicating them in the 'Match also' criteria list. This array can be null, indicating that all restrictions should be included in the criteria list.
	 *@$context		Optional context that can be used by FindProvider
	 *
	 *@return: The result contains the restrictions in two forms: fully populated ArchiveRestrictionInfo objects, used to display details and for saving changes; and as a list suitable for an Archive control
	 */
	function GetCriteriaInformationWithContext($storageType, $providerName, $storageKey, $staticColumns, $context)
	{
		$result = $this->sendRequest("GetCriteriaInformationWithContext", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey, "StaticColumns"=>$staticColumns, "Context"=>$context));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save an array of restrictions for later use as search criteria (including as dynamic selection and Find). 
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of archive provider that is the intended consumer of the restrictions
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it saves the restrictions as criteria
	 *@$restrictions		Array of restrictions. The ColumnInfo member and the DisplayValues members need NOT be populated; it is enough to provide a name, operator and any values the operator may need. The IsActive is also saved. Values should be encoded using the CultureDataFormatter to ensure compatibility across cultures.
	 *
	 *@return: This service call just saves the restrictions. See SaveRestrictionsAndGetCriteriaInformation if you would like the restrictions returned as criteria immediately, in one roundtrip
	 */
	function SaveRestrictions($storageType, $providerName, $storageKey, $restrictions)
	{
		$result = $this->sendRequest("SaveRestrictions", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey, "Restrictions"=>$restrictions));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Save an array of restrictions for later use as search criteria (including as dynamic selection and Find). 
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of archive provider that is the intended consumer of the restrictions
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it saves the restrictions as criteria
	 *@$restrictions		Array of restrictions. The ColumnInfo member and the DisplayValues members need NOT be populated; it is enough to provide a name, operator and any values the operator may need. The IsActive is also saved. Values should be encoded using the CultureDataFormatter to ensure compatibility across cultures.
	 *@$context		Optional context that can be used by FindProvider
	 *
	 *@return: This service call just saves the restrictions. See SaveRestrictionsAndGetCriteriaInformation if you would like the restrictions returned as criteria immediately, in one roundtrip
	 */
	function SaveRestrictionsWithContext($storageType, $providerName, $storageKey, $restrictions, $context)
	{
		$result = $this->sendRequest("SaveRestrictionsWithContext", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey, "Restrictions"=>$restrictions, "Context"=>$context));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Save an array of restrictions for later use as search criteria (including as dynamic selection and Find). Then, return the same result as a call to GetCriteriaInformation would have done. The purpose is to encapsulate saving and updating of a GUI in one round trip.
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of archive provider that is the intended consumer of the restrictions
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it saves the restrictions as criteria
	 *@$restrictions		Array of restrictions. The ColumnInfo member and the DisplayValues members need NOT be populated; it is enough to provide a name, operator and any values the operator may need. The IsActive is also saved. Values should be encoded using the CultureDataFormatter to ensure compatibility across cultures.
	 *@$staticColumns		Optional array of restrictions that are to be EXCLUDED from the CriteriaArchiveRows part of the result. In the Find dialogs, that corresponds to the 'static' fields, to avoid duplicating them in the 'Match also' criteria list. This array can be null, indicating that all restrictions should be included in the criteria list.
	 *
	 *@return: The result contains the restrictions in two forms: fully populated ArchiveRestrictionInfo objects, used to display details and for saving changes; and as a list suitable for an Archive control
	 */
	function SaveRestrictionsAndGetCriteriaInformation($storageType, $providerName, $storageKey, $restrictions, $staticColumns)
	{
		$result = $this->sendRequest("SaveRestrictionsAndGetCriteriaInformation", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey, "Restrictions"=>$restrictions, "StaticColumns"=>$staticColumns));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Execute a Find operation and return a page of results. The criteria for the Find are fetched from the restriction storage provider according to the given parameters. The columns of the result are calculated based on the restriction. The orderby columns are also calculated by the system.<para/>The other variants of the Find method allow you greater control over the individual aspects of the process.
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of archive provider that is to execute the search and return the result columns/rows
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search
	 *@$pageSize		Size of result set pages
	 *@$pageNumber		Result set page to return, 0 is the first page. When a call returns no rows, no further pages are available.
	 *
	 *@return: Results from search, containing column information and result rows.
	 */
	function Find($storageType, $providerName, $storageKey, $pageSize, $pageNumber)
	{
		$result = $this->sendRequest("Find", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey, "PageSize"=>$pageSize, "PageNumber"=>$pageNumber));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Execute a Find operation and return a page of results. The criteria for the Find are passed in directly, not fetched by a restriction storage provider. The columns of the result are calculated based on the restriction.
	 *
	 *@$restrictions		Array of restrictions specifying the search. Each restriction must match a column of the  given archive provider, and that column must have its CanRestrictBy property set to true.
	 *@$providerName		Name of archive provider that is to execute the search and return the result columns/rows
	 *@$pageSize		Size of result set pages
	 *@$pageNumber		Result set page to return, 0 is the first page. When a call returns no rows, no further pages are available.
	 *
	 *@return: Results from search, containing column information and result rows.
	 */
	function FindFromRestrictions($restrictions, $providerName, $pageSize, $pageNumber)
	{
		$result = $this->sendRequest("FindFromRestrictions", array("Restrictions"=>$restrictions, "ProviderName"=>$providerName, "PageSize"=>$pageSize, "PageNumber"=>$pageNumber));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Execute a Find operation and return a page of results. <para/>The criteria for the Find are passed in directly, not fetched by a restriction storage provider. <para/>The desired columns of the result set are also passed in directly.<para/>The orderby information is calculated by the system.<para/>Use the GetCriteriaInformation and GetDefaultDesiredColumns service methods to let the system calculate these values, if you want to use or modify them.
	 *
	 *@$restrictions		Array of restrictions specifying the search. Each restriction must match a column of the  given archive provider, and that column must have its CanRestrictBy property set to true.
	 *@$providerName		Name of archive provider that is to execute the search and return the result columns/rows
	 *@$desiredColumns		Array of column names desired for the result. Each name must match a column offered by the given archive provider.
	 *@$pageSize		Size of result set pages
	 *@$pageNumber		Result set page to return, 0 is the first page. When a call returns no rows, no further pages are available.
	 *
	 *@return: Results from search, containing column information and result rows.
	 */
	function FindFromRestrictionsColumns($restrictions, $providerName, $desiredColumns, $pageSize, $pageNumber)
	{
		$result = $this->sendRequest("FindFromRestrictionsColumns", array("Restrictions"=>$restrictions, "ProviderName"=>$providerName, "DesiredColumns"=>$desiredColumns, "PageSize"=>$pageSize, "PageNumber"=>$pageNumber));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a list of the column names corresponding to available restrictions for a certain archive provider and restriction storage provider. Such columns have CanRestrict set to true, and are supported by the given restriction storage provider.
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of archive provider that is to execute the search and return the result columns/rows
	 *
	 *@return: Array of column names, corresponding to support restrictions for the given archive and restriction storage providers.
	 */
	function GetAvailableRestrictionColumns($storageType, $providerName)
	{
		$result = $this->sendRequest("GetAvailableRestrictionColumns", array("StorageType"=>$storageType, "ProviderName"=>$providerName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get criteria information from a set of saved criteria, for a specific set of columns. The result contains the restrictions in two forms: fully populated ArchiveRestrictionInfo objects, used to display details and for saving changes; and as a list suitable for an Archive control. ALL columns specified in the call will be present in the results; those that do not have corresponding criteria set will have empty values and the default (first) operator, with the IsActive flag set to false.
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of archive provider that is the intended consumer of the restrictions
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search
	 *@$desiredColumnNames		Optional array of restrictions that are to be EXCLUDED from the CriteriaArchiveRows part of the result. In the Find dialogs, that corresponds to the 'static' fields, to avoid duplicating them in the 'Match also' criteria list. This array can be null, indicating that all restrictions should be included in the criteria list.
	 *@$staticColumns		Optional array of restrictions that are to be EXCLUDED from the CriteriaArchiveRows part of the result. In the Find dialogs, that corresponds to the 'static' fields, to avoid duplicating them in the 'Match also' criteria list. This array can be null, indicating that all restrictions should be included in the criteria list.
	 *
	 *@return: The result contains the restrictions in two forms: fully populated ArchiveRestrictionInfo objects, used to display details and for saving changes; and as a list suitable for an Archive control. ALL columns specified in the call will be present in the results; those that do not have corresponding criteria set will have empty values and the default (first) operator, with the IsActive flag set to false.
	 */
	function GetSpecifiedCriteriaInformationWithDefaults($storageType, $providerName, $storageKey, $desiredColumnNames, $staticColumns)
	{
		$result = $this->sendRequest("GetSpecifiedCriteriaInformationWithDefaults", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey, "DesiredColumnNames"=>$desiredColumnNames, "StaticColumns"=>$staticColumns));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get criteria information from a set of saved criteria, for a specific set of columns. The result contains the restrictions in two forms: fully populated ArchiveRestrictionInfo objects, used to display details and for saving changes; and as a list suitable for an Archive control. ALL columns specified in the call will be present in the results; those that do not have corresponding criteria set will have empty values and the default (first) operator, with the IsActive flag set to false.
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of archive provider that is the intended consumer of the restrictions
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search
	 *@$desiredColumnNames		Optional array of restrictions that are to be EXCLUDED from the CriteriaArchiveRows part of the result. In the Find dialogs, that corresponds to the 'static' fields, to avoid duplicating them in the 'Match also' criteria list. This array can be null, indicating that all restrictions should be included in the criteria list.
	 *@$staticColumns		Optional array of restrictions that are to be EXCLUDED from the CriteriaArchiveRows part of the result. In the Find dialogs, that corresponds to the 'static' fields, to avoid duplicating them in the 'Match also' criteria list. This array can be null, indicating that all restrictions should be included in the criteria list.
	 *@$context		Optional context that can be used by FindProvider
	 *
	 *@return: The result contains the restrictions in two forms: fully populated ArchiveRestrictionInfo objects, used to display details and for saving changes; and as a list suitable for an Archive control. ALL columns specified in the call will be present in the results; those that do not have corresponding criteria set will have empty values and the default (first) operator, with the IsActive flag set to false.
	 */
	function GetSpecifiedCriteriaInformationWithDefaultsWithContext($storageType, $providerName, $storageKey, $desiredColumnNames, $staticColumns, $context)
	{
		$result = $this->sendRequest("GetSpecifiedCriteriaInformationWithDefaultsWithContext", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey, "DesiredColumnNames"=>$desiredColumnNames, "StaticColumns"=>$staticColumns, "Context"=>$context));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Execute a Find operation and return a page of results. <para/>The criteria for the Find are passed in directly, not fetched by a restriction storage provider. <para/>The desired columns of the result set are also passed in directly.<para/>The orderby information is also passed in directly.<para/>Use the GetCriteriaInformation, GetDefaultDesiredColumns and GetDefaultOrderBy service methods to let the system calculate these values, if you want to use or modify them.
	 *
	 *@$restrictions		Array of restrictions specifying the search. Each restriction must match a column of the  given archive provider, and that column must have its CanRestrictBy property set to true.
	 *@$providerName		Name of archive provider that is to execute the search and return the result columns/rows
	 *@$desiredColumns		Array of column names desired for the result. Each name must match a column offered by the given archive provider.
	 *@$orderBy		Array of order by specifications. If it is null or empty, the row order is unspecified, database dependent, and might not be the same from call to call, depending on query execution plans. The unspecified order willgenerally not vary within pages of the same query.
	 *@$pageSize		Size of result set pages
	 *@$pageNumber		Result set page to return, 0 is the first page. When a call returns no rows, no further pages are available.
	 *
	 *@return: Results from search, containing column information and result rows.
	 */
	function FindFromRestrictionsColumnsOrderBy($restrictions, $providerName, $desiredColumns, $orderBy, $pageSize, $pageNumber)
	{
		$result = $this->sendRequest("FindFromRestrictionsColumnsOrderBy", array("Restrictions"=>$restrictions, "ProviderName"=>$providerName, "DesiredColumns"=>$desiredColumns, "OrderBy"=>$orderBy, "PageSize"=>$pageSize, "PageNumber"=>$pageNumber));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Calculate the default desired columns, i.e., the result columns for a given search. The search is defined by a storage type, provider name and storage key, which are used to fetch the corresponding restrictions from the database (in the same way as Find does). If you want to specify the restriction directly, use the GetDefaultDesiredColumnsFromRestrictions method instead. This is the algorithm that is used by the Find service method.
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of the provider to calculate default desired columns for
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search
	 *
	 *@return: Column information for the default desired columns, fully populated. Percentage-specified column widths sum to exactly 100.
	 */
	function GetDefaultDesiredColumns($storageType, $providerName, $storageKey)
	{
		$result = $this->sendRequest("GetDefaultDesiredColumns", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Calculate the default orderby columns for a given provider and a search. The search is specified by a storage type, provider name and storage key, and is fetched from the database. Default desired columns are then calculated for the search, and those columns are then used as the basis for calculating an order by. If you want to specify the desired columns directly, use the GetDefaultOrderByFromDesiredColumns method instead.  This is the same algorithm that is used by the Find service method.
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Provider name to calculate default orderby for
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search
	 *
	 *@return: Orderby information
	 */
	function GetDefaultOrderBy($storageType, $providerName, $storageKey)
	{
		$result = $this->sendRequest("GetDefaultOrderBy", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Take an incoming set of minimally populated restrictions (name + operator is required), and populate all the other parts of the ArchiveRestrictionInfo structure. This includes column information, display values (including list value lookup), and calculated/default values where the value hints specify read-only (R).
	 *
	 *@$providerName		Provider name to use for populating column information
	 *@$restrictions		Restrictions to populate. The Name and Operator fields have to have valid content, and Values should be set as appropriate. Other fields can be left blank or null. If a ColumnInfo is already set, it will not be overwritten.
	 *
	 *@return: Fully populated restrictions in the same order as the incoming restrictions.
	 */
	function PopulateRestrictions($providerName, $restrictions)
	{
		$result = $this->sendRequest("PopulateRestrictions", array("ProviderName"=>$providerName, "Restrictions"=>$restrictions));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Calculate the default desired columns, i.e., the result columns for a given search. The search is defined by a provider name and a set of restrictions. This is the algorithm that is used by the Find service method.
	 *
	 *@$providerName		Name of the provider to calculate default desired columns for
	 *@$restrictions		Restriction to use in the calculation of default desired columns
	 *
	 *@return: Column information for the default desired columns, fully populated. Percentage-specified column widths sum to exactly 100.
	 */
	function GetDefaultDesiredColumnsFromRestrictions($providerName, $restrictions)
	{
		$result = $this->sendRequest("GetDefaultDesiredColumnsFromRestrictions", array("ProviderName"=>$providerName, "Restrictions"=>$restrictions));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Calculate the default orderby columns for a given provider and a set of desired columns. This is the same algorithm that is used by the Find service method.
	 *
	 *@$providerName		Provider name to calculate default orderby for
	 *@$desiredColumns		Desired columns (return fields), used in the orderby calculation. You can generally only order by columns that have been set as 'desired'.
	 *
	 *@return: Orderby information
	 */
	function GetDefaultOrderByFromDesiredColumns($providerName, $desiredColumns)
	{
		$result = $this->sendRequest("GetDefaultOrderByFromDesiredColumns", array("ProviderName"=>$providerName, "DesiredColumns"=>$desiredColumns));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Execute a Find operation and return a page of results. The criteria for the Find are fetched from the restriction storage provider according to the given parameters. The columns of the result are calculated based on the restriction. The orderby parameter is used for sorting the results.<para/>The other variants of the Find method allow you greater control over the individual aspects of the process.
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of archive provider that is to execute the search and return the result columns/rows
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search
	 *@$pageSize		Size of result set pages
	 *@$pageNumber		Result set page to return, 0 is the first page. When a call returns no rows, no further pages are available.
	 *@$orderBy		Array of order by specifications. If it is null or empty, the row order is unspecified, database dependent, and might not be the same from call to call, depending on query execution plans. The unspecified order willgenerally not vary within pages of the same query.
	 *
	 *@return: Results from search, containing column information and result rows.
	 */
	function FindOrderBy($storageType, $providerName, $storageKey, $pageSize, $pageNumber, $orderBy)
	{
		$result = $this->sendRequest("FindOrderBy", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey, "PageSize"=>$pageSize, "PageNumber"=>$pageNumber, "OrderBy"=>$orderBy));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Execute a Find operation and return a page of results. The criteria for the Find are fetched from the restriction storage provider according to the given parameters. In addition an extra set of restrictions can be added to the search. These restrictions will not be saved, they are only valid for the current search. Extra restrictions will override restrictions with the same key already stored on the storagekey.
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of archive provider that is to execute the search and return the result columns/rows
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search
	 *@$extraRestrictions		Extra restrictions to append to the the search. These will override saved restrictions with the same key.
	 *@$orderBy		Array of order by specifications. If it is null or empty, the row order is unspecified, database dependent, and might not be the same from call to call, depending on query execution plans. The unspecified order willgenerally not vary within pages of the same query.
	 *@$desiredColumns		Array of column names desired for the result. Each name must match a column offered by the given archive provider.
	 *@$pageSize		Size of result set pages
	 *@$pageNumber		Result set page to return, 0 is the first page. When a call returns no rows, no further pages are available.
	 *
	 *@return: Results from search, containing column information and result rows.
	 */
	function FindWithExtraRestrictions($storageType, $providerName, $storageKey, $extraRestrictions, $orderBy, $desiredColumns, $pageSize, $pageNumber)
	{
		$result = $this->sendRequest("FindWithExtraRestrictions", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey, "ExtraRestrictions"=>$extraRestrictions, "OrderBy"=>$orderBy, "DesiredColumns"=>$desiredColumns, "PageSize"=>$pageSize, "PageNumber"=>$pageNumber));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Execute a Find operation and return a page of results. The criteria for the Find are fetched from the restriction storage provider according to the given parameters.
	 *
	 *@$storageType		Restriction storage type specification, either 'Criteria' or 'Reporter' (or possible extensions)
	 *@$providerName		Name of archive provider that is to execute the search and return the result columns/rows
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search
	 *@$desiredColumns		Array of column names desired for the result. Each name must match a column offered by the given archive provider.
	 *@$pageSize		Size of result set pages
	 *@$pageNumber		Result set page to return, 0 is the first page. When a call returns no rows, no further pages are available.
	 *@$orderBy		Array of order by specifications. If it is null or empty, the row order is unspecified, database dependent, and might not be the same from call to call, depending on query execution plans. The unspecified order willgenerally not vary within pages of the same query.
	 *
	 *@return: Results from search, containing column information and result rows.
	 */
	function FindWithColumns($storageType, $providerName, $storageKey, $desiredColumns, $pageSize, $pageNumber, $orderBy)
	{
		$result = $this->sendRequest("FindWithColumns", array("StorageType"=>$storageType, "ProviderName"=>$providerName, "StorageKey"=>$storageKey, "DesiredColumns"=>$desiredColumns, "PageSize"=>$pageSize, "PageNumber"=>$pageNumber, "OrderBy"=>$orderBy));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

