<div class="main">

	<div class="container row">


		<div class="cardSearch card">
			<form action="<?php echo site_url().'muzakki/cari'; ?>" method="get">
				<input type="search" name="cari" placeholder="cari info" id="srcMember" class="editInput green-text" value="<?php echo $_GET['cari']?>">
				<button type="submit" name="button" class="btn-flat waves-effect white" id="icSrc"><i class="material-icons medium green-text" id="searc">search</i></button>
			</form>
		</div>

		<div class="col s12 m10 card clear" style="padding:8px;width:100%;margin-top : 9%">
			<?php if (empty($hasil)): ?>
				<h5 class="green-text"><?php echo "hasil cari untuk <u>".$_GET['cari']."</u> tidak di temukan"; ?></h5>
				<a href="<?php echo site_url().'pasien/tambah/'; ?>" class="waves-effect waves-light btn teal " style="padding:0 8px !important"><i class="material-icons left">library_add</i>tambah pasien</a>
				<a href="<?php echo site_url().'pasien/'; ?>" class="waves-effect waves-light btn teal" style="padding:0 8px !important;margin-left:3%"><i class="material-icons left">library_add</i>tampilkan data pasien</a>
			<?php else: ?>

				<?php if (isset($_GET['cari']) && trim(!empty($_GET['cari']))) : ?>
					<h5 class="green-text" style="margin:3% 0">
						<?php echo "hasil cari untuk <u>".$_GET['cari']."</u>"; ?>
						<a href="<?php echo site_url().'pasien/'; ?>" class="waves-effect waves-light btn teal right" style="padding:0 8px !important;margin-left:3%"><i class="material-icons left">library_add</i>tampilkan data pasien</a>
					</h5>

				<?php endif; ?>


			<div class="card-content" style="overflow-x:auto">
				<table class="bordered" style="width:1300px">
					<tr style="background-color:#009688a8;border-radius:0;color:white">
						<th>Nama</th>
						<th>Jenis</th>
						<th>Ras</th>
						<th>Jenis Kelamin</th>
						<th>Warna</th>
						<th>Umur</th>
						<th>Pemilik</th>
						<th>Alamat Pemilik</th>
						<th>Telfon</th>
						<th>Aksi</th>
					</tr>
					<?php foreach ($hasil as $result): ?>
						<tr>
							<td style="text-align:left"><?php echo $result['nama_hewan']; ?></td>
							<td style="text-align:left"><?php echo $result['jenis_hewan']; ?></td>
							<td style="text-align:left"><?php echo $result['ras_hewan']; ?></td>
							<td style="text-align:left"><?php echo $result['sex_hewan']; ?></td>
							<td style="text-align:left"><?php echo $result['warna_hewan']; ?></td>
							<td style="text-align:left"><?php echo $result['umur_hewan']; ?></td>
							<td style="text-align:left"><?php echo $result['nama_pemilik']; ?></td>
							<td style="text-align:left"><?php echo $result['alamat_pemilik']; ?></td>
							<td style="text-align:left"><?php echo $result['telfon_pemilik']; ?></td>
							<td>
								<a href="<?php echo site_url().'pasien/edit/'.$result['id_hewan']; ?>" class="waves-effect waves-light waves-orange  btn-flat" style="padding:0 15px !important"><i class="material-icons">create</i></a>
								<a href="#modal<?php echo $result['id_hewan']; ?>" class="waves-effect waves-light waves-red btn-flat modal-trigger" style="padding:0 15px !important"><i class="material-icons">delete</i></a>
							</td>
						</tr>
						<div id="modal<?php echo $result['id_hewan']; ?>" class="modal">
						    <div class="modal-content">
						      <h4 > Apakah anda yakin ingin menghapus data ? <i class="material-icons red-text">info_outline</i></h4>
						      <p>menghapus data berarti anda tidak dapat mengembalikan data yang telah dimasukkan sebelumnya</p>
						    </div>
						    <div class="modal-footer">
						      <a href="#" class="modal-action modal-close waves-effect waves-orange btn-flat">batal</a>
								<a href="<?php echo site_url().'pasien/hapus/'.$result['id_hewan']; ?>" class="modal-action modal-close waves-effect waves-red btn-flat">hapus</a>
						    </div>
						 </div>
					<?php endforeach; ?>
				<?php endif; ?>
				</table>
			</div>
		</div>

	</div>

</div>
