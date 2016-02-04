<?php

/**
 * A utility class for presenting a provided array as a table view.  Includes
 * support for pagination, sorting by any column, providing optional header arrays,
 * providing classes for styling the table, rows, and cells (including alternate
 * row styling), as well as adding form controls to each row.
 * 
 * @author Jason Coward <jason@opengeek.com> (MODx)
 */
class MakeTable {
	var $actionField;
	var $cellAction;
	var $linkAction;
	var $tableWidth;
	var $tableClass;
	var $tableID;
	var $thClass;
	var $rowHeaderClass;
	var $columnHeaderClass;
	var $rowRegularClass;
	var $rowAlternateClass;
	var $formName;
	var $formAction;
	var $formElementType;
	var $formElementName;
	var $rowAlternatingScheme;
	var $excludeFields;
	var $allOption;
	var $pageNav;
	var $columnWidths;
	var $selectedValues;
	
	function __construct() {
		$this->fieldHeaders= array();
		$this->excludeFields= array();
		$this->actionField= '';
		$this->cellAction= '';
		$this->linkAction= '';
		$this->tableWidth= '';
		$this->tableClass= '';
		$this->rowHeaderClass= '';
		$this->columnHeaderClass= '';
		$this->rowRegularClass= '';
		$this->rowAlternateClass= 'alt';
		$this->formName= 'tableForm';
		$this->formAction= '[~[*id*]~]';
		$this->formElementName= '';
		$this->formElementType= '';
		$this->rowAlternatingScheme= 'EVEN';
		$this->allOption= 0;
		$this->selectedValues= array();
		$this->extra= '';
	}
	
	/**
	 * Sets the default link href for all cells in the table.
	 * 
	 * @param $value A URL to execute when table cells are clicked.
	 */
	function setCellAction($value) {
		$this->cellAction= $this->prepareLink($value);
	}
	
	/**
	 * Sets the default link href for the text presented in a cell.
	 * 
	 * @param $value A URL to execute when text within table cells are clicked.
	 */
	function setLinkAction($value) {
		$this->linkAction= $this->prepareLink($value);
	}
	
	/**
	 * Sets the width attribute of the main HTML TABLE.
	 * 
	 * @param $value A valid width attribute for the HTML TABLE tag
	 */
	function setTableWidth($value) {
		$this->tableWidth= $value;
	}
	
	/**
	 * Sets the class attribute of the main HTML TABLE.
	 * 
	 * @param $value A class for the main HTML TABLE. 
	 */
	function setTableClass($value) {
		$this->tableClass= $value;
	}
	
	/**
	 * Sets the id attribute of the main HTML TABLE.
	 * 
	 * @param $value A class for the main HTML TABLE. 
	 */
	function setTableID($value) {
		$this->tableID= $value;
	}
	
	/**
	 * Sets the class attribute of the table header row.
	 * 
	 * @param $value A class for the table header row.
	 */
	function setRowHeaderClass($value) {
		$this->rowHeaderClass= $value;
	}
	
		/**
	 * Sets the class attribute of the table header row.
	 * 
	 * @param $value A class for the table header row.
	 */
	function setThHeaderClass($value) {
		$this->thClass= $value;
	}
	
	/**
	 * Sets the class attribute of the column header row.
	 * 
	 * @param $value A class for the column header row.
	 */
	function setColumnHeaderClass($value) {
		$this->columnHeaderClass= $value;
	}
	
	/**
	 * Sets the class attribute of regular table rows.
	 * 
	 * @param $value A class for regular table rows.
	 */
	function setRowRegularClass($value) {
		$this->rowRegularClass= $value;
	}
	
	/**
	 * Sets the class attribute of alternate table rows.
	 * 
	 * @param $value A class for alternate table rows.
	 */	
	function setRowAlternateClass($value) {
		$this->rowAlternateClass= $value;
	}
	
	/**
	 * Sets the type of INPUT form element to be presented as the first column.
	 * 
	 * @param $value Indicates the INPUT form element type attribute.
	 */
	function setFormElementType($value) {
		$this->formElementType= $value;
	}
	
	/**
	 * Sets the name of the INPUT form element to be presented as the first column.
	 * 
	 * @param $value Indicates the INPUT form element name attribute.
	 */
	function setFormElementName($value) {
		$this->formElementName= $value;
	}
	
	/**
	 * Sets the name of the FORM to wrap the table in when a form element has 
	 * been indicated.
	 * 
	 * @param $value Indicates the FORM name attribute.
	 */
	function setFormName($value) {
		$this->formName= $value;
	}
	
