<?php

class dept extends CI_Model {

    public function create($data) {
        $this->db->insert("dept", $data);
    }

    public function createDocDept($data) {
        $this->db->insert('sub_dept', $data);
    }

    
    public function showAll() {
        $this->db->order_by('order');
        $query = $this->db->get('dept');
        return $query->result();
    }

    public function update_order($id, $order) {

        $data = array('order' => $order);
        $this->db->where('id', $id);
        $this->db->update('dept', $data);
    }

    function createSubDept($data) {
        $this->db->insert("sub_dept", $data);
    }

    public function showAll_deptANDsub() {

        $query = "select dept.name as d_name,dept.`order`,
            sub_dept.name as sd_name,
            dept.id as d_id ,
            sub_dept.id as sd_id 
            from dept
            left join sub_dept 
            on dept.id=sub_dept.dept_id  
            order by `order`";

        $result = $this->db->query($query);

        return $result->result();
    }

}

?>
