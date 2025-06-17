<div class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <img src="{{ asset('backoffice/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
    </div>
    <div>
      <h4 class="logo-text">MiMiMi</h4>
    </div>
    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">

    <li>
      <a href="{{ route('backoffice.dashboard') }}">
        <div class="parent-icon"><i class='bx bx-home-alt'></i>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>

    <li>
      <a href="/">
        <div class="parent-icon"><i class='bx bx-first-page'></i>
        </div>
        <div class="menu-title">Zur Homepage</div>
      </a>
    </li>

    <li class="menu-label">Your Backoffice</li>
    <li>
      <a href="#">
        <div class="parent-icon"><i class='bx bx-home-alt'></i>
        </div>
        <div class="menu-title">Pagetitle</div>
      </a>
    </li>

    @if (Auth::user()->can('socal.media.user'))
    <li class="menu-label">Marketing and Social Media</li>
    @if (Auth::user()->can('account.link.menu'))
    <li>
      <a class="has-arrow" href="#">
        <div class="parent-icon"><i class='bx bx-link-external'></i>
        </div>
        <div class="menu-title">Account Links</div>
      </a>
      <ul>
        @if (Auth::user()->can('account.link.all'))
        <li> <a href="#"><i class='bx bx-radio-circle'></i>All Account Links</a>
        </li>
        @endif
        @if (Auth::user()->can('account.link.add'))
        <li> <a href="#"><i class='bx bx-radio-circle'></i>Add Account Link</a>
        </li>
        @endif
      </ul>
    </li>
    
    @endif
    @if (Auth::user()->can('marketing.seo'))
    <li>
      <a class="has-arrow" href="#">
        <div class="parent-icon"><i class='bx bx-flag'></i>
        </div>
        <div class="menu-title">SEO</div>
      </a>
      <ul>
        @if (Auth::user()->can('marketing.seo'))
        <li> <a href="#"><i class='bx bx-radio-circle'></i>Meta Settings</a>
        </li>
        @endif
      </ul>
    </li>
    @endif
    @endif

    @if (Auth::user()->can('admin.user'))
    <li class="menu-label">Administration</li>
    @if (Auth::user()->can('setting.management.user'))
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class='bx bx-cog'></i>
        </div>
        <div class="menu-title">Setting</div>
      </a>
      <ul>
        @if (Auth::user()->can('setting.smtp'))
        <li> <a href="{{ route('setting.smtp') }}"><i class='bx bx-radio-circle'></i>Mail</a>
        </li>
        @endif
        @if (Auth::user()->can('setting.site'))
        <li> <a href="{{ route('setting.site') }}"><i class='bx bx-radio-circle'></i>Site</a>
        </li>
        @endif
      </ul>
    </li>
    @endif
    @endif

    @if (Auth::user()->can('user.role.permission.menu'))
    <li class="menu-label">Users, Roles And Permission</li>
    @if (Auth::user()->can('role.permission.menu'))
    <li>
      <a class="has-arrow" href="{{ route('roles.permission.index') }}">
        <div class="parent-icon"><i class="bx bx-user-check"></i>
        </div>
        <div class="menu-title">Role & Permission</div>
      </a>
      <ul>
        @if (Auth::user()->can('permission.all'))
        <li> <a href="{{ route('permission.index') }}"><i class="bx bx-radio-circle"></i>All Permission</a>
        </li>
        @endif
        @if (Auth::user()->can('roles.all'))
        <li> <a href="{{ route('roles.index') }}"><i class='bx bx-radio-circle'></i>All Roles </a>
        </li>
        @endif
        @if (Auth::user()->can('role.permission.add'))
        <li> <a href="{{ route('roles.permission.create') }}"><i class='bx bx-radio-circle'></i>Add Role In Permission </a>
        </li>
        @endif
        @if (Auth::user()->can('role.permission.all'))
        <li> <a href="{{ route('roles.permission.index') }}"><i class='bx bx-radio-circle'></i>All Role In Permission</a>
        </li>
        @endif
      </ul>
    </li>
    @endif

    @if (Auth::user()->can('user.management.menu'))
    <li>
      <a class="has-arrow" href="{{ route('adminuser.index') }}">
        <div class="parent-icon"><i class="bx bx-user-plus"></i>
        </div>
        <div class="menu-title">Admin User Manager</div>
      </a>
      <ul>
        @if (Auth::user()->can('user.management.all'))
        <li> <a href="{{ route('adminuser.index') }}"><i class="bx bx-radio-circle"></i>All Admin User</a>
        </li>
        @endif
        @if (Auth::user()->can('user.management.add'))
        <li> <a href="{{ route('adminuser.create') }}"><i class="bx bx-radio-circle"></i>Add Admin</a>
        </li>
        @endif
      </ul>
    </li>
    @endif

    @endif

    <li class="menu-label">Additional services</li>

    <li>
      <a href="https://themeforest.net/user/codervent" target="_blank">
        <div class="parent-icon"><i class="bx bx-support"></i>
        </div>
        <div class="menu-title">Support</div>
      </a>
    </li>
  </ul>
  <!--end navigation-->
</div>