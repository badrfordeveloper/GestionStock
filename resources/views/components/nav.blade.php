        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="{{ asset('assets/img/profile_small.jpg') }}"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">@auth {{ Auth::user()->nom }} @endauth</span>
                                <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                                <li class="dropdown-divider"></li>
                           		<!-- <li class="dropdown-item">
                                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                                           onclick="event.preventDefault();
                                                                                         document.getElementById('logout-form').submit();">
                                                                            {{ __('Logout') }}
                                                                        </a>
                                
                                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                            @csrf
                                                                        </form>
                                                                </li> -->
                            </ul>
                        </div>
                        <div class="logo-element">
                            FRL
                        </div>
                    </li>
                    <li class="active">
                        <a href="{{ url(Config::get('constants.ADMIN_PATH'))}}"><i class="fa fa-th-large"></i> <span class="nav-label">Tabeau de Board</span></a>
                        
                    </li>
                    <li>
                        <a href="{{ url(Config::get('constants.ADMIN_PATH').'produits')}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Produits</span></a>
                    </li>

                     <li>
                        <a href="{{ url(Config::get('constants.ADMIN_PATH').'users')}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Users</span></a>
                    </li>

                    <li>
                        <a href="{{ url(Config::get('constants.ADMIN_PATH').'achats')}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Achats</span></a>
                    </li>
                    <li>
                        <a href="{{ url(Config::get('constants.ADMIN_PATH').'commandes')}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Commandes</span></a>
                    </li>
                    <li>
                        <a href="{{ url(Config::get('constants.ADMIN_PATH').'ligneachats')}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Ligne achats</span></a>
                    </li>
                    <li>
                        <a href="{{ url(Config::get('constants.ADMIN_PATH').'categories')}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Catégories</span></a>
                    </li>
                    <li>
                        <a href="{{ url(Config::get('constants.ADMIN_PATH').'lignecommandes')}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Ligne commandes</span></a>
                    </li>  
                    <li>
                        <a href="{{ url(Config::get('constants.ADMIN_PATH').'retours')}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Retours</span></a>
                    </li>    
                    <li>
                        <a href="{{ url(Config::get('constants.ADMIN_PATH').'types')}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Types</span></a>
                    </li>     
                    <li>
                        <a href="{{ url(Config::get('constants.ADMIN_PATH').'ventes')}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Ventes</span></a>
                    </li>            

                    
                    <!-- <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="graph_flot.html">Flot Charts</a></li>
                            <li><a href="graph_morris.html">Morris.js Charts</a></li>
                            <li><a href="graph_rickshaw.html">Rickshaw Charts</a></li>
                            <li><a href="graph_chartjs.html">Chart.js</a></li>
                            <li><a href="graph_chartist.html">Chartist</a></li>
                            <li><a href="c3.html">c3 charts</a></li>
                            <li><a href="graph_peity.html">Peity Charts</a></li>
                            <li><a href="graph_sparkline.html">Sparkline Charts</a></li>
                        </ul>
                    </li> -->
                </ul>

            </div>
        </nav>