<aside class="app-sidebar shadow" data-bs-theme="dark" >
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('assets/img/admin/logo2.jpg ') }}"
              alt="AdminLTE Logo"
              class="brand-image "
            />
            <br>
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-dark" style="color:rgb(159,137,129,0.982);">Admin Bibliothèque</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper" style="background-color:rgb(159,137,129,0.982);">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item">
                <a href="{{route('admin.users.index')}}" class="nav-link @if (request()->routeIs('users.*')) active @endif">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.livres.index')}}" class="nav-link @if (request()->routeIs('livres.*')) active @endif">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Livre</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.categories.index')}}" class="nav-link @if (request()->routeIs('categories.*')) active @endif">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Categorie</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.auteurs.index') }}" class="nav-link @if (request()->routeIs('auteurs.*')) active @endif">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Auteurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.reservations.index') }}" class="nav-link @if (request()->routeIs('reservation.admin.*')) active @endif">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Reservations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.emprunts.index') }}" class="nav-link @if (request()->routeIs('emprunt.admin.*')) active @endif">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Emprunts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.notifications.index')}}" class="nav-link @if (request()->routeIs('notifications.*')) active @endif">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Notifications</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.roles.index') }}" class="nav-link @if (request()->routeIs('roles.*')) active @endif">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Roles</p>
                </a>
              </li>
              
          
              
              <li class="nav-item">
                <a href="{{ route('admin.editeurs.index') }}" class="nav-link @if (request()->routeIs('editeurs.*')) active @endif">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Editeurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.emprunts.rapport')}}" class="nav-link @if (request()->routeIs('emprunts.*')) active @endif">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Rapport des emprunts</p>
                </a>
              </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
