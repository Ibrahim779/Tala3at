<div class="sidebar">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
  -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-mini">
                CT
            </a>
            <a href="javascript:void(0)" class="simple-text logo-normal">
                Creative Tim
            </a>
        </div>
        <ul class="nav">
            <li class="active ">
                <a href="{{route('admin.index')}}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.meetings.index')}}">
                    <i class="tim-icons icon-atom"></i>
                    <p>Meetings</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.categories.index')}}">
                    <i class="tim-icons icon-align-left-2"></i>
                    <p>Categories</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.governorates.index')}}">
                    <i class="tim-icons icon-world"></i>
                    <p>Governorates</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.cities.index')}}">
                    <i class="tim-icons icon-square-pin"></i>
                    <p>Cities</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.users.index')}}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Users</p>
                </a>
            </li>
        </ul>
    </div>
</div>
