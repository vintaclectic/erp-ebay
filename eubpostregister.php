<?php
include "include/config.php";


include "top.php";
	
	
	$id	 = $_REQUEST['id'];
	

	
	if($_POST['submit']){
		
		$kg				= $_POST['kg'];
		$handlefee		= $_POST['handlefee'];
		$discount		= $_POST['discount'];
		
		$sql = "update ebay_carrier set handlefee ='$handlefee',kg='$kg',discount='$discount' where id=$id";

		
		if($dbcon->execute($sql)){
			
			$status	= " -[<font color='#33CC33'>操作记录: 记录删除成功</font>]";
			
		}else{
		
			$status = " -[<font color='#FF0000'>操作记录: 记录删除失败</font>]";
		}
		
	
	
	}
	
	
	$ss		= "select * from ebay_carrier where id=$id";
	$ss		= $dbcon->execute($ss);
	$ss		= $dbcon->getResultArray($ss);
	
	$kg		= $ss[0]['kg'];
	$handlefee		= $ss[0]['handlefee'];
	$discount		= $ss[0]['discount'];
		


	
 ?>
<div id="main">
    <div id="content" >
        <table style="width:100%"><tr><td><div class='moduleTitle'>
<h2><?php echo $_REQUEST['action'].$status;?> </h2>
</div>

<div class='listViewBody'>


<div id='Accountsbasic_searchSearchForm' style='' class="edit view search basic">
     <form name="dd" action="eubpostregister.php?id=<?php echo $_REQUEST['id'];?>&module=system&action=发货方式管理" method="post">

 
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
	
	
		
	<td nowrap="nowrap" scope="row" >
    
    <table width="60%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>50g以内</td>
        <td><input name="kg" type="text" id="kg" value="<?php echo $kg;?>" /></td>
      </tr>
      <tr>
        <td> 50g以上，每kg： </td>
        <td><input name="handlefee" type="text" id="handlefee" value="<?php echo $handlefee;?>" />
          &nbsp;</td>
      </tr>
      
      
      <tr>
        <td>折扣</td>
        <td><input name="discount" type="text" id="discount" value="<?php echo $discount;?>" />
          <input name="submit" type="submit"  value="保存" /></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
    </table>	   
	  <br /></td>
	</tr>
</table>

</form>
</div>
<div id='Accountsadvanced_searchSearchForm' style='display:none' class="edit view search advanced"></div>
<div id='Accountssaved_viewsSearchForm' style='display: none';></div>
</form>
<div class="clear"></div>
<?php

include "bottom.php";


?>
<script language="javascript">
	
	function del(id){
		if(confirm('您确认删除此条记录吗')){
			
			location.href = 'systemcarrier.php?type=del&id='+id+"&module=system&action=发货方式管理";
			
		
		}
	
	
	}



</script>