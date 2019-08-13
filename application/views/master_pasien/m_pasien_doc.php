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
        <h2>M_pasien List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Nik</th>
		<th>Nocard</th>
		<th>Alamat</th>
		
            </tr><?php
            foreach ($master_pasien_data as $master_pasien)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $master_pasien->nama ?></td>
		      <td><?php echo $master_pasien->nik ?></td>
		      <td><?php echo $master_pasien->nocard ?></td>
		      <td><?php echo $master_pasien->alamat ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>