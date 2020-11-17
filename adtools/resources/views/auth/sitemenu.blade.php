<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li {{ ( str_contains(Route::currentRouteName(), 'overralinfo') )? "class=active" : "" }} >
                <a href="/overralinfo">
                    <i class="fa fa-th"></i> <span>ព័ត៌មានលិខិតទូទៅ</span>
                </a>
            </li>
            <li {{ ( str_contains(Route::currentRouteName(), 'letter') )? "class=active treeview" : "class=treeview" }}>
                <a href="#">
                    <i class="fa fa-book"></i> <span>លិខិត</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ ( str_contains(Route::currentRouteName(), 'letterin') )? "class=active" : "" }} ><a href="/letterin"><i class="fa fa-info"></i> លិខិតចូល</a></li>
                    <li {{ ( str_contains(Route::currentRouteName(), 'letterout') )? "class=active" : "" }} ><a href="/letterout"><i class="fa fa-share-square-o"></i> លិខិតចេញ</a></li>
                </ul>
            </li>
            <li {{ ( str_contains(Route::currentRouteName(), 'staff') )? "class=active" : "" }} >
                <a href="/staffinfo">
                    <i class="fa fa-address-book-o"></i> <span>ព័ត៌មានបុគ្គលិក</span>
                </a>
            </li>
            <li {{ ( str_contains(Route::currentRouteName(), 'udtm') )? "class=active" : "" }} >
                <a href="/udtm">
                    <i class="fa fa-cogs"></i> <span>ការកំណត់អត្ថន័យ</span>
                </a>
            </li>
            <li style="display:none" {{ ( str_contains(Route::currentRouteName(), 'reports') )? "class=active" : "" }} >
                <a href="/reportse">
                    <i class="fa fa-file-text-o"></i> <span>របាយការណ៍</span>
                </a>
            </li>
        </ul>
    </section>
    
    <!-- /.sidebar -->
