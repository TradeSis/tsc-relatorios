<?php
// lucas 23022024 - criado programa

include_once('../head.php');
$filial = explode(":", $_SERVER['REMOTE_ADDR']);
$filial = isset($filial[2]);

$progcod = "aco13j";
?>

<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>

<body class="bg-transparent">

    <?php include_once '../agendamento/agendamento_modal.php' ?>

    <div class="container pt-3" style="width:700px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-10">
                        <h4 class="col">CP-CDC Acordos gerados na data</h4>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="#" onclick="history.back()" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/relatorios.php?operacao=aco13j" method="post">
                    <div class="row">
                        <div class="col">
                            <label>Usuário</label>
                            <div class="form-group">
                                <input type="text" name="usercod" class="form-control" value="Lebes" autocomplete="off" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <label>Programa</label>
                            <div class="form-group">
                                <input type="text" name="progcod" class="form-control" value="aco13j" autocomplete="off" readonly>
                            </div>
                        </div>

                    </div>
                    <label>Nome do relatório</label>
                    <div class="form-group">
                        <input type="text" name="relatnom" class="form-control" value="CP-CDC Acordos gerados na data TIT" autocomplete="off" readonly>
                        <input type="text" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" name="REMOTE_ADDR" hidden>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col">
                            <label class="mt-4">Contratos emitidos de: </label>
                        </div>
                        <div class="form-group col mt-3">
                            <div class="input-group mb-2">
                                <button class="btn btn-outline-secondary" type="button" id="button-dataInicial" title="Data Fixa"><i class="bi bi-arrow-repeat"></i></button>
                                <input type="date" class="form-control input-dataInicial" name="dataInicial" id="dataInicial">
                                <select class="form-control d-none select-dataInicial" name="dataInicial" id="dataInicial" disabled>
                                    <option value="#HOJE">#HOJE</option>
                                    <option value="#HOJE-">#HOJE-</option>
                                    <option value="#DIAPRIMES">#DIAPRIMES</option>
                                    <option value="#DIAULTMES">#DIAULTMES</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-1">
                            <label class="mt-4">Até: </label>
                        </div>
                        <div class="form-group col mt-3">
                            <div class="input-group mb-2">
                                <button class="btn btn-outline-secondary" type="button" id="button-dataFinal" title="Data Fixa"><i class="bi bi-arrow-repeat"></i></button>
                                <input type="date" class="form-control input-dataFinal" name="dataFinal" id="dataFinal">
                                <select class="form-control d-none select-dataFinal" name="dataFinal" id="dataFinal" disabled>
                                    <option value="#HOJE">#HOJE</option>
                                    <option value="#HOJE-">#HOJE-</option>
                                    <option value="#DIAPRIMES">#DIAPRIMES</option>
                                    <option value="#DIAULTMES">#DIAULTMES</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div><!-- container -->
            <div class="card-footer bg-transparent mt-2" style="text-align:right">
                <button type="submit" class="btn btn-sm btn-success">Gerar Relatório</button>
                </form>
                <button type="buttom" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalAgendamento">Agendar Relatório</button>
            </div>

        </div><!-- card shadow -->
    </div><!-- container -->

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script>
        $(document).ready(function() {

            $("#formAgendamento").submit(function(event) {
                dataInicial = $(".input-dataInicial").val() != "" ? $(".input-dataInicial").val() : $(".select-dataInicial").val();
                dataFinal = $(".input-dataFinal").val() != "" ? $(".input-dataFinal").val() : $(".select-dataFinal").val();

                event.preventDefault();
                var formData = new FormData(this);
                //formulario de parametros
                formData.append("dataInicial", dataInicial);
                formData.append("dataFinal", dataFinal);
                /* for (var pair2 of formData.entries()) {
                    console.log(pair2[0] + " - " + pair2[1]);
                } */

                $.ajax({
                    url: "../database/agendamento.php?relatorio=aco13j",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

            function refreshPage() {
                window.location.reload();
                var url = window.location.href;
                url = url.replace('_inserir', '')
                window.location.href = url;
            }
        });

         // DATA\SELECT - DATA INICIAL
         $("#button-dataInicial").click(function() {
            $(".input-dataInicial").toggleClass("d-none");
            $(".select-dataInicial").toggleClass("d-none");

            var elemento = document.getElementById("dataInicial");
            var classe = elemento.getAttribute("class");
            //alert(classe.lastIndexOf("d-none"))
            if (classe[31] == "d") {
                $("#button-dataInicial").prop("title", "Data Digitável");
                $(".input-dataInicial").prop("disabled", true);
                $(".select-dataInicial").prop("disabled", false);
            } else {
                $("#button-dataInicial").prop("title", "Data Fixa");
                $(".input-dataInicial").prop("disabled", false);
                $(".select-dataInicial").prop("disabled", true);
            }
        });

        // DATA\SELECT - DATA FINAL
        $("#button-dataFinal").click(function() {
            $(".input-dataFinal").toggleClass("d-none");
            $(".select-dataFinal").toggleClass("d-none");

            var elemento = document.getElementById("dataFinal");
            var classe = elemento.getAttribute("class");

            if (classe[29] == "d") {
                $("#button-dataFinal").prop("title", "Data Digitável");
                $(".input-dataFinal").prop("disabled", true);
                $(".select-dataFinal").prop("disabled", false);
            } else {
                $("#button-dataFinal").prop("title", "Data Fixa");
                $(".input-dataFinal").prop("disabled", false);
                $(".select-dataFinal").prop("disabled", true);
            }
        });
    </script>
    <!-- js com script usando no modal -->
    <script src="../agendamento/agendamento.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>