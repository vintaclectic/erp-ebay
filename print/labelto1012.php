<?php
@session_start();
error_reporting(0);
$user	= $_SESSION['user'];
include "../include/dbconnect.php";	

require_once('../tcpdf/config/lang/eng.php');
require_once('../tcpdf/tcpdf.php');

$dbcon	= new DBClass();

	$ertj		= "";
	$orders		= explode(",",$_REQUEST['ordersn']);
	for($g=0;$g<count($orders);$g++){
		$sn 	=  $orders[$g];
		if($sn != ""){
				
					$ertj	.= " a.ebay_id='$sn' or";
		}
			
	}
	$ertj			 = substr($ertj,0,strlen($ertj)-3);
	if($ertj == ""){
	
	$sql	= "select * from ebay_order as a where ebay_user='$user' and a.ebay_status='1' and a.ebay_combine!='1' ";	
	}else{	
	$sql	= "select * from ebay_order as a where ($ertj) and ebay_user='$user' and a.ebay_combine!='1' ";	
	}	

		
	$sql	= $dbcon->execute($sql);
	$sql	= $dbcon->getResultArray($sql);

	
	
	
date_default_timezone_set ("Asia/Chongqing");	

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);




// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetLeftMargin(1);
$pdf->SetTopMargin(2);
	
	$xx		= 0;
	$yy		= 4;
	
	$currentpage = 0;
	
			$pdf->SetFont('cid0jp', '', 13);
			$pdf->AddPage();
			$pdf->SetFillColor(255, 255, 255);
			$pdf->setPageOrientation('P','false','0');
			
			
	for($i=0;$i<count($sql);$i++){
			
			
			$name					= $sql[$i]['ebay_username'];
			$street1				= @$sql[$i]['ebay_street'];
			$street2 				= @$sql[$i]['ebay_street1'];
			$city 					= $sql[$i]['ebay_city'];
			$state					= $sql[$i]['ebay_state'];
			$countryname 			= $sql[$i]['ebay_countryname'];
			$zip					= $sql[$i]['ebay_postcode'];
			$tel					= $sql[$i]['ebay_phone'];
			$ebay_note				= $sql[$i]['ebay_note'];
			$ebay_phone				= $sql[$i]['ebay_phone'];
			$addressline01			= $name.'<br>'.$street1.' '.$street2.'<br>'.$city.' '.$state.' '.$zip.' '.$countryname;
			
			if($name != ''){
				$pdf->setX(0);
				$pdf->setY($yy);
				$pdf->MultiCell(99.1, 38.1, $addressline01, 1, 'L', 1, 0, '', '', true,0,true);
				$currentpage++;
				
		
			}
			
			$i++;
			$name2					= $sql[$i]['ebay_username'];
			$street1				= @$sql[$i]['ebay_street'];
			$street2 				= @$sql[$i]['ebay_street1'];
			$city 					= $sql[$i]['ebay_city'];
			$state					= $sql[$i]['ebay_state'];
			$countryname 			= $sql[$i]['ebay_countryname'];
			$zip					= $sql[$i]['ebay_postcode'];
			$tel					= $sql[$i]['ebay_phone'];
			$ebay_note				= $sql[$i]['ebay_note'];
			$ebay_phone				= $sql[$i]['ebay_phone'];
			$addressline02			= $name2.'<br>'.$street1.' '.$street2.'<br>'.$city.' '.$state.' '.$zip.' '.$countryname;
			
			if($name2 != ''){
		
				$pdf->setX(110);
				$pdf->MultiCell(99.1, 38.1, $addressline02, 1, 'L', 1, 0, '', '', true,0,true);
				$name2 = '';
				$currentpage++;
				
			}
			$yy = $yy + 41;
			$pdf->setY($yy);
			
			
			//$pdf->Write($h=0, '000', $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

			
			if($currentpage%14 == 0){
				
				$pdf->AddPage();
				$yy = 4;
			}
	
	}
	





// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_008.pdf', 'I');

	 
	 ?>
     


