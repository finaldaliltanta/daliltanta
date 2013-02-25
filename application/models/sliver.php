<?php

class sliver extends CI_Model {

    function selectAllFromSliver($id) {
        $query = "select * from sliver_view where id = ?";
        $result = $this->db->query($query, $id);
        return $result->result();
    }

    function selectAll() {
        $query = "select * from sliver_view";
        $result = $this->db->query($query, $id);
        return $result->result();
    }

    function selectAllAdv($dept_id, $sub_id) {
        $query = "select * from sliver_view where dept_id=? and sub_dept_id=? ";
        $ar = array('dept_id' => $dept_id, 'sud_dept_id' => $sub_id);
        $result = $this->db->query($query, $ar);
        return $result->result();
    }

}

?>
