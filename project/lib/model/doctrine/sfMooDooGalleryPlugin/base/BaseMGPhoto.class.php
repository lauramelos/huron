<?php

/**
 * BaseMGPhoto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $author_id
 * @property string $title
 * @property clob $description
 * @property string $photo
 * @property Doctrine_Collection $Galleries
 * @property sfGuardUser $Author
 * @property Doctrine_Collection $MGGalleryPhoto
 * 
 * @method integer             getId()             Returns the current record's "id" value
 * @method integer             getAuthorId()       Returns the current record's "author_id" value
 * @method string              getTitle()          Returns the current record's "title" value
 * @method clob                getDescription()    Returns the current record's "description" value
 * @method string              getPhoto()          Returns the current record's "photo" value
 * @method Doctrine_Collection getGalleries()      Returns the current record's "Galleries" collection
 * @method sfGuardUser         getAuthor()         Returns the current record's "Author" value
 * @method Doctrine_Collection getMGGalleryPhoto() Returns the current record's "MGGalleryPhoto" collection
 * @method MGPhoto             setId()             Sets the current record's "id" value
 * @method MGPhoto             setAuthorId()       Sets the current record's "author_id" value
 * @method MGPhoto             setTitle()          Sets the current record's "title" value
 * @method MGPhoto             setDescription()    Sets the current record's "description" value
 * @method MGPhoto             setPhoto()          Sets the current record's "photo" value
 * @method MGPhoto             setGalleries()      Sets the current record's "Galleries" collection
 * @method MGPhoto             setAuthor()         Sets the current record's "Author" value
 * @method MGPhoto             setMGGalleryPhoto() Sets the current record's "MGGalleryPhoto" collection
 * 
 * @package    limbo
 * @subpackage model
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMGPhoto extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mdgalledy_photo');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('author_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('description', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('photo', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('MGGallery as Galleries', array(
             'refClass' => 'MGGalleryPhoto',
             'local' => 'photo_id',
             'foreign' => 'gallery_id'));

        $this->hasOne('sfGuardUser as Author', array(
             'local' => 'author_id',
             'foreign' => 'id'));

        $this->hasMany('MGGalleryPhoto', array(
             'local' => 'id',
             'foreign' => 'photo_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}