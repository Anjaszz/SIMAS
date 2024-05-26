<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Genqr
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Jeff Maruli <jefrimaruli@gmail.com>
 * @link      https://github.com/setdjod/xietsunzao/
 * @param     ...
 * @return    ...
 *
 */

 class Genqr extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        $this->load->model('Genqr_model', 'gen');
        $this->load->library('ciqrcode');
    }

    public function index() {
        $title = "Generate QR Code";
        $restitle = 'Hasil QR Code';
        $formopen = form_open('genqr/process');
        $formclose = form_close();
        $attrqr = array(
            'type' => 'text',
            'name' => 'nim',
            'id' => 'id',
            'class' => 'form-control',
        );
        $attrsubmit = array(
            'type' => 'button',
            'onClick' => 'ready()',
            'onFocus' => 'ready()',
            'id' => 'submit',
            'class' => 'btn btn-gradient-info',
            'content' => 'Generate'
        );

        $lqr = form_label('Input NIM mahasiswa disini', 'nama_qr');
        $iqr = form_input($attrqr);
        $submit = form_button($attrsubmit);
        $data = array(
            'formopen' => $formopen,
            'formclose' => $formclose,
            'title' => $title,
            'restitle' => $restitle,
            'lqr' => $lqr,
            'iqr' => $iqr,
            'submit' => $submit,
        );
        $this->template->load('template/template_v', 'genqr/genqr_v', $data);
    }

    public function search() {
        $term = $this->input->get('term');
        if (isset($term)) {
            $caridata = $this->gen->find_data($term);
            if ($caridata->num_rows() > 0) {
                $hasil = $caridata->result();
                foreach ($hasil as $r) {
                    $arr_hasil[] = array(
                        'label' => $r->nim
                    );
                    echo json_encode($arr_hasil);
                }
            }
        }
    }

    public function generate() {
        $id = $this->input->post('id');
        $cek_qr = $this->gen->generate_qr($id);
        if ($cek_qr->num_rows() > 0) {
            $qr = $cek_qr->row();
            $id_mahasiswa = $qr->id_mahasiswa;
            $nama_mhs = $qr->nama_mhs;
            $nim = $qr->nim;
            $nama_fakultas = $qr->nama_fakultas;
            $nama_prodi = $qr->nama_prodi;
            $nama_jenjang = $qr->nama_jenjang;
            $params['data'] = $nim;
            $params['level'] = 'H';
            $params['size'] = 4;
            $params['savename'] = FCPATH . "uploads/qr_image/" . $nim . 'code.png';
            $this->ciqrcode->generate($params);
            $data = array(
                'id_mahasiswa' => $id_mahasiswa,
                'nim' => $nim,
                'nama_mhs' => $nama_mhs,
                'nama_fakultas' => $nama_fakultas,
                'nama_prodi' => $nama_prodi,
                'nama_jenjang' => $nama_jenjang,
            );
            $this->load->view('genqr/result_v', $data);
        } else {
            $this->load->view('genqr/empty_v');
        }
    }

    // Fungsi untuk menghasilkan QR code untuk semua mahasiswa
    public function generate_all() {
        $all_mahasiswa = $this->gen->get_all_mahasiswa();
        if ($all_mahasiswa->num_rows() > 0) {
            foreach ($all_mahasiswa->result() as $mhs) {
                $id_mahasiswa = isset($mhs->id_mahasiswa) ? $mhs->id_mahasiswa : '';
                $nama_mhs = isset($mhs->nama_mhs) ? $mhs->nama_mhs : '';
                $nim = isset($mhs->nim) ? $mhs->nim : '';
                $nama_fakultas = isset($mhs->nama_fakultas) ? $mhs->nama_fakultas : '';
                $nama_prodi = isset($mhs->nama_prodi) ? $mhs->nama_prodi : '';
                $nama_jenjang = isset($mhs->nama_jenjang) ? $mhs->nama_jenjang : '';
    
                $params['data'] = $nim;
                $params['level'] = 'H';
                $params['size'] = 4;
                $params['savename'] = FCPATH . "uploads/qr_image/" . $nim . 'code.png';
                $this->ciqrcode->generate($params);
            }
            $this->load->view('genqr/result_all_v', ['mahasiswa' => $all_mahasiswa->result()]);
        } else {
            $this->load->view('genqr/empty_v');
        }
    }
    
}



/* End of file Genqr.php */
/* Location: ./application/controllers/Genqr.php */
