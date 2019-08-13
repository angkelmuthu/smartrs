<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T_daftar List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nomr</th>
		<th>Kddatang</th>
		<th>Kdpoli</th>
		<th>Kddokter</th>
		<th>Kdbayar</th>
		<th>Tglreg</th>
		<th>Regby</th>
		
            </tr><?php
            foreach ($pendaftaran_data as $pendaftaran)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pendaftaran->nomr ?></td>
		      <td><?php echo $pendaftaran->kddatang ?></td>
		      <td><?php echo $pendaftaran->kdpoli ?></td>
		      <td><?php echo $pendaftaran->kddokter ?></td>
		      <td><?php echo $pendaftaran->kdbayar ?></td>
		      <td><?php echo $pendaftaran->tglreg ?></td>
		      <td><?php echo $pendaftaran->regby ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>