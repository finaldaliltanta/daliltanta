<?php

class sitead extends CI_Model {

    public function valid_user_pass($user, $pass) {

        $this->db->select('id,username,password');
        $this->db->from('sitead');
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row(0)->id;
        } else {
            return false;
        }
    }

    function valid_user_pin($user, $pin) {
        $this->db->select('id,username,pincode');
        $this->db->from('sitead');
        $this->db->where('username', $user);
        $this->db->where('pincode', $pin);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row(0)->id;
        } else {
            return false;
        }
    }

}

?>
