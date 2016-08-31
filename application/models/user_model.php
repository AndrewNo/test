<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function reg($reg)
    {
        $this->db->insert('user', $reg);
    }

    public function checkEmail($email)
    {
        $this->db->where('email', $email);
        $this->db->select('email');
        $sql = $this->db->get('user');

        if ($sql->num_rows() > 0){
            return false;
        } else {
            return true;
        }
    }

    public function checkPassword($pass)
    {
        $this->db->where('password', $pass);
        $this->db->select('password');
        $sql = $this->db->get('user');

        if ($sql->num_rows() > 0){
            return false;
        } else {
            return true;
        }
    }
}