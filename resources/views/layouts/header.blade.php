<nav 
    class="navbar navbar-horizontal navbar-expand-lg navbar-dark bg-primary"
    style="position: fixed; width: 100%; top: 0; z-index: 1;"
>
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbar-default">            
            <ul class="navbar-nav ml-lg-auto" style="align-items: center">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#">
                        <span class="iconify" data-icon="majesticons:bell" style="color: #f5f5f5; font-size: 24px;"></span>
                        <span class="nav-link-inner--text d-lg-none">
                            Notification
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#">
                        <span class="iconify" data-icon="majesticons:settings-cog" style="color: #f5f5f5; font-size: 24px;"></span>
                        <span class="nav-link-inner--text d-lg-none">
                            Setting
                        </span>
                    </a>
                </li>
                <div style="height: 24px; border-left: solid 1px rgb(232, 232, 232)"></div>
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                          <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm font-weight-bold">
                                Admin
                            </span>
                          </div>
                        </div>
                      </a>                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="#">
                            My Profile
                        </a>
                        <div class="dropdown-divider"></div>
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
    </div>
</nav>