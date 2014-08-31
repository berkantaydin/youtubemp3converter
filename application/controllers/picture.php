<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Picture extends CI_Controller {

    public function square($genid = '') {
        redirect('http://graph.facebook.com/' . id_from_genid($genid) . '/picture?type=square', 'location', 301);
    }

    public function large($genid = '') {
        redirect('http://graph.facebook.com/' . id_from_genid($genid) . '/picture?type=large', 'location', 301);
    }

}