	/**
	 * Sets the action of the FORM element.
	 * 
	 * @param $value Indicates the FORM action attribute.
	 */
	function setFormAction($value) {
		$this->formAction= $value;
	}
	
	/**
	 * Excludes fields from the table by array key.
	 * 
	 * @param $value An Array of field keys to exclude from the table.
	 */
	function setExcludeFields($value) {
		$this->excludeFields= $value;
	}

	/**
	 * Sets the table to provide alternate row colors using ODD or EVEN rows
	 * 
	 * @param $value 'ODD' or 'EVEN' to indicate the alternate row scheme.
	 */
	function setRowAlternatingScheme($value) {
		$this->rowAlternatingScheme= $value;
	}
	
	/**
	 * Sets the default field value to be used when appending query parameters
	 * to link actions.
	 * 
	 * @param $value The key of the field to add as a query string parameter.
	 */
	function setActionFieldName($value) {
		$this->actionField= $value;
	}
	
	/**
	 * Sets the width attribute of each column in the array.
	 * 
	 * @param $value An Array of column widths in the order of the keys in the
	 * 			source table array.
	 */
	function setColumnWidths($widthArray) {
		$this->columnWidths= $widthArray;
	}
	
	/**
	 * An optional array of values that can be preselected when using 
	 * 
	 * @param $value Indicates the INPUT form element type attribute.
	 */
	function setSelectedValues($valueArray) {
		$this->selectedValues= $valueArray;
	}
	
	/**
	 * Sets extra content to be presented following the table (but within
	 * the form, if a form is being rendered with the table).
	 * 
	 * @param $value A string of additional content.
	 */
	function setExtra($value) {
		$this->extra= $value;
	}
	
	/**
	 * Retrieves the width of a specific table column by index position.
	 * 
	 * @param $columnPosition The index of the column to get the width for.
	 */
	function getColumnWidth($columnPosition) {
		$currentWidth= '';
		if (is_array($this->columnWidths)) {
			$currentWidth= $this->columnWidths[$columnPosition] ? ' width="'.$this->columnWidths[$columnPosition].'" ' : '';
		}
		return $currentWidth;
	}
	
	/**
	 * Determines what class the current row should have applied.
	 * 
	 * @param $value The position of the current row being rendered.
	 */
	function determineRowClass($position) {
		switch ($this->rowAlternatingScheme) {
			case 'ODD' :
				$modRemainder= 1;
				break;
			case 'EVEN' :
				$modRemainder= 0;
				break;
		}
		if ($position % 2 == $modRemainder) {
			$currentClass= $this->rowRegularClass;
		} else {
			$currentClass= $this->rowAlternateClass;
		}
		return ' class="'.$currentClass.'"';
	}
	
	/**
	 * Generates an onclick action applied to the current cell, to execute 
	 * any specified cell actions.
	 * 
	 * @param $value Indicates the INPUT form element type attribute.
	 */
	function getCellAction($currentActionFieldValue) {
		if ($this->cellAction) {
			$cellAction= ' onClick="javascript:window.location=\''.$this->cellAction.$this->actionField.'='.urlencode($currentActionFieldValue).'\'" ';
		}
		return $cellAction;
	}
	
	/**
	 * Generates the cell content, including any specified action fields values.
	 * 
	 * @param $currentActionFieldValue The value to be applied to the link action.
	 * @param $value The value of the cell.
	 */
	function createCellText($currentActionFieldValue, $value) {
		$cell .= $value;
		if ($this->linkAction) {
			$cell= '<a href="'.$this->linkAction.$this->actionField.'='.urlencode($currentActionFieldValue).'">'.$cell.'</a>';
		}
		return $cell;
	}
	
	/**
	 * Sets an option to generate a check all link when checkbox is indicated 
	 * as the table formElementType.
	 */
	function setAllOption() {
		$this->allOption= 1;
	}
	
	/**
	 * Function to prepare a link generated in the table cell/link actions.
	 * 
	 * @param $value Indicates the INPUT form element type attribute.
	 */
	function prepareLink($link) {
		if (strstr($link, '?')) {
			$end= '&';
		} else {
			$end= '?';
		}
		return $link.$end;
	}
	
