<div id="cl-wrapper">
		<!--<div class="cl-sidebar">
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
        <div class="menu-space">
          <div class="content">
            <div class="side-user">
              <div class="avatar"><img src="<?php echo base_url();?>/themes/cleanzone1_3/images/avatar1_50.jpg" alt="Avatar" /></div>
              <div class="info">
                <a href="#">Jeff Hanneman</a>
                <img src="<?php echo base_url();?>/themes/cleanzone1_3/images/state_online.png" alt="Status" /> <span>Online</span>
              </div>
            </div>
            <ul class="cl-vnavigation">
              <li><a href="#"><i class="fa fa-home"></i><span>Dashboard</span></a>
                <ul class="sub-menu">
                  <li><a href="index.html">Version 1</a></li>
                  <li><a href="dashboard2.html"><span class="label label-primary pull-right">New</span> Version 2</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-smile-o"></i><span>UI Elements</span></a>
                <ul class="sub-menu">
                  <li><a href="ui-elements.html">General</a></li>
                  <li><a href="ui-buttons.html">Buttons</a></li>
                  <li><a href="ui-modals.html"><span class="label label-primary pull-right">New</span> Modals</a></li>
                  <li><a href="ui-notifications.html"><span class="label label-primary pull-right">New</span> Notifications</a></li>
                  <li><a href="ui-icons.html">Icons</a></li>
                  <li><a href="ui-grid.html">Grid</a></li>
                  <li><a href="ui-tabs-accordions.html">Tabs & Acordions</a></li>
                  <li><a href="ui-nestable-lists.html">Nestable Lists</a></li>
                  <li><a href="ui-treeview.html">Tree View</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-list-alt"></i><span>Forms</span></a>
                <ul class="sub-menu">
                  <li><a href="form-elements.html">Components</a></li>
                  <li><a href="form-validation.html">Validation</a></li>
                  <li><a href="form-wizard.html">Wizard</a></li>
                  <li><a href="form-masks.html">Input Masks</a></li>
                  <li><a href="form-wysiwyg.html"><span class="label label-primary pull-right">New</span>WYSIWYG Editor</a></li>
                  <li class="active"><a href="form-upload.html"><span class="label label-primary pull-right">New</span>Multi Upload</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-table"></i><span>Tables</span></a>
                <ul class="sub-menu">
                  <li><a href="tables-general.html">General</a></li>
                  <li><a href="tables-datatables.html"><span class="label label-primary pull-right">New</span>Data Tables</a></li>
                </ul>
              </li>              
              <li><a href="#"><i class="fa fa-map-marker nav-icon"></i><span>Maps</span></a>
                <ul class="sub-menu">
                  <li><a href="maps.html">Google Maps</a></li>
                  <li><a href="vector-maps.html"><span class="label label-primary pull-right">New</span>Vector Maps</a></li>
                </ul>
              </li>             
              <li><a href="#"><i class="fa fa-envelope nav-icon"></i><span>Email</span></a>
                <ul class="sub-menu">
                  <li><a href="email-inbox.html"><span class="label label-primary pull-right">New</span>Inbox</a></li>
                  <li><a href="email-read.html"><span class="label label-primary pull-right">New</span>Email Detail</a></li>
                </ul>
              </li>
              <li><a href="typography.html"><i class="fa fa-text-height"></i><span>Typography</span></a></li>
              <li><a href="charts.html"><i class="fa fa-bar-chart-o"></i><span>Charts</span></a></li>
              <li><a href="#"><i class="fa fa-file"></i><span>Pages</span></a>
                <ul class="sub-menu">
                  <li><a href="pages-blank.html">Blank Page</a></li>
                  <li><a href="pages-blank-header.html">Blank Page Header</a></li>
                  <li><a href="pages-blank-aside.html">Blank Page Aside</a></li>
                  <li><a href="pages-login.html">Login</a></li>
                  <li><a href="pages-404.html">404 Page</a></li>
                  <li><a href="pages-500.html">500 Page</a></li>
                  <li><a href="pages-sign-up.html"><span class="label label-primary pull-right">New</span>Sign Up</a></li>
                  <li><a href="pages-forgot-password.html"><span class="label label-primary pull-right">New</span>Forgot Password</a></li>
                  <li><a href="pages-profile.html"><span class="label label-primary pull-right">New</span>Profile</a></li>
                  <li><a href="pages-search.html"><span class="label label-primary pull-right">New</span>Search</a></li>
                  <li><a href="pages-calendar.html"><span class="label label-primary pull-right">New</span>Calendar</a></li>
                  <li><a href="pages-code-editor.html"><span class="label label-primary pull-right">New</span>Code Editor</a></li>
                  <li><a href="pages-gallery.html">Gallery</a></li>
                  <li><a href="pages-timeline.html">Timeline</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="text-right collapse-button" style="padding:7px 9px;">
          <input type="text" class="form-control search" placeholder="Search..." />
          <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
        </div>
			</div>
		</div>-->
	
	<div class="container-fluid" id="pcont">
		<div class="page-head">
        	<h3><i class="fa fa-male"></i> <?php echo $userDetails[0]->FirstName.' '.$userDetails[0]->MiddleName.' '.$userDetails[0]->LastName; ?></h3>
            <div class="row icon-show">
            <div class="col-md-2 col-sm-4"><i class="fa fa-building-o"></i><strong>Company:</strong> <?php echo $userDetails[0]->com_name; ?></div>
			<div class="col-md-2 col-sm-4"><i class="fa fa-meh-o"></i><strong>Rank:</strong> <?php echo $userDetails[0]->rank_name; ?></div>
            <div class="col-md-2 col-sm-4"><i class="fa fa-anchor"></i><strong>Vessel:</strong> <?php echo $userDetails[0]->vessel_name; ?></div>
            </div>
            <div class="row icon-show">
            <div class="col-md-2 col-sm-4"><i class="fa fa-calendar-o"></i><strong>DOB:</strong> <?php echo $userDetails[0]->DOB; ?></div>
			<div class="col-md-2 col-sm-4"><i class="fa fa-book"></i><strong>PP/CDC:</strong> <?php echo $userDetails[0]->pass_no.'/'.$userDetails[0]->cdc; ?></div>
            <div class="col-md-2 col-sm-4"><i class="fa fa-clock-o"></i><strong>DOA:</strong> <?php echo $userDetails[0]->date_of_appt; ?></div>
            </div>
			<!--<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li><a href="#">Forms</a></li>
			  <li class="active">Multi Upload</li>
			</ol>
		</div>-->
        	
    <div class="cl-mcont">
    <?php if(isset($Status)){ ?>
     <div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="fa fa-check sign"></i><strong>Thank You!</strong> <?php echo $Status; ?>
	</div>
    <?php }else{?>
    <div class="row">	
      <div class="col-sm-6 col-md-6 col-lg-7">
	  <div class="block-flat">
	  <div class="content">
	  <form action="<?php echo base_url();?>index.php/adapter/do_upload/<?php echo $UniqueKey; ?>" class="dropzone" 
      id="my-awesome-dropzone"></form>
	  </div>
	  </div>				
	  </div>
      
      <div class="col-sm-6 col-md-6 col-lg-5">
	  <div class="block-flat">
	  <div class="content">
      <form class="form-horizontal group-border-dashed" method="post" action="" style="border-radius: 0px;" parsley-validate>
      <div class="form-group">
      <label class="col-sm-3 control-label">Candidate Status</label>
      <div class="col-sm-6">
	  <select class="select2" name="CandidateStatus" parsley-trigger="change" required>
      <optgroup label="Candidate Status">
      <?php foreach($status as $status){ ?>
      <option value="<?php echo $status->id ?>"><?php echo $status->status ?></option>
      <?php } ?>
      </optgroup>
      </select>
      </div>
      </div>
      <div class="form-group">
      <label class="col-sm-3 control-label">Medical Findings</label>
      <div class="col-sm-6">
	  <select class="select2" name="MedFindings" parsley-trigger="change" required>
      <optgroup label="Candidate Status">
      <option value="">Select Medical Findings</option>
      <?php foreach($MedFindings as $MedFindings){ ?>
      <option value="<?php echo $MedFindings->id ?>"><?php echo $MedFindings->MedFinding ?></option>
      <?php } ?>
      </optgroup>
      </select>
      </div>
      </div>
      <div class="form-group">
      <label class="col-sm-3 control-label">Notes</label>
      <div class="col-sm-6">
	  <textarea class="form-control" rows="11" name="CandidateNotes" parsley-trigger="change"  required></textarea>
      </div>
      </div>
       <?php if(isset($error)){ ?>
      <div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="fa fa-times-circle sign"></i><strong>Error!</strong> <?php echo $error; ?>
	</div>
     <?php } ?>
      <button class="btn btn-primary" type="submit">Submit</button>
      <button class="btn btn-default">Cancel</button>
      </form>
     
	  </div>
	  </div>				
	  </div>
       <?php if(isset($ProfileUploads)) {?>
      <div class="row">
	  <div class="col-md-6 col-md-6 col-lg-7">
	  <div class="block-flat">
		<div class="header">							
		<h3>Uploaded Profile</h3>
		</div>
		<div class="content">
		<div class="table-responsive">
		<table class="table no-border hover">
		<thead class="no-border">
		<tr>
			<!--<th style="width:2%;"><input type="checkbox" /></th>-->
			<th><strong>File Name</strong></th>
			<th><strong>File Size</strong></th>
			<th><strong>File Type</strong></th>
			<th class="text-center"><strong>Action</strong></th>
		</tr>
		</thead>
		<tbody class="no-border-y" id="UploadData">
        <?php foreach($ProfileUploads as $key=>$ProfileUploads){?>
		<tr>
			<!--<td><input type="checkbox" /></td>-->
			<td><?php echo $ProfileUploads->orig_name; ?></td>
			<td><?php 
			if($ProfileUploads->file_size<1024)
			{echo $ProfileUploads->file_size." Kb"; }
			else
			{echo number_format($ProfileUploads->file_size/1024,1)." Mb";}
			?></td>
			<td><?php echo $ProfileUploads->file_type; ?></td>
			<td class="text-center"><a class="label label-info btn-xs" href="<?php echo base_url();?>index.php/adapter/DownloadProfile/<?php echo $UniqueKey; ?>/<?php echo $ProfileUploads->file_name; ?>" ><i class="fa fa-cloud-download"></i></a></td>
		</tr>	
         <?php }?>	
		</tbody>
		</table>		
		</div>
		</div>
		</div>				
		</div>
		<!--</div>
	-->
     <?php }?>	
    
      <?php if(isset($ImageDetails)) {?>
       <!-- <div class="row"> -->
	  <div class="col-md-6 col-md-6 col-lg-5">
	  <div class="block-flat">
		<div class="header">							
		<h3>Files Uploaded</h3>
		</div>
		<div class="content">
		<div class="table-responsive">
		<table class="table no-border hover">
		<thead class="no-border">
		<tr>
			<!--<th style="width:2%;"><input type="checkbox" /></th>-->
			<th><strong>File Name</strong></th>
			<th><strong>File Size</strong></th>
			<th><strong>File Type</strong></th>
			<th class="text-center"><strong>Action</strong></th>
		</tr>
		</thead>
		<tbody class="no-border-y" id="UploadData">
        <?php foreach($ImageDetails as $key=>$ImageDetails){?>
		<tr>
			<!--<td><input type="checkbox" /></td>-->
			<td><?php echo $ImageDetails->orig_name; ?></td>
			<td><?php 
			if($ImageDetails->file_size<1024)
			{echo $ImageDetails->file_size." Kb"; }
			else
			{echo number_format($ImageDetails->file_size/1024,1)." Mb";}
			?></td>
			<td><?php echo $ImageDetails->file_type; ?></td>
			<td class="text-center"><a class="label label-info btn-xs" href="<?php echo base_url();?>index.php/adapter/displayFile/<?php echo $UniqueKey; ?>/<?php echo $ImageDetails->file_name; ?>" ><i class="fa fa-cloud-download"></i></a> <a class="label label-danger" href="<?php echo base_url();?>index.php/adapter/user/<?php echo $UniqueKey; ?>/del/<?php echo $key; ?>"><i class="fa fa-times"></i></a></td>
		</tr>	
         <?php }?>	
		</tbody>
		</table>		
		</div>
		</div>
		</div>				
		</div>
		</div>
	<!---->
     <?php }?>	
    </div>
    
    <?php }?> 
   
    </div>
	</div> 
	
</div>