@extends('layouts.backend.admin')

@section('breadcrumb')
<section class="content-header">
    <h1>
        Categorías
        <small>creación de categorías</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-tags"></i> Categorías</a></li>
        <li class="active">Crear categoría</li>
    </ol>
</section>
@endsection

@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Formulario de ingreso</h3>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary pull-right">&laquo; Regresar</a>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin.categories.store') }}" method="post">
            {{ csrf_field() }}
            <div class="box-body">
                @include('admin.categories._form')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Guardar categoría &nbsp;<i class="fa fa-save"></i></button>
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
