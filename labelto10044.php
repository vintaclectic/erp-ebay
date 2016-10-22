<?php
@session_start();
error_reporting(0);
$user	= $_SESSION['user'];
include "include/dbconnect.php";
date_default_timezone_set ("Asia/Chongqing");
$dbcon	= new DBClass();
require_once 'Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', '��������');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Ebay Account');	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Sales Record Number');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'User Id');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Buyer Fullname');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'Buyer Phone Number');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Buyer Email');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Buyer Address 1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Buyer Address 2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Buyer City');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'Buyer State');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Buyer Postcode');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M1', 'Buyer Country');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1', 'Item Number');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O1', 'Item Title');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P1', 'Custom Label');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q1', 'Quantity');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R1', 'Sale Price');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S1', 'Postage and Handling');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T1', 'Insurance');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U1', 'Cash on delivery fee');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V1', 'Total Price');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W1', 'Payment Method');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X1', 'Sale Date');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Y1', 'Checkout Date');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z1', 'Paid on Date');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AA1', 'Posted on Date');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AB1', 'Feedback left');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC1', 'Feedback received');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD1', 'Notes to yourself');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AE1', 'PayPal Transaction ID');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AF1', 'Postage Service');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AG1', 'Cash on delivery option');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AH1', 'Transaction ID');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AI1', 'Order ID');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AJ1', 'Variation Details');
	
	

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

	

	$sql	= "select * from ebay_order as a where ebay_user='$user' and a.ebay_status='0' and a.ebay_combine!='1' ";	

	}else{	

	$sql	= "select * from ebay_order as a where ($ertj) and ebay_user='$user' and a.ebay_combine!='1' order by ebay_id desc ";	

	}	
		
		

	$sql	= $dbcon->execute($sql);
	$sql	= $dbcon->getResultArray($sql);
	
	

	$a		= 2;	

	for($i=0;$i<count($sql);$i++){
		

		$ordersn		= $sql[$i]['ebay_ordersn'];
		$paidtime		= date('Y-m-d',strtotime($sql[$i]['ebay_paidtime']));
		$ebay_usermail	= $sql[$i]['ebay_usermail'];
		$ebay_userid	= $sql[$i]['ebay_userid'];	
		$name			= $sql[$i]['ebay_username'];
		$name	  	= str_replace("&acute;","'",$name);
		$name  		= str_replace("&quot;","\"",$name);
		
		
	    $street1		= @$sql[$i]['ebay_street'];
	    $street2 		= @$sql[$i]['ebay_street1'];
		$ebayaccount	= $sql[$i]['ebay_account'];
		$time			= date("Y-m-d H:i;s");
	    $city 				= $sql[$i]['ebay_city'];
		
	    $state				= $sql[$i]['ebay_state'];
		$PaymentMethodUsed 		= $sql[$i]['PaymentMethodUsed'];
	    $countryname 		= $sql[$i]['ebay_countryname'];

	    $zip				= $sql[$i]['ebay_postcode'];

	    $tel				= $sql[$i]['ebay_phone'];

		$ebay_shipfee		= $sql[$i]['ebay_shipfee'];

		$ebay_note			= $sql[$i]['ebay_note'];

		$ebay_total	 		= @$sql[$i]['ebay_total'];
		$recordnumber		= $sql[$i]['recordnumber'];
		$ebay_account		= $sql[$i]['ebay_account'];
		$ebay_ptid			= $sql[$i]['ebay_ptid'];
		$ebay_tid			= $sql[$i]['ebay_tid'];
		if($ebay_account =='enjoyhobbies'){
			
				$ebayaccount			= "ej.";
				
		}else{
			
				$ebayaccount			= substr($ebay_account,0,5);
				
		}
		
		
		
		$ebay_phone					= $sql[$i]['ebay_phone'];
		$ebay_carrier					= $sql[$i]['ebay_carrier'];
		$ebay_createdtime				= @date('Y-m-d',$sql[$i]['ebay_createdtime']);
		$ebay_paidtime					= @date('Y-m-d',$sql[$i]['ebay_paidtime']);

		$addressline	= $street1." ".$street2;
		$addressline	  	= str_replace("&acute;","'",$addressline);
		$addressline  		= str_replace("&quot;","\"",$addressline);
		 $ebay_id 				= $sql[$i]['ebay_id'];

		

		$sl				= "select * from ebay_orderdetail where ebay_ordersn='$ordersn' limit 1";

		$sl				= $dbcon->execute($sl);

		$sl				= $dbcon->getResultArray($sl);

		for($o=0;$o<count($sl);$o++){			

		

			$sku1	= $sl[$o]['sku'];	

			$sku	= $sl[$o]['ebay_itemtitle'];

			$amount	= $sl[$o]['ebay_amount'];

			$pic	= $sl[$o]['ebay_itemurl'];			
			$ebay_itemid			= $sl[$o]['ebay_itemid'];	
			$ebay_itemprice	= $sl[$o]['ebay_itemprice'];	
$ebay_shiptype			= $sl[$o]['ebay_shiptype'];
			$recordnumber		= $sl[$o]['recordnumber'];
			$InsuranceFee		= $sl[$o]['InsuranceFee'];
			if($InsuranceFee == '11') $InsuranceFee = '0.00';
			$sq3	= "select * from ebay_goods where goods_sn='$sku1' and ebay_user='$user'";
		
			
			$sq3	= $dbcon->execute($sq3);
			$sq3	= $dbcon->getResultArray($sq3);
			$goods_name = $sq3[0]['goods_name'];
			
			$labelstr	= '';
			
			if($recordnumber != $recordnumber0){
				
				$labelstr	.= $recordnumber0."-".$recordnumber.",".$sku1." ".$goods_name.",*".$amount.";";
				
			}else{
				
				$labelstr	.= $recordnumber0.",".$sku1." ".$goods_name.",*".$amount.";";
			}


			
			$linstr			= $ebayaccount.$ebay_id;
			$objPHPExcel->setActiveSheetIndex(0)->getCell('A'.$a)->setValueExplicit($time, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('B'.$a)->setValueExplicit($ebayaccount, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('C'.$a)->setValueExplicit($recordnumber, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('D'.$a)->setValueExplicit($ebay_userid, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('E'.$a)->setValueExplicit($name, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('F'.$a)->setValueExplicit($ebay_phone, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('G'.$a)->setValueExplicit($ebay_usermail, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('H'.$a)->setValueExplicit($street1, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('I'.$a)->setValueExplicit($street2, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('J'.$a)->setValueExplicit($city, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('K'.$a)->setValueExplicit($state, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('L'.$a)->setValueExplicit($zip, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('M'.$a)->setValueExplicit($countryname, PHPExcel_Cell_DataType::TYPE_STRING);
			
			
			$objPHPExcel->setActiveSheetIndex(0)->getCell('N'.$a)->setValueExplicit($ebay_itemid, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('O'.$a)->setValueExplicit($sku, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('P'.$a)->setValueExplicit($labelstr, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('Q'.$a)->setValueExplicit($amount, PHPExcel_Cell_DataType::TYPE_STRING);
			
			$objPHPExcel->setActiveSheetIndex(0)->getCell('R'.$a)->setValueExplicit($ebay_itemprice, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('T'.$a)->setValueExplicit($ebay_shipfee, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('U'.$a)->setValueExplicit($InsuranceFee, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('V'.$a)->setValueExplicit($ebay_total, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('W'.$a)->setValueExplicit($PaymentMethodUsed, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('X'.$a)->setValueExplicit($ebay_createdtime, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('Z'.$a)->setValueExplicit($ebay_paidtime, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('AC'.$a)->setValueExplicit($ebay_paidtime, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('AE'.$a)->setValueExplicit('NO', PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('AF'.$a)->setValueExplicit($ebay_ptid, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('AG'.$a)->setValueExplicit($ebay_shiptype, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->setActiveSheetIndex(0)->getCell('AH'.$a)->setValueExplicit($ebay_tid, PHPExcel_Cell_DataType::TYPE_STRING);
			
			
			
			
			$a++;

		}

	

	



}

$objPHPExcel->getActiveSheet(0)->getStyle('A1:N500')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(15);	

$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(20);	

$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('C')->setWidth(20);	

$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('F')->setWidth(20);

$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('E')->setWidth(15);

$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('D')->setWidth(50);

$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('G')->setWidth(32);

$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('H')->setWidth(35);







/*

$objDrawing = new PHPExcel_Worksheet_Drawing();

$objDrawing->setName('PHPExcel logo');

$objDrawing->setDescription('PHPExcel logo');

$objDrawing->setPath('20110218091244858.jpg');

$objDrawing->setHeight(66);

$objDrawing->setCoordinates('D24');

$objDrawing->setOffsetX(10);

$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());





$objDrawing = new PHPExcel_Worksheet_Drawing();

$objDrawing->setName('PHPExcel logo');

$objDrawing->setDescription('PHPExcel logo');

$objDrawing->setPath('20110218091244858.jpg');

$objDrawing->setHeight(66);

$objDrawing->setCoordinates('D25');

$objDrawing->setOffsetX(10);

$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());





*/







$title		= "Files_eBayCSV".date('Y-m-d');

$titlename		= "Files_eBayCSV".date('Y-m-d').".xls";



$objPHPExcel->getActiveSheet()->setTitle($title);



$objPHPExcel->setActiveSheetIndex(0);





// Redirect output to a client��s web browser (Excel5)

header('Content-Type: application/vnd.ms-excel');

header("Content-Disposition: attachment;filename={$titlename}");

header('Cache-Control: max-age=0');



$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

$objWriter->save('php://output');

exit;





