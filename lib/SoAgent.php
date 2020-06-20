<?php
require_once "nusoap.php";

/**
 * SoAgent short summary.
 * The SoAgent extends nusoap_client and use wsdl by default
 * 
 * SoAgent description.
 * @changes changes to nusoap library: check comments start with override changes
 * @version 1.0
 * @author yanjunl
 */
class SoAgent extends nusoap_client
{
    /**
     * Summary of $headerNamespace
     * @var string
     * namespace of the request header
     */
    var $headerNamespace = "";
    
    var $applicationToken = "";
    
    var $ticket = "";
    
    /**
     * @$endpoint       web service end point
     * @$ticket     NetServer ticket
     * @$application#token      private token of application
     * @$headerNamespace        namespace for request header
     * @$timeout        request timeout time
     * @$responseTimeout        response timeout time
     * @$portName web service port
     */
        
    function __construct($endpoint, $wsdl, $ticket = "", $applicationToken = "", $headerNamespace = "",  $timeout = 0, $responseTimeout = 30, $portName = ''){
		parent::__construct(WSDL_LOC.$wsdl, true, false, false, false, false, $timeout, $responseTimeout, $portName);
        
        $this->applicationToken = $applicationToken;
        $this->ticket = $ticket;
        $this->setEndpoint($endpoint);
        $this->headerNamespace = $headerNamespace;
    }   
    
    /**
     * send the SOAP message
     *
     * Note: if the operation has multiple return values
     * the return value of this method will be an array
     * of those values.
     *
     * @param    string $msg a SOAPx4 soapmsg object
     * @param    string $soapaction SOAPAction value
     * @param    integer $timeout set connection timeout in seconds
     * @param	integer $response_timeout set response timeout in seconds
     * @return	mixed native PHP types.
     * @access   private
     */
	function send($msg, $soapaction = '', $timeout=0, $response_timeout=30) {
		$this->checkCookies();
		// detect transport
		switch(true){
			// http(s)
			case preg_match('/^http/',$this->endpoint):
				$this->debug('transporting via HTTP');
				if($this->persistentConnection == true && is_object($this->persistentConnection)){
					$http =& $this->persistentConnection;
				} else {
                    
                    // override changes: use our own http method
					$http = new SoHttp($this->endpoint, $this->curl_options, $this->use_curl);
                    // override changes end
                    
					if ($this->persistentConnection) {
						$http->usePersistentConnection();
					}
				}
				$http->setContentType($this->getHTTPContentType(), $this->getHTTPContentTypeCharset());
				$http->setSOAPAction($soapaction);
				if($this->proxyhost && $this->proxyport){
					$http->setProxy($this->proxyhost,$this->proxyport,$this->proxyusername,$this->proxypassword);
				}
                if($this->authtype != '') {
					$http->setCredentials($this->username, $this->password, $this->authtype, array(), $this->certRequest);
				}
				if($this->http_encoding != ''){
					$http->setEncoding($this->http_encoding);
				}
				$this->debug('sending message, length='.strlen($msg));
				if(preg_match('/^http:/',$this->endpoint)){                    
                    $this->responseData = $http->send($msg,$timeout,$response_timeout,$this->cookies);
				} elseif(preg_match('/^https/',$this->endpoint)){					
                    $this->responseData = $http->sendHTTPS($msg,$timeout,$response_timeout,$this->cookies);
				} else {
					$this->setError('no http/s in endpoint url');
				}
				$this->request = $http->outgoing_payload;
				$this->response = $http->incoming_payload;
				$this->appendDebug($http->getDebug());
				$this->UpdateCookies($http->incoming_cookies);

				// save transport object if using persistent connections
				if ($this->persistentConnection) {
					$http->clearDebug();
					if (!is_object($this->persistentConnection)) {
						$this->persistentConnection = $http;
					}
				}
				
				if($err = $http->getError()){
					$this->setError('HTTP Error: '.$err);
					return false;
				} elseif($this->getError()){
					return false;
				} else {
					$this->debug('got response, length='. strlen($this->responseData).' type='.$http->incoming_headers['content-type']);
					return $this->parseResponse($http->incoming_headers, $this->responseData);
				}
                break;
			default:
				$this->setError('no transport found, or selected transport is not yet supported!');
                return false;
                break;
		}
	}
    
