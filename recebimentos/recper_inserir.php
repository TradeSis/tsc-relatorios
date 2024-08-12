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

$progcod = "recper";
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
                        <h4 class="col">Recebimento por período</h4>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="#" onclick="history.back()" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/relatorios.php?operacao=recper" method="post">
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
                                <input type="text" name="progcod" class="form-control" value="recper" autocomplete="off" readonly>
                            </div>
                        </div>

                    </div>
                    <label>Nome do relatório</label>
                    <div class="form-group">
                        <input type="text" name="nomeRel" id="nomeRel" class="form-control" value="<?php echo $progcod ?>" autocomplete="off">
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Filial</label>
                            <?php if ($filial == 0) { ?>
                                <input type="number" class="form-control" name="etbcod" id="etbcod" value="0">
                            <?php } else { ?>
                                <input type="number" class="form-control" value="<?php echo $filial ?>" name="etbcod" id="etbcod" readonly>
                            <?php } ?>
                            <input type="text" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" name="REMOTE_ADDR" id="REMOTE_ADDR" hidden>
                        </div>
                        <div class="form-group col">
                            <label>Nome Filial</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col">
                            <label class="mt-4">Periodo de Pagamento:</label>
                        </div>
                        <div class="form-group col mt-3">
                            <div class="input-group mb-2">
                                <button class="btn btn-outline-secondary" type="button" id="button-dti" title="Data Fixa"><i class="bi bi-arrow-repeat"></i></button>
                                <input type="date" class="form-control input-dti" name="dti" id="dti" required>
                                <select class="form-control d-none select-dti" name="dti" id="dti" disabled>
                                <option value="#HOJE">#HOJE</option>
                                    <option value="#HOJE-1">#HOJE-1</option>
                                    <option value="#HOJE-2">#HOJE-2</option>
                                    <option value="#HOJE-3">#HOJE-3</option>
                                    <option value="#HOJE-4">#HOJE-4</option>
                                    <option value="#HOJE-5">#HOJE-5</option>
                                    <option value="#DIAPRIMES">#DIAPRIMES</option>
                                    <option value="#DIAPRIMES-1">#DIAPRIMES-1</option>
                                    <option value="#DIAPRIMES-2">#DIAPRIMES-2</option>
                                    <option value="#DIAPRIMES-3">#DIAPRIMES-3</option>
                                    <option value="#DIAPRIMES-4">#DIAPRIMES-4</option>
                                    <option value="#DIAPRIMES-5">#DIAPRIMES-5</option>
                                    <option value="#DIAULTMES">#DIAULTMES</option>
                                    <option value="#DIAULTMES-1">#DIAULTMES-1</option>
                                    <option value="#DIAULTMES-2">#DIAULTMES-2</option>
                                    <option value="#DIAULTMES-3">#DIAULTMES-3</option>
                                    <option value="#DIAULTMES-4">#DIAULTMES-4</option>
                                    <option value="#DIAULTMES-5">#DIAULTMES-5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col mt-3">
                            <div class="input-group mb-2">
                                <button class="btn btn-outline-secondary" type="button" id="button-dtf" title="Data Fixa"><i class="bi bi-arrow-repeat"></i></button>
                                <input type="date" class="form-control input-dtf" name="dtf" id="dtf" required>
                                <select class="form-control d-none select-dtf" name="dtf" id="dtf" disabled>
                                    <option value="#HOJE">#HOJE</option>
                                    <option value="#HOJE-1">#HOJE-1</option>
                                    <option value="#HOJE-2">#HOJE-2</option>
                                    <option value="#HOJE-3">#HOJE-3</option>
                                    <option value="#HOJE-4">#HOJE-4</option>
                                    <option value="#HOJE-5">#HOJE-5</option>
                                    <option value="#DIAPRIMES">#DIAPRIMES</option>
                                    <option value="#DIAPRIMES-1">#DIAPRIMES-1</option>
                                    <option value="#DIAPRIMES-2">#DIAPRIMES-2</option>
                                    <option value="#DIAPRIMES-3">#DIAPRIMES-3</option>
                                    <option value="#DIAPRIMES-4">#DIAPRIMES-4</option>
                                    <option value="#DIAPRIMES-5">#DIAPRIMES-5</option>
                                    <option value="#DIAULTMES">#DIAULTMES</option>
                                    <option value="#DIAULTMES-1">#DIAULTMES-1</option>
                                    <option value="#DIAULTMES-2">#DIAULTMES-2</option>
                                    <option value="#DIAULTMES-3">#DIAULTMES-3</option>
                                    <option value="#DIAULTMES-4">#DIAULTMES-4</option>
                                    <option value="#DIAULTMES-5">#DIAULTMES-5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col">
                            <label class="mt-4">Periodo de Vencimento:</label>
                        </div>
                        <div class="form-group col mt-3">
                            <div class="input-group mb-2">
                                <button class="btn btn-outline-secondary" type="button" id="button-dtveni" title="Data Fixa"><i class="bi bi-arrow-repeat"></i></button>
                                <input type="date" class="form-control input-dtveni" name="dtveni" id="dtveni" required>
                                <select class="form-control d-none select-dtveni" name="dtveni" id="dtveni" disabled>
                                    <option value="#HOJE">#HOJE</option>
                                    <option value="#HOJE-1">#HOJE-1</option>
                                    <option value="#HOJE-2">#HOJE-2</option>
                                    <option value="#HOJE-3">#HOJE-3</option>
                                    <option value="#HOJE-4">#HOJE-4</option>
                                    <option value="#HOJE-5">#HOJE-5</option>
                                    <option value="#DIAPRIMES">#DIAPRIMES</option>
                                    <option value="#DIAPRIMES-1">#DIAPRIMES-1</option>
                                    <option value="#DIAPRIMES-2">#DIAPRIMES-2</option>
                                    <option value="#DIAPRIMES-3">#DIAPRIMES-3</option>
                                    <option value="#DIAPRIMES-4">#DIAPRIMES-4</option>
                                    <option value="#DIAPRIMES-5">#DIAPRIMES-5</option>
                                    <option value="#DIAULTMES">#DIAULTMES</option>
                                    <option value="#DIAULTMES-1">#DIAULTMES-1</option>
                                    <option value="#DIAULTMES-2">#DIAULTMES-2</option>
                                    <option value="#DIAULTMES-3">#DIAULTMES-3</option>
                                    <option value="#DIAULTMES-4">#DIAULTMES-4</option>
                                    <option value="#DIAULTMES-5">#DIAULTMES-5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col mt-3">
                            <div class="input-group mb-2">
                                <button class="btn btn-outline-secondary" type="button" id="button-dtvenf" title="Data Fixa"><i class="bi bi-arrow-repeat"></i></button>
                                <input type="date" class="form-control input-dtvenf" name="dtvenf" id="dtvenf" required>
                                <select class="form-control d-none select-dtvenf" name="dtvenf" id="dtvenf" disabled>
                                    <option value="#HOJE">#HOJE</option>
                                    <option value="#HOJE-1">#HOJE-1</option>
                                    <option value="#HOJE-2">#HOJE-2</option>
                                    <option value="#HOJE-3">#HOJE-3</option>
                                    <option value="#HOJE-4">#HOJE-4</option>
                                    <option value="#HOJE-5">#HOJE-5</option>
                                    <option value="#DIAPRIMES">#DIAPRIMES</option>
                                    <option value="#DIAPRIMES-1">#DIAPRIMES-1</option>
                                    <option value="#DIAPRIMES-2">#DIAPRIMES-2</option>
                                    <option value="#DIAPRIMES-3">#DIAPRIMES-3</option>
                                    <option value="#DIAPRIMES-4">#DIAPRIMES-4</option>
                                    <option value="#DIAPRIMES-5">#DIAPRIMES-5</option>
                                    <option value="#DIAULTMES">#DIAULTMES</option>
                                    <option value="#DIAULTMES-1">#DIAULTMES-1</option>
                                    <option value="#DIAULTMES-2">#DIAULTMES-2</option>
                                    <option value="#DIAULTMES-3">#DIAULTMES-3</option>
                                    <option value="#DIAULTMES-4">#DIAULTMES-4</option>
                                    <option value="#DIAULTMES-5">#DIAULTMES-5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col">
                            <label>Considera apenas LP</label>
                            <select class="form-control" name="consulta-parcelas-LP" id="consulta-parcelas-LP">
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
                        <div class="form-group col">
                            <label>Considerar apenas feirao</label>
                            <select class="form-control" name="feirao-nome-limpo" id="feirao-nome-limpo">
                                <option value="Nao">Nao</option>
                                <option value="Sim">Sim</option>
                            </select>
                        </div>
                    </div>
            </div><!-- container -->
            <div class="card-footer bg-transparent text-end">
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
                dti = $(".input-dti").val() != "" ? $(".input-dti").val() : $(".select-dti").val();
                dtf = $(".input-dtf").val() != "" ? $(".input-dtf").val() : $(".select-dtf").val();
                dtveni = $(".input-dtveni").val() != "" ? $(".input-dtveni").val() : $(".select-dtveni").val();
                dtvenf = $(".input-dtvenf").val() != "" ? $(".input-dtvenf").val() : $(".select-dtvenf").val();

                event.preventDefault();
                var formData = new FormData(this);
                //formulario de parametros
                formData.append("usercod", $("#usercod").val());
                formData.append("REMOTE_ADDR", $("#REMOTE_ADDR").val());
                formData.append("etbcod", $("#etbcod").val());
                formData.append("dti", dti);
                formData.append("dtf", dtf);
                formData.append("dtveni", dtveni);
                formData.append("dtvenf", dtvenf);
                formData.append("consulta-parcelas-LP", $("#consulta-parcelas-LP").val());
                formData.append("modalidade", $("#modalidade").val());
                formData.append("feirao-nome-limpo", $("#feirao-nome-limpo").val());
                for (var pair2 of formData.entries()) {
                    console.log(pair2[0] + " - " + pair2[1]);
                }

                $.ajax({
                    url: "../database/agendamento.php?relatorio=recper",
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
                $(".input-dti").prop("required", false);
                $(".select-dti").prop("required", true);
            } else {
                $("#button-dti").prop("title", "Data Fixa");
                $(".input-dti").prop("disabled", false);
                $(".select-dti").prop("disabled", true);
                $(".input-dti").prop("required", true);
                $(".select-dti").prop("required", false);
            }
        });

        // DATA\SELECT - DTF
        $("#button-dtf").click(function() {
            $(".input-dtf").toggleClass("d-none");
            $(".select-dtf").toggleClass("d-none");

            var elemento = document.getElementById("dtf");
            var classe = elemento.getAttribute("class");
            //alert(classe.lastIndexOf("d-none"))
            if (classe[23] == "d") {
                $("#button-dtf").prop("title", "Data Digitável");
                $(".input-dtf").prop("disabled", true);
                $(".select-dtf").prop("disabled", false);
                $(".input-dtf").prop("required", false);
                $(".select-dtf").prop("required", true);
            } else {
                $("#button-dtf").prop("title", "Data Fixa");
                $(".input-dtf").prop("disabled", false);
                $(".select-dtf").prop("disabled", true);
                $(".input-dtf").prop("required", true);
                $(".select-dtf").prop("required", false);
            }
        });

        // DATA\SELECT - DTVENI
        $("#button-dtveni").click(function() {
            $(".input-dtveni").toggleClass("d-none");
            $(".select-dtveni").toggleClass("d-none");

            var elemento = document.getElementById("dtveni");
            var classe = elemento.getAttribute("class");
            //alert(classe.lastIndexOf("d-none"))
            if (classe[26] == "d") {
                $("#button-dtveni").prop("title", "Data Digitável");
                $(".input-dtveni").prop("disabled", true);
                $(".select-dtveni").prop("disabled", false);
                $(".input-dtveni").prop("required", false);
                $(".select-dtveni").prop("required", true);
            } else {
                $("#button-dtveni").prop("title", "Data Fixa");
                $(".input-dtveni").prop("disabled", false);
                $(".select-dtveni").prop("disabled", true);
                $(".input-dtveni").prop("required", true);
                $(".select-dtveni").prop("required", false);
            }
        });

        // DATA\SELECT - DTVENF
        $("#button-dtvenf").click(function() {
            $(".input-dtvenf").toggleClass("d-none");
            $(".select-dtvenf").toggleClass("d-none");

            var elemento = document.getElementById("dtvenf");
            var classe = elemento.getAttribute("class");
            //alert(classe.lastIndexOf("d-none"))
            if (classe[26] == "d") {
                $("#button-dtvenf").prop("title", "Data Digitável");
                $(".input-dtvenf").prop("disabled", true);
                $(".select-dtvenf").prop("disabled", false);
                $(".input-dtvenf").prop("required", false);
                $(".select-dtvenf").prop("required", true);
            } else {
                $("#button-dtvenf").prop("title", "Data Fixa");
                $(".input-dtvenf").prop("disabled", false);
                $(".select-dtvenf").prop("disabled", true);
                $(".input-dtvenf").prop("required", true);
                $(".select-dtvenf").prop("required", false);
            }
        });
    </script>
    <!-- js com script usando no modal -->
    <script src="../agendamento/agendamento.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>