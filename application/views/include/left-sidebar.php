<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
   <div class="side-tab-body p-0 border-0 resp-vtabs hor_1" id="sidemenu-Tab" style="display: block; width: 100%; margin: 0px;">
   <div class="first-sidemenu  ps--active-y">
      <div class="line-animations">
         <ul class="resp-tabs-list hor_1" style="margin-top: 3px;">
            <li class="resp-tab-active active resp-tab-item hor_1" aria-controls="hor_1_tab_item-0" role="tab">
               <span class="side-menu__icon"></span>
               <img src="<?=base_url();?>assets/images/svgs/homepage.svg" class="side_menu_img svg-1" alt="image">
            </li>
            <?php if($admin->mst_role==0){?>
            <li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-1" role="tab">
               <span class="side-menu__icon"></span>
               <i class="fa fa-user fs-20 side_menu_img svg-1"></i>
            </li>
            <li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-2" role="tab">
               <span class="side-menu__icon"></span>
               <img src="<?=base_url();?>assets/images/svgs/testing.svg" class="side_menu_img svg-1" alt="image">
            </li>
            <?php } ?>
         </ul>
      </div>
      <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
         <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
      </div>
      <div class="ps__rail-y" style="top: 0px; height: 789px; right: -2px;">
         <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 606px;"></div>
      </div>
   </div>
   <div class="second-sidemenu ps ps--active-y">
      <div class="resp-tabs-container hor_1">                  
         <h2 class="resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-0">
            <span class="resp-arrow"></span>
            <span class="side-menu__icon"></span>
            <img src="<?=base_url();?>assets/images/svgs/homepage.svg" class="side_menu_img svg-1" alt="image">
         </h2>
         <div class="resp-tab-content-active resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-0">
            <div class="row">
               <div class="col-md-12">
                  <div class="panel sidetab-menu">
                     <div class="panel-body tabs-menu-body p-0 border-0 active">
                        <div class="tab-content">
                           <div class="tab-pane active " id="side1">
                              <a class="slide-item active" href="<?=base_url('dashboard');?>">Dashboard</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         <h2 class="resp-tab-content-active resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-1">
            <span class="resp-arrow"></span>
            <span class="side-menu__icon"></span>
            <img src="<?=base_url();?>assets/images/svgs/shopping-cart.svg" class="side_menu_img svg-1" alt="image">
         </h2>
         <div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-1">
            <div class="row">
               <div class="col-md-12">
                  <div class="panel sidetab-menu">
                     <div class="panel-body tabs-menu-body p-0 border-0">
                        <div class="tab-content">
                           <div class="tab-pane active" id="side-2">
                              <a href="<?=base_url('users');?>" class="slide-item">Users</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <h2 class="resp-tab-content-active resp-accordion hor_1" role="tab" aria-controls="hor_1_tab_item-2">
            <span class="resp-arrow"></span>
            <span class="side-menu__icon"></span>
            <img src="<?=base_url();?>assets/images/svgs/shopping-cart.svg" class="side_menu_img svg-1" alt="image">
         </h2>
         <div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-2">
            <div class="row">
               <div class="col-md-12">
                  <div class="panel sidetab-menu">
                     <div class="panel-body tabs-menu-body p-0 border-0">
                        <div class="tab-content">
                           <div class="tab-pane active" id="side-3">
                              <a href="<?=base_url('documents');?>" class="slide-item">Documents</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
         </div>
         <div class="ps__rail-y" style="top: 0px; height: 789px; right: -2px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 48px;"></div>
         </div>
      </div>
   </div>
</aside>
<!-- Sidemenu closed -->