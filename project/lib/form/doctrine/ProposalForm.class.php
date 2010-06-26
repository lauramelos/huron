<?php

/**
 * Proposal form.
 *
 * @package    limbo
 * @subpackage form
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProposalForm extends BaseProposalForm
{
  protected $scheduledForDeletion = array();

  public function configure()
  {

    unset($this['created_at'], $this['updated_at']);
    $range  = range(date('Y'), date('Y')-100);
    $years = array_combine($range,$range);
    $this->widgetSchema['date'] = new sfWidgetFormDateLive();

    $newItem = new ItemForm();
    $newItem->setDefault('proposal_id', $this->object->id);
    $this->embedForm('new', $newItem);

    $this->embedRelation('Items');
  }

 protected function doBind(array $values)
  {
    if ($this->isValid() &&  '' === trim($values['new']['service']) && '' === trim($values['new']['amount']))
    {
      unset($values['new'], $this['new']);
    }

    if (isset($values['Items']))
    {
      foreach ($values['Items'] as $i => $bookmarkValues)
      {
        if (isset($bookmarkValues['delete']) && $bookmarkValues['id'])
        {
          $this->scheduledForDeletion[$i] = $bookmarkValues['id'];
        }
      }
    }

    parent::doBind($values);
  }

  /**
   * Updates object with provided values, dealing with evantual relation deletion
   *
   * @see sfFormDoctrine::doUpdateObject()
   */
  protected function doUpdateObject($values)
  {
    if (count($this->scheduledForDeletion))
    {
      foreach ($this->scheduledForDeletion as $index => $id)
      {
        unset($values['Items'][$index]);
        unset($this->object['Items'][$index]);
        Doctrine::getTable('Item')->findOneById($id)->delete();
      }
    }

    $this->getObject()->fromArray($values);
  }

  /**
   * Saves embedded form objects.
   *
   * @param mixed $con   An optional connection object
   * @param array $forms An array of forms
   */
  public function saveEmbeddedForms($con = null, $forms = null)
  {
    if (null === $con)
    {
      $con = $this->getConnection();
    }

    if (null === $forms)
    {
      $forms = $this->embeddedForms;
    }

    foreach ($forms as $form)
    {
      if ($form instanceof sfFormObject)
      {
        if (!in_array($form->getObject()->getId(), $this->scheduledForDeletion))
        {
          $form->saveEmbeddedForms($con);
          $form->getObject()->save($con);
        }
      }
      else
      {
        $this->saveEmbeddedForms($con, $form->getEmbeddedForms());
      }
    }
  }
}
