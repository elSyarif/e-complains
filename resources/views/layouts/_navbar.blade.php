@php
$id = Auth::user()->role_id;
$role = \App\Role::findOrfail($id);
$parents = \App\Role::findOrfail($id)->Menus()->where('is_active',1)->get();
$main_menu = \App\Menu::where('is_active',1)->where('parent_id',0)->get();

@endphp
<!--Horizontal Nav-->
<nav class="hk-nav hk-nav-dark">
  <div class="nicescroll-bar">
    <div class="navbar-nav-wrap">
      <ul class="navbar-nav flex-row">
        @foreach ($parents as $parent)
        {{--  Main menu  --}}
        <li class="nav-item text-light">
          {{--  menu parent  --}}
          <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#{{ $parent->target }}">
            <span class="feather-icon"><i data-feather="{{ $parent->icon }}"></i></span>
            <span class="nav-link-text">{{ $parent->menu }}</span>
          </a>
          {{--  sub Item  --}}
          @php
          $sub_menu = \App\Menu::where('is_active',1)->where('parent_id',$parent->id)->get();
          @endphp
          @if (sizeof($sub_menu) > 0)
          <ul id="{{ $parent->target }}" class="nav flex-column collapse collapse-level-1">
            @if (sizeof($sub_menu) > 0)
            @foreach ($sub_menu as $sub)
            <li class="nav-item">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/'.$sub->link) }}">{{ $sub->sub_menu }}</a>
                </li>
              </ul>
            </li>
            @endforeach
            @endif
          </ul>
          @endif
        </li>
        {{--  end main menu  --}}
        @endforeach
      </ul>
    </div>
  </div>
</nav>
<div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
<!--/Horizontal Nav-->
