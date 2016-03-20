<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("assets/images/social.png")  }}">
            </div>
            <div class="pull-left info">
                <p></p>
                <p>{{  ucfirst(Auth::user()->first_name) . " " . ucfirst(Auth::user()->last_name) }}</p>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/dashboard/user/search"><i class="fa fa-search"></i> Search Users</a></li>
                    <li><a href="/dashboard/user/add"><i class="fa fa-plus"></i> Add User</a></li>
                    <li><a href="#"><i class="fa fa-edit"></i> Edit User</a></li>
                    <li><a href="#"><i class="fa fa-minus"></i> Delete User</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Roles</span>
                    <i class="fa fa-angle-left pull-right"></i>
                    <ul class="treeview-menu">
                        <li><a href="/dashboard/role/search"><i class="fa fa-search"></i> Search Roles</a></li>
                        <li><a href="#"><i class="fa fa-plus"></i> Add Role</a></li>
                        <li><a href="#"><i class="fa fa-edit"></i> Edit Role</a></li>
                        <li><a href="#"><i class="fa fa-minus"></i> Delete Role</a></li>
                    </ul>
                </a>
            </li>
            <li class="treeview">
                <a href="/dashboard/books">
                    <i class="fa fa-book"></i> <span>Books</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-plus"></i> Add Book</a></li>
                        <li><a href="#"><i class="fa fa-edit"></i> Edit Book</a></li>
                        <li><a href="#"><i class="fa fa-minus"></i> Delete Book</a></li>
                    </ul>--}}
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Books Categories</span>
                    <i class="fa fa-angle-left pull-right"></i>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-plus"></i> Add Book Category</a></li>
                        <li><a href="#"><i class="fa fa-edit"></i> Edit Book Category</a></li>
                        <li><a href="#"><i class="fa fa-minus"></i> Delete Book Category</a></li>
                    </ul>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>