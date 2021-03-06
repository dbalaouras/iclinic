<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

abstract class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

	protected $model;

	/**
	 * Update records
	 */
	public function update()
	{
		return $this->store(false);
	}

	/**
	 * Insert new records
	 */
	public function create()
	{
		return $this->store(true);
	}

	/**
	 * Store (update or insert) records
	 */
	protected abstract function store($is_new);

	/**
	 * Get an instance of the main Model of this controller
	 */
	protected abstract function getModel();

	/**
	 * Get path to contoller list view
	 */
	protected abstract function getListPath();

	/**
	 * Delete a record from the main model given it's id
	 */
	public function delete($id = null)
	{

		// delete record
		$this->getModel()->delete($id);

		// redirect to list view
		return redirect()->to($this->getListPath());
	}
}
