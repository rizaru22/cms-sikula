  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-teal elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link bg-teal">
          <img src="{{ asset('storage/' . $profile->logo) }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">{{ $profile->short_name }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Admin</a>
              </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

                  @foreach (config('menu') as $item)
                      @if (isset($item['children']))
                          @php
                              $routes = collect($item['children'])
                                  ->pluck('route')
                                  ->map(fn($r) => Str::beforeLast($r, '.') . '.*')
                                  ->toArray();
                          @endphp

                          <li class="nav-item has-treeview {{ request()->routeIs($routes) ? 'menu-open' : '' }}">

                              <a href="#" class="nav-link">
                                  <i class="nav-icon {{ $item['icon'] }}"></i>
                                  <p>
                                      {{ $item['label'] }}
                                      <i class="right fas fa-angle-left"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  @foreach ($item['children'] as $child)
                                      @php
                                          // Ambil prefix sebelum titik terakhir, misalnya "admin.news"
                                          $prefix = \Illuminate\Support\Str::beforeLast($child['route'], '.');
                                      @endphp

                                      <li class="nav-item">
                                          <a href="{{ route($child['route']) }}"
                                              class="nav-link {{ request()->routeIs($prefix . '.*') ? 'active' : '' }}">
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