	/**
	 * Generates the table content.
	 * 
	 * @param $fieldsArray The associative array representing the table rows 
	 * and columns.
	 * @param $fieldHeadersArray An optional array of values for providing
	 * alternative field headers; this is an associative arrays of keys from
	 * the $fieldsArray where the values represent the alt heading content
	 * for each column.
	 */
	function create($fieldsArray, $fieldHeadersArray=array(),$linkpage="") {
	global $_lang;
		if (is_array($fieldsArray)) {
			$i= 0;
			foreach ($fieldsArray as $fieldName => $fieldValue) {
				$table .= "\t<tr".$this->determineRowClass($i).">\n";
				$currentActionFieldValue= $fieldValue[$this->actionField];
				if (is_array($this->selectedValues)) {
					$isChecked= array_search($currentActionFieldValue, $this->selectedValues)===false? 0 : 1;
				} else {
					$isChecked= false;
				}
				$table .= $this->addFormField($currentActionFieldValue, $isChecked);
				$colPosition= 0;
				foreach ($fieldValue as $key => $value) {
					if (!in_array($key, $this->excludeFields)) {
						$table .= "\t\t<td".$this->getCellAction($currentActionFieldValue).">";
						$table .= $this->createCellText($currentActionFieldValue, $value);
						$table .= "</td>\n";
						if ($i == 0) {
							if (empty ($header) && $this->formElementType) {
								$header .= "\t\t<th style=\"width:32px\" ".($this->thClass ? 'class="'.$this->thClass.'"' : '').">". ($this->allOption ? '<a href="javascript:clickAll()">all</a>' : '')."</th>\n";
							}
							$headerText= array_key_exists($key, $fieldHeadersArray)? $fieldHeadersArray[$key]: $key;
							$header .= "\t\t<th".$this->getColumnWidth($colPosition).($this->thClass ? ' class="'.$this->thClass.'" ' : '').">".$headerText."</th>\n";
						}
						$colPosition ++;
					}
				}
				$i ++;
				$table .= "\t</tr>\n";
			}
			$table= "\n".'<table'. ($this->tableWidth ? ' width="'.$this->tableWidth.'"' : ''). ($this->tableClass ? ' class="'.$this->tableClass.'"' : ''). ($this->tableID ? ' id="'.$this->tableID.'"' : '').">\n". ($header ? "\t<thead>\n\t<tr class=\"".$this->rowHeaderClass."\">\n".$header."\t</tr>\n\t</thead>\n" : '').$table."</table>\n";
			if ($this->formElementType) {
				$table= "\n".'<form id="'.$this->formName.'" name="'.$this->formName.'" action="'.$this->formAction.'" method="POST">'.$table;
			}
			if (strlen($this->pageNav) > 1) {//changed to display the pagination if exists.
				/* commented this part because of cookie
				$table .= '<div id="max-display-records" ><select style="display:inline" onchange="javascript:updatePageSize(this[this.selectedIndex].value);">';
				$pageSizes= array (10, 25, 50, 100, 250);
				for ($i= 0; $i < count($pageSizes); $i ++) {
					$table .= '<option value="'.$pageSizes[$i].'"';
					$table .= MAX_DISPLAY_RECORDS_NUM == $pageSizes[$i] ? ' selected ' : '';
					$table .= '>'.$pageSizes[$i].'</option>';
				}
				
				$table .= '</select>'.$_lang["pagination_table_perpage"].'</div>';
				*/
				$table .= '<div id="pagination" class="paginate">'.$_lang["pagination_table_gotopage"].'<ul>'.$this->pageNav.'</ul></div>';
				//$table .= '<script language="javascript">function updatePageSize(size){window.location = \''.$this->prepareLink($linkpage).'pageSize=\'+size;}</script>';

			}
			if ($this->allOption) {
				$table .= '
<script language="javascript">
	toggled = 0;
	function clickAll() {
		myform = document.getElementById("'.$this->formName.'");
		for(i=0;i<myform.length;i++) {
			if(myform.elements[i].type==\'checkbox\') {
				myform.elements[i].checked=(toggled?false:true);
			}
		}
		toggled = (toggled?0:1);
	}
</script>';
			}
			if ($this->formElementType) {
				if ($this->extra) {
					$table.= "\n".$this->extra."\n";
				}
				$table.= "\n".'</form>'."\n";
			}
			return $table;
		}
	}
	
	/**
	 * Generates optional paging navigation controls for the table.
	 * 
	 * @param $numRecords The number of records to show per page.
	 * @param $qs An optional query string to be appended to the paging links
	 */
	function createPagingNavigation($numRecords, $qs='') {
		global $_lang;
		$currentPage= (is_numeric($_GET['page']) ? $_GET['page'] : 1);
		$numPages= ceil($numRecords / MAX_DISPLAY_RECORDS_NUM);
		if ($numPages > 1) {
			$currentURL= empty($qs)? '': '?'.$qs;
			if ($currentPage > 6) {
				$nav .= $this->createPageLink($currentURL, 1, $_lang["pagination_table_first"]);
			}
			if ($currentPage != 1) {
				$nav .= $this->createPageLink($currentURL, $currentPage -1, '&lt;&lt;');
			}
			$offset= -4 + ($currentPage < 5 ? (5 - $currentPage) : 0);
			$i= 1;
			while ($i < 10 && ($currentPage + $offset <= $numPages)) {
				if ($currentPage == $currentPage + $offset)
					$nav .= $this->createPageLink($currentURL, $currentPage + $offset, $currentPage + $offset, true);
				else
					$nav .= $this->createPageLink($currentURL, $currentPage + $offset, $currentPage + $offset);
				$i ++;
				$offset ++;
			}
			if ($currentPage < $numPages) {
				$nav .= $this->createPageLink($currentURL, $currentPage +1, '&gt;&gt;');
			}
			if ($currentPage != $numPages) {
				$nav .= $this->createPageLink($currentURL, $numPages, $_lang["pagination_table_last"]);
			}
		}
		$this->pageNav= ' '.$nav;
	}
	
