<?php
include "include/dbconnect.php";	
$dbcon	= new DBClass();
//error_reporting(0);
@session_start();
$user	= $_SESSION['user'];
require_once 'Classes/PHPExcel.php';

$country['Russian Federation']		=   '俄罗斯联邦';
	$country['Afghanistan']				=   '阿富汗';
	$country['Albania']					= 	'阿尔巴尼亚';
	$country['Algeria']					=	'阿尔及利亚';
	$country['American Samoa']			=	'美属萨摩亚';
	$country['Andorra']					=	'安道尔共和国';
	$country['Angola']					=	'安哥拉';
	$country['Anguilla']				=	'安圭拉';
	$country['Antigua and Barbuda']		=	'安提瓜和巴布达';
	$country['Argentina']				=	'阿根廷';
	$country['Armenia']					=	'亚美尼亚';
	$country['Aruba']					=	'阿鲁巴岛';
	$country['Australia']				=	'澳大利亚';
	$country['Austria']					=	'奥地利';
	$country['Azerbaijan Republic']		=	'阿塞拜疆共和国';
	$country['Bahamas']					=	'巴哈马';
	$country['Bahrain']					=	'巴林';
	$country['Bangladesh']				=	'孟加拉';
	$country['Barbados']				=	'巴巴多斯';
	$country['Belarus']					=	'白俄罗斯';
	$country['Belgium']					=	'比利时';
	$country['Belize']					=	'伯利兹';
	$country['Benin']					=	'贝宁';
	$country['Bermuda']					=	'百慕大群岛';
	$country['Bhutan']					=	'不丹';
	$country['Bolivia']					=	'玻利维亚';
	$country['Botsnia and Herzegovina']	=	'波斯尼亚和黑塞哥维那';
	$country['Botswana']				=	'博茨瓦纳';
	$country['Brazil']					=	'巴西';
	$country['British Virgin Islands']	=	'英属维京群岛';
	$country['Bruneui Darussalam']		=	'文莱达鲁萨兰';
	$country['Bulgaria']				=	'保加利亚';
	$country['Burkina Faso']			=	'布基纳法索';
	$country['Burma']					=	'缅甸';
	$country['Burundi']					=	'布隆迪';
	$country['Cambodia']				=	'柬埔寨';
	$country['Cameroon']				=	'喀麦隆';
	$country['Canada']					=	'加拿大';
	$country['Cape Verde Islands']		=	'佛得角群岛';
	$country['Cayman Islands']			=	'开曼群岛';
	$country['Central African Republic']			=	'中非共和国';
	$country['Chad']					=	'乍得';
	$country['Chile']					=	'智利';
	$country['China']					=	'中国';
	$country['Colombia']				=	'哥伦比亚';
	$country['Comoros']					=	'科摩罗';
	$country['Congo, Democratic Republic of the']			=	'刚果民主共和国';
	$country['Congo, Republic of the']	=	'刚果共和国';
	$country['Cook Islands']			=	'库克群岛';
	$country['Costa Rica']				=	'哥斯达黎加';
	$country['Cote d Ivoire(Ivory Coast)']					=	'象牙海岸共和国';
	$country['Croatia, Republic of']	=	'克罗地亚';
	$country['Cyprus']					=	'塞浦路斯';
	$country['Czech Republic']			=	'捷克共和国';
	$country['Denmark']					=	'丹麦';
	$country['Djibouti']				=	'吉布提';
	$country['Dominica']				=	'多米尼加';
	$country['Dominican Republic']		=	'多米尼加共和国';
	$country['Ecuador']					=	'厄瓜多尔';
	$country['Egypt']					=	'埃及';
	$country['El Salvador']				=	'萨尔瓦多';
	$country['Equatorial Guinea	']		=	'赤道几内亚';
	$country['Eritrea']					=	'厄立特里亚';
	$country['Ethiopia']				=	'埃塞俄比亚';
	$country['Falkland Islands(Islas Malvinas)']			=	'福克兰群岛(马尔维纳斯群岛)';
	$country['Fiji']					=	'斐济';
	$country['Finland']					=	'芬兰';
	$country['France']					=	'法国';
	$country['French Guiana	']			=	'法属圭亚那';
	$country['Gambia']					=	'冈比亚';
	$country['Georgia']					=	'格鲁吉亚';
	$country['Germany']					=	'德国';
	$country['Ghana']					=	'加纳';
	$country['Gibraltar']				=	'直布罗陀';
	$country['Greece']					=	'希腊';
	$country['Greenland']				=	'格陵兰';
	$country['Grenada']					=	'格林纳达';
	$country['Guadeloupe']				=	'瓜德罗普';
	$country['Guam']					=	'关岛';
	$country['Guatemala']				=	'危地马拉';
	$country['Guernsey']				=	'根西岛';
	$country['Guinea']					=	'几内亚';
	$country['Guinea-Bissau']			=	'几内亚比绍共和国';
	$country['Guyana']					=	'圭亚那';
	$country['Haiti']					=	'海地';
	$country['Honduras']				=	'洪都拉斯';
	$country['Hong Kong	']				=	'中国香港';
	$country['Hungary']					=	'匈牙利';
	$country['Iceland']					=	'冰岛';
	$country['India']					=	'印度';
	$country['Indonesia	']				=	'印度尼西亚';
	$country['Ireland']					=	'爱尔兰';
	$country['Israel']					=	'以色列';
	$country['Italy']					=	'意大利';
	$country['Jamaica']					=	'牙买加';
	$country['Jan Mayen']				=	'扬马延岛';
	$country['Japan']					=	'日本';
	$country['Jersey']					=	'泽西岛';
	$country['Jordan']					=	'约旦';
	$country['Kazakhstan']				=	'哈萨克斯坦';
	$country['Kenya']					=	'肯尼亚';
	$country['Kiribati']				=	'基里巴斯';
	$country['Korea, South']			=	'韩国';
	$country['Kuwait']					=	'科威特';
	$country['Kyrgyzstan']				=	'吉尔吉斯斯坦';
	$country['Laos']					=	'老挝';
	$country['Latvia']					=	'拉脱维亚';
	$country['Lebanon']					=	'黎巴嫩';
	$country['Liechtenstein']			=	'列支敦士登';
	$country['Lithuania']				=	'立陶宛';
	$country['Luxembourg']				=	'卢森堡';
	$country['Macau']					=	'中国澳门';
	$country['Macedonia']				=	'马其顿';
	$country['Madagascar']				=	'马达加斯加';
	$country['Malawi']					=	'马拉维';
	$country['Malaysia']				=	'马来西亚';
	$country['Maldives']				=	'马尔代夫';
	$country['Mali']					=	'马里';
	$country['Malta']					=	'马耳他';
	$country['Marshall Islands']		=	'马绍尔群岛';
	$country['Martinique']				=	'马提尼克';
	$country['Mauritania']				=	'毛利塔尼亚';
	$country['Mauritius']				=	'毛里求斯';
	$country['Mayotte']					=	'马约特';
	$country['Mexico']					=	'墨西哥';
	$country['Micronesia']				=	'密克罗尼西亚';
	$country['Moldova']					=	'摩尔多瓦';
	$country['Monaco']					=	'摩纳哥';
	$country['Mongolia']				=	'蒙古';
	$country['Montenegro']				=	'门的内哥罗';
	$country['Montserrat']				=	'蒙特塞拉特';
	$country['Morocco']					=	'摩洛哥';
	$country['Mozambique']				=	'莫桑比克';
	$country['Namibia']					=	'纳米比亚';
	$country['Nauru']					=	'瑙鲁';
	$country['Nepal']					=	'尼泊尔';
	$country['Netherlands']				=	'荷兰';
	$country['Netherlands Antilles']	=	'荷属安的列斯群岛';
	$country['New Caledonia']			=	'新喀里多尼亚';
	$country['New Zealand']				=	'新西兰';
	$country['Nicaragua']				=	'尼加拉瓜';
	$country['Niger']					=	'尼日尔';
	$country['Nigeria']					=	'尼日利亚';
	$country['Niue']					=	'纽埃';
	$country['Norway']					=	'挪威';
	$country['Oman']					=	'阿曼';
	$country['Pakistan']				=	'巴基斯坦';
	$country['Palau']					=	'帕劳';
	$country['Panama']					=	'巴拿马';
	$country['Papua New Guinea']		=	'巴布亚新几内亚';
	$country['Paraguay']				=	'巴拉圭';
	$country['Peru']					=	'秘鲁';
	$country['Philippines']				=	'菲律宾共和国';
	$country['Poland']					=	'波兰';
	$country['Portugal']				=	'葡萄牙';
	$country['Puerto Rico']				=	'波多黎各';
	$country['Qatar']					=	'卡塔尔';
	$country['Romania']					=	'罗马尼亚';
	$country['Rwanda']					=	'卢旺达';
	$country['Saint Helena']			=	'圣赫勒拿';
	$country['Saint Kitts-Nevis']		=	'圣克里斯多福尼维斯';
	$country['Saint Lucia']				=	'圣卢西亚';
	$country['Saint Pierre and Miquelon']			=	'圣皮埃尔和密克隆';
	$country['Saint Vincent and the Grenadines']			=	'圣文森特和格林纳丁斯';
	$country['San Marino']				=	'圣马力诺';
	$country['Saudi Arabia']			=	'沙特阿拉伯';
	$country['Senegal']					=	'塞内加尔';
	$country['Serbia']					=	'塞尔维亚';
	$country['Seychelles']				=	'塞舌尔';
	$country['Sierra Leone']			=	'塞拉利昂';
	$country['Singapore']				=	'新加坡';
	$country['Slovakia']				=	'斯洛伐克';
	$country['Slovenia']				=	'斯洛文尼亚';
	$country['Solomon Islands']			=	'所罗门岛';
	$country['Somalia']					=	'索马里';
	$country['South Africa']			=	'南非';
	$country['Spain']					=	'西班牙';
	$country['Sri Lanka']				=	'斯里兰卡';
	$country['Suriname']				=	'苏里南';
	$country['Svalbard']				=	'斯瓦尔巴';
	$country['Swaziland	']				=	'斯威士兰';
	$country['Sweden']					=	'瑞典';
	$country['Switzerland']				=	'瑞士';
	$country['Syria']					=	'叙利亚共和国';
	$country['Tahiti']					=	'塔希提岛';
	$country['Taiwan']					=	'中国台湾';
	$country['Tajikistan']				=	'塔吉克斯坦';
	$country['Tanzania']				=	'坦桑尼亚';
	$country['Thailand']				=	'泰国';
	$country['Togo']					=	'多哥';
	$country['Trinidad and Tobago']		=	'特立尼达和多巴哥';
	$country['Tunisia']					=	'突尼斯';
	$country['Turkey']					=	'土耳其';
	$country['Turkmenistan']			=	'土库曼斯坦';
	$country['Turks and Caicos Islands']=	'特克斯和凯科斯群岛';
	$country['Tuvalu']					=	'图瓦卢';
	$country['Uganda']					=	'乌干达';
	$country['Ukraine']					=	'乌克兰';
	$country['United Arab Emirates']	=	'阿拉伯联合酋长国';
	$country['United Kingdom']			=	'英国';
	$country['United States']			=	'美国';
	$country['US']						=	'美国';
	$country['Uruguay']					=	'乌拉圭';
	$country['Uzbekistan']				=	'乌兹别克斯坦';
	$country['Vanuatu']					=	'瓦努阿图';
	$country['Vatican City State']		=	'梵蒂冈';
	$country['Venezuela']				=	'委内瑞拉';
	$country['Vietnam']					=	'越南';
	$country['Virgin Islands(U.S.)']	=	'美属维尔京群岛';
	$country['Wallis and Futuna']		=	'瓦利斯和富图纳';
	$country['Western Sahara']			=	'西撒哈拉';
	$country['Western Samoa']			=	'西萨摩亚';
	$country['Yemen']					=	'也门';
	$country['Zambia']					=	'赞比亚';
	
