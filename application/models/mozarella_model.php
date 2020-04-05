<?php 

class mozarella_model extends CI_Model {

    public function getMozarella($id = null) {
        if ($id === null){
    
            return $this->db->get('barang')->result_array();
        } else{
            return $this->db->get_where('barang', ['barang_id' => $id])->result_array();
        }
    }
    public function deleteMozarella($id)
    {
        $this->db->delete('barang',['barang_id' => $id]);
        return $this->db->affected_rows();
    }
    public function createMozarella($data)
    {
        $this->db->insert('barang', $data);
        return $this->db->affected_rows();
    }
    public function updateMozarella($data, $id){
        $this->db->update('barang', $data, ['barang_id' => $id]);
        return $this->db->affected_rows();
    }
}

?>