<div class="app-content">
   <div class="section">
      <!--  Page-header opened -->
      <div class="page-header">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Documents
            </li>
         </ol>
         <div class="mt-3 mt-lg-0">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
                <?php if($admin->mst_role==0){?> 
                <a href="<?=base_url('documents/add');?>">
                    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"> <i class="fe fe-plus "></i> Add Document</button>
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
                  <div class="card-title">Documents List</div>
                  <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>  </div>
               </div>
               <div class="card-body">
                  <?php $msg=$this->session->flashdata('msg'); if($msg){  ?>
                    <div class="alert alert-<?php echo $msg['class'] ?> alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-<?php echo $msg['icon'] ?> "></i></span> <span class="alert-inner--text"><strong><?php echo $msg['type'] ?></strong> <?php echo $msg['message']; ?></span> <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>
                  <?php }?>
                  <div class="table-responsive product-datatable">
                     <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                           <div class="col-sm-12">
                            <?php if($admin->mst_role==0){?>
                              <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                 <thead>
                                    <tr role="row">
                                       <th class="w-15p sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product name: activate to sort column descending" >Sr. No.</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Preview</th>
                                       <th class="wd-15p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">File</th>
                                       <th class="wd-10p sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" >Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if(!empty($documents)){
                                       $i=1;  foreach($documents AS $list){?>
                                    <tr role="row" >
                                       <td class="sorting_1" style="width: 100px;">#<?=$i;$i++;?></td>
                                       <td> <img class="avatar-md brround" src="<?=base_url('uploads/documents/').$list->slr_img;?>"  style="width:100px; height: 50px;" /></td>
                                       <td><a href="<?=base_url('uploads/documents/').$list->slr_img;?>" download style="color:red"><?=$list->slr_name;?></a></td>
                                       <td align="center">
                                        <a href="javascript:void(0);" onclick="javascript:showMyModalSetTitle('Delete','documents/remove/',<?=$list->slr_id;?>,'')" class="btn btn-danger btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                       </td>
                                    </tr>
                                    <?php }}?>
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