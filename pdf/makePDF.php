<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF{
	// Page header
	function Header()
	{
		$this->SetFont('Arial','B',15);
		// Title
		if($_POST['quoteTitle']){
			$this->Cell(30,10,$_POST['quoteTitle'],0,0,'c');
		}else{
			$this->Cell(30,10,'Quote',0,0,'c');
		}
		
		// Line break
		$this->Ln(20);
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
		$this->SetFont('Arial','',10);
		
		$this->Cell(60,10,'Task Name',1);
		$this->Cell(60,10,'Units',1);
		$this->Cell(60,10,'Rate',1);
		$this->Ln();
		
		foreach($data as $row)
		{
			$count++;
			$this->Cell(60,10,$row,1);
			if($count % 3 == 0){
				$this->Ln();
			}
			
		}
		
		$this->Cell(120,10,'',1);
		$this->Cell(60,10,'Total: $'.$_POST['taskTotalInput'],1);
		$this->Ln();
		
	}
	
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

if(!empty($_POST['quoteNumber'])){
	$pdf->Cell(50,10,'Quote Number: '.$_POST['quoteNumber'],0,0);
}

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