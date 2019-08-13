<?php

$string = "<main id=\"js-page-content\" role=\"main\" class=\"page-content\">
<div class=\"row\">
    <div class=\"col-xl-12\">
        <div id=\"panel-1\" class=\"panel\">
            <div class=\"panel-hdr\">
                <h2>INPUT DATA " .  strtoupper($table_name) . "</h2>
                <div class=\"panel-toolbar\">
                    <button class=\"btn btn-panel\" data-action=\"panel-collapse\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Collapse\"></button>
                    <button class=\"btn btn-panel\" data-action=\"panel-fullscreen\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Fullscreen\"></button>
                    <button class=\"btn btn-panel\" data-action=\"panel-close\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Close\"></button>
                </div>
            </div>
            <div class=\"panel-container show\">
                <div class=\"panel-content\">
            <form action=\"<?php echo \$action; ?>\" method=\"post\">

<table class='table table-striped'>
";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text') {
        $string .= "\n\t
        <tr><td width='200'>" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></td><td> <textarea class=\"form-control\" rows=\"3\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\"><?php echo $" . $row["column_name"] . "; ?></textarea></td></tr>";
    } elseif ($row["data_type"] == 'email') {
        $string .= "\n\t    <tr><td width='200'>" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></td><td><input type=\"email\" class=\"form-control\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\" value=\"<?php echo $" . $row["column_name"] . "; ?>\" /></td></tr>";
    } elseif ($row["data_type"] == 'date') {
        $string .= "\n\t    <tr><td width='200'>" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></td><td><input type=\"date\" class=\"form-control\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\" value=\"<?php echo $" . $row["column_name"] . "; ?>\" /></td></tr>";
    } else {
        $string .= "\n\t    <tr><td width='200'>" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></td><td><input type=\"text\" class=\"form-control\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\" value=\"<?php echo $" . $row["column_name"] . "; ?>\" /></td></tr>";
    }
}
$string .= "\n\t    <tr><td></td><td><input type=\"hidden\" name=\"" . $pk . "\" value=\"<?php echo $" . $pk . "; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-warning waves-effect waves-themed\"><i class=\"fal fa-save\"></i> <?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('" . $c_url . "') ?>\" class=\"btn btn-info waves-effect waves-themed\"><i class=\"fal fa-sign-out\"></i> Kembali</a></td></tr>";
$string .= "\n\t</table></form>        </div>
</div>

            </div>
        </div>
    </div>
</main>
<script src=\"<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js\"></script>
<script src=\"<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js\"></script>";

$hasil_view_form = createFile($string, $target . "views/" . $c_url . "/" . $v_form_file);
