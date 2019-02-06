<?php

Class Login_database extends CI_Model {

	public function login($data) {
		$this->db->select('*');
		$this->db->from('login');

		$this->db->where('password',$data['password']);
		$this->db->where('email',$data['email']);

		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

//
	public function data($apikey) {
		$this->db->select('*');
		$this->db->from('track');
		$this->db->where('apiKey',$apikey);		
		$query = $this->db->get();
		return $query->result();
	}

//
public function project($user_id) {
	$this->db->select('*');
	$this->db->from('project');
	$this->db->where('user_id',$user_id);		
	$query = $this->db->get();
	return $query->result();
}
//
public function update_project($id) {
	$condition = array('project_id' => $id);
	$this->db->where($condition);
	$this->db->update('project',array('status' => 0));

	
}

//
public function update_status($id) {
	$condition = array('id' => $id);
	$this->db->where($condition);
	$this->db->update('campaign',array('status' => 0));

	
}


//
public function update_project1($id) {
	$condition = array('project_id' => $id);
	$this->db->where($condition);
	$this->db->update('project',array('status' => 1));

	
}

//
public function get_api_verify($API)
{
	$this->db->select('*');
	$this->db->from('project');

	$this->db->where('APIkey',$API);
	

	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return 1;
	} else {
		return 0;
	}
}

//
public function get_event_verify($event,$user_id)
{
	$condition = "sno =" . "'" . $event.  "' and userid =" . "'".$user_id."'";
	$this->db->select('*');
	$this->db->from('events');


	$this->db->where($condition);
	

	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return 1;
	} else {
		return 0;
	}
}

//
public function projectActive($user_id) {
	$condition = "user_id =" . "'" . $user_id.  "' and status =" . "'1'";	
	$this->db->select('project_id');
	$this->db->from('project');
	$this->db->where($condition);		
	$query = $this->db->get();
	return $query->result();
}

//
public function new_project($data)
{
	$this->db->insert('project', $data);
	return $this->db->insert_id();
}

//
public function new_event($data)
{
	$this->db->insert('events', $data);
	return "OK";
}
//
public function new_campaign($data)
{
	$this->db->insert('campaign', $data);
	return "OK";
}
//
public function new_track($data)
{
	$this->db->insert('track', $data);
	return "OK";
}



// 
	public function rank_reader($username) {

		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('email',$username);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

//

	public function forget($username) {
		$condition = "email =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
//
	public function already_register_check($data) {
		$condition = "email =" . "'" . $data['email'] .  "'";
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return true;
		} else {
			return false;
		}


	}

//
	public function get_customer($project_id) {
		$condition = "project_id =" . "'" . $project_id .  "'";
		$this->db->select('*');
		$this->db->from('track');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();

		
	}

	//
	public function mailer() {
		$condition = "status ='1' and schedule <= NOW() ";
		$this->db->select('*');
		$this->db->from('campaign');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();

		
	}

	//
	public function get_customer_dis($project_id) {
		$condition = "project_id =" . "'" . $project_id .  "'";
		$this->db->distinct();
		$this->db->select('email');
		$this->db->from('track');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();

		
	}

//
public function get_api($project_id) {
	$condition = "project_id =" . "'" . $project_id .  "'";
	$this->db->select('APIkey');
	$this->db->from('project');
	$this->db->where($condition);
	$query = $this->db->get();
	return $query->result();

	
}
//
public function get_event($user_id) {
	$condition = "userid =" . "'" . $user_id .  "'";
	$this->db->select('*');
	$this->db->from('events');
	$this->db->where($condition);
	$query = $this->db->get();
	return $query->result();

	
}
//
public function get_campaign($user_id) {
	$condition = "project_id =" . "'" . $user_id .  "'";
	$this->db->select('*');
	$this->db->from('campaign');
	$this->db->where($condition);
	$query = $this->db->get();
	return $query->result();

	
}
//
public function get_userid($API) {
	$this->db->select('*');
	$this->db->from('project');

	$this->db->where('APIkey',$API);
	
	$query = $this->db->get();
	return $query->result();

	
}

		
	}
?>