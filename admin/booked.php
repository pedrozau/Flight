<?php include 'db_connect.php' ?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Voos marcados</b>
				</large>
				
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="flight-list">
					<colgroup>
						<col width="10%">
						<col width="30%">
						<col width="50%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Informação do Cliente</th>
							<th class="text-center">Informação do voo</th>
							<th class="text-center">Acção</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$airport = $conn->query("SELECT * FROM airport_list ");
							while($row = $airport->fetch_assoc()){
								$aname[$row['id']] = ucwords($row['airport'].', '.$row['location']);
							}
							$i=1;
							$qry = $conn->query("SELECT b.*,f.*,a.airlines,a.logo_path,b.id as bid FROM  booked_flight b inner join flight_list f on f.id = b.flight_id inner join airlines_list a on f.airline_id = a.id  order by b.id desc");
							while($row = $qry->fetch_assoc()):

						 ?>
						 <tr>
						 	
						 	<td><?php echo $i++ ?></td>
						 	<td>
						 		<p>Nome :<b><?php echo $row['name'] ?></b></p>
						 		<p><small>Contacto # :<b><?php echo $row['contact'] ?></small></b></p>
						 		<p><small>Endereço :<b><?php echo $row['address'] ?></small></b></p>
						 	</td>
						 	<td>
						 		<div class="row">
						 		<div class="col-sm-4">
						 			<img src="../assets/img/<?php echo $row['logo_path'] ?>" alt="" class="btn-rounder badge-pill">
						 		</div>
						 		<div class="col-sm-6">
						 		<p>Linha Aérea :<b><?php echo $row['airlines'] ?></b></p>
						 		<p><small>Número do Avião :<b><?php echo $row['plane_no'] ?></small></b></p>
						 		<p><small>Linha Aérea :<b><?php echo $row['airlines'] ?></small></b></p>
								<p><small>Bagagem :<b><?php echo $row['bagagem'] ?></small></b></p>
						 		<p><small>Localização :<b><?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?></small></b></p>
						 		<p><small>Partida :<b><?php echo date('M d,Y h:i A',strtotime($row['departure_datetime'])) ?></small></b></p>
						 		<p><small>Chegada :<b><?php echo date('M d,Y h:i A',strtotime($row['arrival_datetime'])) ?></small></b></p>
						 		</div>
						 		</div>
						 	</td>
						 	<td class="text-center">
						 			<button class="btn btn-outline-primary btn-sm edit_booked" type="button" data-id="<?php echo $row['bid'] ?>"><i class="fa fa-edit"></i></button>
						 			<button class="btn btn-outline-danger btn-sm delete_booked" type="button" data-id="<?php echo $row['bid'] ?>"><i class="fa fa-trash"></i></button>
						 	</td>

						 </tr>

						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<style>
	td p {
		margin:unset;
	}
	td img {
	    width: 8vw;
	    height: 12vh;
	}
	td{
		vertical-align: middle !important;
	}
</style>	
<script>
	$('#flight-list').dataTable()
	$('#new_booked').click(function(){
		uni_modal("New Flight","manage_booked.php",'mid-large')
	})
	$('.edit_booked').click(function(){
		uni_modal("Edit Information","manage_booked.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_booked').click(function(){
		_conf("Are you sure to delete this data?","delete_booked",[$(this).attr('data-id')])
	})
function delete_booked($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_flight',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Flight successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>