  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{$profile->short_name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           
         @foreach(config('menu') as $item)
            @if(isset($item['children']))
                <li class="nav-item has-treeview {{request()->routeIs(collect($item['children'])->pluck('route')->toArray())?'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon {{ $item['icon'] }}"></i>
                    <p>
                        {{ $item['label'] }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @foreach($item['children'] as $child)
                        <li class="nav-item">
                            <a href="{{ route($child['route']) }}" 
                               class="nav-link {{ request()->routeIs($child['route']) ? 'active' : '' }}">
                                <i class="nav-icon {{ $child['icon'] }}"></i>
                                <p>{{ $child['label'] }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
                </li>
            @else
             {{-- Menu Biasa --}}
            <li class="nav-item">
                <a href="{{ route($item['route']) }}" 
                   class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                    <i class="nav-icon {{ $item['icon'] }}"></i>
                    <p>{{ $item['label'] }}</p>
                </a>
            </li>
            {{-- Akhir Menu Biasa --}}
            @endif
            
         @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>