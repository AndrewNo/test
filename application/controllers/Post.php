$post['title']<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller
{

    public function view($id)
    {
        $this->load->library('form_validation');
        $this->load->model('posts_model');
        $data['user'] = $this->session->userdata('user');
        $name = 'post';
        $data['post'] = $this->posts_model->getOnePost($id);


        if ($this->input->post('add')) {
            $this->load->model('rule_model');
            $this->form_validation->set_rules($this->rule_model->comments_rules);
            $check = $this->form_validation->run();

            if ($check == true) {
                $comment_data['author'] = $this->input->post('author');
                $comment_data['content'] = $this->input->post('content');
                $comment_data['post_id'] = $this->input->post('post_id');

                $this->posts_model->add_comment($comment_data);

                redirect(base_url() . '/index.php/post/view/');
            } else {
                $this->template->page_view($name, $data);
            }

        } else {
            $this->template->page_view($name, $data);
        }
    }

    public function create()
    {
        $this->load->model('posts_model');
        $name = 'new_post';
        $data['user'] = $this->session->userdata('user');

        if ($this->input->post('new_post')) {
            $config['upload_path'] = './uploads/';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);

            $this->upload->do_upload();

            $post['title'] = $this->input->post('title');
            $post['content'] = $this->input->post('content');
            $post['author'] = $data['user'];
            /*$post['img'] = $_FILES['userfile']['name'];*/




            $this->posts_model->newPost($post);

            redirect(base_url());
        } else {
            $this->template->page_view($name);
        }



    }
}
