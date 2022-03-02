<form method="POST">
<table border="1">
			<?php 
				
				$query = "select * from table";
				$result = mysql_query($query);	
				
				$row = mysql_fetch_assoc($result)
			?>
			
			<tr>	
				
			<th>Items db</th>
				<?php
					$status =  $row['status']; 
					if($status == 1):	
				?>
				<td style="text-align:center;">
					<a href="menus.php?status_id=<?php echo $row['id'];?>&status=0">
						<img src="ok.png" title="Active / Deactivate Record" />
					</a>
				</td>
				<?php else:	?>
				<td style="text-align:center;">
					<a href="menus.php?status_id=<?php echo $row['id'];?>&status=1">
						<img src="cross.png" title="Active / Deactivate Record" />
					</a>
				</td>
				<?php endif; ?>
				</tr>
</table>
</form>