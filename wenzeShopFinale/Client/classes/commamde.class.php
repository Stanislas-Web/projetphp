<?php
 class Commande{
    private $IdCommande;
    private $NomClient;
    private $TelephoneClient;
    private $CommuneClient;
    private $QuartierClient;
    private $AvenueClient;
    private $NumeroClient;
    private $NomProduit;
    private $QuantiteProduit;
    private $PrixProduit;
    private $PrixTotal;
    private $DateCommande;
    private $TempsCommande;
//les getters
    public function getIdCommande()
		{
			return $this->IdCommande;
        }
    
    public function getNomClient()
		{
			return $this->NomClient;
        }
    public function getTelephoneClient(){
        return $this->TelephoneClient;
    }
    public function getCommueClient(){
        return $this->CommuneClient;
    }
    public function getQuartierClient(){
        return $this->QuartierClient;
    }
    public function getAvenueClient(){
        return $this->AvenueClient;
    }
    public function getNumeroClient(){
        return $this->NumeroClient;
    }
    public function getNomProduit(){
        return $this->NomProduit;
    }
    public function getQuantiteProduit(){
        return $this->QuantiteProduit;
    }
    public function getPrixProduit(){
        return $this->PrixProduit;
    }
    public function getPrixTotal(){
        return $this->PrixTotal;
    }
    public function getDateCommande(){
        return $this->DateCommande();   
    }
    public function getTempsCommande(){
        return $this->TempsCommade();
    }

}
?>