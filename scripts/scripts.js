$(document).ready(function() {
	var compcor = true;
	PNotify.prototype.options.styling = "jqueryui"; //Ficar estil amb jquery ui 
	
	stack_context = { //lloc on volem ensenyar missatges 
		"dir1": "down",
		"dir2": "left",
		"context": $("#qd_cos") //div del cos
	};
	
	function netejar_avisats_contacte(){
		var ids = ["correu1", "nomc", "cognoms", "tema", "comentari"];
		for($i=0;$i<ids.length;$i++){//estalviem repetir i cridem per netejar amb array sense repetir res que es més curt i més net.
			borrarEstilCamp(ids[$i]);
			if(tipus_input = $("#"+ ids[$i]).attr("type")=="radio"){ //per poder borrar boto selecionat amb estil active com format btn
				//alert($("#"+ ids[$i]).attr("name"));
				var id_escullit_radio = $('input:radio[name="'+ ids[$i] +'"]:checked').parent("label").removeClass("active");
			}
		}
	}
	
	function netejar_avisats_registrar(){
		var ids = ["correu", "password", "password2", "nom", "cognom1", "cognom2", "hd", "telefon", "data_naix", "pais", "provinciaregio", "ciutat", "postal", "carrer", "numero", "pis", "porta"];
		for($i=0;$i<ids.length;$i++){//estalviem repetir i cridem per netejar amb array sense repetir res que es més curt i més net.
			borrarEstilCamp(ids[$i]);
			if(tipus_input = $("#"+ ids[$i]).attr("type")=="radio"){ //per poder borrar boto selecionat amb estil active com format btn
				//alert($("#"+ ids[$i]).attr("name"));
				var id_escullit_radio = $('input:radio[name="'+ ids[$i] +'"]:checked').parent("label").removeClass("active");
			}
		}
		var prselect = document.getElementById("provinciaregio"); //Pillem id de select de provinci/regio
		NetejarCampsSelect(prselect);
	}
	
	function netejar_avisats_afgadr(){
		var ids = ["pais", "provinciaregio", "ciutat", "postal", "carrer", "numero", "pis", "porta"];
		for($i=0;$i<ids.length;$i++){//estalviem repetir i cridem per netejar amb array sense repetir res que es més curt i més net.
			borrarEstilCamp(ids[$i]);
		}
		var prselect = document.getElementById("provinciaregio"); //Pillem id de select de provinci/regio
		NetejarCampsSelect(prselect);
	}
	
	$.datepicker.regional['ca'] = { //Ficar format catala que no sortia les libreries de jquery UI i que deixi triar opció per canviar mes i any
		changeMonth: true,
		changeYear: true,
		closeText: 'Tancar',
		prevText: '&#x3c;Ant',
		nextText: 'Seg&#x3e;',
		currentText: 'Avui',
		monthNames: ['Gener','Febrer','Mar&ccedil;','Abril','Maig','Juny',
		'Juliol','Agost','Setembre','Octubre','Novembre','Desembre'],
		monthNamesShort: ['Gen','Feb','Mar','Abr','Mai','Jun',
		'Jul','Ago','Set','Oct','Nov','Des'],
		dayNames: ['Diumenge','Dilluns','Dimarts','Dimecres','Dijous','Divendres','Dissabte'],
		dayNamesShort: ['Dug','Dln','Dmt','Dmc','Djs','Dvn','Dsb'],
		dayNamesMin: ['Dg','Dl','Dt','Dc','Dj','Dv','Ds'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['ca']);
	/*
	$( "#data_naix" ).datepicker({ 
		dateFormat: 'dd/mm/yy', //canvio format per evitar donar error d'insertar a basde de dades que ha de ser aquest format 1991-3-25 (aaaa-mm-dd) i format es yy-mm-dd
		minDate: '-100Y', //minim es fa 100 anys
		maxDate: 'today' //avui es màxim que no podrem triar demà que es tracta la data de neixament
	 });
	 
	 $( "#chdata_naix" ).datepicker({ 
		dateFormat: 'dd/mm/yy', //canvio format per evitar donar error d'insertar a basde de dades que ha de ser aquest format 1991-3-25 (aaaa-mm-dd) i format es yy-mm-dd
		minDate: '-100Y', //minim es fa 100 anys
		maxDate: 'today' //avui es màxim que no podrem triar demà que es tracta la data de neixament
	 });*/
	
	$('.datepicker').each(function(){ //ajuda tenir multiples datepicker que donava error amb el mateix id o diferents ids que havia de fer es tenir el mateix class entre tots els datepikcer llavors ficar each per pillar tots
    	$(this).datepicker({
			dateFormat: 'dd/mm/yy', //canvio format per evitar donar error d'insertar a basde de dades que ha de ser aquest format 1991-3-25 (aaaa-mm-dd) i format es yy-mm-dd
			minDate: '-100Y', //minim es fa 100 anys
			maxDate: 'today' //avui es màxim que no podrem triar demà que es tracta la data de neixament
		});
	});
	
	$("#formulariregistrar").submit(function(){//La hora de clicar per afegir, comprovarem que tots els camps estiguin bé i enviar, si es contrari no deixarem enviar i farem avis.
		var correcte = true;	
		var cont = 0;
		var divs = ["correudiv", "passworddiv", "password2div", "nomdiv", "cognom1div", "cognom2div", "telefondiv", "data_naixdiv", "ciutatdiv", "postaldiv", "carrerdiv", "numerodiv", "pisdiv", "portadiv"];
		for(i=0;i<divs.length;i++){
			if($("#"+divs[i]).hasClass('has-error') || $("#"+divs[i]).hasClass('has-warning')){ //si te classe has-error avisem que s'ha de revisar que no té bé
				cont++;
				correcte = false;
			}	
		}
		
		if(cont!=0){
			mostrar_notificacio_pnotify('Camps Errors: ','S\' ha de revisar '+ cont +' camp/s que t&eacute; error o alertat.','error');
		}

		if($("#pis").val().length != 0 || $("#porta").val().length != 0) { //comprova que un dels dos es introduit per obligar introduir els dos o cap per evitar enviar un del dos introduit.
			if($("#pis").val().length != 0 && $("#porta").val().length != 0) { //Comprova que els dos no poden estar buides (pis i porta)
			} else{
				mostrar_notificacio_pnotify('Info: ','S\' ha de tenir afegit pis i porta o sense que no es obligatori si es una casa sola.','error');
				correcte = false;	
			}
		}
		//return false;
		return correcte;
	});
	
	$("#formularicontacte").submit(function(){//La hora de clicar per afegir, comprovarem que tots els camps estiguin bé i enviar, si es contrari no deixarem enviar i farem avis.
		//alert("Rebut des de formulari submit del contacte");
		var correcte = true;	
		var cont = 0;
		var divs = ["correudiv", "nomcdiv", "cognomsdiv", "temadiv", "comentaridiv"];
		for(i=0;i<divs.length;i++){
			if($("#"+divs[i]).hasClass('has-error') || $("#"+divs[i]).hasClass('has-warning')){ //si te classe has-error avisem que s'ha de revisar que no té bé
				cont++;
				correcte = false;
			}	
		}
		
		if(cont!=0){
			mostrar_notificacio_pnotify('Camps Errors: ','S\' ha de revisar '+ cont +' camp/s que t&eacute; error o alertat.','error');
		}
		//return false;
		return correcte;
	});
	
	$("#formulariafgadr").submit(function(){//La hora de clicar per afegir, comprovarem que tots els camps estiguin bé i enviar, si es contrari no deixarem enviar i farem avis.
		alert("hola");
		/*
		var correcte = true;	
		var cont = 0;
		var divs = ["correudiv", "passworddiv", "password2div", "nomdiv", "cognom1div", "cognom2div", "telefondiv", "data_naixdiv", "ciutatdiv", "postaldiv", "carrerdiv", "numerodiv", "pisdiv", "portadiv"];
		for(i=0;i<divs.length;i++){
			if($("#"+divs[i]).hasClass('has-error') || $("#"+divs[i]).hasClass('has-warning')){ //si te classe has-error avisem que s'ha de revisar que no té bé
				cont++;
				correcte = false;
			}	
		}
		
		if(cont!=0){
			mostrar_notificacio_pnotify('Camps Errors: ','S\' ha de revisar '+ cont +' camp/s que t&eacute; error o alertat.','error');
		}

		if($("#pis").val().length != 0 || $("#porta").val().length != 0) { //comprova que un dels dos es introduit per obligar introduir els dos o cap per evitar enviar un del dos introduit.
			if($("#pis").val().length != 0 && $("#porta").val().length != 0) { //Comprova que els dos no poden estar buides (pis i porta)
			} else{
				mostrar_notificacio_pnotify('Info: ','S\' ha de tenir afegit pis i porta o sense que no es obligatori si es una casa sola.','error');
				correcte = false;	
			}
		}
		//return false;
		return correcte;
		*/
	});
	
	$("#netejarformregistrar").click(function(){
		PNotify.removeAll(); //Borrar totes les notificacions que esta mostrant aquest moment
		netejar_avisats_registrar();//treure els divs que estan posats errors, success, warning
	});
	
	$("#netejarformcontacte").click(function(){
		PNotify.removeAll(); //Borrar totes les notificacions que esta mostrant aquest moment
		netejar_avisats_contacte();//treure els divs que estan posats errors, success, warning
		mostrar_notificacio_pnotify('Info: ','Acaba de netejar tots els camps del contacte!','');
	});
	
	$("#netejarformafeadreca").click(function(){
		PNotify.removeAll(); //Borrar totes les notificacions que esta mostrant aquest moment
		alert("hola");
		netejar_avisats_afgadr();//treure els divs que estan posats errors, success, warning
		mostrar_notificacio_pnotify('Info: ','Acaba de netejar tots els camps del contacte!','');
	});
	
	$('.ciutat').on('autocompletechange',function(){
		var id = "ciutat";
		borrarEstilCamp(id);
		var vari = $("#"+id).val();
		if($("#"+id).val().length == 0) {
			mostrar_notificacio_pnotify("Ciutat","No has introduit res!","error");
			ficarErrorCamp(id);
		} else {
			var regtext = /^([A-Z a-z ñàèòáéíóú]{2,60})$/;
			var comp = expressioRegular(vari, regtext, id);
			if(!comp){
				mostrar_notificacio_pnotify("Ciutat","Han de ser caracters!","error");
			}
		}
	});	
	
	// Quan tanquem qualsevol dialog amb class modal (bootstrap sobretot amb eitqueta class amb modal) quan cliquem per tancar la finestra borrem totes les dades del contingut del form
	$('.modal').on('hidden.bs.modal', function(){
		$(this).find('form')[0].reset();//crida reset del form que trobi a dins dialog que acaba de despareixer
	});
	
	//Arranca la pàgina usuaris per demostrar per poder fer funcionar per pàgina a pàgina
	$("#cos-contingut-usuaris").load("paginationUsuaris.php?page=1");
	$("#iconcarregarusuaris").hide();
	$("#paginationusuaris li").live('click',function(e){
	e.preventDefault();
		$("#cos-contingut-usuaris").hide();
		$("#iconcarregarusuaris").show();    
		$("#paginationusuaris li").removeClass('active');
		$(this).addClass('active');
		var pageNum = this.id;
		$("#cos-contingut-usuaris").load("paginationUsuaris.php?page=" + pageNum);
		$("#iconcarregarusuaris").hide();
		$("#cos-contingut-usuaris").show();
	});
	
	//Arranca la pàgina per demostrar per poder fer funcionar per pàgina a pàgina
	$("#cos-contingut-productes").load("paginationProductes.php?page=1");
	$("#cos-pagines-nav-productes").load("barra-pagines-productes.php");
	$("#iconcarregarproductes").hide();
    $("#paginationproductes li").live('click',function(e){
    e.preventDefault();
		$("#cos-contingut-productes").hide();
    	$("#iconcarregarproductes").show();    
        $("#paginationproductes li").removeClass('active');
        $(this).addClass('active');
        var pageNum = this.id;
        $("#cos-contingut-productes").load("paginationProductes.php?page=" + pageNum);
		$("#iconcarregarproductes").hide();
		$("#cos-contingut-productes").show();
    });
	
	$("#fotosp").fileinput({
		showUpload: false,
		allowedFileExtensions: ["jpg","png"],	
	});
	
});

function mostrar_notificacio_pnotify(titol, missatge, tipus){ //crear finestres amb parametres per evitar crear cada vegada que vull notificar i envio aqui i ho fa directe. Només hauré de posar tipus de notificació, titol i missatge.
	var notf = {
		title: titol,
		text: missatge,
		stack: stack_context
	};
	switch(tipus){
	 case 'error':
		notf.type = "error";
	 break;
	 case 'info':
		notf.type = "info";
	 break;
	 case 'success':
		notf.type = "success";
	 break;	
	}
	new PNotify(notf); //mostra notificació amb variable opcions fets
}

//Funcions per ficar estil ok, error, warning i borrar estil per evitar tornar introduir i ocupar més espai a la pàgina
function borrarEstilCamp(id){
	$("#"+id+"div").removeClass("has-warning has-error has-success");
	$("#"+id+"icon").removeClass("glyphicon-remove glyphicon-ok glyphicon-alert");
}

function ficarErrorCamp(id){
	$("#"+id+"div").addClass("has-error");
	$("#"+id+"icon").addClass("glyphicon-remove");
}

function ficarCorrecteCamp(id){
	$("#"+id+"div").addClass("has-success");
	$("#"+id+"icon").addClass("glyphicon-ok");	
}

function ficarWarningCamp(id){
	$("#"+id+"div").addClass("has-warning");
	$("#"+id+"icon").addClass("glyphicon-alert");
}

//Funcions per netejar els valors i camps del input com radio, select i etc

function NetejarCampsSelect(prselect){
	while (prselect.length > 1) { //Borrem actualment tots menys posició 0 es on tenim Provincia/Regio
		prselect.remove(prselect.length-1);
	}
}

//Funció per comprovar tots els expressions regulars: variable introduida, expressio regular i id div i id input per mostrar error o correcte. Si es incorrecte retorna false sinó true
function expressioRegular(vari, regtext, id){
	if (regtext.test(vari)){
		ficarCorrecteCamp(id);
		return true;
	} else {
		ficarErrorCamp(id);
		return false;
	}
}

//Funció per comprovar tots els camps que siguin correcte abans d'enviar a BD o fer una consulta des de les pàgines registrar i contacte
function comprovarCamps(id){
	PNotify.removeAll(); //Borrar totes les notificacions que esta mostrant aquest moment
	var vari = $("#"+id).val();
	borrarEstilCamp(id);
	if($("#"+id).val().length == 0) {
		switch(id){
			case 'correu':
			case 'correu1': //es pel contacte sino sortiria notificacions que no es per registrar i tal
				mostrar_notificacio_pnotify("Correu","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'password':
				mostrar_notificacio_pnotify("Password","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'password2':
				mostrar_notificacio_pnotify("Repetir Password","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'nom':
				mostrar_notificacio_pnotify("Nom","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'cognom1':
				mostrar_notificacio_pnotify("Primer cognom","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'cognom2':
				mostrar_notificacio_pnotify("Segon cognom","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'telefon':
				mostrar_notificacio_pnotify("Tel&ecirc;fon","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'data_naix':
				mostrar_notificacio_pnotify("Data de naixament","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'pais':
				var prselect = document.getElementById("provinciaregio"); //Pillem id de select de provinci/regio
				NetejarCampsSelect(prselect);
				
				$("#ciutat").val("");
				$( "#ciutat" ).autocomplete({
  					disabled: true
				});
				$("#ciutat").attr("disabled","true");
				
				mostrar_notificacio_pnotify("Pais","Torna escullir!","error");
				borrarEstilCamp("provinciaregio");
				borrarEstilCamp("ciutat");
				ficarErrorCamp(id);
			break;
			case 'provinciaregio':
				$("#ciutat").val("");
				$( "#ciutat" ).autocomplete({
  					disabled: true
				});
				$("#ciutat").attr("disabled","true");
				
				mostrar_notificacio_pnotify("Provincia/Regio","Torna escullir!","error");
				ficarErrorCamp(id);
				borrarEstilCamp("ciutat");
			break;
			case 'ciutat':
				mostrar_notificacio_pnotify("Ciutat","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'postal':
				mostrar_notificacio_pnotify("Postal","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'carrer':
				mostrar_notificacio_pnotify("Carrer","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'numero':
				mostrar_notificacio_pnotify("Numero","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'tema':
				mostrar_notificacio_pnotify("Tema","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'comentari':
				mostrar_notificacio_pnotify("Comentari","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'pnom':
				mostrar_notificacio_pnotify("Nom producte","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'ppreu':
				mostrar_notificacio_pnotify("Preu","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'puni':
				mostrar_notificacio_pnotify("Unitat","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
			case 'categoria':
				mostrar_notificacio_pnotify("Categoria","Torna escullir una categoria!","error");
				ficarErrorCamp(id);
			break;
			case 'desc':
				mostrar_notificacio_pnotify("Descripció","No has introduit res!","error");
				ficarErrorCamp(id);
			break;
		}
	} else {
		switch(id){
			case 'correu':
			case 'correu1': //es pel contacte sino sortiria notificacions que no es per registrar i tal
				var regtext = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
			break;
			case 'password':
				var regtext = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
			break;
			case 'password2':
				var pas1 = $("#password").val();
				var pas2 = $("#password2").val();
				//alert(pas1 +" "+ pas2);
				if($("#passworddiv").hasClass("has-error")){
					mostrar_notificacio_pnotify('La primera contrassenya!','La primera contrassenya no t&eacute; format que demana, torna introduir que compleixi les normes.','error' );
					ficarErrorCamp("password2");
				} else { 
					if( pas1 != pas2 ){
						mostrar_notificacio_pnotify('Les contrassenyes!','No s&oacute;n les mateixes i torna introduir!','error' );
						ficarWarningCamp("password");
						ficarWarningCamp("password2");
						comppas2 =false;
					} else {
							borrarEstilCamp("password");//per poder afegir que es correcte sino no canvia estat per no haver borrat estat warning
							ficarCorrecteCamp("password");
							ficarCorrecteCamp("password2");
					}
				}
			break;
			case 'nom':
			case 'nomc':
			case 'cognoms':
			case 'cognom1':
			case 'cognom2':
			case 'ciutat':
				var regtext = /^([A-Z a-z ñàèòáéíóú]{2,60})$/;
			break;
			case 'telefon':
				var regtext = /^\d{9}$/;
			break;
			case 'data_naix':
				var regtext = /(\d{1,2})\/(\d{1,2})\/(\d{4})/;
			break;
			case 'postal':
				var regtext = /^\d{5}$/;
			break;
			case 'numero':
			case 'pis':
			case 'porta':
			case 'puni':
				var regtext = /^([0-9])*$/;
			break;
			case 'ppreu':
				var regtext = /^-?[0-9]+([.][0-9]*)?$/;
			break;
			case 'pais':
				var id_pais = $("#"+id).val();//Pillem valor escullit del pais per poder pillar totes les provincies i regions (depen pais)
				var prselect = document.getElementById("provinciaregio"); //Pillem id de select de provinci/regio
				NetejarCampsSelect(prselect);
				
				for(i=0;i<provinciesregions.length;i++){
					//alert("id_pais : "+ id_pais +" id_pais provincia/regio : "+ provinciesregions[$i]['id_pais']);
					if(id_pais == provinciesregions[i]['id_pais']){
						var coption = document.createElement("option");
						coption.value = provinciesregions[i]['id'];
						coption.text = provinciesregions[i]['nom'];
						prselect.add(coption);
					}
				}
				ficarCorrecteCamp(id);
			break;
			case 'provinciaregio':
				var id_provinciaregio = $("#"+id).val();//Pillem valor escullit del provincia/regio
				var ciutat_pr = []; //Crear array per ficar autocomplete i fiquem tots els pobles i ciutats de provincia/regio escullit
				var cont = 0;
				//alert(id_provinciaregio);
				for(i=0;i<ciutats.length;i++){
					//alert("id_provincia/regio : "+ id_provinciaregio +" id_provincia/regio ciutat : "+ ciutats[$i]['id_provinciaregio']);
					if(id_provinciaregio == ciutats[i]['id_provinciaregio']){ //Comparant que si estan a dins la provincia fiquem array
						ciutat_pr[cont]= ciutats[i]['nom'];
						cont++;
					}
				}
				
				$( "#ciutat" ).autocomplete({//mostrem ciutats quan escribim una paraula surt la llista de posibles 
					disabled: false,
					source: ciutat_pr,
					change: function (event, ui) {
						borrarEstilCamp("ciutatdiv", "ciutat");
						if (ui.item) {
							ficarCorrecteCamp("ciutatdiv", "ciutat");           
						} else {
							ficarCorrecteCamp("ciutatdiv", "ciutat");
						}
					}
				});
				$( "#ciutat" ).autocomplete( "option", "appendTo", ".dialogauto"); //Ja funciona autocomplete a dins d'una finestra dialog bootstrap
				
				$("#ciutat").removeAttr("disabled");
				$("#ciutat").val("");
				borrarEstilCamp("ciutat");
				
				ficarCorrecteCamp(id);
			break;
			default://sexe, carrer
				ficarCorrecteCamp(id);
			break;
		}
		if(typeof regtext != "undefined"){
			var comp = expressioRegular(vari, regtext, id);
			if(!comp){
				switch(id){
					case 'correu':
					case 'correu1': //es pel contacte sino sortiria notificacions que no es per registrar i tal
						mostrar_notificacio_pnotify("Correu","El format del correu es xxx@xxx.xx","error");
					break;
					case 'password':
						mostrar_notificacio_pnotify("Password","Ha de tenir m&eacute;s un caracter min&uacute;scula, un caracter mayuscula, un n&uacute;mero o un caracter especial i ha de tenir m&eacute;s 8 caracters total!", "error");
						//Sempre quan acabem introduir la primer contrassenya si la segona contrassenya estava ja posada sempre borarem encara estava igual (ara diferent i etc) i malament o avisat. Sempre tindrà tornar introduir la segona contrasenya
						borrarEstilCamp("password2");
						$("#password2").val("");

					break;
					case 'nom':
						mostrar_notificacio_pnotify("Nom","Han de ser caracters!","error");
					break;
					case 'nomc':
						mostrar_notificacio_pnotify("Nom","Han de ser caracters!","error");
					break;
					case 'cognom1':
						mostrar_notificacio_pnotify("Primer Cognom","Han de ser caracters!","error");
					break;
					case 'cognom2':
						mostrar_notificacio_pnotify("Segon cognom","Han de ser caracters!","error");
					break;
					case 'cognoms':
						mostrar_notificacio_pnotify("Cognoms","Han de ser caracters!","error");
					break;
					case 'telefon':
						mostrar_notificacio_pnotify("Tel&ecirc;fon","Ha de tenir nou numeros!","error");
					break;
					case 'data_naix':
						mostrar_notificacio_pnotify("Data de naixament","El format ha de ser dd/mm/aaaa","error");
					break;
					case 'ciutat':
						mostrar_notificacio_pnotify("Ciutat","Han de ser caracters!","error");
					break;
					case 'postal':
						mostrar_notificacio_pnotify("Postal","Han de ser 5 numeros!","error");
					break;
					case 'numero':
						mostrar_notificacio_pnotify("Numero","Han de ser numeros!","error");
					break;
					case 'pis':
						mostrar_notificacio_pnotify("Pis","Han de ser numeros!","error");
					break;
					case 'porta':
						mostrar_notificacio_pnotify("Porta","Han de ser numeros!","error");
					break;
					case 'ppreu':
						mostrar_notificacio_pnotify("Preu","Han de ser números i són decimals es separa amb punt . !","error");
					break;
					case 'puni':
						mostrar_notificacio_pnotify("Unitat","Han de ser números!","error");
					break;
				}
			} else {
				switch(id){
					case 'correu':
						if (typeof correus == "undefined"){ //Per evitar donar error la console que tenim dos formularis un necessitem que comprobi arribara amb variable però altre no cal per tant no haura definit el variable...
    						//alert("Variable obj3 no definida");
						} else {
							for(u=0;u<correus.length;u++){ //comprovar tots els correus que tenim BD i comprar que tenim posat actualment per evitar tenir un altre igual
								if(vari==correus[u]){
									borrarEstilCamp(id);
									ficarWarningCamp(id);
									mostrar_notificacio_pnotify("Correu","Ja tenim registrat aquest correu!","error");
								}
							}	
						}
					break;
				}	
			}
		}
	}	
}

//funcions per AJAX des de usuaris per modificar, borrar i modificar
function cridafuncioacciousuari(accio,id) {
	PNotify.removeAll(); //Borrar totes les notificacions que esta mostrant aquest moment
	$("#iconcarregarusuaris").show();
	var query;
	switch(accio) {
		case "modificar":
			var nom = $("#chnom"+id).val();
			var cognom1 = $("#chcognom1"+id).val();
			var cognom2 = $("#chcognom2"+id).val();
			var hd = $("#chhd"+id).val();
			var telf = $("#chtelefon"+id).val();
			query = 'accio='+accio+'&id_usuari='+ id +'&nom='+ nom +'&cognom1='+ cognom1 +'&cognom2='+ cognom2 +'&hd='+ hd +'&telf='+ telf;
		break;
		case "eliminar":
			query = 'accio='+accio+'&id_usuari='+id;
			//alert("Eliminar");
		break;
		case 'canviestat':
			var id_estat = $("#selectestats"+id).select().val();//pillem que hem selecionat el permis que acaba de recullir 
			query = 'accio='+accio+'&id_usuari='+id+'&id_estat='+id_estat;
			//alert(id_estat);
		break;
		case 'canvirol':
			var id_rol = $("#selectrol"+id).select().val();//pillem que hem selecionat el permis que acaba de recullir
			query = 'accio='+accio+'&id_usuari='+id+'&id_rol='+id_rol;
			//alert(id_rol);
		break;
	}

	//Aqui fem accions que rebem i cridem a BD amb AJAX que permet fer sense carregar la pàgina i tal es com no haguessis passat res la pàgina.
	$.ajax({
		url: "accionsBDusuaris.php",
		data:query,
		type: "POST",
		success:function(data){
			switch(accio) { //que ha sortit bé i fem missatge cada acció
				case "afegir":
					//alert("Acaba d'entrar AJAX per insertar!");
				break;
				case "eliminar": 
					mostrar_notificacio_pnotify("Usuari","Acaba d'eliminar correctament!","success");
					$("#cos-contingut-usuaris").load("paginationUsuaris.php?page=1"); //tornem carregar la pagina aixi no mostra usuari que acabem d'eliminar
				break;
				case "modificar":
					mostrar_notificacio_pnotify("Usuari","Acaba de modificar correctament!","success");
					$("#cos-contingut-usuaris").load("paginationUsuaris.php?page=1");
					$('#myModalmod'+id).modal('hide'); //amagar i borrar fondo que no marxava
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
				break;
				case "canviestat":
					mostrar_notificacio_pnotify("Estat","Acaba de fer canvi correctament!","success");
				break;
				case "canvirol":
					mostrar_notificacio_pnotify("Rol","Acaba de fer canvi correctament!","success");
				break;
			}
			$("#iconcarregarusuaris").hide();
		},
		error:function (){ //Si surt malament hem de fer avis error
			mostrar_notificacio_pnotify("AJAX BD","En general no funciona!","error");
			$("#iconcarregarusuaris").hide();
		}
	});
};

//Funciones per modificar models sobre usuari i productes per no crear un altre
function modelusuari(){
	$("#titoldialogr").html("Crear usuari");	
	$("#btn-registrar").html("Crear");	
}

//funciona des de la pàgina productes
function seleccionarcategoria(id){
	var id_select = $("#"+id).select().val();//Pillem id escullit d'una d'aquestes categories i enviem cap pagination que mostri nomes aquesta categoria amb GET
	//alert(id_select);
	$("#cos-contingut-productes").load("paginationProductes.php?page=1&id_select="+id_select);
	$("#cos-pagines-nav-productes").load("barra-pagines-productes.php?categoria="+id_select);
}

//mostrar i amagar els productes
function clickMostrarAmagar(vari){
	$('#tr'+vari.id).slideToggle(500);
}

