<?php

Class Attendance_Model extends CI_Model {

    public function get_students ($class) {
        $this->db->select('*');
        $this->db->from('student');

        $query = $this->db->get();
        return $query->result();
    }

    public function insert_attendance_data ($student_id, $date) {
        $this->db->select('*');
        $this->db->from('attendance');
        $this->db->where('student_id', $student_id);
        $this->db->where('date', $date);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return false;
        } else {
            $data = array (
                'student_id' => $student_id,
                'student_name' => $this->get_name($student_id),
                'class' => $this->get_class($student_id),
                'date' => $date,
            );
    
            $this->db->insert('attendance', $data);

            $this->db->select('days_attended');
            $this->db->from('student');
            $this->db->where('student_id', $student_id);
            $num_of_days_attended = $this->db->get()->row('days_attended');

            $num_of_days_attended = $num_of_days_attended + 1;
            $update_data = array (
                'days_attended' => $num_of_days_attended
            );
            $this->db->where('student_id', $student_id);
            $this->db->update('student', $update_data);
        }
    }

    public function get_name ($student_id) {
        $this->db->select('name');
        $this->db->from('student');
        $this->db->where('student_id', $student_id);
        return $this->db->get()->row('name');
    }

    public function get_class ($student_id) {
        $this->db->select('class');
        $this->db->from('student');
        $this->db->where('student_id', $student_id);
        return $this->db->get()->row('class');
    }

    public function get_class_attendance ($class, $date) {
        $this->db->select('student_id');
        $this->db->from('attendance');
        $this->db->where('date', $date);
        $this->db->where('class', $class);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function is_student_absent ($student_id, $date) {

    }

}

?>