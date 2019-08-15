<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_pegawai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_pegawai/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_pegawai/index/';
            $config['first_url'] = base_url() . 'index.php/m_pegawai/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_pegawai_model->total_rows($q);
        $m_pegawai = $this->M_pegawai_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_pegawai_data' => $m_pegawai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'm_pegawai/m_pegawai_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_pegawai_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idpeg' => $row->idpeg,
                'nama' => $row->nama,
                'tgllhr' => $row->tgllhr,
                'tmplhr' => $row->tmplhr,
                'kelamin' => $row->kelamin,
                'nip' => $row->nip,
                'kdgolongan' => $row->kdgolongan,
                'kdpangkat' => $row->kdpangkat,
                'kdjabatan' => $row->kdjabatan,
                'kdstatus' => $row->kdstatus,
                'kdbidang' => $row->kdbidang,
                'tglkerja' => $row->tglkerja,
            );
            $this->template->load('template', 'm_pegawai/m_pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_pegawai'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_pegawai/create_action'),
            'idpeg' => set_value('idpeg'),
            'nama' => set_value('nama'),
            'tgllhr' => set_value('tgllhr'),
            'tmplhr' => set_value('tmplhr'),
            'kelamin' => set_value('kelamin'),
            'nip' => set_value('nip'),
            'kdgolongan' => set_value('kdgolongan'),
            'kdpangkat' => set_value('kdpangkat'),
            'kdjabatan' => set_value('kdjabatan'),
            'kdstatus' => set_value('kdstatus'),
            'kdbidang' => set_value('kdbidang'),
            'tglkerja' => set_value('tglkerja'),
        );
        $this->template->load('template', 'm_pegawai/m_pegawai_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'tgllhr' => $this->input->post('tgllhr', TRUE),
                'tmplhr' => $this->input->post('tmplhr', TRUE),
                'kelamin' => $this->input->post('kelamin', TRUE),
                'nip' => $this->input->post('nip', TRUE),
                'kdgolongan' => $this->input->post('kdgolongan', TRUE),
                'kdpangkat' => $this->input->post('kdpangkat', TRUE),
                'kdjabatan' => $this->input->post('kdjabatan', TRUE),
                'kdstatus' => $this->input->post('kdstatus', TRUE),
                'kdbidang' => $this->input->post('kdbidang', TRUE),
                'tglkerja' => $this->input->post('tglkerja', TRUE),
            );

            $this->M_pegawai_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_pegawai'));
        }
    }

    public function update($id)
    {
        $row = $this->M_pegawai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_pegawai/update_action'),
                'idpeg' => set_value('idpeg', $row->idpeg),
                'nama' => set_value('nama', $row->nama),
                'tgllhr' => set_value('tgllhr', $row->tgllhr),
                'tmplhr' => set_value('tmplhr', $row->tmplhr),
                'kelamin' => set_value('kelamin', $row->kelamin),
                'nip' => set_value('nip', $row->nip),
                'kdgolongan' => set_value('kdgolongan', $row->kdgolongan),
                'kdpangkat' => set_value('kdpangkat', $row->kdpangkat),
                'kdjabatan' => set_value('kdjabatan', $row->kdjabatan),
                'kdstatus' => set_value('kdstatus', $row->kdstatus),
                'kdbidang' => set_value('kdbidang', $row->kdbidang),
                'tglkerja' => set_value('tglkerja', $row->tglkerja),
            );
            $this->template->load('template', 'm_pegawai/m_pegawai_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_pegawai'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idpeg', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'tgllhr' => $this->input->post('tgllhr', TRUE),
                'tmplhr' => $this->input->post('tmplhr', TRUE),
                'kelamin' => $this->input->post('kelamin', TRUE),
                'nip' => $this->input->post('nip', TRUE),
                'kdgolongan' => $this->input->post('kdgolongan', TRUE),
                'kdpangkat' => $this->input->post('kdpangkat', TRUE),
                'kdjabatan' => $this->input->post('kdjabatan', TRUE),
                'kdstatus' => $this->input->post('kdstatus', TRUE),
                'kdbidang' => $this->input->post('kdbidang', TRUE),
                'tglkerja' => $this->input->post('tglkerja', TRUE),
            );

            $this->M_pegawai_model->update($this->input->post('idpeg', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_pegawai'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_pegawai_model->get_by_id($id);

        if ($row) {
            $this->M_pegawai_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_pegawai'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_pegawai'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('tgllhr', 'tgllhr', 'trim|required');
        $this->form_validation->set_rules('tmplhr', 'tmplhr', 'trim|required');
        $this->form_validation->set_rules('kelamin', 'kelamin', 'trim|required');
        // $this->form_validation->set_rules('nip', 'nip', 'trim|required');
        // $this->form_validation->set_rules('kdgolongan', 'kdgolongan', 'trim|required');
        // $this->form_validation->set_rules('kdpangkat', 'kdpangkat', 'trim|required');
        // $this->form_validation->set_rules('kdjabatan', 'kdjabatan', 'trim|required');
        $this->form_validation->set_rules('kdstatus', 'kdstatus', 'trim|required');
        $this->form_validation->set_rules('kdbidang', 'kdbidang', 'trim|required');
        $this->form_validation->set_rules('tglkerja', 'tglkerja', 'trim|required');

        $this->form_validation->set_rules('idpeg', 'idpeg', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_pegawai.xls";
        $judul = "m_pegawai";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Tgllhr");
        xlsWriteLabel($tablehead, $kolomhead++, "Tmplhr");
        xlsWriteLabel($tablehead, $kolomhead++, "Kelamin");
        xlsWriteLabel($tablehead, $kolomhead++, "Nip");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdgolongan");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdpangkat");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdjabatan");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdstatus");
        xlsWriteLabel($tablehead, $kolomhead++, "Kdbidang");
        xlsWriteLabel($tablehead, $kolomhead++, "Tglkerja");

        foreach ($this->M_pegawai_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgllhr);
            xlsWriteLabel($tablebody, $kolombody++, $data->tmplhr);
            xlsWriteNumber($tablebody, $kolombody++, $data->kelamin);
            xlsWriteLabel($tablebody, $kolombody++, $data->nip);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdgolongan);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdpangkat);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdjabatan);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdstatus);
            xlsWriteNumber($tablebody, $kolombody++, $data->kdbidang);
            xlsWriteLabel($tablebody, $kolombody++, $data->tglkerja);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=m_pegawai.doc");

        $data = array(
            'm_pegawai_data' => $this->M_pegawai_model->get_all(),
            'start' => 0
        );

        $this->load->view('m_pegawai/m_pegawai_doc', $data);
    }
}

/* End of file M_pegawai.php */
/* Location: ./application/controllers/M_pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-15 12:02:04 */
/* http://harviacode.com */
