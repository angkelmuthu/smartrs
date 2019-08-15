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
        <h2>M_pegawai List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Tgllhr</th>
		<th>Tmplhr</th>
		<th>Kelamin</th>
		<th>Nip</th>
		<th>Kdgolongan</th>
		<th>Kdpangkat</th>
		<th>Kdjabatan</th>
		<th>Kdstatus</th>
		<th>Kdbidang</th>
		<th>Tglkerja</th>
		
            </tr><?php
            foreach ($m_pegawai_data as $m_pegawai)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $m_pegawai->nama ?></td>
		      <td><?php echo $m_pegawai->tgllhr ?></td>
		      <td><?php echo $m_pegawai->tmplhr ?></td>
		      <td><?php echo $m_pegawai->kelamin ?></td>
		      <td><?php echo $m_pegawai->nip ?></td>
		      <td><?php echo $m_pegawai->kdgolongan ?></td>
		      <td><?php echo $m_pegawai->kdpangkat ?></td>
		      <td><?php echo $m_pegawai->kdjabatan ?></td>
		      <td><?php echo $m_pegawai->kdstatus ?></td>
		      <td><?php echo $m_pegawai->kdbidang ?></td>
		      <td><?php echo $m_pegawai->tglkerja ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>