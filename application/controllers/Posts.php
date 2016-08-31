<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{

    public function index()
    {

        $this->load->library('form_validation');

        $config['base_url'] = base_url() . '/index.php/posts/index/';
        $config['total_rows'] = $this->db->count_all('post');
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $data['user'] = $this->session->userdata('user');
        $this->load->model('posts_model');
        $name = 'posts';
        $data['posts'] = $this->posts_model->getAllPosts($config['per_page'], $this->uri->segment(3));


        if ($this->input->post('add')) {
            $this->load->model('rule_model');
            $this->form_validation->set_rules($this->rule_model->comments_rules);
            $check = $this->form_validation->run();

            if ($check == true) {
                $comment_data['author'] = $this->input->post('author');
                $comment_data['content'] = $this->input->post('content');
                $comment_data['post_id'] = $this->input->post('post_id');

                $this->posts_model->add_comment($comment_data);

                redirect(base_url().'/index.php/posts/index/');
            } else {
                $this->template->page_view($name, $data);
            }

        } else {
            $this->template->page_view($name, $data);
        }
    }


}
