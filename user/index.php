<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Home Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../images/mm_health_nutr.css" type="text/css" />
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
    <td colspan="3" rowspan="2"><img src="../SMKTLS.jpg" width="207" height="244" /></td>
    <td height="50" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap">SISTEM PENDAFTARAN PEMBANTU PADANG RUMAH NEPTUNE</td>
    <td width="5">&nbsp;</td>
  </tr>

  <tr bgcolor="#D5EDB3">
    <td height="51" colspan="3" id="tagline" valign="top" align="center">SMK TUANKU LAILATUL SHAHREEN, PERLIS</td>
	<td width="5">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#5C743D"><img src="images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#99CC66" background="../images/mm_dashed_line.gif"><img src="../images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr bgcolor="#99CC66">
  	<td colspan="7" id="dateformat" height="20">&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script>	</td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#99CC66" background="images/mm_dashed_line.gif"><img src="../images/mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#5C743D"><img src="../images/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

 <tr>
    <td width="165" valign="top" bgcolor="#5C743D">
	<table border="0" cellspacing="0" cellpadding="0" width="165" id="navigation">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="165"><a href="daftarmurid.php" class="navText">DAFTAR MURID</a></td>
        </tr>
        <tr>
          <td width="165"><a href="senaraimurid.php" class="navText">SENARAI MURID</a></td>
        </tr>
        <tr>
          <td width="165"><a href="daftarpempp.php" class="navText">DAFTAR ACARA</a></td>
        </tr>
        <tr>
          <td width="165"><a href="laporan.php" class="navText">LAPORAN</a></td>
        </tr>
        <tr>
          <td width="165"><a href="<?php echo $logoutAction ?>" class="navText">LOG KELUAR</a></td>
        </tr>
      </table>
 	 <br />
  	&nbsp;<br />
  	&nbsp;<br />
  	&nbsp;<br /> 	</td>
    <td width="50"><img src="images/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td colspan="2" valign="top"><img src="images/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;<br />
	<table border="0" cellspacing="0" cellpadding="0" width="305">
        <tr>
          <td class="pageName">SELAMAT DATANG</td>
		</tr>

		<tr>
          <td height="51" class="bodyText"><p>Selamat datang ke Sistem Pendaftaran Pembantu Padang Rumah Neptune (SISPEK) SMK Tuanku Lailatul Shahreen. Sistem ini dibangunkan bagi memudahkan pendaftaran pembantu padang oleh pelajar-pelajar SMK Tuanku Lailatul Shahreen. Selain itu juga sistem ini dapat membantu para guru dalam aspek pengurusan unit pembantu padang masing-masing.</p>
          <p>Adalah diharapkan, sistem ini dapat memberi manfaat kepada seluruh warga SMK Tuanku Lailatul Shahreen, selamat menggunakan sistem ini dengan jayanya.</p>
          <p>Sebarang masalah dan cadangan, boleh kemukakan pada email yang disediakan</p>
          <p>asyraafhilmie@gmail.com</p>
          <p>Sekian, terima kasih</p>
          </td>
        </tr>
      </table>
	 <br />
	&nbsp;<br />	</td>
    <td width="94"><img src="images/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
        <td width="360" valign="top"><br />
		&nbsp;<br />
		<table border="0" cellspacing="0" cellpadding="0" width="190" id="leftcol">

	   <tr>
       <td width="10"><img src="images/mm_spacer.gif" alt="" width="10" height="1" border="0" /></td>
		<td width="170" class="smallText"><br />
			<p><span class="subHeader">TITLE HERE</span><br />
			Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam. </p>

			<p><span class="subHeader">TITLE HERE</span><br />
			Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam. </p>

			<p><span class="subHeader">TITLE HERE</span><br />
			Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam. </p>

			 <br />
			&nbsp;<br />          </td>
         <td width="10">&nbsp;</td>
        </tr>
      </table>	</td>
	<td width="5">&nbsp;</td>
  </tr>
  <tr>
    <td width="165">&nbsp;</td>
    <td width="50">&nbsp;</td>
    <td width="6">&nbsp;</td>
    <td width="408">&nbsp;</td>
    <td width="94">&nbsp;</td>
    <td width="360">&nbsp;</td>
	<td width="5">&nbsp;</td>
  </tr>
</table>
</body>
</html>
