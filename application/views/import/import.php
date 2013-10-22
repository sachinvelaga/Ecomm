<div class="import-wrapper">
	<div>Please select the csv file to be uploaded</div>
	<div>
		<div> <form action="<?php echo site_url('import/upload_csv')?>" method="post" enctype="multipart/form-data">
				<label for="file">Filename:</label>
				<input type="file" name="file" id="file"><br>
				<input type="submit" name="submit" value="Submit">
			</form></div>
	</div>
</div>