<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Perhitungan extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Perhitungan_model');
        }

        public function index()
        {
            if ($this->session->userdata('id_user_level') != "1")
			if ($this->session->userdata('id_user_level') != "3") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
			$aspek = $this->Perhitungan_model->get_aspek();
            $alternatif = $this->Perhitungan_model->get_alternatif();
			
			$this->Perhitungan_model->hapus_nilai_bobot();
			foreach ($aspek as $aspeks){
				$kriteria = $this->Perhitungan_model->get_kriteria($aspeks->id_aspek);
				foreach ($alternatif as $keys){
					foreach ($kriteria as $key){
						$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
						$selisih = $data_pencocokan['nilai']-$key->nilai;
						if($selisih == "0"){
							$nilai_bobot = 5;
						}elseif($selisih == "1"){
							$nilai_bobot = 4.5;
						}elseif($selisih == "-1"){
							$nilai_bobot = 4;
						}elseif($selisih == "2"){
							$nilai_bobot = 3.5;
						}elseif($selisih == "-2"){
							$nilai_bobot = 3;
						}elseif($selisih == "3"){
							$nilai_bobot = 2.5;
						}elseif($selisih == "-3"){
							$nilai_bobot = 2;
						}elseif($selisih == "4"){
							$nilai_bobot = 1.5;
						}elseif($selisih == "-4"){
							$nilai_bobot = 1;
						}
						$n_bobot = [
							'id_alternatif' => $keys->id_alternatif,
							'id_aspek' => $aspeks->id_aspek,
							'id_kriteria' => $key->id_kriteria,
							'jenis' => $key->jenis,
							'nilai' => $nilai_bobot
						];
						$this->Perhitungan_model->insert_nilai_bobot($n_bobot);
					}
				}
			}
			$data = [
                'page' => "Perhitungan",
                'aspek'=> $this->Perhitungan_model->get_aspek(),
                'alternatif'=> $this->Perhitungan_model->get_alternatif(),
            ];
			
            $this->load->view('Perhitungan/perhitungan', $data);
        }
		
		public function hasil()
        {
            $data = [
                'page' => "Hasil",
				'hasil'=> $this->Perhitungan_model->get_hasil()
            ];
			
            $this->load->view('Perhitungan/hasil', $data);
        }
    
    }
    
    