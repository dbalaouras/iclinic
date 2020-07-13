<?php

namespace App\Controllers;

use App\Models\PatientsModel;

class Patients extends BaseController
{
	public function index()
	{
		$model = new PatientsModel();

		$data = [
			'patients'  => $model->find(),
			'title' => 'Ασθενείς',
		];

		echo view('templates/header', $data);
		echo view('patients/overview', $data);
		echo view('templates/footer', $data);
	}

	public function edit($amka = null)
	{
		$model = new PatientsModel();

		$data = [
			'patient'  => $model->find($amka),
			'title' => 'Επεξεργασία Ασθενή',
			'form_action' => '/patients/update',
			'is_new' => false
		];

		if ($this->request->getVar('update_success')) {
			$data['messages'] =  "Επιτυχής αποθήκευση ασθενούς.";
		}

		if (empty($data['patient'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Δεν βρέθηκε ο ασθενής με ΑΜΚΑ: ' . $amka);
		}

		echo view('templates/header', $data);
		echo view('patients/form', $data);
		echo view('templates/footer', $data);
	}

	protected function store($is_new = true)
	{
		$model = new PatientsModel();

		$data = [
			'patient'  => [
				'amka' => $this->request->getVar('amka'),
				'first_name'  => $this->request->getVar('first_name'),
				'last_name'  => $this->request->getVar('last_name'),
				'year_of_birth'  => $this->request->getVar('year_of_birth'),
				'allergies'  => $this->request->getVar('allergies'),
			],
			'title' => 'Καταχώρηση ασθενούς',
			'form_action' => '/patients/create',
			'is_new' => $is_new
		];

		if ($this->request->getMethod() == 'post') {
			if (!$this->validate(
				[
					'amka' => 'required|min_length[8]|max_length[255]',
					'first_name'  => 'required',
					'last_name'  => 'required',
					'year_of_birth'  => 'required',
				],
				[
					'amka' => ['required' => 'Παρακαλώ συμπληρώστε το ΑΜΚΑ', 'min_length' => 'Το ΑΜΚΑ πρέπει να είναι τουλάχιστον 8 χαρακτήρες'],
					'first_name'  => ['required' => 'Παρακαλώ συμπληρώστε το Όνομα'],
					'last_name'  => ['required' => 'Παρακαλώ συμπληρώστε το Επώνυμο'],
					'year_of_birth'  => ['required' => 'Παρακαλώ συμπληρώστε το έτος γέννησης'],
				]
			)) {
			} else {
				if ($is_new) {
					$model->insert($data['patient'], true);
				} else {
					$model->update($this->request->getVar('amka'), $data['patient']);
				}

				return redirect()->to('/patients/' . $this->request->getVar('amka') . '?update_success=1');
			}
		}

		echo view('templates/header', $data);
		echo view('patients/form', $data);
		echo view('templates/footer', $data);
	}
}
