<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#"><i class="menu-icon fa fa-folder"></i>Dashboard </a>
                </li>
                <li class="menu-title">Actions</li><!-- /.menu-title -->
                <li class="menu-item-has-children ">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-file"></i> Prendre un ticket</a>
                    
                </li>
                <li class="menu-item-has-children ">
                    <a href="{{ route('historique.ticket',Auth::user()->id ) }}"  ><i class="menu-icon fa fa-file"></i> Mes tickets</a>
                    
                </li>
                <li class="menu-item-has-children ">
                    <a href="{{ route('statistique.ticket',Auth::user()) }}"   ><i class="menu-icon fa fa-file"></i> Statistiques</a>
                    
                </li>
               
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

    <style>
        .navbar .navbar-nav li.menu-item-has-children a:before {
        content: none;
        position: absolute;
        }
        .navbar .navbar-nav li > a .menu-icon{
            width: 20px !important;
        }
    </style>
</aside>