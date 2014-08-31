<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Media extends CI_Controller
{

    public function getsearch($val = '')
    {
        if ($val == '')
            $val = $this->input->post('getsearch');

        $YoutubeID1 = explode('watch?v=', $val);
        $YoutubeID2 = explode('&', $YoutubeID1[1]);
        $YoutubeID = $YoutubeID2[0];
        $YoutubeID = str_replace("'", "", $YoutubeID);
        $YoutubeID = str_replace('"', '', $YoutubeID);
        $YoutubeID = str_replace("<", "", $YoutubeID);
        $YoutubeID = str_replace(">", "", $YoutubeID);

        $vid = $YoutubeID;

        //var mı bak
        $data = $this->db->select('id,vid,adi')->from('liste')->where('vid', $vid)->limit('1')->get()->row();

        if (!isset($data->id) || ($data->id < 1)) {
            ini_set('default_socket_timeout', 1200);
            $opts = array('http' =>
            array(
                'method' => 'GET',
                'timeout' => 1200
            )
            );

            $context = stream_context_create($opts);

            $getdata = @file_get_contents("http://youtubemp3donusturucu.com/indir/index.php?secret=741852asdx&vid=" . $vid, false, $context);
            list($srv1, $adi, $vid, $aciklama) = preg_split("#\n#", $getdata, 4, PREG_SPLIT_NO_EMPTY);

            $this->db->insert('liste', array(
                'adi' => $adi,
                'aciklama' => $aciklama,
                'url' => $vid,
                'vid' => $vid,
                'srv1' => $srv1
            ));

        } else {
            //var, yönlendir
            $adi = $data->adi;
        }

        redirect('media/get/' . $vid . '/' . url_title(convert_accented_characters($adi)));
    }

    public function get($vid = '')
    {
        $data = $this->db->select('id,vid,adi,aciklama,lyrics,url,srv1')->from('liste')->where('vid', $vid)->limit('1')->get()->row();

        if (!isset($data->id) || ($data->id < 1)) {
            //show_error("Information Removed or Not Exists", "410", "Sorry for inconvenience");

            //Yoksa kaydet
            redirect('media/getsearch/' . $vid);
        }

        //DB'de Varsa tekrar çek - Çünkü db dursa da dosyalar temizlenebiliyor.
        ini_set('default_socket_timeout', 1200);
        $opts = array('http' =>
        array(
            'method' => 'GET',
            'timeout' => 1200
        )
        );

        $context = stream_context_create($opts);

        @file_get_contents("http://youtubemp3donusturucu.com/indir/index.php?secret=741852asdx&vid=" . $data->vid, false, $context);

        //Add viewed point + 1
        $this->db->set('viewed','viewed + 1', FALSE)->where(array('vid'=>$data->vid))->update('bilgi');
        if($this->db->affected_rows() < 1)
        {
            $this->db->insert('bilgi',array('vid'=>$data->vid,'viewed'=>'1'));
        }

        $ver['data'] = $data;

        if($this->input->get('download') == '1')
        {
            $file = '/var/www/indir/'.$data->vid.'.mp3';
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header("Content-Disposition: attachment;filename=".url_title(convert_accented_characters($data->adi)).".mp3");
            header("Content-Transfer-Encoding: binary");
            echo file_get_contents($file);
            return;
        }

        if($this->input->get('json') == '1')
        {
            $file = '/var/www/indir/'.$data->vid.'.mp3';
            $size = filesize($file);
            $adi = $data->adi;
            $jsonx = array(
                'vid' => $data->vid,
                'name' => $data->adi,
                'img' => 'http://img.youtube.com/vi/' . $data->vid . '/hqdefault.jpg',
                'link' => 'http://youtubemp3donusturucu.com/indir/'. $data->vid . '.mp3',
                'size' => $size
            );
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsonx);
            return;
        }

        $this->template->write('title', convert_accented_characters($data->adi));
        $this->template->write('description', 'Dönüştürülmüş video ' . convert_accented_characters($data->adi));
        $this->template->write('name', convert_accented_characters($data->adi));
        $this->template->write_view('page', 'media/get', $ver);
        $this->template->render();
    }

    public function getfrom404()
    {
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
            show_error("Information Removed or Not Exists", "410", "Sorry for inconvenience");

        $person = $this->db->select('id,name')->from('liste')->where('id', $id)->limit('1')->get()->row();

        if (!isset($person->id) || ($person->id < 1))
            show_error("Information Removed or Not Exists", "410", "Sorry for inconvenience");

        redirect(base_url() . 'media/get/' . genid_from_id($person->id) . '/' . url_title($person->name), 'location', 301);
    }

}

/* End of file face.php */
/* Location: ./application/controllers/face.php */
