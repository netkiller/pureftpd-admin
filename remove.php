<?php
require_once('common.php');

if ($ldapbind) {
	$account= $_GET['account'];
	echo $account;
	//$dn = "cn=".$account.','.$dn;
	if(ldap_delete($ds,$account)){
		echo "<script>alert('删除成功!');</script>";
	}else{
		echo "<script>alert('删除失败!');</script>";
	}
	//header("Location: index.php"); 
	echo "<script>location.href='index.php';</script>";
	
}

?>