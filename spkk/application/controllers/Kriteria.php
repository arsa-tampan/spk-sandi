<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kriteria extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Kriteria_model');

            if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
        }

        public function index()
        {
            $data = [
				'page' => "Kriteria",
                'aspek'=> $this->Kriteria_model->get_aspek(),
            ];
            $this->load->view('kriteria/index', $data);
        }

        //menambahkan data ke database
        public function store()
        {
                $data = [
                    'kode_kriteria' => $this->input->post('kode_kriteria'),
					'id_aspek' => $this->input->post('id_aspek'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'nilai' => $this->input->post('nilai'),
					'jenis' => $this->input->post('jenis'),
                ];
                
				$this->form_validation->set_rules('kode_kriteria', 'Kode', 'required');
                $this->form_validation->set_rules('id_aspek', 'ID Aspek', 'required');
                $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
                $this->form_validation->set_rules('nilai', 'Nilai', 'required');
				$this->form_validation->set_rules('jenis', 'Jenis', 'required');

                if ($this->form_validation->run() != false) {
                    $result = $this->Kriteria_model->insert($data);
                    if ($result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
						redirect('kriteria');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
                    redirect('kriteria');
                    
                }
            

        }
    
        public function update($id_kriteria)
        {
            // TODO: implementasi update data berdasarkan $id_kriteria
            $id_kriteria = $this->input->post('id_kriteria');
            $data = array(
                'kode_kriteria' => $this->input->post('kode_kriteria'),
				'id_aspek' => $this->input->post('id_aspek'),
                'deskripsi' => $this->input->post('deskripsi'),
                'nilai' => $this->input->post('nilai'),
				'jenis' => $this->input->post('jenis'),
            );

            $this->Kriteria_model->update($id_kriteria, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
			redirect('kriteria');
        }
    
        public function destroy($id_kriteria)
        {
            $this->Kriteria_model->delete($id_kriteria);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('kriteria');
        }
    
    }
    