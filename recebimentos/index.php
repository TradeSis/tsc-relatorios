<?php
include_once(__DIR__ . '/../header.php');

?>

<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>


<body>
    <div class="container-fluid pt-4">

        <div class="list-group">
            <a href="cdleld.php" class="list-group-item">
                <div class="row g-0">
                    <div class="col-1 text-center " style="width: 50px;">
                        <i class="bi bi-file-earmark-text" style="font-size: 35px;"></i>
                    </div>
                    <div class="col ms-2 me-auto">
                        <div class="fw-bold">EP Pagamentos</div>
                        descricao
                    </div>
                </div>
            </a>
            <a href="cdleld2.php" class="list-group-item">
                <div class="row g-0">
                    <div class="col-1 text-center " style="width: 50px;">
                        <i class="bi bi-file-earmark-text" style="font-size: 35px;"></i>
                    </div>
                    <div class="col ms-2 me-auto">
                        <div class="fw-bold">CDC Pagamentos</div>
                        descricao
                    </div>
                </div>
            </a>
            <a href="fin_cre02.php" class="list-group-item">
                <div class="row g-0">
                    <div class="col-1 text-center " style="width: 50px;">
                        <i class="bi bi-file-earmark-text" style="font-size: 35px;"></i>
                    </div>
                    <div class="col ms-2 me-auto">
                        <div class="fw-bold">Resumo Mensal do Caixa</div>
                        descricao
                    </div>
                </div>
            </a>
            <a href="recper.php" class="list-group-item">
                <div class="row g-0">
                    <div class="col-1 text-center " style="width: 50px;">
                        <i class="bi bi-file-earmark-text" style="font-size: 35px;"></i>
                    </div>
                    <div class="col ms-2 me-auto">
                        <div class="fw-bold">Recebimento por período</div>
                        descricao
                    </div>
                </div>
            </a>
            <a href="resliq.php" class="list-group-item">
                <div class="row g-0">
                    <div class="col-1 text-center " style="width: 50px;">
                        <i class="bi bi-file-earmark-text" style="font-size: 35px;"></i>
                    </div>
                    <div class="col ms-2 me-auto">
                        <div class="fw-bold">Resumo liquidações p/periodo geral</div>
                        descricao
                    </div>
                </div>
            </a>
   

        </div>

    </div>

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>


    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>