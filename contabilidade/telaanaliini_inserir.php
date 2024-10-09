<?php
// lucas 23022024 - criado programa

include_once('../head.php');
$ipfilial = explode(".", $_SERVER['REMOTE_ADDR']);
$filial = 0;
if ($ipfilial[0] == 172 || $ipfilial[0] == 192) {
    if ($ipfilial[1] == 17 || $ipfilial[1] == 23 || $ipfilial[1] == 168) {
        $filial = $ipfilial[2];
    }
}

$progcod = "telaanaliini";
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
                        <h4 class="col">Resumo Conciliação Crediário</h4>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="#" onclick="history.back()" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/relatorios.php?operacao=telaanaliini" method="post">
                    <div class="row">
                        <div class="col">
                            <label>Usuário</label>
                            <div class="form-group">
                                <input type="text" name="usercod" id="usercod" class="form-control" value="<?php echo $_SESSION['usuario'] ?>" autocomplete="off" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <label>Programa</label>
                            <div class="form-group">
                                <input type="text" name="progcod" class="form-control" value="telaanaliini" autocomplete="off" readonly>
                            </div>
                        </div>

                    </div>
                    <label>Nome do relatório</label>
                    <div class="form-group">
                        <input type="text" name="nomeRel" id="nomeRel" class="form-control" value="<?php echo $progcod ?>" autocomplete="off">
                        <input type="text" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" name="REMOTE_ADDR" id="REMOTE_ADDR" hidden>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col">
                            <label>Data Inicial</label>
                            <div class="input-group mb-2">
                                <button class="btn btn-outline-secondary" type="button" id="button-dtini" title="Fixo"><i class="bi bi-arrow-repeat"></i></button>
                                <input type="date" class="form-control input-dtini" name="dtini" id="dtini" required>
                                <select class="form-control d-none select-dtini" name="dtini" id="dtini" disabled>
                                    <option value=null>Selecione</option>
                                    <option value="#HOJE">#HOJE</option>
                                    <option value="#HOJE-1">#HOJE-1</option>
                                    <option value="#HOJE-2">#HOJE-2</option>
                                    <option value="#HOJE-3">#HOJE-3</option>
                                    <option value="#HOJE-4">#HOJE-4</option>
                                    <option value="#HOJE-5">#HOJE-5</option>
                                    <option value="#HOJE-6">#HOJE-6</option>
                                    <option value="#HOJE-7">#HOJE-7</option>
                                    <option value="#HOJE-10">#HOJE-10</option>
                                    <option value="#HOJE-30">#HOJE-30</option>
                                    <option value="#DIAPRIMES">#DIAPRIMES</option>
                                    <option value="#DIAPRIMES-1">#DIAPRIMES-1</option>
                                    <option value="#DIAPRIMES-2">#DIAPRIMES-2</option>
                                    <option value="#DIAPRIMES-3">#DIAPRIMES-3</option>
                                    <option value="#DIAPRIMES-4">#DIAPRIMES-4</option>
                                    <option value="#DIAPRIMES-5">#DIAPRIMES-5</option>
                                    <option value="#DIAPRIMES-6">#DIAPRIMES-6</option>
                                    <option value="#DIAPRIMES-7">#DIAPRIMES-7</option>
                                    <option value="#DIAPRIMES-8">#DIAPRIMES-8</option>
                                    <option value="#DIAPRIMES-9">#DIAPRIMES-9</option>
                                    <option value="#DIAPRIMES-10">#DIAPRIMES-10</option>
                                    <option value="#DIAPRIMES-11">#DIAPRIMES-11</option>
                                    <option value="#DIAPRIMES-12">#DIAPRIMES-12</option>
                                    <option value="#DIAPRIMES-24">#DIAPRIMES-24</option>
                                    <option value="#DIAULTMES">#DIAULTMES</option>
                                    <option value="#DIAULTMES-1">#DIAULTMES-1</option>
                                    <option value="#DIAULTMES-2">#DIAULTMES-2</option>
                                    <option value="#DIAULTMES-3">#DIAULTMES-3</option>
                                    <option value="#DIAULTMES-4">#DIAULTMES-4</option>
                                    <option value="#DIAULTMES-5">#DIAULTMES-5</option>
                                    <option value="#DIAULTMES-6">#DIAULTMES-6</option>
                                    <option value="#DIAULTMES-7">#DIAULTMES-7</option>
                                    <option value="#DIAULTMES-8">#DIAULTMES-8</option>
                                    <option value="#DIAULTMES-9">#DIAULTMES-9</option>
                                    <option value="#DIAULTMES-10">#DIAULTMES-10</option>
                                    <option value="#DIAULTMES-11">#DIAULTMES-11</option>
                                    <option value="#DIAULTMES-12">#DIAULTMES-12</option>
                                    <option value="#DIAULTMES-24">#DIAULTMES-24</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label>Data Final</label>
                            <div class="input-group mb-2">
                                <button class="btn btn-outline-secondary" type="button" id="button-dtfin" title="Fixo"><i class="bi bi-arrow-repeat"></i></button>
                                <input type="date" class="form-control input-dtfin" name="dtfin" id="dtfin" required>
                                <select class="form-control d-none select-dtfin" name="dtfin" id="dtfin" disabled>
                                    <option value=null>Selecione</option>
                                    <option value="#HOJE">#HOJE</option>
                                    <option value="#HOJE-1">#HOJE-1</option>
                                    <option value="#HOJE-2">#HOJE-2</option>
                                    <option value="#HOJE-3">#HOJE-3</option>
                                    <option value="#HOJE-4">#HOJE-4</option>
                                    <option value="#HOJE-5">#HOJE-5</option>
                                    <option value="#HOJE-6">#HOJE-6</option>
                                    <option value="#HOJE-7">#HOJE-7</option>
                                    <option value="#HOJE-10">#HOJE-10</option>
                                    <option value="#HOJE-30">#HOJE-30</option>
                                    <option value="#DIAPRIMES">#DIAPRIMES</option>
                                    <option value="#DIAPRIMES-1">#DIAPRIMES-1</option>
                                    <option value="#DIAPRIMES-2">#DIAPRIMES-2</option>
                                    <option value="#DIAPRIMES-3">#DIAPRIMES-3</option>
                                    <option value="#DIAPRIMES-4">#DIAPRIMES-4</option>
                                    <option value="#DIAPRIMES-5">#DIAPRIMES-5</option>
                                    <option value="#DIAPRIMES-6">#DIAPRIMES-6</option>
                                    <option value="#DIAPRIMES-7">#DIAPRIMES-7</option>
                                    <option value="#DIAPRIMES-8">#DIAPRIMES-8</option>
                                    <option value="#DIAPRIMES-9">#DIAPRIMES-9</option>
                                    <option value="#DIAPRIMES-10">#DIAPRIMES-10</option>
                                    <option value="#DIAPRIMES-11">#DIAPRIMES-11</option>
                                    <option value="#DIAPRIMES-12">#DIAPRIMES-12</option>
                                    <option value="#DIAPRIMES-24">#DIAPRIMES-24</option>
                                    <option value="#DIAULTMES">#DIAULTMES</option>
                                    <option value="#DIAULTMES-1">#DIAULTMES-1</option>
                                    <option value="#DIAULTMES-2">#DIAULTMES-2</option>
                                    <option value="#DIAULTMES-3">#DIAULTMES-3</option>
                                    <option value="#DIAULTMES-4">#DIAULTMES-4</option>
                                    <option value="#DIAULTMES-5">#DIAULTMES-5</option>
                                    <option value="#DIAULTMES-6">#DIAULTMES-6</option>
                                    <option value="#DIAULTMES-7">#DIAULTMES-7</option>
                                    <option value="#DIAULTMES-8">#DIAULTMES-8</option>
                                    <option value="#DIAULTMES-9">#DIAULTMES-9</option>
                                    <option value="#DIAULTMES-10">#DIAULTMES-10</option>
                                    <option value="#DIAULTMES-11">#DIAULTMES-11</option>
                                    <option value="#DIAULTMES-12">#DIAULTMES-12</option>
                                    <option value="#DIAULTMES-24">#DIAULTMES-24</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-6">
                            <label>Estabelecimento</label>
                            <input type="number" placeholder="Vazio = Geral" class="form-control" name="etbcod" id="etbcod">
                        </div>
                        <div class="form-group col">
                            <label>Tipo de Operação</label>
                            <select class="form-control" name="tipooperacao" id="tipooperacao">
                                <option value="RECEBIMENTOS">RECEBIMENTOS</option>
                                <option value="NOVACAO">NOVACAO</option>
                                <option value="VENDAS">VENDAS</option>
                            </select>
                        </div>
                     </div>
            </div><!-- container -->
            <div class="card-footer bg-transparent mt-2" style="text-align:right">
                <button type="submit" class="btn btn-sm btn-success">Gerar Relatório</button>
                </form>
                <button type="buttom" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalAgendamento" id="btnAgendamento">Agendar Relatório</button>
            </div>

        </div><!-- card shadow -->
    </div><!-- container -->

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script>
        $(document).ready(function() {

            $("#formAgendamento").submit(function(event) {
                dtini = $(".input-dtini").val() != "" ? $(".input-dtini").val() : $(".select-dtini").val();
                dtfin = $(".input-dtfin").val() != "" ? $(".input-dtfin").val() : $(".select-dtfin").val();

                event.preventDefault();
                var formData = new FormData(this);
                //formulario de parametros
                formData.append("usercod", $("#usercod").val());
                formData.append("REMOTE_ADDR", $("#REMOTE_ADDR").val());
                //formData.append("cre", $("#cre").val());
                formData.append("dtini", dtini);
                formData.append("dtfin", dtfin);
                formData.append("etbcod", $("#etbcod").val());
                formData.append("tipooperacao", $("#tipooperacao").val());
                /* for (var pair2 of formData.entries()) {
                    console.log(pair2[0] + " - " + pair2[1]);
                } */

                $.ajax({
                    url: "../database/agendamento.php?relatorio=telaanaliini",
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

        //Usa click do botão para enviar ao modal o nomeRel digitado no form
        $("#btnAgendamento").click(function() {
            nomeRel = $("#nomeRel").val();
            $('#nomeRel_modal').val(nomeRel);
        });

        // modifica efeito de seleção do select modalidade
        window.onmousedown = function(e) {
            var el = e.target;
            if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
                e.preventDefault();

                if (el.hasAttribute('selected')) el.removeAttribute('selected');
                else el.setAttribute('selected', '');

                var select = el.parentNode.cloneNode(true);
                el.parentNode.parentNode.replaceChild(select, el.parentNode);
            }
        }

        // DATA\SELECT - DTINI
        $("#button-dtini").click(function() {
            $(".input-dtini").toggleClass("d-none");
            $(".select-dtini").toggleClass("d-none");

            var elemento = document.getElementById("dtini");
            var classe = elemento.getAttribute("class");
            //alert(classe.lastIndexOf("d-none"))
            if (classe[25] == "d") {
                $("#button-dtini").prop("title", "Data Digitável");
                $(".input-dtini").prop("disabled", true);
                $(".select-dtini").prop("disabled", false);
                $(".input-dtini").prop("required", false);
                $(".select-dtini").prop("required", true);
            } else {
                $("#button-dtini").prop("title", "Data Fixa");
                $(".input-dtini").prop("disabled", false);
                $(".select-dtini").prop("disabled", true);
                $(".input-dtini").prop("required", true);
                $(".select-dtini").prop("required", false);
            }
        });

        // DATA\SELECT - DTFIN
        $("#button-dtfin").click(function() {
            $(".input-dtfin").toggleClass("d-none");
            $(".select-dtfin").toggleClass("d-none");

            var elemento = document.getElementById("dtfin");
            var classe = elemento.getAttribute("class");
            //alert(classe.lastIndexOf("d-none"))
            if (classe[25] == "d") {
                $("#button-dtfin").prop("title", "Data Digitável");
                $(".input-dtfin").prop("disabled", true);
                $(".select-dtfin").prop("disabled", false);
                $(".input-dtini").prop("required", false);
                $(".select-dtini").prop("required", true);
            } else {
                $("#button-dtfin").prop("title", "Data Fixa");
                $(".input-dtfin").prop("disabled", false);
                $(".select-dtfin").prop("disabled", true);
                $(".input-dtini").prop("required", true);
                $(".select-dtini").prop("required", false);
            }
        });
    </script>
    <!-- js com script usando no modal -->
    <script src="../agendamento/agendamento.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>