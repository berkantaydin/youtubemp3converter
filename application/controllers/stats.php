<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stats extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function viewed() {
        #$this->output->cache(360);
        
        $data['liste'] = $this->db->select('liste.id as id, name, first_name, last_name, viewed')->from('stats')->join("liste","stats.id=liste.id")->order_by("viewed", "desc")->limit('10')->get()->result();

        $this->template->write_view('page', 'stats/viewed', $data);
        $this->template->render();
    }

    public function getfrom404() {
        $istem = parse_url($_SERVER['REQUEST_URI']);

        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $istem = parse_url($_SERVER['REQUEST_URI']);
        $i = $istem['path'];
        $flag404 = TRUE;
        $d = explode("/", $i, -1);
        $id = '';

        foreach ($d as $k) {
            if (strlen($k) > 2)
                redirect();
            //Direkt ID ile içerik çekilmesi engelleniyor. Parçalar 2 şer harften büyük olamaz.

            if ($k == '')
                continue;

            $k = (is_numeric($k) ? $k : '00');
            $id .= $k;
        }

        if ($id < 1)
            redirect();

        $person = $this->db->select('id,name')->from('liste')->where('id', $id)->limit('1')->get()->row();

        if (!isset($person->id) || ($person->id < 1))
            redirect();

        redirect(base_url() . 'media/get/' . genid_from_id($person->id) . '/' . url_title($person->name), 'location', 301);
    }

}

/* End of file face.php */
/* Location: ./application/controllers/face.php */
