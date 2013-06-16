<?php
session_start ();
require_once('config.php');
/*
if (!isset($_SERVER['PHP_AUTH_USER'])) {
   header('WWW-Authenticate: Basic realm="PureFTPD Admin (LDAPv3)"');
   header('HTTP/1.0 401 Unauthorized');
   echo 'Text to send if user hits Cancel button';
   exit;
  } else {
   echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
   echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
  }
*/
function authenticate() {
   header('WWW-Authenticate: Basic realm="Test Authentication System"');
   header('HTTP/1.0 401 Unauthorized');
   echo "You must enter a valid login ID and password to access this resource\n";
   exit;
}
 
if (!isset($_SERVER['PHP_AUTH_USER']) ||
    ($_POST['SeenBefore'] == 1 && $_POST['OldAuth'] == $_SERVER['PHP_AUTH_USER'])) {
	authenticate();
} else {
 	if($_SERVER['PHP_AUTH_USER'] == $admin && $_SERVER['PHP_AUTH_PW'] == $adminpw){
		$_SESSION['LOGIN']	= true;
		//header("Location: index.php"); 
		echo "<script>location.href='index.php';</script>";
		echo "OK!".$_SESSION['LOGIN'];
	}else{
		authenticate();
	}
/*
   echo "<p>Welcome: {$_SERVER['PHP_AUTH_USER']}<br>";
   echo "Old: {$_REQUEST['OldAuth']}";
   echo "<form action='{$_SERVER['PHP_SELF']}' METHOD='POST'>\n";
   echo "<input type='hidden' name='SeenBefore' value='1'>\n";
   echo "<input type='hidden' name='OldAuth' value='{$_SERVER['PHP_AUTH_USER']}'>\n";
   echo "<input type='submit' value='Re Authenticate'>\n";
   echo "</form></p>\n";
*/
}

/*
//$ldaphost 	= "ldap://localhost:389/";
//$rootdn  	= 'cn=Manager,dc=d3zone,dc=com';
//$rootpw 	= 'secret';
$rootdn  	= $_POST['rootdn'];
$rootpw 	= $_POST['rootpw'];
$ldapconn = ldap_connect($ldaphost)
    or die("Could not connect to LDAP server.");
if ($ldapconn) {
	@ldap_set_option( $ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3 );
	@ldap_set_option( $ldapconn, LDAP_OPT_REFERRALS, 0);
	$ldapbind = ldap_bind($ldapconn, $rootdn, $rootpw);
	// binding anonymously
   	//$ldapbind = @ldap_bind($ldapconn); 
	echo $ldapbind;
	if ($ldapbind) {
		echo "LDAP bind successful...";
	}else{
		echo "LDAP bind failed...";
		//exit;
	}
}
ldap_close($ldapconn);
*/
?>
