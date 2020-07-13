<?php

namespace App\Controllers;

use App\Models\OperationsModel;
use App\Models\PatientsModel;
use App\Models\DoctorsModel;

class Operations extends BaseController
{
	public function index()
	{
		$model = new OperationsModel();
		$patients_model = new PatientsModel();
		$doctors_model = new DoctorsModel();

		$data = [
			'operations'  => $model->getOperationsFull(),
			'patients'  => $patients_model->find(),
			'doctors' => $doctors_model->find(),
			'title' => 'Χειρουργεία',
		];

		print_r($data['operations']);
		exit;

		echo view('templates/header', $data);
		echo view('operations/overview', $data);
		echo view('templates/footer', $data);
	}

	public function edit($id = null)
	{
		$model = new OperationsModel();
		$patients_model = new PatientsModel();
		$doctors_model = new DoctorsModel();

		$data = [
			'operation'  => $model->find($id),
			'patients'  => $patients_model->findAll(),
			'doctors' => $doctors_model->find(),
			'title' => 'Επεξεργασία Χειρουργείου',
			'form_action' => '/operations/update',
			'is_new' => false
		];

		if ($this->request->getVar('update_success')) {
			$data['messages'] =  "Επιτυχής ενημέρωση χειρουργείου.";
		}

		if (empty($data['operation'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Δεν βρέθηκε το χειρουργείο με id: ' . $id);
		}

		$data['operation']['scheduled_date_iso8601'] = $data['operation']['scheduled_date'] ? date('Y-m-d\TH:i', strtotime($this->request->getVar('scheduled_date'))) : '';

		$data['title'] = 'Επεξεργασία Χειρουργείου';

		echo view('templates/header', $data);
		echo view('operations/form', $data);
		echo view('templates/footer', $data);
	}

	protected function store($is_new)
	{

		$model = new OperationsModel();
		$patients_model = new PatientsModel();
		$doctors_model = new DoctorsModel();

		$data = [
			'patients' => $patients_model->find(),
			'doctors' => $doctors_model->find(),
			'operation'  => [
				'id' => '',
				'patient_amka'  => $this->request->getVar('patient_amka'),
				'primary_doctor_amka'  => $this->request->getVar('primary_doctor_amka'),
				'scheduled_date'  => $this->request->getVar('scheduled_date'),
				'status'  => $this->request->getVar('status'),
				'code'  => $this->request->getVar('code'),
			],
			'title' => 'Καταχώρηση Χειρουργείου',
			'is_new' => $is_new
		];

		$data['operation']['scheduled_date_iso8601'] = $data['operation']['scheduled_date'] ? date('Y-m-d\TH:i', strtotime($this->request->getVar('scheduled_date'))) : '';

		if ($this->request->getMethod() == 'post') {

			if (!$this->validate(
				[
					'patient_amka'  => 'required',
					'primary_doctor_amka'  => 'required',
					'scheduled_date'  => 'required',
					'status'  => 'required',
					'code'  => 'required',
				],
				[
					'patient_amka'  => ['required' => 'Επιλέξτε ασθενή'],
					'primary_doctor_amka'  => ['required' => 'Επιλέξτε ιατρό'],
					'scheduled_date'  => ['required' => 'Συμπληρώστε την ημερομηνία'],
					'status'  => ['required' => 'Συμπληρώστε την κατάσταση'],
					'code'  => ['required' => 'Επιλέξτε εξέταση'],
				]
			)) {
			} else {
				if ($is_new) {
					$id = $model->insert($data['operation'], true);
				} else {
					$id = $this->request->getVar('id');
					$model->update($id, $data['operation']);
				}

				return redirect()->to('/operations/' . $id . '?update_success=1');
			}
		}

		echo view('templates/header', $data);
		echo view('operations/form', $data);
		echo view('templates/footer', $data);
	}
}
