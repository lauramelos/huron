<?php

/**
 * BaseProposal
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $client_id
 * @property timestamp $date
 * @property clob $description
 * @property integer $number
 * @property string $comments
 * @property string $currency
 * @property string $delivery
 * @property string $bid_validity
 * @property string $payment_term
 * @property Client $Client
 * @property Doctrine_Collection $Items
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method integer             getClientId()     Returns the current record's "client_id" value
 * @method timestamp           getDate()         Returns the current record's "date" value
 * @method clob                getDescription()  Returns the current record's "description" value
 * @method integer             getNumber()       Returns the current record's "number" value
 * @method string              getComments()     Returns the current record's "comments" value
 * @method string              getCurrency()     Returns the current record's "currency" value
 * @method string              getDelivery()     Returns the current record's "delivery" value
 * @method string              getBidValidity()  Returns the current record's "bid_validity" value
 * @method string              getPaymentTerm()  Returns the current record's "payment_term" value
 * @method Client              getClient()       Returns the current record's "Client" value
 * @method Doctrine_Collection getItems()        Returns the current record's "Items" collection
 * @method Proposal            setId()           Sets the current record's "id" value
 * @method Proposal            setClientId()     Sets the current record's "client_id" value
 * @method Proposal            setDate()         Sets the current record's "date" value
 * @method Proposal            setDescription()  Sets the current record's "description" value
 * @method Proposal            setNumber()       Sets the current record's "number" value
 * @method Proposal            setComments()     Sets the current record's "comments" value
 * @method Proposal            setCurrency()     Sets the current record's "currency" value
 * @method Proposal            setDelivery()     Sets the current record's "delivery" value
 * @method Proposal            setBidValidity()  Sets the current record's "bid_validity" value
 * @method Proposal            setPaymentTerm()  Sets the current record's "payment_term" value
 * @method Proposal            setClient()       Sets the current record's "Client" value
 * @method Proposal            setItems()        Sets the current record's "Items" collection
 * 
 * @package    limbo
 * @subpackage model
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProposal extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('proposal');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('client_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('description', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('number', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('comments', 'string', 1000, array(
             'type' => 'string',
             'length' => 1000,
             ));
        $this->hasColumn('currency', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('delivery', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('bid_validity', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('payment_term', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));


        $this->setAttribute(Doctrine_Core::ATTR_EXPORT, Doctrine_Core::EXPORT_ALL);

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Client', array(
             'local' => 'client_id',
             'foreign' => 'id'));

        $this->hasMany('Item as Items', array(
             'local' => 'id',
             'foreign' => 'proposal_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}