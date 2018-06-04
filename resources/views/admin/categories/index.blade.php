@extends('layouts.backend.admin')

@section('breadcrumb')
<section class="content-header">
    <h1>Categorías <small>lista de categorías</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Categorías</li>
    </ol>
</section>
@endsection

@section('content')
<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de categorías</h3>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary pull-right">Crear categoría <i class="fa fa-plus-circle"></i></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="table-categories" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nombre</th>
                    <th>Description</th>
                    <th style="width: 100px">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id )}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('admin.categories.destroy', $category->id ) }}" method="POST" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Eliminar categoría" data-message="Está seguro de eliminar la categoría ?"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>

    <!-- Modal Dialog -->
    <div class="modal modal-danger fade" id="confirmDelete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Parmanently</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure about this ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline" id="confirm">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
<script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    //Dialog show event handler
    $('#confirmDelete').on('show.bs.modal', function(e) {
        $message = $(e.relatedTarget).attr('data-message');
        $(this).find('.modal-body p').text($message);
        $title = $(e.relatedTarget).attr('data-title');
        $(this).find('.modal-title').text($title);
        // Pass form reference to modal for submission on yes/ok
        var form = $(e.relatedTarget).closest('form');
        $(this).find('.modal-footer #confirm').data('form', form);
    });
    // Form confirm (yes/ok) handler, submits form
    $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
        $(this).data('form').submit();
    });

    $('#table-categories').DataTable({
    });
</script>
@endpush