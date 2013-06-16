<?
require_once('common.php');
	$ou	= $_POST[ou];
	if ($ldapbind && $ou) {
		$info["ou"]			 = $_POST['ou']; 
		$info["objectClass"][0] = "top"; 
		$info["objectClass"][1]= "organizationalUnit"; 	
		$dn = "ou=".$_POST['ou'].','.$basedn;
/*		echo "<pre>";
//		print_r($info);
		echo $dn;
//print_r($_SESSION); 		
		echo "</pre>";
*/
		if(ldap_add($ds, $dn, $info)){
			echo "<script>alert('添加成功!');</script>";
		}
		//ldap_unbind($ds);
		ldap_close($ds);
	}
//	$smarty->assign('title', 'PureFTPD Account (LDAPv3)');
//	$smarty->assign('action', '');
	$smarty->assign('dn', $basedn);
	$smarty->assign('cn', 'ftpuser');
	$smarty->assign('uid', 'ftpuser');
	$smarty->assign('uidNumber', '1000');
	$smarty->assign('gidNumber', '1000');
	$smarty->assign('op', 'add');
	$smarty->display('unit.tpl');
?>