<div class="row">
	<?php echo $this->session->flashdata('message'); ?>
	<?php echo validation_errors(); ?>
	<form method="post" action="<?php echo base_url(); ?>anggota/update">
		<input type="hidden" name="id" value="<?php echo $anggota->id_anggota;?>">
		<div class="col-lg-12">
				<div class="modal-header modal-header-primary">
				 	<h4> Anggota<h4>
				</div>
	 	 		<div class="modal-body">
	 	 			<h4><center>Edit Data</center></h4><br>
	 	 			<div class="row">
						<div class="col-lg-1"></div>
						<div class="col-lg-10">
        					
								<div class="form-group">
         							<div class="col-lg-6">
										<label> Nama Anggota :</label>
									</div>
									<div class="col-lg-6">
										
                                        	
											<input type="text"  name="nama" value="<?php echo $anggota->nama ?>"  class="form-control" required>
									</div>
									
								</div>
								
								<div class="form-group">
         							<div class="col-lg-6">
										<label> umur :</label>
									</div>
									<div class="col-lg-6">
										
                                        	
											<input type="text"  name="umur" value="<?php echo $anggota->umur ?>"  class="form-control" required>
									</div>
									
								</div>
								
								<div class="form-group">
         							<div class="col-lg-6">
										<label> Pekerjaan :</label>
									</div>
									<div class="col-lg-6">
										
                                        	
											<input type="text"  name="pekerjaan" value="<?php echo $anggota->pekerjaan ?>"  class="form-control" required>
									</div>
									
								</div>
								
								<div class="form-group">
         							<div class="col-lg-6">
										<label> No HP :</label>
									</div>
									<div class="col-lg-6">
										
                                        	
											<input type="text"  name="no_hp" value="<?php echo $anggota->no_hp ?>"  class="form-control" required>
									</div>
									
								</div>
							
						</div>
						<div class="col-lg-1"></div>
					</div>
				</div><br>
				<div class="modal-footer">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <a href="<?php echo base_url(); ?>anggota"><button type="button" class="btn btn-outline btn-primary"><div class="fa fa-angle-double-left"></div> Kembali</button></a>&nbsp;
						<button type="submit" class="btn btn-outline btn-primary"><div class="fa fa-save"> Simpan</div></button>
                    </div>
                </div> 
			</div>
	</form>
</div>