﻿<?php
	include "../include/config.php";
	$value				= trim($_REQUEST['value']);
	
	
	$value    =str_replace('TB','',$value);
	
	
	if($allowauditorderstatus == '' || $allowauditorderstatus<=0 ) die('请先在系统管理，系统配置中，设置允许扫描的订单分类');
	
	if($value != ''){
	
	
	$ss					= "select ebay_id from ebay_order where ebay_id='$value' and ebay_user ='$user' and scantime<=0 and (ebay_status='$allowauditorderstatus' or ebay_status='508') ";
	
	if($allowauditorderstatus == '100') $ss					= "select * from ebay_order where ebay_id='$value' and ebay_user ='$user' and scantime<=0 ";
	
	
	$ss					= $dbcon->execute($ss);
	$ss					= $dbcon->getResultArray($ss);
	if(count($ss)  == '0'){
		
		$ss					= "select * from ebay_order where ebay_id='$value' and ebay_user ='$user' ";
		$ss					= $dbcon->execute($ss);
		$ss					= $dbcon->getResultArray($ss);
	
		$scantime			= $ss[0]['scantime'];
		if($scantime > 0 ){
		$status = "<font color='#FF0000'>订单编号:".$value."已经扫描了";
		}else{
		$status = " -[<font color='#FF0000'>操作记录:未找到订单</font>]";	
		}
		
		
	}else{
		
		
		if(count($ss) == 1){
			
			if($auditcompleteorderstatus > 0 ){
			$ss		= "update ebay_order set ebay_status='$auditcompleteorderstatus',scantime='$mctime' where   ebay_id='$value'  ";
			$dbcon->execute($ss);
			
			addoutorder($value);
			
			
			$notes				= '订单通过平邮扫描 扫描人是:'.$truename;
			addordernote($value,$notes);
			$status = " -[<font color='#33CC33'>操作记录订单核对成功</font>]";	
		
			}else{
			$status = " -[<font color='#FF0000'>操作记录:未设置核对成功后转入的状态</font>]";	
			}
			}else{
			$status = " -[<font color='#FF0000'>操作记录:未找到订单</font>]";	
		}
		
	}
	
	}
	

 ?>
<style type="text/css">
<!--
.STYLE1 {
	font-size: larger;
	font-weight: bold;
}
-->
</style>

<div id="main">
    <div id="content" >
        <table style="width:100%"><tr><td><div class='moduleTitle'>
<h2><?php echo "订单扫描".$status;?> </h2>
</div>

<div class='listViewBody'>
<div id='Accountsadvanced_searchSearchForm' style='display:none' class="edit view search advanced"></div>
<div id='Accountssaved_viewsSearchForm' style='display: none';></div>
</form>
 
<table cellpadding='0' cellspacing='0' width='100%' border='0' class='list view'>
	<tr class='pagination'>
		<td width="65%">
			<table border='0' cellpadding='0' cellspacing='0' width='100%' class='paginationTable'>
				<tr>
				  <td nowrap="nowrap" class='paginationActionButtons'>
				    <table width="71%" border="0" align="center">
				      <tr>
				        <td width="21%">订单号</td>
				        <td width="56%"><input name="order" type="text" id="order" onKeyDown="check01()" style="font-size:86px; width:500px ; height:90px "  >&nbsp;</td>
			            <td width="23%">:</td>
				      </tr>
				      
				      <tr>
				        <td colspan="3">&nbsp;</td>
			          </tr>
			        </table>
				  </td>
			    </tr>
			</table>		</td>
	</tr>
		

              
		<tr class='pagination'>
		<td>
			<table border='0' cellpadding='0' cellspacing='0' width='100%' class='paginationTable'>
				<tr>
					<td nowrap="nowrap" class='paginationActionButtons'></td>
					</tr>
			</table>		</td>
	</tr></table>


    <div class="clear"></div>
<?php

include "bottom.php";


?>
<script language="javascript">

	
	function check01(){
			
			var keyCode = event.keyCode;		
			var tracknumber		= '';
			
			var order	= document.getElementById('order').value;	
			var shiptype		= '';
			
			
			var keyCode=(navigator.appName=="Netscape")?event.which:event.keyCode; 
				
			if (keyCode == 13) {
			
				
				if(order == ''){
				
				alert("订单号不能为空");
				document.getElementById('order').focus();
				return false;
				}
				location.href	= 'scanorder_02.php?value='+order+"&shiptype="+shiptype+"&tracknumber="+tracknumber+"&module=orders";
						
		
			}
		
			
			
	
	
	
	}
	
	
	

	
	 document.getElementById('order').select();	


</script>