<?php

class golden extends CI_Model {

    function selectAllFromGolden($id) {
        $query = "select * from golden_view where id = ?";
        $result = $this->db->query($query, $id);
        return $result->result();
    }

    function selectAll($dept_id, $sub_id) {
        $query = "select * from golden_view where dept_id=? and sub_dept_id=? ";
        $ar = array('dept_id' => $dept_id, 'sud_dept_id' => $sub_id);
        $result = $this->db->query($query, $ar);
        return $result->result();
    }

    public function selectGalleryPhotoByID($id) {

        $query = "select * from gallery where golden_id= ?";
        $result = $this->db->query($query, $id);
        return $result->result();
    }

}

?>
