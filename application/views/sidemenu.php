    <section class="sidebar">
       <section>
            <!-- Sidebar Menu -->
      
         <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="<?php echo base_url()."bord" ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
          
          
          
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-users"></i> <span>Clients</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="<?php echo base_url()."insert" ?>"><i class="fa fa-circle-o"></i> Add Client</a></li>
            <li><a href="<?php echo base_url()."user" ?>"><i class="fa fa-circle-o"></i> Manage Client</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-user-plus"></i> <span>Staff</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="<?php echo base_url()."staffadd" ?>"><i class="fa fa-circle-o"></i> Add Staff</a></li>
            <li><a href="<?php echo base_url()."staffs" ?>"><i class="fa fa-circle-o"></i> Manage Staff</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-object-group"></i> <span>Ad/Hoarding</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="<?php echo base_url()."acat" ?>"><i class="fa fa-circle-o"></i> Add Ad/Hoarding</a></li>
            <li><a href="<?php echo base_url()."cat" ?>"><i class="fa fa-circle-o"></i> Manage Ad/Hoarding</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-file-text-o"></i> <span>Orders</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="<?php echo base_url()."addorders" ?>"><i class="fa fa-circle-o"></i> Creat new Order</a></li>
            <li><a href="<?php echo base_url()."orders" ?>"><i class="fa fa-circle-o"></i> Manage Order</a></li>
            <li><a href="<?php echo base_url()."notify" ?>"><i class="fa fa-circle-o"></i> Expiring Order</a></li>
          </ul>
        </li>

    
        
    </section>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  