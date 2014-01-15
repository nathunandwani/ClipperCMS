<?php
require_once('class.phpmailer.php');

class ClipperMailer extends PHPMailer {

    function __construct() {
        
        global $modx;

        if (is_callable('parent::__construct')) {
            parent::__construct();
        }
        
        $this->CharSet = $modx->config['modx_charset'];
        
        // Minimise risk of messages being out in spam bins.
        $this->From = 'ClipperCMS@'.php_uname('n');
        $this->FromName = $modx->config['site_name'];
        
        $this->AddReplyTo($modx->config['emailsender']);

        if ($modx->config['smtp']) {
            $this->isSMTP();
            $this->From = $modx->config['smtp_user'];
            $this->SMTPAuth = true;
            $this->Host = $modx->config['smtp_host'];
            $this->Port = $modx->config['smtp_port'];
            $this->SMTPSecure = $modx->config['smtp_prefix'];
            $this->Username = $modx->config['smtp_user'];
            $this->Password = $modx->config['smtp_pass'];
        }
        
    }

}