$objPHPExcel = new PHPExcel();


$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

	$a		= 2;
	$b		= 2;
	$c		= 1;
	$d		= 1;
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', '序号');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'ebay id');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', '货物名称');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'custom label');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', '数量');	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', '备注');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', '运单号');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', '收货人地址');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', '打印地址');




	function getmerge($ordersn){
		
		global $dbcon;
	
		
	
		$sql	= "select * from ebay_orderdetail where ebay_ordersn='$ordersn' ";
		$sql	= $dbcon->execute($sql);
		$sql	= $dbcon->getResultArray($sql);

		
		
		
				$count		= 0;
		$skuarray	= array();
		$tj			= "";
		
		for($i=0;$i<count($sql);$i++){			
			
			$sku	= $sql[$i]['sku'];
			$count	+= $sql[$i]['ebay_amount'];
			$tj		= $sku;
			
				
			
		}
			
	
		return $tj;
	
		
	}

		function getcount($ordersn){
		
		global $dbcon;
		
		$sql	= "select * from ebay_orderdetail where ebay_ordersn='$ordersn'";
		$sql	= $dbcon->execute($sql);
		$sql	= $dbcon->getResultArray($sql);		
				$count		= 0;
		$skuarray	= array();
		$tj			= "";
		
		for($i=0;$i<count($sql);$i++){			
				
			$sku	= $sql[$i]['sku'];
			$count	+= $sql[$i]['ebay_amount'];
			$tj		= $sku."*".$count;	
			
		}
	
		return $count;
		
		
	}
	
	
	
	$ertj		= "";
	$orders		= explode(",",$_REQUEST['ordersn']);
	for($g=0;$g<count($orders);$g++){
		$sn 	=  $orders[$g];
		if($sn != ""){
				
					$ertj	.= " ebay_ordersn='$sn' or";
		}
			
	}
	$ertj			 = substr($ertj,0,strlen($ertj)-3);
	$sql	= "select * from ebay_order where ($ertj) and ebay_user='$user'";	


	
	$sql	= $dbcon->execute($sql);
	$sql	= $dbcon->getResultArray($sql);
	
	
	for($i=0;$i<count($sql);$i++){

			$ordersn		= $sql[$i]['ebay_ordersn'];	
			$aa			= 'A'.$a;
			$bb			= 'B'.$a;
			$cc			= 'C'.$a;
			$dd			= 'D'.$a;
			$ee			= 'E'.$a;
			$ff			= 'F'.$a;
			$gg			= 'G'.$a;
			$hh			= 'H'.$a;
			$ii			= 'I'.$a;
			$jj			= 'J'.$a;

	
			$ebayaccount	= $sql[$i]['ebay_account'];
			$ebay_usermail	= $sql[$i]['ebay_usermail'];
			$userid			= $sql[$i]['ebay_userid'];
			$name			= $sql[$i]['ebay_username'];
			$street1		= @$sql[$i]['ebay_street'];
			$street2 		= @$sql[$i]['ebay_street1'];
			$city 			= $sql[$i]['ebay_city'];
			$state			= $sql[$i]['ebay_state'];
			$countryname 	= $sql[$i]['ebay_countryname'];
			$zip0			= $sql[$i]['ebay_postcode'];
			$ebay_tracknumber			= $sql[$i]['ebay_tracknumber'];
			$ebay_noteb					= $sql[$i]['ebay_noteb'];
			$ebay_carrier					= $sql[$i]['ebay_carrier'];
			
			$zip			= "";
			if($countryname=='United States'){
			
			$zip			= $zip0;
			$objPHPExcel->setActiveSheetIndex(0)->getStyle($jj)->getNumberFormat()->setFormatCode('00000');
	
			}else{
			
			$zip			= " ".$zip0;
			}
		
			$tel			= $sql[$i]['ebay_phone'];
			$recordnumber   = $sql[$i]['recordnumber'];
			$is_reg		   = $sql[$i]['is_reg'];
			
			if($tel =="") $tel = "";
			if($tel =="Invalid Request") $tel = "";
			
		
	
			 $ebay_note 			= $sql[$i]['ebay_note'];
		

	
			
			
			
			$sq		= "select * from ebay_orderdetail where ebay_ordersn='$ordersn'";
			$sq		= $dbcon->execute($sq);
			$sq		= $dbcon->getResultArray($sq);
			$quantity	= 0;
			$sku		= "";
			
			for($t=0;$t<count($sq);$t++){
			
				$itemtitle		= $sq[$t]['ebay_itemtitle'];
				$sku			= $sq[$t]['sku'];
				
				$itemcount		= $sq[$t]['ebay_amount'];
				if($itemcount  == "1"){
				$itemtitle	= $itemtitle ;
				$sku	= $sku ;
				
				}else{
				
				$itemtitle	= $itemtitle ;
				$sku	= $sku ;
				
				}
				$quantity	+= $itemcount;
				
				
				
				if($city != ""){
				$addressline	= $name.chr(10).$street1." ".$street2.chr(10).$city.", ".$state.' '.$zip.chr(10).$countryname;
			
			
				}else{
				$addressline	= $name.chr(10).$street1." ".$street2.chr(10).", ".$state.' '.$zip.chr(10).$countryname;
		
				
				}
				$addressline	= str_replace("&acute;","'",$addressline);
		
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($aa, $i+1);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($bb, $userid);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cc, $itemtitle);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($dd, $sku);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($ee, $quantity);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($ff, '');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($gg, '');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($hh, $addressline);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($ii, $addressline);
			
				
				$a		= $a+1;
		
		
		
				
			}
					
			
			//	$addressline	= $name.chr(10).$street1." ".$street2.chr(10).$city.", ".$state.chr(10).$zip.chr(10).$countryname."          $merge ";
			
			
		
		
		
		

		

	
	
	}
	
	
	$objPHPExcel->getActiveSheet(0)->getStyle('A1:A500')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel->getActiveSheet(0)->getStyle('B1:B500')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel->getActiveSheet(0)->getStyle('C1:C500')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel->getActiveSheet(0)->getStyle('D1:D500')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel->getActiveSheet(0)->getStyle('E1:E500')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel->getActiveSheet(0)->getStyle('F1:F500')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel->getActiveSheet(0)->getStyle('G1:G500')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel->getActiveSheet(0)->getStyle('H1:H500')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel->getActiveSheet(0)->getStyle('I1:I500')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet(0)->getStyle('J1:J500')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(5);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('C')->setWidth(30);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('E')->setWidth(5);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('F')->setWidth(20);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('H')->setWidth(30);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('I')->setWidth(30);

	$objPHPExcel->getActiveSheet(0)->getStyle('H1:H500')->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet(0)->getStyle('I1:I500')->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet(0)->getStyle('C1:C500')->getAlignment()->setWrapText(true);

	$title		= "Pack list".date('Y-m-d');
	$titlename		= "Pack list".date('Y-m-d').".xls";
	
	$objPHPExcel->getActiveSheet()->setTitle($title);
	
	
	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);
	
	
	// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header("Content-Disposition: attachment;filename={$titlename}");
	header('Cache-Control: max-age=0');
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;

?>
