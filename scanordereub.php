﻿<?php
include "include/config.php";
	$value				= trim($_REQUEST['value']);
	$shiptype			= $_REQUEST['shiptype'];
	
	$shipping			= $_REQUEST['shipping'];
	$ebay_carrier		= $_REQUEST['ebay_carrier'];

	
	$weight				= substr($_REQUEST['weight'],7,9);
	
	$runstatusf			= '';

	
	if(strlen($value) >= 5 ){

		$ss						= "select ebay_ordersn,ebay_carrier,ismodifive from ebay_order where  ebay_tracknumber='$value'  ";
		$ss						= $dbcon->execute($ss);
		$ss						= $dbcon->getResultArray($ss);
		if(count($ss) == 0 ){
			$musicstatus='<embed src="music/fail.mp3" autostart="true" loop="0" hidden="true"></embed>';
		}else if(count($ss) == 1){
				$musicstatus='<embed src="music/chimes.wav" autostart="true" loop="0" hidden="true"></embed>';
				$runstatusf				= "2";
				$ebay_ordersn			= $ss[0]['ebay_ordersn'];
				$ebay_carriers			= $ss[0]['ebay_carrier'];
				$status = " -[<font color='#33CC33'>操作记录订单核对成功</font>]";	
				$vv		= "update ebay_order set ebay_status='2',scantime='$mctime',orderweight2='$weight' ";
				$vv		.= " where ebay_ordersn='$ebay_ordersn' ";
				$dbcon->execute($vv);
		}
		echo $musicstatus;
	}
	
	

 ?>
 
 <link rel="stylesheet" type="text/css" href="cache/themes/Sugar5/css/yui.css" />
<link rel="stylesheet" type="text/css" href="cache/themes/Sugar5/css/deprecated.css" />
<link rel="stylesheet" type="text/css" href="cache/themes/Sugar5/css/style.css" /> 

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
				  <td nowrap="nowrap" class='paginationActionButtons'><form action="orderloadcsv.php" enctype="multipart/form-data" method="post" >
				    <table width="90%" border="0" align="center">
				      <tr>
				        <td width="21%">订单号</td>
				        <td width="56%"><input name="order" type="text" id="order" onKeyDown="check01()"  style=" width:90%; font-size:55px; border:#CC0000 2px solid; height:60px; line-height:60px; font-weight:bold;" >&nbsp;</td>
			            <td width="23%"><input type="button" value="导出扫描结果" onclick="opens()" />
		                &nbsp;</td>
				      </tr>
				      <tr>
				        <td>&nbsp;</td>
				        <td>&nbsp;</td>
				        <td width="23%" rowspan="2"><span style="font-size:180px">
                      <?php
						$timestart		= date('Y-m-d').' '.'02:00:00';
						$timesend		= date('Y-m-d H:i:s',strtotime("$timestart +1 days"));
						$sql	= "select ebay_id from ebay_order as a where    a.ebay_user='$user'   and ( a.scantime >= ".strtotime($timestart)." and a.scantime <= ".strtotime($timesend).' )';
						
						$sql .= "  and ebay_carrier ='EUB' ";
						$sql	= $dbcon->execute($sql);
						$sql	= $dbcon->getResultArray($sql);
						echo count($sql);
?>   
                        
                        
                        
                        </span></td>
				      </tr>
				      <tr>
				        <td>重量</td>
				        <td><input name="weight" type="text" id="weight"  onKeyUp="return Edit1Change(this);" style=" width:90%; font-size:55px; border:#CC0000 2px solid; height:60px; line-height:60px; font-weight:bold;"  /></td>
			          </tr>
				      <tr>
				        <td colspan="3"><span style="font-size:80px">EUB</span>
                         
                         <div style="font-size:28px; color:#FF0000"></div>
                         </td>
			          </tr>
			        </table>
				  </form>
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

echo $runstatusf;




echo "1: 失败  2 是成功  扫描结果:".$runstatusf;

include "bottom.php";

?>
<script language="javascript">

function opens(){

	var url	= "scanorderbaobiao.php";
	window.open(url,'_blank');
	

}

	function check01(){
		
		var order	= document.getElementById('order').value;	
		
		var shiptype		= '';	
		
		var keyCode=(navigator.appName=="Netscape")?event.which:event.keyCode; 
		
		
		if (keyCode == 13) {
			
			
			document.getElementById('weight').focus();
			
				
		
		}
		
		
	}
	

	
	function check03(){
			
			var keyCode = event.keyCode;		
			var order	= document.getElementById('order').value;	
			var weight	= document.getElementById('weight').value;
			var keyCode=(navigator.appName=="Netscape")?event.which:event.keyCode; 
		
				if(order == ''){
				alert("订单号不能为空");
				document.getElementById('order').focus();
				return false;
				}
				location.href	= 'scanordereub.php?value='+order+"&weight="+weight+"&shipping=<?php echo $_REQUEST['shipping'];?>&ebay_carrier=<?php echo $_REQUEST['ebay_carrier'];?>";
						
	
	}
	
	
	function Edit1Change(obj)

{



var e=window.event;
//alert (e.keyCode1);

if( document.getElementById('weight').value.length >18) 
{ 
    
check03();

    
  }
  
 }


 
 
	 document.getElementById('order').select();	


</script>