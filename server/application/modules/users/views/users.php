
	<div class="row">
		<div class="span12">
        
        <?php
		$data = $this->session->userdata('user_role');
		$data->role_name;
		if($data->role_name == 'admin'){
			
		?>
			<a href="<?php echo base_url('users/newadvisor');;?>"><button type="submit" class="btn">Add New Advisor</button></a>
		<?php	
		}
		
		
		?>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
						<!--<th>Pass</th>-->
					</tr>
				</thead>
				<tbod>
                
					<?php 
					$id= 0; 
					foreach($users as $user): ?>
					<tr>
						<td><?php $id= $id+1; echo $id; ?></td>
                       <?php if($data->role_name == 'admin'){ ?>
						<td><a href="<?php echo base_url('users/edit/'.$user->id); ?>"><?php echo $user->first_name." ".$user->last_name; ?></a></td>
                        <?php } else{?>
                        <td><?php echo $user->first_name; ?></td>
                        <?php } ?>
						<td><?php echo $user->email; ?></td>
                        <td><?php echo $user->mobile; ?></td>
                       <!-- <td><?php //echo $user->password; ?></td>-->
						
					</tr>
					<?php endforeach; ?>
				</tbod>
			</table>
			
		</div>
	</div>
