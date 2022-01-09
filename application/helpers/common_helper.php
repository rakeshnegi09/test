<?php

if(!function_exists('get_monthly_info')) {
    function get_monthly_info($id) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('monthly_information_update')->limit(1);    
        $CI->db->where('student_id', $id); 		
        $CI->db->where('month', date('m')); 		
        $CI->db->where('year', date('Y')); 
        $query = $CI->db->get();
        $result = $query->row_array();
        return $result;
    }
}


if(!function_exists('monthly_information_update')) {
    function monthly_information_update() {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('monthly_information_update')->limit(1);  
        $CI->db->where('month', date('m')); 		
        $CI->db->where('year', date('Y')); 
        $query = $CI->db->get();
        $result = $query->row_array();
        return $result;
    }
}


if(!function_exists('fees_arrear')) {
    function fees_arrear($id) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('student_fees_master')->limit(1);    
        $CI->db->where('student_session_id', $id); 	
        $CI->db->where('in_arrear', 'YES'); 
        $query = $CI->db->get();
        $result = $query->row_array();
        return $result;
    }
}

if(!function_exists('fees_arrear_amount')) {
    function fees_arrear_amount($id) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('student_fees_master')->limit(1);    
        $CI->db->where('student_session_id', $id); 
        $CI->db->order_by('amount', 'DESC'); 
        $query = $CI->db->get();
        $result = $query->row_array();
        return $result;
    }
}

if(!function_exists('fees_due_date')) {
    function fees_due_date($id) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('student_fees_master')->limit(1);    
        $CI->db->where('student_session_id', $id); 	
        $CI->db->where('due_date !=', NULL);
        $query = $CI->db->get();
        $result = $query->row_array();
		if($result){
			return $result['due_date'];
		}else{
			return false;;
		}
        
    }
}


if(!function_exists('get_wel')) {
    function get_wel($id) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('wel');    
        $CI->db->where('student_id', $id); 
        $query = $CI->db->get();
        $result = $query->result_array();
        return $result;
    }
}


if(!function_exists('get_section')) {
    function get_section() {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('sections');    
        $query = $CI->db->get();
        $result = $query->result_array();
        return $result;
    }
}


if(!function_exists('get_session')) {
    function get_session() {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('sessions');    
        $query = $CI->db->get();
        $result = $query->result_array();
        return $result;
    }
}

if(!function_exists('get_result')) {
    function get_result($student_id,$class_id,$section_id,$session_id,$subject_id,$exam_id) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('student_results');    
        $CI->db->where('student_id',$student_id);    
        $CI->db->where('class_id',$class_id);    
        $CI->db->where('section_id',$section_id);    
        $CI->db->where('session_id',$session_id); 
		$CI->db->where('exam_id',$exam_id);
        $CI->db->where('subject_id',$subject_id);    
        $query = $CI->db->get();
        $result = $query->row_array();
		//print_r($result);die;
        return $result;
    }
}

if(!function_exists('get_result_student')) {
    function get_result_student($student_id) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('student_results');    
        $CI->db->where('student_id',$student_id);    
        $query = $CI->db->get();
        $result = $query->result_array();
        return $result;
    }
}


if(!function_exists('get_result_student_by_session')) {
    function get_result_student_by_session($session_id,$student_id) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('student_results');    
        $CI->db->where('student_id',$student_id);    
        $CI->db->where('session_id',$session_id);
		$CI->db->order_by('test_mark', 'DESC');
        $query = $CI->db->get();
        $result = $query->result_array();
        return $result;
    }
}

if(!function_exists('get_subjects')) {
    function get_subjects() {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('subjects');
        $query = $CI->db->get();
        $result = $query->result_array();
        return $result;
    }
}

if(!function_exists('get_subjects_id')) {
    function get_subjects_id($id=null) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('subjects');
        $CI->db->where('id',$id);
        $query = $CI->db->get();
        $result = $query->row_array();
        return $result;
    }
}


if(!function_exists('get_all_exams')) {
    function get_all_exams() {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('exam_group_class_batch_exams');
        $query = $CI->db->get();
        $result = $query->result_array();
        return $result;
    }
}


if(!function_exists('get_exam_group_name')) {
    function get_exam_group_name($id=null) {
        $CI = &get_instance();			
        $CI->db->select('*');
        $CI->db->from('exam_groups');
		$CI->db->where('id',$id);
        $query = $CI->db->get();
        $result = $query->row_array()['name'];
        return $result;
    }
}