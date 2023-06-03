<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  {{-- <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" width="30px" height="30px"
      src="{{ asset('valiadmin/images/jodykrido.jpg')}}" alt="User Image">
    <div>
      <p class="app-sidebar__user-name">@auth {{ Auth::user()->name }} @endauth </p>
      <p class="app-sidebar__user-designation">@auth {{ Auth::user()->level }} @endauth</p>
    </div>
  </div> --}}
  <ul class="app-menu">
    <li><a class="app-menu__item @if ($title == 'Dashboard') active @endif" href="/"><i class="app-menu__icon fa fa-dashboard"></i><span
          class="app-menu__label">Dashboard</span></a></li>
    <li><a class="app-menu__item @if ($title == 'Suppliers') active @endif" href="/supplier"><i class="app-menu__icon fa fa-truck"></i><span
          class="app-menu__label">Suppliers</span></a></li>
    <li><a class="app-menu__item @if ($title == 'Customers') active @endif" href="/customer"><i class="app-menu__icon fa fa-users"></i><span
          class="app-menu__label">Customers</span></a></li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
          class="app-menu__icon fa fa-archive"></i><span class="app-menu__label">Product</span><i
          class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item @if ($title == 'Categores') active @endif" href="/category"><i class="icon fa fa-circle-o"></i> Categores</a></li>
        <li><a class="treeview-item @if ($title == 'Units') active @endif" href="/unit"><i class="icon fa fa-circle-o"></i> Units</a></li>
        <li><a class="treeview-item @if ($title == 'Items') active @endif" href="/item"><i class="icon fa fa-circle-o"></i> Items</a></li>
      </ul>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
          class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Transaction</span><i
          class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item @if ($title == 'Sales') active @endif" href="/sale"><i class="icon fa fa-circle-o"></i> Sales</a></li>
        <li><a class="treeview-item @if ($title == 'Stock In') active @endif" href="/stock-in"><i class="icon fa fa-circle-o"></i> Stock in / Purchases</a></li>
        <li><a class="treeview-item @if ($title == 'Stock Out') active @endif" href="/stock-out"><i class="icon fa fa-circle-o"></i> Stock out</a></li>
      </ul>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
          class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Reports</span><i
          class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item @if ($title == 'Sales Report') active @endif" href="/sale-report"><i class="icon fa fa-circle-o"></i> Sales</a></li>
        <li><a class="treeview-item @if ($title == 'Stock In/Out') active @endif" href="/stock-report"><i class="icon fa fa-circle-o"></i> Stock In/Out</a></li>
      </ul>
    </li>
    @if (auth()->user()->level == 'admin')
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
          class="app-menu__icon fa fa-gear"></i><span class="app-menu__label">Settings</span><i
          class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item @if ($title == 'Users') active @endif" href="{{ route('user.index') }}"><i class="icon fa fa-circle-o"></i> Users</a></li>
        <li><a class="treeview-item @if ($title == 'Settings') active @endif" href="/user"><i class="icon fa fa-circle-o"></i> Settings</a></li>
      </ul>
    </li>
    @endif
  </ul>
</aside>
