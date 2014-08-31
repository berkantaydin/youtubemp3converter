<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Link extends CI_Controller {

    public function facebook($genid = '') {
        redirect('http://facebook.com/profile.php?id=' . id_from_genid($genid), 'location', 301);
    }

}