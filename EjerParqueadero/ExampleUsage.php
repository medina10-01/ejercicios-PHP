<?php

include_once "Client.php";
include_once "Vehicle.php";
include_once "ParkingLot.php";

$client1 = new Client("Darickson", 123456789);
$vehicle1 = new Vehicle($client1, "ABC123", "Toyota", "Red");
$parkingSpot = new ParkingLot($client1, $vehicle1, '10:00:00', '12:00:00');
$parkingSpot->setAddFloorSpot();

$allInfo = $parkingSpot->getAllInfo();

foreach($allInfo as $key){
    echo $key;
}
echo $parkingSpot->getCost();

?>
     