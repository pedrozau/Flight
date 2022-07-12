<?php include 'db_connect.php' ?>
<?php 

if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM flight_list where id=".$_GET['id']);
	foreach($qry->fetch_array() as $k => $val){
		$$k = $val;
	}
}

?>
<div class="container-fluid">
	<div class="col-lg-12">
		<form id="manage-flight">
			<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="" class="control-label">Linha aérea</label>
						<select name="airline" id="airline" class="custom-select browser-default select2">
							<option></option>
							<?php 
							$airline = $conn->query("SELECT * FROM airlines_list order by airlines asc");
							while($row = $airline->fetch_assoc()):
							?>
								<option value="<?php echo $row['id'] ?>" <?php echo isset($airline_id) && $airline_id == $row['id'] ? "selected" : '' ?>><?php echo $row['airlines'] ?></option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="">Avião Nr</label>
						<textarea name="plane_no" id="" cols="30" rows="2" class="form-control"><?php echo isset($plane_no) ? $plane_no : '' ?></textarea>
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
					<div class="">
						<label for="">Local de embarque</label>
						<select name="departure_airport_id" id="departure_location" class="custom-select browser-default select2">
							<option value=""></option>
						<?php
							$airport = $conn->query("SELECT * FROM airport_list order by airport asc");
						while($row = $airport->fetch_assoc()):
						?>
							<option value="<?php echo $row['id'] ?>" <?php echo isset($departure_airport_id) && $departure_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'].", ".$row['airport'] ?></option>
						<?php endwhile; ?>
						</select>

					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Local de desembarque</label>
						<select name="arrival_airport_id" id="arrival_airport_id" class="custom-select browser-default select2">

							<option value=""></option>

						<?php
							$airport = $conn->query("SELECT * FROM airport_list order by airport asc");
						while($row = $airport->fetch_assoc()):
						?>
							<option value="<?php echo $row['id'] ?>" <?php echo isset($arrival_airport_id) && $arrival_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'].", ".$row['airport'] ?></option>
						<?php endwhile; ?>
						</select>

					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
					<div class="">
						<label for="">Partida Data/hora</label>
						<input type="text" name="departure_datetime" id="departure_datetime" class="form-control datetimepicker" value="<?php echo isset($departure_datetime) ? date("Y-m-d H:i",strtotime($departure_datetime)) : '' ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Aterragem Data/hora</label>
						<input type="text" name="arrival_datetime" id="arrival_datetime" class="form-control datetimepicker" value="<?php echo isset($arrival_datetime) ? date("Y-m-d H:i",strtotime($arrival_datetime)) : '' ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="">
						<label for="">Assentos</label>
						<input name="seats" id="seats" type="number" step="any" class="form-control text-right" value="<?php echo isset($seats) ? $seats : '' ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Preço</label>
						<input name="price" id="price" type="number" step="any" class="form-control text-right" value="<?php echo isset($price) ? $price : '' ?>">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.select2').each(function(){
		$(this).select2({
		    placeholder:"Selecione aqui",
		    width: "100%"
		  })
	})
	})
	 $('.datetimepicker').datetimepicker({
      format:'Y-m-d H:i',
  })
	 $('#manage-flight').submit(function(e){
	 	e.preventDefault()
	 	start_load()
	 	$.ajax({
	 		url:'ajax.php?action=save_flight',
	 		method:'POST',
	 		data:$(this).serialize(),
	 		success:function(resp){
	 			if(resp == 1){
	 				alert_toast("Actualização do Voo salvo com sucesso.","successo");
	 				setTimeout(function(e){
	 					location.reload()
	 				},1500)
	 			}
	 		}
	 	})
	 })
	 $('.datetimepicker').attr('autocomplete','off')
</script>