<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/home">Attendnow</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">AN</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item ">
                <a href="#"
                    class="nav-link ">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>
            
            <li class="nav-item">
                <a href="{{route('users.index')}}"
                    class="nav-link ">
                    <i class="far fa-user"></i> 
                    <span>Users</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('companies.show', 1) }}" class="nav-link">
                    <i class="far fa-building fa-lg"></i>
                    <span>Company</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('attendances.index') }}" class="nav-link">
                    <i class="fas fa-clipboard-user fa-lg"></i>
                    <span>Attendances</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('absences.index') }}" class="nav-link">
                    <i class="fas fa-key fa-lg"></i>
                    <span>Absence</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
