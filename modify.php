<?php
session_start ();
require_once('common.php');
$op 	= $_POST['op'];
$account= $_GET['account'];
if ($ldapbind) {
	if($op == 'mod'){
//		$info["cn"]			 = $_POST['cn']; 
//		$info["objectClass"][0] = "posixAccount"; 
//		$info["objectClass"][1]= "PureFTPdUser"; 	
//		$info["objectClass"][2] = "top";
		$info["uid"]	 	 = $_POST['uid']; 
		$info["uidNumber"]	 = $_POST['uidNumber'];
		$info["gidNumber"] 	 = $_POST['gidNumber']; 
		$info["userPassword"]= "{SHA1}".sha1($_POST['userPassword']); 
		$info["homeDirectory"]=$_POST['homeDirectory']; 
		$info["FTPStatus"]	 = $_POST['FTPStatus']; 
		$dn = "cn=".$_POST['cn'].','.$_SESSION[current_dn];
		if(ldap_modify($ds, $dn, $info) or die('修改出错!')){
			echo "<script>alert('修改成功!');</script>";
		}
		//ldap_unbind($ds);
		//ldap_close($ds);	
		
	
	}
		$justthese 	= array("cn","uid","uidNumber","gidNumber","userpassword","homeDirectory","FTPStatus");
		$filter		="(&(cn=".$account.")(&(objectClass=PureFTPdUser)(objectClass=posixAccount)))";
		
		$sr=ldap_search($ds, $_SESSION[current_dn],$filter,$justthese); 
		
		$info = ldap_get_entries($ds, $sr);
	
		$smarty->assign('title', 'PureFTPD Account (LDAPv3)');
		$smarty->assign('action', '?account='.$account);
		$smarty->assign('legend', '修改 FTP 用户');
		$smarty->assign('dn',  $info[0]["dn"]);
		$smarty->assign('cn',  $info[0]["cn"][0]);
		$smarty->assign('uid', $info[0]["uid"][0]);
		$smarty->assign('uidNumber', $info[0]["uidnumber"][0]);
		$smarty->assign('gidNumber', $info[0]["gidnumber"][0]);
		$smarty->assign('userPassword', $info[0]["userpassword"][0]);
		$smarty->assign('homeDirectory', $info[0]["homedirectory"][0]);
		$html = "";
		if($info[0]["ftpstatus"][0] == 'enabled'){
			$html ='<input name="FTPStatus" type="radio" value="enabled" checked="checked" />Enable<input name="FTPStatus" type="radio" value="disabled" />Disable';
		}else{
			$html ='<input name="FTPStatus" type="radio" value="enabled" />Enable<input name="FTPStatus" type="radio" value="disabled" checked="checked" />Disable';
		}
		$smarty->assign('FTPStatus', $html);
		$smarty->assign('op', 'mod');
		$smarty->display('pureftpd_form.tpl');
		ldap_close($ds); 
	
}
?>

