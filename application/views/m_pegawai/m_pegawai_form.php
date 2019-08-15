<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA M_PEGAWAI</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
            <form action="<?php echo $action; ?>" method="post">

<table class='table table-striped'>

	    <tr><td width='200'>Nama <?php echo form_error('nama') ?></td><td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td></tr>
	    <tr><td width='200'>Tgllhr <?php echo form_error('tgllhr') ?></td><td><input type="date" class="form-control" name="tgllhr" id="tgllhr" placeholder="Tgllhr" value="<?php echo $tgllhr; ?>" /></td></tr>
	    <tr><td width='200'>Tmplhr <?php echo form_error('tmplhr') ?></td><td><input type="text" class="form-control" name="tmplhr" id="tmplhr" placeholder="Tmplhr" value="<?php echo $tmplhr; ?>" /></td></tr>
	    <tr><td width='200'>Kelamin <?php echo form_error('kelamin') ?></td><td><input type="text" class="form-control" name="kelamin" id="kelamin" placeholder="Kelamin" value="<?php echo $kelamin; ?>" /></td></tr>
	    <tr><td width='200'>Nip <?php echo form_error('nip') ?></td><td><input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" /></td></tr>
	    <tr><td width='200'>Kdgolongan <?php echo form_error('kdgolongan') ?></td><td><input type="text" class="form-control" name="kdgolongan" id="kdgolongan" placeholder="Kdgolongan" value="<?php echo $kdgolongan; ?>" /></td></tr>
	    <tr><td width='200'>Kdpangkat <?php echo form_error('kdpangkat') ?></td><td><input type="text" class="form-control" name="kdpangkat" id="kdpangkat" placeholder="Kdpangkat" value="<?php echo $kdpangkat; ?>" /></td></tr>
	    <tr><td width='200'>Kdjabatan <?php echo form_error('kdjabatan') ?></td><td><input type="text" class="form-control" name="kdjabatan" id="kdjabatan" placeholder="Kdjabatan" value="<?php echo $kdjabatan; ?>" /></td></tr>
	    <tr><td width='200'>Kdstatus <?php echo form_error('kdstatus') ?></td><td><input type="text" class="form-control" name="kdstatus" id="kdstatus" placeholder="Kdstatus" value="<?php echo $kdstatus; ?>" /></td></tr>
	    <tr><td width='200'>Kdbidang <?php echo form_error('kdbidang') ?></td><td><input type="text" class="form-control" name="kdbidang" id="kdbidang" placeholder="Kdbidang" value="<?php echo $kdbidang; ?>" /></td></tr>
	    <tr><td width='200'>Tglkerja <?php echo form_error('tglkerja') ?></td><td><input type="date" class="form-control" name="tglkerja" id="tglkerja" placeholder="Tglkerja" value="<?php echo $tglkerja; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="idpeg" value="<?php echo $idpeg; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_pegawai') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>