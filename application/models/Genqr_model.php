<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Genqr_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Jefri Maruli <jefrimaruli@gmail.com>
 * @link      https://github.com/xietsunzao/
 * @param     ...
 * @return    ...
 *
 */
class Genqr_model extends CI_Model
{
    public function find_data($term)
    {
        $this->db->like('nim', $term, 'both');
        $this->db->order_by('nim', 'ASC');
        $this->db->limit(10);
        return $this->db->get('mahasiswa');
    }

    public function generate_qr($id)
    {
        $this->db->where('mahasiswa.nim', $id);
        $this->db->join('fakultas', 'fakultas.id_fakultas = mahasiswa.id_fakultas', 'left');
        $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
        $this->db->join('jenjang', 'jenjang.id_jenjang = mahasiswa.id_jenjang', 'left');
        return   $this->db->get('mahasiswa');
    }

    public function get_student_email_by_id($id) {
        $this->db->select('email');
        $this->db->where('id_mahasiswa', $id);
        $query = $this->db->get('mahasiswa');
        if ($query->num_rows() > 0) {
            return $query->row()->email;
        } else {
            return false;
        }
    }
    public function get_student_nim_by_id($id) {
        $this->db->select('nim'); // Asumsi kolom NIM ada di tabel mahasiswa
        $this->db->where('id_mahasiswa', $id);
        $query = $this->db->get('mahasiswa');
        if ($query->num_rows() > 0) {
            return $query->row()->nim;
        } else {
            return false;
        }
    }
    public function get_all_mahasiswa() {
        return $this->db->get('mahasiswa');
    }

    // Fungsi untuk memperbarui NIM mahasiswa
    public function update_nim($id_mahasiswa, $nim) {
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        return $this->db->update('mahasiswa', array('nim' => $nim));
    }
    public function save_all_image($data)
    {
        // Implementasi untuk menyimpan data gambar
    }
}

/* End of file Genqr_model.php */
/* Location: ./application/models/Genqr_model.php */
