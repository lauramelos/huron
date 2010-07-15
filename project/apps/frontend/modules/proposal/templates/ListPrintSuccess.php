<?php use_helper('I18N', 'Date') ?>
<?php

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

$pdf->AddPage();
$pdf->SetFont(PDF_FONT_NAME_MAIN, 'B U', PDF_FONT_SIZE_MAIN+4);
$pdf->Cell(0, 0, $data['titulo_propuesta'], 0, 1, 'C');
$pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN+2);

//formato de fecha con helper
$hoy=format_date($proposal->getDate(),'D');

$pdf->Cell(0, 0, $data['lugar_origen'].', '.$hoy, 0, 1, 'R');

$cadena = 'Señores:
'.$proposal->getClient().'
Atn:';
$contactos=$proposal->getClient()->getContacts();
foreach ($contactos as $value) {
  $cadena.= $value->getFirstName().' '.$value->getLastName().', ';
}
$cadena = substr($cadena,  0 ,  strlen($cadena)-2);
$cadena =ucfirst($cadena).'. ';
$pdf->MultiCell(80, 0, $cadena, 0, 0, 'L');
$pdf->SetFont(PDF_FONT_NAME_MAIN, 'B', PDF_FONT_SIZE_MAIN+2);
$pdf->MultiCell(80, 2, $proposal->getDescription(), 'L T R B', 1, 'R');
$pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN+2);
$pdf->MultiCell(0, 0, $data['texto_cabecera'], 0, 1, 'L');


/* Tabla de Propuesta con Coloredtable.

$pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN);
$header = array('item', 'Descripción', 'Cantidad', 'Costo unitario', 'Total');
$tableData = array();
foreach ($items as $i=>$item){
  $tableData[]= array($i+1,$item->getService(),$item->getComments(),$item->getAmount(),$item->getUnitCost(),$item->getAmount()*$item->getUnitCost());
}// print colored table
$pdf->ColoredTable($header, $tableData);
**/

$tbl = '
<table cellspacing="0" cellpadding="1" border="1">
<tr><th>item</th><th>Descripción</th><th>Cantidad</th><th>Costo unitario</th><th>Total</th></tr>';
foreach ($items as $i=>$item){
$tbl .= '<tr><td>'.($i+1).'</td><td>'.$item->getService().', '.$item->getComments().'</td><td>'.$item->getAmount().'</td><td>'.$item->getUnitCost().'</td><td>'.($item->getAmount()*$item->getUnitCost()).'</td></tr>';
}
$tbl .='</table>';


$pdf->writeHTML($tbl, true, false, false, false, '');



$pdf->ln();
$pdf->SetFont(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN+2);
$pdf->Cell(40, 0,'Nota:', 0, 1, 'L');
$pdf->Cell(40, 0,'Observaciones:'.$proposal->getComments(), 0, 1, 'L');
$pdf->Cell(40, 0,$proposal->getCurrency(), 0, 1, 'L');
$pdf->Cell(40, 0,'Plazo de entrega: '.$proposal->getDelivery(), 0, 1, 'L');
$pdf->Cell(40, 0,'Validez de la oferta: '.$proposal->getBidValidity(), 0, 1, 'L');
$pdf->Cell(40, 0,'Condición de pago: '.$proposal->getPaymentTerm(), 0, 1, 'L');
$pdf->ln();
$pdf->Cell(40, 0,'Atentamente,', 0, 1, 'L');
$pdf->ln();
$pdf->MultiCell(40, 0,$data['remitente'], 0, 1, 'L');

//Footer
$pdf->SetY(-35);
// $this->SetFont('helvetica', 'I', 8);
// Page number
// $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, 0, 'C')
$pdf->SetFont(PDF_FONT_NAME_MAIN, 'I', PDF_FONT_SIZE_MAIN-1);

$pdf->SetLineStyle(array('width' => 0.5 , 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(100, 100, 100)));
$pdf->Cell(0, 0, '', 'T', 1, 'C');
$pdf->MultiCell(100, 0, $data['pie_izquierdo'], 0, 'L', 0, 0, '', '', true, 0, false, true, 0);
$pdf->MultiCell(100, 0, $data['pie_derecho'], 0, 'L', 0, 1, '', '', true, 0, false, true, 0);
//Close and output PDF document
$pdf->Output('propuesta.pdf', 'D');
  