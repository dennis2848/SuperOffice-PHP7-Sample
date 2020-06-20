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

		
class SoListAgent extends SoAgent
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
        parent::__construct($endpoint."List.svc", "WcfList.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new CurrencyEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New CurrencyEntity with default values
     */
     function CreateDefaultCurrencyEntity()
     {
		$result = $this->sendRequest("CreateDefaultCurrencyEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing CurrencyEntity or creates a new CurrencyEntity if the id parameter is empty
     * 
     * @return New or updated CurrencyEntity
     */
	function SaveCurrencyEntity($currencyEntity)
	{
		$result = $this->sendRequest("SaveCurrencyEntity", array("CurrencyEntity"=>$currencyEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new AmountClassEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New AmountClassEntity with default values
     */
     function CreateDefaultAmountClassEntity()
     {
		$result = $this->sendRequest("CreateDefaultAmountClassEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing AmountClassEntity or creates a new AmountClassEntity if the id parameter is empty
     * 
     * @return New or updated AmountClassEntity
     */
	function SaveAmountClassEntity($amountClassEntity)
	{
		$result = $this->sendRequest("SaveAmountClassEntity", array("AmountClassEntity"=>$amountClassEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new HeadingEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New HeadingEntity with default values
     */
     function CreateDefaultHeadingEntity()
     {
		$result = $this->sendRequest("CreateDefaultHeadingEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing HeadingEntity or creates a new HeadingEntity if the id parameter is empty
     * 
     * @return New or updated HeadingEntity
     */
	function SaveHeadingEntity($headingEntity)
	{
		$result = $this->sendRequest("SaveHeadingEntity", array("HeadingEntity"=>$headingEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new ListEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ListEntity with default values
     */
     function CreateDefaultListEntity()
     {
		$result = $this->sendRequest("CreateDefaultListEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing ListEntity or creates a new ListEntity if the id parameter is empty
     * 
     * @return New or updated ListEntity
     */
	function SaveListEntity($listEntity)
	{
		$result = $this->sendRequest("SaveListEntity", array("ListEntity"=>$listEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new ListItemEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ListItemEntity with default values
     */
     function CreateDefaultListItemEntity()
     {
		$result = $this->sendRequest("CreateDefaultListItemEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing ListItemEntity or creates a new ListItemEntity if the id parameter is empty
     * 
     * @return New or updated ListItemEntity
     */
	function SaveListItemEntity($listItemEntity)
	{
		$result = $this->sendRequest("SaveListItemEntity", array("ListItemEntity"=>$listItemEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new ProjectTypeEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ProjectTypeEntity with default values
     */
     function CreateDefaultProjectTypeEntity()
     {
		$result = $this->sendRequest("CreateDefaultProjectTypeEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing ProjectTypeEntity or creates a new ProjectTypeEntity if the id parameter is empty
     * 
     * @return New or updated ProjectTypeEntity
     */
	function SaveProjectTypeEntity($projectTypeEntity)
	{
		$result = $this->sendRequest("SaveProjectTypeEntity", array("ProjectTypeEntity"=>$projectTypeEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new ResourceEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ResourceEntity with default values
     */
     function CreateDefaultResourceEntity()
     {
		$result = $this->sendRequest("CreateDefaultResourceEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing ResourceEntity or creates a new ResourceEntity if the id parameter is empty
     * 
     * @return New or updated ResourceEntity
     */
	function SaveResourceEntity($resourceEntity)
	{
		$result = $this->sendRequest("SaveResourceEntity", array("ResourceEntity"=>$resourceEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the ResourceEntity
	 * 
	 * @$resourceEntityId		The identity of the ResourceEntity
	 */
	function DeleteResourceEntity($resourceEntityId)
	{
		$result = $this->sendRequest("DeleteResourceEntity", array("ResourceEntity"=>$resourceEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

    /**
     * Loading default values into a new SaleStageEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New SaleStageEntity with default values
     */
     function CreateDefaultSaleStageEntity()
     {
		$result = $this->sendRequest("CreateDefaultSaleStageEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing SaleStageEntity or creates a new SaleStageEntity if the id parameter is empty
     * 
     * @return New or updated SaleStageEntity
     */
	function SaveSaleStageEntity($saleStageEntity)
	{
		$result = $this->sendRequest("SaveSaleStageEntity", array("SaleStageEntity"=>$saleStageEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new SaleTypeEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New SaleTypeEntity with default values
     */
     function CreateDefaultSaleTypeEntity()
     {
		$result = $this->sendRequest("CreateDefaultSaleTypeEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing SaleTypeEntity or creates a new SaleTypeEntity if the id parameter is empty
     * 
     * @return New or updated SaleTypeEntity
     */
	function SaveSaleTypeEntity($saleTypeEntity)
	{
		$result = $this->sendRequest("SaveSaleTypeEntity", array("SaleTypeEntity"=>$saleTypeEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new WebPanelEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New WebPanelEntity with default values
     */
     function CreateDefaultWebPanelEntity()
     {
		$result = $this->sendRequest("CreateDefaultWebPanelEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing WebPanelEntity or creates a new WebPanelEntity if the id parameter is empty
     * 
     * @return New or updated WebPanelEntity
     */
	function SaveWebPanelEntity($webPanelEntity)
	{
		$result = $this->sendRequest("SaveWebPanelEntity", array("WebPanelEntity"=>$webPanelEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new DocumentTemplateEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New DocumentTemplateEntity with default values
     */
     function CreateDefaultDocumentTemplateEntity()
     {
		$result = $this->sendRequest("CreateDefaultDocumentTemplateEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing DocumentTemplateEntity or creates a new DocumentTemplateEntity if the id parameter is empty
     * 
     * @return New or updated DocumentTemplateEntity
     */
	function SaveDocumentTemplateEntity($documentTemplateEntity)
	{
		$result = $this->sendRequest("SaveDocumentTemplateEntity", array("DocumentTemplateEntity"=>$documentTemplateEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new RelationDefinitionEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New RelationDefinitionEntity with default values
     */
     function CreateDefaultRelationDefinitionEntity()
     {
		$result = $this->sendRequest("CreateDefaultRelationDefinitionEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing RelationDefinitionEntity or creates a new RelationDefinitionEntity if the id parameter is empty
     * 
     * @return New or updated RelationDefinitionEntity
     */
	function SaveRelationDefinitionEntity($relationDefinitionEntity)
	{
		$result = $this->sendRequest("SaveRelationDefinitionEntity", array("RelationDefinitionEntity"=>$relationDefinitionEntity));
		return $this->getResultFromResponse($result);
	}
        

	/**
	 * Summary
	 * Gets a Business object.
	 * 
	 * @$businessId		The identifier of the Business object
	 *
	 * @returns Business
	 */ 
	function GetBusiness($businessId)
	{
		$result = $this->sendRequest("GetBusiness", array("BusinessId"=>$businessId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Business objects.
	 * 
	 * @$businessIds		The identifiers of the Business object
	 *
	 * @returns Array of Business objects
	 */ 
	function GetBusinessList($businessIds)
	{
		$result = $this->sendRequest("GetBusinessList", array("BusinessIds"=>$businessIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all available businesses that a contact could have.
	 *
	 *
	 *@return: An array of all available businesses
	 */
	function GetBusinesses()
	{
		$result = $this->sendRequest("GetBusinesses", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Category object.
	 * 
	 * @$categoryId		The identifier of the Category object
	 *
	 * @returns Category
	 */ 
	function GetCategory($categoryId)
	{
		$result = $this->sendRequest("GetCategory", array("CategoryId"=>$categoryId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Category objects.
	 * 
	 * @$categoryIds		The identifiers of the Category object
	 *
	 * @returns Array of Category objects
	 */ 
	function GetCategoryList($categoryIds)
	{
		$result = $this->sendRequest("GetCategoryList", array("CategoryIds"=>$categoryIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all categories a contact could belong to
	 *
	 *
	 *@return: An array of all available categories
	 */
	function GetCategories()
	{
		$result = $this->sendRequest("GetCategories", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Competitor object.
	 * 
	 * @$competitorId		The identifier of the Competitor object
	 *
	 * @returns Competitor
	 */ 
	function GetCompetitor($competitorId)
	{
		$result = $this->sendRequest("GetCompetitor", array("CompetitorId"=>$competitorId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Competitor objects.
	 * 
	 * @$competitorIds		The identifiers of the Competitor object
	 *
	 * @returns Array of Competitor objects
	 */ 
	function GetCompetitorList($competitorIds)
	{
		$result = $this->sendRequest("GetCompetitorList", array("CompetitorIds"=>$competitorIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all competitors
	 *
	 *
	 *@return: 
	 */
	function GetCompetitors()
	{
		$result = $this->sendRequest("GetCompetitors", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Country object.
	 * 
	 * @$countryId		The identifier of the Country object
	 *
	 * @returns Country
	 */ 
	function GetCountry($countryId)
	{
		$result = $this->sendRequest("GetCountry", array("CountryId"=>$countryId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves a country
	 *
	 *@$country		The country to save
	 *
	 *@return: The country that is saved
	 */
	function SaveCountry($country)
	{
		$result = $this->sendRequest("SaveCountry", array("Country"=>$country));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets a new country
	 *
	 *
	 *@return: A new country with default values
	 */
	function CreateDefaultCountry()
	{
		$result = $this->sendRequest("CreateDefaultCountry", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Country objects.
	 * 
	 * @$countryIds		The identifiers of the Country object
	 *
	 * @returns Array of Country objects
	 */ 
	function GetCountryList($countryIds)
	{
		$result = $this->sendRequest("GetCountryList", array("CountryIds"=>$countryIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all available countries a contact or person could belong to.
	 *
	 *
	 *@return: An array of all available countries
	 */
	function GetCountries()
	{
		$result = $this->sendRequest("GetCountries", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Credited object.
	 * 
	 * @$creditedId		The identifier of the Credited object
	 *
	 * @returns Credited
	 */ 
	function GetCredited($creditedId)
	{
		$result = $this->sendRequest("GetCredited", array("CreditedId"=>$creditedId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Credited objects.
	 * 
	 * @$creditedIds		The identifiers of the Credited object
	 *
	 * @returns Array of Credited objects
	 */ 
	function GetCreditedList($creditedIds)
	{
		$result = $this->sendRequest("GetCreditedList", array("CreditedIds"=>$creditedIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all credited
	 *
	 *
	 *@return: 
	 */
	function GetCrediteds()
	{
		$result = $this->sendRequest("GetCrediteds", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Currency object.
	 * 
	 * @$currencyId		The identifier of the Currency object
	 *
	 * @returns Currency
	 */ 
	function GetCurrency($currencyId)
	{
		$result = $this->sendRequest("GetCurrency", array("CurrencyId"=>$currencyId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the Our currency object if currency is enabled
	 *
	 *
	 *@return: Our currency
	 */
	function GetOurCurrency()
	{
		$result = $this->sendRequest("GetOurCurrency", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Recalculates the amount to the new currency.
	 *
	 *@$amount		The amount in the old currency
	 *@$fromCurrency		The old currency
	 *@$toCurrency		The new currency
	 *
	 *@return: Amount in new currency
	 */
	function ChangeCurrency($amount, $fromCurrency, $toCurrency)
	{
		$result = $this->sendRequest("ChangeCurrency", array("Amount"=>$amount, "FromCurrency"=>$fromCurrency, "ToCurrency"=>$toCurrency));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *
	 *@return: 
	 */
	function GetOwnerCompanysCurrency()
	{
		$result = $this->sendRequest("GetOwnerCompanysCurrency", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a CurrencyEntity object.
	 * 
	 * @$currencyEntityId		The identifier of the CurrencyEntity object
	 *
	 * @returns CurrencyEntity
	 */ 
	function GetCurrencyEntity($currencyEntityId)
	{
		$result = $this->sendRequest("GetCurrencyEntity", array("CurrencyEntityId"=>$currencyEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the base currency
	 *
	 *
	 *@return: 
	 */
	function GetBaseCurrency()
	{
		$result = $this->sendRequest("GetBaseCurrency", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a AmountClassEntity object.
	 * 
	 * @$amountClassEntityId		The identifier of the AmountClassEntity object
	 *
	 * @returns AmountClassEntity
	 */ 
	function GetAmountClassEntity($amountClassEntityId)
	{
		$result = $this->sendRequest("GetAmountClassEntity", array("AmountClassEntityId"=>$amountClassEntityId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Currency objects.
	 * 
	 * @$currencyIds		The identifiers of the Currency object
	 *
	 * @returns Array of Currency objects
	 */ 
	function GetCurrencyList($currencyIds)
	{
		$result = $this->sendRequest("GetCurrencyList", array("CurrencyIds"=>$currencyIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all currencies
	 *
	 *
	 *@return: Array of currencies
	 */
	function GetCurrencies()
	{
		$result = $this->sendRequest("GetCurrencies", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a CustomerLanguage object.
	 * 
	 * @$customerLanguageId		The identifier of the CustomerLanguage object
	 *
	 * @returns CustomerLanguage
	 */ 
	function GetCustomerLanguage($customerLanguageId)
	{
		$result = $this->sendRequest("GetCustomerLanguage", array("CustomerLanguageId"=>$customerLanguageId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of CustomerLanguage objects.
	 * 
	 * @$customerLanguageIds		The identifiers of the CustomerLanguage object
	 *
	 * @returns Array of CustomerLanguage objects
	 */ 
	function GetCustomerLanguageList($customerLanguageIds)
	{
		$result = $this->sendRequest("GetCustomerLanguageList", array("CustomerLanguageIds"=>$customerLanguageIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *
	 *@return: 
	 */
	function GetCustomerLanguages()
	{
		$result = $this->sendRequest("GetCustomerLanguages", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Department object.
	 * 
	 * @$departmentId		The identifier of the Department object
	 *
	 * @returns Department
	 */ 
	function GetDepartment($departmentId)
	{
		$result = $this->sendRequest("GetDepartment", array("DepartmentId"=>$departmentId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Department objects.
	 * 
	 * @$departmentIds		The identifiers of the Department object
	 *
	 * @returns Array of Department objects
	 */ 
	function GetDepartmentList($departmentIds)
	{
		$result = $this->sendRequest("GetDepartmentList", array("DepartmentIds"=>$departmentIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Getting all departments/user groups for the internal phone list with the user's colleagues.
	 *
	 *
	 *@return: Returns all departments.
	 */
	function GetDepartments()
	{
		$result = $this->sendRequest("GetDepartments", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a DocumentTemplate object.
	 * 
	 * @$documentTemplateId		The identifier of the DocumentTemplate object
	 *
	 * @returns DocumentTemplate
	 */ 
	function GetDocumentTemplate($documentTemplateId)
	{
		$result = $this->sendRequest("GetDocumentTemplate", array("DocumentTemplateId"=>$documentTemplateId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of DocumentTemplate objects.
	 * 
	 * @$documentTemplateIds		The identifiers of the DocumentTemplate object
	 *
	 * @returns Array of DocumentTemplate objects
	 */ 
	function GetDocumentTemplateList($documentTemplateIds)
	{
		$result = $this->sendRequest("GetDocumentTemplateList", array("DocumentTemplateIds"=>$documentTemplateIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all available document templates
	 *
	 *
	 *@return: Array of DocumentTemplates
	 */
	function GetDocumentTemplates()
	{
		$result = $this->sendRequest("GetDocumentTemplates", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a HeadingEntity object.
	 * 
	 * @$headingEntityId		The identifier of the HeadingEntity object
	 *
	 * @returns HeadingEntity
	 */ 
	function GetHeadingEntity($headingEntityId)
	{
		$result = $this->sendRequest("GetHeadingEntity", array("HeadingEntityId"=>$headingEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a heading for the specified list defintion
	 *
	 *@$udListDefinitionId		The id of the list definition, indicating which list to get the item from
	 *
	 *@return: The loaded heading
	 */
	function CreateDefaultHeadingFromListDefinition($udListDefinitionId)
	{
		$result = $this->sendRequest("CreateDefaultHeadingFromListDefinition", array("UdListDefinitionId"=>$udListDefinitionId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a LanguageInfo object.
	 * 
	 * @$languageInfoId		The identifier of the LanguageInfo object
	 *
	 * @returns LanguageInfo
	 */ 
	function GetLanguageInfo($languageInfoId)
	{
		$result = $this->sendRequest("GetLanguageInfo", array("LanguageInfoId"=>$languageInfoId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of LanguageInfo objects.
	 * 
	 * @$languageInfoIds		The identifiers of the LanguageInfo object
	 *
	 * @returns Array of LanguageInfo objects
	 */ 
	function GetLanguageInfoList($languageInfoIds)
	{
		$result = $this->sendRequest("GetLanguageInfoList", array("LanguageInfoIds"=>$languageInfoIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the list of all languages installed in this database.
	 *
	 *
	 *@return: Array of installed languages
	 */
	function GetInstalledLanguages()
	{
		$result = $this->sendRequest("GetInstalledLanguages", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Link object.
	 * 
	 * @$linkId		The identifier of the Link object
	 *
	 * @returns Link
	 */ 
	function GetLink($linkId)
	{
		$result = $this->sendRequest("GetLink", array("LinkId"=>$linkId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Link objects.
	 * 
	 * @$linkIds		The identifiers of the Link object
	 *
	 * @returns Array of Link objects
	 */ 
	function GetLinkList($linkIds)
	{
		$result = $this->sendRequest("GetLinkList", array("LinkIds"=>$linkIds));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ListEntity object.
	 * 
	 * @$listEntityId		The identifier of the ListEntity object
	 *
	 * @returns ListEntity
	 */ 
	function GetListEntity($listEntityId)
	{
		$result = $this->sendRequest("GetListEntity", array("ListEntityId"=>$listEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a list item for the specified list defintion
	 *
	 *@$id		The identity of the list item to load
	 *@$udListDefinitionId		The id of the list definition, indicating which list to get the item from
	 *
	 *@return: The loaded list item
	 */
	function GetFromListDefinition($id, $udListDefinitionId)
	{
		$result = $this->sendRequest("GetFromListDefinition", array("Id"=>$id, "UdListDefinitionId"=>$udListDefinitionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Sort the list items in a given list alphabetically
	 *
	 *@$udListDefinitionId		Id of the list you want to sort
	 *@$cultureName		Sort list in this language
	 *
	 *@return: 
	 */
	function SortListItems($udListDefinitionId, $cultureName)
	{
		$result = $this->sendRequest("SortListItems", array("UdListDefinitionId"=>$udListDefinitionId, "CultureName"=>$cultureName));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Move a list item up or down in the list based on rank
	 *
	 *@$udListDefinitionId		Id of the list
	 *@$listItemId		Id of the list item
	 *@$direction		-1 moves the item up one position, 1 moves the item down one position
	 *
	 *@return: 
	 */
	function MoveListItem($udListDefinitionId, $listItemId, $direction)
	{
		$result = $this->sendRequest("MoveListItem", array("UdListDefinitionId"=>$udListDefinitionId, "ListItemId"=>$listItemId, "Direction"=>$direction));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Gets a selectable MDO list of the user groups for this list item
	 *
	 *@$udListDefinitionId		The id of the list
	 *@$listItemId		The id of the list item
	 *
	 *@return: Array of user groups
	 */
	function GetVisibleForUserGroups($udListDefinitionId, $listItemId)
	{
		$result = $this->sendRequest("GetVisibleForUserGroups", array("UdListDefinitionId"=>$udListDefinitionId, "ListItemId"=>$listItemId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Set a group which this list item should be visible for
	 *
	 *@$udListDefinitionId		The id of the list
	 *@$listItemId		The id of the list item
	 *@$userGroupId		The id of the user group to set for this list item
	 *@$enable		Set to true to enable, false to disable
	 *
	 *@return: 
	 */
	function SetVisibleForUserGroup($udListDefinitionId, $listItemId, $userGroupId, $enable)
	{
		$result = $this->sendRequest("SetVisibleForUserGroup", array("UdListDefinitionId"=>$udListDefinitionId, "ListItemId"=>$listItemId, "UserGroupId"=>$userGroupId, "Enable"=>$enable));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Gets a selectable MDO list of the headings for this list item
	 *
	 *@$udListDefinitionId		The id of the list
	 *@$listItemId		The id of the list item
	 *@$showDeleted		Set to true if you want deleted headings
	 *
	 *@return: Array of headings
	 */
	function GetHeadings($udListDefinitionId, $listItemId, $showDeleted)
	{
		$result = $this->sendRequest("GetHeadings", array("UdListDefinitionId"=>$udListDefinitionId, "ListItemId"=>$listItemId, "ShowDeleted"=>$showDeleted));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Set headings which this list item should be listed under
	 *
	 *@$udListDefinitionId		The id of the list
	 *@$listItemId		The id of the list item
	 *@$headingIds		The ids of the headings to set for this list item
	 *@$enable		Set to true to enable, false to disable
	 *
	 *@return: 
	 */
	function SetHeadingsForListItem($udListDefinitionId, $listItemId, $headingIds, $enable)
	{
		$result = $this->sendRequest("SetHeadingsForListItem", array("UdListDefinitionId"=>$udListDefinitionId, "ListItemId"=>$listItemId, "HeadingIds"=>$headingIds, "Enable"=>$enable));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Set rank order on headings
	 *
	 *@$udListDefinitionId		The id of the list
	 *@$headingIds		The ids of the headings in the order you want
	 *
	 *@return: 
	 */
	function SetRankOnHeadings($udListDefinitionId, $headingIds)
	{
		$result = $this->sendRequest("SetRankOnHeadings", array("UdListDefinitionId"=>$udListDefinitionId, "HeadingIds"=>$headingIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Set rank order on sale activity
	 *
	 *@$saleTypeStageLinkId		The id of the list
	 *@$itemsIds		The ids of the items in the order you want
	 *
	 *@return: 
	 */
	function SetRankOnSaleActivity($saleTypeStageLinkId, $itemsIds)
	{
		$result = $this->sendRequest("SetRankOnSaleActivity", array("SaleTypeStageLinkId"=>$saleTypeStageLinkId, "ItemsIds"=>$itemsIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Set rank order on project document
	 *
	 *@$saleTypeStageLinkId		The id of the list
	 *@$itemsIds		The ids of the items in the order you want
	 *
	 *@return: 
	 */
	function SetRankOnSaleDocument($saleTypeStageLinkId, $itemsIds)
	{
		$result = $this->sendRequest("SetRankOnSaleDocument", array("SaleTypeStageLinkId"=>$saleTypeStageLinkId, "ItemsIds"=>$itemsIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Set rank order on project activity
	 *
	 *@$projectTypeStatusLinkId		The id of the list
	 *@$itemsIds		The ids of the items in the order you want
	 *
	 *@return: 
	 */
	function SetRankOnProjectActivity($projectTypeStatusLinkId, $itemsIds)
	{
		$result = $this->sendRequest("SetRankOnProjectActivity", array("ProjectTypeStatusLinkId"=>$projectTypeStatusLinkId, "ItemsIds"=>$itemsIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Set rank order on project document
	 *
	 *@$projectTypeStatusLinkId		The id of the list
	 *@$itemsIds		The ids of the items in the order you want
	 *
	 *@return: 
	 */
	function SetRankOnProjectDocument($projectTypeStatusLinkId, $itemsIds)
	{
		$result = $this->sendRequest("SetRankOnProjectDocument", array("ProjectTypeStatusLinkId"=>$projectTypeStatusLinkId, "ItemsIds"=>$itemsIds));	
		return $this->getResultFromResponse($result, true);
	}

	/**
	 * Summary
	 * Gets a LocalizedText object.
	 * 
	 * @$localizedTextId		The identifier of the LocalizedText object
	 *
	 * @returns LocalizedText
	 */ 
	function GetLocalizedText($localizedTextId)
	{
		$result = $this->sendRequest("GetLocalizedText", array("LocalizedTextId"=>$localizedTextId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns a localized text based on the resource id for the selected language.
	 *
	 *@$textType		Type of the localized text
	 *@$resourceId		The resource id. This id has different meaning based on the LocalizedTextType.
	 *@$languageId		The LCID number of the language.
	 *
	 *@return: A LocalizedText carrier.
	 */
	function GetLocalizedTextByType($textType, $resourceId, $languageId)
	{
		$result = $this->sendRequest("GetLocalizedTextByType", array("TextType"=>$textType, "ResourceId"=>$resourceId, "LanguageId"=>$languageId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of LocalizedText objects.
	 * 
	 * @$localizedTextIds		The identifiers of the LocalizedText object
	 *
	 * @returns Array of LocalizedText objects
	 */ 
	function GetLocalizedTextList($localizedTextIds)
	{
		$result = $this->sendRequest("GetLocalizedTextList", array("LocalizedTextIds"=>$localizedTextIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets all localized texts in the CRM database.
	 *
	 *
	 *@return: Array of LocalizedText objects
	 */
	function GetLocalizedTexts()
	{
		$result = $this->sendRequest("GetLocalizedTexts", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets all localized text belonging to a specific language.
	 *
	 *@$languageId		The LCID number of the language.
	 *
	 *@return: Array of LocalizedText objects
	 */
	function GetLocalizedTextsByLanguageId($languageId)
	{
		$result = $this->sendRequest("GetLocalizedTextsByLanguageId", array("LanguageId"=>$languageId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets localized text by their type
	 *
	 *@$textTypes		Array of LocalizedTextTypes. If null all texts are returned.
	 *
	 *@return: Array of LocalizedText objects
	 */
	function GetLocalizedTextsByType($textTypes)
	{
		$result = $this->sendRequest("GetLocalizedTextsByType", array("TextTypes"=>$textTypes));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a MrMrs object.
	 * 
	 * @$mrMrsId		The identifier of the MrMrs object
	 *
	 * @returns MrMrs
	 */ 
	function GetMrMrs($mrMrsId)
	{
		$result = $this->sendRequest("GetMrMrs", array("MrMrsId"=>$mrMrsId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of MrMrs objects.
	 * 
	 * @$mrMrsIds		The identifiers of the MrMrs object
	 *
	 * @returns Array of MrMrs objects
	 */ 
	function GetMrMrsList($mrMrsIds)
	{
		$result = $this->sendRequest("GetMrMrsList", array("MrMrsIds"=>$mrMrsIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all Items from the MrMrs table sorted by their value.
	 *
	 *
	 *@return: All items from the MrMrs table sorted by their value
	 */
	function GetMrMrses()
	{
		$result = $this->sendRequest("GetMrMrses", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Position object.
	 * 
	 * @$positionId		The identifier of the Position object
	 *
	 * @returns Position
	 */ 
	function GetPosition($positionId)
	{
		$result = $this->sendRequest("GetPosition", array("PositionId"=>$positionId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Position objects.
	 * 
	 * @$positionIds		The identifiers of the Position object
	 *
	 * @returns Array of Position objects
	 */ 
	function GetPositionList($positionIds)
	{
		$result = $this->sendRequest("GetPositionList", array("PositionIds"=>$positionIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all the positions a person could have.
	 *
	 *
	 *@return: An array of all available positions
	 */
	function GetPositions()
	{
		$result = $this->sendRequest("GetPositions", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Priority object.
	 * 
	 * @$priorityId		The identifier of the Priority object
	 *
	 * @returns Priority
	 */ 
	function GetPriority($priorityId)
	{
		$result = $this->sendRequest("GetPriority", array("PriorityId"=>$priorityId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Priority objects.
	 * 
	 * @$priorityIds		The identifiers of the Priority object
	 *
	 * @returns Array of Priority objects
	 */ 
	function GetPriorityList($priorityIds)
	{
		$result = $this->sendRequest("GetPriorityList", array("PriorityIds"=>$priorityIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all priorities an appointment could have.
	 *
	 *
	 *@return: An array of all available priorities
	 */
	function GetPriorities()
	{
		$result = $this->sendRequest("GetPriorities", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ProjectStatus object.
	 * 
	 * @$projectStatusId		The identifier of the ProjectStatus object
	 *
	 * @returns ProjectStatus
	 */ 
	function GetProjectStatus($projectStatusId)
	{
		$result = $this->sendRequest("GetProjectStatus", array("ProjectStatusId"=>$projectStatusId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes a project status
	 *
	 *@$projectStatusId		The project status id to delete
	 *
	 *@return: No return
	 */
	function DeleteProjectStatus($projectStatusId)
	{
		$result = $this->sendRequest("DeleteProjectStatus", array("ProjectStatusId"=>$projectStatusId));	
		return $this->getResultFromResponse($result, true);
	}

	/**
	 * Summary
	 * Gets an array of ProjectStatus objects.
	 * 
	 * @$projectStatusIds		The identifiers of the ProjectStatus object
	 *
	 * @returns Array of ProjectStatus objects
	 */ 
	function GetProjectStatusList($projectStatusIds)
	{
		$result = $this->sendRequest("GetProjectStatusList", array("ProjectStatusIds"=>$projectStatusIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets all items from the Project Status (ProjStatus) table.
	 *
	 *
	 *@return: List of all Project statuses.
	 */
	function GetProjectStatuses()
	{
		$result = $this->sendRequest("GetProjectStatuses", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ProjectType object.
	 * 
	 * @$projectTypeId		The identifier of the ProjectType object
	 *
	 * @returns ProjectType
	 */ 
	function GetProjectType($projectTypeId)
	{
		$result = $this->sendRequest("GetProjectType", array("ProjectTypeId"=>$projectTypeId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ProjectTypeEntity object.
	 * 
	 * @$projectTypeEntityId		The identifier of the ProjectTypeEntity object
	 *
	 * @returns ProjectTypeEntity
	 */ 
	function GetProjectTypeEntity($projectTypeEntityId)
	{
		$result = $this->sendRequest("GetProjectTypeEntity", array("ProjectTypeEntityId"=>$projectTypeEntityId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of ProjectType objects.
	 * 
	 * @$projectTypeIds		The identifiers of the ProjectType object
	 *
	 * @returns Array of ProjectType objects
	 */ 
	function GetProjectTypeList($projectTypeIds)
	{
		$result = $this->sendRequest("GetProjectTypeList", array("ProjectTypeIds"=>$projectTypeIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets all items from the Project Type (ProjType) table.
	 *
	 *
	 *@return: List of all project types.
	 */
	function GetProjectTypes()
	{
		$result = $this->sendRequest("GetProjectTypes", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Rating object.
	 * 
	 * @$ratingId		The identifier of the Rating object
	 *
	 * @returns Rating
	 */ 
	function GetRating($ratingId)
	{
		$result = $this->sendRequest("GetRating", array("RatingId"=>$ratingId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Rating objects.
	 * 
	 * @$ratingIds		The identifiers of the Rating object
	 *
	 * @returns Array of Rating objects
	 */ 
	function GetRatingList($ratingIds)
	{
		$result = $this->sendRequest("GetRatingList", array("RatingIds"=>$ratingIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all ratings
	 *
	 *
	 *@return: Array of ratings
	 */
	function GetRatings()
	{
		$result = $this->sendRequest("GetRatings", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Reason object.
	 * 
	 * @$reasonId		The identifier of the Reason object
	 *
	 * @returns Reason
	 */ 
	function GetReason($reasonId)
	{
		$result = $this->sendRequest("GetReason", array("ReasonId"=>$reasonId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Reason objects.
	 * 
	 * @$reasonIds		The identifiers of the Reason object
	 *
	 * @returns Array of Reason objects
	 */ 
	function GetReasonList($reasonIds)
	{
		$result = $this->sendRequest("GetReasonList", array("ReasonIds"=>$reasonIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all reasons
	 *
	 *
	 *@return: Array of reasons
	 */
	function GetReasons()
	{
		$result = $this->sendRequest("GetReasons", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ReasonSold object.
	 * 
	 * @$reasonSoldId		The identifier of the ReasonSold object
	 *
	 * @returns ReasonSold
	 */ 
	function GetReasonSold($reasonSoldId)
	{
		$result = $this->sendRequest("GetReasonSold", array("ReasonSoldId"=>$reasonSoldId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of ReasonSold objects.
	 * 
	 * @$reasonSoldIds		The identifiers of the ReasonSold object
	 *
	 * @returns Array of ReasonSold objects
	 */ 
	function GetReasonSoldList($reasonSoldIds)
	{
		$result = $this->sendRequest("GetReasonSoldList", array("ReasonSoldIds"=>$reasonSoldIds));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ReasonStalled object.
	 * 
	 * @$reasonStalledId		The identifier of the ReasonStalled object
	 *
	 * @returns ReasonStalled
	 */ 
	function GetReasonStalled($reasonStalledId)
	{
		$result = $this->sendRequest("GetReasonStalled", array("ReasonStalledId"=>$reasonStalledId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of ReasonStalled objects.
	 * 
	 * @$reasonStalledIds		The identifiers of the ReasonStalled object
	 *
	 * @returns Array of ReasonStalled objects
	 */ 
	function GetReasonStalledList($reasonStalledIds)
	{
		$result = $this->sendRequest("GetReasonStalledList", array("ReasonStalledIds"=>$reasonStalledIds));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ResourceEntity object.
	 * 
	 * @$resourceEntityId		The identifier of the ResourceEntity object
	 *
	 * @returns ResourceEntity
	 */ 
	function GetResourceEntity($resourceEntityId)
	{
		$result = $this->sendRequest("GetResourceEntity", array("ResourceEntityId"=>$resourceEntityId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a SaleStageEntity object.
	 * 
	 * @$saleStageEntityId		The identifier of the SaleStageEntity object
	 *
	 * @returns SaleStageEntity
	 */ 
	function GetSaleStageEntity($saleStageEntityId)
	{
		$result = $this->sendRequest("GetSaleStageEntity", array("SaleStageEntityId"=>$saleStageEntityId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a SaleType object.
	 * 
	 * @$saleTypeId		The identifier of the SaleType object
	 *
	 * @returns SaleType
	 */ 
	function GetSaleType($saleTypeId)
	{
		$result = $this->sendRequest("GetSaleType", array("SaleTypeId"=>$saleTypeId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a SaleTypeEntity object.
	 * 
	 * @$saleTypeEntityId		The identifier of the SaleTypeEntity object
	 *
	 * @returns SaleTypeEntity
	 */ 
	function GetSaleTypeEntity($saleTypeEntityId)
	{
		$result = $this->sendRequest("GetSaleTypeEntity", array("SaleTypeEntityId"=>$saleTypeEntityId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of SaleType objects.
	 * 
	 * @$saleTypeIds		The identifiers of the SaleType object
	 *
	 * @returns Array of SaleType objects
	 */ 
	function GetSaleTypeList($saleTypeIds)
	{
		$result = $this->sendRequest("GetSaleTypeList", array("SaleTypeIds"=>$saleTypeIds));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a SelectionCategory object.
	 * 
	 * @$selectionCategoryId		The identifier of the SelectionCategory object
	 *
	 * @returns SelectionCategory
	 */ 
	function GetSelectionCategory($selectionCategoryId)
	{
		$result = $this->sendRequest("GetSelectionCategory", array("SelectionCategoryId"=>$selectionCategoryId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of SelectionCategory objects.
	 * 
	 * @$selectionCategoryIds		The identifiers of the SelectionCategory object
	 *
	 * @returns Array of SelectionCategory objects
	 */ 
	function GetSelectionCategoryList($selectionCategoryIds)
	{
		$result = $this->sendRequest("GetSelectionCategoryList", array("SelectionCategoryIds"=>$selectionCategoryIds));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Source object.
	 * 
	 * @$sourceId		The identifier of the Source object
	 *
	 * @returns Source
	 */ 
	function GetSource($sourceId)
	{
		$result = $this->sendRequest("GetSource", array("SourceId"=>$sourceId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Source objects.
	 * 
	 * @$sourceIds		The identifiers of the Source object
	 *
	 * @returns Array of Source objects
	 */ 
	function GetSourceList($sourceIds)
	{
		$result = $this->sendRequest("GetSourceList", array("SourceIds"=>$sourceIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all sources
	 *
	 *
	 *@return: Array of sources
	 */
	function GetSources()
	{
		$result = $this->sendRequest("GetSources", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Task object.
	 * 
	 * @$taskId		The identifier of the Task object
	 *
	 * @returns Task
	 */ 
	function GetTask($taskId)
	{
		$result = $this->sendRequest("GetTask", array("TaskId"=>$taskId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns a Document Template list item as a TaskListItem. The appointment's task is a Document template item when the appointment is a document.
	 *
	 *@$documentTemplateId		Id of the document template, i.e. the Appointment.TaskIdx
	 *
	 *@return: Document Template item as TaskListItem.
	 */
	function GetDocumentTemplateTask($documentTemplateId)
	{
		$result = $this->sendRequest("GetDocumentTemplateTask", array("DocumentTemplateId"=>$documentTemplateId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Task objects.
	 * 
	 * @$taskIds		The identifiers of the Task object
	 *
	 * @returns Array of Task objects
	 */ 
	function GetTaskList($taskIds)
	{
		$result = $this->sendRequest("GetTaskList", array("TaskIds"=>$taskIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all appointment tasks
	 *
	 *
	 *@return: An array of all available tasks
	 */
	function GetTasks()
	{
		$result = $this->sendRequest("GetTasks", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * The appointment's task is a Document template item when the appointment is a document.
	 *
	 *
	 *@return: Document Template list as a array of Tasks
	 */
	function GetDocumentTemplatesTasks()
	{
		$result = $this->sendRequest("GetDocumentTemplatesTasks", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a TicketPriority object.
	 * 
	 * @$ticketPriorityId		The identifier of the TicketPriority object
	 *
	 * @returns TicketPriority
	 */ 
	function GetTicketPriority($ticketPriorityId)
	{
		$result = $this->sendRequest("GetTicketPriority", array("TicketPriorityId"=>$ticketPriorityId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of TicketPriority objects.
	 * 
	 * @$ticketPriorityIds		The identifiers of the TicketPriority object
	 *
	 * @returns Array of TicketPriority objects
	 */ 
	function GetTicketPriorityList($ticketPriorityIds)
	{
		$result = $this->sendRequest("GetTicketPriorityList", array("TicketPriorityIds"=>$ticketPriorityIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *
	 *@return: 
	 */
	function GetTicketPriorities()
	{
		$result = $this->sendRequest("GetTicketPriorities", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a WebPanelEntity object.
	 * 
	 * @$webPanelEntityId		The identifier of the WebPanelEntity object
	 *
	 * @returns WebPanelEntity
	 */ 
	function GetWebPanelEntity($webPanelEntityId)
	{
		$result = $this->sendRequest("GetWebPanelEntity", array("WebPanelEntityId"=>$webPanelEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * This methods generates the navigation URL to be used to navigate to the panel
	 *
	 *@$visibleIn		The visble in/navigation to generate for
	 *@$windowName		The name of the web panel window
	 *
	 *@return: The navigation url
	 */
	function GenerateNavigationUrl($visibleIn, $windowName)
	{
		$result = $this->sendRequest("GenerateNavigationUrl", array("VisibleIn"=>$visibleIn, "WindowName"=>$windowName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Return a list of all web panels. 
	 *
	 *
	 *@return: List of all web panels
	 */
	function GetWebPanelList()
	{
		$result = $this->sendRequest("GetWebPanelList", array());	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a DocumentTemplateEntity object.
	 * 
	 * @$documentTemplateEntityId		The identifier of the DocumentTemplateEntity object
	 *
	 * @returns DocumentTemplateEntity
	 */ 
	function GetDocumentTemplateEntity($documentTemplateEntityId)
	{
		$result = $this->sendRequest("GetDocumentTemplateEntity", array("DocumentTemplateEntityId"=>$documentTemplateEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Store a document template from its stream. Since there is a potential for a name conflict (the file name stored by the document entity earlier may prove to be invalid), the (possibly amended) document entity is returned. The client should not assume that any earlier, cached entity information is valid.
	 *
	 *@$documentTemplateEntity		The document entity object that the binary data (document) should be stored to. Its file name may be amended by this call, see the return value
	 *@$stream		The document as a stream. (Using a serializable type: byte[]
	 *@$languageCode		The language code ('en-US', 'nb-NO', etc). Use empty string if not supported or used.
	 *@$pluginId		The plugin id to store the template with. 0 for SOArc
	 *
	 *@return: Since there is a potential for a name conflict (the file name stored by the document entity earlier may prove to be invalid), the (possibly amended) document entity is returned. The client should not assume that any earlier, cached entity information is valid.
	 */
	function SetDocumentTemplateStream($documentTemplateEntity, $stream, $languageCode, $pluginId)
	{
		$result = $this->sendRequest("SetDocumentTemplateStream", array("DocumentTemplateEntity"=>$documentTemplateEntity, "Stream"=>$stream, "LanguageCode"=>$languageCode, "PluginId"=>$pluginId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a String array of names in sales guide that this template is used in
	 *
	 *@$documentTemplateId		The id of the template
	 *
	 *@return: The name of the salesguides that use this template
	 */
	function GetDocumentTemplateUsedInSalesStage($documentTemplateId)
	{
		$result = $this->sendRequest("GetDocumentTemplateUsedInSalesStage", array("DocumentTemplateId"=>$documentTemplateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a String array of names in project guide that this template is used in
	 *
	 *@$documentTemplateId		The id of the template
	 *
	 *@return: The name of the projectguides that use this template
	 */
	function GetDocumentTemplateUsedInProjectStage($documentTemplateId)
	{
		$result = $this->sendRequest("GetDocumentTemplateUsedInProjectStage", array("DocumentTemplateId"=>$documentTemplateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a url to the document template
	 *
	 *@$documentTemplateId		The id of the template
	 *@$writableUrl		Get a writeable url to the document template?
	 *@$languageCode		The language code ('en-US', 'nb-NO', etc). Use empty string if not supported or used.
	 *
	 *@return: The URL to the document template
	 */
	function GetDocumentTemplateUrl($documentTemplateId, $writableUrl, $languageCode)
	{
		$result = $this->sendRequest("GetDocumentTemplateUrl", array("DocumentTemplateId"=>$documentTemplateId, "WritableUrl"=>$writableUrl, "LanguageCode"=>$languageCode));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get document template properties
	 *
	 *@$documentTemplateId		The primary key id of the document template
	 *@$requestedProperties		An array of properties to get the values for
	 *
	 *@return: Dictionary of key=value pairs of requested properties
	 */
	function GetDocumentTemplateProperties($documentTemplateId, $requestedProperties)
	{
		$result = $this->sendRequest("GetDocumentTemplateProperties", array("DocumentTemplateId"=>$documentTemplateId, "RequestedProperties"=>$requestedProperties));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the supported languages for a document template
	 *
	 *@$documentTemplateId		The id of the document template
	 *
	 *@return: Returns the languages as ISO cultures (en-US, no)
	 */
	function GetDocumentTemplateLanguages($documentTemplateId)
	{
		$result = $this->sendRequest("GetDocumentTemplateLanguages", array("DocumentTemplateId"=>$documentTemplateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a new document template language based on an existing template
	 *
	 *@$documentTemplateId		The id of the document template
	 *@$languageCode		The language code ('en-US, 'nb-NO', etc)
	 *
	 *@return: Returns nothing - throws on error
	 */
	function CreateDefaultDocumentTemplateLanguage($documentTemplateId, $languageCode)
	{
		$result = $this->sendRequest("CreateDefaultDocumentTemplateLanguage", array("DocumentTemplateId"=>$documentTemplateId, "LanguageCode"=>$languageCode));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Deletes language variant of the document template
	 *
	 *@$documentTemplateId		The id of the document template
	 *@$languageCode		The language code ('en-US, 'nb-NO', etc)
	 *
	 *@return: 
	 */
	function DeleteDocumentTemplateLanguage($documentTemplateId, $languageCode)
	{
		$result = $this->sendRequest("DeleteDocumentTemplateLanguage", array("DocumentTemplateId"=>$documentTemplateId, "LanguageCode"=>$languageCode));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get the file extension for the document template
	 *
	 *@$documentTemplateId		The primary key of the document template
	 *
	 *@return: Extension including '.'
	 */
	function GetDocumentTemplateExtension($documentTemplateId)
	{
		$result = $this->sendRequest("GetDocumentTemplateExtension", array("DocumentTemplateId"=>$documentTemplateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a new document template based on another template
	 *
	 *@$sourceDocumentTemplateId		The document template to copy contents from.
	 *@$documentTemplateEntity		The new document template entity
	 *
	 *@return: The new document template entity
	 */
	function SetDocumentTemplateFromDocumentTemplate($sourceDocumentTemplateId, $documentTemplateEntity)
	{
		$result = $this->sendRequest("SetDocumentTemplateFromDocumentTemplate", array("SourceDocumentTemplateId"=>$sourceDocumentTemplateId, "DocumentTemplateEntity"=>$documentTemplateEntity));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a RelationDefinitionEntity object.
	 * 
	 * @$relationDefinitionEntityId		The identifier of the RelationDefinitionEntity object
	 *
	 * @returns RelationDefinitionEntity
	 */ 
	function GetRelationDefinitionEntity($relationDefinitionEntityId)
	{
		$result = $this->sendRequest("GetRelationDefinitionEntity", array("RelationDefinitionEntityId"=>$relationDefinitionEntityId));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

