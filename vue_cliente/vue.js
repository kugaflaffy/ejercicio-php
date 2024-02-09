var app=new Vue ({
    el: '#nombrecito',
    data:{
        animal : ''
    } 
})

var app=new Vue({
el: '#muchosif',
data:{ 
    numero : -10
}
})


var app=new Vue({
el: '#unfor',
data:{ 
    personajes: ['my melody', 'kuromi', 'cinna', 'dani', 'keropi', 'pochacco']
}
})

var app=new Vue({
    el: '#on',
    data:{ 
        contadorcito: 0
    },
         
})

var app = new Vue({
    el: '#app',
    data: {
      mensaje: '',
      mensajeEnviado: ''
    },
    methods: {
      enviarFormulario: function() {
        this.mensajeEnviado = 'Mensaje enviado: ' + this.mensaje;
        this.mensaje = ''; // Limpiar el campo de entrada después de enviar el mensaje
      }
    }
  });

  var app=new Vue({
    el: '#css',
    data: { 
      tamañoFuente: 20,
      colorParrafo: '#000'
    }
})

    var app=new Vue({
        el: '#vbind',
        data:{ 
            actividad: '',
            actividades: []
        },
        methods: {
            actualizarLista: function() {
                this.actividades.push(this.actividad);
                this.actividad = '';
            }
        }
        })




