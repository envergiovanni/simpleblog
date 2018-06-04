<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENÚ DE NAVEGACIÓN</li>
    <li {{ request()->is('admin') ? 'class=active' : '' }}>
        <a href="{{ route('admin.home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="treeview {{ request()->is('admin/categories*') ? 'active' : '' }}">
        <a href="#">
            <i class="fa fa-bars"></i>
            <span>Categorías</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-circle-o"></i> Lista de categorías</a></li>
            <li><a href="{{ route('admin.categories.create') }}"><i class="fa fa-circle-o"></i> Crear categoría</a></li>
        </ul>
    </li>
    <li class="treeview {{ request()->is('admin/tags*') ? 'active' : '' }}">
        <a href="#">
            <i class="fa fa-tags"></i> <span>Etquetas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('admin.tags.index') }}"><i class="fa fa-circle-o"></i> Lista de etiquetas</a></li>
            <li><a href="{{ route('admin.tags.create') }}"><i class="fa fa-circle-o"></i> Crear etiqueta</a></li>
        </ul>
    </li>
    <li class="treeview {{ request()->is('admin/posts*') ? 'active' : '' }}">
        <a href="#">
            <i class="fa fa-file"></i> <span>Posts</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-circle-o"></i> Lista de posts</a></li>
            <li><a href="{{ route('admin.posts.create') }}"><i class="fa fa-circle-o"></i> Crear post</a></li>
        </ul>
    </li>
</ul>