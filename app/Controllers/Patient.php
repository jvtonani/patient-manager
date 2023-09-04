<?php

namespace App\Controllers;
use App\Models\PatientModel;

class Patient extends BaseController
{
    public function getPatients()
    {
        $patient = new PatientModel();
        
        $data = [
            'patients' => $patient->paginate(15),
            'page' => $patient->pager
        ];

        echo view('template/header');
        echo view('patient/patientGrid', $data);
    }

    public function removePatient(): string
    {
        return 'removePatient';
    }

    public function setPatient(): string 
    {
        return 'teste';
    }

    public function updatePatient(): string
    {
        return 'updatePatient';
    }
}
