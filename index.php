<?php
require_once('common.php');	
	if($_GET[ou]){
		$_SESSION[ou] 			= $_GET[ou]; 
		$_SESSION[current_dn] 	= 'ou='.$_SESSION[ou].','.$basedn;
	}

	$html 		= "";
	$htmlou 	= "";
    // verify binding
    if ($ldapbind) {
        
		$justthese = array("ou");
		$sr=ldap_list($ds, $basedn, "ou=*", $justthese);
		$info = ldap_get_entries($ds, $sr);
		/*
		echo "<pre>";
		print_r($info);
		//print_r($attrs);
		echo "</pre>";	*/
		for ($i=0; $i<$info["count"]; $i++) {
			//echo $info[$i]["ou"][0] ;
			$htmlou .= '<p><a href=index.php?ou='.urlencode($info[$i]["ou"][0]).'>'.$info[$i]["ou"][0].'</a></p>';
		}
		//echo $htmlou;
		if($_SESSION[ou]){
			$justthese 	= array("cn","uid","uidNumber","gidNumber","userpassword","homeDirectory","FTPStatus","objectClass");
			if($_POST[cn]){
				$filter		= "(&(cn=$_POST[cn])(&(objectClass=PureFTPdUser)(objectClass=posixAccount)))";
			}else{
				$filter		= "(&(cn=*)(&(objectClass=PureFTPdUser)(objectClass=posixAccount)))";
			}
			//$dn 		= 'ou='.$_SESSION[ou].','.$basedn;
			$dn 		= $_SESSION[current_dn];
			$sr=ldap_search($ds, $dn,$filter,$justthese); 
			$info = ldap_get_entries($ds, $sr);			

		
/*		
		$entry = ldap_first_entry($ds, $sr);
		$attrs = ldap_get_attributes($ds, $entry);
		
		echo "count:".ldap_count_entries($ds,$sr)."<p>".$info["count"];
		echo "<pre>";
		print_r($info);
		//print_r($attrs);
		echo "</pre>";		
*/
		$html .= '
<script>
function Delete(account){
	if (confirm("确认删除吗?")){
		location.href="remove.php?account="+account; 
	}
}
</script>		
		';
		//document.list.action = url;
		//document.list.submit();

        $html .= "<table border=1>";
	    for ($i=0; $i<$info["count"]; $i++) {
	    	$html .= "<tr>";
			$html .= "<td>". $info[$i]["cn"][0] ."</td>";
			$html .= "<td>". $info[$i]["dn"] ."</td>";
			
	        $html .= '<td><button onclick="location.href=\'modify.php?account='. urlencode ($info[$i]["cn"][0]) .'\'">修改</button></td>';
			$html .= '<td><button onclick="Delete(\''. urlencode ($info[$i]["dn"]) .'\')">删除</button></td>';
/*	        
			$html .= "<td>". $info[$i]["uid"][0] ."</td>";
        	$html .= "<td>". $info[$i]["uidnumber"][0] ."</td>";
	        $html .= "<td>". $info[$i]["gidnumber"][0] ."</td>";
	        $html .= "<td>". $info[$i]["homedirectory"][0] ."</td>";
	        $html .= "<td>". $info[$i]["ftpstatus"][0] ."</td>";
	        $html .= "<td>". $info[$i]["uidNumber"][0] ."</td>";
*/
	        $html .= "</td>";
	    } 
		$html .= "</table>";
		}else{
			echo '没有数据!';
		}		
	    
    } 
//echo $html;


@ldap_unbind($ldapconn);
@ldap_close($ldapconn);

$smarty->assign('title', 'PureFTPD Account (LDAPv3)');
$smarty->assign('dn', $_SESSION[current_dn]);
$smarty->assign('ou', $htmlou);
$smarty->assign('name', $html);
$smarty->display('index.tpl');

?>
