<?php
/**
 *PHP 5.6 certificate verification failure
 * 
 *The correct fix for this is to replace the invalid, misconfigured or self-signed *certificate with a good one. 
 *
 *Failing that, you can allow insecure connections via the *SMTPOptions property introduced *in PHPMailer 5.2.10 (it's possible to do this by *subclassing the SMTP class in earlier *versions), though this is not recommended:
 */
class subPHPMailer extends PHPMailer
{
	public $SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
}