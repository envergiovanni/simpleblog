<!-- Search Widget -->
<div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button">Go!</button>
          </span>
        </div>
    </div>
</div>

<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Categorías</h5>
    <ul class="list-group">
        @foreach ($categories as $category)
            <a href="{{ route('page.category', $category->slug ) }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>
        @endforeach
    </ul>
</div>

<div class="card my-4">
    <h5 class="card-header">Etiquetas</h5>
    <div class="card-body">
        <div class="row">
            @foreach ($tags as $tag)
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{ route('page.tag', $tag->slug )}}">{{ $tag->name }}</a>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>