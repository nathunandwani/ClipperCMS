<?php
/*
* @package  Clipper SQL dumper forked from MySQLDumper by Dennis Mozes. 
* @version  1.0
* @license GNU/LGPL License: http://www.gnu.org/copyleft/lgpl.html
*/
class ClipperSqlDumper {

	private $_dbtables;
	private $_isDroptables;
	private $modx;

	function __construct($modx) {
		$this->modx = $modx;
		// Don't drop tables by default.
		$this->setDroptables(false);
	}

	function setDBtables($dbtables) {
		$this->_dbtables = $dbtables;
	}

	// If set to true, it will generate 'DROP TABLE IF EXISTS'-statements for each table.
	function setDroptables($state) {
		$this->_isDroptables = $state;
	}

	function isDroptables() {
		return $this->_isDroptables;
	}
    
	function createDump() {

		global $site_name,$full_appname;

		// Set line feed
		$lf = "\n";

		$tables = array();
        $views = array();
		$createtable = array();
        $createview = array();
		
		$result = $this->modx->db->query('SHOW TABLES');
		while ($row = $this->modx->db->getRow($result, 'num')) {
            // check for selected table
			if(in_array($row[0], $this->_dbtables)) {
                // Don't dump data in views, only tables
                // Note that for views to be dumped, we need MySQL >= 5.0.1
                $result_tbl = $this->modx->db->query("SHOW CREATE TABLE `{$row[0]}`");
                $row_tbl = $this->modx->db->getRow($result_tbl);
                if (isset($row_tbl['Table'])) {
                    $tables[] = $row[0];
                    $createtable[$row[0]] = $row_tbl['Create Table'];
                } else {
                    $views[] = $row[0];
                    $createview[$row[0]] = $row_tbl['Create View'];
                }
            }
		}

		// Set header
		$output = "#". $lf;
		$output .= "# ".addslashes($site_name)." Database Dump" . $lf;
		$output .= "# ".$full_appname.$lf;
		$output .= "# ". $lf;
		$output .= "# Host: " . $this->modx->db->getHostname() . $lf;
		$output .= "# Generation Time: " . date("M j, Y at H:i") . $lf;
		$output .= "# Server version: ". $this->modx->db->getVersion() . $lf;
		$output .= "# PHP Version: " . phpversion() . $lf;
		$output .= "# Database : `" . $this->modx->db->getDBname() . "`" . $lf;
		$output .= "#";

		foreach ($tables as $tblval) {
            $output .= $lf . $lf . "# --------------------------------------------------------" . $lf . $lf;
            $output .= "#". $lf . "# Table structure for table `$tblval`" . $lf;
            $output .= "#" . $lf . $lf;
            // Generate DROP TABLE statement when client wants it to.
            if($this->isDroptables()) {
                $output .= "DROP TABLE IF EXISTS `$tblval`;" . $lf;
            }
            $output .= $createtable[$tblval].";" . $lf;
            $output .= $lf;
            $output .= "#". $lf . "# Dumping data for table `$tblval`". $lf . "#" . $lf;
            $result = $this->modx->db->query("SELECT * FROM `$tblval`");
            $rows = $this->modx->db->makeArray($result);
            foreach($rows as $row) {
                $insertdump = $lf;
                $insertdump .= "INSERT INTO `$tblval` VALUES (";
                foreach($row as $key => $value) {
                    $value = addslashes($value);
                    $value = str_replace("\n", '\\r\\n', $value);
                    $value = str_replace("\r", '', $value);
                    $insertdump .= "'$value',";
                }
                $output .= rtrim($insertdump,',') . ");";
            }
		}
        
        $output .= $lf.$lf;
        $output .= '#'.$lf;
        $output .= '# Views'.$lf;
		$output .= '#'.$lf.$lf;
        
        foreach($views as $view) {
            $output .= $createview[$view].$lf.$lf;
        }
	
	return $output;

	}
}

