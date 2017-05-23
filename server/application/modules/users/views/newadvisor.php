	<div class="row">
		<div class="span6 offset3">
        <div class="errorWrap"> <?php echo $this->session->flashdata('form_error'); ?> </div>
			<h1>Add New Advisor</h1>
			<div class="well">
			
				<form class="form-horizontal" method="post" action="">
					<div class="control-group">
						<label class="control-label" for="inputFullName">First Name</label>
						<div class="controls">
						 <input name="fname" class="required" type="text" value="<?php echo set_value('fname'); ?>" maxlength="30"/>
						</div>
					</div>
                    
                    <div class="control-group">
						<label class="control-label" for="inputFullName">Last Name </label>
						<div class="controls">
						  <input name="lname" type="text" value="<?php echo set_value('lname'); ?>" maxlength="30"/>
						</div>
					</div>
                    
                   
                       <div class="control-group">
						<label class="control-label" for="inputFullName"> Mobile </label>
						<div class="controls">
						  <input name="mobile" type="text"  value="<?php echo set_value('mobile'); ?>" maxlength="30"/>
						</div>
					</div>
                    
                       <div class="control-group">
						<label class="control-label" for="inputFullName"> Email </label>
						<div class="controls">
						  <input name="email" type="text"  value="<?php echo set_value('email'); ?>" maxlength="30"/>
						</div>
					</div>
                    
                    
                      <div class="control-group">
						<label class="control-label" for="inputFullName"> Password </label>
						<div class="controls">
						  <input name="password" type="text"  value="<?php echo set_value('password'); ?>" maxlength="30"/>
						</div>
					</div>
					
					<div class="control-group">
						<div class="controls">
                        	<input id="submit" class="btn" name="submit" type="submit" value="Add User" />
							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
