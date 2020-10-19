<?php

Class Student_Model extends CI_Model {

    public function get_students($class) {
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('class', $class);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_classes() {
        $this->db->distinct();
        $this->db->select('class');
        $this->db->from('student');
        $query = $this->db->get();

        $array = array();
        foreach ($query->result_array() as $row) {
            $array[$row['class']] = $row['class'];
        }

        return $array;
    }

    // public function get_attendance_rates($class) {
    //     $num_of_school_days = ;

    //     // gets students from the chosen class
    //     $this->db->select('*');
    //     $this->db->from('student');
    //     $this->db->where('class', $class);
    //     $query = $this->db->get();
    //     $students_from_class = $query->result();
        
    //     foreach ($students_from_class as $student) {
    //         $this->db->select('*');
    //         $this->db->from('attendance');
    //         $this->db->where('id', $student->student_id);
    //         $query = $this->db->get();
    //         $num_of_attended_days = $query->num_rows();

    //         $percentage = $num_of_attended_days / $num_of_school_days;
    //     }
    // }

}

?>