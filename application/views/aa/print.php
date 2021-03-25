<h2><center>Data Anggota</center></h2>
<hr/>
<table border="0.2" width="100%" style="text-align:center;">
	<tr>
    <th>No</th>
    <th>NIS</th>
    <th>Nama Anggota</th>
    <th>Kelas</th>
    <th>Jenis Kelamin</th>
	</tr>
	<?php 
	$no = 1;
	foreach($anggota as $ag)
	{
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $ag->nis; ?></td>
			<td><?php echo $ag->nama; ?></td>
			<td><?php echo $ag->jenis_kelamin; ?></td>
		</tr>
		<?php
	}
	?>
</table>