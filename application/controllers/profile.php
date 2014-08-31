<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->ba_auth->req_login();
    }

    public function index() {
        redirect('/profile/settings');
    }

    public function settings() {
        $data['user'] = $this->db->select('user_id,user,email')->from('user')->where('user_id', $this->session->userdata('user_id'))->get()->row();

        $this->form_validation->set_rules('pass', 'New Password', 'required|matches[passconf]|trim');
        $this->form_validation->set_rules('passconf', 'Re-Enter New Password', 'required|trim');
        $this->form_validation->set_rules('passmevcut', 'Current Password', 'required|trim');

        if ($this->form_validation->run() != FALSE) {
            $this->db
                    ->where('user_id', $this->session->userdata('user_id'))
                    ->where('pass', $this->ba_auth->kripto($this->input->post('passmevcut')))
                    ->update('user', array(
                        'pass' => $this->ba_auth->kripto($this->input->post('pass'))
                    ));
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('info', 'Success');
            } else {
                $this->session->set_flashdata('error', 'Error');
            }
            redirect('/profile');
        }

        $this->session->set_flashdata('error', validation_errors());

        $this->template->write_view('page', 'profile/settings', $data);
        $this->template->render();
    }
    
    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        redirect('/');
    }

}