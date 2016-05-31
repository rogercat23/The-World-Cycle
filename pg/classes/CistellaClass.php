<?php
session_start();
class CistellaClass{
 
	//iniciem array per guardar tots els productes
	private $cistella = array();
 
	//Iniciem constructor i comprovem que existexia sino 
	public function __construct()
	{
		
		if(!isset($_SESSION["cistella"]))
		{
			$_SESSION["cistella"] = null;
			$this->cistella["preu_total"] = 0;
			$this->cistella["productes_total"] = 0;
		}
		$this->cistella = $_SESSION['cistella'];
	}
 
	//Afeigr un producte a la cistella
	public function add($producte = array())
	{
		//Primer comprovem si es array pel producte sino a excepcio
		if(!is_array($producte) || empty($producte))
		{
			throw new Exception("Error, el producte no es un array!", 1);	
		}
 
		//Sempre comprovant que hi hagi id, quantitat i preu sino excepcio
		if(!$producte["id"] || !$producte["quantitat"] || !$producte["preu"])
		{
			throw new Exception("Error, el producte no tenim posat id o quantitat o preu!", 1);	
		}
 
		//Que tinguin numeros sino excepcio
		if(!is_numeric($producte["id"]) || !is_numeric($producte["quantitat"]) || !is_numeric($producte["preu"]))
		{
			throw new Exception("Error, el id, la quantitat i el preu han de ser números!", 1);	
		}
 
		//Crear identificador aquest producte 
		$unique_id = md5($producte["id"]);
 
		//Creem un únic iddentificador pel producte
		$producte["unique_id"] = $unique_id;
		
		//Si no esta buida la cistella recorrem 
		if(!empty($this->cistella))
		{
			foreach ($this->cistella as $row) 
			{
				//Comprovant si estava cistella o no aquest producte per actualitzar o insertar
				if($row["unique_id"] === $unique_id)
				{
					//si ja estava sumem quantitat o restem 
					$producte["quantitat"] = $row["quantitat"] + $producte["quantitat"];
				}
			}
		}
 
	    //Afegir un element total per preu degut quantitat del producte 
	    $producte["total"] = $producte["quantitat"] * $producte["preu"];
 
	    //primer borrem el producte si ja esta la cistella
	    $this->unset_producte($unique_id);
 
	    //Ara afegim el producte a la cistella sessió
	    $_SESSION["cistella"][$unique_id] = $producte;
 
	    //Actualitzar la cistella
	    $this->actualitzar_cistella();
 
 		//Actualitzar el preu total i el numero dels productes de la cistella
	    $this->actualitzar_preu_quantitat();
 
	}
 
 	//metode per actualitzar el preu total i quantitat. Sobretot preu total de la cistella
	private function actualitzar_preu_quantitat()
	{
		//creem variables el preu i els productes per actualitzar actualment
		$preu = 0;
		$productes = 0;
 
		//tornem recorrer que tenim guardat per actualitzar actual i tornar contar quantitat i preu total
		foreach ($this->cistella as $row) 
		{
			$preu += ($row['preu'] * $row['quantitat']);
			$productes += $row['quantitat'];
		}
 
		//Signem sessions
		$_SESSION['cistella']["productes_total"] = $productes;
		$_SESSION['cistella']["preu_total"] = $preu;
 
		//refresquem la cistella
		$this->actualitzar_cistella();
	}
 
	//Retorna numero de preu total
	public function preu_total()
	{
		//Sino existeix cistella i preu total sera 0 per retornar
		if(!isset($this->cistella["preu_total"]) || $this->cistella === null)
		{
			return 0;
		}
		//Sino es numeric a excepció
		if(!is_numeric($this->cistella["preu_total"]))
		{
			throw new Exception("El preu total de la cistella ha de ser un numero", 1);	
		}
		//retornar preu total
		return $this->cistella["preu_total"] ? $this->cistella["preu_total"] : 0;
	}
 
	//Retorna numero de productes
	public function productes_total()
	{
		//Sino esta definit total productes o no existeix la cistella sera 0 productes per retornar
		if(!isset($this->cistella["productes_total"]) || $this->cistella === null)
		{
			return 0;
		}
		//si veu no es numero excepció
		if(!is_numeric($this->cistella["productes_total"]))
		{
			throw new Exception("EL numero de productes ha de ser numero", 1);	
		}
		//aquest retornem num de productes total
		return $this->cistella["productes_total"] ? $this->cistella["productes_total"] : 0;
	}
 
	//fa es retorna contingut de la cistella (productes)
	public function get_content()
	{
		$cistella = $this->cistella;
		unset($cistella["productes_total"]);
		unset($cistella["preu_total"]);
		return $cistella == null ? null : $cistella;
	}
	
	//retornar si existeix producte amb clau unica  sino 0
	public function get_producte_cistella($id, $nom, $quantitat, $preu){
		$cistella = $this->cistella;
		if(count($cistella) !=0){
			foreach($cistella as $producte){
				if($producte['id']==$id && $producte['nom']==$nom && $producte['preu']==$preu){
					return $producte["quantitat"];
				}		
			}
		}
		return 0;
	}
 
	//Es metode per actualitzar el producte si existexia
	private function unset_producte($unique_id)
	{
		unset($_SESSION["cistella"][$unique_id]);
	}
 
	//Es per borrar un producte que hem de passar clau unica que conteix un d'ells
	public function borrar_producte($unique_id)
	{
		//Sino existeix la cistella
		if($this->cistella === null)
		{
			throw new Exception("La cistella no existeix!", 1);
		}
 
		//Sino existeix id unic del producte de la cistella
		if(!isset($this->cistella[$unique_id]))
		{
			throw new Exception("Unique id no existeix!", 1);
		}
 
		//Actualitzar tot degut eliminat un producte
		unset($_SESSION["cistella"][$unique_id]);
		$this->actualitzar_cistella();
		$this->actualitzar_preu_quantitat();
		return true;
	}
 
	//es per eliminar complet a la cistella
	public function destroy()
	{
		unset($_SESSION["cistella"]);
		$this->cistella = null;
		return true;
	}
 
	//actualizamos el contenido del carrito
	public function actualitzar_cistella()
	{
		self::__construct();
	}
 
}