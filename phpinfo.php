<?php
require_once('common.php');	
      
//		$basedn = $dn;
		$justthese = array("ou");
		
		$sr=ldap_list($ds, $basedn, "ou=*", $justthese);
		
		$info = ldap_get_entries($ds, $sr);
		
		echo "<pre>";
		print_r($info);
		//print_r($attrs);
		echo "</pre>";	
		for ($i=0; $i<$info["count"]; $i++) {
			echo $info[$i]["ou"][0] ;
		}
		
phpinfo();
?>