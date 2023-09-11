<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Perhitungan_model extends CI_Model {
       
        public function get_aspek()
        {
            $query = $this->db->get('aspek');
            return $query->result();
        }
		
		public function get_kriteria($id_aspek)
        {
            $query = $this->db->query("SELECT * FROM kriteria WHERE id_aspek='$id_aspek' ORDER BY id_kriteria ASC;");
            return $query->result();
        }
		
        public function get_alternatif()
        {
            $query = $this->db->get('alternatif');
            return $query->result();
        }
		
		public function data_nilai($id_alternatif,$id_kriteria)
		{
			$query = $this->db->query("SELECT nilai FROM penilaian WHERE id_alternatif='$id_alternatif' AND id_kriteria='$id_kriteria';");
			return $query->row_array();
		}
		
		public function data_nilai_cf($id_alternatif,$id_aspek)
		{
			$query = $this->db->query("SELECT SUM(nilai) as t_nilai, COUNT(nilai) as jumlah FROM nilai_bobot WHERE id_alternatif='$id_alternatif' AND id_aspek='$id_aspek' AND jenis='Core Factor';");
			return $query->row_array();
		}
		
		public function data_nilai_sf($id_alternatif,$id_aspek)
		{
			$query = $this->db->query("SELECT SUM(nilai) as t_nilai, COUNT(nilai) as jumlah FROM nilai_bobot WHERE id_alternatif='$id_alternatif' AND id_aspek='$id_aspek' AND jenis='Secondary Factor';");
			return $query->row_array();
		}
		
		public function get_hasil()
        {
			$query = $this->db->query("SELECT * FROM hasil ORDER BY nilai DESC;");
            return $query->result();
        }
		
		public function get_hasil_alternatif($id_alternatif)
		{
			$query = $this->db->query("SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif';");
			return $query->row_array();		
		}
		
		public function insert_nilai_bobot($n_bobot = [])
        {
            $result = $this->db->insert('nilai_bobot', $n_bobot);
            return $result;
        }
		
		public function hapus_nilai_bobot()
        {
            $query = $this->db->query("TRUNCATE TABLE nilai_bobot;");
			return $query;
        }
		
		public function insert_hasil($hasil_akhir = [])
        {
            $result = $this->db->insert('hasil', $hasil_akhir);
            return $result;
        }
		
		public function hapus_hasil()
        {
            $query = $this->db->query("TRUNCATE TABLE hasil;");
			return $query;
        }
    }
    