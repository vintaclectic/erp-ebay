﻿<?php
@session_start();
$_SESSION['user']	= 'ccc';


include "include/config.php";	

$dbcon	= new DBClass();

	$vv				= "select distinct user  from ebay_user where user ='vipnick' or user ='guangpai' or user ='vipchi' or user ='viperp' or user ='shine_2012' or user ='vipcz' or user ='vip492' or user ='vipsui' or user ='vipking' ";
	
//$vv				= "select distinct user  from ebay_user where user = 'silent'";
	$vv				= $dbcon->execute($vv);
	$vv				= $dbcon->getResultArray($vv);
	
	for($j=0;$j<count($vv);$j++){
		$user				= $vv[$j]['user'];
		$_SESSION['user']	= $user;
		
		$ss			= "select ebay_account,ebay_id,ebay_ordersn,ebay_tracknumber,ebay_carrier,ebay_combine from ebay_order where ebay_user='$user' and ( ShippedTime ='' or ShippedTime is null )  and  ebay_status='2' and recordnumber > 0 and (ebay_carrier != 'EUB' or ebay_carrier is null) order by ebay_id desc  limit 300";
		
		

	
	$sql	= $dbcon->execute($ss);
	$sql	= $dbcon->getResultArray($sql);
	
	

	echo 'Total = '.count($sql);
	for($i=0;$i<count($sql);$i++){
		
		$account					= $sql[$i]['ebay_account'];
		$ebay_id					= $sql[$i]['ebay_id'];
		$ordersn    				= $sql[$i]['ebay_ordersn'];	
		$ebay_tracknumber			= $sql[$i]['ebay_tracknumber'];
		$ebay_carrier				= $sql[$i]['ebay_carrier'];
		$corder						= $sql[$i]['ebay_combine'];			
		$corder						= explode('#',$corder);			
		

		
			
			
		$type		 = 0;
		$ss 		 = "select ebay_token from ebay_account where ebay_user='$user' and ebay_account='$account'";
		$ss			 = $dbcon->execute($ss);
		$ss			 = $dbcon->getResultArray($ss);
		$token		 = $ss[0]['ebay_token'];
		
		
		/* 取得评介内容 */
			$vvs			 = "select * from ebay_config where ebay_user ='$user' ";
			$vvs			 = $dbcon->execute($vvs);
			$vvs			 = $dbcon->getResultArray($vvs);
			
			$feedbackstring		= $vvs[0]['feedbackstring'];
			$feedbackstring     = explode('&&',$feedbackstring);
			
			
			$feedbackstring		= $feedbackstring[rand(0,count($feedbackstring) - 1 )];

			
			if($feedbackstring == '' ) $feedbackstring = 'Good Buyer ';
			
			
			
		
		CompleteSale($token,$ordersn,$type,$feedbackstring,$ebay_tracknumber,$ebay_carrier);
		
		
		for($p=0;$p<count($corder);$p++){
			
		
				if($corder[$p] != "" && $corder[$p] != "0"){
					
					
					echo '<br>************************************<br>';
					
					$sn			= $corder[$p];
					$sq			= "select ebay_account,ebay_ordersn from ebay_order where ebay_id='$sn'";
					$sq			= $dbcon->execute($sq);
					$sq			= $dbcon->getResultArray($sq);
					$account	= $sq[0]['ebay_account'];		
					$osn		= $sq[0]['ebay_ordersn'];
					$ff 		 = "select ebay_token from ebay_account where ebay_user='$user' and ebay_account='$account'";
					$ff			 = $dbcon->execute($ff);
					$ff		 	= $dbcon->getResultArray($ff);
					$token		 = $ff[0]['ebay_token'];
					CompleteSale($token,$osn,$type,$feedbackstring,$ebay_tracknumber,$ebay_carrier);
			
				}
			
			}
		}
		

		
	
	}
		


	
	
?>
