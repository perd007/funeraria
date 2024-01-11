<?php require_once('Connections/funeraria.php'); ?>
<?php

$cedula=$_GET['cedula'];


mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes where cedula='$cedula'";
$clientes = mysql_query($query_clientes, $funeraria) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);
if($totalRows_clientes==0){
	echo "<script type=\"text/javascript\">alert ('No existen clientes con este numero de cedula'); location.href='javascript:close()' </script>";
    exit;
	}
$maxRows_familiares = 7;
$pageNum_familiares = 0;
if (isset($_GET['pageNum_familiares'])) {
  $pageNum_familiares = $_GET['pageNum_familiares'];
}
$startRow_familiares = $pageNum_familiares * $maxRows_familiares;

mysql_select_db($database_funeraria, $funeraria);
$query_familiares = "SELECT * FROM familiares where familiar='$row_clientes[cedula]' ";
$query_limit_familiares = sprintf("%s LIMIT %d, %d", $query_familiares, $startRow_familiares, $maxRows_familiares);
$familiares = mysql_query($query_limit_familiares, $funeraria) or die(mysql_error());
$row_familiares = mysql_fetch_assoc($familiares);

if (isset($_GET['totalRows_familiares'])) {
  $totalRows_familiares = $_GET['totalRows_familiares'];
} else {
  $all_familiares = mysql_query($query_familiares);
  $totalRows_familiares = mysql_num_rows($all_familiares);
}
$totalPages_familiares = ceil($totalRows_familiares/$maxRows_familiares)-1;


mysql_select_db($database_funeraria, $funeraria);
$query_contratos = "SELECT * FROM contratos where cliente='$cedula'";
$contratos = mysql_query($query_contratos, $funeraria) or die(mysql_error());
$row_contratos = mysql_fetch_assoc($contratos);
$totalRows_contratos = mysql_num_rows($contratos);





//consulta de familiares
mysql_select_db($database_funeraria, $funeraria);
$query_familiar2 = "SELECT * FROM familiares where familiar='$row_clientes[cedula]' and puesto=2";
$familiar2 = mysql_query($query_familiar2, $funeraria) or die(mysql_error());
$row_familiar2 = mysql_fetch_assoc($familiar2);


mysql_select_db($database_funeraria, $funeraria);
$query_familiar3 = "SELECT * FROM familiares where familiar='$row_clientes[cedula]' and puesto=3";
$familiar3 = mysql_query($query_familiar3, $funeraria) or die(mysql_error());
$row_familiar3 = mysql_fetch_assoc($familiar3);

mysql_select_db($database_funeraria, $funeraria);
$query_familiar4 = "SELECT * FROM familiares where familiar='$row_clientes[cedula]' and puesto=4";
$familiar4 = mysql_query($query_familiar4, $funeraria) or die(mysql_error());
$row_familiar4 = mysql_fetch_assoc($familiar4);

mysql_select_db($database_funeraria, $funeraria);
$query_familiar5 = "SELECT * FROM familiares where familiar='$row_clientes[cedula]' and puesto=5";
$familiar5 = mysql_query($query_familiar5, $funeraria) or die(mysql_error());
$row_familiar5 = mysql_fetch_assoc($familiar5);

mysql_select_db($database_funeraria, $funeraria);
$query_familiar6 = "SELECT * FROM familiares where familiar='$row_clientes[cedula]' and puesto=6";
$familiar6 = mysql_query($query_familiar6, $funeraria) or die(mysql_error());
$row_familiar6 = mysql_fetch_assoc($familiar6);

mysql_select_db($database_funeraria, $funeraria);
$query_familiar7 = "SELECT * FROM familiares where familiar='$row_clientes[cedula]' and puesto=7";
$familiar7 = mysql_query($query_familiar7, $funeraria) or die(mysql_error());
$row_familiar7 = mysql_fetch_assoc($familiar7);


?>
<html >
<head>

<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--

