<?php
if(!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE != 'true') exit();

if(!$modx->hasPermission('view_eventlog')) {
	$e->setError(3);
	$e->dumpError();
}

// Get table Names (alphabetical)
$tbl_event_log     = $modx->getFullTableName('event_log');
$tbl_manager_users = $modx->getFullTableName('manager_users');
$tbl_web_users     = $modx->getFullTableName('web_users');

// initialize page view state - the $_PAGE object
$modx->manager->initPageViewState();

// get and save search string
if($_REQUEST['op']=='reset') {
	$sqlQuery = $query = '';
	$_PAGE['vs']['search']='';
}
else {
	$sqlQuery = $query = isset($_REQUEST['search'])? $_REQUEST['search']:$_PAGE['vs']['search'];
	if(!is_numeric($sqlQuery)) $sqlQuery = $modx->db->escape($query);
	$_PAGE['vs']['search'] = $query;
}

// get & save listmode
$listmode = isset($_REQUEST['listmode']) ? $_REQUEST['listmode']:$_PAGE['vs']['lm'];
$_PAGE['vs']['lm'] = $listmode;

?>
<script>
  	function searchResource(){
		document.resource.op.value="srch";
		document.resource.submit();
	};

	function resetSearch(){
		document.resource.search.value = ''
		document.resource.op.value="reset";
		document.resource.submit();
	};

	function changeListMode(){
		var m = parseInt(document.resource.listmode.value) ? 1:0;
		if (m) document.resource.listmode.value=0;
		else document.resource.listmode.value=1;
		document.resource.submit();
	};
	
</script>
<form name="resource" method="post">
<input type="hidden" name="id" value="<?php echo $modx->html($id); ?>" />
<input type="hidden" name="listmode" value="<?php echo $modx->html($listmode); ?>" />
<input type="hidden" name="op" value="" />

<h1><?php echo $_lang['eventlog_viewer']?></h1>

<div class="sectionBody">
	<!-- load modules -->
	<p><?php echo $_lang['eventlog_msg']?></p>
	<div class="searchbar">
		<table border="0" style="width:100%">
			<tr>
			<td><a class="searchtoolbarbtn" href="index.php?a=116&cls=1"><img src="<?php echo $_style["icons_delete_document"]?>"  align="absmiddle" /> <?php echo $_lang['clear_log']?></a></td>
			<td nowrap="nowrap">
				<table border="0" style="float:right">
				    <tr>
				        <td><?php echo $_lang['search']?> </td><td><input class="searchtext" name="search" type="text" size="15" value="<?php echo $modx->html($query); ?>" /></td>
				        <td><a href="#" class="searchbutton" title="<?php echo $_lang['search']?>" onclick="searchResource();return false;"><?php echo $_lang['go']?></a></td>
				        <td><a href="#" class="searchbutton" title="<?php echo $_lang['reset']?>" onclick="resetSearch();return false;"><img src="media/style/<?php echo $manager_theme?>/images/icons/refresh.gif" width="16" height="16"/></a></td>
				        <td><a href="#" class="searchbutton" title="<?php echo $_lang['list_mode']?>" onclick="changeListMode();return false;"><img src="media/style/<?php echo $manager_theme?>/images/icons/table.gif" width="16" height="16"/></a></td>
				    </tr>
				</table>
			</td>
			</tr>
		</table>
	</div>
	<br />
	<div>
	<?php
	
	
	if($modx->hasPermission('delete_eventlog')){
		$actionCol = "<a href='index.php?a=116&id=[+id+]' title='".$_lang['delete']."'><img width='16' align='absmiddle' height='16' src='media/style/ClipperModern/images/icons/delete.png'></a>";
	}else{
		$actionCol = "<img width='16' align='absmiddle' height='16' src='media/style/ClipperModern/images/icons/delete.png' class='disabled-action'>";
	}
	

	$sql = "SELECT el.id, el.type, el.createdon, el.source, el.eventid,IFNULL(wu.username,mu.username) as 'username' " .
	       "FROM ".$tbl_event_log." el ".
	       "LEFT JOIN ".$tbl_manager_users." mu ON mu.id=el.user AND el.usertype=0 ".
	       "LEFT JOIN ".$tbl_web_users." wu ON wu.id=el.user AND el.usertype=1 ".
	       ($sqlQuery ? " WHERE ".(is_numeric($sqlQuery)?"(eventid='$sqlQuery') OR ":'')."(source LIKE '%$sqlQuery%') OR (description LIKE '%$sqlQuery%')":"")." ".
	       "ORDER BY createdon DESC";
	$ds = $modx->db->query($sql);
	include_once $base_path."manager/includes/controls/datagrid.class.php";
	$grd = new DataGrid('',$ds,$number_of_results); // set page size to 0 t show all items
	$grd->noRecordMsg = $_lang['no_records_found'];
	$grd->cssClass="grid";
	$grd->columnHeaderClass="gridHeader";
	$grd->itemClass="gridItem";
	$grd->altItemClass="gridAltItem";
	$grd->fields="type,source,createdon,eventid,username";
	$grd->columns=$_lang['type']." ,".$_lang['source']." ,".$_lang['date']." ,".$_lang['event_id']." ,".$_lang['sysinfo_userid'] .','. $_lang['actions'];
	$grd->colWidths="34,,250,61,62,100";
	$grd->colAligns="center,,left,left,left";
	$grd->colTypes = "template:<img src='media/style/" . $manager_theme ."/images/icons/event[+type+].png' width='16' height='16' />||template:<a href='index.php?a=115&id=[+id+]' title='".$_lang['click_to_view_details']."'>[+source+]</a>||date: " . $modx->toDateFormat(null, 'formatOnly') . ' %I:%M %p' . "||template:[+eventid+] ||template: [+username+] ||template: " . $actionCol;
	
	if($listmode=='1') $grd->pageSize=0;
	if($_REQUEST['op']=='reset') $grd->pageNumber = 1;
	// render grid
	echo $grd->render();
	?>
	</div>
</div>
</form>
