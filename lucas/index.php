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
            href="?tab=lucas&stab=fin_cre02" role="tab" style="font-size:12px" >Resumo Mensal do Caixa</a>
        </li>
       

      </ul>
    </div>
    <div class="col-md-10">
      <?php
          $ssrc = "";

          if ($stab == "fin_cre02") {
            $ssrc = "fin_cre02.php";
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