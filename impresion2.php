<?php require_once('Connections/funeraria.php'); ?>
<?php



mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes ";
$clientes = mysql_query($query_clientes, $funeraria) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);

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
$query_contratos = "SELECT * FROM contratos ";
$contratos = mysql_query($query_contratos, $funeraria) or die(mysql_error());
$row_contratos = mysql_fetch_assoc($contratos);
$totalRows_contratos = mysql_num_rows($contratos);

?>
<html >
<head>

<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--

.Estilo36 {font-size: 24px; font-weight: bold; color: #000000; }


-->
</style>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="1202" height="1378" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFF00">
  <tr>
    <td colspan="4"><div align="center" class="Estilo1"></div></td>
  </tr>
  <tr>
    <td height="19" colspan="4"><div align="center" class="Estilo2"><span class="Estilo16"></span></div></td>
  </tr>
  
  
  <tr>
    <td height="26" colspan="3"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
    <td width="281" height="26">&nbsp;</td>
  </tr>
  <tr>
    <td height="17" colspan="4"><div align="left"><span class="Estilo4"><span class="Estilo5"><span class="Estilo6"><span class="Estilo7"><span class="Estilo4"><span class="Estilo4"><span class="Estilo12"><span class="Estilo12"><span class="Estilo16"><span class="Estilo21"><span class="Estilo24"><span class="Estilo27"><span class="Estilo30"><span class="Estilo35"><span class="Estilo7"><span class="Estilo16"><span class="Estilo16"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></div></td>
  </tr>
  <tr>
    <td height="13" colspan="4"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_contratos['plan']; ?></span></td>
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
    <td>&nbsp;</td>
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
    <td height="21" colspan="4">&nbsp;</td>
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
    <td height="32"><span class="Estilo16"></span></td>
    <td height="32"><span class="Estilo16"></span></td>
    <td height="32" valign="bottom" colspan="2"><span class="Estilo16"><span class="Estilo36"><?php echo $row_contratos['servicio']; ?></span></span><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
    <td height="32" class="Estilo36">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32" colspan="2" valign="bottom" class="Estilo36">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_clientes['nombres']; ?>&nbsp;</td>
    <td height="32" class="Estilo36"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_clientes['edad']; ?></span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32" class="Estilo36"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_clientes['ciudad']; ?></span></td>
    <td height="32" class="Estilo36"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_clientes['direccion']; ?></span></td>
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
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">
    <?php if($totalRows_familiares>=$cont) echo $row_familiares['nombres']; ?>
    </span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">&nbsp;&nbsp;&nbsp;
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
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>    </td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">
      <?php if($totalRows_familiares>=$cont) echo $row_familiares['nombres']; ?>
    </span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">&nbsp;&nbsp;&nbsp;
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
    <td height="32" class="Estilo36"><span class="Estilo37"></span></td>
    <td height="32" class="Estilo36"><span class="Estilo37"></span></td>
    <td height="32" class="Estilo36"><span class="Estilo37"></span></td>
    <td height="32" class="Estilo36"><span class="Estilo37"></span></td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">
      <?php if($totalRows_familiares>=$cont) echo $row_familiares['nombres']; ?>
    </span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">&nbsp;&nbsp;&nbsp;
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
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">
    <?php if($totalRows_familiares>=$cont) echo $row_familiares['nombres']; ?>
    </span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">&nbsp;&nbsp;&nbsp;
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
    <td height="32" colspan="2" valign="top" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>    </td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">
    <?php if($totalRows_familiares>=$cont) echo $row_familiares['nombres']; ?>
    </span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">&nbsp;&nbsp;&nbsp;
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
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="Estilo38">
    <?php if($totalRows_familiares>=$cont) echo $row_familiares['nombres']; ?>
    </span></span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo37"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">&nbsp;&nbsp;&nbsp;
          <?php if($totalRows_familiares>=$cont) echo $row_familiares['edad']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiares['dia']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiares['mes']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiares['ano']; ?>
    </span></span></td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36">&nbsp;</td>
    <td height="32" colspan="2" class="Estilo36">&nbsp;</td>
  </tr>
  <tr>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo37"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">
    <?php if($totalRows_familiares>=$cont) echo $row_familiares['nombres']; ?>
    </span></span></td>
    <td height="32" colspan="2" class="Estilo36"><span class="Estilo37"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="Estilo38">&nbsp;&nbsp;&nbsp;
          <?php if($totalRows_familiares>=$cont) echo $row_familiares['edad']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiares['dia']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiares['mes']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($totalRows_familiares>=$cont) echo $row_familiares['ano']; ?>
    </span></span></td>
  </tr>
  <tr>
    <td height="32" colspan="4"><span class="Estilo36"><span class="Estilo36 Estilo16 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row_clientes['observaciones']; ?></span></td>
  </tr>
  <tr>
    <td height="32" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32" colspan="3" class="Estilo36">&nbsp;</td>
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
    <td height="32" colspan="4"><span class="Estilo12"></span><span class="Estilo12"></span><span class="Estilo12"></span>
      <table width="768" border="0" align="center" class="Estilo36">
        <tr>
          <td width="282"><div align="right"><?php echo $row_contratos['ciudad']; ?></div></td>
          <td width="152"><div align="center"><?php echo $row_contratos['dia']; ?></div></td>
          <td width="159"><div align="left"><?php echo $row_contratos['mes']; ?></div></td>
          <td width="157"><div align="left"><?php echo $row_contratos['ano']; ?></div></td>
        </tr>
      </table>      
    <span class="Estilo12"></span></td>
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
</body>
</html>
<?php
mysql_free_result($clientes);

mysql_free_result($familiares);
?>