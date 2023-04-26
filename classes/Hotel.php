<?php

//creation de la class Hotel
class Hotel
    {
        //attributes privées de la class Hotel
        private string $_nom;
        private int $_etoiles;  
        private string $_rue;
        private int $_nombreChambres;
        private array $_chambres;
        private array $_chambresReserve;
        private array $_chambresDispo;
        //setter pour chaque attibute
        public function setNom(string $nom)
            {
                $this->_nom = $nom;
            }
        public function setEtoiles(int $etoiles)
            {
                $this->_etoiles = $etoiles;
            }
        public function setRue(string $rue)
            {
                $this->_rue = $rue;
            }
        public function setNombreChambres(int $nombreChambres)
            {
                $this->_nombreChambres = $nombreChambres;
            }
        public function setChambres(array $chambres)
            {
                $this->_chambres = $chambres;
            }
        public function setChambresDispo(array $chambresDispo)
            {
                $this->_chambresDispo = $chambresDispo;
            }
        public function setChambresReserve(array $chambresReserve)
            {
                $this->_chambresReserve = $chambresReserve;
            }

        //getter pour chaque attibute
        public function getNom()
            {
                return $this->_nom;
            }
        public function getEtoiles()
            {
                return $this->_etoiles;
            }
        public function getRue()
            {
                return $this->_rue;
            }
        public function getNombreChambres()
            {
                return $this->_nombreChambres;
            }
        public function getChambres()
            {
                return $this->_chambres;
            }
        public function getChambresDispo()
            {
                return $this->_chambresDispo;
            }
        public function getChambresReserve()
            {
                return $this->_chambresReserve;
            }    
        //creation de le constructor de l'hotel
        public function __construct(string $nom, int $etoiles, string $rue, int $nombreChambres)
            {
                $this->_nom = $nom;
                $this->_etoiles = $etoiles;
                $this->_rue = $rue;
                $this->_nombreChambres = $nombreChambres;
                $this->_chambres = [];
                for($i=1; $i < $this->getNombreChambres() + 1; $i++)
                    {
                        $this->_chambresDispo[$i] = new Chambre($this, $i);
                        $this->_chambresDispo[$i]->setReserve(FALSE);    
                    }
                $this->_chambresReserve = [];
            }
        
        //methode pour imprimer l'objet Hotel
        public function __toString()
            {
                $result = $this->_nom." ";
                for($i = 0; $i < $this->_etoiles; $i++)
                    {
                        $result .= "*"; 
                    }
                $words = str_word_count($this->_rue)+1;
                $pieces = explode(" ", $this->_rue);
                $result .= " ".$pieces[$words];
                
                return $result;
            }

        //methode pour ajouter une chambre reservé?
        public function addChambre(Chambre $newChambre)
            {
                $this->_chambresReserve[] = $newChambre;
            }

        //methode pour afficher les infos de l'hotel
        public function getInfo()
            {
                ?>
                <h3> <?= $this ?> </h3>
                <?= $this->_rue ?><br>
                            Nombre de chambres: <?=$this->_nombreChambres ?><br>
                            Nombre de chambres réservées: <?=count($this->_chambresReserve) ?><br>
                            Nombre de chambres dispo: <?= $this->_nombreChambres - count($this->_chambresReserve) ?> <br>    
                <?php      
            }

        //methode pour associer le chambre (dispo - reservé) et ajouter le prix par jour
        public function listChambres()
            {
                //boucle pour toutes les chambres
                foreach($this->_chambresDispo as $index => $chambre)
                    {   
                        //par default, toutes les chambres sont disponible
                        $this->_chambres[$index] = $this->_chambresDispo[$index]; 
                        //boucle, toutes les fois, si l'index de la chambre reserve est egal à l'index de le premier boucle
                        foreach($this->_chambresReserve as $chambreReserve)
                            {
                                if($chambreReserve->getIndex() == $index)
                                    {
                                        $this->_chambres[$index] = $chambreReserve;
                                    }
                            }   
                    }
                //definition de 3 differents gamme de prix par jour (120, 200, 300)   
                $gammePetitBudget = intdiv($this->_nombreChambres, 3); //ex: 30 total -> moins cher 1 - 10
                $gammeMoyenBudget = intdiv($this->_nombreChambres - $gammePetitBudget, 2) + $gammePetitBudget; //ex: 30 total -> moyen 11 - 20
                $gammeHautBudget = $this->_nombreChambres; //ex: 30 total -> plus cher 21 - 30
                
                //attribution de prix et de wifi
                foreach($this->_chambres as $key => $chambre)
                    {
                        if($key <= $gammePetitBudget)
                            {
                                $chambre->setPrixJour(120);
                                $chambre->setWifi(FALSE);
                            }
                        elseif($key > $gammePetitBudget and $key <= $gammeMoyenBudget)
                            {
                                $chambre->setPrixJour(200);
                            }
                        else
                            {
                                $chambre->setPrixJour(300);
                            }
                    }

                return $this->_chambres;
            }

        //methode pour afficher les reservations de l'hotel
        public function getReservations()
            {
                 //titre   
                ?>
                    <h4>Réservation de <?=$this ?></h4>
                <?php
                //controle s'il n'y a pas de reservation
                if(count($this->_chambresReserve) == 0)
                    {
                        ?>
                            Aucune Reservation !
                        <?php
                    }
                else
                    {
                        //singulier ou pluriel
                        $ReservationS = (count($this->_chambresReserve) > 1) ? "RESERVATIONS" : "RESERVATION";
                        //nombre de les reservation
                        ?>
                            <p><?=count($this->_chambresReserve)." ".$ReservationS?><br></p>
                        <?php
                        //le reservations de cet hotel
                        foreach($this->_chambresReserve as $chambre)
                            {
                                ?>
                                <p><?= $chambre->getReservation()->getClient()." - ".$chambre ?><br></p>
                                <?php
                            }
                    }             
            }
        
        //methode pour afficher la list de les chambres de l'hotel
        public function getStatut()
            {
                ?>
                    <table border=1>
                        <thead >
                            <caption><h4>Statuts des chambres de <?= $this ?></h4></h4></caption>
                                <tr>
                                    <th>CHAMBRE</th>
                                    <th>PRIX</th>
                                    <th>WI-FI</th>
                                    <th>ETAT</th>
                                </tr>
                        </thead>
                        <tbody>
                    <?php
                foreach($this->listChambres() as $key => $chambre)
                    {
                        $etat =  ($chambre->getReserve()) ? "RESERVE" : "DISPONIBLE";
                        $wifi =  ($chambre->getWifi()) ? "📶" : "";
                        ?> 
                            <tr>
                        
                                    <th><?= $chambre ?></th>
                                    <th><?= $chambre->getPrixJour()." €" ?></th>
                                    <th><?= $wifi ?></th>
                                    <th><?= $etat ?></th>
                            </tr>
                        <?php
                    }
                ?>
                        </tbody>
                    </table>
                <?php
            }
        
    }



?>