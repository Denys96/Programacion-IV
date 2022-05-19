<template>
  <div id="appInscripcion">
    <div class="row">
      <div class="col col-md-4">
        <div
          class="card text-white"
          id="carInscripcion"
        >
          <div class="card-header bg-primary">
            Registro de Inscripciones
            <button
              type="button"
              class="btn-close text-end"
              @click="cerrarForm"
            ></button>
          </div>
          <div class="card-body text-dark">
            <form
              method="post"
              @submit.prevent="guardarInscripcion"
              @reset="nuevoInscripcion"
            >
              <div class="row p-1">
                <div class="col col-md-3">Codigo</div>
                <div class="col col-md-4">
                  <input
                    v-model="inscripcion.codigo"
                    placeholder="000"
                    pattern="[A-Z0-9]{3,10}"
                    required
                    title="Codigo de inscripcion"
                    class="form-control"
                    type="text"
                  >
                </div>
              </div>
              <div class="row p-1">
                <div class="col col-md-3">Nombre</div>
                <div class="col">
                  <input
                    v-model="inscripcion.nombre"
                    placeholder="Nombre"
                    pattern="[A-Za-zÑñáéíóú ]{3,75}"
                    required
                    title="Nombre de inscripcion"
                    class="form-control"
                    type="text"
                  >
                </div>
              </div>
              <div class="row p-1">
                <div class="col col-md-3">Materia 1</div>
                <div class="col">
                  <input
                    v-model="inscripcion.materia1"
                    placeholder="Materia 1"
                    pattern="[A-Za-z0-9Ññáéíóú ]{3,100}"
                    required
                    title="Materia de inscripcion"
                    class="form-control"
                    type="text"
                  >
                </div>
              </div>
              <div class="row p-1">
                <div class="col col-md-3">Materia 2</div>
                <div class="col">
                  <input
                    v-model="inscripcion.materia2"
                    placeholder="Materia 2"
                    pattern="[A-Za-z0-9Ññáéíóú ]{3,100}"
                    required
                    title="Materia de inscripcion"
                    class="form-control"
                    type="text"
                  >
                </div>
              </div>
              <div class="row p-1">
                <div class="col col-md-3">Materia 3</div>
                <div class="col">
                  <input
                    v-model="inscripcion.materia3"
                    placeholder="Materia 3"
                    pattern="[A-Za-z0-9Ññáéíóú ]{3,100}"
                    required
                    title="Materia de inscripcion"
                    class="form-control"
                    type="text"
                  >
                </div>
              </div>
              <div class="row p-1">
                <div class="col col-md-3">Materia 4</div>
                <div class="col">
                  <input
                    v-model="inscripcion.materia4"
                    placeholder="Materia 4"
                    pattern="[A-Za-z0-9Ññáéíóú ]{3,100}"
                    required
                    title="Materia de inscripcion"
                    class="form-control"
                    type="text"
                  >
                </div>
              </div>
              <div class="row p-1">
                <div class="col col-md-3">Materia 5</div>
                <div class="col">
                  <input
                    v-model="inscripcion.materia5"
                    placeholder="Materia 5"
                    pattern="[A-Za-z0-9Ññáéíóú ]{3,100}"
                    required
                    title="Materia de inscripcion"
                    class="form-control"
                    type="text"
                  >
                </div>
              </div>
              <div class="row p-1">
                <div class="col text-center">
                  <div
                    v-if="inscripcion.mostrar_msg"
                    class="alert alert-primary alert-dismissible fade show"
                    role="alert"
                  >
                    {{ inscripcion.msg }}
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="alert"
                      aria-label="Close"
                    ></button>
                </div>
              </div>
              <div class="row p-1">
                <div class="col col-md-3">Fecha</div>
                <div class="col">
                  <input
                    title="Ingrese la fecha"
                    v-model="inscripcion.fecha"
                    pattern="{0000-00-00}"
                    required
                    type="date"
                    class="form-control form-control-sm"
                  />
                </div>
              </div>
              <div class="row p-1">
                <div class="col col-md-3">Ciclo</div>
                <div class="col">
                  <input
                    v-model="inscripcion.ciclo"
                    placeholder="ciclo"
                    pattern="[A-Za-zÑñáéíóú ]{3,75}"
                    required
                    title="Nombre de inscripcion"
                    class="form-control"
                    type="text"
                  >
                </div>
              </div>
          </div>
          <div class="row m-2">
            <div class="col text-center">
              <input
                class="btn btn-success"
                type="submit"
                value="Guardar"
              >
                <input
                  class="btn btn-warning"
                  type="reset"
                  value="Nuevo"
                >
            </div>
          </div>
          </form>
      </div>
    </div>
  </div>
  <div class="col col-md-8">
    <div
      class="card text-white"
      id="carBuscarInscripcion"
    >
      <div class="card-header bg-primary">
        Busqueda de Inscripciones
        <button
          type="button"
          @click="cerrarForm"
          class="btn-close"
          data-bs-dismiss="alert"
          data-bs-target="#carBuscarInscripcion"
          aria-label="Close"
        ></button>
      </div>
      <div class="card-body">
        <table class="table table-dark table-hover">
          <thead>
            <tr>
              <th colspan="10">
                Buscar:
                <input
                  @keyup="buscandoInscripcion"
                  v-model="buscar"
                  placeholder="buscar aqui"
                  class="form-control"
                  type="text"
                >
              </th>
            </tr>
            <tr>
              <th>CODIGO</th>
              <th>Nombre</th>
              <th>Ciclo</th>
              <th>Materia 1</th>
              <th>Materia 2</th>
              <th>Materia 3</th>
              <th>Materia 4</th>
              <th>Materia 5</th>
              <th>Fecha Inscripcion</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="item in inscripciones"
              @click='modificarInscripcion( item )'
              :key="item.idInscripcion"
            >
              <td>{{inscripcion.codigo}}</td>
              <td>{{inscripcion.nombre}}</td>
              <td>{{inscripcion.ciclo}}</td>
              <td>{{inscripcion.materia}}</td>
              <td>{{inscripcion.materia2}}</td>
              <td>{{inscripcion.materia3}}</td>
              <td>{{inscripcion.materia4}}</td>
              <td>{{inscripcion.materia5}}</td>
              <td>{{inscripcion.fecha}}</td>
              <td>
                <button
                  class="btn btn-danger"
                  @click="eliminarInscripcion(item)"
                >Eliminar</button>
              </td>
              </tr>
          </tbody>
        </table>
      </div>
  </div>
  </div>
  </div>
  </div>
