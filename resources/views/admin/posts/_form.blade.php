<div class="row">
    <div class="col-md-8">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label for="title">Titulo de la publicación</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Título de la publicación" value="{{ old('title', $post->title ) }}">
            {!! $errors->first('title', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>')!!}
        </div>
        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
            <label for="slug">URL amigable </label> <span class="text-warning">(*Dejar el valor autogenerado, solo cambiar en caso el valor haya sido utilizado)</span>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="URL amigable" value="{{ old('slug', $post->slug) }}">
            {!! $errors->first('slug', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>')!!}
        </div>
        <div class="form-group {{ $errors->has('subtitle') ? 'has-error' : '' }}">
            <label for="subtitle">Subtítulo de la publicación</label>
            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Título de la publicación" value="{{ old('subtitle', $post->subtitle ) }}">
            {!! $errors->first('subtitle', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>')!!}
        </div>
        <div class="form-group">
            <label>Fecha de publicación</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="published_at" class="form-control pull-right" id="datepicker" value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null ) }}">
            </div>
            <!-- /.input group -->
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
            <label for="">Categorías</label>
            <select class="form-control select2" name="category_id">
                <option value="">Seleccione una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id ) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('category_id', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>')!!}
        </div>
        <div class="form-group">
            <label for="">Etiquetas</label>
            <select name="tags[]" class="form-control select2" multiple="multiple" style="width: 100%;" data-placeholder="Selecciona las etiquetas">
                @foreach ($tags as $tag)
                    <option {{ collect(old('tags', $post->tags->pluck('id') ))->contains($tag->id) ? 'selected' : ''}} value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group {{ $errors->has('image_path') ? 'has-error' : '' }}">
            <label for="image_path">Subir imagen</label>
            <input type="file" id="image_path" name="image_path">
            {!! $errors->first('image_path', '<span class="help-block">:message</span>')!!}
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
            <label for="">Extracto de la publicación</label>
            <textarea name="excerpt" class="form-control" placeholder="Extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>
            {!! $errors->first('excerpt', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
            <label for="">Contenido de la publicación</label>
            <textarea id="editor" name="content" rows="10" cols="80">{{ old('content', $post->content ) }}</textarea>
            {!! $errors->first('content', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>')!!}
        </div>
    </div>
</div>