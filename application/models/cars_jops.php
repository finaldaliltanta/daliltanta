<?php

class cars_jops extends CI_Model {

    function insertCar($data) {
        $this->db->insert("car", $data);
    }

    function insertJop($data) {
        $this->db->insert("jop", $data);
    }
    
}

?>
