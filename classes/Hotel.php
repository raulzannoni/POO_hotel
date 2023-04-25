<?php

//creation de la class Hotel
class Hotel
    {
        //attributes privées de la class Hotel
        private string $_nom;
        private int $_etoiles;  
        private string $_rue;
        private int $_nombreChambre;

        //setter pour chaque attibutes
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
        public function setNombreChambre(int $nombreChambre)
            {
                $this->_nombreChambre = $nombreChambre;
            }

        //getter pour chaque attibutes
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
        public function getNombreChambre()
            {
                return $this->_nombreChambre;
            }
        
        //creation de le constructor de l'hotel
        public function __construct(string $nom, int $etoiles, string $rue, int $nombreChambre)
            {
                $this->_nom = $nom;
                $this->_etoiles = $etoiles;
                $this->_rue = $rue;
                $this->_nombreChambre = $nombreChambre;
            }
        
        //methode pour imprimer l'objet Hotel
        public function __toString()
            {
                $result = "Hotel ";
                for($i = 0; $i < $this->_etoiles; $i++)
                    {
                        $result .= "*"; 
                    }
                $result .= $this->_nom;
                
                return $result;
            }
        
    }