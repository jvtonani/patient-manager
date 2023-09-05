<?php

namespace App\Controllers;
use App\Models\PatientModel;

class Patient extends BaseController
{
    public function getPatients()
    {
        $patient = new PatientModel();
        $data = [
            'patients' => $patient->orderBy('name', 'asc')->paginate(10),
            'page' => $patient->pager
        ];

        echo view('template/header');
        echo view('patient/patientGrid', $data);
    }

    public function removePatient($id)
    {
        $patient = new PatientModel();
        $patient->delete($id);
        return redirect('patients/get');
    }

    public function setPatientForm()
    {
        echo view('template/header');
        echo view('patient/patientForm');
    }

    public function setPatient() 
    {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];

        $patient = new PatientModel();
        $patient->insert(array(
            'name' => $name,
            'birthday' => $birthday,
            'gender' => $gender
        ));

        echo view('template/header');
        echo view('patient/patientUpdateSuccess');
    }

    public function getPatient($id)
    {
        $patient = new PatientModel();
        
        echo view('template/header');
        echo view('patient/patientForm', array('patient' => $patient->find($id)));
    }

    public function updatePatient()
    {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $id = $_POST['id'];

        $patient = new PatientModel();
        $patient->update($id, array(
            'name' => $name,
            'birthday' => $birthday,
            'gender' => $gender
        ));

        echo view('template/header');
        echo view('patient/patientUpdateSuccess');
    }
}
