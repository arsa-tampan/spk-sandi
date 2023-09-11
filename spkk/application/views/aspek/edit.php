<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Aspek</h1>

	<a href="<?= base_url('Aspek'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Edit Data Aspek</h6>
    </div>
	
	<?php echo form_open('Aspek/update/'.$aspek->id_aspek); ?>
		<div class="card-body">
			<div class="row">
				<?php echo form_hidden('id_aspek', $aspek->id_aspek) ?>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Kode Aspek</label>
					<input autocomplete="off" type="text" name="kode_aspek" value="<?php echo $aspek->kode_aspek ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Aspek</label>
					<input autocomplete="off" type="text" name="keterangan" value="<?php echo $aspek->keterangan ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Persentase (%)</label>
					<input autocomplete="off" type="number" name="persentase" value="<?php echo $aspek->persentase ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Bobot Core Factor (%)</label>
					<input autocomplete="off" type="number" name="bobot_cf" required value="<?php echo $aspek->bobot_cf ?>" class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Bobot Secondary Factor (%)</label>
					<input autocomplete="off" type="number" name="bobot_sf" required value="<?php echo $aspek->bobot_sf ?>" class="form-control"/>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	<?php echo form_close() ?>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>