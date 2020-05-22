<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard')}}">Attendance System</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Employees</li>
            <li class="nav-item dropdown {{(\Request::is('attendance-dashboard/employees')) || (\Request::is('attendance-dashboard/employees/*'))? "active" : ""}}">
                <a href="#" class="nav-link has-dropdown "><i class="fas fa-th"></i> <span>Employees</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('employees.index')}}">Show All</a></li>
                    <li><a class="nav-link" href="{{route('employees.create')}}">Add new employee</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>