<?php

/**
 * BaseProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $sf_guard_user_id
 * @property integer $membership_number
 * @property string $first_name
 * @property string $last_name
 * @property date $birth_date
 * @property enum $documment_type
 * @property string $documment_number
 * @property string $phone
 * @property string $movil
 * @property string $email
 * @property string $address
 * @property string $address_2
 * @property integer $locality_id
 * @property sfGuardUser $sfGuardUser
 * @property Doctrine_Collection $Client
 * 
 * @method integer             getId()                Returns the current record's "id" value
 * @method integer             getSfGuardUserId()     Returns the current record's "sf_guard_user_id" value
 * @method integer             getMembershipNumber()  Returns the current record's "membership_number" value
 * @method string              getFirstName()         Returns the current record's "first_name" value
 * @method string              getLastName()          Returns the current record's "last_name" value
 * @method date                getBirthDate()         Returns the current record's "birth_date" value
 * @method enum                getDocummentType()     Returns the current record's "documment_type" value
 * @method string              getDocummentNumber()   Returns the current record's "documment_number" value
 * @method string              getPhone()             Returns the current record's "phone" value
 * @method string              getMovil()             Returns the current record's "movil" value
 * @method string              getEmail()             Returns the current record's "email" value
 * @method string              getAddress()           Returns the current record's "address" value
 * @method string              getAddress2()          Returns the current record's "address_2" value
 * @method integer             getLocalityId()        Returns the current record's "locality_id" value
 * @method sfGuardUser         getSfGuardUser()       Returns the current record's "sfGuardUser" value
 * @method Doctrine_Collection getClient()            Returns the current record's "Client" collection
 * @method Profile             setId()                Sets the current record's "id" value
 * @method Profile             setSfGuardUserId()     Sets the current record's "sf_guard_user_id" value
 * @method Profile             setMembershipNumber()  Sets the current record's "membership_number" value
 * @method Profile             setFirstName()         Sets the current record's "first_name" value
 * @method Profile             setLastName()          Sets the current record's "last_name" value
 * @method Profile             setBirthDate()         Sets the current record's "birth_date" value
 * @method Profile             setDocummentType()     Sets the current record's "documment_type" value
 * @method Profile             setDocummentNumber()   Sets the current record's "documment_number" value
 * @method Profile             setPhone()             Sets the current record's "phone" value
 * @method Profile             setMovil()             Sets the current record's "movil" value
 * @method Profile             setEmail()             Sets the current record's "email" value
 * @method Profile             setAddress()           Sets the current record's "address" value
 * @method Profile             setAddress2()          Sets the current record's "address_2" value
 * @method Profile             setLocalityId()        Sets the current record's "locality_id" value
 * @method Profile             setSfGuardUser()       Sets the current record's "sfGuardUser" value
 * @method Profile             setClient()            Sets the current record's "Client" collection
 * 
 * @package    limbo
 * @subpackage model
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profile');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('sf_guard_user_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('membership_number', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('first_name', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('last_name', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('birth_date', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('documment_type', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'dni',
              1 => 'le',
             ),
             'default' => 'dni',
             ));
        $this->hasColumn('documment_number', 'string', 15, array(
             'type' => 'string',
             'length' => 15,
             ));
        $this->hasColumn('phone', 'string', 40, array(
             'type' => 'string',
             'length' => 40,
             ));
        $this->hasColumn('movil', 'string', 40, array(
             'type' => 'string',
             'length' => 40,
             ));
        $this->hasColumn('email', 'string', 60, array(
             'type' => 'string',
             'length' => 60,
             ));
        $this->hasColumn('address', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('address_2', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('locality_id', 'integer', null, array(
             'type' => 'integer',
             ));


        $this->setAttribute(Doctrine_Core::ATTR_EXPORT, Doctrine_Core::EXPORT_ALL);

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Client', array(
             'refClass' => 'ClientContact',
             'local' => 'client_id',
             'foreign' => 'profile_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}