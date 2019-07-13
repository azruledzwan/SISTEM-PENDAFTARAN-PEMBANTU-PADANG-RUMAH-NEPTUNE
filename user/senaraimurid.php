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

mysql_select_db($database_sistemacik, $sistemacik);
$query_Recordset1 = "SELECT * FROM datamurid";
$Recordset1 = mysql_query($query_Recordset1, $sistemacik) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>SENARAI MURID</title>
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
<style type="text/css">
<!--
.style8 {font-size: 12px; color: #000000; font-style: italic; font-family: "Times New Roman", Times, serif; font-weight: bold; }
.style9 {
	color: #000000;
	font-style: italic;
	font-weight: bold;
}
-->
</style>
</head>
<body bgcolor="#F4FFE4">
<?php
if (isset($_POST['btn_uploadpic']))
{
	$id=$_POST['hf_nama'];
	move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/".$id.".jpg");
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#D5EDB3">
    <td colspan="2" rowspan="2"><img src="../SMKTLS.jpg" width="194" height="227" /></td>
    <td width="1174" height="50" id="logo" valign="bottom" align="center" nowrap="nowrap">SISTEM PENDAFTARAN PEMBANTU PADANG RUMAH NEPTUNE</td>
    <td width="61">&nbsp;</td>
  </tr>

  <tr bgcolor="#D5EDB3">
    <td height="51" id="tagline" valign="top" align="center"><p>SMK TUANKU LAILATUL SHAHREEN, PERLIS</p>
      <p>&nbsp;</p></td>
	<td width="61">&nbsp;</td>
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
    <td colspan="4" bgcolor="#99CC66" background="images/mm_dashed_line.gif"><img src="images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#5C743D"><img src="images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>
 <tr>
    <td width="20">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;<br />
    &nbsp;<br />
    <table border="0" cellspacing="0" cellpadding="2" width="1124">
        <tr>
          <td width="1120" class="pageName">SENARAI MURID</td>
        </tr>
        <tr>
          <td class="bodyText"><p>&nbsp;
            <table border="1" align="center">
              <tr bgcolor="#9900FF">
                <td width="90"><div align="center" class="style8">Nokp</div></td>
                <td width="93"><div align="center" class="style8">Nama</div></td>
                <td width="110"><div align="center" class="style8">Tingkatan</div></td>
                <td width="92"><div align="center" class="style8">Kelas</div></td>
                <td width="98"><div align="center" class="style8">Jantina</div></td>
                <td width="92"><div align="center" class="style8">Kaum</div></td>
                <td width="99"><div align="center" class="style8">Agama</div></td>
                <td width="56"><div align="center" class="style8">Kemaskini </div></td>
                <td width="37"><div align="center" class="style8">Padam </div></td>
                <td width="32"><div align="center" class="style9">Muat Naik</div></td>
                <td width="46"><div align="center" class="style9">Gambar</div></td>
              </tr>
              <?php do { ?>
                <tr>
                  <td><a href="detailmurid.php?recordID=<?php echo $row_Recordset1['nokp']; ?>"> <?php echo $row_Recordset1['nokp']; ?>&nbsp; </a> </td>
                  <td><?php echo $row_Recordset1['nama']; ?>&nbsp; </td>
                  <td><?php echo $row_Recordset1['tingkatan']; ?>&nbsp; </td>
                  <td><?php echo $row_Recordset1['kelas']; ?>&nbsp; </td>
                  <td><?php echo $row_Recordset1['jantina']; ?>&nbsp; </td>
                  <td><?php echo $row_Recordset1['kaum']; ?>&nbsp; </td>
                  <td><?php echo $row_Recordset1['agama']; ?>&nbsp; </td>
                  <td><div align="center"><a href="editmurid.php?recordID=<?php echo $row_Recordset1['nokp']; ?>">Kemaskini</a></div></td>
                  <td><div align="center"><a href="deletemurid.php?recordID=<?php echo $row_Recordset1['nokp']; ?>">Padam</a></div></td>
                  <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                  			<label>
                            <input type="file" name="file" id="file" />
                            <input type="submit" name="btn_uploadpic" id="btn_uploadpic" value="Muat Naik Gambar" />
                            <label>
                            		<input name="hf_nama" type="hidden" id="hf_nama" value="<?php echo
									$row_Recordset1['nama']; ?>" />
                                    </form></td>
                  <td><img src="../upload/<?php echo $row_Recordset1['nama']; ?>.jpg" width="67" height="81" /></td>
                </tr>
                <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
            </table>
            <br />
            <?php echo $totalRows_Recordset1 ?> Records Total
          </p></td>
		</tr>
      </table>	</td>
    <td width="61">&nbsp;</td>
  </tr>

 <tr>
    <td width="20">&nbsp;</td>
    <td width="173">&nbsp;</td>
    <td width="1174">&nbsp;</td>
	<td width="61">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
