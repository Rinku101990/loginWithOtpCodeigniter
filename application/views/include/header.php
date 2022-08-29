<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="keywords" content="<?php echo $this->website->web_meta_title; ?>" />
      <meta name="description" content="<?php echo $this->website->web_meta_description; ?>" />
      <meta name="Author" content="Rinku Vishwakarma/rinku101990@gmail.com" />
      <!-- Favicon-->
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('uploads/website/favicon/').$this->website->web_favicon_icon;?>">
      <!-- Title -->
      <title><?php echo $this->website->web_meta_title; ?></title>
      <!-- Bootstrap css -->
      <link href="<?=base_url();?>assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet">
      <!-- Style css -->
      <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
      <!-- Default css -->
      <link href="<?=base_url();?>assets/css/default.css" rel="stylesheet">
      <!-- Sidemenu css-->
      <link rel="stylesheet" href="<?=base_url();?>assets/plugins/sidemenu/sidemenu.css">
      <!-- Owl-carousel css-->
      <link href="<?=base_url();?>assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
      <!-- Bootstrap-daterangepicker css -->
      <link rel="stylesheet" href="<?=base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css">
      <!-- Bootstrap-datepicker css -->
      <link rel="stylesheet" href="<?=base_url();?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css">
      <!-- Custom scroll bar css -->
      <link href="<?=base_url();?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet">
      <!-- Sidemenu-repsonsive-tabs  css -->
      <link href="<?=base_url();?>assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css" rel="stylesheet">
      <!-- P-scroll css -->
      <link href="<?=base_url();?>assets/plugins/p-scroll/p-scroll.css" rel="stylesheet" type="text/css">
      <!-- Font-icons css -->
      <link href="<?=base_url();?>assets/css/icons.css" rel="stylesheet">
      <!-- Switcher css -->
      <link href="<?=base_url();?>assets/switcher/css/switcher.css" rel="stylesheet" id="switcher-css" type="text/css" media="all">
      <!-- Rightsidebar css -->
      <link href="<?=base_url();?>assets/plugins/sidebar/sidebar.css" rel="stylesheet">
      <!-- Nice-select css  -->
      <link href="<?=base_url();?>assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
      <link href="<?=base_url();?>assets/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
      <!-- Color-palette css-->
      <link rel="stylesheet" href="<?=base_url();?>assets/css/skins.css">
      <link rel="stylesheet" href="<?=base_url();?>assets/plugins/summernote/summernote-bs4.css">
      <link href="<?=base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
      <link href="<?=base_url();?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
      <link href="<?=base_url();?>assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
      <link rel="stylesheet" href="<?=base_url();?>assets/switcher/demo.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
      <link rel="stylesheet" href="https://rawgit.com/select2/select2/master/dist/css/select2.min.css">
      <style type="text/css">
         .datepicker>div {
         display: block;
         }
         .apexcharts-canvas {
         position: relative;
         user-select: none;
         /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart are */
         /* overflow: hidden; */
         }
         .apexcharts-inner {
         position: relative;
         }
         .apexcharts-legend-series {
         cursor: pointer;
         }
         .apexcharts-legend-series.no-click {
         cursor: auto;
         }
         .inactive-legend {
         opacity: 0.45;
         }
         .legend-mouseover-inactive {
         transition: 0.15s ease all;
         opacity: 0.20;
         }
         .apexcharts-series-collapsed {
         opacity: 0;
         }
         .apexcharts-gridline,
         .apexcharts-text {
         pointer-events: none;
         }
         .apexcharts-tooltip {
         border-radius: 5px;
         box-shadow: 2px 2px 6px -4px #999;
         cursor: default;
         font-size: 14px;
         left: 62px;
         opacity: 0;
         pointer-events: none;
         position: absolute;
         top: 20px;
         overflow: hidden;
         white-space: nowrap;
         z-index: 12;
         transition: 0.15s ease all;
         }
         .apexcharts-tooltip.light {
         border: 1px solid #e3e3e3;
         background: rgba(255, 255, 255, 0.96);
         }
         .apexcharts-tooltip.dark {
         color: #fff;
         background: rgba(30, 30, 30, 0.8);
         }
         .apexcharts-tooltip .apexcharts-marker,
         .apexcharts-area-series .apexcharts-area,
         .apexcharts-line {
         pointer-events: none;
         }
         .apexcharts-tooltip.active {
         opacity: 1;
         transition: 0.15s ease all;
         }
         .apexcharts-tooltip-title {
         padding: 6px;
         font-size: 15px;
         margin-bottom: 4px;
         }
         .apexcharts-tooltip.light .apexcharts-tooltip-title {
         background: #ECEFF1;
         border-bottom: 1px solid #ddd;
         }
         .apexcharts-tooltip.dark .apexcharts-tooltip-title {
         background: rgba(0, 0, 0, 0.7);
         border-bottom: 1px solid #222;
         }
         .apexcharts-tooltip-text-value,
         .apexcharts-tooltip-text-z-value {
         display: inline-block;
         font-weight: 600;
         margin-left: 5px;
         }
         .apexcharts-tooltip-text-z-label:empty,
         .apexcharts-tooltip-text-z-value:empty {
         display: none;
         }
         .apexcharts-tooltip-text-value,
         .apexcharts-tooltip-text-z-value {
         font-weight: 600;
         }
         .apexcharts-tooltip-marker {
         width: 12px;
         height: 12px;
         position: relative;
         top: 1px;
         margin-right: 10px;
         border-radius: 50%;
         }
         .apexcharts-tooltip-series-group {
         padding: 0 10px;
         display: none;
         text-align: left;
         justify-content: left;
         align-items: center;
         }
         .apexcharts-tooltip-series-group.active .apexcharts-tooltip-marker {
         opacity: 1;
         }
         .apexcharts-tooltip-series-group.active,
         .apexcharts-tooltip-series-group:last-child {
         padding-bottom: 4px;
         }
         .apexcharts-tooltip-y-group {
         padding: 6px 0 5px;
         }
         .apexcharts-tooltip-candlestick {
         padding: 4px 8px;
         }
         .apexcharts-tooltip-candlestick > div {
         margin: 4px 0;
         }
         .apexcharts-tooltip-candlestick span.value {
         font-weight: bold;
         }
         .apexcharts-xaxistooltip {
         opacity: 0;
         padding: 9px 10px;
         pointer-events: none;
         color: #373d3f;
         font-size: 13px;
         text-align: center;
         border-radius: 2px;
         position: absolute;
         z-index: 10;
         background: #ECEFF1;
         border: 1px solid #90A4AE;
         transition: 0.15s ease all;
         }
         .apexcharts-xaxistooltip:after,
         .apexcharts-xaxistooltip:before {
         left: 50%;
         border: solid transparent;
         content: " ";
         height: 0;
         width: 0;
         position: absolute;
         pointer-events: none;
         }
         .apexcharts-xaxistooltip:after {
         border-color: rgba(236, 239, 241, 0);
         border-width: 6px;
         margin-left: -6px;
         }
         .apexcharts-xaxistooltip:before {
         border-color: rgba(144, 164, 174, 0);
         border-width: 7px;
         margin-left: -7px;
         }
         .apexcharts-xaxistooltip-bottom:after,
         .apexcharts-xaxistooltip-bottom:before {
         bottom: 100%;
         }
         .apexcharts-xaxistooltip-bottom:after {
         border-bottom-color: #ECEFF1;
         }
         .apexcharts-xaxistooltip-bottom:before {
         border-bottom-color: #90A4AE;
         }
         .apexcharts-xaxistooltip-top:after,
         .apexcharts-xaxistooltip-top:before {
         top: 100%;
         }
         .apexcharts-xaxistooltip-top:after {
         border-top-color: #ECEFF1;
         }
         .apexcharts-xaxistooltip-top:before {
         border-top-color: #90A4AE;
         }
         .apexcharts-xaxistooltip.active {
         opacity: 1;
         transition: 0.15s ease all;
         }
         .apexcharts-yaxistooltip {
         opacity: 0;
         padding: 4px 10px;
         pointer-events: none;
         color: #373d3f;
         font-size: 13px;
         text-align: center;
         border-radius: 2px;
         position: absolute;
         z-index: 10;
         background: #ECEFF1;
         border: 1px solid #90A4AE;
         }
         .apexcharts-yaxistooltip:after,
         .apexcharts-yaxistooltip:before {
         top: 50%;
         border: solid transparent;
         content: " ";
         height: 0;
         width: 0;
         position: absolute;
         pointer-events: none;
         }
         .apexcharts-yaxistooltip:after {
         border-color: rgba(236, 239, 241, 0);
         border-width: 6px;
         margin-top: -6px;
         }
         .apexcharts-yaxistooltip:before {
         border-color: rgba(144, 164, 174, 0);
         border-width: 7px;
         margin-top: -7px;
         }
         .apexcharts-yaxistooltip-left:after,
         .apexcharts-yaxistooltip-left:before {
         left: 100%;
         }
         .apexcharts-yaxistooltip-left:after {
         border-left-color: #ECEFF1;
         }
         .apexcharts-yaxistooltip-left:before {
         border-left-color: #90A4AE;
         }
         .apexcharts-yaxistooltip-right:after,
         .apexcharts-yaxistooltip-right:before {
         right: 100%;
         }
         .apexcharts-yaxistooltip-right:after {
         border-right-color: #ECEFF1;
         }
         .apexcharts-yaxistooltip-right:before {
         border-right-color: #90A4AE;
         }
         .apexcharts-yaxistooltip.active {
         opacity: 1;
         }
         .apexcharts-xcrosshairs,
         .apexcharts-ycrosshairs {
         pointer-events: none;
         opacity: 0;
         transition: 0.15s ease all;
         }
         .apexcharts-xcrosshairs.active,
         .apexcharts-ycrosshairs.active {
         opacity: 1;
         transition: 0.15s ease all;
         }
         .apexcharts-ycrosshairs-hidden {
         opacity: 0;
         }
         .apexcharts-zoom-rect {
         pointer-events: none;
         }
         .apexcharts-selection-rect {
         cursor: move;
         }
         .svg_select_points,
         .svg_select_points_rot {
         opacity: 0;
         visibility: hidden;
         }
         .svg_select_points_l,
         .svg_select_points_r {
         cursor: ew-resize;
         opacity: 1;
         visibility: visible;
         fill: #888;
         }
         .zoomable .hovering-zoom {
         cursor: crosshair
         }
         .zoomable .hovering-pan {
         cursor: move
         }
         .apexcharts-xaxis,
         .apexcharts-yaxis {
         pointer-events: none;
         }
         .apexcharts-zoom-icon,
         .apexcharts-zoom-in-icon,
         .apexcharts-zoom-out-icon,
         .apexcharts-reset-zoom-icon,
         .apexcharts-pan-icon,
         .apexcharts-selection-icon,
         .apexcharts-download-icon {
         cursor: pointer;
         width: 20px;
         height: 20px;
         text-align: center;
         }
         .apexcharts-zoom-icon svg,
         .apexcharts-zoom-in-icon svg,
         .apexcharts-zoom-out-icon svg,
         .apexcharts-reset-zoom-icon svg,
         .apexcharts-download-icon svg {
         fill: #6E8192;
         }
         .apexcharts-selection-icon svg {
         fill: #444;
         transform: scale(0.86)
         }
         .apexcharts-zoom-icon.selected svg,
         .apexcharts-selection-icon.selected svg,
         .apexcharts-reset-zoom-icon.selected svg {
         fill: #008FFB;
         }
         .apexcharts-selection-icon:not(.selected):hover svg,
         .apexcharts-zoom-icon:not(.selected):hover svg,
         .apexcharts-zoom-in-icon:hover svg,
         .apexcharts-zoom-out-icon:hover svg,
         .apexcharts-reset-zoom-icon:hover svg {
         fill: #333;
         }
         .apexcharts-selection-icon,
         .apexcharts-download-icon {
         margin-right: 3px;
         position: relative;
         top: 1px;
         }
         .apexcharts-reset-zoom-icon {
         margin-left: 7px;
         }
         .apexcharts-zoom-icon {
         transform: scale(1);
         }
         .apexcharts-download-icon {
         transform: scale(0.9)
         }
         .apexcharts-zoom-in-icon,
         .apexcharts-zoom-out-icon {
         transform: scale(0.8)
         }
         .apexcharts-zoom-out-icon {
         margin-right: 3px;
         }
         .apexcharts-pan-icon {
         transform: scale(0.72);
         position: relative;
         left: 1px;
         top: 0px;
         }
         .apexcharts-pan-icon svg {
         fill: #fff;
         stroke: #6E8192;
         stroke-width: 2;
         }
         .apexcharts-pan-icon.selected svg {
         stroke: #008FFB;
         }
         .apexcharts-pan-icon:not(.selected):hover svg {
         stroke: #333;
         }
         .apexcharts-toolbar {
         position: absolute;
         z-index: 11;
         top: 0px;
         right: 3px;
         max-width: 176px;
         text-align: right;
         border-radius: 3px;
         padding: 5px 6px 2px 6px;
         display: flex;
         justify-content: space-between;
         align-items: center;
         }
         .apexcharts-toolbar svg {
         pointer-events: none;
         }
         @media screen and (min-width: 768px) {
         .apexcharts-toolbar {
         /*opacity: 0;*/
         }
         .apexcharts-canvas:hover .apexcharts-toolbar {
         opacity: 1;
         }
         }
         .apexcharts-datalabel.hidden {
         opacity: 0;
         }
         .apexcharts-pie-label,
         .apexcharts-datalabel,
         .apexcharts-datalabel-label,
         .apexcharts-datalabel-value {
         cursor: default;
         pointer-events: none;
         }
         .apexcharts-pie-label-delay {
         opacity: 0;
         animation-name: opaque;
         animation-duration: 0.3s;
         animation-fill-mode: forwards;
         animation-timing-function: ease;
         }
         .hidden {
         opacity: 0;
         }
         .apexcharts-hide .apexcharts-series-points {
         opacity: 0;
         }
         .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
         .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events {
         pointer-events: none;
         }
         /* markers */
         .apexcharts-marker {
         transition: 0.15s ease all;
         }
         @keyframes opaque {
         0% {
         opacity: 0;
         }
         100% {
         opacity: 1;
         }
         }
      </style>
      <style type="text/css">
         .jqstooltip {
         position: absolute;
         left: 0px;
         top: 0px;
         visibility: hidden;
         background: rgb(0, 0, 0) transparent;
         background-color: rgba(0, 0, 0, 0.6);
         filter: progid: DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
         -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
         color: white;
         font: 10px arial, san serif;
         text-align: left;
         white-space: nowrap;
         padding: 5px;
         border: 1px solid white;
         z-index: 10000;
         }
         .jqsfield {
         color: white;
         font: 10px arial, san serif;
         text-align: left;
         }
      </style>
      <style type="text/css">
         /* Chart.js */
         @keyframes chartjs-render-animation {
         from {
         opacity: .99
         }
         to {
         opacity: 1
         }
         }
         .chartjs-render-monitor {
         animation: chartjs-render-animation 1ms
         }
         .chartjs-size-monitor,
         .chartjs-size-monitor-expand,
         .chartjs-size-monitor-shrink {
         position: absolute;
         direction: ltr;
         left: 0;
         top: 0;
         right: 0;
         bottom: 0;
         overflow: hidden;
         pointer-events: none;
         visibility: hidden;
         z-index: -1
         }
         .chartjs-size-monitor-expand>div {
         position: absolute;
         width: 1000000px;
         height: 1000000px;
         left: 0;
         top: 0
         }
         .chartjs-size-monitor-shrink>div {
         position: absolute;
         width: 200%;
         height: 200%;
         left: 0;
         top: 0
         }
      </style>
   </head>
   <body class="app sidebar-mini">
      <div class="header-main header sticky">
         <div class="app-header header top-header navbar-collapse ">
            <div class="container-fluid">
               <div class="d-flex">
                  <a class="header-brand" href="<?=base_url();?>"> 
                  <img src="<?php echo site_url('uploads/website/logo/').$this->website->web_company_logo;?>" class="header-brand-img desktop-logo " alt="<?=$this->website->web_company_name;?>"> 
                  <img src="<?php echo site_url('uploads/website/logo/').$this->website->web_company_logo;?>" class="mobile-logo" alt="<?=$this->website->web_company_name;?>">
                  </a> <a href="javascript:void(0)" data-toggle="sidebar" class="nav-link icon toggle"><i class="fe fe-align-justify fs-20"></i></a>
                  <div class="d-flex header-left left-header">
                     <div class="d-none d-lg-block horizontal">
                        <ul class="nav">
                           <li class="">
                              <div class="">
                                 <div class="nav-link form-group mb-0 ">
                                    <a class="mr-2 nav-link"><span><?php echo date('d F Y H:i A');;?></span></a>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="d-flex header-right ml-auto">
                     <div class="dropdown header-fullscreen">
                        <a class="nav-link icon full-screen-link" id="fullscreen-button"> <i class="mdi mdi-arrow-collapse fs-20"></i> </a>
                     </div>
                     <!-- Fullscreen -->
                     <div class="dropdown header-notify">
                     </div>
                     <div class="dropdown drop-profile">
                        <a class="nav-link pr-0 leading-none" href="#" data-toggle="dropdown" aria-expanded="false">
                           <div class="profile-details mt-1"> 
                              <span class="mr-3 mb-0  fs-15 font-weight-semibold"><?=$admin->mst_name;?></span> 
                              <?php if($admin->mst_role==0){?>
                                 <small class="text-muted mr-3">Master</small> 
                              <?php }else{ ?>
                                 <small class="text-muted mr-3">User</small> 
                              <?php } ?>
                           </div>
                           <img class="avatar avatar-md brround" src="<?php echo base_url('uploads/profile/avatar.png');?>" alt="<?=$admin->mst_name;?>"> 
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated bounceInDown w-250">
                            <div class="user-profile bg-header-image border-bottom p-3">
                                <div class="user-image text-center"> 
                                    <img class=" avatar-md brround" src="<?php echo base_url('uploads/profile/avatar.png');?>" alt="<?=$admin->mst_name;?>"> 
                                </div>
                                <div class="user-details text-center">
                                    <h4 class="mb-0"><?=$admin->mst_name;?></h4>
                                    <p class="mb-1 fs-13 text-white-50"><?=$admin->mst_email;?></p>
                                </div>
                            </div>
                            <a class="dropdown-item mb-1" href="<?=base_url('login/logout');?>"> <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Top-header closed -->