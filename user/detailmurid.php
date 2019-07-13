<?php require_once('../Connections/sistemacik.php'); ?><?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_sistemacik, $sistemacik);
$query_DetailRS1 = sprintf("SELECT * FROM datamurid WHERE nokp = %s", GetSQLValueString($colname_DetailRS1, "text"));
$DetailRS1 = mysql_query($query_DetailRS1, $sistemacik) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);

$colname_DetailRS2 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS2 = $_GET['recordID'];
}
mysql_select_db($database_sistemacik, $sistemacik);
$query_DetailRS2 = sprintf("SELECT * FROM datamurid WHERE nokp = %s", GetSQLValueString($colname_DetailRS2, "text"));
$DetailRS2 = mysql_query($query_DetailRS2, $sistemacik) or die(mysql_error());
$row_DetailRS2 = mysql_fetch_assoc($DetailRS2);
$totalRows_DetailRS2 = mysql_num_rows($DetailRS2);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>DETAIL MURID</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="images/mm_health_nutr.css" type="text/css" />
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>
</head>
<body bgcolor="#F4FFE4">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#D5EDB3">
    <td colspan="2" rowspan="2"><img src="../SMKTLS.jpg" width="194" height="227" /></td>
    <td width="833" height="50" id="logo" valign="bottom" align="center" nowrap="nowrap">SISTEM PENDAFTARAN PEMBANTU PADANG RUMAH NEPTUNE</td>
    <td width="4">&nbsp;</td>
  </tr>

  <tr bgcolor="#D5EDB3">
    <td height="51" id="tagline" valign="top" align="center"><p>SMK TUANKU LAILATUL SHAHREEN, PERLIS</p>
      <p>&nbsp;</p></td>
	<td width="4">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#5C743D"><img src="images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#99CC66" background="../images/mm_dashed_line.gif"><img src="../images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr bgcolor="#99CC66">
  <td>&nbsp;</td>
  	<td colspan="3" id="dateformat" height="20"><a href="index.php">LAMAN UTAMA</a>&nbsp;&nbsp;::&nbsp;&nbsp;
      <script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script></td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#99CC66" background="../images/mm_dashed_line.gif"><img src="../images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#5C743D"><img src="../images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>
 <tr>
    <td width="20">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;<br />
    &nbsp;<br />
    <table border="0" cellspacing="0" cellpadding="2" width="1043">
        <tr>
          <td width="1039" class="pageName"><div align="center">DETAIL MURID</div></td>
        </tr>
        <tr>
          <td class="bodyText"><table border="1" align="center">
            <tr>
              <td>nokp</td>
              <td><?php echo $row_DetailRS1['nokp']; ?> </td>
            </tr>
            <tr>
              <td>nama</td>
              <td><?php echo $row_DetailRS1['nama']; ?> </td>
            </tr>
            <tr>
              <td>tingkatan</td>
              <td><?php echo $row_DetailRS1['tingkatan']; ?> </td>
            </tr>
            <tr>
              <td>kelas</td>
              <td><?php echo $row_DetailRS1['kelas']; ?> </td>
            </tr>
            <tr>
              <td>jantina</td>
              <td><?php echo $row_DetailRS1['jantina']; ?> </td>
            </tr>
            <tr>
              <td>kaum</td>
              <td><?php echo $row_DetailRS1['kaum']; ?> </td>
            </tr>
            <tr>
              <td>agama</td>
              <td><?php echo $row_DetailRS1['agama']; ?> </td>
            </tr>
          </table>          <p>&nbsp;</p>		  </td>
		</tr>
      </table>	</td>
    <td width="4">&nbsp;</td>
  </tr>

 <tr>
    <td width="20">&nbsp;</td>
    <td width="211">&nbsp;</td>
    <td width="833">&nbsp;</td>
	<td width="4">&nbsp;</td>
  </tr>
</table>


</body>
</html><?php
mysql_free_result($DetailRS1);

mysql_free_result($DetailRS2);
?>