</template>

<script>
export default {
  props: ["form"],
  data: () => {
    return {
      buscar: "",
      inscripciones: [],
      inscripcion: {
        accion: "nuevo",
        mostrar_msg: false,
        msg: "",
        id: 0,
        idInscripcion: "",
        codigo: "",
        nombre: "",
        direccion: "",
        telefono: "",
        dui: ""
      }
    };
  },
  methods: {
    cerrarForm() {
      this.form["inscripcion"].mostrar = false;
    },
    async sincronizarDatosServidor(inscripcion, metodo, url) {
      await axios({
        method: metodo,
        url,
        data: inscripcion
      })
        .then(resp => {
          if (inscripcion.accion == "nuevo") {
            inscripcion.id = resp.data.id;
            this.insertarLocal(inscripcion); //actualizar el id del inscripcion que se genero en el servidor con laravel y mysql
          }
          this.inscripcion.msg = `Inscripcion procesado ${data.msg}`;
        })
        .catch(err => {
          this.inscripcion.msg = `Error al procesar el inscripcion ${err}`;
        });
    },
    insertarLocal(inscripcion) {
      let store = this.abrirStore("inscripcion", "readwrite"),
        query = store.put(inscripcion);
      query.onsuccess = e => {
        this.nuevoInscripcion();
        this.obtenerDatos();
        this.inscripcion.msg = "Inscripcion procesado con exito";
      };
      query.onerror = e => {
        this.inscripcion.msg = `Error al procesar el inscripcion ${
          e.target.error
        }`;
      };
    },
    buscandoInscripcion() {
      this.obtenerDatos(this.buscar);
    },
    eliminarInscripcion(inscripcion) {
      if (
        confirm(`Esta seguro de eliminar el inscripcion ${inscripcion.nombre}?`)
      ) {
        inscripcion.accion = "eliminar";
        let store = this.abrirStore("inscripcion", "readwrite"),
          query = store.delete(inscripcion.idInscripcion),
          metodo = "DELETE",
          url = `/inscripcion/${inscripcion.id}`;
        this.sincronizarDatosServidor(inscripcion, metodo, url);
        query.onsuccess = e => {
          this.nuevoInscripcion();
          this.obtenerDatos();
          this.inscripcion.msg = "Inscripcion eliminado con exito";
        };
        query.onerror = e => {
          this.inscripcion.msg = `Error al eliminar el inscripcion ${
            e.target.error
          }`;
        };
      }
      this.nuevoInscripcion();
    },
    modificarInscripcion(datos) {
      this.inscripcion = JSON.parse(JSON.stringify(datos));
      this.inscripcion.accion = "modificar";
    },
    guardarInscripcion() {
      let metodo = "PUT",
        url = `/inscripcion/${this.inscripcion.id}`;
      if (this.inscripcion.accion == "nuevo") {
        this.inscripcion.idInscripcion = generarIdUnicoFecha();
        metodo = "POST";
        url = "/inscripcion";
      }
      let inscripcion = JSON.parse(JSON.stringify(this.inscripcion));
      this.sincronizarDatosServidor(inscripcion, metodo, url);
      this.insertarLocal(inscripcion);
    },
    obtenerDatos(valor = "") {
      let store = this.abrirStore("inscripcion", "readonly"),
        data = store.getAll();
      data.onsuccess = e => {
        if (data.result.length <= 0) {
          fetch(`inscripcion`, { credentials: "same-origin" })
            .then(res => res.json())
            .then(data => {
              this.inscripciones = data;
              data.map(inscripcion => {
                let store = this.abrirStore("inscripcion", "readwrite"),
                  query = store.put(inscripcion);
                query.onsuccess = e => {
                  console.log(`Inscripcion ${inscripcion.nombre} guardado`);
                };
                query.onerror = e => {
                  console.log(
                    `Error al guardar el inscripcion ${e.target.error}`
                  );
                };
              });
            })
            .catch(err => {
              this.inscripcion.msg = `Error al guardar el inscripcion ${err}`;
            });
        }
        this.inscripciones = data.result.filter(
          inscripcion =>
            inscripcion.nombre.toLowerCase().indexOf(valor.toLowerCase()) > -1
        );
      };
      data.onerror = e => {
        this.inscripcion.msg = `Error al obtener los inscripciones ${
          e.target.error
        }`;
      };
    },
    nuevoInscripcion() {
      this.inscripcion.accion = "nuevo";
      this.inscripcion.msg = "";
      this.inscripcion.idInscripcion = "";
      this.inscripcion.codigo = "";
      this.inscripcion.nombre = "";
      this.inscripcion.direccion = "";
      this.inscripcion.telefono = "";
      this.inscripcion.dui = "";
    },
    abrirStore(store, modo) {
      return db.transaction(store, modo).objectStore(store);
    }
  },
  created() {
    //this.obtenerDatos();
  }
};
</script>