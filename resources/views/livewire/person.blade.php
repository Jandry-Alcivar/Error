{{-- <div>
    <div>
   


        <form action="">
            @csrf
            <div>
                <label for="">Tipo de persona</label>
                <select wire:model="tipo">
                    @foreach ($tipos as $item)
                     <option value="{{$item->id}}">{{$item->tipo}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Nombre</label>
                <input type="text" wire:model="nombres">
            </div>
            <div>
                <label for="">Cedula</label>
                <input type="text" wire:model="cedula">
            </div>
            <div>
            <button wire:click="guardar()">Registrar</button>
            </div>
        </form>               
        </div>
</div> --}}

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Registro</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
        @csrf
        <div class="card-body">
            <label for="">Tipo de persona</label>
            <select wire:model="tipo">
                @foreach ($tipos as $item)
                 <option value="{{$item->id}}">{{$item->tipo}}</option>
                @endforeach
            </select>
        </div>

      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nombres</label>
          <input type="text"  wire:model="nombres" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Cedula</label>
          <input type="text" wire:model="cedula" class="form-control" id="exampleInputPassword1" placeholder="Cedula">
        </div>
        {{-- <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> --}}
      </div>

      <div class="card-footer">
        <button type="submit" wire:click="guardar()" class="btn btn-primary">Registrar</button>

        
      </div>
    </form>
  </div>

  <div class="row">
    <div class="card col-md-12 ">
      <div class="card-header">
        <h3 class="card-title">:: Listado ::</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr style="text-align: center">
            <th>Id</th>
            <th>Nombre</th>
            <th>Cedula</th>
            <th>Tipo</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($personas as $item)
            <tr style="text-align: center">
              <td>{{$loop->index+1}}</td>
              <td>{{$item->nombres}}</td>
              <td>{{$item->cedula}}</td>
              <td>{{$item->tipo_id}}</td>
              <td style="text-align: center">
                <form  style="float: left; margin-right: 10px; margin-left: 45%"  method="get" action="{{ url('persona', $item->id)}}">
                  @csrf
                  <section class="content">
                    <div class="container-fluid">
                      <div class="row">
                            <div class="card-body"
                              <button type="submit" class="btn btn-primary" style="border: none"data-toggle="modal" data-target="#modal-primary" >
                                <i class="fas fa-edit"></i>
                              </button>
                              </div>
                      </div>
                    </div>
                    <div class="modal fade" id="modal-primary">
                      <div class="modal-dialog">
                        <div class="modal-content bg-primary">
                          <div class="modal-header">
                            <h4 class="modal-title">Editar Persona</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form>
                              @csrf
                              <div class="card-body">
                                  <label for="">Tipo de persona</label>
                                  <select wire:model="tipo">
                                      @foreach ($tipos as $item)
                                       <option value="{{$item->id}}">{{$item->tipo}}</option>
                                      @endforeach
                                  </select>
                              </div>
                      
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nombres</label>
                                <input type="text"  wire:model="nombres" class="form-control" id="exampleInputEmail1" placeholder="{{$item->nombres}}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Cedula</label>
                                <input type="text" wire:model="cedula" class="form-control" id="exampleInputPassword1" placeholder="{{$item->cedula}}">
                              </div>
                            </div>
                          </form>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <button type="submit" wire:click="edit()" class="btn btn-outline-light">Actualizar</button>                                                
                          </div>
                        </div>
                    
                      </div>
                      
                    </div>
                  </section>
                  
                    
                
                </form>
                <form  style="float: left;text-align: center" method="post" action="{{ url('persona', $item->id)}}">
                  @method('delete')
                  @csrf
                  <button  type="submit" style="border: none" >
                    <i class="fas fa-trash"></i>
                 </button>
                </form>
            </td>
            </tr> 
                 
  
            @endforeach
    
          </tbody>
     
        </table>
      </div>

{{--       <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
      
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
      </head>
      <body class="hold-transition sidebar-mini">
      <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

          <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
              </a>
              <div class="navbar-search-block">
                <form class="form-inline">
                  <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                      <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
      
         
           
            <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
              </a>
            </li>
          </ul>
        </nav>
   
        <div class="content-wrapper">
      
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary card-outline">
                    <div class="card-body"
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                        Launch Primary Modal
                      </button>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modal-primary">
              <div class="modal-dialog">
                <div class="modal-content bg-primary">
                  <div class="modal-header">
                    <h4 class="modal-title">Primary Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>One fine body&hellip;</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-light">Save changes</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
          <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
          </div>
          <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
      
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div> --}}
      <!-- ./wrapper -->
      
      <!-- jQuery -->
      <script src="../../plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- SweetAlert2 -->
      <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
      <!-- Toastr -->
      <script src="../../plugins/toastr/toastr.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../../dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../dist/js/demo.js"></script>
      <!-- Page specific script -->
      <script>
        $(function() {
          var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
      
          $('.swalDefaultSuccess').click(function() {
            Toast.fire({
              icon: 'success',
              title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.swalDefaultInfo').click(function() {
            Toast.fire({
              icon: 'info',
              title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.swalDefaultError').click(function() {
            Toast.fire({
              icon: 'error',
              title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.swalDefaultWarning').click(function() {
            Toast.fire({
              icon: 'warning',
              title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.swalDefaultQuestion').click(function() {
            Toast.fire({
              icon: 'question',
              title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
      
          $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
          });
          $('.toastrDefaultInfo').click(function() {
            toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
          });
          $('.toastrDefaultError').click(function() {
            toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
          });
          $('.toastrDefaultWarning').click(function() {
            toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
          });
      
          $('.toastsDefaultDefault').click(function() {
            $(document).Toasts('create', {
              title: 'Toast Title',
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.toastsDefaultTopLeft').click(function() {
            $(document).Toasts('create', {
              title: 'Toast Title',
              position: 'topLeft',
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.toastsDefaultBottomRight').click(function() {
            $(document).Toasts('create', {
              title: 'Toast Title',
              position: 'bottomRight',
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.toastsDefaultBottomLeft').click(function() {
            $(document).Toasts('create', {
              title: 'Toast Title',
              position: 'bottomLeft',
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.toastsDefaultAutohide').click(function() {
            $(document).Toasts('create', {
              title: 'Toast Title',
              autohide: true,
              delay: 750,
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.toastsDefaultNotFixed').click(function() {
            $(document).Toasts('create', {
              title: 'Toast Title',
              fixed: false,
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.toastsDefaultFull').click(function() {
            $(document).Toasts('create', {
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
              title: 'Toast Title',
              subtitle: 'Subtitle',
              icon: 'fas fa-envelope fa-lg',
            })
          });
          $('.toastsDefaultFullImage').click(function() {
            $(document).Toasts('create', {
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
              title: 'Toast Title',
              subtitle: 'Subtitle',
              image: '../../dist/img/user3-128x128.jpg',
              imageAlt: 'User Picture',
            })
          });
          $('.toastsDefaultSuccess').click(function() {
            $(document).Toasts('create', {
              class: 'bg-success',
              title: 'Toast Title',
              subtitle: 'Subtitle',
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.toastsDefaultInfo').click(function() {
            $(document).Toasts('create', {
              class: 'bg-info',
              title: 'Toast Title',
              subtitle: 'Subtitle',
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.toastsDefaultWarning').click(function() {
            $(document).Toasts('create', {
              class: 'bg-warning',
              title: 'Toast Title',
              subtitle: 'Subtitle',
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.toastsDefaultDanger').click(function() {
            $(document).Toasts('create', {
              class: 'bg-danger',
              title: 'Toast Title',
              subtitle: 'Subtitle',
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
          $('.toastsDefaultMaroon').click(function() {
            $(document).Toasts('create', {
              class: 'bg-maroon',
              title: 'Toast Title',
              subtitle: 'Subtitle',
              body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
          });
        });
      </script>
      </body>
      </html>
      





{{-- 


  <table border="1">
        
    <tr>
  
      <td>Nombre</td>
  
      <td>Cedula</td>
  
      <td>Acciones</td>
  
    </tr>
  
    @foreach ($personas as $item)
       
    <tr>
  
        <td>{{$item->nombres}}</td>
    
        <td>{{$item->cedula}}</td>
    
        <td>Celda 6</td>
    
      </tr>

    @endforeach
  
  </table> --}}