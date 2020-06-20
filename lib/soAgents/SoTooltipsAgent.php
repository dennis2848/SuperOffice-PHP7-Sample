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

		
class SoTooltipsAgent extends SoAgent
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
        parent::__construct($endpoint."Tooltips.svc", "WcfTooltips.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Parse a tooltip hint and return a tooltip. The returned tooltip string may contain resource string identifiers (in square brackets), to be processed by the resource manager.<para />The tooltip hint is either a literal text, representing itself, or a set of key/value pairs enclosed in curly braces. Each key is separated from its value by an equals sign, and each pair from the next by an ampersand, according to usual conventions.<para />A typical tooltip hint could be {contact_id=123} or {appointment_id=222&amp;mode=simple}
	 *
	 *@$tooltipHint		
	 *
	 *@return: 
	 */
	function GetTooltip($tooltipHint)
	{
		$result = $this->sendRequest("GetTooltip", array("TooltipHint"=>$tooltipHint));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

