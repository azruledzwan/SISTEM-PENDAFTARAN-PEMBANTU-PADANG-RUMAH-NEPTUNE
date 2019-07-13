<?php require_once('../Connections/sistemacik.php'); ?>
<?php
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO pembantupadang (nokp, nama, tingkatan, kelas, acara) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nokp'], "text"),
                       GetSQLValueString($_POST['nama'], "text"),
                       GetSQLValueString($_POST['tingkatan'], "text"),
                       GetSQLValueString($_POST['kelas'], "text"),
                       GetSQLValueString($_POST['acara'], "text"));

  mysql_select_db($database_sistemacik, $sistemacik);
  $Result1 = mysql_query($insertSQL, $sistemacik) or die(mysql_error());

  $insertGoTo = "berjaya2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_sistemacik, $sistemacik);
$query_Recordset1 = "SELECT * FROM pembantupadang";
$Recordset1 = mysql_query($query_Recordset1, $sistemacik) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Text</title>
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
    <td colspan="4" bgcolor="#5C743D"><img src="../images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
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
    <table border="0" cellspacing="0" cellpadding="2" width="1044">
        <tr>
          <td width="1040" class="pageName"><div align="center">PEMBANTU PADANG RUMAH NEPTUNE</div></td>
        </tr>
        <tr>
          <td class="bodyText"><p>&nbsp;</p>		  
            <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
              <table align="center">
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right">Nokp:</td>
                  <td><input name="nokp" type="text" value="" size="32" maxlength="12" /></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right">Nama:</td>
                  <td><input type="text" name="nama" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right">Tingkatan:</td>
                  <td><label>
                    <select name="tingkatan" id="tingkatan">
                      <option value="">SILA PILIH</option>
                      <option value="P">P</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </label></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right">Kelas:</td>
                  <td><label>
                    <select name="kelas" id="kelas">
                      <option value="" selected="selected">SILA PILIH</option>
                      <option value="P">P</option>
                      <option value="PROGRESIF">PROGRESIF</option>
                      <option value="KREATIF">KREATIF</option>
                      <option value="DINAMIK">DINAMIK</option>
                      <option value="BESTARI">BESTARI</option>
                    </select>
                  </label></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right">Acara:</td>
                  <td><label>
                    <select name="acara" id="acara">
                      <option value="" selected="selected">SILA PILIH</option>
                      <option value="P">P</option>
                      <option value="LOMPAT JAUH">LOMPAT JAUH</option>
                      <option value="LOMPAT TINGGI">LOMPAT TINGGI</option>
                      <option value="LEMPAR CAKERA">LEMPAR CAKERA</option>
                      <option value="REJAM LEMBING">REJAM LEMBING</option>
                      <option value="LARI 200m">LARI 200m</option>
                      <option value="LARI 1500m">LARI 1500m</option>
                    </select>
                  </label></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right">&nbsp;</td>
                  <td><input type="submit" value="DAFTAR" /></td>
                </tr>
              </table>
              <input type="hidden" name="MM_insert" value="form1" />
            </form>
          <p>&nbsp;</p></td>
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
</html>
<?php
mysql_free_result($Recordset1);
?>