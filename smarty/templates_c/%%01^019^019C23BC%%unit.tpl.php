<?php /* Smarty version 2.6.7, created on 2005-03-17 18:12:18
         compiled from unit.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Unit</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body><fieldset><legend>Unit</legend>
<form name="form1" id="form1" method="post" action="">
  ou=
  <input name="ou" type="text" id="ou" />
  ,<?php echo $this->_tpl_vars['dn']; ?>

  <input type="submit" name="Submit" value="Submit" />
  <input type="button" name="Submit2" value="Cancel" onclick="location.href='index.php'" />
</form></fieldset>
</body>
</html>