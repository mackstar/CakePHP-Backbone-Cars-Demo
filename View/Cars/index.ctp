<script type="text/template" id="stats">
	
	<h2>
		There are 
		<%= items %> completed <%= items == 1 ? 'item' : 'items' %>
	</h2>

</script>

<script type="text/template" id="car-detail">
	<td><%= maker %></td>
	<td><%= model %></td>
	<td><a class="destroy">Remove</a></td>
</script>


<table id="cars-container">
	<tr>
		<td colspan="3">
			<form id="add-car">
				<label for="model">Model</label><input type="text" name="model" value="">
				<label for="maker">Maker</label><input type="text" name="maker" value="">
				<input type="submit" name="Add" value="Add">
				</form>
		</td>
	</tr>
</div>


<?php echo $this->AssetCompress->script('backbone-base'); ?>
<?php echo $this->AssetCompress->script('cars'); ?>