<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan</h1>
</div>

<?php
foreach ($aspek as $aspeks){
?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Aspek <?= $aspeks->keterangan?></h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<?php
						$kriteria = $this->Perhitungan_model->get_kriteria($aspeks->id_aspek);
						foreach ($kriteria as $key): ?>
						<th width="8%"><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						
						<?php
							foreach ($kriteria as $key){
						?>
						<td>
						<?php 
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							echo $data_pencocokan['nilai'];
						?>
						</td>
						<?php 
						}
						?>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
}
?>

<?php
foreach ($kriteria as $krit){
?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Pemetaan GAP Aspek <?= $aspeks->keterangan?></h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<?php
						$kriteria = $this->Perhitungan_model->get_kriteria($aspeks->id_aspek);
						foreach ($kriteria as $key): ?>
						<th width="8%"><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						
						<?php
							foreach ($kriteria as $key){
						?>
						<td>
						<?php 
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							echo $data_pencocokan['nilai']-$key->nilai;
						?>
						</td>
						<?php 
						}
						?>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
}
?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Bobot Nilai GAP</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th>Selisih</th>
						<th>Nilai Bobot</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<tr align="center">
						<td>0</td>
						<td>5</td>
						<td>Tidak ada selisih (kompetensi sesuai dgn yg dibutuhkan)</td>
					</tr>
					<tr align="center">
						<td>1</td>
						<td>4.5</td>
						<td>Kompetensi individu kelebihan 1 tingkat</td>
					</tr>
					<tr align="center">
						<td>-1</td>
						<td>4</td>
						<td>Kompetensi individu kekurangan 1 tingkat</td>
					</tr>
					<tr align="center">
						<td>2</td>
						<td>3.5</td>
						<td>Kompetensi individu kelebihan 2 tingkat</td>
					</tr>
					<tr align="center">
						<td>-2</td>
						<td>3</td>
						<td>Kompetensi individu kekurangan 2 tingkat</td>
					</tr>
					<tr align="center">
						<td>3</td>
						<td>2.5</td>
						<td>Kompetensi individu kelebihan 3 tingkat</td>
					</tr>
					<tr align="center">
						<td>-3</td>
						<td>2</td>
						<td>Kompetensi individu kekurangan 3 tingkat</td>
					</tr>
					<tr align="center">
						<td>4</td>
						<td>1.5</td>
						<td>Kompetensi individu kelebihan 4 tingkat</td>
					</tr>
					<tr align="center">
						<td>-4</td>
						<td>1</td>
						<td>Kompetensi individu kekurangan 4 tingkat</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
foreach ($aspek as $aspeks){
?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Pembobotan Aspek <?= $aspeks->keterangan?></h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<?php
						$kriteria = $this->Perhitungan_model->get_kriteria($aspeks->id_aspek);
						foreach ($kriteria as $key): ?>
						<th width="8%"><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						
						<?php
							foreach ($kriteria as $key){
						?>
						<td>
						<?php 
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							$selisih = $data_pencocokan['nilai']-$key->nilai;
							if($selisih == "0"){
								$nilai_bobot = 5;
							}elseif($selisih == "1"){
								$nilai_bobot = 4.5;
							}elseif($selisih == "-1"){
								$nilai_bobot = 4;
							}elseif($selisih == "2"){
								$nilai_bobot = 3.5;
							}elseif($selisih == "-2"){
								$nilai_bobot = 3;
							}elseif($selisih == "3"){
								$nilai_bobot = 2.5;
							}elseif($selisih == "-3"){
								$nilai_bobot = 2;
							}elseif($selisih == "4"){
								$nilai_bobot = 1.5;
							}elseif($selisih == "-4"){
								$nilai_bobot = 1;
							}
							echo $nilai_bobot;
						?>
						</td>
						<?php 
						}
						?>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
}
?>

<?php
foreach ($aspek as $aspeks){
?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Perhitungan Aspek <?= $aspeks->keterangan?></h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<th>Core Factor N<sub>CF</sub>(i)</th>
						<th>Secondary Factor N<sub>SF</sub>(i)</th>
						<th>Nilai Total N(i)</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<td>
						<?php
							$n_cf = $this->Perhitungan_model->data_nilai_cf($keys->id_alternatif,$aspeks->id_aspek);							
							echo $t_cf = $n_cf['t_nilai']/$n_cf['jumlah'];
						?>
						</td>
						<td>
						<?php
							$n_sf = $this->Perhitungan_model->data_nilai_sf($keys->id_alternatif,$aspeks->id_aspek);							
							echo $t_sf = $n_sf['t_nilai']/$n_sf['jumlah'];
						?>
						</td>
						<td>
						<?php
							$bobot_cf = $aspeks->bobot_cf/100;
							$bobot_sf = $aspeks->bobot_sf/100;
							echo ($t_cf*$bobot_cf)+($t_sf*$bobot_sf);
						?>
						</td>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
}
?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Perhitungan Total Semua Aspek</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<?php
						foreach ($aspek as $aspeks): ?>
						<th><?= $aspeks->keterangan ?> (<?= $aspeks->persentase ?>%)</th>
						<?php endforeach ?>
						<th>Nilai Total</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$this->Perhitungan_model->hapus_hasil();
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php
							$total_nilai = 0;
							foreach ($aspek as $aspeks){
								$n_cf = $this->Perhitungan_model->data_nilai_cf($keys->id_alternatif,$aspeks->id_aspek);							
								$n_sf = $this->Perhitungan_model->data_nilai_sf($keys->id_alternatif,$aspeks->id_aspek);							
								$t_cf = $n_cf['t_nilai']/$n_cf['jumlah'];
								$t_sf = $n_sf['t_nilai']/$n_sf['jumlah'];
								$bobot_cf = $aspeks->bobot_cf/100;
								$bobot_sf = $aspeks->bobot_sf/100;
								$persentase= $aspeks->persentase/100;
								$t_aspek = ($t_cf*$bobot_cf)+($t_sf*$bobot_sf);
								$p_aspek = $t_aspek*$persentase;
								$total_nilai += $p_aspek;
								echo "<td>".$t_aspek."</td>";
							}
							$hasil_akhir = [
								'id_alternatif' => $keys->id_alternatif,
								'nilai' => $total_nilai
							];
							$this->Perhitungan_model->insert_hasil($hasil_akhir);
						?>
						<td>
							<?= $total_nilai ?>
						</td>
					</tr>
					<?php
						$no++;
						endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
$this->load->view('layouts/footer_admin');
?>