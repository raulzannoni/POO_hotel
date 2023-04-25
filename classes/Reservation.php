<?php

//creation de la class Reservation
class Reservation
    {  
        //attributes privées de la class Reservation
        private Client $_client;
        private Chambre $_chambre;


        //creation de le constructor de la class Reservation
        public function __construct(Client $client, Chambre $chambre)
            {
                $this->_client = $client;
                $this->_chambre = $chambre;
                $this->_client->addReservation($this);
                $this->_chambre->addReservation($this);
            }
        
        //setter pour chaque attribute
        public function setClient(Client $client)
            {
                $this->_client = $client;
            }
        public function setChambre(Chambre $chambre)
            {
                $this->_chambre = $chambre;
            }
        
        //getter pour chaque attribute
        public function getClient()
            {
                return $this->_client;
            }
        public function getChambre()
            {
                return $this->_chambre;
            }

    }