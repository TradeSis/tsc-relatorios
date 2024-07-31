<div class="tab-pane fade" id="agendamentos" role="tabpanel" aria-labelledby="agendamentos-tab">
                <div class="container-fluid p-0 m-0">
                   
                    <div class="table table-responsive mt-2">
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Data</th>
                                    <th>Hora</th>
                                    <th>progcod</th>
                                    <th>nomeRel</th>
                                    <th>periodicidade</th>
                                    <th>descrição</th>
                                </tr>
                            </thead>
                            <?php
                            if (!empty($agendamentos)) {
                                foreach ($agendamentos as $agendamento) {
                                    if ($agendamento['periodicidade'] == "U") {
                                        $periodicidade = "Único";
                                        $descPeriodicidade = "irá rodar somente uma vez";
                                    }
                                    if ($agendamento['periodicidade'] == "D") {
                                        $periodicidade = "Diário";
                                        $descPeriodicidade = "irá rodar todo dia: " . $agendamento['periododias'];
                                    }
                                    if ($agendamento['periodicidade'] == "S") {
                                        $periodicidade = "Semanal";
                                        $descPeriodicidade = "irá rodar nos dias: " . $agendamento['diasemana1'] . " ," . $agendamento['diasemana2'] . " e " . $agendamento['diasemana3'];
                                    }
                                    if ($agendamento['periodicidade'] == "Q") {
                                        $periodicidade = "Quinzenal";
                                        $descPeriodicidade = "irá rodar nos dias: " . $agendamento['diadomes1'] . " e " . $agendamento['diadomes2'];
                                    }
                                    if ($agendamento['periodicidade'] == "M") {
                                        $periodicidade = "Mensal";
                                        $descPeriodicidade = "irá rodar todo dia: " . $agendamento['diadomes1'];
                                    }

                            ?>
                                    <tr>
                                        <td><?php echo date('d/m/Y', strtotime($agendamento['dtprocessar'])) ?></td>
                                        <td><?php echo $agendamento['hrprocessar'] ?></td>
                                        <td><?php echo $agendamento['progcod'] ?></td>
                                        <td><?php echo $agendamento['nomeRel'] ?></td>
                                        <td><?php echo $periodicidade ?></td>
                                        <td><?php echo $descPeriodicidade ?></td>
                                    </tr>
                                    
                            <?php }
                            } ?>
                        </table>
                    </div>
                </div>
            </div>