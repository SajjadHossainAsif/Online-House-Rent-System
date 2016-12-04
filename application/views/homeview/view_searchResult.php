<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Search Result</title>

</head>
<body '>

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<?php  $this->load->view('headerview/homeBodyTopView')?>
		
				
			<p class="badge">Total {total} result Found</p>

			<table class="table table-bordered ">
				
				{accurateSearch}
				<tr>
				<td>
					
						<div class="col-sm-4" style="background-color:red;">
							Images
						</div>
						<div class="col-sm-8" border="1" align="left" style="background-color:white;">
							<b>Flat Type</b> : {flat_type} ( {masterbed} Masterbed, 
							{bed} Bed,  
							{balcony} Balcony,
							{washroom} Washroom )<br>
							<b>Available from</b> : {available_from}<br>
							<b>Price Per Month</b> : {flat_price}<br>
							<div class=text-right>
								<a  href="additeam" class="btn btn-success">Details</a>
							</div>
							
						
					</div>
				</td>
				</tr>
				{/accurateSearch}

			</table>
		</center>
	</div>

</body>
</html>