<?php
include "include/config.php";


include "top.php";


    $cpower	= explode(",",$_SESSION['power']);
	$type	= $_REQUEST['type'];
	if($type == "del"){
		
		$id	 = $_REQUEST['id'];
		$sql = "delete from  ebay_storetype where id=$id";
	if($dbcon->execute($sql)){
			
			$status	= " -[<font color='#33CC33'>操作记录: 记录删除成功</font>]";
			
		}else{
		
			$status = " -[<font color='#FF0000'>操作记录: 记录删除失败</font>]";
		}
		
		
		
	
	}else{
		
		$status = "";
		
	}
	
 ?>
<div id="main">
    <div id="content" >
        <table style="width:100%"><tr><td><div class='moduleTitle'>
<h2><?php echo $_REQUEST['action'].$status;?> </h2>
</div>

<div class='listViewBody'>


<div id='Accountsbasic_searchSearchForm' style='' class="edit view search basic">
 
 
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
	
	
		
	<td nowrap="nowrap" scope="row" >
<?php if(in_array("s_io_add",$cpower)){?>	<input tabindex='2' class='button' type="button" name='button' value='添加出入库类型' id='search_form_submit' onClick="location.href='productwarehousetypeadd.php?module=warehouse&action= 出入库类型'"/><?php }?>
	&nbsp;</td>
	</tr>
</table>
</div>
<div id='Accountsadvanced_searchSearchForm' style='display:none' class="edit view search advanced"></div>
<div id='Accountssaved_viewsSearchForm' style='display: none';></div>
</form>
 
<table cellpadding='0' cellspacing='0' width='100%' border='0' class='list view'>
	<tr class='pagination'>
		<td colspan='6'>&nbsp;			</td>
	</tr><tr height='20'>
					<th scope='col' nowrap="nowrap">
				<div style='white-space: nowrap;'width='100%' align='left'>编号</div>			</th>
			
					<th scope='col' nowrap="nowrap">
				<div style='white-space: nowrap;'width='100%' align='left'>编码</div>			</th>
			
					<th scope='col' nowrap="nowrap">名称</th>
					<th scope='col' nowrap="nowrap">出入库类型</th>
					<th scope='col' nowrap="nowrap">是否为默认类型</th>
					<th scope='col'  nowrap="nowrap">操作</th>
	</tr>
		
   <?php 
				  
				  	$sql = "select * from  ebay_storetype where ebay_user='$user'";									
					$sql = $dbcon->execute($sql);
					$sql = $dbcon->getResultArray($sql);
				  
					for($i=0;$i<count($sql);$i++){
						
						$id					= $sql[$i]['id'];
						$ebay_storesn			= $sql[$i]['ebay_storesn'];				
						$ebay_storename			= $sql[$i]['ebay_storename'];								
						$ebay_storetype			= $sql[$i]['ebay_storetype']?"出库类型":"入库类型";
						$warehousetype			= $sql[$i]['warehousetype']?"是":"否";
						
						
				  ?>
                  
                  
                  
		    
 
					<tr height='20' class='oddListRowS1'>
						    <td scope='row' align='left' valign="top" ><?php echo $id; ?></td>				
						    <td scope='row' align='left' valign="top" ><?php echo $ebay_storesn;?>&nbsp;</td>				
						    <td scope='row' align='left' valign="top" ><?php echo $ebay_storename;?>&nbsp;</td>
						    <td scope='row' align='left' valign="top" ><?php echo $ebay_storetype;?>&nbsp;</td>
						    <td scope='row' align='left' valign="top" ><?php echo $warehousetype;?>&nbsp;</td>
						    <td scope='row' align='left' valign="top" ><?php if(in_array("s_io_modify",$cpower)) {?><a href="productwarehousetypeadd.php?storeid=<?php echo $id; ?>&module=warehouse&action=出入库类型">修改</a><?php }?> <?php if(in_array("s_io_delete",$cpower)) {?><a href="#" onClick="del(<?php echo $id; ?>)">删除</a><?php }?>&nbsp;</td>
			 		</tr>
              
              
              
              <?php
			  
			  
			  }
			  ?>
              
		<tr class='pagination'>
		<td colspan='6'>
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
	
	function del(id){
		if(confirm('您确认删除此条记录吗')){
			
			location.href = 'productwarehousetype.php?type=del&id='+id+"&module=warehouse&action=货品类别管理";
			
		
		}
	
	
	}



</script>