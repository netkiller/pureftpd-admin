<?php /* Smarty version 2.6.7, created on 2005-03-18 14:43:39
         compiled from index.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<form name="form1" id="form1" method="post" action="">
<table width="100%" border="1">
  <tr>
    <td><a href="adduser.php">添加帐号</a> |<a href="unit.php">组织单元</a>|<a href="javascript:window.close();">关闭退出</a></td>
    <td>
      <input name="cn" type="text" id="cn" />
      <input type="submit" name="Submit" value="Search" />
    </td>
  </tr>
  <tr>
    <td>dn:</td>
  <td><?php echo $this->_tpl_vars['dn']; ?>
</td>
  </tr>
  <tr>
    <td valign="top"><?php echo $this->_tpl_vars['ou']; ?>
 </td>
    <td valign="top"><?php echo $this->_tpl_vars['name']; ?>
 </td>
  </tr>
</table>
</form>
</body>
</html>