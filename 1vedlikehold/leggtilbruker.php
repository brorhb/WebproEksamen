<?php include_once ("head.php"); ?>

                            <!-- Innhold -->
                            <div class="col-md-12">
                                <h2>Ny Bruker</h2>
                                    <form action="allebrukere.php">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <lable for="Fornavn">Fornavn</lable>
                                                <input class="form-control" type="text" placeholder="Fornavn" name="fornavn" id="fornavn" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <lable for="etternavn">Etternavn</lable>
                                                <input class="form-control" type="text" placeholder="Etternavn" name="etternavn" id="etternavn" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <lable for="Født">Fødselsdato</lable>
                                                <input class="form-control" type="text" placeholder="dd/mm/yyyy" name="fodselsdato" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <lable for="epost">Epost</lable>
                                                <input type="text" class="form-control" placeholder="bjarum@example.com" name="epost" id="epost" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <lable for="mobilnummer">Mobilnummer</lable>
                                                <input class="form-control" type="text" placeholder="999 99 999" name="mobilnummer" id="mobilnummer" required>
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-info" value="Endre">
                                    </div>
                                </form>
                            </div>
                            <!-- Innhold -->

<?php include_once ("end.php"); ?>