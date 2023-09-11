<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Aspek extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Aspek_model');

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
            $data['page'] = "Aspek";
			$data['list'] = $this->Aspek_model->tampil();
            $this->load->view('aspek/index', $data);
        }
        
        //menampilkan view create
        public function create()
        {
			$data['page'] = "Aspek";
            $this->load->view('aspek/create', $data);
        }

        //menambahkan data ke database
        public function store()
        {
                $data = [
                    'keterangan' => $this->input->post('keterangan'),
                    'kode_aspek' => $this->input->post('kode_aspek'),
					'persentase' => $this->input->post('persentase'),
					'bobot_cf' => $this->input->post('bobot_cf'),
					'bobot_sf' => $this->input->post('bobot_sf'),
                ];
                
                $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
                $this->form_validation->set_rules('kode_aspek', 'Kode Aspek', 'required');

                
    
                if ($this->form_validation->run() != false) {
                    $result = $this->Aspek_model->insert($data);
                    if ($result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
						redirect('Aspek');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
                    redirect('Aspek/create');
                    
                }
            

        }

        public function edit($id_aspek)
        {
            $data['page'] = "Aspek";
			$data['aspek'] = $this->Aspek_model->show($id_aspek);
            $this->load->view('aspek/edit', $data);
        }
    
        public function update($id_aspek)
        {
            // TODO: implementasi update data berdasarkan $id_aspek
            $id_aspek = $this->input->post('id_aspek');
            $data = array(
                'keterangan' => $this->input->post('keterangan'),
                'kode_aspek' => $this->input->post('kode_aspek'),
				'persentase' => $this->input->post('persentase'),
				'bobot_cf' => $this->input->post('bobot_cf'),
				'bobot_sf' => $this->input->post('bobot_sf'),
            );

            $this->Aspek_model->update($id_aspek, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
			redirect('aspek');
        }
    
        public function destroy($id_aspek)
        {
            $this->Aspek_model->delete($id_aspek);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
			redirect('aspek');
        }
    
    }
    