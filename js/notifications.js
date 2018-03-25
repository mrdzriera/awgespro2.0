
    $notification = () => {
      const $notificacion = document.getElementById('notificacion');
      const $desplegar = document.getElementById('desplegar');
      if ($desplegar) {
        $desplegar.addEventListener('click', (event) => {
          $notificacion.classList.toggle('open-notifications');
        });   
      }
    }

    $help = () => {
      const $desplegarAyuda = document.getElementById('desplegarAyuda');
      const $notificacionAyuda = document.getElementById('notificacionAyuda');

      $desplegarAyuda.addEventListener('click', (event) => {
        console.log(event);
        $notificacionAyuda.classList.toggle('openHelp');
      });   
    }

    $mantenimiento = () => {
      const $desplegarMant= document.getElementById('desplegarMant');
      const $notificacionMant = document.getElementById('notificacionMant');

      $desplegarMant.addEventListener('click', (event) => {
        console.log(event);
        $notificacionMant.classList.toggle('openMant');
      });		
    }
   

  $notification();
  $help();
  $mantenimiento();