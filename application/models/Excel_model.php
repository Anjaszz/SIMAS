<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Excel_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        require_once APPPATH.'vendor/autoload.php';
    }

    public function upload_and_import($file_path) {
        $spreadsheet = IOFactory::load($file_path);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        foreach ($sheetData as $row) {
            $data = array(
                'name' => $row['A'],
                'email' => $row['B'],
                'age' => $row['C']
            );
            $this->db->insert('employees', $data);
        }
    }

}
