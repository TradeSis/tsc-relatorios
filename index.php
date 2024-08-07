<?php
include_once __DIR__ . "/../config.php";
include_once "header.php";

if (
    !isset($_SESSION['nomeAplicativo']) || 
    $_SESSION['nomeAplicativo'] !== 'Relatorios' || 
    !isset($_SESSION['nivelMenu']) || 
    $_SESSION['nivelMenu'] === null
) {
    $_SESSION['nomeAplicativo'] = 'Relatorios';
    include_once ROOT . "/sistema/database/loginAplicativo.php";

    $nivelMenuLogin = buscaLoginAplicativo($_SESSION['idLogin'], $_SESSION['nomeAplicativo']);
    $_SESSION['nivelMenu'] = $nivelMenuLogin['nivelMenu'];
}
?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>
    <title>Relatórios</title>

</head>

<body>
    <?php include_once  ROOT . "/sistema/painelmobile.php"; ?>

    <div class="d-flex">

        <?php include_once  ROOT . "/sistema/painel.php"; ?>

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-10 d-none d-md-none d-lg-block pr-0 pl-0 ts-bgAplicativos">
                    <ul class="nav a" id="myTabs">


                        <?php
                        $tab = '';

                        if (isset($_GET['tab'])) {
                            $tab = $_GET['tab'];
                        }
                        ?>
                        <?php if ($_SESSION['nivelMenu'] >= 2) {
                            if ($tab == '') {
                                $tab = 'relatorios';
                            } ?>
                            <li class="nav-item mr-1">
                                <a class="nav-link 
                                <?php if ($tab == "relatorios") {echo " active ";} ?>" 
                                href="?tab=relatorios" role="tab">Relatórios</a>
                            </li>
                            <li class="nav-item mr-1">
                                <a class="nav-link 
                                <?php if ($tab == "crediario") {echo " active ";} ?>" 
                                href="?tab=crediario" role="tab">Crediário</a>
                            </li>
                            <li class="nav-item mr-1">
                                <a class="nav-link 
                                <?php if ($tab == "recebimentos") {echo " active ";} ?>" 
                                href="?tab=recebimentos" role="tab">Recebimentos</a>
                            </li>
                            <li class="nav-item mr-1">
                                <a class="nav-link 
                                <?php if ($tab == "contabilidade") {echo " active ";} ?>" 
                                href="?tab=contabilidade" role="tab">Contabilidade</a>
                            </li>
                            <li class="nav-item mr-1">
                                <a class="nav-link 
                                <?php if ($tab == "cobranca") {echo " active ";} ?>" 
                                href="?tab=cobranca" role="tab">Cobrança</a>
                            </li>
                            <li class="nav-item mr-1">
                                <a class="nav-link 
                                <?php if ($tab == "novacoes") {echo " active ";} ?>" 
                                href="?tab=novacoes" role="tab">Novações</a>
                            </li>
                            
                        <?php }
                           ?>
                    </ul>

                </div>
                <!--Essa coluna só vai aparecer em dispositivo mobile-->
                <div class="col-7 col-md-9 d-md-block d-lg-none ts-bgAplicativos">
                    <!--atraves do GET testa o valor para selecionar um option no select-->
                    <?php if (isset($_GET['tab'])) {
                        $getTab = $_GET['tab'];
                    } else {
                        $getTab = '';
                    } ?>
                    <select class="form-select mt-2 ts-selectSubMenuAplicativos" id="subtabRelatorios">

                        <?php if ($_SESSION['nivelMenu'] >= 2) { ?>
                        <option value="<?php echo URLROOT ?>/relatorios/?tab=relatorios" 
                        <?php if ($getTab == "relatorios") {echo " selected ";} ?>>Relatórios</option>
                        <?php } ?>
                        
                        <?php if ($_SESSION['nivelMenu'] >= 2) { ?>
                        <option value="<?php echo URLROOT ?>/relatorios/?tab=crediario" 
                        <?php if ($getTab == "crediario") {echo " selected ";} ?>>Crediário</option>
                        <?php } ?>                        

                        <?php if ($_SESSION['nivelMenu'] >= 2) { ?>
                        <option value="<?php echo URLROOT ?>/relatorios/?tab=recebimentos" 
                        <?php if ($getTab == "recebimentos") {echo " selected ";} ?>>Recebimentos</option>
                        <?php } ?>

                        <?php if ($_SESSION['nivelMenu'] >= 2) { ?>
                        <option value="<?php echo URLROOT ?>/relatorios/?tab=contabilidade" 
                        <?php if ($getTab == "contabilidade") {echo " selected ";} ?>>Contabilidade</option>
                        <?php } ?>

                        <?php if ($_SESSION['nivelMenu'] >= 2) { ?>
                        <option value="<?php echo URLROOT ?>/relatorios/?tab=cobranca" 
                        <?php if ($getTab == "cobranca") {echo " selected ";} ?>>Cobrança</option>
                        <?php } ?>

                        <?php if ($_SESSION['nivelMenu'] >= 2) { ?>
                        <option value="<?php echo URLROOT ?>/relatorios/?tab=novacoes" 
                        <?php if ($getTab == "novacoes") {echo " selected ";} ?>>Novações</option>
                        <?php } ?>                        
                    </select>
                </div>

                <?php include_once  ROOT . "/sistema/novoperfil.php"; ?>

            </div>



            <?php
            $src = "";

            if ($tab == "relatorios") {
                $src = "relatorios/";
            }
            if ($tab == "crediario") {
                $src = "crediario/";
            }
            if ($tab == "recebimentos") {
                $src = "recebimentos/";
            }
            if ($tab == "contabilidade") {
                $src = "contabilidade/";
            }
            if ($tab == "cobranca") {
                $src = "cobranca/";
            }
            if ($tab == "novacoes") {
                $src = "novacoes/";
            }
            
            if ($src !== "") {
                //echo URLROOT ."/cadastros/". $src;
            ?>
                <div class="container-fluid p-0 m-0">
                    <iframe class="row p-0 m-0 ts-iframe" src="<?php echo URLROOT ?>/relatorios/<?php echo $src ?>"></iframe>
                </div>
            <?php
            }
            ?>
        </div><!-- div container -->
    </div><!-- div class="d-flex" -->

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script src="<?php echo URLROOT ?>/sistema/js/mobileSelectTabs.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>