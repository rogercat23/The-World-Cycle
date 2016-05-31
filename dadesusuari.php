<?php
require_once("pg/classes/GeneralBD.php");
include "/pg/sessio/sessio.php";
$GeneralBD = new GeneralBD();

$usuari = $GeneralBD->runQuery("SELECT * FROM usuari WHERE id=". $_GET['id_usuari']);//per poder pillar les dades d'usuari
//Convertir format dd/mm/yyyy que BD es guarda per yyyy-mm-dd
$data_naix = date("d/m/Y", strtotime($usuari[0]['data_naix']));
$data_inici = date("d/m/Y", strtotime($usuari[0]['data_inici']));

?>
<div class="row">
	<div class="col-md-4">
    </div>
    <div class="col-md-5"></br>
    	Correu:<?php echo $usuari[0]['correu'] ?> </br></br>
        Nom: <?php echo $usuari[0]['nom'] ?> </br></br>
        Cognoms: <?php echo $usuari[0]['cognom1'];?> <?php echo $usuari[0]['cognom2'] ?> </br></br>
        Sexe: <?php echo $usuari[0]['h/d'] ?> </br></br>
        Telefon: <?php echo $usuari[0]['telefon'] ?> </br></br>
        Data de naixament: <?php echo $data_naix ?> </br></br>
        Data inici del compte de web: <?php echo $data_inici ?>
    </div>
</div>
</br>
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-3">
        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModalmoddadesusuari" onClick="" ><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Modificar les dades de l'usuari</button>
    </div>
</div>

<?php
	/*Pillem per informació del formulari pais, provincia o regio i ciutats*/
	$dadesusuari = $GeneralBD->runQuery1("SELECT * FROM usuari");
	$GeneralBD->tancarBD();
?>
<!-- Modal -->
<div class="modal fade" id="myModalmoddadesusuari" tabindex="-1" role="dialog" aria-labelledby="myModalLabelmoddadesusuari" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-title-modal">
        <h4>Modificar les teves dades personals</h4>
      </div>
      <div class="modal-body">
        <form method="post">
              <div class="form-group">
                <label>Dades personals:</label>
                <div class="row">
                	<input type="text" value="<?php echo $usuari[0]['id'] ?>" id="id" hidden="true">
                    <div id="nomdiv" class="col-xs-6 has-feedback">
                    <input type="text" value="<?php echo $usuari[0]['nom'] ?>" class="form-control" id="nom" name="nom" placeholder="Nom" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="nomicon" class="form-control-feedback glyphicon"></span></br>
                    </div>
                    <div id="cognom1div" class="col-xs-6 has-feedback">
                        <input type="text" value="<?php echo $usuari[0]['cognom1'] ?>" class="form-control" id="cognom1" name="cognom1" placeholder="Primer cognom" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="cognom1icon" class="form-control-feedback glyphicon"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 has-feedback" id="cognom2div">
                        <input type="text" value="<?php echo $usuari[0]['cognom2'] ?>" class="form-control" id="cognom2" name="cognom2" placeholder="Segon cognom" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="cognom2icon" class="form-control-feedback glyphicon"></span>
                    </div>
                    <div class="col-xs-6 has-feedback c-inputs-stacked" id="chhddiv">
                        <div class="btn-group" data-toggle="buttons">
                            <select id="chhd" class="form-control">
                            <?php
                                $sexe = array("Home","Dona");
                                for($x=0;$x<count($sexe);$x++){ 
                                    if($sexe[$x] == $usuari[0]['h/d']){
                                        echo "<option value='".$sexe[$x]."' selected>".$sexe[$x]."</option>";
                                    } else {
                                        echo "<option value='".$sexe[$x]."'>".$sexe[$x]."</option>";
                                    }
                                } 
                            ?>
                            </select>
                            <span id="chhdicon" class="form-control-feedback glyphicon"></span>
                        </div>
                    </div>
               </div></br>
               <div class="row">
                    <div class="col-xs-6 has-feedback" id="telefondiv">
                        <input type="text" value="<?php echo $usuari[0]['telefon'] ?>" class="form-control" id="telefon" name="telefon" placeholder="Tel&eacute;fon" onChange="comprovarCamps(this.id)"  title="Es obligatori!" required><span id="telefonicon" class="form-control-feedback glyphicon"></span>
                    </div>
                    <div class="col-xs-6 has-feedback" id="data_naixdiv">
                        <input type="text" value="<?php echo $data_naix ?>"  class="form-control datepicker" id="data_naix" name="data_naix" placeholder="Data de naixament" onChange="comprovarCamps(this.id)"  title="Es obligatori!" required><span id="data_naixicon" class="form-control-feedback glyphicon"></span>
                    </div>
               </div>
              </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel·la</button>
            <button type="submit" class="btn btn-success" onClick="cridafuncioadadesusuarimod()">Modificar</button>
        </form>
      </div>
    </div>
  </div>
</div>
