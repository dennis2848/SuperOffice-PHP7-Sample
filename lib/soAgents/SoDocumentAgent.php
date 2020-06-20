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

		
class SoDocumentAgent extends SoAgent
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
        parent::__construct($endpoint."Document.svc", "WcfDocument.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new DocumentEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New DocumentEntity with default values
     */
     function CreateDefaultDocumentEntity()
     {
		$result = $this->sendRequest("CreateDefaultDocumentEntity", array());
		return $this->getResultFromResponse($result);
     }
	/**
	 * Deletes the DocumentEntity
	 * 
	 * @$documentEntityId		The identity of the DocumentEntity
	 */
	function DeleteDocumentEntity($documentEntityId)
	{
		$result = $this->sendRequest("DeleteDocumentEntity", array("DocumentEntity"=>$documentEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

    /**
     * Loading default values into a new SuggestedDocumentEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New SuggestedDocumentEntity with default values
     */
     function CreateDefaultSuggestedDocumentEntity()
     {
		$result = $this->sendRequest("CreateDefaultSuggestedDocumentEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing SuggestedDocumentEntity or creates a new SuggestedDocumentEntity if the id parameter is empty
     * 
     * @return New or updated SuggestedDocumentEntity
     */
	function SaveSuggestedDocumentEntity($suggestedDocumentEntity)
	{
		$result = $this->sendRequest("SaveSuggestedDocumentEntity", array("SuggestedDocumentEntity"=>$suggestedDocumentEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new TemplateVariablesParameters.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New TemplateVariablesParameters with default values
     */
     function CreateDefaultTemplateVariablesParameters()
     {
		$result = $this->sendRequest("CreateDefaultTemplateVariablesParameters", array());
		return $this->getResultFromResponse($result);
     }
        

	/**
	 * Summary
	 * Gets a Document object.
	 * 
	 * @$documentId		The identifier of the Document object
	 *
	 * @returns Document
	 */ 
	function GetDocument($documentId)
	{
		$result = $this->sendRequest("GetDocument", array("DocumentId"=>$documentId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a DocumentEntity object.
	 * 
	 * @$documentEntityId		The identifier of the DocumentEntity object
	 *
	 * @returns DocumentEntity
	 */ 
	function GetDocumentEntity($documentEntityId)
	{
		$result = $this->sendRequest("GetDocumentEntity", array("DocumentEntityId"=>$documentEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the document as a stream
	 *
	 *@$documentEntity		The document entity object that refers to the binary data (document)
	 *
	 *@return: The document as a Stream (Returned as a serializable type: byte[]
	 */
	function GetDocumentStreamFromEntity($documentEntity)
	{
		$result = $this->sendRequest("GetDocumentStreamFromEntity", array("DocumentEntity"=>$documentEntity));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Store a document from its stream. Since there is a potential for a name conflict (the file name stored by the document entity earlier may prove to be invalid), the (possibly amended) document entity is returned. The client should not assume that any earlier, cached entity information is valid.
	 *
	 *@$documentEntity		The document entity object that the binary data (document) should be stored to. Its file name may be amended by this call, see the return value
	 *@$stream		The document as a stream. (Using a serializable type: byte[]
	 *@$overwriteExistingData		If true, the stream will overwrite existing data stored for this record in the document archive; this works only for documents that already have a physical document in existence. If false, the call will only work for a document that has no physical document in the archive, and such a physical document will be created.
	 *
	 *@return: Since there is a potential for a name conflict (the file name stored by the document entity earlier may prove to be invalid), the (possibly amended) document entity is returned. The client should not assume that any earlier, cached entity information is valid.
	 */
	function SetDocumentStream($documentEntity, $stream, $overwriteExistingData)
	{
		$result = $this->sendRequest("SetDocumentStream", array("DocumentEntity"=>$documentEntity, "Stream"=>$stream, "OverwriteExistingData"=>$overwriteExistingData));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a new Stream that can be used to store the document in the file archive.
	 *
	 *@$documentEntity		The document the stream belongs to
	 *@$overwriteExistingData		If true, the stream will overwrite existing data stored for this record in the document archive
	 *
	 *@return: A writeable stream. When written and closed, the stream will become the new document content, subject to locking and versioning constraints. (Returned as a serializable type: byte[]
	 */
	function CreateDocumentStream($documentEntity, $overwriteExistingData)
	{
		$result = $this->sendRequest("CreateDocumentStream", array("DocumentEntity"=>$documentEntity, "OverwriteExistingData"=>$overwriteExistingData));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Retrieve a stream to a document template based on its name
	 *
	 *@$templateName		Filename of template to retrieve
	 *@$allowPersonal		If true, try looking up template in personal area before looking in default document template area
	 *@$uiCulture		Language used in UI. ("en-US" or "nb-NO" etc). Used to select a template of the appropriate language. Can be overridden in SO ARC by user preference "PreferDocLang".
	 *
	 *@return: Open stream to the template (Returned as a serializable type: byte[]
	 */
	function GetTemplateStream($templateName, $allowPersonal, $uiCulture)
	{
		$result = $this->sendRequest("GetTemplateStream", array("TemplateName"=>$templateName, "AllowPersonal"=>$allowPersonal, "UiCulture"=>$uiCulture));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Retrieve a stream to a document template based on its id
	 *
	 *@$templateId		Id of template to retrieve
	 *@$uiCulture		Language used in UI. ("en-US" or "nb-NO" etc). Used to select a template of the appropriate language. Can be overridden in SO ARC by user preference "PreferDocLang".
	 *
	 *@return: Open stream to the template (Returned as a serializable type: byte[]
	 */
	function GetTemplateStreamFromId($templateId, $uiCulture)
	{
		$result = $this->sendRequest("GetTemplateStreamFromId", array("TemplateId"=>$templateId, "UiCulture"=>$uiCulture));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the document as a stream
	 *
	 *@$documentId		SuperOffice document id
	 *
	 *@return: The document as a Stream. This stream can be read once and clients should not assume it remains valid after a ReadToEnd or Close. (Returned as a serializable type: byte[]
	 */
	function GetDocumentStream($documentId)
	{
		$result = $this->sendRequest("GetDocumentStream", array("DocumentId"=>$documentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a new physical document based on the documents template. Do not replace template tags, as the document is going to be used as a mail merge source. Use GetDocumentStream to obtain the created documents. Since there is a potential for a name conflict (the file name stored by the document entity earlier may prove to be invalid), the (possibly amended) document entity is returned. The client should not assume that any earlier, cached entity information is valid.
	 *
	 *@$documentId		Identifier for a document
	 *@$uiCulture		Language used in UI. ("en-US" or "nb-NO" etc). Used to select a template of the appropriate language. Can be overridden in SO ARC by user preference "PreferDocLang".
	 *
	 *@return: 
	 */
	function CreateNewPhysicalMailMergeDocumentFromTemplate($documentId, $uiCulture)
	{
		$result = $this->sendRequest("CreateNewPhysicalMailMergeDocumentFromTemplate", array("DocumentId"=>$documentId, "UiCulture"=>$uiCulture));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a new physical document based on a document template and store it in the document archive.  Tags are substituted according to the provided id's.  Use GetDocumentStream to obtain the created documents. Since there is a potential for a name conflict (the file name stored by the document entity earlier may prove to be invalid), the (possibly amended) document entity is returned. The client should not assume that any earlier, cached entity information is valid.
	 *
	 *@$contactId		Identifier for a contact
	 *@$personId		Identifier for a person
	 *@$appointmentId		identifier for an appointment
	 *@$documentId		Identifier for a document
	 *@$saleId		Identifier for sale.
	 *@$selectionId		identifier for selection
	 *@$projectId		identifier for project
	 *@$customTags		Array of custom tag names. Each name should have exactly four characters. There should be exactly one value for each tag, i.e., the lengths of the customTags and customValues arrays should be the same.
	 *@$customValues		Array of values for custom tags. There should be exactly one value for each tag, i.e., the lengths of the customTags and customValues arrays should be the same.
	 *@$uiCulture		Language used in UI. ("en-US" or "nb-NO" etc). Used to select a template of the appropriate language. Can be overridden in SO ARC by user preference "PreferDocLang".
	 *
	 *@return: 
	 */
	function CreateNewPhysicalDocumentFromTemplateWithCustomTags($contactId, $personId, $appointmentId, $documentId, $saleId, $selectionId, $projectId, $customTags, $customValues, $uiCulture)
	{
		$result = $this->sendRequest("CreateNewPhysicalDocumentFromTemplateWithCustomTags", array("ContactId"=>$contactId, "PersonId"=>$personId, "AppointmentId"=>$appointmentId, "DocumentId"=>$documentId, "SaleId"=>$saleId, "SelectionId"=>$selectionId, "ProjectId"=>$projectId, "CustomTags"=>$customTags, "CustomValues"=>$customValues, "UiCulture"=>$uiCulture));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Parse the source string, and replace any template variable tags with their values, based on the ID's given in the other parameters.
	 *
	 *@$source		Source string to parse for template variables. Such variables must have delimiters corresponding to the standard for the given generator encoding.<p/>Non-text source data (such as the binary content of a .doc file) should be passed in as Base64.
	 *@$generatorEncoding		Encoding of source string. Non-text formats such as MsWord or Excel should be Base64 encoded in the source string.
	 *@$contactId		Identifier for a contact
	 *@$personId		Identifier for a person
	 *@$appointmentId		Identifier for an appointment
	 *@$documentId		Identifier for a document
	 *@$saleId		Identifier for a sale
	 *@$selectionId		Identifier for a selection
	 *@$projectId		Identifier for a project
	 *@$cultureName		Name of culture to be used for culture-sensitive data, such as dates or multi-language texts. Use a blank string to accept whatever current culture is set on the server (possibly not a good choice in multinational organizations with a single server).
	 *
	 *@return: Source string with templates substituted, using the same encoding as for the source (binary data will be returned in Base64).
	 */
	function SubstituteTemplateVariables($source, $generatorEncoding, $contactId, $personId, $appointmentId, $documentId, $saleId, $selectionId, $projectId, $cultureName)
	{
		$result = $this->sendRequest("SubstituteTemplateVariables", array("Source"=>$source, "GeneratorEncoding"=>$generatorEncoding, "ContactId"=>$contactId, "PersonId"=>$personId, "AppointmentId"=>$appointmentId, "DocumentId"=>$documentId, "SaleId"=>$saleId, "SelectionId"=>$selectionId, "ProjectId"=>$projectId, "CultureName"=>$cultureName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Parse the source string, and replace any template variable tags with their values, based on the ID's given in the other parameters.<p/>This method also takes a pair of arrays specifying custom tags and their values; these tags will be available during substitution in addition to all the existing tags. Custom values will override values otherwise set.
	 *
	 *@$source		Source string to parse for template variables. Such variables must have delimiters corresponding to the standard for the given generator encoding.<p/>Non-text source data (such as the binary content of a .doc file) should be passed in as Base64.
	 *@$generatorEncoding		Encoding of source string. Non-text formats such as MsWord or Excel should be Base64 encoded in the source string.
	 *@$customTags		Array of custom tag names. Each name should have exactly four characters. There should be exactly one value for each tag, i.e., the lengths of the customTags and customValues arrays should be the same.
	 *@$customValues		Array of values for custom tags. There should be exactly one value for each tag, i.e., the lengths of the customTags and customValues arrays should be the same.
	 *@$contactId		Identifier for a contact
	 *@$personId		Identifier for a person
	 *@$appointmentId		Identifier for an appointment
	 *@$documentId		Identifier for a document
	 *@$saleId		Identifier for a sale
	 *@$selectionId		Identifier for a selection
	 *@$projectId		Identifier for a project
	 *@$cultureName		Name of culture to be used for culture-sensitive data, such as dates or multi-language texts. Use a blank string to accept whatever current culture is set on the server (possibly not a good choice in multinational organizations with a single server).
	 *
	 *@return: Source string with templates substituted, using the same encoding as for the source (binary data will be returned in Base64).
	 */
	function SubstituteTemplateVariablesWithCustomTags($source, $generatorEncoding, $customTags, $customValues, $contactId, $personId, $appointmentId, $documentId, $saleId, $selectionId, $projectId, $cultureName)
	{
		$result = $this->sendRequest("SubstituteTemplateVariablesWithCustomTags", array("Source"=>$source, "GeneratorEncoding"=>$generatorEncoding, "CustomTags"=>$customTags, "CustomValues"=>$customValues, "ContactId"=>$contactId, "PersonId"=>$personId, "AppointmentId"=>$appointmentId, "DocumentId"=>$documentId, "SaleId"=>$saleId, "SelectionId"=>$selectionId, "ProjectId"=>$projectId, "CultureName"=>$cultureName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a new temporary file based on the provided stream.  Specified filename may be overridden, and actual name is returned.
	 *
	 *@$filename		Wanted name of file.
	 *@$dataStream		Data to be added to the file. (Using a serializable type: byte[]
	 *
	 *@return: Actual used filename.
	 */
	function CreateTempFile($filename, $dataStream)
	{
		$result = $this->sendRequest("CreateTempFile", array("Filename"=>$filename, "DataStream"=>$dataStream));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get data stream for temporary file created with CreateTempFile.
	 *
	 *@$filename		Name of temporary file to retrieve.
	 *
	 *@return: The document as a Stream (Returned as a serializable type: byte[]
	 */
	function GetTempFile($filename)
	{
		$result = $this->sendRequest("GetTempFile", array("Filename"=>$filename));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Delete a temporary file created with CreateTempFile.
	 *
	 *@$filename		Name of temporary file to delete.
	 *
	 *@return: 
	 */
	function DeleteTempFile($filename)
	{
		$result = $this->sendRequest("DeleteTempFile", array("Filename"=>$filename));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Save a template to the document archive
	 *
	 *@$filename		Filename of template.
	 *@$personal		If true, save the template in the user area, instead of in common template area.
	 *@$stream		The template as a stream. (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SetTemplateStream($filename, $personal, $stream)
	{
		$result = $this->sendRequest("SetTemplateStream", array("Filename"=>$filename, "Personal"=>$personal, "Stream"=>$stream));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Create a new physical document based on a document template and store it in the document archive.  Tags are substituted according to the provided id's.  Use GetDocumentStream to obtain the created document. Since there is a potential for a name conflict (the file name stored by the document entity earlier may prove to be invalid), the (possibly amended) document entity is returned. The client should not assume that any earlier, cached entity information is valid.
	 *
	 *@$contactId		Identifier for a contact
	 *@$personId		Identifier for a person
	 *@$appointmentId		identifier for an appointment
	 *@$documentId		Identifier for a document
	 *@$saleId		Identifier for sale.
	 *@$selectionId		identifier for selection
	 *@$projectId		identifier for project
	 *@$uiCulture		Language used in UI. ("en-US" or "nb-NO" etc). Used to select a template of the appropriate language. Can be overridden in SO ARC by user preference "PreferDocLang".
	 *
	 *@return: 
	 */
	function CreateNewPhysicalDocumentFromTemplate($contactId, $personId, $appointmentId, $documentId, $saleId, $selectionId, $projectId, $uiCulture)
	{
		$result = $this->sendRequest("CreateNewPhysicalDocumentFromTemplate", array("ContactId"=>$contactId, "PersonId"=>$personId, "AppointmentId"=>$appointmentId, "DocumentId"=>$documentId, "SaleId"=>$saleId, "SelectionId"=>$selectionId, "ProjectId"=>$projectId, "UiCulture"=>$uiCulture));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Parse the source document, and replace any template variable tags with their values, based on the associate Id.<p/> The source document should be of type MergeDraft. This method also takes a pair of arrays specifying custom tags and their values; these tags will be available during substitution in addition to all the existing tags. Custom values will override values otherwise set.
	 *
	 *@$documentId		The document id that refers to the binary data (document)
	 *@$associateId		The associateId used to subsitute tags in the document.
	 *@$customTags		Array of custom tag names. Each name should have exactly four characters. There should be exactly one value for each tag, i.e., the lengths of the customTags and customValues arrays should be the same.
	 *@$customValues		Array of values for custom tags. There should be exactly one value for each tag, i.e., the lengths of the customTags and customValues arrays should be the same.
	 *
	 *@return: The document as a Stream (Returned as a serializable type: byte[]
	 */
	function SubstituteMergeDocumentTemplateVariables($documentId, $associateId, $customTags, $customValues)
	{
		$result = $this->sendRequest("SubstituteMergeDocumentTemplateVariables", array("DocumentId"=>$documentId, "AssociateId"=>$associateId, "CustomTags"=>$customTags, "CustomValues"=>$customValues));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Parse the source string, and replace any template variable tags with their values, based on the identities, custom values and entities specified in the other parameters.
	 *
	 *@$parameters		Name of culture to be used for culture-sensitive data, such as dates or multi-language texts. Use a blank string to accept whatever current culture is set on the server (possibly not a good choice in multinational organizations with a single server).
	 *
	 *@return: Source string with templates substituted, using the same encoding as for the source (binary data will be returned in Base64).
	 */
	function SubstituteTemplateVariablesEx($parameters)
	{
		$result = $this->sendRequest("SubstituteTemplateVariablesEx", array("Parameters"=>$parameters));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Verify that the requested document stream exists, and that we can access it, without actually getting the stream.
	 *
	 *@$documentId		The document id that refers to the binary data (document)
	 *
	 *@return: 
	 */
	function VerifyGetDocumentStream($documentId)
	{
		$result = $this->sendRequest("VerifyGetDocumentStream", array("DocumentId"=>$documentId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Parse the source document, and replace any template variable tags with their values, based on the provided identifiers.<p/> The source document should be of type MergeDraft. This method also takes a pair of arrays specifying custom tags and their values; these tags will be available during substitution in addition to all the existing tags. Custom values will override values otherwise set.
	 *
	 *@$mergeDocumentId		The document id that refers to the binary data (document)
	 *@$contactId		The contact identifier to use for template substitution
	 *@$personId		The person identifier to use for template substitution
	 *@$projectId		The project identifier to use for template substitution
	 *@$selectionId		The selection identifier to use for template substitution
	 *@$appointmentId		The appointment identifier to use for template substitution
	 *@$documentId		The document identifier to use for template substitution
	 *@$saleId		The sale identifier to use for template substitution
	 *@$customTags		Array of custom tag names. Each name should have exactly four characters. There should be exactly one value for each tag, i.e., the lengths of the customTags and customValues arrays should be the same.
	 *@$customValues		Array of values for custom tags. There should be exactly one value for each tag, i.e., the lengths of the customTags and customValues arrays should be the same.
	 *
	 *@return: The document as a Stream (Returned as a serializable type: byte[]
	 */
	function SubstituteMergeDocumentTemplateVariablesEx($mergeDocumentId, $contactId, $personId, $projectId, $selectionId, $appointmentId, $documentId, $saleId, $customTags, $customValues)
	{
		$result = $this->sendRequest("SubstituteMergeDocumentTemplateVariablesEx", array("MergeDocumentId"=>$mergeDocumentId, "ContactId"=>$contactId, "PersonId"=>$personId, "ProjectId"=>$projectId, "SelectionId"=>$selectionId, "AppointmentId"=>$appointmentId, "DocumentId"=>$documentId, "SaleId"=>$saleId, "CustomTags"=>$customTags, "CustomValues"=>$customValues));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a WebDAV-compliant URL referring to the given document.<br />This URL may be passed to the ultimate client (text editor of some kind?), which is then responsible for all further operations.<br/>The returned string is a fully resolved URL.<br/>Not all documents and document plugins support this feature.
	 *
	 *@$documentId		SuperOffice document Id
	 *@$versionId		Version ID if applicable/desired; a blank value implies "latest" version and is always acceptable.
	 *@$writeableUrl		If true, then a URL that supports saving is requested. Som edocument plugins may not support read-only URLs, so there is no guarantee that a False value will actually yield a read-only URL, and vice versa.
	 *
	 *@return: Fully resolved URL referring to the document.
	 */
	function GetDocumentUrl($documentId, $versionId, $writeableUrl)
	{
		$result = $this->sendRequest("GetDocumentUrl", array("DocumentId"=>$documentId, "VersionId"=>$versionId, "WriteableUrl"=>$writeableUrl));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$documentId		
	 *@$allowedReturnType		
	 *
	 *@return: 
	 */
	function DeletePhysicalDocument($documentId, $allowedReturnType)
	{
		$result = $this->sendRequest("DeletePhysicalDocument", array("DocumentId"=>$documentId, "AllowedReturnType"=>$allowedReturnType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Rename the physical document, i.e., change the file name or equivalent concept in the document archive.
	 *
	 *@$documentId		SuperOffice document ID
	 *@$newFilename		Suggested new file name. The document archive may amend this to conform to uniqueness constraints, character range limitations etc.
	 *
	 *@return: The actual, new "file" name. This will generally be derived from the suggested name, but may be amended.
	 */
	function RenameDocument($documentId, $newFilename)
	{
		$result = $this->sendRequest("RenameDocument", array("DocumentId"=>$documentId, "NewFilename"=>$newFilename));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the current checkout state for a document, relative to the user perforing the call.
	 *
	 *@$documentId		SuperOffice document ID
	 *
	 *@return: Current checkout state of the document
	 */
	function GetCheckoutState($documentId)
	{
		$result = $this->sendRequest("GetCheckoutState", array("DocumentId"=>$documentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Check out a document for editing by the current user.
	 *
	 *@$documentId		SuperOffice document ID
	 *@$allowedReturnTypes		List of return types that the client is prepared to handle, in case the document plugin needs to request additional processing.<br/>Standard allowed return types include 'None', 'Message', 'SoProtocol', 'CustomGui', 'Other'.<br/>An empty array implies that the client places no restriction on possible return action requests.
	 *
	 *@return: Return information, including possible requests for further processing ("Return Action"). Return actions are constrained by the allowedReturnTypes parameter.
	 */
	function CheckoutDocument($documentId, $allowedReturnTypes)
	{
		$result = $this->sendRequest("CheckoutDocument", array("DocumentId"=>$documentId, "AllowedReturnTypes"=>$allowedReturnTypes));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Check in a currently checked-out document
	 *
	 *@$documentId		SuperOffice document Id
	 *@$allowedReturnTypes		List of return types that the client is prepared to handle, in case the document plugin needs to request additional processing.<br/>Standard allowed return types include 'None', 'Message', 'SoProtocol', 'CustomGui', 'Other'.<br/>An empty array implies that the client places no restriction on possible return action requests.
	 *@$versionDescription		Optional textual description related to this version of the document; may be blank, and is discarded if the document/plugin do not support versioning.
	 *@$versionExtraFields		Optional extra metadata related to the new version (as opposed to metadata related to the document as a whole). Discarded if the document/plugin do not support versioning.
	 *
	 *@return: Return information, including possible requests for further processing ("Return Action"). Return actions are constrained by the allowedReturnTypes parameter.
	 */
	function CheckinDocument($documentId, $allowedReturnTypes, $versionDescription, $versionExtraFields)
	{
		$result = $this->sendRequest("CheckinDocument", array("DocumentId"=>$documentId, "AllowedReturnTypes"=>$allowedReturnTypes, "VersionDescription"=>$versionDescription, "VersionExtraFields"=>$versionExtraFields));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Undo (abandon) a checkout
	 *
	 *@$documentId		SuperOffice document ID
	 *@$allowedReturnTypes		List of return types that the client is prepared to handle, in case the document plugin needs to request additional processing.<br/>Standard allowed return types include 'None', 'Message', 'SoProtocol', 'CustomGui', 'Other'.<br/>An empty array implies that the client places no restriction on possible return action requests.
	 *
	 *@return: Return information, including possible requests for further processing ("Return Action"). Return actions are constrained by the allowedReturnTypes parameter.
	 */
	function UndoCheckoutDocument($documentId, $allowedReturnTypes)
	{
		$result = $this->sendRequest("UndoCheckoutDocument", array("DocumentId"=>$documentId, "AllowedReturnTypes"=>$allowedReturnTypes));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a list of existing, committed  versions for a given document
	 *
	 *@$documentId		SuperOffice document Id
	 *
	 *@return: Array of objects describing the existing, committed versions for this document
	 */
	function GetVersionList($documentId)
	{
		$result = $this->sendRequest("GetVersionList", array("DocumentId"=>$documentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a list of plugin-dependent capabilities for a given document archive plugin.<br/>A standard set of properties is defined in SuperOffice.CRM.Documents.Constants.Capabilities.
	 *
	 *@$pluginId		Numeric document plugin id, corresponding to the document.archiveProvider id or doctmpl.autoeventid.
	 *
	 *@return: Dictionary mapping capability names=values
	 */
	function GetPluginCapabilities($pluginId)
	{
		$result = $this->sendRequest("GetPluginCapabilities", array("PluginId"=>$pluginId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get plugin-dependent properties for the document. A number of standard properties that should be supported by all plugins are defined in SuperOffice.CRM.Documents.Constants.Properties.
	 *
	 *@$documentId		SuperOffice document ID
	 *@$requestedProperties		Array of property names whose values are being requested.
	 *
	 *@return: Dictionary of name=value pairs, corresponding to the requested properties.
	 */
	function GetDocumentProperties($documentId, $requestedProperties)
	{
		$result = $this->sendRequest("GetDocumentProperties", array("DocumentId"=>$documentId, "RequestedProperties"=>$requestedProperties));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a list of custom commands valid for the specific document at this time. This information should not be cached by clients, as it may change between documents and over time.
	 *
	 *@$documentId		SuperOffice document ID
	 *@$allowedReturnTypes		List of return types that the client is prepared to handle, in case the document plugin needs to request additional processing.<br/>Standard allowed return types include 'None', 'Message', 'SoProtocol', 'CustomGui', 'Other'.<br/>An empty array implies that the client places no restriction on possible return action requests.<br/>In this context the parameter is used to filter the returned command list, so that commands that require return actions not supported, will not be included by the document plugin.
	 *
	 *@return: Array of command information items. The command list is constrained by the allowedReturnTypes parameter.
	 */
	function GetDocumentCommands($documentId, $allowedReturnTypes)
	{
		$result = $this->sendRequest("GetDocumentCommands", array("DocumentId"=>$documentId, "AllowedReturnTypes"=>$allowedReturnTypes));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Execute a custom command on a particular document, optionally a particular version
	 *
	 *@$documentId		SuperOffice document ID
	 *@$versionId		Version ID if applicable/desired; a blank value implies "latest" version and is always acceptable.
	 *@$allowedReturnTypes		List of return types that the client is prepared to handle, in case the document plugin needs to request additional processing.<br/>Standard allowed return types include 'None', 'Message', 'SoProtocol', 'CustomGui', 'Other'.<br/>An empty array implies that the client places no restriction on possible return action requests.
	 *@$command		Command name, generally matching one of those returned from the GetDocumentCommands service. However, it is legal for document plugins to support commands that are not declared through GetDocumentCommands, for instance if a custom GUI needs to access plugin functionality.
	 *@$additionalData		Any additional data that the document command needs. This parameter can be used as a tunnel between a custom-programmed GUI and its plugin.<br/>It is suggested that the format is name=value, with one such pair per array item.
	 *
	 *@return: Return information, including possible requests for further processing ("Return Action"). Return actions are constrained by the allowedReturnTypes parameter.
	 */
	function ExecuteDocumentCommand($documentId, $versionId, $allowedReturnTypes, $command, $additionalData)
	{
		$result = $this->sendRequest("ExecuteDocumentCommand", array("DocumentId"=>$documentId, "VersionId"=>$versionId, "AllowedReturnTypes"=>$allowedReturnTypes, "Command"=>$command, "AdditionalData"=>$additionalData));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save the document entity. If the entity already exists and the file name of the incoming entity is different from the existing one, a corresponding renaming of the physical document will be attempted. This may cause an amended file name to be substituted into the document entity, since a document plugin may have aribitrary rules on file names and collisions. Clients should always inspect the return value from this call and not assume that what they sent for saving is the final truth.
	 *
	 *@$documentEntity		Entity to be saved
	 *
	 *@return: Entity as saved. If the entity already exists and the file name of the incoming entity is different from the existing one, a corresponding renaming of the physical document will be attempted. This may cause an amended file name to be substituted into the document entity, since a document plugin may have aribitrary rules on file names and collisions. Clients should always inspect the return value from this call and not assume that what they sent for saving is the final truth.
	 */
	function SaveDocumentEntity($documentEntity)
	{
		$result = $this->sendRequest("SaveDocumentEntity", array("DocumentEntity"=>$documentEntity));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$suggestedDocumentId		
	 *
	 *@return: 
	 */
	function CreateDefaultDocumentEntityFromSuggestion($suggestedDocumentId)
	{
		$result = $this->sendRequest("CreateDefaultDocumentEntityFromSuggestion", array("SuggestedDocumentId"=>$suggestedDocumentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves content in stream to document template file
	 *
	 *@$documentTemplateId		Identifier for document template
	 *@$content		Stream containing content to be saved to document template file (Using a serializable type: byte[]
	 *@$languageCode		Language code
	 *@$pluginId		Plugin id
	 *
	 *@return: Template info
	 */
	function SaveDocumentTemplateStream($documentTemplateId, $content, $languageCode, $pluginId)
	{
		$result = $this->sendRequest("SaveDocumentTemplateStream", array("DocumentTemplateId"=>$documentTemplateId, "Content"=>$content, "LanguageCode"=>$languageCode, "PluginId"=>$pluginId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Document objects.
	 * 
	 * @$documentIds		The identifiers of the Document object
	 *
	 * @returns Array of Document objects
	 */ 
	function GetDocumentList($documentIds)
	{
		$result = $this->sendRequest("GetDocumentList", array("DocumentIds"=>$documentIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all documents that are linked to the appointment. I.e. the documents that are listed in the appointment dialog.
	 *
	 *@$appointmentId		The appointment id.
	 *
	 *@return: Array of documents
	 */
	function GetAppointmentDocuments($appointmentId)
	{
		$result = $this->sendRequest("GetAppointmentDocuments", array("AppointmentId"=>$appointmentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all documents that are linked to the sale. I.e. the documents that are listed in the sale dialog.
	 *
	 *@$saleId		The sale id.
	 *
	 *@return: Array of documents
	 */
	function GetSaleDocuments($saleId)
	{
		$result = $this->sendRequest("GetSaleDocuments", array("SaleId"=>$saleId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all documents that are linked to the person. I.e. the documents that are listed in the person dialog.
	 *
	 *@$personId		The person id.
	 *
	 *@return: Array of documents
	 */
	function GetPersonDocuments($personId)
	{
		$result = $this->sendRequest("GetPersonDocuments", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the document if it's published
	 *
	 *@$documentId		The document id
	 *
	 *@return: Document
	 */
	function GetPublishedDocument($documentId)
	{
		$result = $this->sendRequest("GetPublishedDocument", array("DocumentId"=>$documentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the published documents from an array of doucment ids.
	 *
	 *@$documentIds		Array of document ids.
	 *
	 *@return: Array of Document
	 */
	function GetPublishedDocuments($documentIds)
	{
		$result = $this->sendRequest("GetPublishedDocuments", array("DocumentIds"=>$documentIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *
	 *@return: Array of documents
	 */
	function GetMyPublishedDocuments()
	{
		$result = $this->sendRequest("GetMyPublishedDocuments", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of published document appointments within a time range. The document appointments is visible to the person specified or the document is in a project the person belongs to. 
	 *
	 *@$personId		The personId
	 *@$includeProjectDocuments		Include projectDocuments to select documents in projects person is a member of.
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPublishedDocumentsByDate($personId, $includeProjectDocuments, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetPublishedDocumentsByDate", array("PersonId"=>$personId, "IncludeProjectDocuments"=>$includeProjectDocuments, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range, filtered by document template types. The document appointments belong to the contact specified. 
	 *
	 *@$contactId		The contact id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$documentTemplateIds		Ids of the document template types to filter on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetContactDocumentsByTemplateTypes($contactId, $startTime, $endTime, $count, $documentTemplateIds)
	{
		$result = $this->sendRequest("GetContactDocumentsByTemplateTypes", array("ContactId"=>$contactId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "DocumentTemplateIds"=>$documentTemplateIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range, filtered by document template type. The document appointments belong to the contact specified. 
	 *
	 *@$contactId		The contact id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$documentTemplateId		Id of the document template type to filter on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetContactDocumentsByTemplateType($contactId, $startTime, $endTime, $count, $documentTemplateId)
	{
		$result = $this->sendRequest("GetContactDocumentsByTemplateType", array("ContactId"=>$contactId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "DocumentTemplateId"=>$documentTemplateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range, filtered by the document template heading. The document appointments belong to the contact specified. The heading represents a grouping or filtering of document templates.
	 *
	 *@$contactId		The contact id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$templateHeadingId		The document template heading id. The heading represents a grouping or filtering of document templates.
	 *
	 *@return: Array of Appointments.
	 */
	function GetContactDocumentsByTemplateHeading($contactId, $startTime, $endTime, $count, $templateHeadingId)
	{
		$result = $this->sendRequest("GetContactDocumentsByTemplateHeading", array("ContactId"=>$contactId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TemplateHeadingId"=>$templateHeadingId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range. The document appointments belong to the contact specified. 
	 *
	 *@$contactId		The contact id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetContactDocuments($contactId, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetContactDocuments", array("ContactId"=>$contactId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of published document appointments within a time range. The document appointments belong to the person specified or the document is in a project the person belongs to. 
	 *
	 *@$personId		The person id of the SuperOffice user (associate).
	 *@$includeProjectDocuments		If true, all appointments that belong to projects where the user is a project member are included as well as the appointments belonging to the person.
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPublishedPersonDocumentsByDate($personId, $includeProjectDocuments, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetPublishedPersonDocumentsByDate", array("PersonId"=>$personId, "IncludeProjectDocuments"=>$includeProjectDocuments, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get published appointment documents by project id.
	 *
	 *@$projectId		The project id
	 *
	 *@return: Array of Appointment
	 */
	function GetPublishedProjectDocuments($projectId)
	{
		$result = $this->sendRequest("GetPublishedProjectDocuments", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range, filtered by document template types. The document appointments belong to the project member specified. 
	 *
	 *@$personId		The project member's person id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$documentTemplateIds		Ids of the document template types to filter on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectMemberDocumentsByTemplateTypes($personId, $startTime, $endTime, $count, $documentTemplateIds)
	{
		$result = $this->sendRequest("GetProjectMemberDocumentsByTemplateTypes", array("PersonId"=>$personId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "DocumentTemplateIds"=>$documentTemplateIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range, filtered by document template type. The document appointments belong to the project member specified. 
	 *
	 *@$personId		The project member's person id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$documentTemplateId		Id of the document template type to filter on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectMemberDocumentsByTemplateType($personId, $startTime, $endTime, $count, $documentTemplateId)
	{
		$result = $this->sendRequest("GetProjectMemberDocumentsByTemplateType", array("PersonId"=>$personId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "DocumentTemplateId"=>$documentTemplateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range, filtered by document template heading. The document appointments belong to the project member specified. The heading represents a grouping or filtering of document templates.
	 *
	 *@$personId		The project member's person id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$templateHeadingId		The document template heading id. The heading represents a grouping or filtering of document templates.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectMemberDocumentsByTemplateHeading($personId, $startTime, $endTime, $count, $templateHeadingId)
	{
		$result = $this->sendRequest("GetProjectMemberDocumentsByTemplateHeading", array("PersonId"=>$personId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TemplateHeadingId"=>$templateHeadingId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range. The document appointments belong to the project member specified. 
	 *
	 *@$personId		The project member's person id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectMemberDocuments($personId, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetProjectMemberDocuments", array("PersonId"=>$personId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range, filtered by document template types. The document appointments belong to the project specified. 
	 *
	 *@$projectId		The project id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$documentTemplateIds		Ids of the document template types to filter on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectDocumentsByTemplateTypes($projectId, $startTime, $endTime, $count, $documentTemplateIds)
	{
		$result = $this->sendRequest("GetProjectDocumentsByTemplateTypes", array("ProjectId"=>$projectId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "DocumentTemplateIds"=>$documentTemplateIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range, filtered by document template type. The document appointments belong to the project specified. 
	 *
	 *@$projectId		The project id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$documentTemplateId		Id of the document template type to filter on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectDocumentsByTemplateType($projectId, $startTime, $endTime, $count, $documentTemplateId)
	{
		$result = $this->sendRequest("GetProjectDocumentsByTemplateType", array("ProjectId"=>$projectId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "DocumentTemplateId"=>$documentTemplateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range, filtered by document template heading. The document appointments belong to the project specified. The heading represents a grouping or filtering of document templates.
	 *
	 *@$projectId		The project id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$templateHeadingId		The document template heading id. The heading represents a grouping or filtering of document templates.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectDocumentsByTemplateHeading($projectId, $startTime, $endTime, $count, $templateHeadingId)
	{
		$result = $this->sendRequest("GetProjectDocumentsByTemplateHeading", array("ProjectId"=>$projectId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TemplateHeadingId"=>$templateHeadingId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range. The document appointments belong to the project specified. 
	 *
	 *@$projectId		The project id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectDocuments($projectId, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetProjectDocuments", array("ProjectId"=>$projectId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range, filtered by document template types. The document appointments belong to the person specified. 
	 *
	 *@$personId		The person id of the SuperOffice user (associate).
	 *@$includeProjectDocuments		If true, all appointments that belong to projects where the user is a project member are included as well as the appointments belonging to the person.
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$documentTemplateIds		Ids of the document template types to filter on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPersonDocumentsByTemplateTypes($personId, $includeProjectDocuments, $startTime, $endTime, $count, $documentTemplateIds)
	{
		$result = $this->sendRequest("GetPersonDocumentsByTemplateTypes", array("PersonId"=>$personId, "IncludeProjectDocuments"=>$includeProjectDocuments, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "DocumentTemplateIds"=>$documentTemplateIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range, filtered by document template type. The document appointments belong to the person specified. 
	 *
	 *@$personId		The person id of the SuperOffice user (associate).
	 *@$includeProjectDocuments		If true, all appointments that belong to projects where the user is a project member are included as well as the appointments belonging to the person.
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$documentTemplateId		Id of the document template type to filter on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPersonDocumentsByTemplateType($personId, $includeProjectDocuments, $startTime, $endTime, $count, $documentTemplateId)
	{
		$result = $this->sendRequest("GetPersonDocumentsByTemplateType", array("PersonId"=>$personId, "IncludeProjectDocuments"=>$includeProjectDocuments, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "DocumentTemplateId"=>$documentTemplateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range, filtered by document template heading. The document appointments belong to the person specified. The heading represents a grouping or filtering of document templates.
	 *
	 *@$personId		The person id of the SuperOffice user (associate).
	 *@$includeProjectDocuments		If true, all appointments that belong to projects where the user is a project member are included as well as the appointments belonging to the person.
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$templateHeadingId		The document template heading id. The heading represents a grouping or filtering of document templates.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPersonDocumentsByTemplateHeading($personId, $includeProjectDocuments, $startTime, $endTime, $count, $templateHeadingId)
	{
		$result = $this->sendRequest("GetPersonDocumentsByTemplateHeading", array("PersonId"=>$personId, "IncludeProjectDocuments"=>$includeProjectDocuments, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TemplateHeadingId"=>$templateHeadingId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of document appointments within a time range. The document appointments belong to the person specified. 
	 *
	 *@$personId		The person id of the SuperOffice user (associate).
	 *@$includeProjectDocuments		If true, all appointments that belong to projects where the user is a project member are included as well as the appointments belonging to the person.
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPersonDocumentsByDate($personId, $includeProjectDocuments, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetPersonDocumentsByDate", array("PersonId"=>$personId, "IncludeProjectDocuments"=>$includeProjectDocuments, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns document appointments, filtered by the document template heading. The heading represents a grouping or filtering of document templates.
	 *
	 *@$templateHeadingId		The document template heading id. The heading represents a grouping or filtering of document templates.
	 *
	 *@return: Array of Appointments.
	 */
	function GetDocumentsByTemplateHeading($templateHeadingId)
	{
		$result = $this->sendRequest("GetDocumentsByTemplateHeading", array("TemplateHeadingId"=>$templateHeadingId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a SuggestedDocumentEntity object.
	 * 
	 * @$suggestedDocumentEntityId		The identifier of the SuggestedDocumentEntity object
	 *
	 * @returns SuggestedDocumentEntity
	 */ 
	function GetSuggestedDocumentEntity($suggestedDocumentEntityId)
	{
		$result = $this->sendRequest("GetSuggestedDocumentEntity", array("SuggestedDocumentEntityId"=>$suggestedDocumentEntityId));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

