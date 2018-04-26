<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    { 
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('template_model'));
    }


    public function register()
    {
    	  if($this->input->post('post'))
    	      {
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|trim');
    	      
            if ($this->form_validation->run() == TRUE)
                {
                $name = trim($this->input->post('name'));
                $username = trim($this->input->post('username'));
                $email = trim($this->input->post('email'));
                $password = trim($this->input->post('password'));
                $passconf = trim($this->input->post('passconf'));
                
                $checkEmail = $this->template_model->getRowData('users',array('email'=>$email));
                if(empty($checkEmail) && count($checkEmail)==0)
                    {
                    if($password==$passconf)
                        {
                        $arrRegister = array('name' => $name,
                                             'username' => $username,
                                             'email'=> $email,
                                             'password'=> base64_encode(md5(md5(md5($password)))));

                        if($this->template_model->insertData('users',$arrRegister))
                            {
                            $this->mylibs->popUpMessage("success","Success","Your data is registered successfuly !");
                            redirect('users/login');
                            }
                        else
                            {
                            $this->mylibs->popUpMessage("error","Failed","Data couldn't be registered !");
                            }
                        }
                    else
                        {
                        $this->mylibs->popUpMessage("error","Failed","Confirmation password doesn't match !");
                        }
                    }
                else
                    {
                    $this->mylibs->popUpMessage("error","Failed","Email is already registered !");
                    }
                }
            else
                {
                $this->mylibs->popUpMessage("error","Failed","Something wrong with your input !");
                }
    	      }

        $this->load->view('template/registerTemplate');
    }


    public function login()
    {
    	  if($this->input->post('post'))
    	      {
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if ($this->form_validation->run() == TRUE)
                {
                $username = trim($this->input->post('username'));
                $password = trim($this->input->post('password'));

                $checkAccount = $this->template_model->getRowData('users',array('username' => $username));
                if(!empty($checkAccount) && count($checkAccount)>0)
                    {
                    if(isset($checkAccount->password) && base64_encode(md5(md5(md5($password))))==trim($checkAccount->password))
                        {
                        redirect('users/dashboard');
                        }
                    else
                        {
                        $this->mylibs->popUpMessage("error","Failed","Password is wrong !");
                        }
                    }
                else
                    {
                    $this->mylibs->popUpMessage("error","Failed","Your username is not registered !");
                    }
                }
            else
                {
                $this->mylibs->popUpMessage("error","Failed","Something wrong with your input !");
                }
    	      }

        $this->load->view('template/loginTemplate');
    }


    public function dashboard()
    {
        $this->load->view('template/mainTemplate');
    }



}
