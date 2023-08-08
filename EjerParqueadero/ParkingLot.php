<?php

include_once "Vehicle.php";

class ParkingLot extends Vehicle {

    public $floors;
    public $entryTime;
    public $exitTime;
    public $assignedFloor; 
    public $assignedSpot;

    public function __construct(Client $client, Vehicle $vehicle, string $entryTime, string $exitTime)
    {
        parent::__construct($client, $vehicle->licensePlate, $vehicle->brand, $vehicle->color);

        $this->entryTime = $entryTime;
        $this->exitTime = $exitTime;
        $this->floors = [
            'Floor1' => [],  
            'Floor2' => [],
            'Floor3' => [],
            'Floor4' => [],
        ];
        $this->assignedFloor = null; 
        $this->assignedSpot = null;
    }

    public function setAddFloorSpot()
    {
        $spot = rand(1, 10);
        $randomFloor = array_rand($this->floors);
        if (array_key_exists($randomFloor, $this->floors)) {
            if (!in_array($spot, $this->floors[$randomFloor])) {
                $this->floors[$randomFloor][] = $spot;
                $this->assignedFloor = $randomFloor;
                $this->assignedSpot = $spot;
            } else {
                echo "Spot $spot is already occupied on floor $randomFloor";
            }
        } else {
            echo "The floor $randomFloor you are trying to assign does not exist";
        }
    }

    public function showAll()
    {
        echo "<table border='1'>";
        echo "<tr><th>Floors</th><th>Spots</th><th>Data</th></tr>";
        foreach ($this->floors as $floor => $spot) {
            echo "<tr>";
            echo "<td>" . $floor . "</td>";
            echo "<td>";
            if (count($spot) > 0) {
                print_r($spot);
            } else {
                echo "No spots on this floor, it's empty";
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function getAllInfo()
    {
        $clientData = $this->getClientPersonalInfo(); 
        $vehicleData = $this->getVehiclePersonalInfo();
        $parkingData = ["
            <h2>Parking Lot Information</h2>
            <h3>Floor: $this->assignedFloor</h3>
            <h4>Spot: $this->assignedSpot</h4>
        "];
        return array_merge($clientData, $vehicleData, $parkingData);
    }

    public function getCost()
    {
        if ($this->entryTime < 1 || $this->entryTime > 24 || $this->exitTime < 1 || $this->exitTime > 24) {
            return "<h4>ERROR: Invalid time format. Time should be between 1 and 24 hours. Please verify.</h4>";
        } else {
            $this->entryTime = strtotime($this->entryTime);
            $this->exitTime = strtotime($this->exitTime);
            $parkingDuration = $this->exitTime - $this->entryTime;
            $hoursParked = ceil($parkingDuration / 3600);
            $rate = 2;
            $totalAmount = $hoursParked * $rate;
            $entryTimeFormatted = date('H:i:s', $this->entryTime);
            $exitTimeFormatted = date('H:i:s', $this->exitTime);
            $estimatedTime = date('H:i:s', $parkingDuration - 3600);
            return "<h4>Your entry time was $entryTimeFormatted and exit time was $exitTimeFormatted. You parked for a total of $estimatedTime hour/s. The total amount to pay is $$totalAmount</h4>";
        }
    }
}
