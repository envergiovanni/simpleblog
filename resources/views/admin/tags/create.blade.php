@extends('layouts.backend.admin')

@section('breadcrumb')
<section class="content-header">
    <h1>
        Etiquetas
        <small>creación de etiquetas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.tags.index') }}"><i class="fa fa-tags"></i> Etiquetas</a></li>
        <li class="active">Crear etiqueta</li>
    </ol>
</section>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Formulario de etiquetas</h3>
                <a href="{{ route('admin.tags.index') }}" class="btn btn-primary pull-right">&laquo; Regresar</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('admin.tags.store') }}" method="post">
                {{ csrf_field() }}
                <div class="box-body">
                    @include('admin.tags._form')
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Guardar etiqueta &nbsp;<i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
@endsection

@push('scripts')
<script src="/admin/plugins/stringToSlug/dist/jquery.stringtoslug.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/speakingurl@14.0.1/speakingurl.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#name, #slug").stringToSlug({
            callback: function(text) {
                $("#slug").val(text);
            }
        });
    })
</script>
@endpush
