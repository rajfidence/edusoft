	<div class="row">
		<div class="span6 offset3">
         <div class="errorWrap"> <?php echo $this->session->flashdata('form_error'); ?> </div>
        
         <?php if(@$errors){
			 
			 
			 echo $errors;
			 
			 }
		?>
			<h1>Account settings</h1>
			
			<?php if(@$message): ?>
			<div class="alert">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<?php echo $message; ?>
			</div>
			<?php endif; ?>

			<div class="well">
					
				<form class="form-horizontal" method="post" action="">
					<div class="control-group">
						<label for="inputNickname" class="control-label">Nickname</label>
						<div class="controls">
							<input type="text" id="inputNickname" name="nickname" value="<?php echo $user->first_name; ?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Email</label>
						<div class="controls">
							<input type="text" id="inputEmail" placeholder="" name="email" value="<?php echo $user->email; ?>" />
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="inputEmail">Mobile</label>
						<div class="controls">
							<input type="text" id="inputEmail" placeholder="" name="mobile" value="<?php echo $user->mobile; ?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">Old Password</label>
						<div class="controls">
							<input type="password" id="inputoldPassword" placeholder="" name="oldpassword" value="" />
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">New Password</label>
						<div class="controls">
							<input type="password" id="inputnewPassword" placeholder="" name="newpassword" value="" />
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Confirm Password</label>
						<div class="controls">
							<input type="password" id="inputconfirmPassword" placeholder="" name="confirmpassword" value="" />
						</div>
					</div>
                    
					<div class="control-group">
						<div class="controls">
							
                            <input type="submit" class="btn" name="submit" value="Update" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

