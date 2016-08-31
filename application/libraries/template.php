<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту');

class Template
{

    function page_view($name, $data = null)
    {
        $CI =& get_instance();
        if (empty($data['user'])){
            $CI->load->view('template_blocks/header');
        } else {
            $CI->load->view('template_blocks/auth_view');
        }
        $CI->load->view($name, $data);
        $CI->load->view('template_blocks/footer');
    }
}

