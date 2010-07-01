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

 public function executePrintProposal(sfWebRequest $request) {
    $proposal = Doctrine::getTable('proposal')->find($request->getParameter('id'));
    $items = $proposal->getItems();
    $generalData = Doctrine::getTable('config')->createQuery('c')->select('name', 'value')->execute(array(), DOCTRINE::HYDRATE_ON_DEMAND);

    foreach ($generalData as $value) {
      $data[$value->getName()] = $value->getValue();
    }


    $config = sfTCPDFPluginConfigHandler::loadConfig();

    // create new PDF document
    $pdf = new myPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    //set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


    //set some language-dependent strings
    //$pdf->setLanguageArray($l);

    // ---------------------------------------------------------

    // add a page
    $pdf->AddPage();

    // print a line using Cell()
    $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B U', PDF_FONT_SIZE_MAIN+4);
    $pdf->Cell(0, 0, $data['titulo_propuesta'], 0, 1, 'C');
    $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN+2);
    $date=new DateTime($proposal->getDate());
    ///Ver como corregir el mes en español
    $pdf->Cell(0, 0, $data['lugar_origen'].', '.date_format($date,'d \d\e F \d\e Y'), 0, 1, 'R');
    $pdf->Cell(0, 0, 'Señores:', 0, 1, 'L');
    $pdf->Cell(0, 0, $proposal->getClient(), 0, 1, 'L');
    $pdf->Cell(8, 0, 'Atn: ', 0, 0, 'L');
    $contactos=$proposal->getClient()->getContacts();
    $cadena="";
    foreach ($contactos as $value) {
      $cadena.= $value->getFirstName().' '.$value->getLastName().', ';
    }
    $cadena = substr($cadena,  0 ,  strlen($cadena)-2);
    $cadena =ucfirst($cadena).'. ';
   $pdf->Cell(0, 0, $cadena, 0, 0, 'L');

    /*$pdf->MultiCell(0, 0,'La presente constancia habilita al profesional actuante a iniciar el expediente municipal para el registro del plano de obra, en las condiciones descriptas y según los datos que a continuación se detallan.', 0, 1, 'L');
    $pdf->Ln(1);
    $pdf->Cell(70, 0,'EXPEDIENTE:', 0, 0, 'L');
    $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B', PDF_FONT_SIZE_MAIN);
    //$pdf->Cell(0, 0, $procedure->getDossier(), 0, 1, 'L');
    $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
    $pdf->Cell(70, 0,'PROPIETARIO:', 0, 0, 'L');
     $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B', PDF_FONT_SIZE_MAIN);
      /*$propietarios=$procedure->getOwner();
      $string="";
      foreach ($propietarios as $propietario){
        $string .= $propietario.', ';
      }
      $string= substr($string,  0 ,  strlen($string)-2);
      $string =ucfirst($string).'. ';

      $pdf->Cell(0, 0, $string, 0, 1, 'L');

      $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
      $pdf->Cell(70, 0,'TIPO TRAMITE:', 0, 0, 'L');
      $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B', PDF_FONT_SIZE_MAIN);
      $pdf->Cell(0, 0, $procedure->getFormu(), 0, 1, 'L');
      $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
      $pdf->Cell(70, 0,'DOMICILIO DEL INMUEBLE:', 0, 0, 'L');
      $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B', PDF_FONT_SIZE_MAIN);
      $pdf->Cell(0, 0,$procedure->getCadastralData()->getAddress(), 0, 1, 'L');
      $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
      $pdf->Cell(70, 0,'BARRIO:', 0, 0, 'L');
      $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B', PDF_FONT_SIZE_MAIN);
      $pdf->Cell(0, 0,$procedure->getCadastralData()->getNeighborhood(), 0, 1, 'L');
      $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
      $pdf->Cell(70, 0,'NOMECLATURA CATASTRAL:', 0, 0, 'L');
      $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B', PDF_FONT_SIZE_MAIN);
      $pdf->Cell(0, 0, $procedure->getCadastralData() , 0, 1, 'L');
      $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);


    $pdf->Ln(3);
    $pdf->Cell(0, 0,'OBSERVACIONES PENDIENTES/DOCUMENTACION A ANEXAR CON EL PLANO:', 0, 1, 'L');
    foreach ($rev_itemsGroup as $key=>$group) {
        $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B', PDF_FONT_SIZE_MAIN);
        $pdf->Cell(70, 0, $key.': ', 0, 1, 'L');
        $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
        $observ='';
        foreach ($group as $item) {
          $observ.=$item->getItem().', ';
                }
        $observ = substr($observ,  0 ,  strlen($observ)-2);
        $observ =ucfirst($observ).'. ';
        $pdf->MultiCell(0, 0,$observ, 0, 1, 'L');
      }
    $pdf->Ln(30);
    $pdf->SetFont(PDF_FONT_NAME_MAIN, 'B', PDF_FONT_SIZE_MAIN);
    $pdf->Cell(40, 0,'FIRMA DEL PROPIETARIO', 0, 0, 'L');
    $pdf->Cell(0, 0,'FIRMA DEL PROFESIONAL ACTUANTE', 0, 1, 'R');
    $pdf->Ln(60);
    $pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
    $pdf->Cell(0, 0,'DIRECCION DE DESARROLLO URBANO Y CATASTRO', 0, 1, 'C');
    $pdf->Cell(0, 0,'MUNICIPALIDAD DE CIPOLLETTI', 0, 1, 'C');
    // ---------------------------------------------------------
*/
    //Close and output PDF document
    $pdf->Output('constancia.pdf', 'I');
  }


}
