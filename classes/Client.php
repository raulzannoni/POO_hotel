<?php

//creation de la class Client
class Client
    {        
        //attributes privées de la class Client
        private string $_prenom;
        private string $_nom;
        private array $_reservations;
        
        //creation de le constructor de la class Client
        public function __construct(string $prenom, string $nom)
            {
                $this->_prenom = $prenom;
                $this->_nom = $nom;
                $this->_reservations = [];
            }
        //setter pour chaque attribute
        public function setPrenom(string $prenom)
            {
                $this->_prenom = $prenom;
            }
        public function setNom(string $nom)
            {
                $this->_nom = $nom;
            }
        
        //getter pour chaque attribute
        public function getPrenom()
            {
                return $this->_prenom;
            }
        public function getNom()
            {
                return $this->_nom;
            }
        
        //methode pour afficher le nom de l'objet client
        public function __toString()
            {
                return ucfirst($this->_prenom)." ".strtoupper($this->_nom);
            }

        //methode pour ajouter une reservation à le client associé
        public function addReservation(Reservation $newReservation)
            {
                $this->_reservations[] = $newReservation;
            }
        
        //methode pour afficher les reservations de le client
        public function getReservations()
            {
                //titre   
                ?>
                    <h4>Réservation de <?=$this ?></h4>
                <?php
                //controle s'il n'y a pas de reservation
                if(count($this->_reservations) == 0)
                    {
                        ?>
                            Aucune Reservation !
                        <?php
                    }
                else
                    {
                        //singulier ou pluriel
                        $ReservationS = (count($this->_reservations) > 1) ? "RESERVATIONS" : "RESERVATION";
                        
                        //nombre de les reservations
                        ?>
                            <p><?=count($this->_reservations)." ".$ReservationS?><br></p>
                        <?php

                        //le reservations de ce client
                        foreach($this->_reservations as $reservation)
                            {
                                //index de la chambre
                                $index = $reservation->getChambre()->getIndex();

                                
                                //controle de le wifi de la chambre
                                $wifi = ($reservation->getChambre()->getHotel()->listChambres()[$index]->getWifi()) ? "oui" : "non";

                                //prix par jour de la chambre
                                $prixJour = $reservation->getChambre()->getHotel()->listChambres()[$index]->getPrixJour();
                                ?>
                                <b><?= $reservation->getChambre()->getHotel()?></b> / <?=$reservation->getChambre()?>
                                <?="(". $prixJour." € - Wifi :  ".$wifi.
                                " du ".$reservation->getDateDebut()->format('d-m-Y').
                                " au ".$reservation->getDateSortie()->format('d-m-Y') ?><br>
                                <?php
                            }
                    }      
            }
    }