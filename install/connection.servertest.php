<?php

$host = $_POST['host'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

require_once("lang.php");

// include DBAPI and timer functions
require_once ('../manager/includes/extenders/dbapi.mysqli.class.inc.php');
require_once ('includes/install.class.inc.php');

$install = new Install();
@$install->db = new DBAPI($install);

$output = $_lang["status_connecting"];

if (! $install->db->test_connect($host, '', $uid, $pwd)) {
    $output .= '<span id="server_fail" style="color:#FF0000;"> '.$_lang['status_failed'].'</span>';
}
else {
    $output .= '<span id="server_pass" style="color:#80c000;"> '.$_lang['status_passed_server'].'</span>';

    // Mysql version check
    if (version_compare($install->db->getVersion(), '5.0.51', '=') ) {
        $output .= '<br /><span style="color:#FF0000;"> '.$_lang['mysql_5051'].'</span>';
    }

}
echo $output;
?>
