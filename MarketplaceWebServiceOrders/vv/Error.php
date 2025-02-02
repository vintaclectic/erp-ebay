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
 *    __  _    _  ___ 
 *   (  )( \/\/ )/ __)
 *   /__\ \    / \__ \
 *  (_)(_) \/\/  (___/
 * 
 *  Marketplace Web Service Orders PHP5 Library
 *  Generated: Tue Oct 04 21:06:59 GMT 2011
 * 
 */

/**
 *  @see MarketplaceWebServiceOrders_Model
 */
require_once ('Model.php');  

    

/**
 * MarketplaceWebServiceOrders_Model_Error
 * 
 * Properties:
 * <ul>
 * 
 * <li>Type: string</li>
 * <li>Code: string</li>
 * <li>Message: string</li>
 * <li>Detail: MarketplaceWebServiceOrders_Model_Object</li>
 *
 * </ul>
 */ 
class MarketplaceWebServiceOrders_Model_Error extends MarketplaceWebServiceOrders_Model
{


    /**
     * Construct new MarketplaceWebServiceOrders_Model_Error
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>Type: string</li>
     * <li>Code: string</li>
     * <li>Message: string</li>
     * <li>Detail: MarketplaceWebServiceOrders_Model_Object</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'Type' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Code' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Message' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Detail' => array('FieldValue' => null, 'FieldType' => 'MarketplaceWebServiceOrders_Model_Object'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the Type property.
     * 
     * @return string Type
     */
    public function getType() 
    {
        return $this->_fields['Type']['FieldValue'];
    }

    /**
     * Sets the value of the Type property.
     * 
     * @param string Type
     * @return this instance
     */
    public function setType($value) 
    {
        $this->_fields['Type']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Type and returns this instance
     * 
     * @param string $value Type
     * @return MarketplaceWebServiceOrders_Model_Error instance
     */
    public function withType($value)
    {
        $this->setType($value);
        return $this;
    }


    /**
     * Checks if Type is set
     * 
     * @return bool true if Type  is set
     */
    public function isSetType()
    {
        return !is_null($this->_fields['Type']['FieldValue']);
    }

    /**
     * Gets the value of the Code property.
     * 
     * @return string Code
     */
    public function getCode() 
    {
        return $this->_fields['Code']['FieldValue'];
    }

    /**
     * Sets the value of the Code property.
     * 
     * @param string Code
     * @return this instance
     */
    public function setCode($value) 
    {
        $this->_fields['Code']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Code and returns this instance
     * 
     * @param string $value Code
     * @return MarketplaceWebServiceOrders_Model_Error instance
     */
    public function withCode($value)
    {
        $this->setCode($value);
        return $this;
    }


    /**
     * Checks if Code is set
     * 
     * @return bool true if Code  is set
     */
    public function isSetCode()
    {
        return !is_null($this->_fields['Code']['FieldValue']);
    }

    /**
     * Gets the value of the Message property.
     * 
     * @return string Message
     */
    public function getMessage() 
    {
        return $this->_fields['Message']['FieldValue'];
    }

    /**
     * Sets the value of the Message property.
     * 
     * @param string Message
     * @return this instance
     */
    public function setMessage($value) 
    {
        $this->_fields['Message']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Message and returns this instance
     * 
     * @param string $value Message
     * @return MarketplaceWebServiceOrders_Model_Error instance
     */
    public function withMessage($value)
    {
        $this->setMessage($value);
        return $this;
    }


    /**
     * Checks if Message is set
     * 
     * @return bool true if Message  is set
     */
    public function isSetMessage()
    {
        return !is_null($this->_fields['Message']['FieldValue']);
    }

    /**
     * Gets the value of the Detail.
     * 
     * @return Error.Detail Detail
     */
    public function getDetail() 
    {
        return $this->_fields['Detail']['FieldValue'];
    }

    /**
     * Sets the value of the Detail.
     * 
     * @param Error.Detail Detail
     * @return void
     */
    public function setDetail($value) 
    {
        $this->_fields['Detail']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the Detail  and returns this instance
     * 
     * @param Object $value Detail
     * @return MarketplaceWebServiceOrders_Model_Error instance
     */
    public function withDetail($value)
    {
        $this->setDetail($value);
        return $this;
    }


    /**
     * Checks if Detail  is set
     * 
     * @return bool true if Detail property is set
     */
    public function isSetDetail()
    {
        return !is_null($this->_fields['Detail']['FieldValue']);

    }




}