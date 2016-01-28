<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('user_login_page');
	}
	// processes the student login
	public function login()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
        $this->load->model('User');
        $user = $this->User->get_user_by_email($email);
        if($user && $user['password'] == $password)
        {
            $this->session->set_userdata("currentUser", $user);
            redirect("/friends");
        }
        else
        {
            $this->session->set_flashdata("login_error", "Invalid email or password!");
            redirect("/main/index");
        }
    }
    // processes the student register
    public function register()
    {
    	// $this->output->enable_profiler(TRUE); //enables the profiler
    	$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("alias", "Alias", "trim|required");
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'min_length[8]|
required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]|required');
		$this->form_validation->set_rules('dob', 'DOB','required'); 

		if($this->form_validation->run() === FALSE)
		{
		    echo $this->view_data["errors"] = validation_errors();
		}
		else
		{
		    //codes to run on success validation here
	        $this->load->model('User');
	        $user_info = array("name" => $this->input->post('name'),
	        						"alias" => $this->input->post('alias'),
	        						"email" => $this->input->post('email'),
	        						"password" => md5($this->input->post('password')),
	        						"dob" => $this->input->post('dob')
	        					);
	        $user = $this->User->add_user($user_info);
	        if ($user === TRUE)
	        {
	        	echo "You have successfully registered! Please login now";
	        	$this->load->view('user_login_page');
	        }
		}
    }
/******************** Users' profile and friend lists ************************/
	public function user($userID = -1) {
		if($this->session->userdata('currentUser')) {
			$data['user'] = $this->session->userdata("currentUser");

			$this->load->model('Friend');

			$data['nonFriends'] = $this->Friend->displayNonFriendsByUserID($data['user']['id']);
				// var_dump($data['nonFriends']);
				// die();

			$data['friends'] = $this->Friend->getFriendsByUserID($data['user']['id']);

			// if($userID >= 0) {
				$this->load->model ('User');
				$data['userProfile'] = $this->User->get_user_by_id($userID);
		
			// }

			$this->load->view('friendListView', $data);
		}
		else
			redirect("/");
	}
/********************** Adding friends on both tables *************************/
	public function add($friendID) {
		if (!$friendID)
			redirect ('/');
		else {
			$userSide = array('userID' => $this->session->userdata('currentUser'), 'friendID' => $friendID);
			$friendSide = array ('userID' => $friendID, 'friendID' => $this->session->userdata('currentUser'));

			$this->load->Model('Friend');

			if($this->Friend->addFriend($userSide)) {
				if($this->Friend->addFriend($friendSide)) {
					redirect('/friends');
				}
			}

			redirect('/friends');
		}
	}
/*********************** Removing friends on both tables **********************/
	public function remove($friendID) {
		if (!$friendID)
			redirect ('/');
		else {
			$userSide = array('userID' => $this->session->userdata('currentUser'), 'friendID' => $friendID);
			$friendSide = array('userID' => $friendID, 'friendID' => $this->session->userdata('currentUser'));

			$this->load->Model('Friend');

			if($this->Friend->removeFriend($userSide)) {
				if($this->Friend->removeFriend($friendSide)) {
					redirect('/friends');
				}
			}
		}
	}
	// public function profile($userID) {
	// 	$this->load->model ('User');

	// 	$user = $this->User->get_user_by_id($userID);
	// 	var_dump($user);
	// 	die();
	// 	$this->load->view('profile', $user);
	// }
    //logout the student
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("/");
	}
}
