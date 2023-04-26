<h1>POO_Hotel</h1>

<h3>****************************</h3>

<?php

//methode pour intégrer toutes les class crées
spl_autoload_register(function ($class_name) 
    {
        include 'classes/' . $class_name . '.php';
    });

//creation de les objets Hotel
$hotelHilton = new Hotel("Hilton", 4, "10 route de la Gare 67000 Strasbourg", 30);
$hotelRegent = new Hotel("Regent", 4, "61 rue de Dauphine 75006 Paris", 45);

//creation de les objets Chambre
$chambre3Hilton = new Chambre($hotelHilton, 3);
$chambre4Hilton = new Chambre($hotelHilton, 4);
$chambre17Hilton = new Chambre($hotelHilton, 17);

//creation de les objets Chambre
$virgileGibello = new Client("virgile", "gibello");
$mickaMurmann = new Client("micka", "murmann");

//creation de les reservations (client - chambre)
$reservation_1 = new Reservation($virgileGibello, $chambre17Hilton, "01-01-2021", "01-01-2021");
$reservation_2 = new Reservation($mickaMurmann, $chambre3Hilton, "11-03-2021", "15-03-2021");
$reservation_3 = new Reservation($mickaMurmann, $chambre4Hilton, "01-04-2021", "17-04-2021");

//infos sur les hotels
$hotelHilton->getInfo();
$hotelRegent->getInfo();

//infos sur les reservations de les hotels
$hotelHilton->getReservations();
$hotelRegent->getReservations();

//infos sur les reservations de les clients
$mickaMurmann->getReservations();
$virgileGibello->getReservations();

//infos sur les statuts de les hotels
$hotelHilton->getStatut();


?>