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

		
class SoFreeTextAgent extends SoAgent
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
        parent::__construct($endpoint."FreeText.svc", "WcfFreeText.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Returns status for the freetext search words
	 *
	 *
	 *@return: The freetext status
	 */
	function GetStatus()
	{
		$result = $this->sendRequest("GetStatus", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Sets freetext search to enabled (true) or disabled (false)
	 *
	 *@$enabled		If enabled true, else false
	 *
	 *@return: This method has no return value
	 */
	function SetEnabled($enabled)
	{
		$result = $this->sendRequest("SetEnabled", array("Enabled"=>$enabled));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Automatically enable freetext search for new travel areas? true or false
	 *
	 *@$autoEnable		If true, auto enable
	 *
	 *@return: This method has no return value
	 */
	function SetAutoEnableTravelAreas($autoEnable)
	{
		$result = $this->sendRequest("SetAutoEnableTravelAreas", array("AutoEnable"=>$autoEnable));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Sets the operator used when matching single words
	 *
	 *@$freeTextOperator		The operator
	 *
	 *@return: This method has no return value
	 */
	function SetSingleWordOperator($freeTextOperator)
	{
		$result = $this->sendRequest("SetSingleWordOperator", array("FreeTextOperator"=>$freeTextOperator));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Sets the operator used when matching multiple words
	 *
	 *@$freeTextOperator		The operator
	 *
	 *@return: No return value
	 */
	function SetMultiWordOperator($freeTextOperator)
	{
		$result = $this->sendRequest("SetMultiWordOperator", array("FreeTextOperator"=>$freeTextOperator));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns the list of stop words
	 *
	 *
	 *@return: The list of stop words
	 */
	function GetStopWordList()
	{
		$result = $this->sendRequest("GetStopWordList", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Adds the words in the string to the stop word list
	 *
	 *@$stopWords		The stop words to add
	 *
	 *@return: This method has no return value
	 */
	function AddWords($stopWords)
	{
		$result = $this->sendRequest("AddWords", array("StopWords"=>$stopWords));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Delete the stop words with these ids
	 *
	 *@$stopWordIds		The ids of the stopwords to delete
	 *
	 *@return: This method has no return value
	 */
	function DeleteStopWordsById($stopWordIds)
	{
		$result = $this->sendRequest("DeleteStopWordsById", array("StopWordIds"=>$stopWordIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns the top used words in the freetext index table, sorted as most used first
	 *
	 *@$countWords		The count of words that will be returned
	 *
	 *@return: The most used words
	 */
	function GetSuggestedStopWords($countWords)
	{
		$result = $this->sendRequest("GetSuggestedStopWords", array("CountWords"=>$countWords));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Wipe and regenerate the freetext index by scanning the database (freetext search will be unavailable while this operation runs
	 *
	 *@$runAsBatch		If true, then execute the regeneration as a Batch Task; the service call will return immediately. Otherwise wait until the task completes, may cause a timeout if called as a Web Service
	 *
	 *@return: Information about the batch task, if batch execution was requested. Otherwise null
	 */
	function RegenerateIndex($runAsBatch)
	{
		$result = $this->sendRequest("RegenerateIndex", array("RunAsBatch"=>$runAsBatch));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

