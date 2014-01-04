<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF{
	// Page header
	function Header()
	{
		$this->SetFont('Arial','B',15);
		// Title
		if($_POST['quoteTitle']){
			$this->Cell(20,10,$_POST['quoteTitle'],0,0,'c');
		}else{
			$this->Cell(20,10,'Quote',0,0,'c');
		}
		
		$this->SetFont('Arial','',10);
		
		if(!empty($_POST['quoteNumber'])){
			$this->Cell(0,10,'Quote #: '.$_POST['quoteNumber'],0,0, 'R');
		}
		
		// Line break
		$this->Ln(10);
	}

	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	
	function BasicTable($data)
	{
		$count = 0;
		$this->SetFont('Arial','B',10);
		$this->SetDrawColor(220, 220, 220);
		
		$this->Cell(150,10,'Task Name', 'B');
		$this->Cell(20,10,'Units', 'B', '', 'C');
		$this->Cell(20,10,'Rate', 'B', '', 'R');
		$this->Ln();
		
		$this->SetFont('Arial','',10);
		
		foreach($data as $row)
		{
			$count++;
			if($count == 1){
				$this->Cell(150,10,$row, 'B');
			}else if($count == 2){
				$this->Cell(20,10,$row, 'B', '', 'C');
			}else{
				$this->Cell(20,10,'$'.$row, 'B', '', 'R');
				$this->Ln();
				$count = 0;
			}
		}
		
		if($_POST['taxInput'] > 0){
			$this->Cell(0,10,'Subotal: $'.$_POST['taskSubtotalInput'], 0, '', 'R');
			$this->Ln(5);
			$this->Cell(0,10,'Tax: '.$_POST['taxInput'].'%', 0, '', 'R');
			$this->Ln(10);
		}
		$this->SetFont('Arial','B',14);
		$this->Cell(0,10,'Total: $'.$_POST['taskTotalInput'], 0, '', 'R');
		$this->Ln();
		
		$this->SetDrawColor(0, 0, 0);
		
	}
	
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,10,'Prepared By',0,0);
$pdf->Cell(0,10,'Prepared For',0,1);

$pdf->SetFont('Arial','',10);
if(!empty($_POST['companyName'])){
	$pdf->Cell(100,6,$_POST['companyName'],0,0);
}

if(!empty($_POST['clientFirstName'])){
	$pdf->Cell(0,6,'Name: '.$_POST['clientFirstName'].' '.$_POST['clientLastName'],0,1);
}

if(!empty($_POST['email'])){
	$pdf->Cell(100,6,'Email: '.$_POST['email'],0,0);
}

if(!empty($_POST['clientEmail'])){
	$pdf->Cell(0,6,'Email: '.$_POST['clientEmail'],0,1);
}

if(!empty($_POST['phone'])){
	$pdf->Cell(100,6,'Phone: '.$_POST['phone'],0,0);
}

if(!empty($_POST['clientPhone'])){
	$pdf->Cell(0,6,'Phone: '.$_POST['clientPhone'],0,1);
}

if(!empty($_POST['bankAccountNumber'])){
	$pdf->Cell(100,6,'Bank Account Number: '.$_POST['bankAccountNumber'],0,0);
}

if(!empty($_POST['clientCompany'])){
	$pdf->Cell(0,6,'Company: '.$_POST['clientCompany'],0,1);
}

$pdf->Cell(100,6,'',0,0);

if(!empty($_POST['clientAddress'])){
	$pdf->Cell(0,6,'Address: '.$_POST['clientAddress'],0,1);
}

$pdf->Ln();

$data = $_POST['task'];
$pdf->BasicTable($data);

$pdf->Output();