.Estilo36 {font-size: 24px; font-weight: bold; color: #000000; }
.Estilo35 {font-size: 18px; font-weight: bold; color: #000000; }

-->
</style>
<style type="text/css" media="screen">
#oculto{display:none;}
</style>
<style type="text/css" media="print">
#oculto{display:block;}
</style>

<script language="javascript">
window.print();		
window.close();		
			
</script>

</head>

<body>
<p>&nbsp;</p>
<p><br>
  <br>
  <br>
  <br>
</p>
<div >
  <table width="1202" height="1556" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFF00">
  <tr>
    <td colspan="4"><div align="center" class="Estilo1"></div></td>
  </tr>
  <tr>
    <td height="19" colspan="4"><div align="center" class="Estilo2"><span class="Estilo16"></span></div></td>
  </tr>
  
  <tr>
    <td height="17" colspan="4"><div align="left"><span class="Estilo4"><span class="Estilo5"><span class="Estilo6"><span class="Estilo7"><span class="Estilo4"><span class="Estilo4"><span class="Estilo12"><span class="Estilo12"><span class="Estilo16"><span class="Estilo21"><span class="Estilo24"><span class="Estilo27"><span class="Estilo30"><span class="Estilo35"><span class="Estilo7"><span class="Estilo16"><span class="Estilo16"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_contratos['plan']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></div></td>
  </tr>
  <tr>
    <td height="13" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="13" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="13" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td height="13" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td width="343" height="13"><span class="Estilo16"></span></td>
    <td width="261"><span class="Estilo16"></span></td>
    <td width="317"><span class="Estilo16"></span></td>
    <td width="281">&nbsp;</td>
  </tr>
  <tr>
    <td height="14"><span class="Estilo16"></span></td>
    <td height="14"><span class="Estilo16"></span></td>
    <td height="14"><span class="Estilo16"></span></td>
    <td height="14">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  
  <tr>
    <td height="21" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td height="21" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td height="21" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  
  <tr>
    <td height="17" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="17" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="14" colspan="4">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="14"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
    <td height="14"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
    <td height="14"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
    <td height="14"><span class="Estilo13 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
  </tr>
  
  
  <tr>
    <td height="14"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_contratos['numero']; ?></span></td>
    <td height="14"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_contratos['servicio']; ?></span></td>
    <td height="14"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_contratos['semanal']; ?></span></td>
    <td height="14"><span class="Estilo13 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong class="Estilo36"><?php echo $row_contratos['mensual']; ?></strong></span></td>
  </tr>
  
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="56"><span class="Estilo16"></span></td>
    <td height="56"><span class="Estilo16"></span></td>
    <td height="56" valign="bottom" colspan="2">
     <span class="Estilo36"><?php echo $row_contratos['servicio']; ?></span></td>
  </tr>
  <tr>
    <td height="39">&nbsp;</td>
    <td height="39" colspan="2" class="Estilo36">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_clientes['nombres']; ?>&nbsp;&nbsp;</td>
    <td height="39" class="Estilo36"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_clientes['edad']; ?></span></td>
  </tr>
  <tr>
    <td height="39">&nbsp;</td>
    <td height="39" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_clientes['ciudad']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_clientes['direccion']; ?></span></td>
    <td height="39" class="Estilo36"><span class="Estilo36 Estilo16">&nbsp;</span></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td height="20" colspan="2" valign="bottom" class="Estilo36"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
    <td height="20" class="Estilo36"><span class="Estilo36 Estilo16">&nbsp;</span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32" class="Estilo36"><span class="Estilo36 Estilo16">&nbsp;</span></td>
    <td height="32" class="Estilo36"><span class="Estilo36 Estilo16">&nbsp;</span></td>
    <td height="32" class="Estilo36">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">
      <?php if($totalRows_familiares>=$cont) echo $row_familiares['nombres']; ?>
    </span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo38"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <?php if($totalRows_familiares>=$cont) echo $row_familiares['edad']; ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php if($totalRows_familiares>=$cont) echo $row_familiares['dia']; ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php if($totalRows_familiares>=$cont) echo $row_familiares['mes']; ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php if($totalRows_familiares>=$cont) echo $row_familiares['ano']; ?>
    </span></td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php if($totalRows_familiares>=$cont) echo $row_familiar2['nombres']; ?></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="Estilo38">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php if($totalRows_familiares>=$cont) echo $row_familiar2['edad']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar2['dia']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar2['mes']; ?>
&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar2['ano']; ?>
    </span></span></td>
  </tr>
  
  <tr>
    <td height="32" colspan="2" class="Estilo36">&nbsp;</td>
    <td height="32" colspan="2" class="Estilo36">&nbsp;</td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;<span class="Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="Estilo38">
    <?php if($totalRows_familiares>=$cont) echo $row_familiar3['nombres']; ?>
    </span></span></span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37"><span class="Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="Estilo38">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo38">&nbsp;&nbsp;
            <?php if($totalRows_familiares>=$cont) echo $row_familiar3['edad']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar3['dia']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar3['mes']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar3['ano']; ?>
    </span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo37"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">
    <?php if($totalRows_familiares>=$cont) echo $row_familiar4['nombres']; ?>
    </span></span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo37"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo38"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span class="Estilo38">
      <?php if($totalRows_familiares>=$cont) echo $row_familiar4['edad']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar4['dia']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar4['mes']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar4['ano']; ?>
    </span></span></td>
    </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36">&nbsp;</td>
    <td height="32" colspan="2" class="Estilo36">&nbsp;</td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">
    <?php if($totalRows_familiares>=$cont) echo $row_familiar5['nombres']; ?>
    </span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="Estilo38">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo38">
      <?php if($totalRows_familiares>=$cont) echo $row_familiar5['edad']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar5['dia']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar5['mes']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar5['ano']; ?>
    </span></span></td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="Estilo38">
    <?php if($totalRows_familiares>=$cont) echo $row_familiar6['nombres']; ?>
    </span></span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo37"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo38"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span class="Estilo38">
      <?php if($totalRows_familiares>=$cont) echo $row_familiar6['edad']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar6['dia']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar6['mes']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar6['ano']; ?>
    </span></span></td>
  </tr>
  <tr>
    <td height="32" colspan="2" valign="top" class="Estilo36">&nbsp;</td>
    <td height="32" colspan="2" class="Estilo36">&nbsp;</td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo37"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">
    <?php if($totalRows_familiares>=$cont) echo $row_familiar7['nombres']; ?>
    </span></span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo37"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo38"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span class="Estilo38">
      <?php if($totalRows_familiares>=$cont) echo $row_familiar7['edad']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar7['dia']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar7['mes']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiar7['ano']; ?>
    </span></span></td>
  </tr>
  <tr valign="bottom">
    <td height="32" colspan="4" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row_clientes['observaciones']; ?></td>
    </tr>
  <tr>
    <td height="32" colspan="4" class="Estilo36">&nbsp;</td>
    </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36">&nbsp;</td>
    <td height="32" colspan="2" class="Estilo36">&nbsp;</td>
  </tr>
  <tr>
    <td height="32" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="32" colspan="4"><table width="629" border="0" align="center" class="Estilo36">
      <tr>
        <td ><div align="left"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_contratos['ciudad']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_contratos['dia']; ?><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row_contratos['mes']; ?><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row_contratos['ano']; ?></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="60" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32" colspan="4"><span class="Estilo12"></span><span class="Estilo12"></span><span class="Estilo12"></span><span class="Estilo12"></span></td>
  </tr>
  <tr>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
  </tr>
  <tr>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
  </tr>
  <tr>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
  </tr>
  <tr>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
  </tr>
</table>
</div>
</body>
</html>
<?php
mysql_free_result($clientes);

mysql_free_result($familiares);

mysql_free_result($familiar2);
?>