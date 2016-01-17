$(document).ready(function() {
	var compcor = true;
	PNotify.prototype.options.styling = "jqueryui"; //Ficar estil amb jquery ui 
	
	stack_context = { //lloc on volem ensenyar missatges 
		"dir1": "down",
		"dir2": "left",
		"context": $("#qd_cos") //div del cos
	};
	
	function netejar_avisats(){
		var ids = ["correu", "password", "password2", "nom", "cognom1", "cognom2", "telefon", "data_naix", "ciutat", "postal", "carrer", "numero", "pis", "porta"];
		for($i=0;$i<ids.length;$i++){//estalviem repetir i cridem per netejar amb array sense repetir res que es més curt i més net.
			borrarEstilCamp(ids[$i]);
		}
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
	
	$( "#data_naix" ).datepicker({ 
		dateFormat: 'dd/mm/yy', //canvio format per evitar donar error d'insertar a basde de dades que ha de ser aquest format 1991-3-25 (aaaa-mm-dd) i format es yy-mm-dd
		minDate: '-100Y', //minim es fa 100 anys
		maxDate: 'today' //avui es màxim que no podrem triar demà que es tracta la data de neixament
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
	
	$("#netejarform").click(function(){
		netejar_avisats();//treure els divs que estan posats errors, success, warning
		mostrar_notificacio_pnotify('Info: ','Acaba de netejar tots els camps del formulari!','');
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

//Funció per comprovar tots els camps que siguin correcte abans d'enviar a BD o fer una consulta
function comprovarCamps(id){
	var vari = $("#"+id).val();
	borrarEstilCamp(id);
	if($("#"+id).val().length == 0) {
		switch(id){
			case 'correu':
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
				while (prselect.length > 1) {
						prselect.remove(prselect.length-1);
				}
				
				$("#ciutat").val("");
				$( "#ciutat" ).autocomplete({});
				
				mostrar_notificacio_pnotify("Pais","Torna escullir!","error");
				borrarEstilCamp("provinciaregio");
				borrarEstilCamp("ciutat");
				ficarErrorCamp(id);
			break;
			case 'provinciaregio':
				mostrar_notificacio_pnotify("Provincia/Regio","Torna escullir!","error");
				ficarErrorCamp(id);
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
		}
	} else {
		switch(id){
			case 'correu':
				var regtext = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
			break;
			case 'password':
				var regtext = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
				if($("#passworddiv").hasClass("has-error")){//Si canviem un altre cop la primera i surt malament, hem de posar malament la segona també
					if( $("#password2div").hasClass("has-success")){
						borrarEstilCamp("password2");
						ficarErrorCamp("password2");//Per mostrar que no es el mateix que la primera hem canviat
					} else {
							
					}
				}
			break;
			case 'password2':
				var pas1 = $("#password").val();
				var pas2 = $("#password2").val();
				//alert(pas1 +" "+ pas2);
				if($("#passworddiv").hasClass("has-error")){
					mostrar_notificacio_pnotify('La primera contrassenya!','La primera contrassenya no té format que demana, torna introduir que compleixi les normes.','error' );
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
				var regtext = /^([0-9])*$/;
			break;
			case 'pais':
				var id_pais = $("#"+id).val();//Pillem valor escullit del pais per poder pillar totes les provincies i regions (depen pais)
				var prselect = document.getElementById("provinciaregio"); //Pillem id de select de provinci/regio
				
				while (prselect.length > 1) { //Borrem actualment tots menys posició 0 es on tenim Provincia/Regio
					prselect.remove(prselect.length-1);
				}
				
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
						mostrar_notificacio_pnotify("Correu","El format del correu es xxx@xxx.xx","error");
					break;
					case 'password':
						mostrar_notificacio_pnotify("Password","Ha de tenir m&eacute;s un caracter min&uacute;scula, un caracter mayuscula, un n&uacute;mero o un caracter especial i ha de tenir m&eacute;s 8 caracters total!", "error");
					break;
					case 'nom':
						mostrar_notificacio_pnotify("Nom","Han de ser caracters!","error");
					break;
					case 'cognom1':
						mostrar_notificacio_pnotify("Primer Cognom","Han de ser caracters!","error");
					break;
					case 'cognom2':
						mostrar_notificacio_pnotify("Segon cognom","Han de ser caracters!","error");
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
				}
			} else {
				switch(id){
					case 'correu':
						for(u=0;u<correus.length;u++){ //comprovar tots els correus que tenim BD i comprar que tenim posat actualment per evitar tenir un altre igual
							if(vari==correus[u]){
								borrarEstilCamp(id);
								ficarWarningCamp(id);
								mostrar_notificacio_pnotify("Correu","Ja tenim registrat aquest correu!","error");
							}
						}
					break;
				}	
			}
		}
	}	
}
