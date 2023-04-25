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

//creation de les objets Chambre
$chambre3Hilton = new Chambre($hotelHilton, 3);
$chambre4Hilton = new Chambre($hotelHilton, 4);
$chambre17Hilton = new Chambre($hotelHilton, 17);

//creation de les objets Chambre
$virgileGibello = new Client("virgile", "gibello");
$mickaMurmann = new Client("micka", "murmann");

$reservation_1 = new Reservation($virgileGibello, $chambre17Hilton);
$reservation_2 = new Reservation($mickaMurmann, $chambre3Hilton);
$reservation_3 = new Reservation($mickaMurmann, $chambre4Hilton);

echo $hotelHilton;

echo $chambre17Hilton;

echo $virgileGibello;


?>