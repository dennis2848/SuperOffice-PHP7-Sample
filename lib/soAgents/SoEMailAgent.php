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

		
class SoEMailAgent extends SoAgent
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
        parent::__construct($endpoint."EMail.svc", "WcfEMail.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new EMailAddress.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New EMailAddress with default values
     */
     function CreateDefaultEMailAddress()
     {
		$result = $this->sendRequest("CreateDefaultEMailAddress", array());
		return $this->getResultFromResponse($result);
     }
        

    /**
     * Loading default values into a new EMailAttachment.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New EMailAttachment with default values
     */
     function CreateDefaultEMailAttachment()
     {
		$result = $this->sendRequest("CreateDefaultEMailAttachment", array());
		return $this->getResultFromResponse($result);
     }
        

    /**
     * Loading default values into a new EMailConnectionInfo.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New EMailConnectionInfo with default values
     */
     function CreateDefaultEMailConnectionInfo()
     {
		$result = $this->sendRequest("CreateDefaultEMailConnectionInfo", array());
		return $this->getResultFromResponse($result);
     }
        

    /**
     * Loading default values into a new EMailConnectionInfoExtended.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New EMailConnectionInfoExtended with default values
     */
     function CreateDefaultEMailConnectionInfoExtended()
     {
		$result = $this->sendRequest("CreateDefaultEMailConnectionInfoExtended", array());
		return $this->getResultFromResponse($result);
     }
        

    /**
     * Loading default values into a new EMailCustomHeader.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New EMailCustomHeader with default values
     */
     function CreateDefaultEMailCustomHeader()
     {
		$result = $this->sendRequest("CreateDefaultEMailCustomHeader", array());
		return $this->getResultFromResponse($result);
     }
        

    /**
     * Loading default values into a new EMailEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New EMailEntity with default values
     */
     function CreateDefaultEMailEntity()
     {
		$result = $this->sendRequest("CreateDefaultEMailEntity", array());
		return $this->getResultFromResponse($result);
     }
        

    /**
     * Loading default values into a new EMailEnvelope.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New EMailEnvelope with default values
     */
     function CreateDefaultEMailEnvelope()
     {
		$result = $this->sendRequest("CreateDefaultEMailEnvelope", array());
		return $this->getResultFromResponse($result);
     }
        

    /**
     * Loading default values into a new EMailFolder.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New EMailFolder with default values
     */
     function CreateDefaultEMailFolder()
     {
		$result = $this->sendRequest("CreateDefaultEMailFolder", array());
		return $this->getResultFromResponse($result);
     }
        

    /**
     * Loading default values into a new EMailSOInfo.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New EMailSOInfo with default values
     */
     function CreateDefaultEMailSOInfo()
     {
		$result = $this->sendRequest("CreateDefaultEMailSOInfo", array());
		return $this->getResultFromResponse($result);
     }
        

	/** 
	 * Summary
	 * Get en e-mail based on its unique id
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$messageServerId		Unique ID for the e-mail to retrieve
	 *@$lookupAddresses		If true try to look up e-mail addresses in from/to/cc/bcc fields against superoffice contacts
	 *@$flags		Any flags to apply to the fetched item. Ex: Seen/Answered
	 *@$includeAttachments		Should we retrieve attachments embedded in the e-mail from the server
	 *
	 *@return: The e-mail
	 */
	function GetEMailFromId($connectionInfo, $messageServerId, $lookupAddresses, $flags, $includeAttachments)
	{
		$result = $this->sendRequest("GetEMailFromId", array("ConnectionInfo"=>$connectionInfo, "MessageServerId"=>$messageServerId, "LookupAddresses"=>$lookupAddresses, "Flags"=>$flags, "IncludeAttachments"=>$includeAttachments));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Send the provided e-mails
	 *
	 *@$outgoingConnectionInfo		All information needed to connect to the mailserver
	 *@$emails		The e-mails to send
	 *@$sentItemsConnectionInfo		If provided, save sent item(s) in the folder specified.  May be null.
	 *
	 *@return: The sent e-mails (updated with message id etc.)
	 */
	function SendEMails($outgoingConnectionInfo, $emails, $sentItemsConnectionInfo)
	{
		$result = $this->sendRequest("SendEMails", array("OutgoingConnectionInfo"=>$outgoingConnectionInfo, "Emails"=>$emails, "SentItemsConnectionInfo"=>$sentItemsConnectionInfo));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save the passed e-mail back to the server
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$email		The e-mail to save
	 *
	 *@return: The updated saved entity
	 */
	function SaveEMail($connectionInfo, $email)
	{
		$result = $this->sendRequest("SaveEMail", array("ConnectionInfo"=>$connectionInfo, "Email"=>$email));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Authenticate against a mail-server to retrieve e-mails from
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *
	 *@return: True if authentication was succcesfull
	 */
	function AuthenticateIncoming($connectionInfo)
	{
		$result = $this->sendRequest("AuthenticateIncoming", array("ConnectionInfo"=>$connectionInfo));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Authenticate against a mail server to send items with
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *
	 *@return: True if authentication was succcesfull
	 */
	function AuthenticateOutgoing($connectionInfo)
	{
		$result = $this->sendRequest("AuthenticateOutgoing", array("ConnectionInfo"=>$connectionInfo));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Retrieve all folders for the mail account. String is separated in sections by the paragraph character.  First section contains the folder delimeter char. Next is folder name. Additional sections may be unread and total items.
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$includeItemCount		If true, unread and total items are added to the foldername separated by a comma
	 *
	 *@return: List of available folders as a string array
	 */
	function GetFolderList($connectionInfo, $includeItemCount)
	{
		$result = $this->sendRequest("GetFolderList", array("ConnectionInfo"=>$connectionInfo, "IncludeItemCount"=>$includeItemCount));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Retrieve an attachment from an e-mail
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$messageServerId		Unique ID for the e-mail to retrieve the attachment from
	 *@$attachmentId		Id of the attachment in the e-mail
	 *
	 *@return: The attachment
	 */
	function GetAttachment($connectionInfo, $messageServerId, $attachmentId)
	{
		$result = $this->sendRequest("GetAttachment", array("ConnectionInfo"=>$connectionInfo, "MessageServerId"=>$messageServerId, "AttachmentId"=>$attachmentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Mark one or more e-mails as (un)read
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$messageServerIds		The e-mails to handle
	 *@$read		If true mails are marked as read.
	/// If false mails are marked as unread.
	 *
	 *@return: 
	 */
	function MarkAsRead($connectionInfo, $messageServerIds, $read)
	{
		$result = $this->sendRequest("MarkAsRead", array("ConnectionInfo"=>$connectionInfo, "MessageServerIds"=>$messageServerIds, "Read"=>$read));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Retrieve total/unread mail items in current folder
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$onlyUnread		If true, only unread items are counted
	 *
	 *@return: Number of mail items
	 */
	function GetFolderEMailCount($connectionInfo, $onlyUnread)
	{
		$result = $this->sendRequest("GetFolderEMailCount", array("ConnectionInfo"=>$connectionInfo, "OnlyUnread"=>$onlyUnread));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Delete specified mail items
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$messageServerIds		The e-mails to handle
	 *@$moveToFolder		If set, move deleted items to this folder
	 *
	 *@return: 
	 */
	function Delete($connectionInfo, $messageServerIds, $moveToFolder)
	{
		$result = $this->sendRequest("Delete", array("ConnectionInfo"=>$connectionInfo, "MessageServerIds"=>$messageServerIds, "MoveToFolder"=>$moveToFolder));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Moved specified items from current folder to targetFolder
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$messageServerIds		The e-mails to handle
	 *@$targetFolder		Name of folder to move items to
	 *
	 *@return: 
	 */
	function MoveToFolder($connectionInfo, $messageServerIds, $targetFolder)
	{
		$result = $this->sendRequest("MoveToFolder", array("ConnectionInfo"=>$connectionInfo, "MessageServerIds"=>$messageServerIds, "TargetFolder"=>$targetFolder));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Delete all items in folder specified in the connection object
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$moveToFolder		If set, move deleted items to this folder
	 *
	 *@return: 
	 */
	function EmptyFolder($connectionInfo, $moveToFolder)
	{
		$result = $this->sendRequest("EmptyFolder", array("ConnectionInfo"=>$connectionInfo, "MoveToFolder"=>$moveToFolder));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Retrieve an e-mail optionally stripping attachments as a stream
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$messageServerId		Unique ID for the e-mail to retrieve
	 *@$stripAttachments		If true, do not include attachments in stream
	 *
	 *@return: The attachment as a stream (Returned as a serializable type: byte[]
	 */
	function GetEMailAsStream($connectionInfo, $messageServerId, $stripAttachments)
	{
		$result = $this->sendRequest("GetEMailAsStream", array("ConnectionInfo"=>$connectionInfo, "MessageServerId"=>$messageServerId, "StripAttachments"=>$stripAttachments));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Search for contacts and persons with the specified e-mail address (exact match on the email address string required)
	 *
	 *@$address		E-mail address to look for
	 *
	 *@return: All resolved contacts/persons
	 */
	function FindAddress($address)
	{
		$result = $this->sendRequest("FindAddress", array("Address"=>$address));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get an e-mail based on an archived document
	 *
	 *@$documentId		Unique id of the document
	 *
	 *@return: The e-mail
	 */
	function GetEMailFromDocumentId($documentId)
	{
		$result = $this->sendRequest("GetEMailFromDocumentId", array("DocumentId"=>$documentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Retrieve a set of e-mail envelopes
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$messageServerIds		Unique identitifiers for the e-mails to retrieve envelopes for
	 *
	 *@return: The e-mail envelope objects
	 */
	function GetEMailEnvelopes($connectionInfo, $messageServerIds)
	{
		$result = $this->sendRequest("GetEMailEnvelopes", array("ConnectionInfo"=>$connectionInfo, "MessageServerIds"=>$messageServerIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Set subscription on or off on a set of folders
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$folders		Folders to set subscription value on
	 *
	 *@return: 
	 */
	function SetSubscription($connectionInfo, $folders)
	{
		$result = $this->sendRequest("SetSubscription", array("ConnectionInfo"=>$connectionInfo, "Folders"=>$folders));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Create a new folder on the server
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *
	 *@return: 
	 */
	function CreateFolder($connectionInfo)
	{
		$result = $this->sendRequest("CreateFolder", array("ConnectionInfo"=>$connectionInfo));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Delete a folder from the server
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *
	 *@return: 
	 */
	function DeleteFolder($connectionInfo)
	{
		$result = $this->sendRequest("DeleteFolder", array("ConnectionInfo"=>$connectionInfo));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get an e-mail based on the provided DocumentEntity
	 *
	 *@$documentEntity		DocumentEntity data
	 *
	 *@return: The e-mail
	 */
	function CreateEMailFromDocumentEntity($documentEntity)
	{
		$result = $this->sendRequest("CreateEMailFromDocumentEntity", array("DocumentEntity"=>$documentEntity));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Retrieve information about folders.  If folders parameter is not specified(null), information about all subscribed folders will be returned.
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *@$folders		Folders to get information about.
	 *
	 *@return: Folder information
	 */
	function GetFolderInfo($connectionInfo, $folders)
	{
		$result = $this->sendRequest("GetFolderInfo", array("ConnectionInfo"=>$connectionInfo, "Folders"=>$folders));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Check if folder has received new items since previous access.
	 *
	 *@$connectionInfo		All information needed to connect to the mailserver
	 *
	 *@return: True if new mail is available.
	 */
	function GetFolderHasNewEMail($connectionInfo)
	{
		$result = $this->sendRequest("GetFolderHasNewEMail", array("ConnectionInfo"=>$connectionInfo));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get information about one or more email addresses, identified by IDs
	 *
	 *@$emailIds		Array of IDs from the email table, each identifying one email address
	 *
	 *@return: Array of email information objects
	 */
	function GetEMailAddresses($emailIds)
	{
		$result = $this->sendRequest("GetEMailAddresses", array("EmailIds"=>$emailIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Refresh the given folders - i.e., fetch data from the mail server and update the in-database cache. This may happen synchronously or as a batch task, the return value will be 0 if the processing was synchronous, or the batch task id if a batch task is used.
	 *
	 *@$connectionInfo		Email connection info credentials
	 *@$folders		List of folder names to refresh
	 *
	 *@return: Batch task id, or 0 if the processing was synchronous
	 */
	function RefreshFolder($connectionInfo, $folders)
	{
		$result = $this->sendRequest("RefreshFolder", array("ConnectionInfo"=>$connectionInfo, "Folders"=>$folders));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$fileName		
	 *
	 *@return: 
	 */
	function GetEMailFromTemp($fileName)
	{
		$result = $this->sendRequest("GetEMailFromTemp", array("FileName"=>$fileName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$connectionInfoExtended		
	 *
	 *@return: 
	 */
	function Authenticate($connectionInfoExtended)
	{
		$result = $this->sendRequest("Authenticate", array("ConnectionInfoExtended"=>$connectionInfoExtended));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$connectionInfoExtended		
	 *
	 *@return: 
	 */
	function GetEmailMessageIds($connectionInfoExtended)
	{
		$result = $this->sendRequest("GetEmailMessageIds", array("ConnectionInfoExtended"=>$connectionInfoExtended));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$connectionInfoExtended		
	 *@$messageIds		
	 *
	 *@return: 
	 */
	function GetEmailsAsString($connectionInfoExtended, $messageIds)
	{
		$result = $this->sendRequest("GetEmailsAsString", array("ConnectionInfoExtended"=>$connectionInfoExtended, "MessageIds"=>$messageIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$connectionInfoExtended		
	 *@$messageIds		
	 *
	 *@return: 
	 */
	function DeleteExtended($connectionInfoExtended, $messageIds)
	{
		$result = $this->sendRequest("DeleteExtended", array("ConnectionInfoExtended"=>$connectionInfoExtended, "MessageIds"=>$messageIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$connectionInfoExtended		
	 *@$rfc822		
	 *@$from		
	 *@$recipients		
	 *
	 *@return: 
	 */
	function RelayMessage($connectionInfoExtended, $rfc822, $from, $recipients)
	{
		$result = $this->sendRequest("RelayMessage", array("ConnectionInfoExtended"=>$connectionInfoExtended, "Rfc822"=>$rfc822, "From"=>$from, "Recipients"=>$recipients));	
		return $this->getResultFromResponse($result, true);
	}

	/**
	 * Summary
	 * Gets a EMailSOInfo object.
	 * 
	 * @$eMailSOInfoId		The identifier of the EMailSOInfo object
	 *
	 * @returns EMailSOInfo
	 */ 
	function GetEMailSOInfo($eMailSOInfoId)
	{
		$result = $this->sendRequest("GetEMailSOInfo", array("EMailSOInfoId"=>$eMailSOInfoId));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

