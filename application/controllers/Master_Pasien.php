<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_Pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Master_Pasien_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/master_pasien/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/master_pasien/index/';
            $config['first_url'] = base_url() . 'index.php/master_pasien/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Master_Pasien_model->total_rows($q);
        $master_pasien = $this->Master_Pasien_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'master_pasien_data' => $master_pasien,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'master_pasien/m_pasien_list', $data);
    }

    public function read($id)
    {
        $row = $this->Master_Pasien_model->get_by_id($id);
        if ($row) {
            $data = array(
                'nomr' => $row->nomr,
                'nama' => $row->nama,
                'nik' => $row->nik,
                'nocard' => $row->nocard,
                'alamat' => $row->alamat,
            );
            $this->template->load('template', 'master_pasien/m_pasien_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('master_pasien'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_pasien/create_action'),
            'nomr' => set_value('nomr'),
            'nama' => set_value('nama'),
            'nik' => set_value('nik'),
            'nocard' => set_value('nocard'),
            'alamat' => set_value('alamat'),
        );
        $this->template->load('template', 'master_pasien/m_pasien_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nomr' => $this->input->post('nomr', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'nik' => $this->input->post('nik', TRUE),
                'nocard' => $this->input->post('nocard', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
            );

            $this->Master_Pasien_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('master_pasien'));
        }
    }

    public function update($id)
    {
        $row = $this->Master_Pasien_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_pasien/update_action'),
                'nomr' => set_value('nomr', $row->nomr),
                'nama' => set_value('nama', $row->nama),
                'nik' => set_value('nik', $row->nik),
                'nocard' => set_value('nocard', $row->nocard),
                'alamat' => set_value('alamat', $row->alamat),
            );
            $this->template->load('template', 'master_pasien/m_pasien_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('master_pasien'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nomr', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'nik' => $this->input->post('nik', TRUE),
                'nocard' => $this->input->post('nocard', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
            );

            $this->Master_Pasien_model->update($this->input->post('nomr', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('master_pasien'));
        }
    }

    public function delete($id)
    {
        $row = $this->Master_Pasien_model->get_by_id($id);

        if ($row) {
            $this->Master_Pasien_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('master_pasien'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('master_pasien'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        // $this->form_validation->set_rules('nik', 'nik', 'trim|required');
        // $this->form_validation->set_rules('nocard', 'nocard', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

        $this->form_validation->set_rules('nomr', 'nomr', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_pasien.xls";
        $judul = "m_pasien";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Nik");
        xlsWriteLabel($tablehead, $kolomhead++, "Nocard");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");

        foreach ($this->Master_Pasien_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->nik);
            xlsWriteLabel($tablebody, $kolombody++, $data->nocard);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=m_pasien.doc");

        $data = array(
            'm_pasien_data' => $this->Master_Pasien_model->get_all(),
            'start' => 0
        );

        $this->load->view('master_pasien/m_pasien_doc', $data);
    }
}

/* End of file Master_Pasien.php */
/* Location: ./application/controllers/Master_Pasien.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-30 15:44:28 */
/* http://harviacode.com */