    /**
     * serializes a message
     *
     * @param string $body the XML of the SOAP body
     * @param mixed $headers optional string of XML with SOAP header content, or array of soapval objects for SOAP headers, or associative array
     * @param array $namespaces optional the namespaces used in generating the body and headers
     * @param string $style optional (rpc|document)
     * @param string $use optional (encoded|literal)
     * @param string $encodingStyle optional (usually 'http://schemas.xmlsoap.org/soap/encoding/' for encoded)
     * @return string the message
     * @access public
     */
    function serializeEnvelope($body,$headers=false,$namespaces=array(),$style='rpc',$use='encoded',$encodingStyle='http://schemas.xmlsoap.org/soap/encoding/'){
        // TODO: add an option to automatically run utf8_encode on $body and $headers
        // if $this->soap_defencoding is UTF-8.  Not doing this automatically allows
        // one to send arbitrary UTF-8 characters, not just characters that map to ISO-8859-1

        $this->debug("In serializeEnvelope length=" . strlen($body) . " body (max 1000 characters)=" . substr($body, 0, 1000) . " style=$style use=$use encodingStyle=$encodingStyle");
        $this->debug("headers:");
        $this->appendDebug($this->varDump($headers));
        $this->debug("namespaces:");
        $this->appendDebug($this->varDump($namespaces));

        // serialize namespaces
        $ns_string = '';
        foreach(array_merge($this->namespaces,$namespaces) as $k => $v){
            $ns_string .= " xmlns:$k=\"$v\"";
        }
        if($encodingStyle) {
            $ns_string = " SOAP-ENV:encodingStyle=\"$encodingStyle\"$ns_string";
        }

        // serialize headers
        
        // override changes: create our own header
        
        if($this->headerNamespace == ""){
            $this->headerNamespace = $this->getHeaderNamespace();
        }
        
        if($headers){
            $nsPrefix = 'h'.rand(1000,9999);
            if (is_array($headers)) {
                $xml = '';
                foreach ($headers as $k => $v) {
                    $xml .= $this->serializeHeaderVal($k, $v, $nsPrefix);
                }
                $headers = $xml;
                $this->debug("In serializeEnvelope, serialized array of headers to $headers");
            }
            $headers = "<SOAP-ENV:Header xmlns:$nsPrefix=\"".$this->headerNamespace."\">".$headers."</SOAP-ENV:Header>";
        }
        
        // override changes end
        
		$searchStr = array('<string>' , '</string>');
		$replaceStr = array('<arr:string>' , '</arr:string>');

		$realBody = str_replace($searchStr,$replaceStr, $body);

        // serialize envelope
        return
        '<?xml version="1.0" encoding="'.$this->soap_defencoding .'"?'.">".
        '<SOAP-ENV:Envelope'.$ns_string.">".
        $headers.
        "<SOAP-ENV:Body xmlns:arr=\"http://schemas.microsoft.com/2003/10/Serialization/Arrays\">".
            $realBody.
        "</SOAP-ENV:Body>".
        "</SOAP-ENV:Envelope>";
    }
    
    /**
     * instantiate wsdl object and parse wsdl file
     *
     * @access	public
     */
	function loadWSDL() {
		$this->debug('instantiating wsdl class with doc: '.$this->wsdlFile);
        
		// override changes: change wsdl to Sowsdl
        $this->wsdl = new SoWsdl('',$this->proxyhost,$this->proxyport,$this->proxyusername,$this->proxypassword,$this->timeout,$this->response_timeout,$this->curl_options,$this->use_curl);
		// override changes end
        
        $this->wsdl->setCredentials($this->username, $this->password, $this->authtype, $this->certRequest);
		$this->wsdl->fetchWSDL($this->wsdlFile);
		$this->checkWSDL();
	}
    
