<?php

//creation de la class Chambre
class Chambre
    {
        //attributes privées de la class Hotel
        private Hotel $_hotel;
        private int $_index;  
        private bool $_reserve;
        private bool $_wifi;
        private Reservation $_reservation;

        //creation de le constructor de la chambre
        public function __construct(Hotel $hotel, int $index)
            {
                $this->_hotel = $hotel;
                $this->_hotel->addChambre($this);
                $this->_index = $index;
                $this->_reserve = TRUE;
                $this->_wifi = TRUE;
            }

        //setter pour chaque attribute
        public function setHotel(Hotel $hotel)
            {
                $this->_hotel = $hotel;
            }
        public function setIndex(int $index)
            {
                $this->_index = $index;
            }
        public function setReserve(bool $reserve)
            {
                $this->_reserve = $reserve;
            }
        public function setReservation(Reservation $reservation)
            {
                $this->_reservation = $reservation;
            }
        public function setWifi(bool $wifi)
            {
                $this->_wifi = $wifi;
            }
        
        //getter pour chaque attribute
        public function getHotel()
            {
                return $this->_hotel;
            }
        public function getIndex()
            {
                return $this->_index;
            }
        public function getReserve()
            {
                return $this->_reserve;
            }
        public function getReservation()
            {
                return $this->_reservation;
            }
        public function getWifi()
            {
                return $this->_wifi;
            }    
        //methode pour afficher le nom de l'objet Chambre
        public function __toString()
            {
                return "Chambre $this->_index";
            }
        //methode pour ajouter une chambre reservé
        public function addReservation(Reservation $newReservation)
            {
                $this->_reservation = $newReservation;
            }
    }



?>