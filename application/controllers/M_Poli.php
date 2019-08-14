<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Poli extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_Poli_Model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_poli/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_poli/index/';
            $config['first_url'] = base_url() . 'index.php/m_poli/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_Poli_Model->total_rows($q);
        $m_poli = $this->M_Poli_Model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_poli_data' => $m_poli,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'm_poli/m_poli_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_Poli_Model->get_by_id($id);
        if ($row) {
            $data = array(
                'kdpoli' => $row->kdpoli,
                'poli' => $row->poli,
                'aktif' => $row->aktif,
            );
            $this->template->load('template', 'm_poli/m_poli_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_poli'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_poli/create_action'),
            'kdpoli' => set_value('kdpoli'),
            'poli' => set_value('poli'),
            'aktif' => set_value('aktif'),
        );
        $this->template->load('template', 'm_poli/m_poli_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kdpoli' => $this->input->post('kdpoli', TRUE),
                'poli' => $this->input->post('poli', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->M_Poli_Model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_poli'));
        }
    }

    public function update($id)
    {
        $row = $this->M_Poli_Model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_poli/update_action'),
                'kdpoli' => set_value('kdpoli', $row->kdpoli),
                'poli' => set_value('poli', $row->poli),
                'aktif' => set_value('aktif', $row->aktif),
            );
            $this->template->load('template', 'm_poli/m_poli_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_poli'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdpoli', TRUE));
        } else {
            $data = array(
                'poli' => $this->input->post('poli', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );

            $this->M_Poli_Model->update($this->input->post('kdpoli', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_poli'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_Poli_Model->get_by_id($id);

        if ($row) {
            $this->M_Poli_Model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_poli'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_poli'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('poli', 'poli', 'trim|required');
        $this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

        $this->form_validation->set_rules('kdpoli', 'kdpoli', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_poli.xls";
        $judul = "m_poli";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Poli");
        xlsWriteLabel($tablehead, $kolomhead++, "Aktif");

        foreach ($this->M_Poli_Model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->poli);
            xlsWriteNumber($tablebody, $kolombody++, $data->aktif);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=m_poli.doc");

        $data = array(
            'm_poli_data' => $this->M_Poli_Model->get_all(),
            'start' => 0
        );

        $this->load->view('m_poli/m_poli_doc', $data);
    }
}

/* End of file M_Poli.php */
/* Location: ./application/controllers/M_Poli.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-14 23:36:32 */
/* http://harviacode.com */
