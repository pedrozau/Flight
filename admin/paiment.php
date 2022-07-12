<?php include 'db_connect.php' ?>







<!-- Table Panel -->
<div class="col-md-8">
  <div class="card">
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Nome do Cliente</th>
            <th class="text-center">Estado do Pagamento</th>
            <th class="text-center">Data</th>
            <th class="text-center">Acção</th>
         <?php $count = 1;   ?>
         <?php $connection = $conn->query("SELECT * FROM `paiment`")?>
         <?php while($row = $connection->fetch_assoc()): ?>

          </tr>
        </thead>
        <tbody>

          <tr>
            <td class="text-center"><?php echo $count++; ?></td>

            <td class="">
               <b><?php echo $row['cliente_name']; ?></b>
            </td>

            <td class="">
               <b><?php echo $row['status_paiment']; ?></b>
            </td>

            <td class="">
               <b><?php echo $row['Date']; ?></b>
            </td>
            <td class="text-center">
              <button class="btn btn-sm btn-primary edit_airline" type="button" data-id="<?php echo $row['id'] ?>" data-airport="" >Editar</button>
              <button class="btn btn-sm btn-danger delete_airline" type="button" data-id="<?php  ?>">Eliminar</button>
            </td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Table Panel -->
<br> <br> <br>
<!-- FORM Panel -->
<div class="col-md-4">
<form action="" id="manage-airports">
  <div class="card">
    <div class="card-header">
         Pagamento
      </div>
    <div class="card-body">
        <input type="hidden" name="id">
        <div class="form-group">
          <label class="control-label">Estado do pagamento</label>
         <select class="" name="">
           <option value="">Ainda Não Pago</option>
           <option value="">Pago</option>

         </select>
        </div>

    </div>

    <div class="card-footer">
      <div class="row">
        <div class="col-md-12">
          <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Salvar</button>
          <button class="btn btn-sm btn-default col-sm-3" type="button" onclick="_reset()"> Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>

<!-- FORM Panel -->

<style>

	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	function _reset(){
		$('#cimg').attr('src','');
		$('[name="id"]').val('');
		$('#manage-airports').get(0).reset();
	}

	$('#manage-airports').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_airports',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_airline').click(function(){
		start_load()
		var cat = $('#manage-airports')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='airport']").val($(this).attr('data-airport'))
		cat.find("[name='location']").val($(this).attr('data-location'))
		end_load()
	})
	$('.delete_airline').click(function(){
		_conf("Are you sure to delete this airline?","delete_airline",[$(this).attr('data-id')])
	})
	function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
	function delete_airline($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_airports',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>
