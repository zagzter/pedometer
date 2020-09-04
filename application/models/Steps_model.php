<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Steps_model extends CI_Model {

	/**
	 * Get Steps from Database
	 * @param  [date] $date_from
	 * @param  [date] $date_to
	 * @return [array]
	 */
	public function getSteps($date_from = null, $date_to = null) {

		$query = $this->db->select('step_date, steps');
		if ($date_from) {
			$this->db->where('step_date >= ', $date_from);
		}
		if ($date_to) {
			$this->db->where('step_date <= ', $date_to);
		}

		return $this->db->get('steps')->result_array();

	}

	/**
	 * Insert New Step to Database
	 * @param  [int] $steps
	 * @return [boolean]
	 */
	public function createSteps($steps) {

		$data = array(
			'steps' => $steps,
			'step_date' => date('Y-m-d')
		);

		$this->db->insert('steps', $data);

		return ($this->db->affected_rows() != 1) ? false : true;

	}


	/**
	 * Get Steps by Date
	 * @param  [date] $date [description]
	 * @return [object]
	 */
	public function getStepsByDate($date = null) {

		if (!$date) {
			$date = date('Y-m-d');
		}

		return $this->db->select('step_date, steps')->where('step_date', $date)->get('steps')->row();

	}


	public function importDemo() {

		$demo = array(
			array('step_date' => '2020-08-07', 'steps' => 5156),
			array('step_date' => '2020-08-08', 'steps' => 3561),
			array('step_date' => '2020-08-10', 'steps' => 556),
			array('step_date' => '2020-08-11', 'steps' => 2315),
			array('step_date' => '2020-08-12', 'steps' => 7478),
			array('step_date' => '2020-08-13', 'steps' => 5783),
			array('step_date' => '2020-08-14', 'steps' => 9402),
			array('step_date' => '2020-08-15', 'steps' => 7234),
			array('step_date' => '2020-08-17', 'steps' => 17250),
			array('step_date' => '2020-08-18', 'steps' => 8954),
			array('step_date' => '2020-08-19', 'steps' => 560),
			array('step_date' => '2020-08-20', 'steps' => 7814),
			array('step_date' => '2020-08-22', 'steps' => 794),
			array('step_date' => '2020-08-25', 'steps' => 2943),
			array('step_date' => '2020-08-28', 'steps' => 9478),
			array('step_date' => '2020-09-01', 'steps' => 6875),
			array('step_date' => '2020-09-02', 'steps' => 31),
			array('step_date' => '2020-09-03', 'steps' => 5879),
			array('step_date' => '2020-09-05', 'steps' => 16740),
		);

		$this->db->insert_batch('steps', $demo);

	}

}

?>