<?php for($i = 0; $i < $_GET['count']; $i++ ): ?>
<hr>
<div class="row">
	<div class="col-md-6">
		<label class="control-label">Nome</label>
		<input type="text" name="name[]" class="form-control">
	</div>
	<div class="col-md-6">
		<label class="control-label">Contacto</label>
		<input type="text" name="contact[]" class="form-control">
	</div>

	<div class="col-md-6">
		<label class="control-label">Número do passaporte</label>
		<input type="text" name="passporte[]" class="form-control">
	</div>

	<div class="col-md-6">
		<label class="control-label">Deseja registar bagagem?</label><br>
		<input type="radio" name="bagagem" value="sim">Sim <br> 
		<input type="radio" name="bagagem" value="nao">Nao
	</div>
</div>

<div class="row">
<div class="form-group col-md-12">
	<label class="control-label">Endereço</label>
	<textarea name="address[]" id="" cols="30" rows="2" class="form-control"></textarea>
</div>
</div>


<?php endfor; ?>