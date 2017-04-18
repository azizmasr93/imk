 <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Program Kerja
                    <small>Daftar Proker</small>
                </h1>
                
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="<?php echo base_url() ?>home" class="list-group-item">Home</a>
                    <a href="<?php echo base_url() ?>anggota" class="list-group-item ">Anggota</a>
					<a href="<?php echo base_url() ?>proker" class="list-group-item active">Program Kerja</a>
                    <a href="<?php echo base_url() ?>barang" class="list-group-item ">Inventaris Barang</a>
                    
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
               <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               Proker
                            </div><br>
                             <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nama Proker</th>
                                                <th>Deskripsi</th>
												<th>Tujuan</th>
												<th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!isset($list)): ?> 
                                                <div class="alert alert-warning alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                     <div class="fa  fa-info-circle"></div> Tidak Ada Data<br>
                                                </div>
                                            <?php else: ?>
                                                <?php if($this->session->flashdata('message')):?>
                                                    <div class="alert alert-success alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                         <div class="fa  fa-check"></div> <?php echo $this->session->flashdata('message'); ?><br>
                                                    </div>
                                                <?php endif;?>
                                                <?php foreach ($list as $row): ?>
                                                    <tr>
                                                        <td><?php echo $row->namaproker; ?></td> 
                                                        <td><?php echo $row->deskripsi; ?></td>
														<td><?php echo $row->tujuan; ?></td> 														
														
                                      
                                    <!-- karena berbentuk objek, maka kita menggunakan panah (->) untuk menunjuk field yang ada di database -->
                                    
                                                        <td>
                                        <!-- Akan melakukan update atau delete sesuai dengan id yang diberikan ke controller -->
                                                            <a href="<?php echo base_url(); ?>proker/edit_modal/<?php echo $row->id_proker ?>"class="btn btn-outline btn-primary btn-circle" data-lilili="tooltip" data-original-title="Edit Data" data-toggle="modal" data-target="#edit"><div class="fa fa-pencil"></div></a>&nbsp;&nbsp;
                                                           
														   <a href="#" data-toggle="modal" data-target="#hapus" data-id="<?php echo $row->id_proker ?>" data-jenis="proker" class="btn btn-outline btn-primary btn-circle" data-lilili="tooltip" data-original-title="Hapus Data"><div class="fa fa-trash"></div></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <br>
                                    <button type="button" class="btn btn-outline btn-primary" role="button" data-toggle="modal" data-target="#add"><div class="fa fa-plus"> Tambah Data</div></button><br><br>
                                
                                <div class="modal fade" id="edit" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-controls-modal="myModal">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                    </div>
                                  </div>
                                </div>

                                <div class="modal fade" id="hapus" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-controls-modal="myModal">
                                      <div class="modal-dialog">
                                         <div class="modal-content">
                                            <div class="modal-header modal-type-primary">
                                                <h4 class="modal-title">Konfirmasi</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin ingin menghapus ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline btn-primary" data-dismiss="modal">Batal</button>
                                                <a href="#" id="delete" class="btn btn-outline btn-primary">Hapus</a>
                                            </div>
                                      </div>
                                    </div>
                                  </div>

                                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-controls-modal="myModal">
                                  <div class="modal-dialog">
                                     <div class="modal-content">
                                        <div class="row">
                                          <?php echo validation_errors(); ?>
                                        <form method="post" action="<?php echo base_url(); ?>proker/add">
                                       
                                           <div class="col-lg-12">
                                              <div class="modal-header modal-header-primary">
                                                  <h4>Input Proker baru</h4>
                                              </div> 
                                              <div class="modal-body">
                                                 <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-10">
                                                       
                                                            <div class="form-group">
                                                                <div class="col-lg-6">
                                                                    <label>Nama	Proker	:</label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                        
                                                                        <input type="text" name="namaproker" class="form-control" placeholder="Masukkan nama Proker" required>
                                                                </div>
                                                            </div><br>
                                                            
															 <div class="form-group">
                                                                <div class="col-lg-6">
                                                                    <label>Deskripsi 	:</label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                        
                                                                        <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" required>
                                                                </div>
                                                            </div><br>
															
															<div class="form-group">
                                                                <div class="col-lg-6">
                                                                    <label>Tujuan 	:</label>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                        
                                                                        <input type="text" name="tujuan" class="form-control" placeholder="Masukkan Tujuan" required>
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
                                                        <button type="submit" class="btn btn-outline btn-primary"><div class="fa fa-save"></div> Simpan</button>
                                                    </div>
                                                </div> 
                                        </div>
                                      </form>
                                    </div> 
                                  </div>
                                </div>
                              </div>

                            </div>
                        </div>
                    </div>
                </div>
                   
            </div>

        </div>
    </div>