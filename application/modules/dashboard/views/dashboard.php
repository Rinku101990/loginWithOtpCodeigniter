<!-- App-content opened -->
<?php error_reporting(0);?>
<div class="app-content">
    <div class="section">
        <!-- Page-header opened -->
        <div class="page-header">
            <div class="page-leftheader">
            <?php if($admin->mst_role==0){?>
                <h4 class="page-title mb-0">Welcome back -> Administrator,</h4>
            <?php }else{ ?>
                <h4 class="page-title mb-0">Welcome back -> <?=$admin->mst_name;?>,</h4>
            <?php } ?>
                <small class="text-muted mt-0 fs-14"><?php echo $this->website->web_company_name; ?></small> 
            </div>
            <div class="page-rightheader">
            </div>
        </div>
        <!-- Page-header closed -->

        <!-- row opened -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                
            </div>
        </div>
        <!-- row closed -->
      
    </div>
</div>
<!-- App-content closed -->