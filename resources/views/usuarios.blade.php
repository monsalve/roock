<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    .container {
         max-width: 960px;
    }   

    .lh-condensed { line-height: 1.25;}
  </style>
    </head>
    <body class="bg-light">
        <div class="container mt-2">
           
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h4>Usuarios</h4></div>
        
                        <div class="card-body">
                            <input type="button" class="btn btn-success mb-2 float-right" data-toggle="modal" data-target="#registro" value="Nuevo"
                            onclick="
                                document.getElementById('nombre').value='';
                                document.getElementById('apellido').value='';
                                document.getElementById('telefono').value='';
                                document.getElementById('correo').value='';
                                document.getElementById('direccion').value='';
                                document.getElementById('id_edita').value='">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-sm">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Correo</th><th>Direccion</th><th>-</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @php $cont = 0; @endphp
                                    @foreach($registros as $usuario)
                                            @php $cont++; @endphp
                                        <tr>
                                            <td>{{$cont}}</td>                            
                                            <td>{{$usuario->nombre}}</td>
                                            <td>{{$usuario->apellido}}</td>
                                            <td>{{$usuario->telefono}}</td>
                                            <td>{{$usuario->correo}}</td>
                                            <td>{{$usuario->direccion}}</td>
                                            <td >
            
                                                <input type="button" class="btn btn-success float-right mr-2" data-toggle="modal" data-target="#registro" value="Editar" onclick="
                                                    document.getElementById('nombre').value='{{$usuario->nombre}}';
                                                    document.getElementById('apellido').value='{{$usuario->apellido}}';
                                                    document.getElementById('telefono').value='{{$usuario->telefono}}';
                                                    document.getElementById('correo').value='{{$usuario->correo}}';
                                                    document.getElementById('direccion').value='{{$usuario->direccion}}';
                                                    document.getElementById('id_edita').value='{{$usuario->id}}';
                                                ">
            
                                                <form method="POST" action="/eliminar" onsubmit="if(!confirm('esta seguro de eliminar este registro')){ return false;}">
                                                    @csrf
                                                    <input type="hidden" name="id_elimina" value="{{$usuario->id}}">
                                                    <input type="submit" class="btn btn-danger float-right mr-2" value="Eliminar">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Datos Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="guardar" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_edita" id="id_edita">
                            <div class="modal-body">
                            
                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Nombre*</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="apellido" class="col-sm-2 col-form-label">Apellido*</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telefono" class="col-sm-2 col-form-label">Telefono*</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="correo" class="col-sm-2 col-form-label">Correo*</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="correo" name="correo" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="direccion" class="col-sm-2 col-form-label">Direccion*</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        //alert("llegando");
    </script>
</html>