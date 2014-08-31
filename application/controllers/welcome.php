<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
    public function index() {
        #if ($_SERVER['HTTP_HOST'] != "dev.youtubemp3donusturucu.net")
        #    $this->output->cache(1440);

        $toplam = $this->db->count_all_results('liste');
        $random = rand(0, ($toplam - 40));


        $data['liste_random'] = $this->db->select('vid,adi')->from('liste')->limit('10', $random)->get()->result();

        $data['liste_enson'] = $this->db->select('vid,adi')->from('liste')->order_by('id', 'desc')->limit('10')->get()->result();

        $data['liste_encok'] = $this->db->select('liste.vid as vid,liste.adi as adi,bilgi.viewed as viewed')->from('bilgi')->join('liste','bilgi.vid = liste.vid')->order_by('viewed', 'desc')->limit('10')->get()->result();

        $this->template->write_view('page', 'welcome', $data);
        $this->template->render();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
