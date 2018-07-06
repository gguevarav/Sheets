//////////////////////////////////////////////////////////////////////////////////////////////////
// Edición usuario
$(document).ready(function(){
	$(document).on('click', '.EditarUsuario', function(){
		var id=$(this).val();
		var PersonaEliminar=$('#idUsuario'+id).text();
		var NombreUsuario=$('#NombreUsuario'+id).text();
		var ApellidoUsuario=$('#ApellidoUsuario'+id).text();
		var DireccionUsuario=$('#DireccionUsuario'+id).text();
		var DPIUsuario=$('#DPIUsuario'+id).text();
		var TelefonoUsuario=$('#TelefonoUsuario'+id).text();
		var FechaNacUsuario=$('#FechaNacUsuario'+id).text();
		var CorreoUsuario=$('#CorreoUsuario'+id).text();
		var PrivilegioUsuario=$('#PrivilegioUsuario'+id).text();
	
		$('#frmEditar').modal('show');
		$('#idEditar').val(PersonaEliminar);
		$('#NombreEditar').val(NombreUsuario);
		$('#ApellidoEditar').val(ApellidoUsuario);
		$('#DireccionEditar').val(DireccionUsuario);
		$('#DPIEditar').val(DPIUsuario);
		$('#TelefonoEditar').val(TelefonoUsuario);
		$('#FechaNacEditar').val(FechaNacUsuario);
		$('#CorreoEditar').val(CorreoUsuario);
		$('#PrivilegioEditar').val(PrivilegioUsuario);
	});
});

/////////////////////////////////////////////////////////////////////////////////////////////////////
// Deshabilitar usuario
 $(document).ready(function(){
	$(document).on('click', '.DeshabilitarUsuario', function(){
 		var id=$(this).val();
		var Nombre=$('#NombreUsuario'+id).text();
		var Apellido=$('#ApellidoUsuario'+id).text();
 	
		$('#ModalDeshabilitar').modal('show');
		document.querySelector('#NombreUsuarioDeshabilitar').innerText = Nombre + " " + Apellido;
		$('#idUsuarioDeshabilitar').val(id);
 	});
 });
 
 // Habilitar usuario
 $(document).ready(function(){
	$(document).on('click', '.HabilitarUsuario', function(){
 		var id=$(this).val();
		var Nombre=$('#NombreUsuario'+id).text();
		var Apellido=$('#ApellidoUsuario'+id).text();
 	
		$('#ModalHabilitar').modal('show');
		document.querySelector('#NombreUsuarioHabilitar').innerText = Nombre + " " + Apellido;
		$('#idUsuarioHabilitar').val(id);
 	});
 });
/////////////////////////////////////////////////////////////////////////////////////////////////////
 
$(document).ready(function () {
	(function ($) {
		$('#filtrar').keyup(function () {
			var rex = new RegExp($(this).val(), 'i');
			$('.buscar tr').hide();
			$('.buscar tr').filter(function () {
				return rex.test($(this).text());
			}).show();
			
		})
		
	}(jQuery));
});