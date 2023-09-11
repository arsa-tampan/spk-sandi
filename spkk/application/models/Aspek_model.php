<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Aspek_model extends CI_Model {

        public function tampil()
        {
            $query = $this->db->get('aspek');
            return $query->result();
        }

        public function getTotal()
        {
            return $this->db->count_all('aspek');
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('aspek', $data);
            return $result;
        }

        public function show($id_aspek)
        {
            $this->db->where('id_aspek', $id_aspek);
            $query = $this->db->get('aspek');
            return $query->row();
        }

        public function update($id_aspek, $data = [])
        {
            $ubah = array(
                'keterangan' => $data['keterangan'],
                'kode_aspek' => $data['kode_aspek'],
				'persentase' => $data['persentase'],
				'bobot_cf' => $data['bobot_cf'],
				'bobot_sf' => $data['bobot_sf'],
            );

            $this->db->where('id_aspek', $id_aspek);
            $this->db->update('aspek', $ubah);
        }

        public function delete($id_aspek)
        {
            $this->db->where('id_aspek', $id_aspek);
            $this->db->delete('aspek');
        }
    }
    