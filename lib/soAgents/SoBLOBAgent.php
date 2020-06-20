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

		
class SoBLOBAgent extends SoAgent
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
        parent::__construct($endpoint."BLOB.svc", "WcfBLOB.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new BlobEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New BlobEntity with default values
     */
     function CreateDefaultBlobEntity()
     {
		$result = $this->sendRequest("CreateDefaultBlobEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing BlobEntity or creates a new BlobEntity if the id parameter is empty
     * 
     * @return New or updated BlobEntity
     */
	function SaveBlobEntity($blobEntity)
	{
		$result = $this->sendRequest("SaveBlobEntity", array("BlobEntity"=>$blobEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the BlobEntity
	 * 
	 * @$blobEntityId		The identity of the BlobEntity
	 */
	function DeleteBlobEntity($blobEntityId)
	{
		$result = $this->sendRequest("DeleteBlobEntity", array("BlobEntity"=>$blobEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

	/**
	 * Summary
	 * Gets a BlobEntity object.
	 * 
	 * @$blobEntityId		The identifier of the BlobEntity object
	 *
	 * @returns BlobEntity
	 */ 
	function GetBlobEntity($blobEntityId)
	{
		$result = $this->sendRequest("GetBlobEntity", array("BlobEntityId"=>$blobEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Store a binary object from it's stream
	 *
	 *@$blobEntityId		Id of the BLOB entity object that the binary data should be stored to.
	 *@$stream		The binary object as a Stream (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SetBlobStream($blobEntityId, $stream)
	{
		$result = $this->sendRequest("SetBlobStream", array("BlobEntityId"=>$blobEntityId, "Stream"=>$stream));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get the binary object as a stream
	 *
	 *@$blobEntityId		The ID of the BLOB entity object that refers to the binary data
	 *
	 *@return: The binary object as a Stream (Returned as a serializable type: byte[]
	 */
	function GetBlobStream($blobEntityId)
	{
		$result = $this->sendRequest("GetBlobStream", array("BlobEntityId"=>$blobEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the project image that is displayed in the CRM application.
	 *
	 *@$projectId		The project id of the project the image belongs to.
	 *
	 *@return: The image as a System.Drawing.Image. (If the the image is returned over webservices, the stream is returned as a Base64 encoded string.) (Returned as a serializable type: byte[]
	 */
	function GetProjectImage($projectId)
	{
		$result = $this->sendRequest("GetProjectImage", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the person image that is displayed in the CRM application.
	 *
	 *@$personId		The person id of the person the image belongs to.
	 *
	 *@return: The image as a System.Drawing.Image. (If the the image is returned over webservices, the stream is returned as a Base64 encoded string.) (Returned as a serializable type: byte[]
	 */
	function GetPersonImage($personId)
	{
		$result = $this->sendRequest("GetPersonImage", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Stores the project image that is displayed in the CRM application.
	 *
	 *@$projectId		The project id of the project the image belongs to.
	 *@$image		The image that is stored on the project (System.Drawing.Image) (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SetProjectImage($projectId, $image)
	{
		$result = $this->sendRequest("SetProjectImage", array("ProjectId"=>$projectId, "Image"=>$image));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Stores the person image that is displayed in the CRM application.
	 *
	 *@$personId		The person id of the person the image belongs to.
	 *@$image		The image that is stored on the person (System.Drawing.Image) (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SetPersonImage($personId, $image)
	{
		$result = $this->sendRequest("SetPersonImage", array("PersonId"=>$personId, "Image"=>$image));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Changes the project image link. If the Binary object id is 0, any image link is removed from the project.
	 *
	 *@$projectId		The project the image is linked to
	 *@$blobId		The Binary object id. If the Binary object id is 0, any image link is removed from the project.
	 *
	 *@return: 
	 */
	function ChangeProjectImage($projectId, $blobId)
	{
		$result = $this->sendRequest("ChangeProjectImage", array("ProjectId"=>$projectId, "BlobId"=>$blobId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Saves a project image that is displayed in the CRM application's project image selection dialog to the database.
	 *
	 *@$description		Image description. Should be image name (e.g. winter.jpg) for project images
	 *@$image		The project image (System.Drawing.Image) (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SaveProjectImage($description, $image)
	{
		$result = $this->sendRequest("SaveProjectImage", array("Description"=>$description, "Image"=>$image));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Gets the blob entity that represents the project image binary object.
	 *
	 *@$projectId		The project id
	 *
	 *@return: BlobEntity object
	 */
	function GetBlobEntityOnProject($projectId)
	{
		$result = $this->sendRequest("GetBlobEntityOnProject", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the blob entity that represents the person image binary object.
	 *
	 *@$personId		The person id
	 *
	 *@return: BlobEntity object
	 */
	function GetBlobEntityOnPerson($personId)
	{
		$result = $this->sendRequest("GetBlobEntityOnPerson", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the blob entity that represents the country flag binary object.
	 *
	 *@$countryId		The country id
	 *
	 *@return: BlobEntity object
	 */
	function GetBlobEntityOnCountry($countryId)
	{
		$result = $this->sendRequest("GetBlobEntityOnCountry", array("CountryId"=>$countryId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the blob entity that represents the product image binary object.
	 *
	 *@$productId		The product id
	 *
	 *@return: BlobEntity object
	 */
	function GetBlobEntityOnProduct($productId)
	{
		$result = $this->sendRequest("GetBlobEntityOnProduct", array("ProductId"=>$productId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$personId		The person the image is linked to
	 *@$blobId		The Binary object id. If the Binary object id is 0, any image link is removed from the person.
	 *
	 *@return: 
	 */
	function ChangePersonImage($personId, $blobId)
	{
		$result = $this->sendRequest("ChangePersonImage", array("PersonId"=>$personId, "BlobId"=>$blobId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Stores an image in the database without linking it to a project or a person. It is possible to ChangePersonImage or ChangeProjectImage to attach image later.
	 *
	 *@$type		The type of the image.
	 *@$image		Image to store (Using a serializable type: byte[]
	 *@$description		Image description
	 *
	 *@return: The blob id
	 */
	function SaveImageStream($type, $image, $description)
	{
		$result = $this->sendRequest("SaveImageStream", array("Type"=>$type, "Image"=>$image, "Description"=>$description));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the product image (rank=1) that is displayed in the CRM application.
	 *
	 *@$productId		The product id of the product the image belongs to.
	 *
	 *@return: The image as a System.Drawing.Image. (If the the image is returned over webservices, the stream is returned as a Base64 encoded string.) (Returned as a serializable type: byte[]
	 */
	function GetProductImage($productId)
	{
		$result = $this->sendRequest("GetProductImage", array("ProductId"=>$productId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Stores the product image that is displayed in the CRM application. The image is scaled down to max 1000x1000. This method operates only the main (rank=1) image; future extensions may support multiple images. A thumbnail of size 75x75 is also automatically set.
	 *
	 *@$productId		The project id of the product the image belongs to.
	 *@$image		The image that is stored on the product (System.Drawing.Image), scaled down to no more than 1000x1000 (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SetProductImage($productId, $image)
	{
		$result = $this->sendRequest("SetProductImage", array("ProductId"=>$productId, "Image"=>$image));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns the product thumbnail that is displayed in the CRM application.
	 *
	 *@$productId		The product id of the product the thumbnail belongs to.
	 *
	 *@return: The thumbnail as a System.Drawing.Image. (If the the image is returned over webservices, the stream is returned as a Base64 encoded string.) (Returned as a serializable type: byte[]
	 */
	function GetProductThumbnail($productId)
	{
		$result = $this->sendRequest("GetProductThumbnail", array("ProductId"=>$productId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Stores the product thumbnail that is displayed in the CRM application. The image is scaled down to max 200x200 pixels.
	 *
	 *@$productId		The project id of the product the image belongs to.
	 *@$image		The image that is stored on the product (System.Drawing.Image); scaled down to no more than 200x200 (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SetProductThumbnail($productId, $image)
	{
		$result = $this->sendRequest("SetProductThumbnail", array("ProductId"=>$productId, "Image"=>$image));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$productId		The product the image is linked to
	 *@$blobId		The Binary object id. If the Binary object id is 0, any image link is removed from the product.
	 *
	 *@return: 
	 */
	function ChangeProductImage($productId, $blobId)
	{
		$result = $this->sendRequest("ChangeProductImage", array("ProductId"=>$productId, "BlobId"=>$blobId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns the quoteline image (rank=1) that is displayed in the CRM application.
	 *
	 *@$quoteLineId		The product id of the quoteline the image belongs to.
	 *
	 *@return: The image as a System.Drawing.Image. (If the the image is returned over webservices, the stream is returned as a Base64 encoded string.) (Returned as a serializable type: byte[]
	 */
	function GetQuoteLineImage($quoteLineId)
	{
		$result = $this->sendRequest("GetQuoteLineImage", array("QuoteLineId"=>$quoteLineId));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

