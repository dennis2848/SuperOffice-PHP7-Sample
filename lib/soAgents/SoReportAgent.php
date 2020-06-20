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

		
class SoReportAgent extends SoAgent
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
        parent::__construct($endpoint."Report.svc", "WcfReport.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new ReportEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ReportEntity with default values
     */
     function CreateDefaultReportEntity()
     {
		$result = $this->sendRequest("CreateDefaultReportEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing ReportEntity or creates a new ReportEntity if the id parameter is empty
     * 
     * @return New or updated ReportEntity
     */
	function SaveReportEntity($reportEntity)
	{
		$result = $this->sendRequest("SaveReportEntity", array("ReportEntity"=>$reportEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new ReportLabelLayoutEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ReportLabelLayoutEntity with default values
     */
     function CreateDefaultReportLabelLayoutEntity()
     {
		$result = $this->sendRequest("CreateDefaultReportLabelLayoutEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing ReportLabelLayoutEntity or creates a new ReportLabelLayoutEntity if the id parameter is empty
     * 
     * @return New or updated ReportLabelLayoutEntity
     */
	function SaveReportLabelLayoutEntity($reportLabelLayoutEntity)
	{
		$result = $this->sendRequest("SaveReportLabelLayoutEntity", array("ReportLabelLayoutEntity"=>$reportLabelLayoutEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the ReportLabelLayoutEntity
	 * 
	 * @$reportLabelLayoutEntityId		The identity of the ReportLabelLayoutEntity
	 */
	function DeleteReportLabelLayoutEntity($reportLabelLayoutEntityId)
	{
		$result = $this->sendRequest("DeleteReportLabelLayoutEntity", array("ReportLabelLayoutEntity"=>$reportLabelLayoutEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

	/**
	 * Summary
	 * Gets a ReportEntity object.
	 * 
	 * @$reportEntityId		The identifier of the ReportEntity object
	 *
	 * @returns ReportEntity
	 */ 
	function GetReportEntity($reportEntityId)
	{
		$result = $this->sendRequest("GetReportEntity", array("ReportEntityId"=>$reportEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates the report as favorite. The sourceId is the key to the report that the favorite is based on.
	 *
	 *@$sourceId		The primary key to the report to make the favorite from.
	 *@$name		The name of the new favorite.
	 *@$description		The description of the new favorite.
	 *
	 *@return: The new favorite ReportEntity.
	 */
	function CreateFavorite($sourceId, $name, $description)
	{
		$result = $this->sendRequest("CreateFavorite", array("SourceId"=>$sourceId, "Name"=>$name, "Description"=>$description));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes the report favorite.
	 *
	 *@$reportEntityId		The id of the report favorite to delete.
	 *
	 *@return: 
	 */
	function DeleteFavorite($reportEntityId)
	{
		$result = $this->sendRequest("DeleteFavorite", array("ReportEntityId"=>$reportEntityId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Updates the favorite.
	 *
	 *@$reportEntity		ReportEntity carrier containg updated data.
	 *
	 *@return: The updated ReportEntity carrier.
	 */
	function UpdateFavorite($reportEntity)
	{
		$result = $this->sendRequest("UpdateFavorite", array("ReportEntity"=>$reportEntity));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Generates the report in PDF format
	 *
	 *@$reportId		The id of the report.
	 *@$labelLayoutId		The id of the labellayout. Use 0 if the report isn't of type label.
	 *@$filename		Filename of the report.
	 *@$language		Language to use when generating the report.
	 *@$fileType		
	 *@$restrictions		Use restrictions to provide additional restrictions when generating the report.
	 *
	 *@return: Batch task id, as string. Used to be path to the generated report, but no more.
	 */
	function GenerateReport($reportId, $labelLayoutId, $filename, $language, $fileType, $restrictions)
	{
		$result = $this->sendRequest("GenerateReport", array("ReportId"=>$reportId, "LabelLayoutId"=>$labelLayoutId, "Filename"=>$filename, "Language"=>$language, "FileType"=>$fileType, "Restrictions"=>$restrictions));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Takes the input stream and create a report. This stream must be on a valid xml format
	 *
	 *@$report		The report to import in a correct xml format
	 *
	 *@return: The id of the newly imported report
	 */
	function ImportReport($report)
	{
		$result = $this->sendRequest("ImportReport", array("Report"=>$report));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Delete the report with the given id
	 *
	 *@$reportId		The id of the report to delete
	 *
	 *@return: Delete ok?
	 */
	function DeleteReport($reportId)
	{
		$result = $this->sendRequest("DeleteReport", array("ReportId"=>$reportId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ReportLabelLayoutEntity object.
	 * 
	 * @$reportLabelLayoutEntityId		The identifier of the ReportLabelLayoutEntity object
	 *
	 * @returns ReportLabelLayoutEntity
	 */ 
	function GetReportLabelLayoutEntity($reportLabelLayoutEntityId)
	{
		$result = $this->sendRequest("GetReportLabelLayoutEntity", array("ReportLabelLayoutEntityId"=>$reportLabelLayoutEntityId));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

