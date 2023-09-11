<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Penilaian_model extends CI_Model {
      
        public function tambah_penilaian($id_alternatif,$id_aspek,$id_kriteria,$nilai)
        {
            $query = $this->db->simple_query("INSERT INTO penilaian VALUES (DEFAULT,'$id_alternatif','$id_aspek','$id_kriteria',$nilai);");
            return $query;	
        }
       
        public function edit_penilaian($id_alternatif,$id_aspek,$id_kriteria,$nilai)
        {
            $query = $this->db->simple_query("UPDATE penilaian SET nilai=$nilai WHERE id_alternatif='$id_alternatif' AND id_aspek='$id_aspek' AND id_kriteria='$id_kriteria';");
            return $query;	
        }


        public function delete($id_penilaian)
        {
            $this->db->where('id_penilaian', $id_penilaian);
            $this->db->delete('penilaian');
        }

       
        public function get_aspek()
        {
            $query = $this->db->get('aspek');
            return $query->result();
        }
        public function get_alternatif()
        {
            $query = $this->db->query("SELECT * FROM alternatif");
            return $query->result();
        }
        public function get_kriteria()
        {
            $query = $this->db->get('kriteria');
            return $query->result();
        }

        public function data_penilaian($id_alternatif,$id_aspek,$id_kriteria)
        {
            $query = $this->db->query("SELECT * FROM penilaian WHERE id_alternatif='$id_alternatif' AND id_aspek='$id_aspek' AND id_kriteria='$id_kriteria';");
            return $query->row_array();
        }
        public function untuk_tombol($id_alternatif)
		{
			$query = $this->db->query("SELECT * FROM penilaian WHERE id_alternatif='$id_alternatif';");
			return $query->num_rows();
		}
		public function data_kriteria($id_aspek)
		{
			$query = $this->db->query("SELECT * FROM kriteria WHERE id_aspek='$id_aspek' ORDER BY id_kriteria ASC;");
			return $query->result_array();
		}
    
    }
    
    