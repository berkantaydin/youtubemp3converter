<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BA_Auth {

    var $CI;

    function __construct() {
        $this->CI = & get_instance();
    }

    public function kripto($pass = '') {
        $pass = 'x' . $pass . config_item('encryption_key');

        if (function_exists('hash') && in_array('sha512', hash_algos())) {
            $pass = hash('sha512', $pass);
        } else {
            $pass = sha1($pass);
        }

        return $pass;
    }

    function req_login() {
        if ($this->is_login() == FALSE) {
            //redirect('auth/login');
            redirect('auth');
        }
    }

    function is_login() {
        if ((int) $this->CI->session->userdata('user_id') < 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function reqit($izin) {
        $this->req_login();
        if ($this->isit($izin) == FALSE) {
            redirect('auth');
        }
    }

    function isit($izin) {
        if ($this->is_login() == TRUE) {
            if ($this->CI->session->userdata('perms') == '-1') //Süper Yönetici
                return TRUE;

            if (substr($izin, -1) == "w") { //Yazma belirtilmişse izni kontrol et. Write izni MODULKODUw şeklinde verilir.
                if (strpos($this->CI->session->userdata('perms'), '"' . (int) $izin . 'w"') !== FALSE)
                    return TRUE;
            }
            else { //Yazma izni belirtilmemişse write ve sonrasında read iznine bak. Read izni MODULKODUr yada sadece MODULKODU olarak da verilebilir.
                if ((strpos($this->CI->session->userdata('perms'), '"' . (int) $izin . 'w"') !== FALSE) || (strpos($this->CI->session->userdata('perms'), 'r"' . (int) $izin . '"') !== FALSE) || (strpos($this->CI->session->userdata('perms'), '"' . (int) $izin . '"') !== FALSE))
                    return TRUE;
            }
        }
        else {
            return FALSE;
        }
    }

    function logout() {
        $this->CI->session->unset_userdata('user_id');
        $this->CI->session->sess_destroy();
    }

    function make_login($email = '', $password = '') {
        $chk = $this->CI->db->from('user')->where('email', $email)->where('pass', $this->kripto($password))->get()->row();

        if (!isset($chk->user_id)) { //Böyle bir kullanıcı yoksa
            $this->CI->session->set_flashdata('error', 'Invalid Username or Password');
            return FALSE;
        }

        if (isset($chk->user_id)) {//Kimlik doğrulaması başarılıysa
            $this->CI->db->where('user_id', $chk->user_id)->update('user', array(
                'dt_lastlogin' => date("Y-m-d H:i:s", time()),
                'last_ip' => $this->CI->input->ip_address()
            ));

            //Login tanımlamalarına başla
            $this->CI->session->set_userdata('user_id', $chk->user_id);
            $this->CI->session->set_userdata('user', $chk->user);
            $this->CI->session->set_userdata('email', $chk->email);

            redirect('/profile');
            return TRUE;
        } else { //Kimlik doğrulaması hatalıysa
            //Güvenlik için sleep zamanı
            sleep(4 + rand(0, 3));

            $this->CI->session->set_flashdata('error', 'Invalid Username or Password');
            $this->req_login();
            return FALSE;
        }

        //Herhangi bir Return yoksa
        //Güvenlik için sleep zamanı
        sleep(3 + rand(0, 3));
        //Yönlendir
        $this->req_login();
    }

    function register($user = '', $email = '', $password = '') {
        $chk = $this->CI->db->from('user')->where('user', $user)->or_where('email', $email)->get()->row();

        if (isset($chk->user_id)) { //Böyle bir kullanıcı varsa
            $this->CI->session->set_flashdata('error', 'Username is already taken.');
            return FALSE;
        }

        if (!isset($chk->user_id)) {//Kullanıcı yoksa oluştur
            $this->CI->db->insert('user', array(
                'user' => $user,
                'email' => $email,
                'pass' => $this->kripto($password),
                'dt_register' => date("Y-m-d H:i:s", time()),
                'last_ip' => $this->CI->input->ip_address()
            ));

            $this->CI->session->set_flashdata('info', 'Registration Success');

            redirect('auth');
            return TRUE;
        }
    }

}

?>
