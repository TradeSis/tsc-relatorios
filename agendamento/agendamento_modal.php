<!-- Modal -->
<div class="modal fade" id="modalAgendamento" tabindex="-1" aria-labelledby="modalAgendamentoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agendamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formAgendamento" > 
                        <div class="row">
                            <div class="form-group col-3">
                                <label>Data</label>
                                <input type="date" name="dtprocessar" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group col-3">
                                <label>Hora</label>
                                <input type="time" name="hrprocessar" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>progcod</label>
                                <input type="text" name="progcod" class="form-control" value="<?php echo $progcod ?>" autocomplete="off" readonly>
                            </div>
                            <div class="form-group col">
                                <label>nome do Relatório</label>
                                <input type="text" name="nomeRel" class="form-control" value="<?php echo $progcod ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-4">
                                <label>Periodicidade</label>
                                <select class="form-control" name="periodicidade" id="periodicidade">
                                    <option value="U">Único</option>
                                    <option value="D">Diário</option>
                                    <option value="S">Semanal</option>
                                    <option value="Q">Quinzenal</option>
                                    <option value="M">Mensal</option>
                                </select>
                            </div>
                            <div class="form-group col d-none" id="diario">
                                <div class="row">
                                    <div class="col-2">
                                        <label>Dia</label>
                                        <input type="text" class="form-control" name="periododias" id="inputdoisdig" maxlength="2" pattern="([0-9]{1}{2})" autocomplete="off">
                                    </div>
                                    <div class="col-2">
                                        <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="rodará todos os dias"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col d-none" id="semanal">
                                <div class="row">
                                    <div class="col-3">
                                        <label>Dia da semana 1</label>
                                        <input type="text" class="form-control" name="diasemana1" id="inputdoisdig" maxlength="2" pattern="([0-9]{1}{2})" autocomplete="off">
                                    </div>
                                    <div class="col-3">
                                        <label>Dia da semana 2</label>
                                        <input type="text" class="form-control" name="diasemana2" id="inputdoisdig" maxlength="2" pattern="([0-9]{1}{2})" autocomplete="off">
                                    </div>
                                    <div class="col-3">
                                        <label>Dia da semana 3</label>
                                        <input type="text" class="form-control" name="diasemana3" id="inputdoisdig" maxlength="2" pattern="([0-9]{1}{2})" autocomplete="off">
                                    </div>
                                    <div class="col-2">
                                        <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="rodará todos os dias marcados da semana (até 3)"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col d-none" id="quinzenal">
                                <div class="row">
                                    <div class="col-3">
                                        <label>Dia do mês 1</label>
                                        <input type="text" class="form-control quinzenal" name="diadomes1" id="inputdoisdig" maxlength="2" pattern="([0-9]{1}{2})" autocomplete="off"> 
                                    </div>
                                    <div class="col-3">
                                        <label>Dia do mês 2</label>
                                        <input type="text" class="form-control" name="diadomes2" id="inputdoisdig" maxlength="2" pattern="([0-9]{1}{2})" autocomplete="off">
                                    </div>
                                    <div class="col-2">
                                        <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="rodará 2 vezes por mês"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col d-none" id="mensal">
                                <div class="row">
                                    <div class="col-3">
                                        <label>Dia do mês</label>
                                        <input type="text" class="form-control mensal" name="diadomes1" id="inputdoisdig" maxlength="2" pattern="([0-9]{1}{2})" autocomplete="off">
                                    </div>
                                    <div class="col-2">
                                        <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="rodará uma vez por mês"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>


