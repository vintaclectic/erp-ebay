<?php
include "include/config.php";



?>
<div id="main">
	<div id="content">
		<table style="width: 100%">
			<tr>
				<td><div class='moduleTitle'>
						<h2><?php echo $_REQUEST['action'].$status;?> </h2>
					</div>

					<div class='listViewBody'>
						<div id='Accountsadvanced_searchSearchForm' style='display: none'
							class="edit view search advanced"></div>
						<div id='Accountssaved_viewsSearchForm' style='display: none';></div>
						</form>

						<table cellpadding='0' cellspacing='0' width='100%' border='0'
							class='list view'>
							<tr class='pagination'>
								<td width="65%">
									<table border='0' cellpadding='0' cellspacing='0' width='100%'
										class='paginationTable'>
										<tr>
											<td nowrap="nowrap" class='paginationActionButtons'><form
													action="orderregistersave.php"
													enctype="multipart/form-data" method="post" target="_blank">
													<table border="0" cellpadding="10" cellspacing="1"
														bgcolor="#c0ccdd" id="content">
														<tr>
															<td>上传文件:</td>
															<td><input name="upfile" type="file" class="button"
																style="height: 22px;" size=35 />&nbsp;</td>
															<td><input name="提交" type="submit" class="button"
																value="更新" onclick="return checkupdate()" /></td>
														</tr>
													</table>

												</form>
												<p>
													<br /> 挂号条码批量上传导入模板下载:<a href="barcodeimportt.xls" target="_blank">下载</a><br />
												</p>
												<p>&nbsp;</p>
												<p>
													<br />
												</p></td>
										</tr>
									</table>
								</td>
							</tr>



							<tr class='pagination'>
								<td>
									<table border='0' cellpadding='0' cellspacing='0' width='100%'
										class='paginationTable'>
										<tr>
											<td nowrap="nowrap" class='paginationActionButtons'></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>


						<div class="clear"></div>
<?php
include "bottom.php";
?>
