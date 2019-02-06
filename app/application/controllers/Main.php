<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');


		$this->load->library('form_validation');

		$this->load->helper('url');

		$this->load->library('session');


		$this->load->library('email');

		$this->load->model('login_database');

	}


///////////////////////////////////////////////////////////////////////////////////

	public function index()
	{

		if($this->session->userdata('logged_in'))
		{
			$this->checklogin();
		}
		else
		{
			$err = array('error' =>"" ,'color' =>"red" );
			$this->load->view('landing/index',$err);
		}


	}


	///////////////////////
	public function register()
	{
		
		if($this->session->userdata('logged_in'))
		{
			
			
			$this->checklogin();
		}
	
		$register=$this->input->post('register');
		$register_email= $this->input->post('email');

		if (isset($register) && $register_email !=""){

		$data = array(
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password'),
		'email' => $this->input->post('email')

		);

		$result = $this->login_database->already_register_check($data);
		
				if ($result == false)
				{
					$err = array('error' =>"*Registered Successfully" ,'color' =>"green" );
					$this->load->view('landing/index',$err);

	

			$this->db->insert('login', $data);
				}
				else{
					$err = array('error' =>"*User Already Exists" ,'color' =>"red" );
					$this->load->view('landing/register',$err);
				}
	}
	else
	{

		$err = array('error' =>"" ,'color' =>"red" );
		$this->load->view('landing/register',$err);
	}
}

///////////
	public function checklogin()
	{

	$pdata = $this->session->userdata('logged_in');

		if($pdata['rank']=='admin')
		{
			$this->admin();
		}

		elseif ($pdata['rank']=='superadmin')
		{

			$this->superadmin();


		}

		elseif($pdata['rank']=='user')
		{


			$this->user();



		}
		else
			{$err = array('error' =>"*Kindly Fill The Entries" ,'color' =>"red" );
		$this->load->view('landing/index',$err);
	}
}

//////////////////////////////////////////////////////////////////////////////////////////////////
public function auth()
{
	if(isset($this->session->userdata['logged_in']))
	{

		$this->checklogin();

	}
	else
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$login=$this->input->post('login');
		$test= $this->input->post('email');

		if (isset($login) && $test!='')
		{

			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			if(isset($this->session->userdata['logged_in']))
			{

				$this->checklogin();


			}


			else {
				$data = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				);

				$result = $this->login_database->login($data);
				
				if ($result == TRUE) {

					$email = $this->input->post('email');
					$result = $this->login_database->rank_reader($email);

					if ($result != false) {
						
						
						$session_data = array(
							'username' => $result[0]->username,
							'email' => $result[0]->email,
							'rank' => $result[0]->rank,
							'user_id' => $result[0]->user_id,
						
						);
						$this->session->set_userdata('logged_in', $session_data);
						$this->checklogin();

						
					}
				}

				else {
					$err = array('error' =>"*Either email or password is wrong" ,'color' =>"red" );
					$this->load->view('checklogin/index',$err);
				}
			}

		}
		else
		{
			$err = array('error' =>"*Kindly Fill The Entries" ,'color' =>"red" );
			$this->load->view('landing/index',$err);
		}
	}
}


////////////
public function user($proj)
{
				// create problem
			
	$pdata = $this->session->userdata['logged_in'];
	if($pdata['rank']=='user')
	{

		$data['project'] = $this->login_database->project($pdata['user_id']);
		
		if($data['project'] == null)
		{
			$this->addproject();
		}
		else
		{


		$proj_id = $this->session->userdata['projectactive'];
		
		if(isset($proj) && $proj != $proj_id['project'])
		{
			// print_r($proj_id);
		$this->login_database->update_project1($proj);
		$this->login_database->update_project($proj_id['project']);
		
		}
		// $data = $this->login_database->data($pdata['apikey']);
		$project_id = $this->login_database->projectActive($pdata['user_id']);
		$session_data['project'] = $project_id[0]->project_id;
		$this->session->set_userdata('projectactive', $session_data);

		$data['customer']=$this->login_database->get_customer($session_data['project']);
		$this->load->view('student/index',$data);
	}
	}
	else
	{
		$this->checklogin();
	}

}

public function addproject()
{
				
	$pdata = $this->session->userdata['logged_in'];

	if($pdata['rank']=='user')
	{
		


		$addprojectbutton=$this->input->post('addproject');
		$project_name= $this->input->post('project_name');

		if (isset($addprojectbutton) && $project_name !=""){

		$insert_data = array(
		'Project_name' => $project_name,
		'user_id' => $pdata['user_id'],
		);
		 $added_project_id =  $this->login_database->new_project($insert_data);

	$this->user($added_project_id);
			}

	else{
		$dta['project'] = $this->login_database->project($pdata['user_id']);
	
	
		$this->load->view('student/addproject',$dta);
		
	}



	}
	else
	{
		$this->checklogin();
	}

}

public function api()
{
				// create problem
			
	$pdata = $this->session->userdata['logged_in'];
	if($pdata['rank']=='user')
	{
		$proj_id = $this->session->userdata['projectactive'];
		$dta['project'] = $this->login_database->project($pdata['user_id']);
		$dta['api']=$this->login_database->get_api($proj_id['project']);
		$this->load->view('student/api',$dta);
	}
	else
	{
		$this->checklogin();
	}

}


