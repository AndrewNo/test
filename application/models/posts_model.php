<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_model extends CI_Model
{

    public function getAllPosts($num, $offset)
    {
        $this->db->limit('10');
        $this->db->order_by('dt', 'desc');
        $query = $this->db->get('post', $num, $offset);
        return $query->result_array();
    }

    public function getOnePost($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('post');
        return $query->row_array();
    }

    public function addComment($add)
    {
        $this->db->insert('comment', $add);
    }

    public function newPost($post)
    {
        $this->db->insert('post', $post);
    }
}