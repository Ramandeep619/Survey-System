<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="start <?php echo ($this->request->action == 'dashboard') ? 'active' : ''; ?> ">
                                <a href="<?php echo $this->Url->build(array('controller' => 'users', 'action' => 'dashboard')); ?>">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                </a>
                        </li>
                        <li <?php echo ($this->request->params['controller'] == 'Users' && $this->request->action == 'index' || $this->request->params['controller'] == 'UsersQuestions' && $this->request->action == 'index') || ($this->request->params['controller'] == 'Users' && $this->request->action == 'add') ? 'class=active' : ''; ?>>
							<a href="<?php echo $this->Url->build(array('controller' => 'users', 'action' => 'index')); ?>">
								<i class="icon-user"></i>
								<span class="title">All Users</span>
								<span class="arrow "></span>
							</a>
						</li>
                </ul>
                <!-- END SIDEBAR MENU -->
        </div>
</div>
