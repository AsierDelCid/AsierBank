
function clienteagregado () {
    M.toast({html: 'Se ha agregado correctamente'});
}

function errorcliente () {
    
  var toastHTML = '<span>Se ha producido un error &nbsp;&nbsp; </span><a href="../clientes/agregarcliente.php">Reintentar</a>';
  M.toast({html: toastHTML});
}

function campos () {
  var toastHTML = '<span>Complete todos los campos &nbsp;&nbsp; </span><a href="agregarcliente.php">Reintentar</a>';
  M.toast({html: toastHTML});
}

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.datepicker');
  var instances = M.Datepicker.init(elems, options);
});

function dniusado () {
  M.toast({html: 'El DNI introducido ya esta usado'});
}

function eliminasi () {
  M.toast({html: 'Se ha eliminado correctamente'});
}

function datosno () {
  M.toast({html: 'No existen los datos introducidos'});
}

function nomoney () {
  M.toast({html: 'Esta cuenta no tiene dinero'});
}


function IngresoOk () {
  M.toast({html: 'Ingreso realizado correctamente'});
}

function erroregister () {
    
  var toastHTML = '<span>Se ha producido un error &nbsp;&nbsp; </span><a href="../login/register.php">Reintentar</a>';
  M.toast({html: toastHTML});
}

function error () {
  M.toast({html: 'Se ha producido un error'});
}

function dninexist () {
  M.toast({html: 'No existe ese DNI'});
}

function revisedatos () {
  M.toast({html: 'Revise los datos introducidos'});
}

function falseconf () {
  M.toast({html: 'La confirmación es distinta al PIN'});
}

function excha () {
  M.toast({html: 'La maxima cantidad de dígitos es 6'});
}

function excha2 () {
  M.toast({html: 'La mínima cantidad de dígitos es 4'});
}

function pinOk () {
  M.toast({html: 'Se agregó correctamente el PIN'});
}

function sesioncerrada () {
  M.toast({html: 'Se ha cerrado sesión'});
}

function blocked () {
  M.toast({html: 'Esta cuenta está suspendida'});
}

function blockedt () {
  M.toast({html: 'Esta cuenta está bloqueada temporalmente'});
}

function unban () {
  M.toast({html: 'Esta cuenta ha sido desbloqueada'});
}

function falseuser () {
  M.toast({html: 'La confirmación es distinta al PIN'});
}

function actualizado () {
  M.toast({html: 'Se ha actualizado correctamente'});
}

function comprueba () {
  M.toast({html: 'Compruebe los datos introducidos'});
}

function notu () {
  M.toast({html: 'No se puede promover a si mismo'});
}

function masuser () {
  M.toast({html: 'Se agregó al usuario'});
}

function confirmaciono () {
  M.toast({html: 'La confirmación es distinta'});
}

function mismorango () {
  M.toast({html: 'La cuenta tiene el mismo rango que tu'});
}

function menorango () {
  M.toast({html: 'La cuenta tiene más rango que tu'});
}

function eliminadofast () {
  M.toast({html: 'Se ha eliminado correctamente'});
}

function userused () {
  M.toast({html: 'Nombre de usuario en uso'});
}

function prestamoOk () {
  M.toast({html: 'Se agregó correctamente el Préstamo'});
}

function pagato () {
  M.toast({html: 'El préstamo ya ha sido pagado'});
}

function prestamoYa () {
  M.toast({html: 'Esta cuenta tiene otro préstamo activo'});
}

function nomasps () {
  M.toast({html: 'No se puede pagar más del préstamo'});
}

function flash () {
  M.toast({html: 'Se ha activado FlashPhone'});
}

function flashed () {
  M.toast({html: 'Ya tienes activado FlashPhone'});
}

function enviartuno () {
  M.toast({html: 'No puedes enviarte dinero a ti mismo'});
}

function moremoney () {
  M.toast({html: 'Tu cuenta no tiene suficiente dinero'});
}


function transferido () {
  M.toast({html: 'Se ha transferido correctamente el dinero'});
}

function noflashfor () {
  M.toast({html: 'Esta persona no ha activado el FlashPhone'});
}


function guardararch() {
html2canvas(document.body, {
  onrendered (canvas) {
    var link = document.getElementById('dersasta');;
    var image = canvas.toDataURL();
    link.href = image;
    link.download = 'recibo.png';
  }
 })};

 function imprimirpantalla () {
  window.print();
}

function teleusado () {
  M.toast({html: 'Este teléfono ya está en uso'});
}


function readednow () {
  M.toast({html: 'Notificación leída'});
}


function notifysend () {
  M.toast({html: 'Se ha enviado la notificación'});
}

function userinvalid () {
  M.toast({html: 'Nombre y Apellidos Inválidos'});
}

function deletnot () {
  M.toast({html: 'Se ha borrado la notificación'});
}

function prestsend () {
  M.toast({html: 'Se ha enviado la solicitud'});
}

function morenote () {
  M.toast({html: 'No se puede enviar tanto dinero por teléfono'});
}

function contratado () {
  M.toast({html: 'Contratado'});
}

function despro () {
  M.toast({html: 'Se ha desactivado el plan PRO'});
}

function notuno () {
  M.toast({html: 'No puedes enviarte una notificación a ti mismo'});
}


function permitdes () {
  M.toast({html: 'Has permitido el envio de notificaciones desconocidas'});
}


function nopedes () {
  M.toast({html: 'Has prohibido el envio de notificaciones desconocidas'});
}

function nopermit () {
  M.toast({html: 'Esta persona no tiene permitidas las notificaciones desconocidas'});
}

function cambiaplan () {
  M.toast({html: 'Cambia de plan para relizar esta acción'});
}

function notant () {
  M.toast({html: 'No puede transferir tanto dinero por teléfono'});
}
