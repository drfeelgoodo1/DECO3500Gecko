<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();

		$this->load->model('Attendance_Model');
		$this->load->model('Student_Model');

		$this->load->helper('form');
	}

	public function index() {
		// get class
		$class = $this->input->post('class');
		if (!isset($class)) {
			$class = '1-1';
		}
		$student_list = $this->Student_Model->get_students($class);

		// get date
		$date = $this->input->post('date');
		if (!isset($date)) {
			$date = date('Y-m-d');
		}
		$attended_students = $this->Attendance_Model->get_class_attendance($class, $date);
		$attended_student_ids = array_column($attended_students, 'student_id');

		$classes = $this->Student_Model->get_classes();

		$data['student_list'] = $student_list;
		$data['attended_students'] = $attended_student_ids;
		$data['date'] = $date;
		$data['class'] = $class;
		$data['classes'] = $classes;
		
		$this->load->view('welcome_message', $data);
	}

	public function roll_call() {
		$student_ids = $this->input->post('student_id');
		$date = $this->input->post('date');
		foreach ($student_ids as $student_id) {
			$this->Attendance_Model->insert_attendance_data($student_id, $date);
		}
	}

	// public function change_date() {
	// 	$date = $this->input->post('date');
	// 	$student_list = $this->Student_Model->get_students('1-1');
	// 	$attended_students = $this->Attendance_Model->get_class_attendance($date);
	// 	$attended_student_ids = array_column($attended_students, 'student_id');
	// 	$data['student_list'] = $student_list;
	// 	$data['attended_students'] = $attended_student_ids;
	// 	$data['date'] = $date;
	// 	$this->load->view('welcome_message', $data);
	// }

	// public function change_class() {
	// 	$class = $this->input->post('class');
	// 	$date = $this->input->post('date');
	// 	$student_list = $this->Student_Model->get_students($class);
	// 	$attended_students = $this->Attendance_Model->get_class_attendance($date);
	// 	$attended_student_ids = array_column($attended_students, 'student_id');
	// 	$data['student_list'] = $student_list;
	// 	$data['attended_students'] = $attended_student_ids;
	// 	$data['date'] = $date;
	// 	$this->load->view('welcome_message', $data);
	// }

	public function classes() {
		$class = $this->input->post('class');
		if (!isset($class)) {
			$class = '1-1';
		}
		$student_list = $this->Student_Model->get_students($class);

		$classes = $this->Student_Model->get_classes();

		$data['student_list'] = $student_list;
		$data['class'] = $class;
		$data['classes'] = $classes;

		$this->load->view('classes', $data);
	}
}