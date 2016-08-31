<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function auth()
    {
        $this->load->model('user_model');
        $name = 'auth';


        if ($this->input->post('auth')) {


            $user['email'] = $this->input->post('email');
            $user['password'] = md5($this->input->post('password'));
            $check_email = $this->user_model->checkEmail($user['email']);
            $check_password = $this->user_model->checkPassword($user['password']);

            if ($check_email == true && $check_password == true) {
                echo 'wrong email alredy registred';
                redirect(base_url() . 'index.php/user/auth');
            } else {
                $ses_data = ['user' => $user['email']];
                $this->session->set_userdata($ses_data);
                redirect(base_url());
            }

        } else {
            $this->template->page_view($name);
        }
    }

    public function reg()
    {
        $this->load->model('user_model');
        $name = 'reg';


        if ($this->input->post('reg')) {

            $user['first_name'] = $this->input->post('first_name');
            $user['last_name'] = $this->input->post('last_name');
            $user['email'] = $this->input->post('email');
            $user['password'] = md5($this->input->post('password'));
            $check_email = $this->user_model->checkEmail($user['email']);

            if ($check_email == false) {
                echo 'Such email alredy registred';
            } else {
                $this->user_model->reg($user);
                $ses_data = ['user' => $user['email']];
                $this->session->set_userdata($ses_data);
                redirect(base_url());
            }

        } else {
            $this->template->page_view($name);
        }
    }

    function logout()
    {
        $this->session->unset_userdata('user');
        redirect(base_url());
    }
}