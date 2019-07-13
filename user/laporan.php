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

$colname_Recordset1 = "-1";
if (isset($_GET['nama'])) {
  $colname_Recordset1 = $_GET['nama'];
}
$colname2_Recordset1 = "-1";
if (isset($_GET['tingkatan'])) {
  $colname2_Recordset1 = $_GET['tingkatan'];
}
$colname3_Recordset1 = "-1";
if (isset($_GET['kelas'])) {
  $colname3_Recordset1 = $_GET['kelas'];
}
mysql_select_db($database_sistemacik, $sistemacik);
$query_Recordset1 = sprintf("SELECT datamurid.nokp,datamurid.nama,datamurid.tingkatan,datamurid.kelas,datamurid.jantina,datamurid.kaum,datamurid.agama,pembantupadang.nokp,pembantupadang.nama,pembantupadang.tingkatan,pembantupadang.kelas,pembantupadang.acara FROM datamurid,pembantupadang WHERE datamurid.nokp = pembantupadang.nokp AND datamurid.nama LIKE %s AND datamurid.tingkatan  LIKE %s AND datamurid.kelas LIKE %s ORDER BY datamurid.nama ASC", GetSQLValueString("%" . $colname_Recordset1, "text"),GetSQLValueString("%" . $colname2_Recordset1 . "%", "text"),GetSQLValueString("%" . $colname3_Recordset1 . "%", "text"));
$Recordset1 = mysql_query($query_Recordset1, $sistemacik) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>LAPORAN</title>
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
    <td width="1415" height="50" id="logo" valign="bottom" align="center" nowrap="nowrap">SISTEM PENDAFTARAN PEMBANTU PADANG RUMAH NEPTUNE</td>
    <td width="61">&nbsp;</td>
  </tr>

  <tr bgcolor="#D5EDB3">
    <td height="51" id="tagline" valign="top" align="center"><p>SMK TUANKU LAILATUL SHAHREEN, PERLIS</p>
      <p>&nbsp;</p></td>
	<td width="61">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#5C743D"><img src="images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#99CC66" background="images/mm_dashed_line.gif"><img src="images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr bgcolor="#99CC66">
  <td>&nbsp;</td>
  	<td colspan="3" id="dateformat" height="20"><a href="index.php">LAMAN UTAMA</a>&nbsp;&nbsp;::&nbsp;&nbsp;
      <script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script></td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#99CC66" background="images/mm_dashed_line.gif"><img src="images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#5C743D"><img src="images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>
 <tr>
    <td width="20">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;<br />
    &nbsp;<br />
    <table border="0" cellspacing="0" cellpadding="2" width="500">
        <tr>
          <td class="pageName"><div align="center">LAPORAN PENDAFTARAN PEMBANTU PADANG</div></td>
        </tr>
        <tr>
          <td class="bodyText"><form id="form1" name="form1" method="get" action="">
            <table width="200" border="2" align="center">
              <tr>
                <td>NAMA</td>
                <td><label>
                  <input type="text" name="nama" id="nama" />
                </label></td>
                <td>TINGKATAN</td>
                <td><select name="tingkatan" id="tingkatan">
                  <option value="">SILA PILIH</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select></td>
                <td>KELAS</td>
                <td><select name="kelas" id="kelas">
                  <option value="SILA PILIH" selected="selected">SILA PILIH</option>
                  <option value="DINAMIK">DINAMIK</option>
                  <option value="KREATIF">KREATIF</option>
                  <option value="PROGRESIF">PROGRESIF</option>
                  <option value="BESTARI">BESTARI</option>
                </select></td>
              </tr>
              <tr>
                <td colspan="6"><label>
                  <div align="center">
                    <input type="submit" name="cari" id="cari" value="CARI" />
                  </div>
                  </label></td>
                </tr>
            </table>
                    </form>          <p>&nbsp;
                    <table border="1" align="center">
                      <tr>
                        <td>nokp</td>
                        <td>nama</td>
                        <td>tingkatan</td>
                        <td>kelas</td>
                        <td>jantina</td>
                        <td>kaum</td>
                        <td>agama</td>
                        <td>nokp</td>
                        <td>nama</td>
                        <td>tingkatan</td>
                        <td>kelas</td>
                        <td>acara</td>
                      </tr>
                      <?php do { ?>
                        <tr>
                          <td><a href="detailcarian.php?recordID=<?php echo $row_Recordset1['nokp']; ?>"> <?php echo $row_Recordset1['nokp']; ?>&nbsp; </a> </td>
                          <td><?php echo $row_Recordset1['nama']; ?>&nbsp; </td>
                          <td><?php echo $row_Recordset1['tingkatan']; ?>&nbsp; </td>
                          <td><?php echo $row_Recordset1['kelas']; ?>&nbsp; </td>
                          <td><?php echo $row_Recordset1['jantina']; ?>&nbsp; </td>
                          <td><?php echo $row_Recordset1['kaum']; ?>&nbsp; </td>
                          <td><?php echo $row_Recordset1['agama']; ?>&nbsp; </td>
                          <td><a href="detailcarian.php?recordID=<?php echo $row_Recordset1['nokp']; ?>"> <?php echo $row_Recordset1['nokp']; ?>&nbsp; </a> </td>
                          <td><?php echo $row_Recordset1['nama']; ?>&nbsp; </td>
                          <td><?php echo $row_Recordset1['tingkatan']; ?>&nbsp; </td>
                          <td><?php echo $row_Recordset1['kelas']; ?>&nbsp; </td>
                          <td><?php echo $row_Recordset1['acara']; ?>&nbsp; </td>
                        </tr>
                        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                    </table>
                    <br />
                    <?php echo $totalRows_Recordset1 ?> Records Total </td>
		</tr>
      </table>	</td>
    <td width="61">&nbsp;</td>
  </tr>

 <tr>
    <td width="20">&nbsp;</td>
    <td width="173">&nbsp;</td>
    <td width="1415">&nbsp;</td>
	<td width="61">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);

?>
