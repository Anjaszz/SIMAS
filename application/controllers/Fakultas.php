<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Fakultas
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Jeff Maruli<jefrimaruli@gmail.com>
 * @link      https://github.com/xietsunzao/
 * @param     ...
 * @return    ...
 *
 */

class Fakultas extends CI_Controller
{

    /**
     * __construct.
     *
     * @author	Jeff Maruli <jefrimaruli@gmail.com>
     * @since	v0.0.1
     * @version	v1.0.0	Monday, November 18th, 2019.
     * @access	public
     * @return	void
     */
    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('Fakultas_model', 'fakultas');
    }

    /**
     * index.
     *
     * @author	Jeff Maruli <jefrimaruli@gmail.com>
     * @since	v0.0.1
     * @version	v1.0.0	Monday, November 18th, 2019.
     * @access	public
     * @return	void
     */
    public function index()
    {
        /**
         * @var		string	$title
         */
        $title = 'Data Fakultas';
        /**
         * @var		mixed	$this->fakultas->get_data()
         */
        $loaddata = $this->fakultas->get_data();
        /**
         * @var		mixed	$data
         */
        $data = array(
            'title' => $title,
            'fakultas' => $loaddata,
        );
        $this->template->load('template/template_v', 'fakultas/fakultas_v', $data);
    }

    /**
     * detail.
     *
     * @author	Jeff Maruli <jefrimaruli@gmail.com>
     * @since	v0.0.1
     * @version	v1.0.0	Sunday, November 24th, 2019.
     * @access	public
     * @param	mixed	$id	Default: NULL
     * @return	void
     */
    public function detail($id = NULL)
    {
        /**
         * @var		mixed	$this->uri->segment(3)
         */
        $id = $this->uri->segment(3);
        /**
         * @var		mixed	$this->fakultas->get_row()
         */
        $get_row = $this->fakultas->get_row($id);
        if ($get_row->num_rows() > 0) {
            /**
             * GET ROW
             *
             * @var		mixed	$get_row->row()
             */
            $row = $get_row->row();
            /**
             * @var		mixed	$get_row->result()
             */
            $fakultas = $get_row->result();
            /**
             * @var		mixed	$row->id_mahasiswa
             */
            $id_mahasiswa = $row->id_mahasiswa;
            /**
             * @var		mixed	$row->nim
             */
            $nim = $row->nim;
            /**
             * @var		mixed	$row->nama_mhs
             */
            $nama_mhs = $row->nama_mhs;
            /**
             * @var		mixed	$row->email
             */
            $email = $row->email;
            /**
             * @var		mixed	$row->no_telp
             */
            $no_telp = $row->no_telp;
            /**
             * @var		mixed	$row->id_fakultas
             */
            $id_fakultas = $row->id_fakultas;
            /**
             * @var		mixed	$row->id_prodi
             */
            $id_prodi = $row->id_prodi;
            /**
             * @var		mixed	$row->id_jenjang
             */
            $id_jenjang = $row->id_jenjang;
            /**
             * @var		mixed	$row->nama_fakultas
             */
            $nama_fakultas = $row->nama_fakultas;
            /**
             * @var		mixed	$row->nama_prodi
             */
            $nama_prodi = $row->nama_prodi;
            /**
             * @var		mixed	$row->nama_jenjang
             */
            $nama_jenjang = $row->nama_jenjang;
            /**
             * @var		mixed	$row->kode_fakultas
             */
            $kode_fakultas = $row->kode_fakultas;
            /**
             * @var		mixed	$row->kode_prodi
             */
            $kode_prodi = $row->kode_prodi;
            /**
             * @var		mixed	$row->kode_jenjang
             */
            $kode_jenjang = $row->kode_jenjang;

            /**
             * @var		string	$title
             */
            $title = "Detail {$nama_fakultas}";
            /**
             * @var		mixed	$data
             */
            $data = array(
                'id_mahasiswa' => $id_mahasiswa,
                'nim' => $nim,
                'nama_mhs' => $nama_mhs,
                'email' => $email,
                'no_telp' => $no_telp,
                'id_fakultas' => $id_fakultas,
                'id_prodi' => $id_prodi,
                'id_jenjang' => $id_jenjang,
                'nama_fakultas' => $nama_fakultas,
                'nama_prodi' => $nama_prodi,
                'nama_jenjang' => $nama_jenjang,
                'kode_fakultas' => $kode_fakultas,
                'kode_prodi' => $kode_prodi,
                'kode_jenjang' => $kode_jenjang,
                'title' => $title,
                'fakultas' => $fakultas,
            );
            $this->template->load('template/template_v', 'fakultas/fakultas_d', $data);
        } else {
            /**
             * @var		mixed	$this->session->set_flashdata('warning'
             *//**
             * @var		mixed	!')
             */
            $this->session->set_flashdata('warning', 'Data masih kosong!');
            /**
             * @var		mixed	redirect('fakultas')
             */
            redirect('fakultas');
        }
    }
}


/* End of file Fakultas.php */
/* Location: ./application/controllers/Fakultas.php */
