<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sitemap extends CI_Controller {

    public function listcreator() {
        $toplam = $this->db->count_all_results('liste');
        $toplam = ceil((int) $toplam / 50000);

        $cikti = '<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        for ($i = 0; $i < $toplam; $i++) {
            $cikti .= '<sitemap><loc>' . site_url('sitemap/mapcreator/' . $i . '/map_' . $i . '.txt') . '</loc></sitemap>';
        }
        $cikti .= '</sitemapindex>';

        echo $cikti;
    }

    public function mapcreator($sayfa = '') {
        $sayfa = (int) $sayfa;
        $data = $this->db->select('id,name')->from('liste')->order_by('primary', 'asc')->limit('50000', ($sayfa * 50000))->get()->result();

        $cikti = '';
        foreach ($data as $k) {
            $cikti .= base_url() . 'media/get/' . genid_from_id($k->id) . '/' . url_title($k->name) . "\n";
        }

        echo $cikti;
    }

    public function img_listcreator() {
        $toplam = $this->db->count_all_results('liste');
        $toplam = ceil((int) $toplam / 1000);

        $cikti = '<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        for ($i = 0; $i < $toplam; $i++) {
            $cikti .= '<sitemap><loc>' . site_url('sitemap/img_mapcreator/' . $i . '/map_' . $i . '.txt') . '</loc></sitemap>';
        }
        $cikti .= '</sitemapindex>';

        echo $cikti;
    }

    public function img_mapcreator($sayfa = '') {
        $sayfa = (int) $sayfa;
        $data = $this->db->select('id,name')->from('liste')->order_by('primary', 'asc')->limit('1000', ($sayfa * 1000))->get()->result();

        $cikti = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';
        foreach ($data as $k) {
            $cikti .= '<url><loc>' . base_url() . 'media/get/' . genid_from_id($k->id) . '/' . url_title($k->name) . "</loc><image:image><image:loc>" . site_url('picture/large/' . genid_from_id($k->id)) . "</image:loc><image:title>Photo of " . convert_accented_characters($k->name) . "</image:title></image:image></url>";
        }

        $cikti .= '</urlset>';

        echo $cikti;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
