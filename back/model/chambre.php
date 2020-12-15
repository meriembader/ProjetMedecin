chambre.php


<?php
	/**
	* 
	*/
class Reclamation
	{
		public $idchambre;
		public $etage;
		public $etat;
		
		function __construct($idchambre,$etage,$etat)
		{
			$this->idchambre=$idchambre;
			$this->etage=$etage;
			$this->etat=$etat;
			

		}

		function getIdchambre(){
			return $this->idchambre;
		}
		function getEtage(){
			return $this->etage;
		}
		function getdEtat(){
			return $this->etat;
		}
		

		function setIdchambre($idchambre){
			$this->idchambre=$idchambre;
		}
		function setEtage($etage){
			$this->etage=$etage;
		}
		function setEtat($etat){
			$this->etat=$etat;
		}
		
	
	}

  ?>