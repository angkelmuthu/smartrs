<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA T_DAFTAR</h2>
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

	    <tr><td width='200'>Nomr <?php echo form_error('nomr') ?></td><td><input type="text" class="form-control" name="nomr" id="nomr" placeholder="Nomr" value="<?php echo $nomr; ?>" /></td></tr>
	    <tr><td width='200'>Kddatang <?php echo form_error('kddatang') ?></td><td><input type="text" class="form-control" name="kddatang" id="kddatang" placeholder="Kddatang" value="<?php echo $kddatang; ?>" /></td></tr>
	    <tr><td width='200'>Kdpoli <?php echo form_error('kdpoli') ?></td><td><input type="text" class="form-control" name="kdpoli" id="kdpoli" placeholder="Kdpoli" value="<?php echo $kdpoli; ?>" /></td></tr>
	    <tr><td width='200'>Kddokter <?php echo form_error('kddokter') ?></td><td><input type="text" class="form-control" name="kddokter" id="kddokter" placeholder="Kddokter" value="<?php echo $kddokter; ?>" /></td></tr>
	    <tr><td width='200'>Kdbayar <?php echo form_error('kdbayar') ?></td><td><input type="text" class="form-control" name="kdbayar" id="kdbayar" placeholder="Kdbayar" value="<?php echo $kdbayar; ?>" /></td></tr>
	    <tr><td width='200'>Tglreg <?php echo form_error('tglreg') ?></td><td><input type="text" class="form-control" name="tglreg" id="tglreg" placeholder="Tglreg" value="<?php echo $tglreg; ?>" /></td></tr>
	    <tr><td width='200'>Regby <?php echo form_error('regby') ?></td><td><input type="text" class="form-control" name="regby" id="regby" placeholder="Regby" value="<?php echo $regby; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="noreg" value="<?php echo $noreg; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pendaftaran') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>