<div class="app-content">
   <div class="section">
      <!--  Page-header opened -->
      <div class="page-header">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Users</li>
         </ol>
         <div class="mt-3 mt-lg-0">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
               <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back </button>
               <a href="<?php echo site_url('users');?>">
               <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-list "></i> List Users </button>
               </a>
            </div>
         </div>
      </div>
      <!--  Page-header closed -->
      <!-- row opened -->
      <div class="row">
         <div class="col-md-12 col-lg-12">
            <div class="card">
               <div class="card-header">
                  <div class="card-title">Add New User</div>
                  <div class="card-options"> <a href="javascript:void(0)" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a> </div>
               </div>
               <div class="card-body">
                  <?php 
                     $LastInsertedID = substr($users->mst_ref_id, 3,5);
                     $reffrence = 'MST'.str_pad($LastInsertedID+1, 5,'0',STR_PAD_LEFT);                           
                     ?><?php $msg=$this->session->flashdata('msg');  
                     if($msg){  ?>
                  <div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert">  <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">??</span> </button> </div>
                  <?php }?>
                  <?php if($admin->mst_role==0){?>
                  <form id="admin_users" action="" method="post" >
                     <input type="hidden" class="form-control" name="mst_ref_id" value="<?=$reffrence;?>">      
                     <div class="row">
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group"> 
                              <label>Full Name <span class="red">*</span></label>
                              <input type="text" class="form-control" name="mst_name" placeholder="Enter Full Name" onkeyup="slug_url(this.value,'mst_username')">                                        
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group"> 
                              <label>Email Address<span class="red">*</span></label>
                              <input type="email" class="form-control" name="mst_email" placeholder="Enter Email Address" > 
                           </div>
                        </div>
                     </div>
                     
                     <div class="row">
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group"> 
                              <label>Password<span class="red">*</span></label>
                              <input type="password" class="form-control" name="mst_password" placeholder="Enter Password" id="mst_password" > 
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group"> 
                              <label>Confirm Password<span class="red">*</span></label>
                              <input type="password" class="form-control" name="mst_conf_password" placeholder="Enter Confirm Password" > 
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group"> 
                              <label>Mobile Number<span class="red">*</span></label>
                              <input type="text" class="form-control" name="mst_mobile_number" placeholder="Enter Contact Number"  maxlength="10" minlength="10" onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)))" > 
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                           <div class="form-group">
                              <label>Status<span class="red">*</span></label>
                              <select class="form-control" name="mst_status" >
                                 <option value="active">Active</option>
                                 <option value="in-active">In-Active</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div>
                        <div class="mt-2 mb-2 pull-right">
                           <button type="submit" class="btn btn-primary">Save User</button>
                        </div>
                     </div>
                  </form>
                  <?php } ?>
               </div>
               <!-- table-wrapper -->
            </div>
            <!-- section-wrapper -->
         </div>
      </div>
      <!-- row closed -->
   </div>
</div>