///      ////////////////////////////////////////////////////
public function track($api)
{
$APIkey = base64_decode($api);

$event=$this->input->post('event');
$email=$this->input->post('email');
$first_name=$this->input->post('first_name');
$last_name=$this->input->post('last_name');
$details=$this->input->post('details');
$subscription=$this->input->post('subscription');

$verify  =  $this->login_database->get_api_verify($APIkey);

if($verify == 1)
{

	$user_id  =  $this->login_database->get_userid($APIkey);
	$verify_event  =  $this->login_database->get_event_verify($event,$user_id[0]->user_id);
	if($verify_event == 1)
	{
	

		//main code start from here

		$insert_data = array(
			'subscription' => $subscription,
			'details' => $details,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'eventid' => $event,
			'project_id' => $user_id[0]->project_id);

			 $this->login_database->new_track($insert_data);

			 echo "
			 {
				 code: 200,
				 messsage: OK
			 }";
	}
	else{
		echo "
		{
			code: 400,
			messsage: INVALID_EVENT_NAME
		}";
	}
}
else{
	echo "
	{
		code: 404,
		messsage: INVALID_API_KEY
	}";
}

}
//////////88888888888888////////



public function event()
{
				// create problem
			
	$pdata = $this->session->userdata['logged_in'];
	if($pdata['rank']=='user')
	{

		$dta['project'] = $this->login_database->project($pdata['user_id']);
		$dta['event'] = $this->login_database->get_event($pdata['user_id']);
		$this->load->view('student/event',$dta);
	}
	else
	{
		$this->checklogin();
	}

}
//
 public function mail()
{
	
	$data = $this->login_database->mailer();
	 $this->load->library('email');

	foreach($data as $key)
	{
		$this->email->from('donotreply@axtrionproduction.space', 'axtrionproduction');
	$this->email->to(explode(";",$key->email_to));
	$this->email->subject($key->email_subject);

		$this->email->message($key->content);

		$id = $key->id;
		
		try{
			
										$this->email->send();
										$this->login_database->update_status($id);
										echo "OK";
			

		}
		catch(Exception $e){
		
			echo $e;
		}
	}
	
	

}



//

public function addevent()
{
				// create problem
			
				$pdata = $this->session->userdata['logged_in'];
				
					if($pdata['rank']=='user')
					{
						
				
				
						$addeventbutton=$this->input->post('addevent');
						$event_name= $this->input->post('event_name');
				
						if (isset($addeventbutton) && $event_name !=""){
				
						$insert_data = array(
						'eventType' => $event_name,
						'userid' => $pdata['user_id'],
						);
						 $this->login_database->new_event($insert_data);
				$this->event();
					
							}
				
					else{
						$dta['project'] = $this->login_database->project($pdata['user_id']);
					
					
						$this->load->view('student/addevent',$dta);
						
					}
				
				
				
					}
					else
					{
						$this->checklogin();
					}

}

//start778865432345678987654323456789098765432
public function campaign()
{
				// create problem
			
	$pdata = $this->session->userdata['logged_in'];
	if($pdata['rank']=='user')
	{

		$dta['project'] = $this->login_database->project($pdata['user_id']);
		$dta['event'] = $this->login_database->get_campaign($dta['project'][0]->project_id);
		$this->load->view('student/campaign',$dta);
	}
	else
	{
		$this->checklogin();
	}

}


public function addcampaign()
{
				// create problem
			
				$pdata = $this->session->userdata['logged_in'];
				
					if($pdata['rank']=='user')
					{
						
						$addeventbutton=$this->input->post('addevent');


						$campaign_name= $this->input->post('campaign_name');
						$campaign_datetime= $this->input->post('campaign_datetime');
						$campaign_to= $this->input->post('campaign_to');
						$campaign_subject= $this->input->post('campaign_subject');
						$campaign_content= $this->input->post('campaign_content');
				
						if (isset($addeventbutton) && $campaign_name !=""){
							$dta['project'] = $this->login_database->project($pdata['user_id']);
						$insert_data = array(
						'name' => $campaign_name,
						'project_id' => $dta['project'][0]->project_id,
						'content' => $campaign_content,
						'email_to' => $campaign_to,
						'email_subject' => $campaign_subject,
						'schedule' => $campaign_datetime,
						);



						 $this->login_database->new_campaign($insert_data);
				$this->campaign();
					
							}
				
					else{
						$dta['project'] = $this->login_database->project($pdata['user_id']);
					
						$dta['event'] = $this->login_database->get_customer_dis($dta['project'][0]->project_id);
						$this->load->view('student/addcampaign',$dta);
						
					}
				
				
				
					}
					else
					{
						$this->checklogin();
					}

}

//end 23456789897654324567890987656453



public function admin()
{
	$pdata = $this->session->userdata['logged_in'];
	if($pdata['rank']=='admin')
	{
		$this->load->view('admin/index');
	}
	else
	{
		$this->checklogin();
	}

}
public function superadmin()
{
	$pdata = $this->session->userdata['logged_in'];
	if($pdata['rank']=='superadmin')
	{
		$this->load->view('superadmin/index');
	}else
	{
		$this->checklogin();
	}

}



//////////////////////////////////////////////////   LOG  OUT  /////////////////////////////////////
// Logout from page
public function logout() {

	$sess_array = array(
		'username' => ''
	);
	$this->session->unset_userdata('logged_in1', $sess_array);
	$this->session->unset_userdata('projectactive', array('project_id'=>''));
	$this->session->sess_destroy();
	$data['message_display'] = 'Successfully Logout';
	$head=base_url();
	redirect('main', 'refresh');
	//header("location:". $head);
}

/////////////////////////////////////////////////////////////////////////////////////////

}
