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
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    $range  = range(date('Y'), date('Y')-100);
    $years = array_combine($range,$range);
    $this->widgetSchema['date'] = new sfWidgetFormDate(
      array(
        'format'=> '%day%/%month%/%year%',
        'years' => $years
      ),
      array(
        'class' => 'input_date_separate'
      )
    );
  }
}
