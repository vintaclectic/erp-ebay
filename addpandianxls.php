<?php
include "include/config.php";


include "top.php";
	
 ?>
<div id="main">
    <div id="content" >
        <table style="width:100%"><tr><td><div class='moduleTitle'>
<h2><?php echo $_REQUEST['action'].$status;?> </h2>
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
					<td nowrap="nowrap" class='paginationActionButtons'><form action="addpandianxlssave.php" enctype="multipart/form-data" method="post">
<table border="0"  cellpadding="3" cellspacing="1" bgcolor="#c0ccdd" id="content">
<tr>
	<td>盘点仓库:		
	</td>
	<td>
	<select name="store_id" id="store_id">
				<option value="">Please select</option>
				<?php 
							
							$sql = "select id,store_name from  ebay_store where ebay_user='$user'";									
							$sql = $dbcon->execute($sql);
							$sql = $dbcon->getResultArray($sql);
				
							for($i=0;$i<count($sql);$i++){
						
								$id					= $sql[$i]['id'];
								$store_name			= $sql[$i]['store_name'];	
						
							
							?>
			<option value="<?php echo $id;?>"><?php echo $store_name; ?></option>
				<?php
							}
							
							
							?>
			</select>
	</td>
	<td>&nbsp;</td>
</tr>
  <tr>
	
    <td>上传文件:</td>
    <td><input name="upfile" type="file" class="button" style="height:22px;"   size=35/>&nbsp;</td>
    <td><input name="提交" type="submit" class="button" value="更新" onclick="return checkupdate()" />
    &nbsp;</td>
  </tr>
</table>
<br />
<br />
A1:货品编号<br />
B1:实盘数量<br />
<br />
<br />
<br />
                    </form></td>
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
<script>
	function checkupdate(){
		
		var store_id	= document.getElementById('store_id').value;	
		if(store_id == ''){
			
			alert('请选择盘点仓库');
			return false;
		
		}
	}
</script>