	/**
	 * Creates an individual page link for the paging navigation.
	 * 
	 * @param $link The link for the page, defaulted to the current document.
	 * @param $pageNum The page number of the link.
	 * @param $displayText The text of the link.
	 * @param $currentPage Indicates if the link is to the current page.
	 * @param $qs And optional query string to be appended to the link.
	 */
	function createPageLink($link='', $pageNum, $displayText, $currentPage=false, $qs='') {
		global $modx;
		$orderBy= !empty($_GET['orderby'])? '&orderby=' . $_GET['orderby']: '';
		$orderDir= !empty($_GET['orderdir'])? '&orderdir=' . $_GET['orderdir']: '';
		if (!empty($qs)) $qs= "?$qs";
		$link= empty($link)? $modx->makeUrl($modx->documentIdentifier, $modx->documentObject['alias'], $qs . "page=$pageNum$orderBy$orderDir"): $this->prepareLink($link) . "page=$pageNum";
		$nav .= '<li'.($currentPage? ' class="currentPage"': '').'><a'.($currentPage? ' class="currentPage"': '').' href="'.$link.'">'.$displayText.'</a></li>'."\n";
		return $nav;
	}
	
	/**
	 * Adds an INPUT form element column to the table.
	 * 
	 * @param $value The value attribute of the element.
	 * @param $isChecked Indicates if the checked attribute should apply to the 
	 * element.
	 */
	function addFormField($value, $isChecked) {
		if ($this->formElementType) {
			$checked= $isChecked? "checked ": "";
			$field= "\t\t".'<td><input type="'.$this->formElementType.'" name="'. ($this->formElementName ? $this->formElementName : $value).'"  value="'.$value.'" '.$checked.'/></td>'."\n";
		}
		return $field;
	}
	
	/**
	 * Generates the proper LIMIT clause for queries to retrieve paged results in
	 * a MakeTable $fieldsArray.
	 */
	function handlePaging() {
		$offset= (is_numeric($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] - 1 : 0;
		$limitClause= ' LIMIT '. ($offset * MAX_DISPLAY_RECORDS_NUM).', '.MAX_DISPLAY_RECORDS_NUM;
		return $limitClause;
	}
	
	/**
	 * Generates the SORT BY clause for queries used to retrieve a MakeTable 
	 * $fieldsArray
	 * 
	 * @param $natural_order If true, the results are returned in natural order.
	 */
	function handleSorting($natural_order=false) {
		$orderByClause= '';
		if (!$natural_order) {
			$orderby= !empty($_GET['orderby'])? $_GET['orderby']: "id";
			$orderdir= !empty($_GET['orderdir'])? $_GET['orderdir']: "DESC";
			$orderbyClause= !empty($orderby)? ' ORDER BY ' . $orderby . ' ' . $orderdir . ' ': "";
		}
		return $orderbyClause;
	}
	
	/**
	 * Generates a link to order by a specific $fieldsArray key; use to generate
	 * sort by links in the MakeTable $fieldHeadingsArray values.
	 * 
	 * @param $key The $fieldsArray key for the column to sort by.
	 * @param $text The text for the link (e.g. table column header).
	 * @param $qs An optional query string to append to the order by link.
	 */
	function prepareOrderByLink($key, $text, $qs='') {
		global $modx;
		if (!empty($_GET['orderdir'])) {
			$orderDir= strtolower($_GET['orderdir'])=='desc'? '&orderdir=asc': '&orderdir=desc';
		} else {
			$orderDir= '&orderdir=asc';
		}
		if (!empty($qs)) {
			if (!strrpos($qs, '&')==strlen($qs)-1) $qs.= '&'; 
		}
		return '<a href="[~'.$modx->documentIdentifier.'~]?'.$qs.'orderby='.$key.$orderDir.'">'.$text.'</a>';
	}
	
}
?>