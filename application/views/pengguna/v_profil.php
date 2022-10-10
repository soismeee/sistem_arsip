   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1>Profile</h1>
           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
               <li class="breadcrumb-item active">Profil </li>
             </ol>
           </div>
         </div>
       </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-3">

             <!-- Profile Image -->
             <div class="card card-primary card-outline">
               <div class="card-body box-profile">
                 <div class="text-center">
                   <img class="profile-user-img img-fluid img-circle" width="10px" height="100px" src="<?php echo base_url(); ?>assets/images/foto/<?php echo $this->session->userdata('foto') ?>">
                 </div>

                 <h3 class="profile-username text-center"><?php echo $_SESSION['nama']; ?></h3>

                 <p class="text-muted text-center"><?php echo $this->session->userdata('username') ?></p>

                 <ul class="list-group list-group-unbordered mb-3">
                   <li class="list-group-item">
                     <b>Level</b> <a class="float-right"><?php echo $this->session->userdata('level') ?></a><br>
                     <b>Jabatan</b> <a class="float-right"><?php echo $this->session->userdata('jabatan') ?></a>
                   </li>
                 </ul>

                 <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bs-example-modal-sm"><b>Edit Picture</b></a>
               </div>
               <!-- /.card-body -->
             </div>
             <!-- /.card -->
           </div>
           <!-- /.col -->
           <div class="col-md-9">
             <div class="card">
               <div class="card-header p-2">
                 <ul class="nav nav-pills">
                   <li class="nav-item"><a class="nav-link active" href="#setting" data-toggle="tab">Setting</a></li>
                 </ul>
               </div><!-- /.card-header -->
               <div class="card-body">
                 <div class="tab-content">
                   <div class="active tab-pane" id="setting">
                     <form class="form-horizontal" action="<?php echo base_url(); ?>dashboard/update_username" method="POST">
                       <div class="form-group row">
                         <label for="inputName2" class="col-sm-2 col-form-label">NIP</label>
                         <div class="col-sm-10">
                           <input type="hidden" name="id" value="<?php echo $this->session->userdata('id') ?>">
                           <input type="text" class="form-control" name="username" value="<?php echo $this->session->userdata('username') ?>">
                           <?php echo form_error('username'); ?>
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" name="nama" value="<?php echo $this->session->userdata('nama') ?>">
                           <?php echo form_error('nama'); ?>
                         </div>
                       </div>
                       <div class="form-group row">
                         <div class="offset-sm-2 col-sm-10">
                           <button type="submit" class="btn btn-primary">Simpan</button>
                           <a href="<?= base_url('Dashboard');  ?>" class="btn btn-danger">Batal</a>
                         </div>
                       </div>
                     </form>
                   </div>
                 </div>
                 <!-- /.tab-content -->
               </div><!-- /.card-body -->
             </div>
             <!-- /.nav-tabs-custom -->
           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->
         <!-- modal untuk edit foto -->
         <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
           <div class="modal-dialog modal-md">
             <div class="modal-content">
               <div class="modal-header bg-primary">
                 <h5 class="modal-title" id="mySmallModalLabel">Edit Foto Profil</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               </div>
               <div class="modal-body">
                 <form action="<?php echo base_url(); ?>Dashboard/ganti_foto" method="post" enctype="multipart/form-data">
                   <div>
                     <input type="hidden" name="id" value="<?= $this->session->userdata('id') ?>">
                     <input type="file" name="foto" class="form-control">
                   </div>
                   <div class="modal-footer">
                     <a href="#" class="btn btn-danger" data-dismiss="modal">Batal</a>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                   </div>
                 </form>
               </div>
             </div><!-- /.modal-content -->
           </div><!-- /.modal-dialog -->
         </div><!-- /.modal -->
       </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->