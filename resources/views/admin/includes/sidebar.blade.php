<div class="sidebar">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
  -->
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{request()->routeIs('admin.index') ? 'active' : ''}}">
                <a href="{{route('admin.index')}}">
                    <i class="fas fa-area-chart"></i>
                    <p>{{__('admin.dashboard')}}</p>
                </a>
            </li>
            <li class="{{request()->routeIs('admin.admins.*') ? 'active' : ''}}">
                <a href="{{route('admin.admins.index')}}">
                    <i class="fas fa-user-circle"></i>
                    <p>{{__('admin.admins')}}</p>
                </a>
            </li>
            <li class="{{request()->routeIs('admin.roles.*') ? 'active' : ''}}">
                <a href="{{route('admin.roles.index')}}">
                    <i class="fas fa-key"></i>
                    <p>{{__('admin.roles')}}</p>
                </a>
            </li>
            <li class="{{request()->routeIs('admin.categories.*') ? 'active' : ''}}">
                <a href="{{route('admin.categories.index')}}">
                    <i class="fas fa-tags"></i>
                    <p>{{__('admin.categories')}}</p>
                </a>
            </li>
            <li class="{{request()->routeIs('admin.meetings.*') ? 'active' : ''}}">
                <a href="{{route('admin.meetings.index')}}">
                    <i class="fas fa-users"></i>
                    <p>{{__('admin.meetings')}}</p>
                </a>
            </li>
            <li class="{{request()->routeIs('admin.governorates.*') ? 'active' : ''}}">
                <a href="{{route('admin.governorates.index')}}">
                    <i class="fas fa-map-marker"></i>
                    <p>{{__('admin.governorates')}}</p>
                </a>
            </li>
            <li class="{{request()->routeIs('admin.cities.*') ? 'active' : ''}}">
                <a href="{{route('admin.cities.index')}}">
                    <i class="fas fa-building"></i>
                    <p>{{__('admin.cities')}}</p>
                </a>
            </li>
            <li class="{{request()->routeIs('admin.users.*') ? 'active' : ''}}">
                <a href="{{route('admin.users.index')}}">
                    <i class="fas fa-user"></i>
                    <p>{{__('admin.users')}}</p>
                </a>
            </li>
            <li class="{{request()->routeIs('admin.slides.*') ? 'active' : ''}}">
                <a href="{{route('admin.slides.index')}}">
                    <i class="fas fa-sliders"></i>
                    <p>{{__('admin.slides')}}</p>
                </a>
            </li>
            <li class="{{request()->routeIs('admin.chats.*') ? 'active' : ''}}">
                <a href="{{route('admin.chats.index')}}">
                    <i class="fas fa-comments"></i>
                    <p>{{__('admin.chats')}}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
