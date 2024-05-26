<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Controller Home
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Jeff Maruli <jefrimaruli@gmail.com>
 * @link      https://github.com/xietsunzao/
 * @param     ...
 * @return    ...
 *
 */

class Home extends CI_Controller
{

    /**
     * __construct.
     *
     * @author	Jeff Maruli <jefrimaruli@gmail.com>
     * @since	v0.0.1
     * @version	v1.0.0	Monday, November 18th, 2019.	
     * @version	v1.0.1	Monday, November 25th, 2019.
     * @access	public
     * @return	void
     */
    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('Home_Model', 'home');
    }

    /**
     * index.
     *
     * @author	Jeff Maruli <jefrimaruli@gmail.com>
     * @since	v0.0.1
     * @version	v1.0.1	Monday, November 18th, 2019.	
     * @version	v1.0.2	Thursday, November 21st, 2019.
     * @access	public
     * @return	void
     */
    public function index()
    {
        $title = 'Home';
        $mahasiswa = anchor('mahasiswa', 'Data Mahasiswa');
        $fakultas = anchor('fakultas', 'Data Fakultas');
        $prodi = anchor('prodi', 'Data Prodi');
        $jenjang = anchor('jenjang', 'Data Jenjang');
        $box = $this->info_box();
        $data = array(
            'mahasiswa' => $mahasiswa,
            'fakultas' => $fakultas,
            'prodi' => $prodi,
            'jenjang' => $jenjang,
            'title' => $title,
            'box' => $box,
        );
        $this->template->load('template/template_v', 'home/home_v', $data);
    }

    public function info_box()
    {
        $box = [
            [
                'color'         => 'facebook',
                'total'     => $this->home->total('mahasiswa'),
                'title'        => 'Total Mahasiswa',
                'icon'        => 'users',
                'link' => site_url('mahasiswa')
            ],
            [
                'color'         => 'success',
                'total'     => $this->home->total('fakultas'),
                'title'        => 'Total Fakultas',
                'icon'        => 'poll',
                'link' => site_url('fakultas')
            ],
            [
                'color'         => 'warning',
                'total'     => $this->home->total('prodi'),
                'title'        => 'Total Prodi',
                'icon'        => 'book',
                'link' => site_url('prodi')
            ],
            [
                'color'         => 'googleplus',
                'total'     => $this->home->total('seminar'),
                'title'        => 'Total Seminar',
                'icon'        => 'layer-group',
                'link' => site_url('seminar')
            ],
        ];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
