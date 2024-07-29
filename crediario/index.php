<?php
// lucas 23022024 - criado programa
include_once '../head.php';
?>

<!doctype html>
<html lang="pt-BR">
<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>

<div class="container-fluid">
  <div class="row mt-3" ><!-- style="border: 1px solid #DFDFDF;" -->
    <div class="col-md-2 ">
      <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
        <?php
        $stab = 'fin_cre02';
        if (isset($_GET['stab'])) {
          $stab = $_GET['stab'];
        }
        //echo "<HR>stab=" . $stab;
        ?>
        <li class="nav-item ">
          <a class="nav-link ts-tabConfig <?php if ($stab == "fin_cre02") {
            echo " active ";
          } ?>"
            href="?tab=crediario&stab=fin_cre02" role="tab" style="font-size:12px" >Resumo Mensal do Caixa</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link ts-tabConfig <?php if ($stab == "recper") {
            echo " active ";
          } ?>"
            href="?tab=crediario&stab=recper" role="tab" style="font-size:12px" >Recebimento por período</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link ts-tabConfig <?php if ($stab == "frrescart_v1801") {
            echo " active ";
          } ?>"
            href="?tab=crediario&stab=frrescart_v1801" role="tab" style="font-size:12px" >Controle de Carteira (NOVO)</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link ts-tabConfig <?php if ($stab == "rec-moe-nov") {
            echo " active ";
          } ?>"
            href="?tab=crediario&stab=rec-moe-nov" role="tab" style="font-size:12px" >Novações Caixa/Filial</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link ts-tabConfig <?php if ($stab == "frsalcart_v2002") {
            echo " active ";
          } ?>"
            href="?tab=crediario&stab=frsalcart_v2002" role="tab" style="font-size:12px" >Vencidos e a Vencer (NOVO)</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link ts-tabConfig <?php if ($stab == "resliq") {
            echo " active ";
          } ?>"
            href="?tab=crediario&stab=resliq" role="tab" style="font-size:12px" >Resumo liquidações p/periodo geral</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link ts-tabConfig <?php if ($stab == "connov01_v0718") {
            echo " active ";
          } ?>"
            href="?tab=crediario&stab=connov01_v0718" role="tab" style="font-size:12px" > Novações por filial ok</a>
        </li>
       
       
      </ul>
    </div>
    <div class="col-md-10">
      <?php
          $ssrc = "";

          if ($stab == "fin_cre02") {
            $ssrc = "fin_cre02.php";
          }
          if ($stab == "recper") {
            $ssrc = "recper.php";
          }
          if ($stab == "frrescart_v1801") {
            $ssrc = "frrescart_v1801.php";
          }
          if ($stab == "rec-moe-nov") {
            $ssrc = "rec-moe-nov.php";
          }
          if ($stab == "frsalcart_v2002") {
            $ssrc = "frsalcart_v2002.php";
          }
          if ($stab == "resliq") {
            $ssrc = "resliq.php";
          }
          if ($stab == "connov01_v0718") {
            $ssrc = "connov01_v0718.php";
          }
          

          if ($ssrc !== "") {
            //echo $ssrc;
            include($ssrc);
          }

      ?>

    </div>
  </div>



</div>
<!-- /.container -->

<!-- LOCAL PARA COLOCAR OS JS -->

<?php include_once ROOT . "/vendor/footer_js.php"; ?>

<!-- LOCAL PARA COLOCAR OS JS -FIM -->