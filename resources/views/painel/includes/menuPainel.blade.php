<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="{{ route('cursos.index') }}"><i class="fa fa-link"></i> <span>Cursos</span></a></li>
    <li><a href="{{ route('disciplinas.index') }}"><i class="fa fa-link"></i> <span>Disciplinas</span></a></li>
    <li><a href="{{ route('tags.index') }}"><i class="fa fa-link"></i> <span>Tags</span></a></li>

    <li><a href="{{ route('artigos.index') }}"><i class="fa fa-link"></i> <span>Artigos</span></a></li>
    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
        </ul>
    </li>
</ul>
<!-- /.sidebar-menu -->