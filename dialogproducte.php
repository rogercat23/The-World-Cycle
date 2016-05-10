<!-- Modal -->
<div class="modal fade" id="myModalproducte" tabindex="-1" role="dialog" aria-labelledby="myModalLabelproducte" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-title-modal">
        <h4>Producte</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="formulariproducte" action="afegirproducte.php">
            <div class="form-group">
                <label>Dades:</label>
                <div id="pnomdiv" class="has-feedback">
                    <input type="text" class="form-control" id="pnom" name="pnom" placeholder="Nom" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="pnomicon" class="form-control-feedback glyphicon"></span></br>
                </div>
                <div class="row">
                    <div class="col-xs-6 has-feedback" id="ppreudiv">
                        <div class="input-group">
							<input type="text" class="form-control" id="ppreu" name="ppreu" placeholder="Preu" onChange="comprovarCamps(this.id)"  title="Es obligatori!" required><div class="input-group-addon">€</div><span id="ppreuicon" class="ambicondret form-control-feedback glyphicon"></span>
						</div>
					</div>
                    <div class="col-xs-6 has-feedback" id="punidiv">
                        <input type="text" class="form-control" id="puni"  name="puni" placeholder="Unitat" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="puniicon" class="form-control-feedback glyphicon"></span>
                    </div>
				</div></br>
				<div class="row">
                    <div id="sndiv" class="col-xs-6 has-feedback">
						<div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default">
                                <input type="radio" id="sn" name="sn" value="Nou" onChange="comprovarCamps(this.id)" title="Es obligatori!" required/> Nou
                            </label> 
                            <label class="btn btn-default">
                                <input type="radio" id="sn" name="sn" value="Segonma" onChange="comprovarCamps(this.id)"/> Segon ma
                            </label>
                            <label class="btn" id="radioicon">
                                <span id="snicon" class="form-control-feedback glyphicon"></span>
                            </label>
                        </div>
                    </div>
                    <div id="categoriadiv" class="col-xs-6 has-feedback">
						<select class="form-control" id="categoria" name="categoria" onChange="comprovarCamps(this.id)" title="Es obligatori!" required>
                            <option value="">Categoria</option>
                            <?php
                                for($i=0;$i<count($categories);$i++){
                                    echo "<option value='". $categories[$i]['id'] ."'>". $categories[$i]['nom'] ."</option>";
                                }
                            ?>
                        </select>
                        <span id="categoriaicon" class="form-control-feedback glyphicon"></span>
					</div>
                </div></br>
                <div id="descdiv" class="has-feedback">
                	<label for="desc">Descripció:</label>
  					<textarea class="form-control" rows="5" id="desc" name="desc" onChange="comprovarCamps(this.id)" title="Es obligatori! Màxim 300 caracters..." maxlength="300" required></textarea>
                    <span id="descicon" class="form-control-feedback glyphicon"></span>
                </div></br>
				<div id="fotospdiv" class="has-feedback">
					<label class="control-label">Selecionar les fotos:</label>
                    <input id="fotosp" name="fotosp[]" type="file" multiple class="file-loading" accept="image/x-png, image/jpeg" title="Es obligatori pujar una o mes fotos!" required>
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