    /**
     * Methods under here are new defined methods
     */
    
    function serializeHeaderVal($k, $v, $nsPrefix){
        if(is_array($v)){
            $xml = "<$nsPrefix:$k>";
            foreach($v as $k1 => $v1){
                $xml .= $this->serializeHeaderVal($k1, $v1, $nsPrefix);                
            }
            $xml .= "</$nsPrefix:$k>";
            return $xml;
        }
        return "<$nsPrefix:$k>$v</$nsPrefix:$k>";
    }
    
    /**
     * Summary of getHeaderNamespace
     * @return string
     */
    function getHeaderNamespace(){
        if(array_key_exists("tns", $this->wsdl->namespaces)){
            return $this->wsdl->namespaces["tns"];            
        }
        return "www.superoffice.com";
    }
    
    function sendRequest($requestOperation, $requestParams){
        return $this->call(
                    $requestOperation, 
                    $requestParams,
                    "",
                    "",
                    array("ApplicationToken" => $this->applicationToken, "Credentials" => array("Ticket" => $this->ticket))
                    );
    }
    
    function getResultFromResponse($result, $noResponse = false){
        if ($this->fault) {
            return $result;
        }
        else {
            $error = $this->getError();
            if ($error) {
                return $error;
            }
            else {
                if($noResponse) {
                    return $result;
                }
                return $result["Response"];
            }
        }
    }
}

  
class SoHttp extends soap_transport_http
{
    function __construct($url, $curl_options = NULL, $use_curl = false){
        parent::__construct($url, $curl_options, $use_curl);        
    }
    
    /**
     * sets the URL to which to connect
     *
     * @param string $url The URL to which to connect
     * @access private
     */
	function setURL($url) {
		$this->url = $url;

		$u = parse_url($url);
		foreach($u as $k => $v){
			$this->debug("parsed URL $k = $v");
			$this->$k = $v;
		}
		
		// add any GET params to path
		if(isset($u['query']) && $u['query'] != ''){
            $this->path .= '?' . $u['query'];
		}
		
		// set default port
		if(!isset($u['port'])){
			if($u['scheme'] == 'https'){
				$this->port = 443;
			} else {
				$this->port = 80;
			}
		}
        
		// override changes: from path to url
		$this->uri = $url;
        // override changes end
        
		$this->digest_uri = $this->uri;
		
		// build headers
		if (!isset($u['port'])) {
			$this->setHeader('Host', $this->host);
		} else {
			$this->setHeader('Host', $this->host.':'.$this->port);
		}

		if (isset($u['user']) && $u['user'] != '') {
			$this->setCredentials(urldecode($u['user']), isset($u['pass']) ? urldecode($u['pass']) : '');
		}
	}
}
  
