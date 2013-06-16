<?php 
@session_start ();
require_once('config.php');
if(!$_SESSION['LOGIN']){
	echo "<script>location.href='login.php';</script>";
	exit;
}
/*
if (!session_is_registered ("current_dn")){
	$current_dn = null;
	session_register ("current_dn");
}
*/
// set path to Smarty directory
define("SMARTY_DIR",$SMARTY_DIR);
// put full path to Smarty.class.php
require_once(SMARTY_DIR."Smarty.class.php");

$smarty = new Smarty();
//$smarty->caching = true;
$smarty->template_dir = './smarty/templates';
$smarty->compile_dir = './smarty/templates_c';
$smarty->cache_dir = './smarty/cache';
$smarty->config_dir = './smarty/configs';

// connect to ldap server
$ldapconn = ldap_connect($ldaphost)
    or die("Could not connect to LDAP server.");
$ds 	= $ldapconn;
$dn		= basedn;
// using ldap bind
if ($ldapconn) {
	@ldap_set_option( $ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3 );
	@ldap_set_option( $ldapconn, LDAP_OPT_REFERRALS, 0);
	// binding to ldap server
	$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
	// binding anonymously
   	//$ldapbind = @ldap_bind($ldapconn); 
	if (!$ldapbind) {
		//echo "LDAP bind failed...";
		echo "LDAP bind failed...";
		exit;
	}
	//echo "LDAP bind successful...";
}


// Debug
//echo __LINE__;
/*
echo "<hr>";
echo $ldaphost."\t".$ldaprdn."\t".$ldappass;
echo "<hr>";
echo "conn:".$ldapconn ."<br>bind:".$ldapbind;
*/
?>