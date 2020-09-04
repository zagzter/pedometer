<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Steps extends CI_Controller {

	// Set Min and Max Steps
	private $min_steps = 0;
	private $max_steps = 50000;


	public function __construct() {

		parent::__construct();
		$this->load->model('steps_model');

	}


	public function index() {

		// Set Form Validation Step Input
		$this->form_validation->set_rules('step', 'step', 'required');
		$this->data['step_input'] = [
			'name' => 'step',
			'id' => 'step',
			'required' => 'required',
			'class' => 'form-control',
			'type' => 'number',
			'min' => $this->min_steps,
			'max' => $this->max_steps
		];

		$this->data['today_step'] = $this->steps_model->getStepsByDate();
		$this->data['all_steps'] = $this->steps_model->getSteps(); // For Demo Purpose Only
		
		$this->load->template('index', $this->data);

	}


	/**
	 * Insert new step data to database
	 * @return [void]	[Sets Flash-Session Data and Redirect]
	 */
	public function create() {

		// Get Step Data from Input field
		$step = (int)$this->input->post('step');

		// Field Validation
		if ($this->checkStep($step)) {

			if ($this->steps_model->createSteps($step)) {
				$this->session->set_flashdata('success', 'Your data has been saved successfully');
			} else {
				$this->session->set_flashdata('error', 'Error entering data. Please try again.');
			}

		} else {
			$this->session->set_flashdata('error', 'Please provide a valid step number between 0 and 50000');
		}

		redirect('/', 'refresh');

	}


	/**
	 * Get Steps in JSON Format
	 * @return [json] [description]
	 */
	public function getStepsAjax() {

		$date_from = $this->input->post('from');
		$date_to = $this->input->post('to');

		$steps = $this->fillEmptyDates($date_from, $date_to);

		echo json_encode($steps);
		exit();

	}


	/**
	 * Fill in empty date data with zero
	 * @param  array  $steps [our steps result from model]
	 * @return array
	 */
	private function fillEmptyDates($first_date, $last_date) {

		// Get All Dates Between First and Last date
		$begin = new DateTime($first_date);
		$end = clone $begin;  
		$end->modify($last_date);
		$end->setTime(0,0,1);
		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval, $end);
		
		foreach ($daterange as $date) {
			$dates[] = $date->format('Y-m-d');
		}

		// Set zero steps if the date is not in our database
		foreach ($dates as $date) {
			$date_data = $this->steps_model->getStepsByDate($date);

			if ($date_data) {
				$result[] = $date_data;
			} else {
				$result[] = array('step_date' => $date, 'steps' => 0);
			}
		}

		return $result;

	}


	/**
	 * Check step (input) data specifications
	 * @param  [int] $step
	 * @return [boolean]
	 */
	private function checkStep($step = null) {

		if (!is_int($step) || $step > $this->max_steps || $step < $this->min_steps) {
			return false;
		}

		return true;

	}

}
