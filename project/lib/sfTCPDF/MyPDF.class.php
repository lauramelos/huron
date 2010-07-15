<?php

/**
 * MyPDF class.
 *
 * @package    Huemul
 * @author     Laura Melo

 */
class MyPDF extends sfTCPDF {
    //Page header
    public function Header() {
        // Logo
        $this->Image(K_PATH_IMAGES.PDF_HEADER_LOGO, 25, 10, PDF_HEADER_LOGO_WIDTH);
        // Set font
        $this->SetFont('helvetica', 'B', 16);
        // Move to the right
        $this->Ln(20);
        // Title
        $this->Cell(0,0, PDF_HEADER_TITLE, 0, 0, 'L');
        $this->Ln(8);
        $this->Cell(0,0, PDF_HEADER_STRING, 0, 0, 'C');
        // Line break
        $this->Ln(30);
        }

    // Page footer
    public function Footer() {
        // Position at 1.5 cm from bottom
       /* $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, 0, 'C');*/
    }
    	// Load table data from file
	public function LoadData($file) {
		// Read file lines
		$lines = file($file);
		$data = array();
		foreach($lines as $line) {
			$data[] = explode(';', chop($line));
		}
		return $data;
	}

	// Colored table
	public function ColoredTable($header,$data) {
		// Colors, line width and bold font
		$this->SetFillColor(255, 0, 0);
		//$this->SetTextColor(255);
		$this->SetDrawColor(128, 0, 0);
		$this->SetLineWidth(0.3);
		$this->SetFont('', 'B');
		// Header
		$w = array(15, 80, 25, 25, 25);
		for($i = 0; $i < count($header); $i++)
		$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224, 235, 255);
		//$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = 0;
		foreach($data as $row) {
			$this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
			$this->MultiCell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
      $this->Cell($w[4], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
			$this->Ln();
			$fill=!$fill;
		}
		$this->Cell(array_sum($w), 0, '', 'T');
	}


}