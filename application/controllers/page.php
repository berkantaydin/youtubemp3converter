<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends CI_Controller {

    public function privacypolicy() {
        $this->template->write_view('page', 'page/privacypolicy');
        $this->template->render();
    }

}