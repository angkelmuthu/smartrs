<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pendaftaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/pendaftaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/pendaftaran/index/';
            $config['first_url'] = base_url() . 'index.php/pendaftaran/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Pendaftaran_model->total_rows($q);
        $pendaftaran = $this->Pendaftaran_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pendaftaran_data' => $pendaftaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','pendaftaran/t_daftar_list', $data);
    }

    public function read($id)
    {
        $row = $this->Pendaftaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'noreg' => $row->noreg,
		'nomr' => $row->nomr,
		'kddatang' => $row->kddatang,
		'kdpoli' => $row->kdpoli,
		'kddokter' => $row->kddokter,
		'kdbayar' => $row->kdbayar,
		'tglreg' => $row->tglreg,
		'regby' => $row->regby,
	    );
            $this->template->load('template','pendaftaran/t_daftar_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('pendaftaran'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pendaftaran/create_action'),
	    'noreg' => set_value('noreg'),
	    'nomr' => set_value('nomr'),
	    'kddatang' => set_value('kddatang'),
	    'kdpoli' => set_value('kdpoli'),
	    'kddokter' => set_value('kddokter'),
	    'kdbayar' => set_value('kdbayar'),
	    'tglreg' => set_value('tglreg'),
	    'regby' => set_value('regby'),
	);
        $this->template->load('template','pendaftaran/t_daftar_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomr' => $this->input->post('nomr',TRUE),
		'kddatang' => $this->input->post('kddatang',TRUE),
		'kdpoli' => $this->input->post('kdpoli',TRUE),
		'kddokter' => $this->input->post('kddokter',TRUE),
		'kdbayar' => $this->input->post('kdbayar',TRUE),
		'tglreg' => $this->input->post('tglreg',TRUE),
		'regby' => $this->input->post('regby',TRUE),
	    );

            $this->Pendaftaran_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('pendaftaran'));
        }
    }

    public function update($id)
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pendaftaran/update_action'),
		'noreg' => set_value('noreg', $row->noreg),
		'nomr' => set_value('nomr', $row->nomr),
		'kddatang' => set_value('kddatang', $row->kddatang),
		'kdpoli' => set_value('kdpoli', $row->kdpoli),
		'kddokter' => set_value('kddokter', $row->kddokter),
		'kdbayar' => set_value('kdbayar', $row->kdbayar),
		'tglreg' => set_value('tglreg', $row->tglreg),
		'regby' => set_value('regby', $row->regby),
	    );
            $this->template->load('template','pendaftaran/t_daftar_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('pendaftaran'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('noreg', TRUE));
        } else {
            $data = array(
		'nomr' => $this->input->post('nomr',TRUE),
		'kddatang' => $this->input->post('kddatang',TRUE),
		'kdpoli' => $this->input->post('kdpoli',TRUE),
		'kddokter' => $this->input->post('kddokter',TRUE),
		'kdbayar' => $this->input->post('kdbayar',TRUE),
		'tglreg' => $this->input->post('tglreg',TRUE),
		'regby' => $this->input->post('regby',TRUE),
	    );

            $this->Pendaftaran_model->update($this->input->post('noreg', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('pendaftaran'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $this->Pendaftaran_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('pendaftaran'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('pendaftaran'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nomr', 'nomr', 'trim|required');
	$this->form_validation->set_rules('kddatang', 'kddatang', 'trim|required');
	$this->form_validation->set_rules('kdpoli', 'kdpoli', 'trim|required');
	$this->form_validation->set_rules('kddokter', 'kddokter', 'trim|required');
	$this->form_validation->set_rules('kdbayar', 'kdbayar', 'trim|required');
	$this->form_validation->set_rules('tglreg', 'tglreg', 'trim|required');
	$this->form_validation->set_rules('regby', 'regby', 'trim|required');

	$this->form_validation->set_rules('noreg', 'noreg', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_daftar.xls";
        $judul = "t_daftar";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nomr");
	xlsWriteLabel($tablehead, $kolomhead++, "Kddatang");
	xlsWriteLabel($tablehead, $kolomhead++, "Kdpoli");
	xlsWriteLabel($tablehead, $kolomhead++, "Kddokter");
	xlsWriteLabel($tablehead, $kolomhead++, "Kdbayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Tglreg");
	xlsWriteLabel($tablehead, $kolomhead++, "Regby");

	foreach ($this->Pendaftaran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nomr);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kddatang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kdpoli);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kddokter);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kdbayar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tglreg);
	    xlsWriteNumber($tablebody, $kolombody++, $data->regby);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_daftar.doc");

        $data = array(
            't_daftar_data' => $this->Pendaftaran_model->get_all(),
            'start' => 0
        );

        $this->load->view('pendaftaran/t_daftar_doc',$data);
    }

}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-30 17:57:32 */
/* http://harviacode.com */