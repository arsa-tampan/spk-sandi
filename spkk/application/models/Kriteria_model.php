<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kriteria_model extends CI_Model {

        public function insert($data = [])
        {
            $result = $this->db->insert('kriteria', $data);
            return $result;
        }

        public function update($id_kriteria, $data = [])
        {
            $ubah = array(
                'kode_kriteria' => $data['kode_kriteria'],
				'id_aspek' => $data['id_aspek'],
                'deskripsi' => $data['deskripsi'],
                'nilai'  => $data['nilai'],
				'jenis'  => $data['jenis'],
            );

            $this->db->where('id_kriteria', $id_kriteria);
            $this->db->update('kriteria', $ubah);
        }

        public function delete($id_kriteria)
        {
            $this->db->where('id_kriteria', $id_kriteria);
            $this->db->delete('kriteria');
        }

        public function get_aspek()
        {
            $query = $this->db->get('aspek');
            return $query->result();
        }

        public function data_kriteria($id_aspek)
		{
			$query = $this->db->query("SELECT * FROM kriteria WHERE id_aspek='$id_aspek' ORDER BY id_kriteria ASC;");
			return $query->result_array();
		}
    }
    
    /* End of file Kategori_model.php */
    