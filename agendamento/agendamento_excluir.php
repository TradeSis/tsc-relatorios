<div class="modal fade" id="excluirAgendamento-modal" tabindex="-1" aria-labelledby="excluirAgendamento-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Agendamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="excluirFormAgendamento" method="post">
                    <div class="row">
                        <div class="form-group col">
                            <label>Data</label>
                            <input type="text" class="form-control" id="excluirView_dtprocessar" readonly>
                            <input type="hidden" class="form-control" name="dtprocessar" id="excluir_dtprocessar" readonly>
                        </div>
                        <div class="form-group col">
                            <label>Hora</label>
                            <input type="text" class="form-control" name="hrprocessar" id="excluir_hrprocessar" readonly>
                        </div>
                        <div class="form-group col">
                            <label>periodicidade</label>
                            <input type="text" class="form-control" id="excluir_periodicidade" readonly>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
            </div>
            </form>
        </div>
    </div>
</div>