class SoWsdl extends wsdl
{
    /**
     * serializes a PHP value according a given type definition
     * 
     * @param string $name name of value (part or element)
     * @param string $type XML schema type of value (type or element)
     * @param mixed $value a native PHP value (parameter value)
     * @param string $use use for part (encoded|literal)
     * @param string $encodingStyle SOAP encoding style for the value (if different than the enclosing style)
     * @param boolean $unqualified a kludge for what should be XML namespace form handling
     * @return string value serialized as an XML string
     * @access private
     */
	function serializeType($name, $type, $value, $use='encoded', $encodingStyle=false, $unqualified=false)
	{
		$this->debug("in serializeType: name=$name, type=$type, use=$use, encodingStyle=$encodingStyle, unqualified=" . ($unqualified ? "unqualified" : "qualified"));
		$this->appendDebug("value=" . $this->varDump($value));
		if($use == 'encoded' && $encodingStyle) {
			$encodingStyle = ' SOAP-ENV:encodingStyle="' . $encodingStyle . '"';
		}

		// if a soapval has been supplied, let its type override the WSDL
    	if (is_object($value) && get_class($value) == 'soapval') {
    		if ($value->type_ns) {
    			$type = $value->type_ns . ':' . $value->type;
		    	$forceType = true;
		    	$this->debug("in serializeType: soapval overrides type to $type");
    		} elseif ($value->type) {
	    		$type = $value->type;
		    	$forceType = true;
		    	$this->debug("in serializeType: soapval overrides type to $type");
	    	} else {
	    		$forceType = false;
		    	$this->debug("in serializeType: soapval does not override type");
	    	}
	    	$attrs = $value->attributes;
	    	$value = $value->value;
	    	$this->debug("in serializeType: soapval overrides value to $value");
	    	if ($attrs) {
	    		if (!is_array($value)) {
	    			$value['!'] = $value;
	    		}
	    		foreach ($attrs as $n => $v) {
	    			$value['!' . $n] = $v;
	    		}
		    	$this->debug("in serializeType: soapval provides attributes");
		    }
        } else {
        	$forceType = false;
        }

		$xml = '';
		if (strpos($type, ':')) {
			$uqType = substr($type, strrpos($type, ':') + 1);
			$ns = substr($type, 0, strrpos($type, ':'));
			$this->debug("in serializeType: got a prefixed type: $uqType, $ns");
			if ($this->getNamespaceFromPrefix($ns)) {
				$ns = $this->getNamespaceFromPrefix($ns);
				$this->debug("in serializeType: expanded prefixed type: $uqType, $ns");
			}

			if($ns == $this->XMLSchemaVersion || $ns == 'http://schemas.xmlsoap.org/soap/encoding/'){
				$this->debug('in serializeType: type namespace indicates XML Schema or SOAP Encoding type');
				if ($unqualified && $use == 'literal') {
					$elementNS = " xmlns=\"\"";
				} else {
					$elementNS = '';
				}
				if (is_null($value)) {
					if ($use == 'literal') {
						// TODO: depends on minOccurs
						$xml = "<$name$elementNS/>";
					} else {
						// TODO: depends on nillable, which should be checked before calling this method
						$xml = "<$name$elementNS xsi:nil=\"true\" xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\"/>";
					}
					$this->debug("in serializeType: returning: $xml");
					return $xml;
				}
				if ($uqType == 'Array') {
					// JBoss/Axis does this sometimes
					return $this->serialize_val($value, $name, false, false, false, false, $use);
				}
		    	if ($uqType == 'boolean') {
		    		if ((is_string($value) && $value == 'false') || (! $value)) {
						$value = 'false';
					} else {
						$value = 'true';
					}
				} 
				if ($uqType == 'string' && gettype($value) == 'string') {
					$value = $this->expandEntities($value);
				}
				if (($uqType == 'long' || $uqType == 'unsignedLong') && gettype($value) == 'double') {
					$value = sprintf("%.0lf", $value);
				}
				// it's a scalar
				// TODO: what about null/nil values?
				// check type isn't a custom type extending xmlschema namespace
				if (!$this->getTypeDef($uqType, $ns)) {
					if ($use == 'literal') {
						if ($forceType) {
							$xml = "<$name$elementNS xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\">$value</$name>";
						} else {
							$xml = "<$name$elementNS>$value</$name>";
						}
					} else {
						$xml = "<$name$elementNS xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\"$encodingStyle>$value</$name>";
					}
					$this->debug("in serializeType: returning: $xml");
					return $xml;
				}
				$this->debug('custom type extends XML Schema or SOAP Encoding namespace (yuck)');
			} else if ($ns == 'http://xml.apache.org/xml-soap') {
				$this->debug('in serializeType: appears to be Apache SOAP type');
				if ($uqType == 'Map') {
					$tt_prefix = $this->getPrefixFromNamespace('http://xml.apache.org/xml-soap');
					if (! $tt_prefix) {
						$this->debug('in serializeType: Add namespace for Apache SOAP type');
						$tt_prefix = 'ns' . rand(1000, 9999);
						$this->namespaces[$tt_prefix] = 'http://xml.apache.org/xml-soap';
						// force this to be added to usedNamespaces
						$tt_prefix = $this->getPrefixFromNamespace('http://xml.apache.org/xml-soap');
					}
					$contents = '';
					foreach($value as $k => $v) {
						$this->debug("serializing map element: key $k, value $v");
						$contents .= '<item>';
						$contents .= $this->serialize_val($k,'key',false,false,false,false,$use);
						$contents .= $this->serialize_val($v,'value',false,false,false,false,$use);
						$contents .= '</item>';
					}
					if ($use == 'literal') {
						if ($forceType) {
							$xml = "<$name xsi:type=\"" . $tt_prefix . ":$uqType\">$contents</$name>";
						} else {
							$xml = "<$name>$contents</$name>";
						}
					} else {
						$xml = "<$name xsi:type=\"" . $tt_prefix . ":$uqType\"$encodingStyle>$contents</$name>";
					}
					$this->debug("in serializeType: returning: $xml");
					return $xml;
				}
				$this->debug('in serializeType: Apache SOAP type, but only support Map');
			}
		} else {
			// TODO: should the type be compared to types in XSD, and the namespace
			// set to XSD if the type matches?
			$this->debug("in serializeType: No namespace for type $type");
			$ns = '';
			$uqType = $type;
		}
		if(!$typeDef = $this->getTypeDef($uqType, $ns)){
			$this->setError("$type ($uqType) is not a supported type.");
			$this->debug("in serializeType: $type ($uqType) is not a supported type.");
			return false;
		} else {
			$this->debug("in serializeType: found typeDef");
			$this->appendDebug('typeDef=' . $this->varDump($typeDef));
			if (substr($uqType, -1) == '^') {
				$uqType = substr($uqType, 0, -1);
			}
		}
		if (!isset($typeDef['phpType'])) {
			$this->setError("$type ($uqType) has no phpType.");
			$this->debug("in serializeType: $type ($uqType) has no phpType.");
			return false;
		}
		$phpType = $typeDef['phpType'];
		$this->debug("in serializeType: uqType: $uqType, ns: $ns, phptype: $phpType, arrayType: " . (isset($typeDef['arrayType']) ? $typeDef['arrayType'] : '') ); 
		// if php type == struct, map value to the <all> element names
		if ($phpType == 'struct') {
			if (isset($typeDef['typeClass']) && $typeDef['typeClass'] == 'element') {
				$elementName = $uqType;
				if (isset($typeDef['form']) && ($typeDef['form'] == 'qualified')) {
					$elementNS = " xmlns=\"$ns\"";
				} else {
					$elementNS = " xmlns=\"\"";
				}
			} else {
				$elementName = $name;
				if ($unqualified) {
					$elementNS = " xmlns=\"\"";
				} else {
					$elementNS = '';
				}
			}
			if (is_null($value)) {
				if ($use == 'literal') {
					// TODO: depends on minOccurs and nillable
					$xml = "<$elementName$elementNS/>";
				} else {
					$xml = "<$elementName$elementNS xsi:nil=\"true\" xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\"/>";
				}
				$this->debug("in serializeType: returning: $xml");
				return $xml;
			}
			if (is_object($value)) {
				$value = get_object_vars($value);
			}
            
            // override changes: fix error type for empty value
            if(!is_array($value)){
                $value = array($value);
            }
            // override changes end
            
			if (is_array($value)) {
				$elementAttrs = $this->serializeComplexTypeAttributes($typeDef, $value, $ns, $uqType);
				if ($use == 'literal') {
					if ($forceType) {
						$xml = "<$elementName$elementNS$elementAttrs xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\">";
					} else {
						$xml = "<$elementName$elementNS$elementAttrs>";
					}
				} else {
					$xml = "<$elementName$elementNS$elementAttrs xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\"$encodingStyle>";
				}

				if (isset($typeDef['simpleContent']) && $typeDef['simpleContent'] == 'true') {
					if (isset($value['!'])) {
						$xml .= $value['!'];
						$this->debug("in serializeType: serialized simpleContent for type $type");
					} else {
						$this->debug("in serializeType: no simpleContent to serialize for type $type");
					}
				} else {
					// complexContent
					$xml .= $this->serializeComplexTypeElements($typeDef, $value, $ns, $uqType, $use, $encodingStyle);
				}
				$xml .= "</$elementName>";
			} else {
                $this->debug("in serializeType: phpType is struct, but value is not an array");
				$this->setError("phpType is struct, but value is not an array: see debug output for details");
				$xml = '';
			}
		} elseif ($phpType == 'array') {
			if (isset($typeDef['form']) && ($typeDef['form'] == 'qualified')) {
				$elementNS = " xmlns=\"$ns\"";
			} else {
				if ($unqualified) {
					$elementNS = " xmlns=\"\"";
				} else {
					$elementNS = '';
				}
			}
			if (is_null($value)) {
				if ($use == 'literal') {
					// TODO: depends on minOccurs
					$xml = "<$name$elementNS/>";
				} else {
					$xml = "<$name$elementNS xsi:nil=\"true\" xsi:type=\"" .
						$this->getPrefixFromNamespace('http://schemas.xmlsoap.org/soap/encoding/') .
						":Array\" " .
						$this->getPrefixFromNamespace('http://schemas.xmlsoap.org/soap/encoding/') .
						':arrayType="' .
						$this->getPrefixFromNamespace($this->getPrefix($typeDef['arrayType'])) .
						':' .
						$this->getLocalPart($typeDef['arrayType'])."[0]\"/>";
				}
				$this->debug("in serializeType: returning: $xml");
				return $xml;
			}
			if (isset($typeDef['multidimensional'])) {
				$nv = array();
				foreach($value as $v) {
					$cols = ',' . sizeof($v);
					$nv = array_merge($nv, $v);
				} 
				$value = $nv;
			} else {
				$cols = '';
			} 
			if (is_array($value) && sizeof($value) >= 1) {
				$rows = sizeof($value);
				$contents = '';
				foreach($value as $k => $v) {
					$this->debug("serializing array element: $k, $v of type: $typeDef[arrayType]");
					//if (strpos($typeDef['arrayType'], ':') ) {
					if (!in_array($typeDef['arrayType'],$this->typemap['http://www.w3.org/2001/XMLSchema'])) {
					    $contents .= $this->serializeType('item', $typeDef['arrayType'], $v, $use);
					} else {
					    $contents .= $this->serialize_val($v, 'item', $typeDef['arrayType'], null, $this->XMLSchemaVersion, false, $use);
					} 
				}
			} else {
				$rows = 0;
				$contents = null;
			}
			// TODO: for now, an empty value will be serialized as a zero element
			// array.  Revisit this when coding the handling of null/nil values.
			if ($use == 'literal') {
				$xml = "<$name$elementNS>"
					.$contents
					."</$name>";
			} else {
				$xml = "<$name$elementNS xsi:type=\"".$this->getPrefixFromNamespace('http://schemas.xmlsoap.org/soap/encoding/').':Array" '.
					$this->getPrefixFromNamespace('http://schemas.xmlsoap.org/soap/encoding/')
					.':arrayType="'
					.$this->getPrefixFromNamespace($this->getPrefix($typeDef['arrayType']))
					.":".$this->getLocalPart($typeDef['arrayType'])."[$rows$cols]\">"
					.$contents
					."</$name>";
			}
		} elseif ($phpType == 'scalar') {
			if (isset($typeDef['form']) && ($typeDef['form'] == 'qualified')) {
				$elementNS = " xmlns=\"$ns\"";
			} else {
				if ($unqualified) {
					$elementNS = " xmlns=\"\"";
				} else {
					$elementNS = '';
				}
			}
			if ($use == 'literal') {
				if ($forceType) {
					$xml = "<$name$elementNS xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\">$value</$name>";
				} else {
					$xml = "<$name$elementNS>$value</$name>";
				}
			} else {
				$xml = "<$name$elementNS xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\"$encodingStyle>$value</$name>";
			}
		}
		$this->debug("in serializeType: returning: $xml");
		return $xml;
	}    
}