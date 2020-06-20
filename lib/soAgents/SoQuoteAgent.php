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

		
class SoQuoteAgent extends SoAgent
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
        parent::__construct($endpoint."Quote.svc", "WcfQuote.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new QuoteAlternative.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New QuoteAlternative with default values
     */
     function CreateDefaultQuoteAlternative()
     {
		$result = $this->sendRequest("CreateDefaultQuoteAlternative", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing QuoteAlternative or creates a new QuoteAlternative if the id parameter is empty
     * 
     * @return New or updated QuoteAlternative
     */
	function SaveQuoteAlternative($quoteAlternative)
	{
		$result = $this->sendRequest("SaveQuoteAlternative", array("QuoteAlternative"=>$quoteAlternative));
		return $this->getResultFromResponse($result);
	}
        

	/** 
	 * Summary
	 * Used by ADMIN. Asks for metadata needed to populate admin dialog that takes in the information needed to create a connection to an ERP system. The values entered in the dialog are stored in SuperOffice db and used when InitializeConnector is called by the client.
	 *
	 *@$connectionId		Id of an existing connection, if any. Initializes connection with current config values if non-zero.
	 *@$connectorName		Name of the connector. Ignored if connectionId is non-zero.
	 *
	 *@return: carriers
	 */
	function GetConfigurationFields($connectionId, $connectorName)
	{
		$result = $this->sendRequest("GetConfigurationFields", array("ConnectionId"=>$connectionId, "ConnectorName"=>$connectorName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Used by the Admin clients. Testing if the connection data is sufficient to get a connection with the ERP system. The Connector should try to do some operations to check if the connection has sufficient rights to run. The connection has not been created yet. TestConnection is called without InitializeConnector being called first.
	 *
	 *@$connectorName		Name of the connector.
	 *@$connectionData		Basically the name/value collection of the configuration data requested to create a connection
	 *
	 *@return: How the test went
	 */
	function TestConnection($connectorName, $connectionData)
	{
		$result = $this->sendRequest("TestConnection", array("ConnectorName"=>$connectorName, "ConnectionData"=>$connectionData));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a copy of a PriceList in the SuperOffice database
	 *
	 *@$originalPriceListId		Id of the PriceList to be copied
	 *@$newName		Name of the copied PriceList
	 *@$validFrom		
	 *@$validTo		
	 *@$newCurrencyId		Currency id of the copied PriceList. If 0 or the same as the original the copied products will keep their prices and the currency will be the same as the original.
	 *@$convertCurrency		If true, product prices will be recalculated to the new currency. If false, product prices will be set to zero.
	 *
	 *@return: The copied PriceList
	 */
	function CopySuperOfficePriceList($originalPriceListId, $newName, $validFrom, $validTo, $newCurrencyId, $convertCurrency)
	{
		$result = $this->sendRequest("CopySuperOfficePriceList", array("OriginalPriceListId"=>$originalPriceListId, "NewName"=>$newName, "ValidFrom"=>$validFrom, "ValidTo"=>$validTo, "NewCurrencyId"=>$newCurrencyId, "ConvertCurrency"=>$convertCurrency));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the pricelist with the given database id
	 *
	 *@$priceListId		Primary key of the price list
	 *
	 *@return: 
	 */
	function GetPriceList($priceListId)
	{
		$result = $this->sendRequest("GetPriceList", array("PriceListId"=>$priceListId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save a pricelist to the database
	 *
	 *@$priceList		The price list to save
	 *
	 *@return: 
	 */
	function SavePriceList($priceList)
	{
		$result = $this->sendRequest("SavePriceList", array("PriceList"=>$priceList));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes a pricelist from the database
	 *
	 *@$priceListId		Primary key of the price list
	 *
	 *@return: 
	 */
	function DeletePriceList($priceListId)
	{
		$result = $this->sendRequest("DeletePriceList", array("PriceListId"=>$priceListId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Gets an image connected to a product, from the ProductProvider
	 *
	 *@$quoteConnectionId		The connection this product comes from.
	 *@$eRPProductKey		Primary key of the Product in the ProductProvider 
	 *@$rank		The rank of the image.
	 *
	 *@return: The base64 encoded image as a string.
	 */
	function GetProductImage($quoteConnectionId, $eRPProductKey, $rank)
	{
		$result = $this->sendRequest("GetProductImage", array("QuoteConnectionId"=>$quoteConnectionId, "ERPProductKey"=>$eRPProductKey, "Rank"=>$rank));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets a product, from the ProductProvider
	 *
	 *@$quoteAlternativeId		Quote alternative to search in.
	 *@$userInput		search string
	 *@$priceListKey		If the pricelist is null or empty, the function will search in all active pricelists.
	 *
	 *@return: Product array
	 */
	function FindProduct($quoteAlternativeId, $userInput, $priceListKey)
	{
		$result = $this->sendRequest("FindProduct", array("QuoteAlternativeId"=>$quoteAlternativeId, "UserInput"=>$userInput, "PriceListKey"=>$priceListKey));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a product with the given key
	 *
	 *@$quoteConnectionId		The connection this product comes from.
	 *@$eRPProductKey		Primary key of the Product in the ProductProvider
	 *
	 *@return: 
	 */
	function GetProduct($quoteConnectionId, $eRPProductKey)
	{
		$result = $this->sendRequest("GetProduct", array("QuoteConnectionId"=>$quoteConnectionId, "ERPProductKey"=>$eRPProductKey));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a product with the given database id
	 *
	 *@$productId		The database id of the product
	 *
	 *@return: 
	 */
	function GetProductFromDbId($productId)
	{
		$result = $this->sendRequest("GetProductFromDbId", array("ProductId"=>$productId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves a product to the database
	 *
	 *@$product		The product to save
	 *
	 *@return: The resulting product
	 */
	function SaveProduct($product)
	{
		$result = $this->sendRequest("SaveProduct", array("Product"=>$product));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Removes a product from the database
	 *
	 *@$productId		The database id of the product to remove
	 *
	 *@return: 
	 */
	function RemoveProduct($productId)
	{
		$result = $this->sendRequest("RemoveProduct", array("ProductId"=>$productId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Toggles if the prdouct is in assortment or not
	 *
	 *@$productId		The database id of the product to toggle is assortment value of
	 *
	 *@return: 
	 */
	function ToggleProductInAssortment($productId)
	{
		$result = $this->sendRequest("ToggleProductInAssortment", array("ProductId"=>$productId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Saves a Quote
	 *
	 *@$quote		The Quote to save
	 *
	 *@return: The saved Quote
	 */
	function SaveQuote($quote)
	{
		$result = $this->sendRequest("SaveQuote", array("Quote"=>$quote));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a Quote
	 *
	 *@$quoteId		QuoteId of the Quote to get.
	 *
	 *@return: The Quote
	 */
	function GetQuote($quoteId)
	{
		$result = $this->sendRequest("GetQuote", array("QuoteId"=>$quoteId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a Quote for a sale
	 *
	 *@$saleId		SaleId of the Quote to get.
	 *
	 *@return: The Quote
	 */
	function GetQuoteFromSaleId($saleId)
	{
		$result = $this->sendRequest("GetQuoteFromSaleId", array("SaleId"=>$saleId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a new quote on a sale.
	 *
	 *@$saleId		SaleId of the connected sale
	 *@$connectionId		ConnectionId
	 *@$firstAlternativeName		Name to be given to the default alternative
	 *
	 *@return: Quote carrier
	 */
	function CreateAndSaveQuote($saleId, $connectionId, $firstAlternativeName)
	{
		$result = $this->sendRequest("CreateAndSaveQuote", array("SaleId"=>$saleId, "ConnectionId"=>$connectionId, "FirstAlternativeName"=>$firstAlternativeName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a Quote
	 *
	 *@$quoteId		QuoteId of the Quote to get.
	 *
	 *@return: The Quote
	 */
	function GetQuoteEntity($quoteId)
	{
		$result = $this->sendRequest("GetQuoteEntity", array("QuoteId"=>$quoteId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a Quote for a sale
	 *
	 *@$saleId		SaleId of the Quote to get.
	 *
	 *@return: The Quote
	 */
	function GetQuoteEntityFromSaleId($saleId)
	{
		$result = $this->sendRequest("GetQuoteEntityFromSaleId", array("SaleId"=>$saleId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves a QuoteEntity. Versions and alternatives will not be saved by this call.
	 *
	 *@$quoteEntity		The Quote entity to save
	 *
	 *@return: The saved Quote
	 */
	function SaveQuoteEntity($quoteEntity)
	{
		$result = $this->sendRequest("SaveQuoteEntity", array("QuoteEntity"=>$quoteEntity));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a copy the active version with connected alternatives and quotelines from another sale.
	 *
	 *@$copyFromSaleId		Id of the sale to copy the active quote from.
	 *@$copyToSaleId		Id of the sale to copy the active quote to.
	 *
	 *@return: The created Quote
	 */
	function CreateAndSaveQuoteFromSale($copyFromSaleId, $copyToSaleId)
	{
		$result = $this->sendRequest("CreateAndSaveQuoteFromSale", array("CopyFromSaleId"=>$copyFromSaleId, "CopyToSaleId"=>$copyToSaleId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Place an order in the ERP system.
	 *
	 *@$quoteAlternativeId		Id of the alternative to place the order on.
	 *@$markSaleAsSold		Should the state of the owning Sale be set to sold
	 *@$poNumber		Purchase order number, saved to Quote record
	 *@$orderComment		Order comment, saved to Quote record
	 *@$culture		Desired culture for email body and other culture-sensitive templates/content
	 *
	 *@return: Status for the placed order.
	 */
	function PlaceOrder($quoteAlternativeId, $markSaleAsSold, $poNumber, $orderComment, $culture)
	{
		$result = $this->sendRequest("PlaceOrder", array("QuoteAlternativeId"=>$quoteAlternativeId, "MarkSaleAsSold"=>$markSaleAsSold, "PoNumber"=>$poNumber, "OrderComment"=>$orderComment, "Culture"=>$culture));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * If there is a problem with a quoteline, the error description shall be placed in the status and reason fields of the quoteline, if there is a problem with the alternative, the error description shall be placed in the status and reason fields of the alternative. A summary of all the problems (if any) should be placed in the response object. Requires that the Create-Order capability is true.
	 *
	 *@$quoteVersionId		the QuoteVersionId of the ordered version.
	 *
	 *@return: The order state. If a new quoteversion is created, the QuoteVersionId will be found in Changes.AddedRecords.
	 */
	function GetOrderState($quoteVersionId)
	{
		$result = $this->sendRequest("GetOrderState", array("QuoteVersionId"=>$quoteVersionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Delete a Quote
	 *
	 *@$quoteId		QuoteId of the Quote to delete.
	 *
	 *@return: 
	 */
	function DeleteQuote($quoteId)
	{
		$result = $this->sendRequest("DeleteQuote", array("QuoteId"=>$quoteId));	
		return $this->getResultFromResponse($result, true);
	}

	/**
	 * Summary
	 * Gets a QuoteAlternative object.
	 * 
	 * @$quoteAlternativeId		The identifier of the QuoteAlternative object
	 *
	 * @returns QuoteAlternative
	 */ 
	function GetQuoteAlternative($quoteAlternativeId)
	{
		$result = $this->sendRequest("GetQuoteAlternative", array("QuoteAlternativeId"=>$quoteAlternativeId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * When the user changes one or more values in a quoteline or a quoteAlternative, the connector gets to change the QuoteLines and the alternative, for instance calculate VAT. RecalculateQuoteAlternative shall be called when the user changes any of the following fields: Quantity, DiscountAmount, DiscountPercent, listprice (if allowed). RecalculateQuoteAlternative will calculate the TotalPrice and the VAT (if possible) for the lines and the alternative.
	 *
	 *@$quoteAlternative		The alternative to be recalculated
	 *
	 *@return: The updated quote version.
	 */
	function RecalculateQuoteAlternative($quoteAlternative)
	{
		$result = $this->sendRequest("RecalculateQuoteAlternative", array("QuoteAlternative"=>$quoteAlternative));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all quote alternatives for a quote version
	 *
	 *@$quoteVersionId		QuoteVersionId of the revison to get alternatives for.
	 *
	 *@return: Array of Quote alternatives
	 */
	function GetQuoteAlternatives($quoteVersionId)
	{
		$result = $this->sendRequest("GetQuoteAlternatives", array("QuoteVersionId"=>$quoteVersionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Move quote line rank up/down
	 *
	 *@$quoteLineId		Id of quote line to move up/down
	 *@$direction		True is up, false is down
	 *
	 *@return: Void return
	 */
	function MoveQuoteLine($quoteLineId, $direction)
	{
		$result = $this->sendRequest("MoveQuoteLine", array("QuoteLineId"=>$quoteLineId, "Direction"=>$direction));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Create a new quote alternative on a version.
	 *
	 *@$quoteVersionId		QuoteVersionId of the version to create the alternative on.
	 *@$quoteAlternativeName		The name to set on the new alternative.
	 *@$quoteAlternativeDescription		The description to set on the new alternative.
	 *
	 *@return: The newly created QuoteAlternative.
	 */
	function CreateQuoteAlternative($quoteVersionId, $quoteAlternativeName, $quoteAlternativeDescription)
	{
		$result = $this->sendRequest("CreateQuoteAlternative", array("QuoteVersionId"=>$quoteVersionId, "QuoteAlternativeName"=>$quoteAlternativeName, "QuoteAlternativeDescription"=>$quoteAlternativeDescription));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Copy a quote alternative from the same sale and adds it to a version.
	 *
	 *@$quoteVersionId		QuoteVersionId of the version to copy the alternative to.
	 *@$quoteAlternativeId		QuoteAlternativeId of the alternative to make a copy of.
	 *@$quoteAlternativeName		The name to set on the new alternative.
	 *
	 *@return: The copied QuoteAlternative.
	 */
	function CopyQuoteAlternative($quoteVersionId, $quoteAlternativeId, $quoteAlternativeName)
	{
		$result = $this->sendRequest("CopyQuoteAlternative", array("QuoteVersionId"=>$quoteVersionId, "QuoteAlternativeId"=>$quoteAlternativeId, "QuoteAlternativeName"=>$quoteAlternativeName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Delete a quote alternative
	 *
	 *@$quoteAlternativeId		Id of the quote alternative to delete.
	 *
	 *@return: A void return
	 */
	function DeleteQuoteAlternative($quoteAlternativeId)
	{
		$result = $this->sendRequest("DeleteQuoteAlternative", array("QuoteAlternativeId"=>$quoteAlternativeId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Whether or not the system has any connections available for this user.
	 *
	 *
	 *@return: The response
	 */
	function HasConnections()
	{
		$result = $this->sendRequest("HasConnections", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all installed connections. Some installed connections may not be available to the user.
	 *
	 *
	 *@return: List of connections
	 */
	function GetAllInstalledQuoteConnections()
	{
		$result = $this->sendRequest("GetAllInstalledQuoteConnections", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all available connections. Some installed connections may not be available to the user. Use GetAllAvailableQuoteConnectionsWithPriceLists if you need the pricelists on the connections as well.
	 *
	 *
	 *@return: List of connections
	 */
	function GetAllAvailableQuoteConnections()
	{
		$result = $this->sendRequest("GetAllAvailableQuoteConnections", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all available connections. Some installed connections may not be available to the user. Includes pricelists for the connection. This is a heavy call
	 *
	 *
	 *@return: List of connections
	 */
	function GetAllAvailableQuoteConnectionsWithPriceLists()
	{
		$result = $this->sendRequest("GetAllAvailableQuoteConnectionsWithPriceLists", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a new connection.
	 *
	 *@$connectorName		The name of the connector to create this connection for.
	 *
	 *@return: The created connection
	 */
	function CreateConnectionFromConnectorName($connectorName)
	{
		$result = $this->sendRequest("CreateConnectionFromConnectorName", array("ConnectorName"=>$connectorName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the specified connection.
	 *
	 *@$quoteConnectionId		Primary key of the connection
	 *
	 *@return: The connection
	 */
	function GetConnection($quoteConnectionId)
	{
		$result = $this->sendRequest("GetConnection", array("QuoteConnectionId"=>$quoteConnectionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves a connection to the database.
	 *
	 *@$connection		The connection to save.
	 *
	 *@return: The resulting connection.
	 */
	function SaveConnection($connection)
	{
		$result = $this->sendRequest("SaveConnection", array("Connection"=>$connection));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Marks a connection as deleted.
	 *
	 *@$quoteConnectionId		Primary key of the connection to delete
	 *
	 *@return: A void return
	 */
	function DeleteConnection($quoteConnectionId)
	{
		$result = $this->sendRequest("DeleteConnection", array("QuoteConnectionId"=>$quoteConnectionId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Restores a connection marked as deleted.
	 *
	 *@$quoteConnectionId		Primary key of the connection to restore
	 *
	 *@return: A void return
	 */
	function RestoreConnection($quoteConnectionId)
	{
		$result = $this->sendRequest("RestoreConnection", array("QuoteConnectionId"=>$quoteConnectionId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns all connections available for the specified user.
	 *
	 *@$associateId		Primary key of the user
	 *
	 *@return: The connections
	 */
	function GetConnectionsForAssociate($associateId)
	{
		$result = $this->sendRequest("GetConnectionsForAssociate", array("AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the available active PriceLists in a specific currency. Will return empty array if there is no PriceList with the stated currency available.
	 *
	 *@$quoteConnectionId		Primary key of the connection
	 *@$currency		Iso currency like: USD or NOK. See http://www.currency-iso.org/dl_iso_table_a1.xls for details. Case insensitive. Will return empty array if there is no PriceList with the stated currency available.
	 *
	 *@return: The PriceLists that supports a specific currency
	 */
	function GetActivePriceLists($quoteConnectionId, $currency)
	{
		$result = $this->sendRequest("GetActivePriceLists", array("QuoteConnectionId"=>$quoteConnectionId, "Currency"=>$currency));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the available active PriceLists in a specific currency. Will return empty array if there is no PriceList with the stated currency available.
	 *
	 *@$quoteConnectionId		Primary key of the connection
	 *@$currencyId		SuperOffice currency id.
	 *
	 *@return: The PriceLists that supports a specific currency
	 */
	function GetActivePriceListsByCurrencyId($quoteConnectionId, $currencyId)
	{
		$result = $this->sendRequest("GetActivePriceListsByCurrencyId", array("QuoteConnectionId"=>$quoteConnectionId, "CurrencyId"=>$currencyId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the all PriceLists in all currencies, including those inactive. Will return empty array if there is no PriceList available.
	 *
	 *@$quoteConnectionId		Primary key of the connection
	 *@$currency		Iso currency like: USD or NOK. See http://www.currency-iso.org/dl_iso_table_a1.xls for details. Case insensitive. Will return empty array if there is no PriceList with the stated currency available.
	 *
	 *@return: The PriceLists that supports a specific currency
	 */
	function GetAllPriceLists($quoteConnectionId, $currency)
	{
		$result = $this->sendRequest("GetAllPriceLists", array("QuoteConnectionId"=>$quoteConnectionId, "Currency"=>$currency));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the all PriceLists in all currencies, including those inactive. Will return empty array if there is no PriceList available.
	 *
	 *@$quoteConnectionId		Primary key of the connection
	 *@$currencyId		SuperOffice currency id.
	 *
	 *@return: The PriceLists that supports a specific currency
	 */
	function GetAllPriceListsByCurrencyId($quoteConnectionId, $currencyId)
	{
		$result = $this->sendRequest("GetAllPriceListsByCurrencyId", array("QuoteConnectionId"=>$quoteConnectionId, "CurrencyId"=>$currencyId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets a list of all possible connector capabilities
	 *
	 *@$quoteConnectionId		Primary key of the connection
	 *
	 *@return: Capabilities names
	 */
	function GetConnectorCapabilityNames($quoteConnectionId)
	{
		$result = $this->sendRequest("GetConnectorCapabilityNames", array("QuoteConnectionId"=>$quoteConnectionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets a list of connector capabilities
	 *
	 *@$quoteConnectionId		Primary key of the connection
	 *
	 *@return: Capabilities
	 */
	function GetConnectorCapabilities($quoteConnectionId)
	{
		$result = $this->sendRequest("GetConnectorCapabilities", array("QuoteConnectionId"=>$quoteConnectionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Can the connector provide the capability
	 *
	 *@$quoteConnectionId		Primary key of the connection
	 *@$capabilityName		Capability name
	 *
	 *@return: Capability name
	 */
	function CanConnectorProvideCapability($quoteConnectionId, $capabilityName)
	{
		$result = $this->sendRequest("CanConnectorProvideCapability", array("QuoteConnectionId"=>$quoteConnectionId, "CapabilityName"=>$capabilityName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns an array of PluginResponseInfos for all failed connection initializations.
	 *
	 *
	 *@return: Array of PluginResponseInfos for each failed connection initialization.
	 */
	function GetConnectionStartupErrors()
	{
		$result = $this->sendRequest("GetConnectionStartupErrors", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the PluginResponseInfo for the connection initialization. Does not initialize the connection, just returns what happened when initialize was called.
	 *
	 *@$quoteConnectionId		Primary key of the connection
	 *
	 *@return: PluginResponseInfo for the connection initialization.
	 */
	function GetConnectionStartupResponse($quoteConnectionId)
	{
		$result = $this->sendRequest("GetConnectionStartupResponse", array("QuoteConnectionId"=>$quoteConnectionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the config fields for the connection.
	 *
	 *@$quoteConnectionId		Primary key of the connection
	 *
	 *@return: Config Fields
	 */
	function GetConnectionConfigFields($quoteConnectionId)
	{
		$result = $this->sendRequest("GetConnectionConfigFields", array("QuoteConnectionId"=>$quoteConnectionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves the connection config fields
	 *
	 *@$quoteConnectionId		Primary key of the connection
	 *@$connectionConfigFields		ConnectionConfigFields to save.
	 *
	 *@return: Config Fields
	 */
	function SaveConnectionConfigFields($quoteConnectionId, $connectionConfigFields)
	{
		$result = $this->sendRequest("SaveConnectionConfigFields", array("QuoteConnectionId"=>$quoteConnectionId, "ConnectionConfigFields"=>$connectionConfigFields));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a quoteline based on a product key.
	 *
	 *@$quoteAlternativeId		Primary key of the alternative
	 *@$eRPProductKey		Primary key of the product in the ProductProvider
	 *
	 *@return: The updated quote line.
	 */
	function CreateQuoteLine($quoteAlternativeId, $eRPProductKey)
	{
		$result = $this->sendRequest("CreateQuoteLine", array("QuoteAlternativeId"=>$quoteAlternativeId, "ERPProductKey"=>$eRPProductKey));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a quoteline based on a product.
	 *
	 *@$quoteAlternativeId		Primary key of the alternative
	 *@$product		Product carrier
	 *
	 *@return: The updated quote line.
	 */
	function CreateQuoteLineFromProduct($quoteAlternativeId, $product)
	{
		$result = $this->sendRequest("CreateQuoteLineFromProduct", array("QuoteAlternativeId"=>$quoteAlternativeId, "Product"=>$product));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves the QuoteLine in the SuperOffice database
	 *
	 *@$quoteLine		The QuoteLine to save.
	 *
	 *@return: The updated quote line (If the quoteline was new, it returns with id's set.
	 */
	function SaveQuoteLine($quoteLine)
	{
		$result = $this->sendRequest("SaveQuoteLine", array("QuoteLine"=>$quoteLine));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get QuoteLine from database
	 *
	 *@$quoteLineId		Primary key of the quoteline to get.
	 *
	 *@return: The updated quote line (If the quoteline was new, it returns with id's set.
	 */
	function GetQuoteLine($quoteLineId)
	{
		$result = $this->sendRequest("GetQuoteLine", array("QuoteLineId"=>$quoteLineId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all QuoteLines from an alternative
	 *
	 *@$quoteAlternativeId		Id of the alternative to return the quotelines for
	 *
	 *@return: QuoteLine array
	 */
	function GetQuoteLines($quoteAlternativeId)
	{
		$result = $this->sendRequest("GetQuoteLines", array("QuoteAlternativeId"=>$quoteAlternativeId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes the QuoteLine in the SuperOffice database
	 *
	 *@$quoteLineId		Primary key of the quoteline to delete
	 *
	 *@return: Nothing
	 */
	function DeleteQuoteLine($quoteLineId)
	{
		$result = $this->sendRequest("DeleteQuoteLine", array("QuoteLineId"=>$quoteLineId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * When the user changes one or more values in a quoteline, the connector gets to change the QuoteLine, for instance calculate VAT. Shall be called when the user changes any of the following fields: Quantity, DiscountAmount, DiscountPercent, ListPrice (if allowed). Will calculate the TotalPrice and the VAT (if possible) for the line.
	 *
	 *@$quoteLine		The QuoteLine to recalculate
	 *@$changedFields		The id of the changed fields in the form 'TableName.FieldName'
	 *
	 *@return: The updated quote line.
	 */
	function RecalculateQuoteLine($quoteLine, $changedFields)
	{
		$result = $this->sendRequest("RecalculateQuoteLine", array("QuoteLine"=>$quoteLine, "ChangedFields"=>$changedFields));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets an image connected to a quoteline, either from the ERPProvider or from the SuperOffice database
	 *
	 *@$quoteLineId		Primary key of the quoteline
	 *@$rank		The rank of the image.
	 *
	 *@return: The image. Returns null if no image available. (Returned as a serializable type: byte[]
	 */
	function GetQuoteLineImage($quoteLineId, $rank)
	{
		$result = $this->sendRequest("GetQuoteLineImage", array("QuoteLineId"=>$quoteLineId, "Rank"=>$rank));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves the image connected to a quoteline in the SuperOffice database
	 *
	 *@$quoteLineId		Primary key of the quoteline
	 *@$image		The image. (Using a serializable type: byte[]
	 *@$rank		The rank of the image.
	 *
	 *@return: Nothing
	 */
	function SaveQuoteLineImage($quoteLineId, $image, $rank)
	{
		$result = $this->sendRequest("SaveQuoteLineImage", array("QuoteLineId"=>$quoteLineId, "Image"=>$image, "Rank"=>$rank));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Converts an xml string into an object representation.
	 *
	 *@$quoteLineExtraData		The extra data as xml.
	 *
	 *@return: An object representation on the xml
	 */
	function GetExtraInfo($quoteLineExtraData)
	{
		$result = $this->sendRequest("GetExtraInfo", array("QuoteLineExtraData"=>$quoteLineExtraData));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the configuration field with the given id
	 *
	 *@$quoteLineConfigurationId		Id of the QuoteLineConfiguration to get.
	 *
	 *@return: QuoteLineConfiguration
	 */
	function GetQuoteLineConfiguration($quoteLineConfigurationId)
	{
		$result = $this->sendRequest("GetQuoteLineConfiguration", array("QuoteLineConfigurationId"=>$quoteLineConfigurationId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the configuration field with the given field name
	 *
	 *@$fieldName		Field name of the QuoteLineConfiguration to get.
	 *
	 *@return: QuoteLineConfiguration
	 */
	function GetQuoteLineConfigurationFromFieldName($fieldName)
	{
		$result = $this->sendRequest("GetQuoteLineConfigurationFromFieldName", array("FieldName"=>$fieldName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all the configuration fields
	 *
	 *
	 *@return: Array of QuoteLineConfigurations
	 */
	function GetAllQuoteLineConfigurations()
	{
		$result = $this->sendRequest("GetAllQuoteLineConfigurations", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the configuration fields that should be visible in the GUI.
	 *
	 *
	 *@return: Array of QuoteLineConfigurations
	 */
	function GetInUseQuoteLineConfigurations()
	{
		$result = $this->sendRequest("GetInUseQuoteLineConfigurations", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save a QuoteLineConfiguration object. It is not possible to add a new configuration.
	 *
	 *@$quoteLineConfiguration		The QuoteLineConfiguration to save.
	 *
	 *@return: The saved QuoteLineConfiguration.
	 */
	function SaveQuoteLineConfiguration($quoteLineConfiguration)
	{
		$result = $this->sendRequest("SaveQuoteLineConfiguration", array("QuoteLineConfiguration"=>$quoteLineConfiguration));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save a collection of QuoteLineConfigurations. It is not possible to add a new configurations.
	 *
	 *@$quoteLineConfigurations		The QuoteLineConfigurations to save.
	 *
	 *@return: The saved QuoteLineConfigurations.
	 */
	function SaveQuoteLineConfigurations($quoteLineConfigurations)
	{
		$result = $this->sendRequest("SaveQuoteLineConfigurations", array("QuoteLineConfigurations"=>$quoteLineConfigurations));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets a named list from the connector Return array of QuoteListItems. Return NULL if the given list is not supported.
	 *
	 *@$quoteListType		The name of the requested list, for instance: ProductCategory, ProductFamily, ProductType, PaymentTerms, PaymentType, DeliveryTerms, DeliveryType.
	 *
	 *@return: The list items
	 */
	function GetQuoteList($quoteListType)
	{
		$result = $this->sendRequest("GetQuoteList", array("QuoteListType"=>$quoteListType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * When the user changes one or more values in a quoteline or a quoteAlternative, the connector gets to change the QuoteLines and the alternative, for instance calculate VAT. ValidateQuoteVersion shall be called when the user presses the validate button, presses the send button or closes the quote dialog. RecalculateQuoteAlternative should typically validate all alternatives, set values in extrafields, and set the state in the version.
	 *
	 *@$quoteVersionId		The version to be validated
	 *@$action		The action, if any, related to the validate call, like PlaceOrder or SendQuote
	 *
	 *@return: The updated quote version.
	 */
	function ValidateQuoteVersion($quoteVersionId, $action)
	{
		$result = $this->sendRequest("ValidateQuoteVersion", array("QuoteVersionId"=>$quoteVersionId, "Action"=>$action));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Created a new QuoteVersion based on another QuoteVersion on the same Quote.
	 *
	 *@$quoteVersionId		QuoteVersionId of the version to copy the contents from.
	 *
	 *@return: The Quote version
	 */
	function CreateAndSaveQuoteVersion($quoteVersionId)
	{
		$result = $this->sendRequest("CreateAndSaveQuoteVersion", array("QuoteVersionId"=>$quoteVersionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a QuoteVersion
	 *
	 *@$quoteVersionId		QuoteVersionId to get information from
	 *
	 *@return: Array of Quote versions
	 */
	function GetQuoteVersion($quoteVersionId)
	{
		$result = $this->sendRequest("GetQuoteVersion", array("QuoteVersionId"=>$quoteVersionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all quote versions for a sale
	 *
	 *@$quoteId		QuoteId of the quote to get versions from
	 *
	 *@return: Array of Quote versions
	 */
	function GetQuoteVersions($quoteId)
	{
		$result = $this->sendRequest("GetQuoteVersions", array("QuoteId"=>$quoteId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Send the quote to the user's customer. More parameters to be added later...
	 *
	 *@$quoteVersionId		QuoteVersionId of the quoteversion to send
	 *@$expiryDate		Date the quote expires
	 *@$followupDate		Date for the followup task, to remind the sales rep about the quote
	 *@$followupText		The body text for the follwup appointment, resolved to the correct culture (no resources please)
	 *@$culture		Desired culture for email body and other culture-sensitive templates/content
	 *
	 *@return: Response of the operation
	 */
	function SendQuoteVersion($quoteVersionId, $expiryDate, $followupDate, $followupText, $culture)
	{
		$result = $this->sendRequest("SendQuoteVersion", array("QuoteVersionId"=>$quoteVersionId, "ExpiryDate"=>$expiryDate, "FollowupDate"=>$followupDate, "FollowupText"=>$followupText, "Culture"=>$culture));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves a quote version
	 *
	 *@$quoteVersion		The quote version to save
	 *
	 *@return: The saved quote version
	 */
	function SaveQuoteVersion($quoteVersion)
	{
		$result = $this->sendRequest("SaveQuoteVersion", array("QuoteVersion"=>$quoteVersion));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Approves a quote version
	 *
	 *@$quoteVersionId		QuoteVersionId to approve.
	 *@$approvedByText		'Approved by' prefix to ApprovalText used when creating appointment task to log approval. Must be passed since service does not know which language to use for 'Approved By' string.
	 *@$approvedByAssociateId		AssociateId of the associate who approved the quote version.
	 *@$approvalText		Approval text.
	 *
	 *@return: Response of the the operation
	 */
	function ApproveQuoteVersion($quoteVersionId, $approvedByText, $approvedByAssociateId, $approvalText)
	{
		$result = $this->sendRequest("ApproveQuoteVersion", array("QuoteVersionId"=>$quoteVersionId, "ApprovedByText"=>$approvedByText, "ApprovedByAssociateId"=>$approvedByAssociateId, "ApprovalText"=>$approvalText));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Rejects a quote version
	 *
	 *@$quoteVersionId		QuoteVersionId to approve.
	 *@$rejectedByText		'Rejected by' prefix to RejectionText used when creating appointment task to log rejection. Must be passed since service does not know which language to use for 'Rejected By' string.
	 *@$rejectedByAssociateId		AssociateId of the associate who rejected the quote version.
	 *@$rejectionText		Rejection text.
	 *
	 *@return: Response of the the operation
	 */
	function RejectQuoteVersion($quoteVersionId, $rejectedByText, $rejectedByAssociateId, $rejectionText)
	{
		$result = $this->sendRequest("RejectQuoteVersion", array("QuoteVersionId"=>$quoteVersionId, "RejectedByText"=>$rejectedByText, "RejectedByAssociateId"=>$rejectedByAssociateId, "RejectionText"=>$rejectionText));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Generate all the documents required to send the Quote as an email to the prospect - or an Order Confirmation; it just depends on the template id's for the lines doc and mail body. Quote version status is not changed by this method.
	 *
	 *@$quoteVersionId		VersionId of the quote to be sent; the status of the version will not be changed by calling this method
	 *@$emailBodyTemplateId		Id of the template for the email body, must be nonzero and refer to either a Quote mail body or Order Confirmation mail body, with html content
	 *@$attachMainDocument		Should the main quote document be attached to the email; generally false for Order Confirmations
	 *@$quotedProductsTemplateId		Id of the template for the quote- or order confirmation-lines; zero if no document should be produced
	 *@$includeAttachments		If true, then the currently specified (in the database) attachments will be included
	 *@$rawMailSubject		Subject line for email, in the correct language, sent in here to have any template variables substituted
	 *
	 *@return: Carrier specifying the document id's of all the documents, as well as other results
	 */
	function GenerateQuoteDocuments($quoteVersionId, $emailBodyTemplateId, $attachMainDocument, $quotedProductsTemplateId, $includeAttachments, $rawMailSubject)
	{
		$result = $this->sendRequest("GenerateQuoteDocuments", array("QuoteVersionId"=>$quoteVersionId, "EmailBodyTemplateId"=>$emailBodyTemplateId, "AttachMainDocument"=>$attachMainDocument, "QuotedProductsTemplateId"=>$quotedProductsTemplateId, "IncludeAttachments"=>$includeAttachments, "RawMailSubject"=>$rawMailSubject));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a base64-encoded data stream that is just the order confirmation document, for the given quote version; no permanent document is created or stored anywhere; the result is a PDF
	 *
	 *@$quoteVersionId		VersionId of the quote to be sent; the status of the version will not be changed by calling this method
	 *@$confirmationTemplateId		Id of the template for the order confirmation lines document
	 *
	 *@return: Base64-encoded binary data, that is in fact a PDF document that should be shown to the user
	 */
	function GetOrderConfirmation($quoteVersionId, $confirmationTemplateId)
	{
		$result = $this->sendRequest("GetOrderConfirmation", array("QuoteVersionId"=>$quoteVersionId, "ConfirmationTemplateId"=>$confirmationTemplateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all button states for the Quote version dialog. Packages ImageState, Button states and status info into one call. Collects most important warnings/errors from across all quotelines/alternatives in this quote version.
	 *
	 *@$quoteVersionId		Id of the quote version to get the button states for.
	 *@$quoteAlternativeId		Id of the active quote alternative id.
	 *
	 *@return: Workflow state information
	 */
	function GetQuoteVersionWorkflowState($quoteVersionId, $quoteAlternativeId)
	{
		$result = $this->sendRequest("GetQuoteVersionWorkflowState", array("QuoteVersionId"=>$quoteVersionId, "QuoteAlternativeId"=>$quoteAlternativeId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Update price on the all the quotelines for each alternative in the current quote version
	 *
	 *@$quoteVersionId		The version to be update prices for
	 *
	 *@return: The updated quote version.
	 */
	function UpdateQuoteVersionPrices($quoteVersionId)
	{
		$result = $this->sendRequest("UpdateQuoteVersionPrices", array("QuoteVersionId"=>$quoteVersionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save the quote version number if it is valid
	 *
	 *@$quoteVersionId		VersionId of the quote version
	 *@$number		The number to save
	 *
	 *@return: True if the number was valid and then saved
	 */
	function SaveQuoteVersionNumber($quoteVersionId, $number)
	{
		$result = $this->sendRequest("SaveQuoteVersionNumber", array("QuoteVersionId"=>$quoteVersionId, "Number"=>$number));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get state icon and name for the Quote version dialog header.
	 *
	 *@$quoteVersionId		Id of the quote version to get the version state for.
	 *
	 *@return: Image and state name information
	 */
	function GetQuoteVersionWorkflowImageState($quoteVersionId)
	{
		$result = $this->sendRequest("GetQuoteVersionWorkflowImageState", array("QuoteVersionId"=>$quoteVersionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all button states for the Quote version dialog.
	 *
	 *@$quoteVersionId		Id of the quote version to get the button states for.
	 *@$quoteAlternativeId		Id of the active quote alternative id.
	 *
	 *@return: Workflow state information
	 */
	function GetQuoteVersionWorkflowButtonStates($quoteVersionId, $quoteAlternativeId)
	{
		$result = $this->sendRequest("GetQuoteVersionWorkflowButtonStates", array("QuoteVersionId"=>$quoteVersionId, "QuoteAlternativeId"=>$quoteAlternativeId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get status info for the Quote version dialog header. Collects most important warnings/errors from across all quotelines/alternatives in this quote version.
	 *
	 *@$quoteVersionId		Id of the quote version to get the status info for.
	 *
	 *@return: Most important status text + icon information.
	 */
	function GetQuoteVersionWorkflowStatusInfo($quoteVersionId)
	{
		$result = $this->sendRequest("GetQuoteVersionWorkflowStatusInfo", array("QuoteVersionId"=>$quoteVersionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Look at the Quote version, related sale and sale type, and ensure that the correct QuoteVersionAttachment records exist. This method may create or delete records
	 *
	 *@$quoteVersionId		The ID of the quote version
	 *
	 *@return: The current attachments for the given Quote version, after all updates have been completed
	 */
	function CreateOrUpdateQuoteVersionAttachments($quoteVersionId)
	{
		$result = $this->sendRequest("CreateOrUpdateQuoteVersionAttachments", array("QuoteVersionId"=>$quoteVersionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Toggle the 'included' state of a quote version attachment; will throw exceptions if called on locked versions
	 *
	 *@$quoteVersionId		The ID of the Quote version
	 *@$documentId		The ID of the document
	 *@$include		Desired state
	 *
	 *@return: The new state
	 */
	function IncludeQuoteVersionAttachment($quoteVersionId, $documentId, $include)
	{
		$result = $this->sendRequest("IncludeQuoteVersionAttachment", array("QuoteVersionId"=>$quoteVersionId, "DocumentId"=>$documentId, "Include"=>$include));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Toggle the 'default included' state of a sale type quote attachment
	 *
	 *@$saleTypeQuoteAttachmentId		The ID of the sale type quote attachment row
	 *
	 *@return: The new state
	 */
	function ToggleSaleTypeQuoteAttachmentDefaultIncluded($saleTypeQuoteAttachmentId)
	{
		$result = $this->sendRequest("ToggleSaleTypeQuoteAttachmentDefaultIncluded", array("SaleTypeQuoteAttachmentId"=>$saleTypeQuoteAttachmentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Adds a new quote attachment document to a sale type
	 *
	 *@$saleTypeId		The ID of the sale type
	 *@$documentId		The ID of the document
	 *
	 *@return: ID of the new sale type quote attachment row
	 */
	function AddSaleTypeQuoteAttachment($saleTypeId, $documentId)
	{
		$result = $this->sendRequest("AddSaleTypeQuoteAttachment", array("SaleTypeId"=>$saleTypeId, "DocumentId"=>$documentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes the sale type quote attachment with the given id
	 *
	 *@$saleTypeQuoteAttachmentId		The ID of the sale type quote attachment row to delete
	 *
	 *@return: 
	 */
	function DeleteSaleTypeQuoteAttachment($saleTypeQuoteAttachmentId)
	{
		$result = $this->sendRequest("DeleteSaleTypeQuoteAttachment", array("SaleTypeQuoteAttachmentId"=>$saleTypeQuoteAttachmentId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Toggle the 'included' state of a quote version attachment
	 *
	 *@$quoteVersionAttachmentId		The ID of the quote version attachment row
	 *
	 *@return: The new state
	 */
	function ToggleQuoteVersionAttachmentIncluded($quoteVersionAttachmentId)
	{
		$result = $this->sendRequest("ToggleQuoteVersionAttachmentIncluded", array("QuoteVersionAttachmentId"=>$quoteVersionAttachmentId));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

