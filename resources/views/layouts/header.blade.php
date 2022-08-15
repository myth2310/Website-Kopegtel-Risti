<nav 
    class="navbar navbar-horizontal navbar-expand-lg navbar-dark bg-primary"
    style="position: fixed; width: 100%; top: 0; z-index: 1; padding-left:262px"
>
    <div class="container-fluid">
        
        <ul style="margin: 0px; padding: 0px">
            <div class="col">
                <?php 
                    $link = "";
                    $prev = "";
                    $now = "";
                ?>
                <ol 
                    class="breadcrumb breadcrumb-dark bg-primary"
                    style="margin: 0px; padding: 0px"
                >            
                    <li class="breadcrumb-item">
                        <a href="/dashboard">Kopegtel Risti</a>
                    </li>                        
                    @for($i = 1; $i <= count(Request::segments()); $i++)
                        @if($i < count(Request::segments()) && $i > 0)
                            <?php $link = "/".Request::segment($i); ?>
                            <li class="breadcrumb-item active"> {{ ucwords(str_replace('-',' ',Request::segment($i)))}} </li>
                            <?php $now = ucwords(str_replace('-',' ',Request::segment($i))); ?>
                            @if ($i == 1 )
                                <?php $prev = ucwords(str_replace('-',' ',Request::segment($i))); ?>                                
                            @endif
                        @elseif ($i < 3)
                            <li class="breadcrumb-item active"> {{ucwords(str_replace('-',' ',Request::segment($i)))}} </li>
                            <?php $now = ucwords(str_replace('-',' ',Request::segment($i))); ?>
                        @endif
                    @endfor
                </ol>
                <h6 
                    class="h2 text-white d-inline-block"
                    style="margin: 0px"
                >
                    @if ($prev == "")
                        {{$now}}
                    @else       
                        @if ($now =="Create")                            
                            {{$now}} New {{$prev}}
                        @else  
                            {{$now}} {{$prev}}
                        @endif                 
                    @endif
                </h6>             
            </div>
        </ul>

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