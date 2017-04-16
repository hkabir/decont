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
		$this->Image('img/logo.png', 12, 12, 45, 18, 'PNG', '', '', false, 300, '', false, false, 0, false, false, false);	
		//dreptunghi mare

		
		$style = array('color' => array(0, 0, 0));
		// Line
		//$pdf->Line(5, 100, 150, 100, $style);
		$this->Rect(10, 10, 189, 203, 'D', array('all' => $style));
		
		$this->SetFontSize(16);
		$this->SetFont('dejavusans', '', 10);
		$this->Cell(70,0,'',0,0,'L'); 
	
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
		$this->writeHTMLCell(88, 10, 0, 0, 'Factura fiscala: BV '.$this->xInvoiceId.'<br>'.$this->xDate, 0, 0, 0,true, 'R');
		$this->Ln();
		
		$this->SetY(-210);
		$this->SetX(10);
		$this->SetFontSize(8);
		$this->writeHTMLCell(120, 10, 0, 0, 'Cota TVA: 24%', 0, 0, 0,true, 'L');
		$this->Ln();
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
		$this->Ln();
		$this->Ln();
		$this->Ln();
		$this->Ln();
		
		$this->Cell(0, 3, 'Data scadenta: '.$this->xDateDue.'. Se achita cu OP/BO/CEC', 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		$this->Ln();	
		$this->Cell(0, 3, 'Completat de Sandu Constantin 1700212073546, ZV003398', 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		$this->Ln();	

		//$style = array( 'color' => array(0, 0, 0));
		//linie deasupra date delegat
		//$this->Line(10, 249, 199, 249, $style);
		//linie sub produse factura
		//$this->Line(100, 126, 199, 126, $style);
		
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
        $this->Cell(0, 4, 'Expedierea s-a facut in prezenta noastra la data/ora: '.date('d.m.Y',strtotime($this->xDataLivrare)), 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		$this->Ln();
        $this->Cell(0, 4, 'Semnaturi', 0, false, 'L', 0, '', 0, false, 'T', 'M');	
		$this->Ln();
		$this->Ln();
		$this->Ln();
        //$this->Cell(0, 10, 'www.saninvest.ro', 0, false, 'C', 0, '', 0, false, 'T', 'M');	

//header chitanta
		//logo chitanta
		$this->Image('img/logo.png', 12, 220, 30, 12, 'PNG', '', '', false, 300, '', false, false, 0, false, false, false);	
		//$pdf->Line(5, 100, 150, 100, $style);
		$style = array('color' => array(0, 0, 0), 'dash' => '10,5,10,5');
		$this->Line(10, 215, 199, 215, $style);
		$style2 = array('color' => array(0, 0, 0));
		$this->Rect(10, 240, 189, 50, 'D', array('all' => $style2));
		//date furnizor chitanta
        //$this->SetX(80);
        //$this->SetY(-80);
		//$this->SetFontSize(14);
		$this->SetFont("helvetica", "B", 14);		
		$this->Text(80, 227, 'Chitanta nr: '.$this->xNrChitanta);
		$this->SetFont("helvetica", "", 8);	
		$this->Text(80, 232, $this->xDate);
		
		$this->SetFont("helvetica", "", 8);	
		$this->Text(135, 220, 'FURNIZOR: SC SANINVEST SRL');
		$this->Text(135, 223, 'Registrul Comertului: J08/2064/2006');
		$this->Text(135, 226, 'Cod Fiscal: RO18982439');
		$this->Text(135, 229, 'Sediul: str.Harmanului nr.124, Ap.8, Brasov');
		$this->Text(135, 232, 'Cont IBAN: RO36 INGB 0000 9999 0477 3148');
		$this->Text(135, 235, 'Banca: ING BANK');
		$this->Text(135, 238, 'Capital social: 200 lei');
/*-------------------------------------------*/		


//continut chitanta

	
		$this->SetFont("helvetica", "", 8);	
		$this->Text(18, 250, 'Am primit de la :'.$this->xClient2);
		$this->Text(18, 255, 'Registrul Comertului: '.$this->xRegComert.',Cod Fiscal: '.$this->xCui);
		$this->Text(18, 260, 'Adresa : '.$this->xAdresa);
		$this->Text(18, 265, 'Suma de :'.$this->xTotal.' adica:'.$this->xTotalLitere.' lei si '.$this->xTotalLitereDecimal.' bani');
		$this->Text(18, 270, 'Reprezentand c/v factura: '.$this->xInvoiceId.' din: '.$this->xDate);
		$this->Text(135, 280, 'Semnatura si stampila');
		//$this->Text(135, 228, 'Capital social: 200 lei');
/*-------------------------------------------*/		


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
		$this->	_createTotalCells('Total General', $invoice['total']);	
    }
		
	function _createTotalCells($title, $price)
	{
		$this->Ln();
		$this->SetTextColor(0);
		$this->SetCellPadding(1);
		$this->SetFont('', 'B');
		$this->setCellHeightRatio(0.1);
		
		$this->Cell(132); // move to right
		$this->MultiCell(25,3,$title, 0, 'L', 0, 0, 0, 0, true);
		$this->SetFont('');
		$this->MultiCell(25,3,$price, 0, 'R', 0, 0, 0 ,0, true);
		$this->Ln();
	}
	
} 
?>
