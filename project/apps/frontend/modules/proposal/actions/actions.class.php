<?php

require_once dirname(__FILE__).'/../lib/proposalGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/proposalGeneratorHelper.class.php';

/**
 * proposal actions.
 *
 * @package    limbo
 * @subpackage proposal
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class proposalActions extends autoProposalActions
{

 public function executeListPrint(sfWebRequest $request) {
    //$this->getResponse()->setHttpHeader('Content-Type','application/pdf;charset=utf-8');
    $this->proposal = Doctrine::getTable('proposal')->find($request->getParameter('id'));
    $this->items = $this->proposal->getItems();
    $this->contactos=$this->proposal->getClient()->getContacts();
    $generalData = Doctrine::getTable('config')->createQuery('c')->select('name', 'value')->execute(array(), DOCTRINE::HYDRATE_ON_DEMAND);
    foreach ($generalData as $value) {
      $data[$value->getName()] = $value->getValue();
    }
    $this->data = $data;

    $config = sfTCPDFPluginConfigHandler::loadConfig();
    // create new PDF document
    $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // Smaller files
    $pdf->SetCompression(true);
    // use the layout
    $this->setLayout('pdf');
    // aboid errors
    sfConfig::set('sf_web_debug', false);
    // var with values
    $this->pdf = $pdf;

 }


}
