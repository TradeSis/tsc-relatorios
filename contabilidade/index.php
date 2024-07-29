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
        $stab = 'cdleld';
        if (isset($_GET['stab'])) {
          $stab = $_GET['stab'];
        }
        //echo "<HR>stab=" . $stab;
        ?>
        <li class="nav-item ">
          <a class="nav-link ts-tabConfig <?php if ($stab == "cdleld") {
            echo " active ";
          } ?>"
            href="?tab=contabilidade&stab=cdleld" role="tab" style="font-size:12px" >EP Pagamentos</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link ts-tabConfig <?php if ($stab == "cdleld2") {
            echo " active ";
          } ?>"
            href="?tab=contabilidade&stab=cdleld2" role="tab" style="font-size:12px" >CDC Pagamentos</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link ts-tabConfig <?php if ($stab == "aco13j") {
            echo " active ";
          } ?>"
            href="?tab=contabilidade&stab=aco13j" role="tab" style="font-size:12px" >CP-CDC Acordos gerados na data TIT</a>
        </li>
        
      </ul>
    </div>
    <div class="col-md-10">
      <?php
          $ssrc = "";

          if ($stab == "cdleld") {
            $ssrc = "cdleld.php";
          }
          if ($stab == "cdleld2") {
            $ssrc = "cdleld2.php";
          }
          if ($stab == "aco13j") {
            $ssrc = "aco13j.php";
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