@extends('layouts.backend.admin')

@section('breadcrumb')
<section class="content-header">
    <h1>Publicaciones <small>lista de publicaciones</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Posts</li>
    </ol>
</section>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Listado de publicaciones</h3>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary pull-right">Crear publicación &nbsp;<i class="fa fa-plus-circle"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="table-posts" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Título</th>
                        <th style="width: 100px">Autor</th>
                        <th>Extracto</th>
                        <th style="width: 100px">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->excerpt }}</td>
                            <td>
                                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('admin.posts.edit', $post->id )}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
<script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script>
    $('#table-posts').DataTable({
    });
</script>
@endpush