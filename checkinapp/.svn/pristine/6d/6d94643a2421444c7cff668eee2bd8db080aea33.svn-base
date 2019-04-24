<?php

class Action_model extends CI_Model {

    var $action_id;
	var $action_name;
	var $is_active;
	
	static $table = "action";
	

    function __construct() {
        parent::__construct();
    }
    

	function insert($action_name, $is_active)
	{
	    $this->action_name  = $action_name;
		$this->is_active    = $is_active;
		
	    $this->db->insert(self::$table, $this);
		return $this->db->insert_id();
	}
	
	function update($action_id, $action_name, $is_active)
	{
	    $data = array(
               'action_name' => $action_name,
			   'is_active' => $is_active
               );
		$this->db->where('action_id', $action_id);
		return $this->db->update(self::$table, $data);
	}
	
	function delete($action_id)
	{
	    $this->db->where('action_id', $action_id);
		return $this->db->delete(self::$table);
	}

    function get_by_id($action_id) {
        $query = $this->db->get_where(self::$table, array('action_id'=>$action_id));
        //return $query->result_array();
		return $query->row_array();
    }

	function get_all(){
		return $this->db->get(self::$table)->result_array();
	}
}
?>