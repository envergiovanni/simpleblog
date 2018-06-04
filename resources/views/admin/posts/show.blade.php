@extends('layouts.backend.admin')

@section('breadcrumb')
    <section class="content-header">
        <h1>Publicaciones <small>ver publicación</small></h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-tags"></i> Publicaciones</a></li>
            <li class="active">Ver publicación</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title">{{ $post->title }} &raquo; {{ $post->subtitle }}</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="">
                    <dt>Título</dt>
                    <dd>{{ $post->title }}</dd>
                    <dt>Subtítulo</dt>
                    <dd>{{ $post->subtitle }}</dd>
                    <dt>Categoría</dt>
                    <dd>{{ $post->category->name }}</dd>
                    <dt>Autor</dt>
                    <dd>{{ $post->user->name }}</dd>
                    <dt>Extracto</dt>
                    <dd>{{ $post->excerpt }}</dd>
                    <dt>Contenido</dt>
                    <dd>{!! $post->content !!}</dd>
                    <dt>Etiquetas</dt>
                    <dd>
                        @foreach ($post->tags as $tag)
                            <span class="">{{ $tag->name }}</span> ||
                        @endforeach
                    </dd>
                </dl>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary pull-right">&laquo; Regresar</a>
            </div>
            <div class="box-body">
                <!--<img src="/storage/images/name-image" class="img-responsive" alt="">-->
                <img src="{{ asset($post->image_path) }}" class="img-responsive" alt="">
                <hr>
                <a href="{{ route('admin.posts.edit', $post->id )}}" class="btn btn-success btn-block"><i class="fa fa-edit"></i> Editar publicación</a>
                <button type="button" class="btn btn-danger btn-delete btn-block" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"></i> Eliminar publicación</button>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Eliminar publicación</h4>
                </div>
                <div class="modal-body">
                    <p>¿ Está seguro de eliminar la publicación ?</p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="/admin/posts/{{ $post->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-outline">Confirmar</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection