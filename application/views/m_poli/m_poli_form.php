<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA M_POLI</h2>
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

                                <tr>
                                    <td width='200'>kdpoli <?php echo form_error('kdpoli') ?></td>
                                    <td><input type="text" class="form-control" name="kdpoli" id="kdpoli" placeholder="kdpoli" value="<?php echo $kdpoli; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Poli <?php echo form_error('poli') ?></td>
                                    <td><input type="text" class="form-control" name="poli" id="poli" placeholder="Poli" value="<?php echo $poli; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Aktif <?php echo form_error('aktif') ?></td>
                                    <td><input type="text" class="form-control" name="aktif" id="aktif" placeholder="Aktif" value="<?php echo $aktif; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <!-- <input type="hidden" name="kdpoli" value="<?php echo $kdpoli; ?>" /> -->
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_poli') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>