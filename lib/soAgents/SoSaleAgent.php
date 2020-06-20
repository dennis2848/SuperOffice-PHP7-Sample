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

		
class SoSaleAgent extends SoAgent
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
        parent::__construct($endpoint."Sale.svc", "WcfSale.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new SaleEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New SaleEntity with default values
     */
     function CreateDefaultSaleEntity()
     {
		$result = $this->sendRequest("CreateDefaultSaleEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing SaleEntity or creates a new SaleEntity if the id parameter is empty
     * 
     * @return New or updated SaleEntity
     */
	function SaveSaleEntity($saleEntity)
	{
		$result = $this->sendRequest("SaveSaleEntity", array("SaleEntity"=>$saleEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the SaleEntity
	 * 
	 * @$saleEntityId		The identity of the SaleEntity
	 */
	function DeleteSaleEntity($saleEntityId)
	{
		$result = $this->sendRequest("DeleteSaleEntity", array("SaleEntity"=>$saleEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

    /**
     * Loading default values into a new SaleSummary.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New SaleSummary with default values
     */
     function CreateDefaultSaleSummary()
     {
		$result = $this->sendRequest("CreateDefaultSaleSummary", array());
		return $this->getResultFromResponse($result);
     }
        

	/**
	 * Summary
	 * Gets a Sale object.
	 * 
	 * @$saleId		The identifier of the Sale object
	 *
	 * @returns Sale
	 */ 
	function GetSale($saleId)
	{
		$result = $this->sendRequest("GetSale", array("SaleId"=>$saleId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a SaleEntity object.
	 * 
	 * @$saleEntityId		The identifier of the SaleEntity object
	 *
	 * @returns SaleEntity
	 */ 
	function GetSaleEntity($saleEntityId)
	{
		$result = $this->sendRequest("GetSaleEntity", array("SaleEntityId"=>$saleEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$saleId		
	 *
	 *@return: 
	 */
	function HasGuide($saleId)
	{
		$result = $this->sendRequest("HasGuide", array("SaleId"=>$saleId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the next due date for a sale. The next due date is the a 
	 *
	 *@$saleId		
	 *
	 *@return: 
	 */
	function GetNextDueDate($saleId)
	{
		$result = $this->sendRequest("GetNextDueDate", array("SaleId"=>$saleId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *
	 *@return: 
	 */
	function BatchUpdateNextDueDate()
	{
		$result = $this->sendRequest("BatchUpdateNextDueDate", array());	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Gets the next (not deleted) sale stage id if the current stage is deleted. If the current stage is not deleted, the CurrentStageId is returned
	 *
	 *@$saleId		
	 *@$includeCurrentStage		
	 *
	 *@return: 
	 */
	function GetNextSaleStage($saleId, $includeCurrentStage)
	{
		$result = $this->sendRequest("GetNextSaleStage", array("SaleId"=>$saleId, "IncludeCurrentStage"=>$includeCurrentStage));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$saleId		
	 *
	 *@return: 
	 */
	function HasGuideActivities($saleId)
	{
		$result = $this->sendRequest("HasGuideActivities", array("SaleId"=>$saleId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$appointmentId		
	 *
	 *@return: 
	 */
	function OfferAutoNextStageOnApppointmentCompleted($appointmentId)
	{
		$result = $this->sendRequest("OfferAutoNextStageOnApppointmentCompleted", array("AppointmentId"=>$appointmentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$stageId		
	 *
	 *@return: 
	 */
	function GetProbabilityFromStage($stageId)
	{
		$result = $this->sendRequest("GetProbabilityFromStage", array("StageId"=>$stageId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Checks if the number is unique or required.  The setting is configured from admin under system options.
	 *
	 *@$contactId		
	 *@$number		
	 *
	 *@return: 
	 */
	function IsNumberValid($contactId, $number)
	{
		$result = $this->sendRequest("IsNumberValid", array("ContactId"=>$contactId, "Number"=>$number));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$saleId		
	 *@$saleStakeholders		
	 *
	 *@return: 
	 */
	function AddSaleStakeholders($saleId, $saleStakeholders)
	{
		$result = $this->sendRequest("AddSaleStakeholders", array("SaleId"=>$saleId, "SaleStakeholders"=>$saleStakeholders));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$saleStakeholderIds		
	 *
	 *@return: 
	 */
	function DeleteSaleStakeholders($saleStakeholderIds)
	{
		$result = $this->sendRequest("DeleteSaleStakeholders", array("SaleStakeholderIds"=>$saleStakeholderIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$saleId		
	 *
	 *@return: 
	 */
	function HasStakeholderSetting($saleId)
	{
		$result = $this->sendRequest("HasStakeholderSetting", array("SaleId"=>$saleId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Sale objects.
	 * 
	 * @$saleIds		The identifiers of the Sale object
	 *
	 * @returns Array of Sale objects
	 */ 
	function GetSaleList($saleIds)
	{
		$result = $this->sendRequest("GetSaleList", array("SaleIds"=>$saleIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returning the opportunities (open sales) belonging to the user currently logged on
	 *
	 *@$count		The number of sales that is returned. -1 returns all.
	 *
	 *@return: Array of open sales (opportunities).
	 */
	function GetMyOpportunities($count)
	{
		$result = $this->sendRequest("GetMyOpportunities", array("Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the latest sales (that are sold) limited by their amount. The result is sorted descending with the latest first. If the amount is -1, the amount restriction is omitted.
	 *
	 *@$amountLimit		The amount limit in the local currency.
	 *@$count		The maximum number of items to return. If -1 all are returned.
	 *
	 *@return: Array of all recent sales.
	 */
	function GetRecentSales($amountLimit, $count)
	{
		$result = $this->sendRequest("GetRecentSales", array("AmountLimit"=>$amountLimit, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all open sales, sorted descending with the latest first.  If the weigthed amount is -1, the amount restriction is omitted.
	 *
	 *@$weightedAmountLimit		The amount weighted by the probability that the sale is closed (amount * probability).
	 *@$count		The maximum number of items to return. If -1 all are returned.
	 *
	 *@return: Array of upcoming sales.
	 */
	function GetUpcomingSales($weightedAmountLimit, $count)
	{
		$result = $this->sendRequest("GetUpcomingSales", array("WeightedAmountLimit"=>$weightedAmountLimit, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all sales within a time period. The sales array can be limited by amount and status.
	 *
	 *@$fromDate		The beginning of the time interval.
	 *@$toDate		The end of the time interval.
	 *@$amountLimit		The amount limit in the local currency.  -1 means no amount limit
	 *@$status		The sale status (Lost, Open, Sold, Unknown). SaleStatus.Unknown means no status filtering.
	 *
	 *@return: Array of sales.
	 */
	function GetSalesByDate($fromDate, $toDate, $amountLimit, $status)
	{
		$result = $this->sendRequest("GetSalesByDate", array("FromDate"=>$fromDate, "ToDate"=>$toDate, "AmountLimit"=>$amountLimit, "Status"=>$status));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all open sales for the contact provided.
	 *
	 *@$contactId		The ID of the contact whose sales we want.
	 *
	 *@return: Aray of sales.
	 */
	function GetOpenSalesForContact($contactId)
	{
		$result = $this->sendRequest("GetOpenSalesForContact", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Change the status of one or more Sales to Sold. Note that this does not mark them as Completed.
	 *
	 *@$saleIds		Array of sale ids to be marked as lost. All the normal write access rules apply.
	 *
	 *@return: 
	 */
	function SetAsSold($saleIds)
	{
		$result = $this->sendRequest("SetAsSold", array("SaleIds"=>$saleIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Change the status of one or more sales to Lost. Note that this does not affect the Completed state of the sale.
	 *
	 *@$saleIds		Array of sale ids to be marked as lost. All normal write access rules apply.
	 *
	 *@return: 
	 */
	function SetAsLost($saleIds)
	{
		$result = $this->sendRequest("SetAsLost", array("SaleIds"=>$saleIds));	
		return $this->getResultFromResponse($result, true);
	}

	/**
	 * Summary
	 * Gets a SaleStakeholder object.
	 * 
	 * @$saleStakeholderId		The identifier of the SaleStakeholder object
	 *
	 * @returns SaleStakeholder
	 */ 
	function GetSaleStakeholder($saleStakeholderId)
	{
		$result = $this->sendRequest("GetSaleStakeholder", array("SaleStakeholderId"=>$saleStakeholderId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of SaleStakeholder objects.
	 * 
	 * @$saleStakeholderIds		The identifiers of the SaleStakeholder object
	 *
	 * @returns Array of SaleStakeholder objects
	 */ 
	function GetSaleStakeholderList($saleStakeholderIds)
	{
		$result = $this->sendRequest("GetSaleStakeholderList", array("SaleStakeholderIds"=>$saleStakeholderIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$saleId		
	 *
	 *@return: 
	 */
	function GetSaleStakeholders($saleId)
	{
		$result = $this->sendRequest("GetSaleStakeholders", array("SaleId"=>$saleId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$stakeholders		
	 *
	 *@return: 
	 */
	function UpdateSaleStakeholders($stakeholders)
	{
		$result = $this->sendRequest("UpdateSaleStakeholders", array("Stakeholders"=>$stakeholders));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$saleStakeholderIds		
	 *
	 *@return: 
	 */
	function GetSaleStakeholderById($saleStakeholderIds)
	{
		$result = $this->sendRequest("GetSaleStakeholderById", array("SaleStakeholderIds"=>$saleStakeholderIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$associateId		
	 *@$fromDate		
	 *@$toDate		
	 *
	 *@return: 
	 */
	function GetSummaryByAssociate($associateId, $fromDate, $toDate)
	{
		$result = $this->sendRequest("GetSummaryByAssociate", array("AssociateId"=>$associateId, "FromDate"=>$fromDate, "ToDate"=>$toDate));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$groupId		
	 *@$fromDate		
	 *@$toDate		
	 *
	 *@return: 
	 */
	function GetSummaryByGroup($groupId, $fromDate, $toDate)
	{
		$result = $this->sendRequest("GetSummaryByGroup", array("GroupId"=>$groupId, "FromDate"=>$fromDate, "ToDate"=>$toDate));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$contactId		
	 *@$fromDate		
	 *@$toDate		
	 *
	 *@return: 
	 */
	function GetSummaryByContact($contactId, $fromDate, $toDate)
	{
		$result = $this->sendRequest("GetSummaryByContact", array("ContactId"=>$contactId, "FromDate"=>$fromDate, "ToDate"=>$toDate));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

