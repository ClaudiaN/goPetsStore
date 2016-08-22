@extends('layouts.app')

@section('content')
<div class="container">
       <div class="row">
            
            <div class="col-md-12">
            <form  id="f_enviar_correo" name="f_enviar_correo"  action="enviar_correo"  class="formarchivo" enctype="multipart/form-data" >

             <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 

                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Contáctenos</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="form-group">
                        <input class="form-control" placeholder="Su nombre:" id="remitente" name="remitente">
                      </div>
                      <div class="form-group">
                        <input class="form-control" placeholder="Su correo:" id="destinatario" name="destinatario">
                      </div>
                      <div class="form-group">
                        <input class="form-control" placeholder="Asunto:" id="asunto" name="asunto">
                      </div>
                      <div class="form-group">
                        <textarea id="contenido_mail" name="contenido_mail" class="form-control" style="height: 200px" placeholder="escriba aquí...">
                         
                        </textarea>
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <div class="pull-right">
                     
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> ENVIAR</button>
                      </div>
                   <br/>
                    </div><!-- /.box-footer -->
                  </div><!-- /. box -->

              </form>
            </div><!-- /.col -->
          </div><!-- /.row -->
      </div>        
@endsection
@section('scripts') 
    <script>
     
      function activareditor(){   
        $("#contenido_mail").wysihtml5();
      };

      activareditor();
    </script>
@endsection    
