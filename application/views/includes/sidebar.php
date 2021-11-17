<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>" class="brand-link">
      <img src="<?php echo base_url();?>assets/Forward.png" alt="Forward Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">DMMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('index.php/main/dashboard') ?>" class="nav-link <?php echo $this->uri->segment(1) == 'dashboard' ? "active": "" ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php 
           $AdminStatus=  $this->session->userdata('isAdmin');
	if($AdminStatus==1){
          ?>
          <li class="nav-item">
              <a href="<?php echo base_url("index.php/departments") ?>" class="nav-link <?php echo $this->uri->segment(1) == 'departments' ? "active": "" ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Departments</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("index.php/sections") ?>" class="nav-link <?php echo $this->uri->segment(1) == 'sections' ? "active": "" ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Sections</p>
            </a>
          </li>
          <?php
          
  }
  ?>
          <!-- <li class="nav-item">
            <a href="<?php echo base_url("index.php/machines") ?>" class="nav-link <?php echo $this->uri->segment(1) == 'machines' && !$this->uri->segment(2) ? "active": "" ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Machines</p>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a href="<?php echo base_url("index.php/Parameters") ?>" class="nav-link <?php echo $this->uri->segment(1) == 'Parameters' ? "active": "" ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Parameters</p>
            </a>
          </li> -->
<li class="nav-item">
            <a href="<?php echo base_url("index.php/teams") ?>" class="nav-link <?php echo $this->uri->segment(1) == 'teams' ? "active": "" ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Teams</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("index.php/Reports") ?>" class="nav-link <?php echo $this->uri->segment(1) == 'Reports' ? "active": "" ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Reports</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="<?php echo base_url("index.php/machines/department") ?>" 
            class="nav-link <?php echo $this->uri->segment(1) == 'machines' && $this->uri->segment(2) == 'department' ? "active": "" ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Installed Machines</p>
            </a>
          </li>

          <li class="nav-item">
          <a href="<?php echo base_url("index.php/schedules/newschedule") ?>" class="nav-link <?php echo $this->uri->segment(1) == 'newschedule' ? "active": "" ?>">
           
              <i class="far fa-circle nav-icon"></i>
              <p>Add Schedules</p>
            </a>
          </li>
 <li class="nav-item">
            <a href="<?php echo base_url("index.php/schedules") ?>" class="nav-link <?php echo $this->uri->segment(1) == 'schedules' && !$this->uri->segment(2) ? "active": "" ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Schedules</p>
            </a>
          </li>
         <li class="nav-item">
            <a href="<?php echo base_url("index.php/ChartController") ?>" class="nav-link <?php echo $this->uri->segment(1) == 'schedules' && $this->uri->segment(2) == 'maintenance' ? "active": "" ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>PM Record</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>