<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('/img/smk1.jpg') }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->username }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

@if(Auth::guest())
@elseif(Auth::user()->level->nama_level=='admin')
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Home</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></span> </i>Home</span></a></li>
            <li class="header">User Account</li>
            <li><a href="{{url('user')}}"><i class='fa fa-user'></span> </i>User</span></a></li>
            <li class="header">Main Menu</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-pencil'></i> <span>Main Menu</span></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('order')}}">Order</a></li>
                    <li><a href="{{url('detail_order')}}">Detail Order</a></li>
                    <li><a href="{{url('masakan')}}">Masakan</a></li>
                    <li><a href="{{url('meja')}}">Meja</a></li>
                    <li><a href="{{url('daftarmenu')}}">Add Order</a></li>
                </ul>
            </li>
            <li class="header">Transaksi</li>
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-pencil'></i> <span>Transaksi</span></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('payment')}}">Payment</a></li>
                    <li><a href="{{url('history')}}">History</a></li>
                </ul>
            </li>
            <li class="header">Reports</li>
            <li><a href="{{url('reports')}}"><i class='glyphicon glyphicon-user'></span> </i>Reports</span></a></li>
        </ul><!-- /.sidebar-menu -->

        @elseif(Auth::user()->level->nama_level=='waiter')
        <ul class="sidebar-menu">
            <li class="header">Home</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='glyphicon glyphicon-home'></span> </i>Home</span></a></li>
            <li class="header">User Account</li>
            <li><a href="{{url('user')}}"><i class='glyphicon glyphicon-user'></span> </i>User</span></a></li>
            <li class="header">Main Menu</li>
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-pencil'></i> <span>Main Menu</span></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('transaksi')}}">Laporan</a></li>
                    <li><a href="{{url('order')}}">Order</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
        @elseif(Auth::user()->level->nama_level=='kasir')
        <ul class="sidebar-menu">
            <li class="header">Home</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='glyphicon glyphicon-home'></span> </i>Home</span></a></li>
            <li class="header">User Account</li>
            <li><a href="{{url('user')}}"><i class='glyphicon glyphicon-user'></span> </i>User</span></a></li>
            <li class="header">Main Menu</li>
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-pencil'></i> <span>Main Menu</span></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('transaksi')}}">Laporan</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
        @elseif(Auth::user()->level->nama_level=='owner')
        <ul class="sidebar-menu">
            <li class="header">Home</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='glyphicon glyphicon-home'></span> </i>Home</span></a></li>
            <li class="header">Main Menu</li>
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-pencil'></i> <span>Main Menu</span></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('transaksi')}}">Laporan</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
        @elseif(Auth::user()->level->nama_level=='pelanggan')
        <ul class="sidebar-menu">
            <li class="header">Home</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='glyphicon glyphicon-home'></span> </i>Home</span></a></li>
            <li class="header">Main Menu</li>
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-pencil'></i> <span>Main Menu</span></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('daftarmenu')}}">Order</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    @else
    @endif
    <!-- /.sidebar -->
</aside>
