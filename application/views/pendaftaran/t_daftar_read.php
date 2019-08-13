<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>T_daftar Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>Nomr</td><td><?php echo $nomr; ?></td></tr>
	    <tr><td>Kddatang</td><td><?php echo $kddatang; ?></td></tr>
	    <tr><td>Kdpoli</td><td><?php echo $kdpoli; ?></td></tr>
	    <tr><td>Kddokter</td><td><?php echo $kddokter; ?></td></tr>
	    <tr><td>Kdbayar</td><td><?php echo $kdbayar; ?></td></tr>
	    <tr><td>Tglreg</td><td><?php echo $tglreg; ?></td></tr>
	    <tr><td>Regby</td><td><?php echo $regby; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pendaftaran') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>