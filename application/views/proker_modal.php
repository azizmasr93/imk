<div class="row">
	<?php echo $this->session->flashdata('message'); ?>
	<?php echo validation_errors(); ?>
	<form method="post" action="<?php echo base_url(); ?>proker/update">
		<input type="hidden" name="id" value="<?php echo $proker->id_proker;?>">
		<div class="col-lg-12">
				<div class="modal-header modal-header-primary">
				 	<h4> Proker<h4>
				</div>
	 	 		<div class="modal-body">
	 	 			<h4><center>Edit Data</center></h4><br>
	 	 			<div class="row">
						<div class="col-lg-1"></div>
						<div class="col-lg-10">
        					
								<div class="form-group">
         							<div class="col-lg-6">
										<label> Nama Proker :</label>
									</div>
									<div class="col-lg-6">
										
                                        	
											<input type="text"  name="namaproker" value="<?php echo $proker->namaproker ?>"  class="form-control" required>
									</div>
									
								</div>
								
								<div class="form-group">
         							<div class="col-lg-6">
										<label> Deskripsi :</label>
									</div>
									<div class="col-lg-6">
										
                                        	
											<input type="text"  name="deskripsi" value="<?php echo $proker->deskripsi ?>"  class="form-control" required>
									</div>
									
								</div>
								
								<div class="form-group">
         							<div class="col-lg-6">
										<label> Tujuan :</label>
									</div>
									<div class="col-lg-6">
										
                                        	
											<input type="text"  name="tujuan" value="<?php echo $proker->tujuan ?>"  class="form-control" required>
									</div>
									
								</div>
								
								
								
							
						</div>
						<div class="col-lg-1"></div>
					</div>
				</div><br>
				<div class="modal-footer">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <a href="<?php echo base_url(); ?>proker"><button type="button" class="btn btn-outline btn-primary"><div class="fa fa-angle-double-left"></div> Kembali</button></a>&nbsp;
						<button type="submit" class="btn btn-outline btn-primary"><div class="fa fa-save"> Simpan</div></button>
                    </div>
                </div> 
			</div>
	</form>
</div>