<?php

App::import('Vendor','tcpdf/tcpdf');

class InvoicePDF  extends TCPDF {

var $xContact = '';

var $xClient = '';

var $xClient2 = '';

var $xDate = '';

var $xDateDue = '';

var $xInvoiceId = '';

var $xDelegat = '';

var $xCarteIdentitate = '';

var $xAuto = '';

var $xDataLivrare = '';

    function Header()
    {

		// Image logo
		//$this->Image('img/logo.png', 12, 12, 45, 18, 'PNG', '', '', false, 300, '', false, false, 0, false, false, false);	
		//dreptunghi mare

		
		$style = array('color' => array(0, 0, 0));
		// Line
		//$pdf->Line(5, 100, 150, 100, $style);
		//$this->Rect(10, 10, 189, 203, 'D', array('all' => $style));
		
		$this->SetFontSize(16);
		$this->SetFont('dejavusans', '', 10);
		$this->Cell(0,0,'',0,0,'L'); 
	
		$this->SetFontSize(9);
		$this->Ln();
		//$this->Ln();
		
        $this->SetX(0);
//		$this->writeHTMLCell(118, 0, 0, 0, $this->xContact, 0, 0, 0,true, 'R'); 
//		$this->Ln();
//										 
//		$this->Cell(0,5,'','T'); 
//		$this->Ln();
//
//		//$this->writeHTMLCell(100, 10, 0, 0, $this->xInvoiceId, 0, 0, 0,true, 'L');
//		$this->SetFontSize(9);
//		$this->writeHTMLCell(100, 10, 0, 0, $this->xClient, 0, 0, 0,true, 'L');
//		//$this->writeHTMLCell(120, 10, 0, 0, $this->xInvoiceId, 0, 0, 0,true, 'L');
//		$this->SetFontSize(11);
//		$this->writeHTMLCell(88, 10, 0, 0, 'Factura fiscala: BV '.$this->xInvoiceId.'<br>'.$this->xDate, 0, 0, 0,true, 'R');
//		$this->Ln();
//		
//		$this->SetY(-210);
//		$this->SetX(10);
//		$this->SetFontSize(8);
//		$this->writeHTMLCell(120, 10, 0, 0, 'Cota TVA: 24%', 0, 0, 0,true, 'L');
//		$this->Ln();
    } 
		
		// Page footer
    public function Footer() {
        
/*--------------------------------- */
		
		// Position at 15 mm from bottom
		$this->SetY(-130);
        // Set font
        //$this->SetFont('helvetica', '', 7);
		$this->SetFont('dejavusans', 'B', 7);
        // Page number

        //$this->SetFont('helvetica', 'B', 7);
//		$this->Ln();
//		$this->Ln();
//		$this->Ln();
//		$this->Ln();
		
//		$this->Cell(0, 3, 'Data scadenta: '.$this->xDateDue.'. Se achita cu OP/BO/CEC', 0, false, 'L', 0, '', 0, false, 'T', 'M');	
//		$this->Ln();	
//		$this->Cell(0, 3, 'Completat de Sandu Constantin 1700212073546, ZV003398', 0, false, 'L', 0, '', 0, false, 'T', 'M');	
//		$this->Ln();	

		//$style = array( 'color' => array(0, 0, 0));
		//linie deasupra date delegat
		//$this->Line(10, 249, 199, 249, $style);
		//linie sub produse factura
		//$this->Line(100, 126, 199, 126, $style);
		
		//linie sub produse factura
		//$this->Line(135, 140, 199, 140, $style);
// 		$this->SetFont('dejavusans', '', 7);       
//		$this->Cell(0, 4, 'Date privind expeditia', 0, false, 'L', 0, '', 0, false, 'T', 'M');	
//		$this->Ln();	
//        $this->Cell(0, 4, 'Numele delegatului: '.$this->xDelegat, 0, false, 'L', 0, '', 0, false, 'T', 'M');	
//		//$this->Ln();
//        $this->Cell(0, 4, 'Semnatura si stampila furnizor', 0, false, 'R', 0, '', 0, false, 'T', 'M');	
//		$this->Ln();
//        $this->Cell(0, 4, 'Buletinul/cartea de identitate: '.$this->xCarteIdentitate, 0, false, 'L', 0, '', 0, false, 'T', 'M');	
//		$this->Ln();
//        $this->Cell(0, 4, 'Mijlocul de transport nr: '.$this->xAuto, 0, false, 'L', 0, '', 0, false, 'T', 'M');	
//		$this->Ln();
//        $this->Cell(0, 4, 'Expedierea s-a facut in prezenta noastra la data/ora: '.date('d.m.Y',strtotime($this->xDataLivrare)), 0, false, 'L', 0, '', 0, false, 'T', 'M');	
//		$this->Ln();
//        $this->Cell(0, 4, 'Semnaturi', 0, false, 'L', 0, '', 0, false, 'T', 'M');	
//		$this->Ln();
//		$this->Ln();
//		$this->Ln();
        //$this->Cell(0, 10, 'www.saninvest.ro', 0, false, 'C', 0, '', 0, false, 'T', 'M');	

//header chitanta
		//logo chitanta
		$this->Image('img/logo.png', 12, 20, 30, 12, 'PNG', '', '', false, 300, '', false, false, 0, false, false, false);	
		//$pdf->Line(5, 100, 150, 100, $style);
		$style = array('color' => array(0, 0, 0), 'dash' => '10,5,10,5');
		$this->Line(10, 15, 199, 15, $style);
		$style2 = array('color' => array(0, 0, 0));
		$this->Rect(10, 40, 189, 50, 'D', array('all' => $style2));
		//date furnizor chitanta
        //$this->SetX(80);
        //$this->SetY(-80);
		//$this->SetFontSize(14);
		$this->SetFont("helvetica", "B", 14);		
		//$this->Text(80, 227, 'Chitanta nr: '.$this->xNrChitanta);
		$this->SetFont("helvetica", "", 8);	
		$this->Text(80, 32, $this->xDate);
		
		$this->SetFont("helvetica", "", 8);	
		$this->Text(135, 20, 'FURNIZOR: SC SANINVEST SRL');
		$this->Text(135, 23, 'Registrul Comertului: J08/2064/2006');
		$this->Text(135, 26, 'Cod Fiscal: RO18982439');
		$this->Text(135, 29, 'Sediul: str.Harmanului nr.124, Ap.8, Brasov');
		$this->Text(135, 32, 'Cont IBAN: RO36 INGB 0000 9999 0477 3148');
		$this->Text(135, 35, 'Banca: ING BANK');
		$this->Text(135, 38, 'Capital social: 200 lei');
/*-------------------------------------------*/		


//continut chitanta

	
		$this->SetFont("helvetica", "", 8);	
		$this->Text(18, 50, 'Am primit de la :'.$this->xClient2);
		$this->Text(18, 55, 'Registrul Comertului: '.$this->xRegComert.',Cod Fiscal: '.$this->xCui);
		$this->Text(18, 60, 'Adresa : '.$this->xAdresa);
		$this->Text(18, 65, 'Suma de :'.$this->xTotal.' adica:'.$this->xTotalLitere.' lei si '.$this->xTotalLitereDecimal.' bani');
		$this->Text(18, 70, 'Reprezentand c/v factura: '.$this->xInvoiceId.' din: '.$this->xDate);
		$this->Text(135, 80, 'Semnatura si stampila');
		//$this->Text(135, 228, 'Capital social: 200 lei');
/*-------------------------------------------*/		


		} 
	
} 
?>
