<nav 
    class="navbar navbar-horizontal navbar-expand-lg navbar-dark bg-primary"
    style="position: fixed; width: 100%; top: 0; z-index: 1; padding-left:262px"
>
    <div class="container-fluid">
        <div class="col">
            <div 
                class="breadcrumb breadcrumb-dark bg-primary"
                style="margin: 0px; padding: 0px"
            >
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </div>                         
            <h6 
                class="h2 text-white d-inline-block"
                style="margin: 0px"
            >
                Default
            </h6> 
        </div>
        <ul class="navbar-nav ml-lg-auto" style="align-items: center">
            <div style="height: 24px; border-left: solid 1px rgb(232, 232, 232)"></div>
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 text-sm font-weight-bold">
                            Halo, {{ auth()->user()->username}}
                        </span>
                        </div>
                    </div>
                    </a>                    
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                    <form action="/logout" method="POST">
                    @csrf
                        <button type="submit" class="dropdown-item">
                            Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>            
    </div>
</nav>