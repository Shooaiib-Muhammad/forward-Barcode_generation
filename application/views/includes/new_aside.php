<aside class="page-sidebar">
                    <div class="page-logo">
                        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                           
                            <span class="page-logo-text mr-1"> <?php
                                       
                                       Echo  $username =  $this->session->userdata('Username');
                                       ?></span>
                            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                        </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
                        <div class="nav-filter">
                            <div class="position-relative">
                                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                                    <i class="fal fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <?php
                         $AdminStatus=  $this->session->userdata('isAdmin');
                        ?>
                        <ul id="js-nav-menu" class="nav-menu">
                            <li class="active open">
                                <a href="#" title="Application Intel" data-filter-tags="application intel">
                                    <i class="fal fa-info-tachometer"></i>
                                    <span class="nav-link-text" data-i18n="nav.application_intel">DMMS</span>
                                </a>
                                <ul>
                                    <li class="active">
                                        <a href="<?php echo base_url('index.php/main/dmms_dashboard')?>" title="DMMS Dashboard" data-filter-tags="application intel analytics dashboard">
                                            <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/main/Maintance_Dashboard") ?>" title="Privacy" data-filter-tags="application intel privacy">
                                            <span class="nav-link-text" data-i18n="nav.application_intel_privacy">Maintance Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("index.php/teams") ?>" title="Privacy" data-filter-tags="application intel privacy">
                                            <span class="nav-link-text" data-i18n="nav.application_intel_privacy">Teams</span>
                                        </a>
                                    </li>
                                    <?php
if($AdminStatus ==1){
  ?>
                                    <li>
                                        <a href="<?php echo base_url("index.php/teams/assignTeam") ?>" title="Build Notes" data-filter-tags="application intel build notes">
                                            <span class="nav-link-text" data-i18n="nav.application_intel_build_notes">Assign Team</span>
                                            
                                        </a>
                                    </li>
                                    <?php
                                    
}
?>
                                </ul>
                            </li>
                            
                          
                           
                           
                            
                        </ul>
                        <div class="filter-message js-filter-message bg-success-600"></div>
                    </nav>
                    <!-- END PRIMARY NAVIGATION -->
                    <!-- NAV FOOTER -->
                   
                </aside>