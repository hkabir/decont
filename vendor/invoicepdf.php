<?php
namespace InvoicePDF;



//App::import('Vendor','tcpdf/tcpdf');
require_once(ROOT . DS . "vendor" . DS ."tcpdf". DS. "tcpdf.php");

use TCPDF\TCPDF;
class InvoicePDF  extends TCPDF {

var $xContact = '';

var $xClient = '';

var $xDate = '';

var $xDateDue = '';

var $xInvoiceId = '';

var $xDelegat = '';

var $xCarteIdentitate = '';

var $xAuto = '';

var $xDataLivrare = '';


    function Header()
    {
		//$this->Cell(0,10,'','T'); 
		//$this->Ln();

		// Image logo
		$this->Image('img/logo.png', 12, 12, 45, 18, 'PNG', '', '', false, 300, '', false, false, 0, false, false, false);	
		//dreptunghi mare
		$style = array('color' => array(0, 64, 128));
		// Line
		//$pdf->Line(5, 100, 150, 100, $style);
		$this->Rect(10, 10, 189, 275, 'D', array('all' => $style));
		
		$this->SetFontSize(16);
		$this->SetFont('helvetica', '', 10);
		$this->Cell(70,0,'',0,0,'L'); 

		$style = array('color' => array(0, 64, 128));
		// Line
		//$pdf->Line(5, 100, 150, 100, $style);
		$this->Rect(10, 10, 189, 270, 'D', array('all' => $style));
		
		// Image example with resizing
		//$this->Image('image_demo.jpg', 15, 140, 75, 113, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);		

		//$this->SetFontSize(9);
		//$this->Ln();
		//$this->writeHTMLCell(70, 10, 0, 0, $this->xDate, 0, 0, 0,true, 'L');
		
		$this->SetFontSize(9);
		$this->Ln();
		$this->Ln();
		
        $this->SetX(80);
		$this->writeHTMLCell(118, 0, 0, 0, $this->xContact, 0, 0, 0,true, 'R'); 
		$this->Ln();
										 
		$this->Cell(0,5,'','T'); 
		$this->Ln();

		//$this->writeHTMLCell(100, 10, 0, 0, $this->xInvoiceId, 0, 0, 0,true, 'L');
		$this->SetFontSize(9);
		$this->writeHTMLCell(100, 10, 0, 0, $this->xClient, 0, 0, 0,true, 'L');
		//$this->writeHTMLCell(120, 10, 0, 0, $this->xInvoiceId, 0, 0, 0,true, 'L');
		$this->SetFontSize(11);
		$this->writeHTMLCell(88, 10, 0, 0, 'Factura fiscala: '.$this->xInvoiceId.'<br>'.$this->xDate, 0, 0, 0,true, 'R');
		$this->Ln();
		
		$this->SetY(-210);
		$this->SetX(10);
		$this->SetFontSize(8);
		$this->writeHTMLCell(120, 10, 0, 0, 'Cota TVA: 24%', 0, 0, 0,true, 'L');
		$this->Ln();
    } 
		
		// Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-60);
        // Set font
        //$this->SetFont('helvetica', '', 7);
		$this->SetFont('dejavusans', 'B', 7);
        // Page number

