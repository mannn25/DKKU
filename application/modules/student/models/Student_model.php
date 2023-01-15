<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('student.mahasiswa_id', $params['id']);
        }
        if (isset($params['mahasiswa_id'])) {
            $this->db->where('student.mahasiswa_id', $params['mahasiswa_id']);
        }

        if (isset($params['multiple_id'])) {
            $this->db->where_in('student.mahasiswa_id', $params['multiple_id']);
        }

        if(isset($params['student_search']))
        {
            $this->db->where('mahasiswa_nim', $params['student_search']);
            $this->db->or_like('mahasiswa_full_name', $params['student_search']);
        }

        if (isset($params['mahasiswa_nim'])) {
            $this->db->where('student.mahasiswa_nim', $params['mahasiswa_nim']);
        }

        if (isset($params['nim'])) {
            $this->db->like('mahasiswa_nim', $params['nim']);
        }

        if (isset($params['password'])) {
            $this->db->like('mahasiswa_password', $params['password']);
        }

        if (isset($params['mahasiswa_full_name'])) {
            $this->db->where('student.mahasiswa_full_name', $params['mahasiswa_full_name']);
        }

        if (isset($params['status'])) {
            $this->db->where('student.mahasiswa_status', $params['status']);
        }
        
        if (isset($params['date'])) {
            $this->db->where('mahasiswa_input_date', $params['date']);
        }

        if (isset($params['class_id'])) {
            $this->db->where('class_class_id', $params['class_id']);
        }

        if (isset($params['majors_id'])) {
            $this->db->where('majors_majors_id', $params['majors_id']);
        }

        if (isset($params['class_name'])) {
            $this->db->like('class_name', $params['class_name']);
        }

        if(isset($params['group']))
        {

            $this->db->group_by('student.class_class_id'); 

        }


        if (isset($params['limit'])) {
            if (!isset($params['offset'])) {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }

        if (isset($params['order_by'])) {
            $this->db->order_by($params['order_by'], 'desc');
        } else {
            $this->db->order_by('mahasiswa_last_update', 'desc');
        }

        $this->db->select('student.mahasiswa_id, mahasiswa_nim, mahasiswa_password, mahasiswa_gender, mahasiswa_phone, mahasiswa_hobby, mahasiswa_address, mahasiswa_parent_phone, mahasiswa_full_name, mahasiswa_born_place, mahasiswa_born_date,mahasiswa_img, mahasiswa_status, mahasiswa_name_of_mother, mahasiswa_name_of_father, mahasiswa_input_date, mahasiswa_last_update');
        $this->db->select('class_class_id, class.class_name');
        $this->db->select('majors_majors_id, majors.majors_name, majors_short_name');

        $this->db->join('class', 'class.class_id = student.class_class_id', 'left');
        $this->db->join('majors', 'majors.majors_id = student.majors_majors_id', 'left');

        $res = $this->db->get('student');

        

        if (isset($params['id'])) {
            return $res->row_array();
        } else if (isset($params['mahasiswa_nim'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }

    }

    function get_class($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('class_id', $params['id']);
        }

        if(isset($params['class_name']))
        {
            $this->db->where('class_name', $params['class_name']);
        }


        if(isset($params['limit']))
        {
            if(!isset($params['offset']))
            {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }
        if(isset($params['order_by']))
        {
            $this->db->order_by($params['order_by'], 'desc');
        }
        else
        {
            $this->db->order_by('class_id', 'asc');
        }

        $this->db->select('class_id, class_name');
        $res = $this->db->get('class');

        if(isset($params['id']))
        {
            return $res->row_array();
        }
        else
        {
            return $res->result_array();
        }
    }

    function get_majors($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('majors_id', $params['id']);
        }

        if(isset($params['majors_name']))
        {
            $this->db->where('majors_name', $params['majors_name']);
        }

        if(isset($params['majors_short_name']))
        {
            $this->db->where('majors_short_name', $params['majors_short_name']);
        }


        if(isset($params['limit']))
        {
            if(!isset($params['offset']))
            {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }
        if(isset($params['order_by']))
        {
            $this->db->order_by($params['order_by'], 'desc');
        }
        else
        {
            $this->db->order_by('majors_id', 'asc');
        }

        $this->db->select('majors_id, majors_name, majors_short_name');
        $res = $this->db->get('majors');

        if(isset($params['id']))
        {
            return $res->row_array();
        }
        else
        {
            return $res->result_array();
        }
    }

    

    function add($data = array()) {

        if (isset($data['mahasiswa_id'])) {
            $this->db->set('mahasiswa_id', $data['mahasiswa_id']);
        }

        if (isset($data['mahasiswa_nim'])) {
            $this->db->set('mahasiswa_nim', $data['mahasiswa_nim']);
        }

       

        if (isset($data['mahasiswa_password'])) {
            $this->db->set('mahasiswa_password', $data['mahasiswa_password']);
        }

        if (isset($data['mahasiswa_gender'])) {
            $this->db->set('mahasiswa_gender', $data['mahasiswa_gender']);
        }

        if (isset($data['mahasiswa_phone'])) {
            $this->db->set('mahasiswa_phone', $data['mahasiswa_phone']);
        }

        if (isset($data['mahasiswa_parent_phone'])) {
            $this->db->set('mahasiswa_parent_phone', $data['mahasiswa_parent_phone']);
        }

        if (isset($data['mahasiswa_hobby'])) {
            $this->db->set('mahasiswa_hobby', $data['mahasiswa_hobby']);
        }

        if (isset($data['mahasiswa_address'])) {
            $this->db->set('mahasiswa_address', $data['mahasiswa_address']);
        }

        if (isset($data['mahasiswa_name_of_father'])) {
            $this->db->set('mahasiswa_name_of_father', $data['mahasiswa_name_of_father']);
        }

        if (isset($data['mahasiswa_full_name'])) {
            $this->db->set('mahasiswa_full_name', $data['mahasiswa_full_name']);
        }

        if (isset($data['mahasiswa_img'])) {
            $this->db->set('mahasiswa_img', $data['mahasiswa_img']);
        }

        if (isset($data['mahasiswa_born_place'])) {
            $this->db->set('mahasiswa_born_place', $data['mahasiswa_born_place']);
        }

        if (isset($data['mahasiswa_born_date'])) {
            $this->db->set('mahasiswa_born_date', $data['mahasiswa_born_date']);
        }

        if (isset($data['mahasiswa_name_of_mother'])) {
            $this->db->set('mahasiswa_name_of_mother', $data['mahasiswa_name_of_mother']);
        }

        if (isset($data['class_class_id'])) {
            $this->db->set('class_class_id', $data['class_class_id']);
        }

        if (isset($data['majors_majors_id'])) {
            $this->db->set('majors_majors_id', $data['majors_majors_id']);
        }

        if (isset($data['mahasiswa_status'])) {
            $this->db->set('mahasiswa_status', $data['mahasiswa_status']);
        }

        if (isset($data['mahasiswa_input_date'])) {
            $this->db->set('mahasiswa_input_date', $data['mahasiswa_input_date']);
        }

        if (isset($data['mahasiswa_last_update'])) {
            $this->db->set('mahasiswa_last_update', $data['mahasiswa_last_update']);
        }

        if (isset($data['mahasiswa_id'])) {
            $this->db->where('mahasiswa_id', $data['mahasiswa_id']);
            $this->db->update('student');
            $id = $data['mahasiswa_id'];
        } else {
            $this->db->insert('student');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function add_class($data = array()) {

        if (isset($data['class_id'])) {
            $this->db->set('class_id', $data['class_id']);
        }

        if (isset($data['class_name'])) {
            $this->db->set('class_name', $data['class_name']);
        }

        if (isset($data['class_id'])) {
            $this->db->where('class_id', $data['class_id']);
            $this->db->update('class');
            $id = $data['class_id'];
        } else {
            $this->db->insert('class');
            $id = $this->db->insert_id(); 
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function add_majors($data = array()) {

        if (isset($data['majors_id'])) {
            $this->db->set('majors_id', $data['majors_id']);
        }

        if (isset($data['majors_name'])) {
            $this->db->set('majors_name', $data['majors_name']);
        }

        if (isset($data['majors_short_name'])) {
            $this->db->set('majors_short_name', $data['majors_short_name']);
        }

        if (isset($data['majors_id'])) {
            $this->db->where('majors_id', $data['majors_id']);
            $this->db->update('majors');
            $id = $data['majors_id'];
        } else {
            $this->db->insert('majors');
            $id = $this->db->insert_id(); 
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('mahasiswa_id', $id);
        $this->db->delete('student');
    }

    function delete_class($id) {
        $this->db->where('class_id', $id);
        $this->db->delete('class');
    }

    function delete_majors($id) {
        $this->db->where('majors_id', $id);
        $this->db->delete('majors');
    }

    public function is_exist($field, $value)
    {
        $this->db->where($field, $value);        

        return $this->db->count_all_results('student') > 0 ? TRUE : FALSE;
    }

    function change_password($id, $params) {
        $this->db->where('mahasiswa_id', $id);
        $this->db->update('student', $params);
    }

}
