<?php
require_once('class.phpmailer.php');

class ClipperMailer extends PHPMailer {

    function __construct() {
        
        global $modx;

        if (is_callable('parent::__construct')) {
            parent::__construct(true);
        }

        $this->CharSet = $modx->config['modx_charset'];

        if ($modx->config['smtp']) {
            $this->From = $modx->config['emailsender'];
            $this->FromName = $modx->config['site_name'];
            $this->isSMTP();
            $this->SMTPAuth = true;
            $this->SMTPSecure = $modx->config['smtp_prefix'];
            $this->Host = $modx->config['smtp_host'];
            $this->Port = $modx->config['smtp_port'];
            $this->Username = $modx->config['smtp_user'];
            $this->Password = $modx->config['smtp_pass'];
        } else {
            // Minimise risk of messages being out in spam bins.
            $this->From = 'ClipperCMS@'.php_uname('n');
            $this->FromName = $modx->config['site_name'];
            $this->AddReplyTo($modx->config['emailsender']);
        }
        
    }
    
    function Send() {

        global $modx;
    
        try {
            parent::Send();
        } catch (phpmailerException $e) {
            $modx->logEvent(0, 3, strip_tags($e->errorMessage()), 'Mailer');
        } catch (Exception $e) {
            $modx->logEvent(0, 3, $e->getMessage(), 'Mailer');
        }
    }

}
