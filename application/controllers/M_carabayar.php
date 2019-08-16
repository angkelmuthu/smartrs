<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_carabayar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_carabayar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/m_carabayar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/m_carabayar/index/';
            $config['first_url'] = base_url() . 'index.php/m_carabayar/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->M_carabayar_model->total_rows($q);
        $m_carabayar = $this->M_carabayar_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_carabayar_data' => $m_carabayar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','m_carabayar/m_carabayar_list', $data);
    }

    public function read($id)
    {
        $row = $this->M_carabayar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdcarabayar' => $row->kdcarabayar,
		'carabayar' => $row->carabayar,
		'aktif' => $row->aktif,
	    );
            $this->template->load('template','m_carabayar/m_carabayar_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_carabayar'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_carabayar/create_action'),
	    'kdcarabayar' => set_value('kdcarabayar'),
	    'carabayar' => set_value('carabayar'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','m_carabayar/m_carabayar_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'carabayar' => $this->input->post('carabayar',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_carabayar_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_carabayar'));
        }
    }

    public function update($id)
    {
        $row = $this->M_carabayar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_carabayar/update_action'),
		'kdcarabayar' => set_value('kdcarabayar', $row->kdcarabayar),
		'carabayar' => set_value('carabayar', $row->carabayar),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->template->load('template','m_carabayar/m_carabayar_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_carabayar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdcarabayar', TRUE));
        } else {
            $data = array(
		'carabayar' => $this->input->post('carabayar',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_carabayar_model->update($this->input->post('kdcarabayar', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_carabayar'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_carabayar_model->get_by_id($id);

        if ($row) {
            $this->M_carabayar_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_carabayar'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_carabayar'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('carabayar', 'carabayar', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('kdcarabayar', 'kdcarabayar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_carabayar.xls";
        $judul = "m_carabayar";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Carabayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Aktif");

	foreach ($this->M_carabayar_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->carabayar);
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
        header("Content-Disposition: attachment;Filename=m_carabayar.doc");

        $data = array(
            'm_carabayar_data' => $this->M_carabayar_model->get_all(),
            'start' => 0
        );

        $this->load->view('m_carabayar/m_carabayar_doc',$data);
    }

}

/* End of file M_carabayar.php */
/* Location: ./application/controllers/M_carabayar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-16 22:32:59 */
/* http://harviacode.com */