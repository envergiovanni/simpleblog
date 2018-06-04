<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name">Nombre de la categoría</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre de la categoría" value="{{ old('name', $category->name ) }}">
    {!! $errors->first('name', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>')!!}
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label for="slug">URL amigable</label>
    <input type="text" class="form-control" name="slug" id="slug" placeholder="URL amigable" value="{{ old('slug', $category->slug ) }}">
    {!! $errors->first('slug', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>')!!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description">Descripción de la categoría</label>
    <textarea class="form-control" id="description" name="description" placeholder="Ingrese descripción de la categoría">{{ old('description', $category->description ) }}</textarea>
    {!! $errors->first('description', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>')!!}
</div>