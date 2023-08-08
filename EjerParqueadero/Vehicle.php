<?php

include_once "Client.php";

class Vehicle extends Client {

    public $licensePlate; 
    public $brand;
    public $color;

    public function __construct(Client $client, string $licensePlate, string $brand, string $color)
    {
        parent::__construct($client->firstName, $client->idNumber);

        $this->licensePlate = $licensePlate;
        $this->brand = $brand;
        $this->color = $color;
    }

    public function getVehiclePersonalInfo()
    {
        $vehicleInfo = ["
            <h2>Vehicle Information</h2>
            <h3>License Plate: $this->licensePlate</h3>
            <h4>Brand: $this->brand</h4>
            <h4>Color: $this->color</h4>
        "];

        return array_merge($vehicleInfo);
    }
}
