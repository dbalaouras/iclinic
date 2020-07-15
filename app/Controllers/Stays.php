<?php

namespace App\Controllers;

use DateTime;
use App\Models\StaysModel;
use App\Models\PatientsModel;

class Stays extends BaseController
{

	protected $title = 'Εισαγωγή Ασθενούς';

	public function index()
	{
		$model = $this->getModel();
		$patients_model = new PatientsModel();

		$data = [
			'stays'  => $model->find(),
			'patients' => $patients_model->find(),
			'title' => $this->title,
		];

		echo view('templates/header', $data);
		echo view('stays/overview', $data);
		echo view('templates/footer', $data);
	}

	public function edit($id = null)
	{
		$model = $this->getModel();
		$patients_model = new PatientsModel();

		$data = [
			'stay'  => $model->find($id),
			'patients'  => $patients_model->find(),
			'title' => $this->title,
			'form_action' => '/stays/update',
			'is_new' => false
		];

		if (empty($data['stay'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Δεν βρέθηκε η Εισαγωγή με id: ' . $id);
		}

		$data['stay']['start_datetime_iso8601'] = $data['stay']['start_datetime'] ? date('Y-m-d\TH:i', strtotime($data['stay']['start_datetime'])) : '';
		$data['stay']['end_datetime_iso8601'] = $data['stay']['end_datetime'] ? date('Y-m-d\TH:i', strtotime($data['stay']['end_datetime'])) : '';

		if ($this->request->getVar('update_success')) {
			$data['messages'] =  "Επιτυχής αποθήκευση.";
		}

		echo view('templates/header', $data);
		echo view('stays/form', $data);
		echo view('templates/footer', $data);
	}

	/**
	 * Store records
	 */
	protected function store($is_new)
	{
		$model = $this->getModel();
		$patients_model = new PatientsModel();

		$data = [
			'patients' => $patients_model->find(),
			'stay'  => [
				'id' => $this->request->getVar('id'),
				'patient_amka'  => $this->request->getVar('patient_amka'),
				'start_datetime'  => $this->request->getVar('start_datetime'),
				'end_datetime'  => $this->request->getVar('end_datetime'),
				'exit_notes'  => $this->request->getVar('exit_notes'),
			],
			'form_action' => '/stays/create',
			'title' => $this->title,
			'is_new' => $is_new
		];

		$data['stay']['start_datetime_iso8601'] = date('Y-m-d\TH:i', strtotime($this->request->getVar('start_datetime') ? $this->request->getVar('start_datetime') : $data['stay']['start_datetime']));
		$data['stay']['end_datetime_iso8601'] = date('Y-m-d\TH:i', strtotime($this->request->getVar('end_datetime') ? $this->request->getVar('end_datetime') : $data['stay']['end_datetime']));

		if ($this->request->getMethod() == 'post') {

			if (!$this->validate(
				[
					'patient_amka'  => 'required',
					'start_datetime'  => 'required',
				],
				[
					'patient_amka'  => ['required' => 'Επιλέξτε ασθενή'],
					'start_datetime'  => ['required' => 'Συμπληρώστε την ημερομηνία εισαγωγής'],
				]
			)) {
			} else {
				$id = $this->request->getVar('id');
				if ($is_new) {
					$id = $model->insert($data['stay'], true);
				} else {
					$model->update($id, $data['stay']);
				}

				return redirect()->to('/stays/' . $id . '?update_success=1');
			}
		}

		echo view('templates/header', $data);
		echo view('stays/form', $data);
		echo view('templates/footer', $data);
	}

	/**
	 * Get an instance of the main Model of this controller
	 */
	public function getModel()
	{
		return new StaysModel();
	}
}
