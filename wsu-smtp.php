<?php
/*
Plugin Name: WSU SMTP Email
Plugin URI: http://web.wsu.edu/
Description: Use SMTP to send email from WordPress
Author: washingtonstateuniversity, jeremyfelt
Version: 0.1.3
*/

add_action( 'phpmailer_init', 'wsuwp_smtp_email' );
/**
 * Override some default settings during the PHPMailer init process.
 *
 * @param PHPMailer $phpmailer
 */
function wsuwp_smtp_email( $phpmailer ) {
	$phpmailer->Mailer = 'smtp';
	$phpmailer->Host = 'smtp.wsu.edu';
	$phpmailer->Port = 25;
	$phpmailer->SMTPAuth = false;

	// Append some text so that people receiving email know where it was generated.
	$phpmailer->FromName = $phpmailer->FromName . ' (sent from WSUWP)';

	// This may not be necessary.
	$phpmailer->Sender = $phpmailer->From;
}
