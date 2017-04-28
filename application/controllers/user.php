<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller {

		public function reg()
		{
			$this->load->view('reg');
		}
		public function do_reg(){
			$name=$this->input->post('name');
			$pass=$this->input->post('pass');
			$this->load->model('user_model');
			$query=$this->user_model->get_insert($name,$pass);
			if($query){
					redirect('user/login');
				}
		}
		public function login(){
			$this->load->view('login');
		}
		public function do_login(){
			$name=$this->input->post('uname');
			$pass=$this->input->post('pass');
			$this->load->model('user_model');
			$query=$this->user_model->get_check($name,$pass);
			if($query){
				// $arr=array(
				// 	'id'=>$rs->uid,
				// 	'name'=>$rs->uname,
				// );
				 // $this->session->set_userdata($arr);
				 setcookie("UserName","$name",time()+2*7*24*3600);
				 setcookie("UserPass","$pass",time()+2*7*24*3600);
				redirect('user/index');
			}else{
				redirect('user/login');
			}
		}
		public function index(){
			$this->load->view('index');
		}
		public function change(){
			$this->load->view('change');
		}
		public function do_change(){
			$name=$_COOKIE['UserName'];
			$pass=$this->input->get('pass');
			$this->load->model('user_model');
			$query=$this->user_model->do_change($name,$pass);
			if($query){
				setcookie("UserPass","$pass",time()+2*7*24*3600);
				 redirect('user/index');
			}
		}
		public function csrf(){
			$this->load->view('csrf');
		}
	}


?>