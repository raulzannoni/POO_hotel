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



    }