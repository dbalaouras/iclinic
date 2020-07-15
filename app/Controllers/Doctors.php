<?php

namespace App\Controllers;

use App\Models\DoctorsModel;

class Doctors extends BaseController
{

	protected $title = 'Ιατροί';

	public function index()
	{
		$model = $this->getModel();

		$data = [
			'doctors'  => $model->find(),
			'title' => $this->title,
		];

		echo view('templates/header', $data);
		echo view('doctors/overview', $data);
		echo view('templates/footer', $data);
	}

	public function edit($id = null)
	{
		$model = new DoctorsModel();

		$data = [
			'doctor' => $model->find($id),
			'form_action' => '/doctors/update',
			'is_new' => false
		];

		if ($this->request->getVar('update_success')) {
			$data['messages'] =  "Επιτυχής αποθήκευση.";
		}

		if (empty($data['doctor'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Δεν βρέθηκε ο ιατρός με ΑΜΚΑ: ' . $id);
		}

		$data['title'] = $this->title;

		echo view('templates/header', $data);
		echo view('doctors/form', $data);
		echo view('templates/footer', $data);
	}

	protected function store($is_new = true)
	{

		$model = new DoctorsModel();

		$data = [
			'doctor'  => [
				'amka' => $this->request->getVar('amka'),
				'first_name'  => $this->request->getVar('first_name'),
				'last_name'  => $this->request->getVar('last_name'),
				'year_of_birth'  => $this->request->getVar('year_of_birth'),
				'speciality'  => $this->request->getVar('speciality'),
			],
			'title' => $this->title,
			'form_action' => $is_new ? '/doctors/create' : '/doctors/update',
			'is_new' => $is_new
		];

		if ($this->request->getMethod() == 'post') {

			if (!$this->validate(
				[
					'amka' => 'required|min_length[8]|max_length[10]',
					'first_name'  => 'required',
					'last_name'  => 'required',
					'year_of_birth'  => 'required',
					'speciality'  => 'required',
				],
				[
					'amka' => ['required' => 'Παρακαλώ συμπληρώστε το ΑΜΚΑ', 'min_length' => 'Το ΑΜΚΑ πρέπει να είναι τουλάχιστον 8 χαρακτήρες'],
					'first_name'  => ['required' => 'Παρακαλώ συμπληρώστε το Όνομα'],
					'last_name'  => ['required' => 'Παρακαλώ συμπληρώστε το Επώνυμο'],
					'year_of_birth'  => ['required' => 'Παρακαλώ συμπληρώστε το έτος γέννησης'],
					'speciality'  => ['required' => 'Παρακαλώ συμπληρώστε την ειδικότητα'],

				]
			)) {
			} else {
				if ($is_new) {
					$model->insert($data['doctor']);
				} else {
					$model->update($this->request->getVar('amka'), $data['doctor']);
				}
				return redirect()->to('/doctors/' . $this->request->getVar('amka') . '?update_success=1');
			}
		}
		echo view('templates/header', $data);
		echo view('doctors/form', $data);
		echo view('templates/footer', $data);
	}

	/**
	 * Get an instance of the main Model of this controller
	 */
	public function getModel()
	{
		return new DoctorsModel();
	}

	/**
	 * Get path to contoller list view
	 */
	protected function getListPath()
	{
		return '/doctors';
	}
}
