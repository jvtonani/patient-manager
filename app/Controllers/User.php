<?php

namespace App\Controllers;

class User extends BaseController
{
    public function signin(): string
    {
        return 'teste';
    }

    public function getPatients(): string 
    {
        return 'getPatients';

    }

    public function removePatient(): string
    {
        return 'removePatient';
    }
}
