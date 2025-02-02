<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     MarketplaceWebServiceOrders
 *  @copyright   Copyright 2008-2009 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2011-01-01
 */
/******************************************************************************* 
 * 
 *  Marketplace Web Service Orders PHP5 Library
 *  Generated: Fri Nov 04 00:48:53 GMT 2011
 * 
 */

/**
 *  @see MarketplaceWebServiceOrders_Model
 */
require_once ('Model.php');  

    

/**
 * MarketplaceWebServiceOrders_Model_GetOrderResponse
 * 
 * Properties:
 * <ul>
 * 
 * <li>GetOrderResult: MarketplaceWebServiceOrders_Model_GetOrderResult</li>
 * <li>ResponseMetadata: MarketplaceWebServiceOrders_Model_ResponseMetadata</li>
 *
 * </ul>
 */ 
class MarketplaceWebServiceOrders_Model_GetOrderResponse extends MarketplaceWebServiceOrders_Model
{


    /**
     * Construct new MarketplaceWebServiceOrders_Model_GetOrderResponse
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>GetOrderResult: MarketplaceWebServiceOrders_Model_GetOrderResult</li>
     * <li>ResponseMetadata: MarketplaceWebServiceOrders_Model_ResponseMetadata</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (

        'GetOrderResult' => array('FieldValue' => null, 'FieldType' => 'MarketplaceWebServiceOrders_Model_GetOrderResult'),


        'ResponseMetadata' => array('FieldValue' => null, 'FieldType' => 'MarketplaceWebServiceOrders_Model_ResponseMetadata'),

        );
        parent::__construct($data);
    }

       
    /**
     * Construct MarketplaceWebServiceOrders_Model_GetOrderResponse from XML string
     * 
     * @param string $xml XML string to construct from
     * @return MarketplaceWebServiceOrders_Model_GetOrderResponse 
     */
    public static function fromXML($xml)
    {
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $xpath = new DOMXPath($dom);
        $xpath->registerNamespace('a', 'https://mws.amazonservices.com/Orders/2011-01-01');
        $response = $xpath->query('//a:GetOrderResponse');
        if ($response->length == 1) {
            return new MarketplaceWebServiceOrders_Model_GetOrderResponse(($response->item(0))); 
        } else {
            throw new Exception ("Unable to construct MarketplaceWebServiceOrders_Model_GetOrderResponse from provided XML. 
                                  Make sure that GetOrderResponse is a root element");
        }
          
    }
    
    /**
     * Gets the value of the GetOrderResult.
     * 
     * @return GetOrderResult GetOrderResult
     */
    public function getGetOrderResult() 
    {
        return $this->_fields['GetOrderResult']['FieldValue'];
    }

    /**
     * Sets the value of the GetOrderResult.
     * 
     * @param GetOrderResult GetOrderResult
     * @return void
     */
    public function setGetOrderResult($value) 
    {
        $this->_fields['GetOrderResult']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the GetOrderResult  and returns this instance
     * 
     * @param GetOrderResult $value GetOrderResult
     * @return MarketplaceWebServiceOrders_Model_GetOrderResponse instance
     */
    public function withGetOrderResult($value)
    {
        $this->setGetOrderResult($value);
        return $this;
    }


    /**
     * Checks if GetOrderResult  is set
     * 
     * @return bool true if GetOrderResult property is set
     */
    public function isSetGetOrderResult()
    {
        return !is_null($this->_fields['GetOrderResult']['FieldValue']);

    }

    /**
     * Gets the value of the ResponseMetadata.
     * 
     * @return ResponseMetadata ResponseMetadata
     */
    public function getResponseMetadata() 
    {
        return $this->_fields['ResponseMetadata']['FieldValue'];
    }

    /**
     * Sets the value of the ResponseMetadata.
     * 
     * @param ResponseMetadata ResponseMetadata
     * @return void
     */
    public function setResponseMetadata($value) 
    {
        $this->_fields['ResponseMetadata']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the ResponseMetadata  and returns this instance
     * 
     * @param ResponseMetadata $value ResponseMetadata
     * @return MarketplaceWebServiceOrders_Model_GetOrderResponse instance
     */
    public function withResponseMetadata($value)
    {
        $this->setResponseMetadata($value);
        return $this;
    }


    /**
     * Checks if ResponseMetadata  is set
     * 
     * @return bool true if ResponseMetadata property is set
     */
    public function isSetResponseMetadata()
    {
        return !is_null($this->_fields['ResponseMetadata']['FieldValue']);

    }



    /**
     * XML Representation for this object
     * 
     * @return string XML for this object
     */
    public function toXML() 
    {
        $xml = "";
        $xml .= "<GetOrderResponse xmlns=\"https://mws.amazonservices.com/Orders/2011-01-01\">";
        $xml .= $this->_toXMLFragment();
        $xml .= "</GetOrderResponse>";
        return $xml;
    }

}