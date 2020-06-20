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

		
class SoBatchAgent extends SoAgent
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
        parent::__construct($endpoint."Batch.svc", "WcfBatch.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Get a single BatchTaskInfo based on Id.
	 *
	 *@$id		Id of the BatchTaskInfo to get.
	 *
	 *@return: Returns a BatchTaskInfo.
	 */
	function GetBatchTaskInfo($id)
	{
		$result = $this->sendRequest("GetBatchTaskInfo", array("Id"=>$id));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get an array of BatchTaskInfo for the provided associate id's.
	 *
	 *@$associateIds		Array of associate id's.
	 *
	 *@return: Returns an array of BatchTaskInfo.
	 */
	function GetBatchTaskInfosByAssociates($associateIds)
	{
		$result = $this->sendRequest("GetBatchTaskInfosByAssociates", array("AssociateIds"=>$associateIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Start a batch job based on BatchTaskInfo.
	 *
	 *@$batchTaskInfo		Use BatchTaskInfo to describe the new batch job.
	 *
	 *@return: Returns the id of the created batch job.
	 */
	function StartBatchJob($batchTaskInfo)
	{
		$result = $this->sendRequest("StartBatchJob", array("BatchTaskInfo"=>$batchTaskInfo));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Stop a batch job based on Id.
	 *
	 *@$id		Id of the batch job to stop.
	 *
	 *@return: Returns true if the job was stopped successfully.
	 */
	function StopBatchJob($id)
	{
		$result = $this->sendRequest("StopBatchJob", array("Id"=>$id));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets an array of BatchTaskInfo with state defined by a BatchTaskState.
	 *
	 *@$state		The BatchTaskState to get batch tasks for.
	 *
	 *@return: Returns an array of BatchTaskInfo.
	 */
	function GetBatchTaskInfosByState($state)
	{
		$result = $this->sendRequest("GetBatchTaskInfosByState", array("State"=>$state));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Update information about a BatchTask. Only the following properties can be updated: State, Description, Response and Request.
	 *
	 *@$batchTaskInfo		The updated information to save.
	 *
	 *@return: The updated BatchTaskInfo
	 */
	function UpdateBatchTask($batchTaskInfo)
	{
		$result = $this->sendRequest("UpdateBatchTask", array("BatchTaskInfo"=>$batchTaskInfo));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets an array of BatchTaskInfo with state defined by a BatchTaskState and the batchtask definition name.
	 *
	 *@$name		Batchtask definition name.
	 *@$state		The BatchTaskState to get batch tasks for.
	 *
	 *@return: Returns an array of BatchTaskInfo.
	 */
	function GetBatchTaskInfosByNameAndState($name, $state)
	{
		$result = $this->sendRequest("GetBatchTaskInfosByNameAndState", array("Name"=>$name, "State"=>$state));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get an array of BatchTaskInfo for the provided associate id's and batch task definition name.
	 *
	 *@$name		Batchtask definition name.
	 *@$associateIds		Array of associate id's.
	 *
	 *@return: Returns an array of BatchTaskInfo.
	 */
	function GetBatchTaskInfosByNameAndAssociates($name, $associateIds)
	{
		$result = $this->sendRequest("GetBatchTaskInfosByNameAndAssociates", array("Name"=>$name, "AssociateIds"=>$associateIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get an array of BatchTaskInfo for the provided associate id's and batch task state.
	 *
	 *@$associateIds		Array of associate id's.
	 *@$state		The BatchTaskState to get batch tasks for.
	 *
	 *@return: Returns an array of BatchTaskInfo.
	 */
	function GetBatchTaskInfosByAssociatesAndState($associateIds, $state)
	{
		$result = $this->sendRequest("GetBatchTaskInfosByAssociatesAndState", array("AssociateIds"=>$associateIds, "State"=>$state));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Delete batch tasks from the database.
	 *
	 *@$batchTaskIds		Array of batchTask ids to delete.
	 *
	 *@return: 
	 */
	function DeleteBatchTasks($batchTaskIds)
	{
		$result = $this->sendRequest("DeleteBatchTasks", array("BatchTaskIds"=>$batchTaskIds));	
		return $this->getResultFromResponse($result, true);
	}
        
}
    
   
  

