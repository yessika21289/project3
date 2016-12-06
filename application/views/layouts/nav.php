<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="../index.php" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="<?php echo IMAGES; ?>img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li><a href="<?php echo site_url('home/index2'); ?>">Dashboard2</a></li>
                            <li><a href="<?php echo site_url('home/index3'); ?>">Dashboard3</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo site_url('form'); ?>">General Form</a></li>
                            <li><a href="<?php echo site_url('form/advanced'); ?>">Advanced Components</a></li>
                            <li><a href="<?php echo site_url('form/validation'); ?>">Form Validation</a></li>
                            <li><a href="<?php echo site_url('form/wizards'); ?>">Form Wizard</a></li>
                            <li><a href="<?php echo site_url('form/upload'); ?>">Form Upload</a></li>
                            <li><a href="<?php echo site_url('form/buttons'); ?>">Form Buttons</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo site_url('ui-elements'); ?>">General Elements</a></li>
                            <li><a href="<?php echo site_url('ui-elements/media-gallery'); ?>">Media Gallery</a></li>
                            <li><a href="<?php echo site_url('ui-elements/typography'); ?>">Typography</a></li>
                            <li><a href="<?php echo site_url('ui-elements/icons'); ?>">Icons</a></li>
                            <li><a href="<?php echo site_url('ui-elements/glyphicons'); ?>">Glyphicons</a></li>
                            <li><a href="<?php echo site_url('ui-elements/widgets'); ?>">Widgets</a></li>
                            <li><a href="<?php echo site_url('ui-elements/invoice'); ?>">Invoice</a></li>
                            <li><a href="<?php echo site_url('ui-elements/inbox'); ?>">Inbox</a></li>
                            <li><a href="<?php echo site_url('ui-elements/calendar'); ?>">Calendar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="../tables.html">Tables</a></li>
                            <li><a href="../tables_dynamic.html">Table Dynamic</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="../chartjs.html">Chart JS</a></li>
                            <li><a href="../chartjs2.html">Chart JS2</a></li>
                            <li><a href="../morisjs.html">Moris JS</a></li>
                            <li><a href="../echarts.html">ECharts</a></li>
                            <li><a href="../other_charts.html">Other Charts</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="../fixed_sidebar.html">Fixed Sidebar</a></li>
                            <li><a href="../fixed_footer.html">Fixed Footer</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-sellsy"></i>Penjualan <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url();?>selling">Daftar Faktur Jual</a></li>
                            <li><a href="<?php echo base_url();?>selling/new_invoice">Buat Faktur Jual</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-user"></i>User <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url();?>user">Daftar User</a></li>
                            <li><a href="<?php echo base_url();?>user/add">Tambah User</a></li>
                            <li><a href="<?php echo base_url();?>user/user_access">Akses User</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="../e_commerce.html">E-commerce</a></li>
                            <li><a href="../projects.html">Projects</a></li>
                            <li><a href="../project_detail.html">Project Detail</a></li>
                            <li><a href="../contacts.html">Contacts</a></li>
                            <li><a href="../profile.html">Profile</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="../page_403.html">403 Error</a></li>
                            <li><a href="../page_404.html">404 Error</a></li>
                            <li><a href="../page_500.html">500 Error</a></li>
                            <li><a href="../plain_page.html">Plain Page</a></li>
                            <li><a href="../login.html">Login Page</a></li>
                            <li><a href="../pricing_tables.html">Pricing Tables</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#level1_1">Level One</a>
                            <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="../level2.html">Level Two</a>
                                    </li>
                                    <li><a href="#level2_1">Level Two</a>
                                    </li>
                                    <li><a href="#level2_2">Level Two</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#level1_2">Level One</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>