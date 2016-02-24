<!-- Modal -->
<div class="modal fade" id="myModalproducte" tabindex="-1" role="dialog" aria-labelledby="myModalLabelproducte" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-title-modal">
        <h4>Producte</h4>
      </div>
      <div class="modal-body">
        <form  action="controlregistrar.php" method="post" id="formulariproducte">
              <div class="form-group">
                <label>Usuari:</label>
                <div id="correudiv" class="has-feedback">
                    <input type="email" class="form-control" id="correu" name="correu" placeholder="Correu" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="correuicon" class="form-control-feedback glyphicon"></span></br>
                </div>
                <div class="row">
                    <div class="col-xs-6 has-feedback" id="passworddiv">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" onChange="comprovarCamps(this.id)"  title="Es obligatori!" required><span id="passwordicon" class="form-control-feedback glyphicon"></span>
                    </div>
                    <div class="col-xs-6 has-feedback" id="password2div">
                        <input type="password" class="form-control" id="password2"  name="password2" placeholder="Repetir password" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="password2icon" class="form-control-feedback glyphicon"></span>
                    </div>
               </div>
              </div>
              <div class="form-group">
                <label>Dades personals:</label>
                <div class="row">
                    <div id="nomdiv" class="col-xs-6 has-feedback">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="nomicon" class="form-control-feedback glyphicon"></span></br>
                    </div>
                    <div id="cognom1div" class="col-xs-6 has-feedback">
                        <input type="text" class="form-control" id="cognom1" name="cognom1" placeholder="Primer cognom" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="cognom1icon" class="form-control-feedback glyphicon"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 has-feedback" id="cognom2div">
                        <input type="text" class="form-control" id="cognom2" name="cognom2" placeholder="Segon cognom" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="cognom2icon" class="form-control-feedback glyphicon"></span>
                    </div>
                    <div class="col-xs-6 has-feedback c-inputs-stacked" id="hddiv">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default">
                                <input type="radio" id="hd" name="hd" value="Home" onChange="comprovarCamps(this.id)" title="Es obligatori!" required/> Home
                            </label> 
                            <label class="btn btn-default">
                                <input type="radio" id="hd" name="hd" value="Dona" onChange="comprovarCamps(this.id)"/> Dona
                            </label>
                            <label class="btn" id="radioicon">
                                <span id="hdicon" class="form-control-feedback glyphicon"></span>
                            </label>
                        </div>
                    </div>
               </div></br>
               <div class="row">
                    <div class="col-xs-6 has-feedback" id="telefondiv">
                        <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Tel&eacute;fon" onChange="comprovarCamps(this.id)"  title="Es obligatori!" required><span id="telefonicon" class="form-control-feedback glyphicon"></span>
                    </div>
                    <div class="col-xs-6 has-feedback" id="data_naixdiv">
                        <input type="text" class="form-control datepicker" id="data_naix" name="data_naix" placeholder="Data de naixament" onChange="comprovarCamps(this.id)"  title="Es obligatori!" required><span id="data_naixicon" class="form-control-feedback glyphicon"></span>
                    </div>
               </div>
              </div>
              <div class="form-group">
                <label>Adre&ccedil;a:</label>
                <div class="row">
                    <div id="paisdiv" class="col-xs-6 has-feedback">
                        <select class="form-control" id="pais" name="pais" onChange="comprovarCamps(this.id)" title="Es obligatori!" required>
                            <option value="">Pais</option>
                            <?php
                                for($i=0;$i<count($paisos);$i++){
                                    echo "<option value='". $paisos[$i]['id'] ."'>". $paisos[$i]['nom'] ."</option>";
                                }
                            ?>
                        </select>
                        <span id="paisicon" class="form-control-feedback glyphicon"></span>
                    </div>
                    <div class="col-xs-6 has-feedback" id="provinciaregiodiv">
                        <select class="form-control" id="provinciaregio" name="provinciaregio" onChange="comprovarCamps(this.id)" title="Es obligatori!" required>
                            <option value="">Provincia/Regio</option>
                            
                        </select><span id="provinciaregioicon" class="form-control-feedback glyphicon"></span>
                    </div>
               </div></br>
                <div class="row">
                     <div class="col-xs-8 has-feedback" id="ciutatdiv">
                        <input type="text" class="form-control" id="ciutat" name="ciutat" placeholder="Ciutat" title="Es obligatori!" disabled="true" required><span id="ciutaticon" class="form-control-feedback glyphicon"></span>
                      </div>
                      <div class="col-xs-4 has-feedback" id="postaldiv">
                        <input type="text" class="form-control" id="postal" name="postal" placeholder="Postal" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="postalicon" class="form-control-feedback glyphicon"></span>
                      </div>
                </div></br>
                <div id="carrerdiv" class="has-feedback">
                    <input type="text" class="form-control" id="carrer" name="carrer" placeholder="Carrer" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="carrericon" class="form-control-feedback glyphicon"></span></br>
                </div>
                 <div class="row">
                     <div class="col-xs-4 has-feedback" id="numerodiv">
                        <input type="text" class="form-control" id="numero" name="numero" placeholder="N&uacute;mero" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="numeroicon" class="form-control-feedback glyphicon"></span>
                      </div>
                      <div class="col-xs-4 has-feedback" id="pisdiv">
                        <input type="text" class="form-control" id="pis" name="pis" placeholder="Pis" onChange="comprovarCamps(this.id)"><span id="pisicon" class="form-control-feedback glyphicon"></span>
                      </div>
                      <div class="col-xs-4 has-feedback" id="portadiv">
                        <input type="text" class="form-control" id="porta" name="porta" placeholder="Porta" onChange="comprovarCamps(this.id)"><span id="portaicon" class="form-control-feedback glyphicon"></span>
                      </div>
                  </div>  
              </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="netejarformproducte" data-dismiss="modal">Cancel·la</button>
            <button type="submit" class="btn btn-success">Pujar producte per vendre!</button>
        </form>
      </div>
    </div>
  </div>
</div>