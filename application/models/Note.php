<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Note extends CI_Model {
    public function get_all_notes()
    {
        return $this->db->query("SELECT * FROM notes")->result_array();
    }

    public function create($post)
    {
        $this->db->query("INSERT INTO notes(title, created_at) VALUES (?, NOW())", array($post['title']));
    }
    
    public function update($post)
    {
        $this->db->query("UPDATE notes SET description = ?, updated_at= NOW() WHERE id = ?", array($post['description'], $post['id']));
    }
    
    public function delete($post)
    {
        $this->db->query("DELETE FROM notes WHERE id = ?", array($post['id']));
    }

}