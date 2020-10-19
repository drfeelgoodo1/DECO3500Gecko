<?php

/**
 *	Quiz 01, INFS3202/7202, semester 1, 2020 
 *	Student ID: <You Student ID>
 *	Prac Session: <Your Prac Session>	
 */
class Quiz1 extends CI_Controller {

    public function index() {
        $this->load->view('style_sheet');
        $this->load->view('start_quiz');

    }


    public function task_a() {
        $this->load->view('style_sheet');
		$this->load->view('task_a_sample');

    }


    public function task_b() {
		$this->load->view('style_sheet');
		$this->load->view('task_b_sample');

	}

}


?>
