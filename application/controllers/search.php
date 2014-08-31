<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends CI_Controller {

    public function face($field = 'name') {

        $name = $this->input->get('term');
        if (strlen($name) < 3)
            return;

        $person = $this->db->select('id,name')->from('liste')->like('name', $name)->limit('10')->get()->result();


        foreach ($person as &$k) {
            $k->link = site_url('media/get/' . genid_from_id($k->id) . '/' . url_title($k->name));
            $k->picture = "//graph.facebook.com/" . $k->id . "/picture?type=square";
        }

        echo json_encode($person);
    }

}