<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>M_pegawai Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Tgllhr</td><td><?php echo $tgllhr; ?></td></tr>
	    <tr><td>Tmplhr</td><td><?php echo $tmplhr; ?></td></tr>
	    <tr><td>Kelamin</td><td><?php echo $kelamin; ?></td></tr>
	    <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
	    <tr><td>Kdgolongan</td><td><?php echo $kdgolongan; ?></td></tr>
	    <tr><td>Kdpangkat</td><td><?php echo $kdpangkat; ?></td></tr>
	    <tr><td>Kdjabatan</td><td><?php echo $kdjabatan; ?></td></tr>
	    <tr><td>Kdstatus</td><td><?php echo $kdstatus; ?></td></tr>
	    <tr><td>Kdbidang</td><td><?php echo $kdbidang; ?></td></tr>
	    <tr><td>Tglkerja</td><td><?php echo $tglkerja; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('m_pegawai') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>