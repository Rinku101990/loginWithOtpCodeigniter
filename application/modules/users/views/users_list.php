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
                <?php if($admin->mst_role==0){?>
                <a href="<?php echo site_url('users/add');?>">
                    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-plus "></i> Add User </button>
                </a>
                <?php } ?>
            </div>
         </div>
      </div>
      <!--  Page-header closed -->
      <!-- row opened -->
      <div class="row">
         <div class="col-md-12 col-lg-12">
            <div class="card">
               <div class="card-header">
                  <div class="card-title">Users List</div>
                  <div class="card-options"> <a href="javascript:void(0)" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a> </div>
               </div>
               <div class="card-body">
                  <?php $msg=$this->session->flashdata('msg');  
                     if($msg){  ?>
                  <div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert">  <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">??</span> </button> </div>
                  <?php }?>
                  <div class="table-responsive product-datatable">
                     <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                           <div class="col-sm-12">
                           <?php if($admin->mst_role==0){?>
                              <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                 <thead>
                                    <tr role="row">
                                       <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending">Sr.No.</th>
                                       <th class="wd-15p sorting" >Profile</th>
                                       <th class="wd-15p sorting">Full Name</th>
                                       <th class="wd-15p sorting">Email Address</th>
                                       <th class="wd-15p sorting">Type</th>
                                       <th class="wd-15p sorting">Status</th>
                                       <th class="wd-10p sorting" >Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if(!empty($users)){ $i=1; foreach($users as $usrlist){ ?>
                                    <tr role="row">
                                       <td class="sorting_1" align="left">#<?php echo $i++;?>.</td>
                                       <td><img class="avatar-md brround" src="<?php echo base_url('uploads/profile/avatar.png');?>"></td>
                                       <td><?php echo $usrlist->mst_name;?></td>
                                       <td><?php echo $usrlist->mst_email;?></td>
                                       <td align="center">
                                          <?php if($usrlist->mst_role==1){ ?>
                                          <span class="badge badge-success-light badge-md">Users</span>
                                          <?php }else{ ?>
                                          <span class="badge badge-primary-light badge-md">Admin</span>
                                          <?php } ?>
                                       </td>
                                       <td align="center">
                                          <?php if($usrlist->mst_status=='active'){ ?>
                                          <span class="badge badge-success-light badge-md">Active</span>
                                          <?php }else{ ?>
                                          <span class="badge badge-primary-light badge-md">In-Active</span>
                                          <?php } ?>
                                       </td>
                                       <td align="center">
                                          <a href="<?php echo site_url('users/remove/'.$usrlist->mst_id);?>" class="btn btn-danger btn-sm mt-2 mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                       </td>
                                    </tr>
                                    <?php } }else {?>
                                    <tr>
                                       <td colspan="6">
                                          <center>no users founds</center>
                                       </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                            <?php }else{ ?>
                                <p>You are not allowed!</p>
                            <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- table-wrapper -->
            </div>
            <!-- section-wrapper -->
         </div>
      </div>
      <!-- row closed -->
   </div>
</div>