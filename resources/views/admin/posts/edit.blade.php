@extends('layouts.backend.admin')

@section('breadcrumb')
<section class="content-header">
    <h1>Publicaciones <small>edición de publicación</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-tags"></i> Publicaciones</a></li>
        <li class="active">Editar publicación</li>
    </ol>
</section>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Formulario de ingreso</h3>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary pull-right">&laquo; Regresar</a>
            </div>
            <div class="box-body">
                <form role="form" action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @include('admin.posts._form')

                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right">Guardar cambios &nbsp;<i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" href="/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="/admin/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
<script src="/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/admin/plugins/stringToSlug/dist/jquery.stringtoslug.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/speakingurl@14.0.1/speakingurl.min.js"></script>
<script src="/admin/bower_components/ckeditor/ckeditor.js"></script>
<script src="/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#name, #slug").stringToSlug({
            callback: function(text) {
                $("#slug").val(text);
            }
        });
    });
    $('#datepicker').datepicker({
        autoclose: true
    });
    CKEDITOR.replace('editor');
    $('.select2').select2({
        tags: true
    });
</script>
@endpush