        //$this->SetFont('helvetica', 'B', 7);
		$this->Cell(0, 3, 'Conform Comanda:'.$this->xPurchaseOrder.'', 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		$this->Ln();	
		$this->Cell(0, 3, 'Data scadenta: '.$this->xDateDue.'. Se achita cu OP.', 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		$this->Ln();	
		$this->Cell(0, 3, 'Completat de Sandu Constantin 1700212073546, ZV003398', 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		$this->Ln();	
		
		$style = array( 'color' => array(0, 0, 0));
		//linie deasupra date delegat
		$this->Line(10, 246, 199, 246, $style);
		//linie sub produse factura
		//$this->Line(100, 129, 199, 129, $style);
		
		//linie sub produse factura
		//$this->Line(135, 140, 199, 140, $style);
        
		$this->SetFont('dejavusans', '', 7);
		
		$this->Cell(0, 4, 'Date privind expeditia', 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		$this->Ln();	
        $this->Cell(0, 4, 'Numele delegatului: '.$this->xDelegat, 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		//$this->Ln();
        $this->Cell(0, 4, 'Semnatura si stampila furnizor', 0, false, 'R', 0, '', 0, false, 'T', 'M');	
		$this->Ln();
        $this->Cell(0, 4, 'Buletinul/cartea de identitate: '.$this->xCarteIdentitate, 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		$this->Ln();
        $this->Cell(0, 4, 'Mijlocul de transport nr: '.$this->xAuto, 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		$this->Ln();
        $this->Cell(0, 4, 'Expedierea s-a facut in prezenta noastra la data/ora: '.$this->xDataLivrare, 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		$this->Ln();
        $this->Cell(0, 4, 'Semnaturi', 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		$this->Ln();
		$this->Ln();
		$this->Ln();
        $this->Cell(0, 10, 'www.saninvest.ro', 0, false, 'C', 0, '', 0, false, 'T', 'M');		
		} 
	
    function ItemTable($header,$items) {
			
	  // header spacing
		$this->Cell(0,90); 
		$this->Ln();
			
        //Colors, line width and bold font
        $this->SetFillColor(175,173,173);
        $this->SetTextColor(0,0,0);
        $this->SetDrawColor(255,255,255);
        $this->SetLineWidth(.2);
		$this->setCellHeightRatio(1);
		$this->SetFont('dejavusans', '', 8);
        $this->SetFont('','B');
        //Table Header
        $w=array(12,80,15,22,20,20,20);
        for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],10,$header[$i],1,0,'L',1);
        $this->Ln();
				
        //Color and font restoration
        $this->SetFillColor(215,213,213);
        $this->SetTextColor(0);
        $this->SetFont('');
				
		$this->SetCellPadding(2);
		$lineHeights = array('');

        $fill=1;
		$i=1; //contor randuri factura
        foreach($items as $row) 
		{
			$this->MultiCell($w[0],10,$i, 0, 'L', $fill, 0, 0 ,0, true);
			$lineHeights[] = $this->getLastH();
			
			$this->MultiCell($w[1],10,$row['description'], 0, 'L', $fill, 0, 0 ,0, true);
			$lineHeights[] = $this->getLastH();
			
			$this->MultiCell($w[2],10,$row['name'], 0, 'L', $fill, 0, 0 ,0, true);
			$lineHeights[] = $this->getLastH();

			$this->MultiCell($w[3],10,$row['qty'], 0, 'L', $fill, 0, 0 ,0, true);
			$lineHeights[] = $this->getLastH();
			
			$this->MultiCell($w[4],10,$row['price'], 0, 'L', $fill, 0, 0 ,0, true);
			$lineHeights[] = $this->getLastH();
			$this->MultiCell($w[5],10,$row['total'], 0, 'L', $fill, 0, 0 ,0, true);
			$lineHeights[] = $this->getLastH();
			$this->MultiCell($w[6],10,round($row['total']*.24,2), 0, 'L', $fill, 0, 0 ,0, true);
			$lineHeights[] = $this->getLastH();
			
			$this->Ln(max($lineHeights));
			$lineHeights = array('');
			$fill=!$fill;
			$i++;
        }
    }
		
    function TotalTable($invoice) 
		{			
		$this->	_createTotalCells('Total fara TVA', $invoice['subTotal']);	
		$this->	_createTotalCells('TVA', $invoice['taxTotal']);	
		$this->SetFont('dejavusans', 'B', 11);
		$this->	_createTotalCells('Total', $invoice['total']);	
		$this->SetFont('dejavusans', '', 7);
    }
		
	function _createTotalCells($title, $price)
	{
		//$fill=0;
		$this->Ln();
		$this->SetTextColor(0);
		$this->SetCellPadding(1);
		$this->SetFont('', 'B');
		$this->setCellHeightRatio(0.1);
		
		$this->Cell(132); // move to right
		$this->MultiCell(25,4,$title, 0, 'L', 0, 0, 0, 0, true);
		$this->SetFont('');
		//$fill=!$fill;
		$this->MultiCell(25,4,$price, 0, 'R', 0, 0, 0 ,0, true);
		$this->Ln();
	}
		
} 
?>
