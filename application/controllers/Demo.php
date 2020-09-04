<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('steps_model');

	}

	public function import() {

		$exist = $this->steps_model->getSteps();

		if ($exist) {
			$this->session->set_flashdata('error', 'Demo Content Already Exist!');
		} else {
			$this->steps_model->importDemo();
			$this->session->set_flashdata('success', 'Demo Content Imported Successfully!');
		}

		redirect('/', 'refresh');

	}

}