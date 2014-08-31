<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function index() {
        $this->template->write_view('page', 'auth/welcome');
        $this->template->render();
    }

    public function register() {
        $this->form_validation->set_rules('user', 'Username', 'required|trim|alpha_dash|xss_clean|max_length[25]');
        $this->form_validation->set_rules('pass', 'New Password', 'required|trim|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Re-Enter Password', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() != FALSE) {

            $this->ba_auth->register($this->input->post('user'), $this->input->post('email'), $this->input->post('pass'));
            redirect('auth');
        }

        $this->session->set_flashdata('error', 'Registration Error');
        $this->session->set_flashdata('error', validation_errors());
        redirect('auth');
    }

    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim');

        if ($this->form_validation->run() != FALSE) {

            $this->ba_auth->make_login($this->input->post('email'), $this->input->post('pass'));
            redirect('auth');
        }

        $this->session->set_flashdata('error', 'Invalid Username or Password. Please try again.');
        $this->session->set_flashdata('error', validation_errors());
        redirect('auth');
    }

}
