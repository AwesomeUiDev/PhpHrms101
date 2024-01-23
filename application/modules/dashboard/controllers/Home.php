<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		$this->db->query('SET SESSION sql_mode = ""');
 		$this->load->model('home_model'); 

		if (! $this->session->userdata('isLogIn'))
			redirect('login');
 	}
 
		function index(){
	    $data['ttle_empl']	 = $this->db->count_all('employee_history');
	    $data['present_empl']= $this->home_model->count_attent_employee();
	    $data['male']	     = $this->home_model->count_male_employee();
	    $data['female']	     = $this->home_model->count_female_employee();	
        $data['todys_leave'] = $this->home_model->leave_employee()->leave_total;
        $last_30days = $data['last_30days'] = $this->home_model->last_thirtydays_attendance();

        $attendancelabel='';
	                  foreach($last_30days as $alldays) {
                              
                               if (!empty($alldays['mydate'])) {
                                    $attendancelabel.=$alldays['mydate'].",";
                                     }else{
                                $attendancelabel.=",";
                               }
                            } 
         $attendancedata='';
	                  foreach($last_30days as $alldays) {
                               $value = $this->home_model->count_30daysattendance($alldays['mydate']);
                               if (!empty($value)) {
                                    $attendancedata.=$value.",";
                                     }else{
                                $attendancedata.=",";
                               }
                            } 
                     $tlvmonth = '';
                    $month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                    for ($i=0; $i <= 11; $i++) {
                        $tlvmonth.=  $month[$i].',';
                            }
               
        $data['month']          = $tlvmonth;
         $recruitedemployee='';
	                  for ($i=1; $i <= 12; $i++) {
                               $hired = $this->home_model->hired_employee_current_year($i);
                               if (!empty($hired)) {
                                    $recruitedemployee.=$hired.",";
                                     }else{
                                $recruitedemployee.=",";
                               }
                            } 
        $data['recruitedemp']   = $recruitedemployee;
        $data['attendanclabel'] = $attendancelabel;
        $data['attendancdata'] = $attendancedata;
        $absent_15days = $this->home_model->last_15days_absent();
         $totalabsentfftdayslabel='';
		       foreach($absent_15days as $allabdate){
		        $abdate =  $allabdate['mydate'];
		         if (!empty($abdate)) {
		                $totalabsentfftdayslabel.=$abdate.",";}else{
		                 $totalabsentfftdayslabel.=","; }
		      }

		$totalabsentfftdaysval='';
		       foreach($absent_15days as $allabdate){
		        $absbalue = $this->home_model->count_15daysabsent($allabdate['mydate']);
		         if (!empty($absbalue)) {
		             $totalabsentfftdaysval.=$absbalue.","; }else{
		             $totalabsentfftdaysval.=",";  }
		      }
		$data['abdfftdaylabel'] = $totalabsentfftdayslabel; 
		$data['abdfftdayval']  = $totalabsentfftdaysval;

		$loanstatisticpayment='';
	                  for ($i=1; $i <= 12; $i++) {
                                 $loanpayment = $this->home_model->givenloan($i);
                               if (!empty($loanpayment)) {
                                    $loanstatisticpayment.=$loanpayment.",";
                                     }else{
                                $loanstatisticpayment.=",";
                               }
                            }  

       $loanstatisticreceived='';
	                  for ($i=1; $i <= 12; $i++) {
                                 $loanreceived = $this->home_model->receivedloan($i);
                               if (!empty($loanreceived)) {
                                    $loanstatisticreceived.=$loanreceived.",";
                                     }else{
                                $loanstatisticreceived.=",";
                               }
                            }
        $awardedemployee = '';
                  for ($i=1; $i <= 12; $i++) {
                               $awarded = $this->home_model->awarded_person($i);
                               if (!empty($awarded)) {
                                    $awardedemployee .= $awarded.",";
                               }else{
                                $awardedemployee .= ",";
                               }
                            }
        $data['loanstatisticpayment'] = $loanstatisticpayment; 
        $data['loanstatisticreceived'] = $loanstatisticreceived;
        $data['awardedempl']  =  $awardedemployee;                      
        $data['notice']      = $this->home_model->notice_list();
		$data['lnamountpaid']= $this->home_model->paidloanamnt();
		$data['lnreceiveamount'] = $this->home_model->receiveloanamnt();
		$data['latestrecruitedemple'] = $this->home_model->latest_recuited_employee();
		$data['module']      = "dashboard";
		$data['page']        = "home/index";
		echo Modules::run('template/layout', $data); 
	}
	



	public function profile()
	{
		$data['title']  = "Profile";
		$data['module'] = "dashboard";  
		$data['page']   = "home/profile";  
		$id = $this->session->userdata('id');//
		$data['user']   = $this->home_model->profile($id);
		echo Modules::run('template/layout', $data);  
	}

	public function setting()
	{ 
		$data['title']    = "Profile Setting";
		$id = $this->session->userdata('id');
		/*-----------------------------------*/
		$this->form_validation->set_rules('firstname', 'First Name','required|max_length[50]');
		$this->form_validation->set_rules('lastname', 'Last Name','required|max_length[50]');
		#------------------------#
       	$this->form_validation->set_rules('email', 'Email Address', "required|valid_email|max_length[100]");
       	/*---#callback fn not supported#---*/ 
		#------------------------#
		$this->form_validation->set_rules('password', 'Password','max_length[32]|md5');
		$this->form_validation->set_rules('about', 'About','max_length[1000]');
		/*-----------------------------------*/
        $config['upload_path']          = './assets/img/user/';
        $config['allowed_types']        = 'gif|jpg|png'; 

        $this->load->library('upload', $config);
 
        if ($this->upload->do_upload('image')) {  
            $data = $this->upload->data();  
            $image = $config['upload_path'].$data['file_name']; 

			$config['image_library']  = 'gd2';
			$config['source_image']   = $image;
			$config['create_thumb']   = false;
			$config['maintain_ratio'] = TRUE;
			$config['width']          = 115;
			$config['height']         = 90;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$this->session->set_flashdata('message', "Image Upload Successfully!");
        }
		/*-----------------------------------*/
		$data['user'] = (object)$userData = array(
			'id' 		  => $this->input->post('id'),
			'firstname'   => $this->input->post('firstname'),
			'lastname' 	  => $this->input->post('lastname'),
			'email' 	  => $this->input->post('email'),
			'password' 	  => (!empty($this->input->post('password'))?md5($this->input->post('password')):$this->input->post('oldpassword')),
			'about' 	  => $this->input->post('about',true),
			'image'   	  => (!empty($image)?$image:$this->input->post('old_image')) 
		);

		/*-----------------------------------*/
		if ($this->form_validation->run()) {

	        if (empty($userData['image'])) {
				$this->session->set_flashdata('exception', $this->upload->display_errors()); 
	        }

			if ($this->home_model->setting($userData)) {

				$this->session->set_userdata(array(
					'fullname'   => $this->input->post('firstname'). ' ' .$this->input->post('lastname'),
					'email' 	  => $this->input->post('email'),
					'image'   	  => (!empty($image)?$image:$this->input->post('old_image'))
				));


				$this->session->set_flashdata('message', display('update_successfully'));
			} else {
				$this->session->set_flashdata('exception',  display('please_try_again'));
			}
			redirect("dashboard/home/setting");

		} else {
			$data['module'] = "dashboard";  
			$data['page']   = "home/profile_setting"; 
			if(!empty($id))
			$data['user']   = $this->home_model->profile($id);
			echo Modules::run('template/layout', $data);
		}
	}
	///// Notice 
	 public function view_details(){
        $id = $this->uri->segment(4);
		$data['module'] = "dashboard";  
		$data['page']   = "home/notice_details";  
		$data['detls']   = $this->evencal->details($id);
       echo Modules::run('template/layout', $data); 

    }


	public function incomeinfo(){
     $year = $this->input->post('year');
     echo json_encode($year);
	}

	public function hired_employee_current_year($month){
      $data = $this->home_model->hired_employee_current_year($month);
     echo json_encode($data);
	}
}
