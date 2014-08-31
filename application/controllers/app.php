<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App extends CI_Controller
{
    public function index()
    {
        header('Content-Type: text/html; charset=utf-8');
        echo "Lutfen gezintinizi tamamlayıp, MP3 Çevir butonuna tıklayınız. Çevirme işlemini beklerken lütfen sabırlı olun. Dosyanız indikten sonra yeni çevirme işlemi yapabilirsiniz.";
    }

    public function getsearch($val = '')
    {
        if ($val == '')
            $val = $this->input->post('getsearch');

        if ($val == '')
            $val = $this->input->get('url');

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

            list($srv1, $adi, $vid, $aciklama) = preg_split("#\n#", file_get_contents("http://youtubemp3donusturucu.com/indir/index.php?secret=741852asdx&vid=" . $vid, false, $context), 4, PREG_SPLIT_NO_EMPTY);

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

        redirect('media/get/' . $vid . '/' . url_title(convert_accented_characters($adi)).'/?json=1');
    }

}

/* End of file face.php */
/* Location: ./application/controllers/face.php */
