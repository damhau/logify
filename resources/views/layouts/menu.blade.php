<li class="{!! Request::is('home*') ? 'active' : '' !!}">
    <a href="{!! url('/home') !!}" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">Home</span>
    </a>
</li><li class="{!! Request::is('alerts*') ? 'active' : '' !!}">
    <a class="nav-link nav-toggle" href="{!! route('alerts.index', ['subdomain' => 'dhc1']) !!}">
    <i class="fa fa-edit"></i>
    <span  class="title">Alerts</span></a>
</li>






