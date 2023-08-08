<?php

class Client {
    
    public $firstName;
    public $idNumber;

    public function __construct(string $firstName, int $idNumber)
    {
        $this->firstName = $firstName;
        $this->idNumber = $idNumber;
    }

    public function getClientPersonalInfo()
    {
        $clientInfo = ["
        <h2>Client's Personal Information</h2>
        <h3>Name: $this->firstName</h3>
        <h4>ID Number: $this->idNumber</h4>
        "];
        return $clientInfo;
    }
}
