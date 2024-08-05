<?php
// lucas 23022024 - criado programa

include_once('../head.php');
$filial = explode(":", $_SERVER['REMOTE_ADDR']);
$filial = isset($filial[2]);

$progcod = "frrescart_v1801";
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
                        <h4 class="col">Controle de Carteira</h4>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="#" onclick="history.back()" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/relatorios.php?operacao=frrescart_v1801" method="post">
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
                                <input type="text" name="progcod" class="form-control" value="frrescart_v1801" autocomplete="off" readonly>
                            </div>
                        </div>

                    </div>
                    <label>Nome do relatório</label>
                    <div class="form-group">
                        <input type="text" name="relatnom" class="form-control" value="Controle de Carteira (NOVO)" autocomplete="off" readonly>
                        <input type="text" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" name="REMOTE_ADDR" hidden>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-6">
                            <label>Cliente</label>
                            <select class="form-control" name="cre" id="cre">
                                <option value="Geral">Geral</option>
                                <option value="Facil">Facil</option>
                            </select>
                            <input type="text" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" name="REMOTE_ADDR" hidden>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col">
                            <label>Data Inicial</label>
                            <div class="input-group mb-2">
                                <button class="btn btn-outline-secondary" type="button" id="button-dti" title="Fixo"><i class="bi bi-arrow-repeat"></i></button>
                                <input type="date" class="form-control input-dti" name="dti" id="dti">
                                <select class="form-control d-none select-dti" name="dti" id="dti" disabled>
                                    <option value="#HOJE">#HOJE</option>
                                    <option value="#HOJE-">#HOJE-</option>
                                    <option value="#DIAPRIMES">#DIAPRIMES</option>
                                    <option value="#DIAULTMES">#DIAULTMES</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label>Data Final</label>
                            <div class="input-group mb-2">
                                <button class="btn btn-outline-secondary" type="button" id="button-dtf" title="Fixo"><i class="bi bi-arrow-repeat"></i></button>
                                <input type="date" class="form-control input-dtf" name="dtf" id="dtf">
                                <select class="form-control d-none select-dtf" name="dtf" id="dtf" disabled>
                                    <option value="#HOJE">#HOJE</option>
                                    <option value="#HOJE-">#HOJE-</option>
                                    <option value="#DIAPRIMES">#DIAPRIMES</option>
                                    <option value="#DIAULTMES">#DIAULTMES</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col">
                            <label>Somente clientes novos(até 30 pagas) que atrasaram parcela(s):</label>
                            <select class="form-control" name="clinovos" id="clinovos">
                                <option value="Nao">Nao</option>
                                <option value="Sim">Sim</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label>Selecione Modalidades</label>
                            <select class="form-control" name="modalidade[]" id="modalidade" multiple style="height: 90px; overflow-y: hidden;">
                                <option value="CRE" class="cre" selected>CRE</option>
                                <option value="CP0" class="sel-mod">CP0</option>
                                <option value="CP1" class="sel-mod">CP1</option>
                                <option value="CPN" class="sel-mod">CPN</option>
                            </select>
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-6">
                            <label>Considerar apenas feirao</label>
                            <select class="form-control" name="feirao-nome-limpo" id="feirao-nome-limpo">
                                <option value="Nao">Nao</option>
                                <option value="Sim">Sim</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label>Filial 17</label>
                            <select class="form-control" name="vindex" id="vindex">
                                <option value="1">Nova</option>
                                <option value="2">Antiga</option>
                            </select>
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
                dti = $(".input-dti").val() != "" ? $(".input-dti").val() : $(".select-dti").val();
                dtf = $(".input-dtf").val() != "" ? $(".input-dtf").val() : $(".select-dtf").val();

                event.preventDefault();
                var formData = new FormData(this);
                //formulario de parametros
                formData.append("cre", $("#cre").val());
                formData.append("dti", dti);
                formData.append("dtf", dtf);
                formData.append("clinovos", $("#clinovos").val());
                formData.append("modalidade", $("#modalidade").val());
                formData.append("feirao-nome-limpo", $("#feirao-nome-limpo").val());
                formData.append("vindex", $("#vindex").val());
                /* for (var pair2 of formData.entries()) {
                    console.log(pair2[0] + " - " + pair2[1]);
                } */

                $.ajax({
                    url: "../database/agendamento.php?relatorio=frrescart_v1801",
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

        // DATA\SELECT - DTI
        $("#button-dti").click(function() {
            $(".input-dti").toggleClass("d-none");
            $(".select-dti").toggleClass("d-none");

            var elemento = document.getElementById("dti");
            var classe = elemento.getAttribute("class");
            //alert(classe.lastIndexOf("d-none"))
            if (classe[23] == "d") {
                $("#button-dti").prop("title", "Data Digitável");
                $(".input-dti").prop("disabled", true);
                $(".select-dti").prop("disabled", false);
            } else {
                $("#button-dti").prop("title", "Data Fixa");
                $(".input-dti").prop("disabled", false);
                $(".select-dti").prop("disabled", true);
            }
        });

        // DATA\SELECT - DTF
        $("#button-dtf").click(function() {
            $(".input-dtf").toggleClass("d-none");
            $(".select-dtf").toggleClass("d-none");

            var elemento = document.getElementById("dtf");
            var classe = elemento.getAttribute("class");

            if (classe[23] == "d") {
                $("#button-dtf").prop("title", "Data Digitável");
                $(".input-dtf").prop("disabled", true);
                $(".select-dtf").prop("disabled", false);
            } else {
                $("#button-dtf").prop("title", "Data Fixa");
                $(".input-dtf").prop("disabled", false);
                $(".select-dtf").prop("disabled", true);
            }
        });
    </script>
    <!-- js com script usando no modal -->
    <script src="../agendamento/agendamento.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>