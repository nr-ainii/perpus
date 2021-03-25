<?php
    class Auth extends CI_Controller
    {
        public function login()
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header');
                $this->load->view('form_login');
                $this->load->view('template/footer');
            } else {
                $nama           = $this->input->post('nama');
                $password       = md5($this->input->post('password'));

                $cek = $this->perpus_model->cek_login($nama, $password);
                // var_dump($cek);
                // die();

                if ($cek == FALSE) {
                    $this->session->set_flashdata('pesan','
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        nama atau Password Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('auth/login');
                } else {
                    $this->session->set_userdata('id_customer',$cek->id_customer);
                    $this->session->set_userdata('nama',$cek->nama);
                    // $this->session->set_userdata('password',$cek->password);

                    redirect('dashboard');
                    
                }
            }
        
        }

        public function _rules()
        {
            $this->form_validation->set_rules('nama','nama','required');
            $this->form_validation->set_rules('password','Password','required');
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('auth/login');
        }

        public function ganti_password()
        {
            $this->load->view('templates_admin/header');
            $this->load->view('ganti_password');
            $this->load->view('templates_admin/footer'); 
        }

        public function ganti_password_aksi()
        {
            $pass_baru  =  $this->input->post('pass_baru');
            $ulang_pass =  $this->input->post('ulang_pass');

            $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
            $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates_admin/header');
                $this->load->view('ganti_password');
                $this->load->view('templates_admin/footer'); 
            } else {
                $data = array('password' => md5($pass_baru));
                $id = array('id_petugas' => $this->session->userdata('id_petugas'));

                $this->rental_model->update_password($id, $data, 'petugas');

                $this->session->set_flashdata('pesan','
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password Berhasil Diupdate, Silahkan Login!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('auth/login');
            }
        }
    }
    

?>