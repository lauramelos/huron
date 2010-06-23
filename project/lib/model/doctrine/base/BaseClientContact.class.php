<?php

/**
 * BaseClientContact
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $profile_id
 * @property integer $client_id
 * @property string $position
 * 
 * @method integer       getProfileId()  Returns the current record's "profile_id" value
 * @method integer       getClientId()   Returns the current record's "client_id" value
 * @method string        getPosition()   Returns the current record's "position" value
 * @method ClientContact setProfileId()  Sets the current record's "profile_id" value
 * @method ClientContact setClientId()   Sets the current record's "client_id" value
 * @method ClientContact setPosition()   Sets the current record's "position" value
 * 
 * @package    limbo
 * @subpackage model
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClientContact extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('client_contact');
        $this->hasColumn('profile_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'unique' => true,
             ));
        $this->hasColumn('client_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('position', 'string', 40, array(
             'type' => 'string',
             'length' => 40,
             ));


        $this->setAttribute(Doctrine_Core::ATTR_EXPORT, Doctrine_Core::EXPORT_ALL);

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}