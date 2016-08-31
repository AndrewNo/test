<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rule_model extends CI_Model
{
    public $comments_rules = [
        [
            'field' => 'author',
            'label' => 'Name',
            'rule' => 'required|min_length[3]|max_length[12]'
        ],
        [
            'field' => 'content',
            'label' => 'Comment',
            'rule' => 'required|min_length[3]|max_length[12]'
        ]
    ];
}
