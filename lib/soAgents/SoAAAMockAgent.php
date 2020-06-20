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

		
class SoAAAMockAgent extends SoAgent
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
        parent::__construct($endpoint."AAAMock.svc", "WcfAAAMock.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/**
	 * Summary
	 * Gets a AAATestClassForModeling object.
	 * 
	 * @$aAATestClassForModelingId		The identifier of the AAATestClassForModeling object
	 *
	 * @returns AAATestClassForModeling
	 */ 
	function GetAAATestClassForModeling($aAATestClassForModelingId)
	{
		$result = $this->sendRequest("GetAAATestClassForModeling", array("AAATestClassForModelingId"=>$aAATestClassForModelingId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets some FieldMetadatas
	 *
	 *
	 *@return: Some FieldMetadatas
	 */
	function GetDictionaryOfFieldMetadata()
	{
		$result = $this->sendRequest("GetDictionaryOfFieldMetadata", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Test FieldMetadata Dictionary input
	 *
	 *@$fieldMetadataDictionaryArgument		Some FieldMetadata Dictionary argument
	 *
	 *@return: A void return
	 */
	function DictionarFieldMetadataInput($fieldMetadataDictionaryArgument)
	{
		$result = $this->sendRequest("DictionarFieldMetadataInput", array("FieldMetadataDictionaryArgument"=>$fieldMetadataDictionaryArgument));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Test void return
	 *
	 *
	 *@return: A void return
	 */
	function DoNada()
	{
		$result = $this->sendRequest("DoNada", array());	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Gets some bool value
	 *
	 *
	 *@return: Some bool value
	 */
	function GetBool()
	{
		$result = $this->sendRequest("GetBool", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets some number. C# int -> C++ long
	 *
	 *
	 *@return: Some number
	 */
	function GetInteger()
	{
		$result = $this->sendRequest("GetInteger", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets some id. C# int when the name ends with 'Id' -> C++ longid
	 *
	 *
	 *@return: Some id
	 */
	function GetSomeId()
	{
		$result = $this->sendRequest("GetSomeId", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets some double number.
	 *
	 *
	 *@return: Some double number
	 */
	function GetDouble()
	{
		$result = $this->sendRequest("GetDouble", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets some string
	 *
	 *
	 *@return: Some string
	 */
	function GetString()
	{
		$result = $this->sendRequest("GetString", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets some date
	 *
	 *
	 *@return: Some date
	 */
	function GetDate()
	{
		$result = $this->sendRequest("GetDate", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets some QuoteLine
	 *
	 *
	 *@return: Some QuoteLine
	 */
	function GetQuoteLine()
	{
		$result = $this->sendRequest("GetQuoteLine", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets some strings
	 *
	 *
	 *@return: Some strings
	 */
	function GetArrayOfStrings()
	{
		$result = $this->sendRequest("GetArrayOfStrings", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets some ints
	 *
	 *
	 *@return: Some ints
	 */
	function GetArrayOfIntegers()
	{
		$result = $this->sendRequest("GetArrayOfIntegers", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets some doubles
	 *
	 *
	 *@return: Some doubles
	 */
	function GetArrayOfDoubles()
	{
		$result = $this->sendRequest("GetArrayOfDoubles", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets some bytes
	 *
	 *
	 *@return: Some bytes
	 */
	function GetArrayOfBytes()
	{
		$result = $this->sendRequest("GetArrayOfBytes", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets some QuoteLines
	 *
	 *
	 *@return: Some QuoteLines
	 */
	function GetArrayOfQuoteLines()
	{
		$result = $this->sendRequest("GetArrayOfQuoteLines", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Test bool input
	 *
	 *@$boolArgument		Some bool argument
	 *
	 *@return: A void return
	 */
	function BoolInput($boolArgument)
	{
		$result = $this->sendRequest("BoolInput", array("BoolArgument"=>$boolArgument));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Test int input
	 *
	 *@$intArgument		Some int argument
	 *
	 *@return: A void return
	 */
	function IntInput($intArgument)
	{
		$result = $this->sendRequest("IntInput", array("IntArgument"=>$intArgument));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Test input of an int with name that ends with 'Id'. Should generate a longid argument in C++.
	 *
	 *@$argumentId		Some id argument
	 *
	 *@return: A void return
	 */
	function InputId($argumentId)
	{
		$result = $this->sendRequest("InputId", array("ArgumentId"=>$argumentId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Test string input
	 *
	 *@$stringArgument		Some string argument
	 *
	 *@return: A void return
	 */
	function StringInput($stringArgument)
	{
		$result = $this->sendRequest("StringInput", array("StringArgument"=>$stringArgument));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Test date input
	 *
	 *@$dateArgument		Some date argument
	 *
	 *@return: A void return
	 */
	function DateInput($dateArgument)
	{
		$result = $this->sendRequest("DateInput", array("DateArgument"=>$dateArgument));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Test enum input
	 *
	 *@$enumArgument		Some enum argument
	 *
	 *@return: A void return
	 */
	function EnumInput($enumArgument)
	{
		$result = $this->sendRequest("EnumInput", array("EnumArgument"=>$enumArgument));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Test QuoteLine input
	 *
	 *@$quoteLineArgument		Some QuoteLine argument
	 *
	 *@return: A void return
	 */
	function QuoteLineInput($quoteLineArgument)
	{
		$result = $this->sendRequest("QuoteLineInput", array("QuoteLineArgument"=>$quoteLineArgument));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Test bool Array input
	 *
	 *@$boolArrayArgument		Some bool Array argument
	 *
	 *@return: A void return
	 */
	function ArrayBoolInput($boolArrayArgument)
	{
		$result = $this->sendRequest("ArrayBoolInput", array("BoolArrayArgument"=>$boolArrayArgument));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Test int Array input
	 *
	 *@$intArrayArgument		Some int Array argument
	 *
	 *@return: A void return
	 */
	function ArrayIntInput($intArrayArgument)
	{
		$result = $this->sendRequest("ArrayIntInput", array("IntArrayArgument"=>$intArrayArgument));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Test id Array input
	 *
	 *@$intArrayArgumentIds		Some id Array argument
	 *
	 *@return: A void return
	 */
	function ArrayIdInput($intArrayArgumentIds)
	{
		$result = $this->sendRequest("ArrayIdInput", array("IntArrayArgumentIds"=>$intArrayArgumentIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Test QuoteLine Array input
	 *
	 *@$quoteLineArrayArgument		Some QuoteLine Array argument
	 *
	 *@return: A void return
	 */
	function ArrayQuoteLineInput($quoteLineArrayArgument)
	{
		$result = $this->sendRequest("ArrayQuoteLineInput", array("QuoteLineArrayArgument"=>$quoteLineArrayArgument));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Sending various parameters
	 *
	 *@$boolArgument		Some bool argument
	 *@$integerArgument		Some integer argument
	 *@$dateTimeArgument		Some DateTime argument
	 *@$stringArgument		Some string argument
	 *
	 *@return: 
	 */
	function LotsAStandardParameters($boolArgument, $integerArgument, $dateTimeArgument, $stringArgument)
	{
		$result = $this->sendRequest("LotsAStandardParameters", array("BoolArgument"=>$boolArgument, "IntegerArgument"=>$integerArgument, "DateTimeArgument"=>$dateTimeArgument, "StringArgument"=>$stringArgument));	
		return $this->getResultFromResponse($result, true);
	}
        
}
    
   
  

