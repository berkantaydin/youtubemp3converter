<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Controller {

    public function index() {
        return;
    }

    public function last_converted() {
        $data['liste_enson'] = $this->db->select('vid,adi')->from('liste')->order_by('id', 'desc')->limit('10')->get()->result();
        
        $this->load->view('api/last_converted', $data);
    }


    public function most_converted() {
        $data['liste_encok'] = $this->db->select('liste.vid as vid,liste.adi as adi,bilgi.viewed as viewed')->from('bilgi')->join('liste','bilgi.vid = liste.vid')->order_by('viewed', 'desc')->limit('10')->get()->result();

        $this->load->view('api/most_converted', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
