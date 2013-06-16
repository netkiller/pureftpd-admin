<?php
require_once('common.php');

$op = $_POST['op'];
	if ($ldapbind && ($op=='add')) {
		$info["cn"]			 = $_POST['cn']; 
		$info["objectClass"][0] = "posixAccount"; 
		$info["objectClass"][1]= "PureFTPdUser"; 	
		$info["objectClass"][2] = "top";
		$info["uid"]	 	 = $_POST['uid']; 
		$info["uidNumber"]	 = $_POST['uidNumber']; 
		$info["gidNumber"] 	 = $_POST['gidNumber']; 
		$info["userPassword"]= '{SHA1}'.sha1($_POST['userPassword']); 
		$info["homeDirectory"]=$_POST['homeDirectory']; 
		$info["FTPStatus"]	 = $_POST['FTPStatus']; 
		$dn = "cn=".$_POST['cn'].','.$_SESSION[current_dn];
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
		$smarty->assign('title', 'PureFTPD Account (LDAPv3)');
		$smarty->assign('action', '');
		$smarty->assign('legend', '添加 FTP 用户');
		$smarty->assign('dn', 'cn=*'.$_SESSION[current_dn]);
		$smarty->assign('cn', 'ftpuser');
		$smarty->assign('uid', 'ftpuser');
		$smarty->assign('uidNumber', '1000');
		$smarty->assign('gidNumber', '1000');
		$smarty->assign('userPassword', 'password');
		$smarty->assign('homeDirectory', '/home/ftpuser');
		$html ='<input name="FTPStatus" type="radio" value="enabled" checked="checked" />Enable<input name="FTPStatus" type="radio" value="disabled" />Disable';
		$smarty->assign('FTPStatus', $html);
		$smarty->assign('op', 'add');
		$smarty->display('pureftpd_form.tpl');
?>

