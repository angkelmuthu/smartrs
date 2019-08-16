<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_jenisdatang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_jenisdatang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_jenisdatang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_jenisdatang/index/';
            $config['first_url'] = base_url() . 'index.php/m_jenisdatang/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_jenisdatang_model->total_rows($q);
        $m_jenisdatang = $this->M_jenisdatang_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_jenisdatang_data' => $m_jenisdatang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','m_jenisdatang/m_jenisdatang_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_jenisdatang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdjenisdatang' => $row->kdjenisdatang,
		'jenisdatang' => $row->jenisdatang,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_jenisdatang/m_jenisdatang_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_jenisdatang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_jenisdatang/create_action'),
	    'kdjenisdatang' => set_value('kdjenisdatang'),
	    'jenisdatang' => set_value('jenisdatang'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_jenisdatang/m_jenisdatang_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenisdatang' => $this->input->post('jenisdatang',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_jenisdatang_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_jenisdatang'));
        }
    }

    public function update($id)
    {
        $row = $this->M_jenisdatang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_jenisdatang/update_action'),
		'kdjenisdatang' => set_value('kdjenisdatang', $row->kdjenisdatang),
		'jenisdatang' => set_value('jenisdatang', $row->jenisdatang),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_jenisdatang/m_jenisdatang_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_jenisdatang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdjenisdatang', TRUE));
        } else {
            $data = array(
		'jenisdatang' => $this->input->post('jenisdatang',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_jenisdatang_model->update($this->input->post('kdjenisdatang', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_jenisdatang'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_jenisdatang_model->get_by_id($id);

        if ($row) {
            $this->M_jenisdatang_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_jenisdatang'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_jenisdatang'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('jenisdatang', 'jenisdatang', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('kdjenisdatang', 'kdjenisdatang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_jenisdatang.xls";
        $judul = "m_jenisdatang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenisdatang");
	xlsWriteLabel($tablehead, $kolomhead++, "Aktif");

	foreach ($this->M_jenisdatang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenisdatang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->aktif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=m_jenisdatang.doc");

        $data = array(
            'm_jenisdatang_data' => $this->M_jenisdatang_model->get_all(),
            'start' => 0
        );

        $this->load->view('m_jenisdatang/m_jenisdatang_doc',$data);
    }

}

/* End of file M_jenisdatang.php */
/* Location: ./application/controllers/M_jenisdatang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-16 22:35:05 */
/* http://harviacode.com */