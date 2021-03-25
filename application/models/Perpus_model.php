<?php 

    class Perpus_model extends CI_model
    {
        public function get_data($table)
        {
            return $this->db->get($table);
        }

        public function insert_data($data,$table)
        {
            $this->db->insert($table,$data);
        }

        public function update_data($table, $data, $where)
        {
            $this->db->update($table,$data,$where);
        }

        public function delete_data($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function cari_buku($cari)
        {
            $this->db->select('*');
            $this->db->from('buku');
            $this->db->like('kode_buku', $cari);
            $this->db->or_like('judul', $cari);
            return $this->db->get()->result();
        }

        public function cari_anggota($cari)
        {
            $this->db->select('*');
            $this->db->from('anggota');
            $this->db->like('nis', $cari);
            $this->db->or_like('nama', $cari);
            return $this->db->get()->result();
        }

        public function cari_transaksi($cari)
        {
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->like('no_transaksi', $cari);
            $this->db->or_like('nama', $cari);
            return $this->db->get()->result();
        }

        public function cek_login()
        {
            $nama      =  set_value('nama');
            $password  =  set_value('password');

            $result  =  $this->db
                        ->where('nama',$nama)
                        ->where('password',md5($password))
                        ->limit(1)
                        ->get('petugas');
        
            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return FALSE;
            }
        }

        function totalRows($table)
        {
            return $this->db->count_all_results($table);
        }

        // public function update_password($where,$data,$table)
        // {
        //     $this->db->where($where);
        //     $this->db->update($table,$data);
        // }
    }
    

?>