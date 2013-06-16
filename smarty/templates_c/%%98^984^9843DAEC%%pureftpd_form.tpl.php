<?php /* Smarty version 2.6.7, created on 2005-03-17 15:42:26
         compiled from pureftpd_form.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body><fieldset><legend><?php echo $this->_tpl_vars['legend']; ?>
</legend>
<form name="pureftpd" id="pureftpd" method="post" action="<?php echo $this->_tpl_vars['action']; ?>
">
  <table width="100%" border="0">
    <tr>
      <td width="90">dn:</td>
      <td width="480"><?php echo $this->_tpl_vars['dn']; ?>
</td>
    </tr>
    <tr>
      <td>cn</td>
      <td><input name="cn" type="text" id="cn" value="<?php echo $this->_tpl_vars['cn']; ?>
" /></td>
    </tr>
    <tr>
      <td>uid</td>
      <td><input name="uid" type="text" id="uid" value="<?php echo $this->_tpl_vars['uid']; ?>
" /></td>
    </tr>
    <tr>
      <td>uidNumber</td>
      <td><input name="uidNumber" type="text" id="uidNumber" value="<?php echo $this->_tpl_vars['uidNumber']; ?>
" /></td>
    </tr>
    <tr>
      <td>gidNumber</td>
      <td><input name="gidNumber" type="text" id="gidNumber" value="<?php echo $this->_tpl_vars['gidNumber']; ?>
" /></td>
    </tr>
    <tr>
      <td>userPassword</td>
      <td><input name="userPassword" type="text" id="userPassword" value="<?php echo $this->_tpl_vars['userPassword']; ?>
" /></td>
    </tr>
    <tr>
      <td>homeDirectory</td>
      <td><input name="homeDirectory" type="text" id="homeDirectory" value="<?php echo $this->_tpl_vars['homeDirectory']; ?>
" size="80" maxlength="255" /></td>
    </tr>
    <tr>
      <td>FTPStatus</td>
      <td><?php echo $this->_tpl_vars['FTPStatus']; ?>
</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" name="Submit" value="Submit" />
        <input type="button" name="Submit2" value="Cancel" onclick="location.href='index.php'" /></td>
    </tr>
  </table>
  <input name="op" type="hidden" id="op" value="<?php echo $this->_tpl_vars['op']; ?>
" />
</form>
</fieldset>
</body>
</html>