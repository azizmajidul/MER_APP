 <!-- Sidebar -->

 <style>
        #logo{
   
    margin-left:2px;
    margin-right:10px;
    margin-top:5%;
    width:60%;
    height:40%;
}
 </style>
 <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon">
             <!-- <i class="fas fa-user"></i> -->
             <img src="<?= base_url(); ?>assets/img/profil/logo_size.jpg" class="rounded-circle" id="logo">
         </div>
         <div class="sidebar-brand-text mx-" style="margin-left: 0px;"><strong>SMARTMD</strong></div>
     </a>

     <!-- Divider -->


     <?php
        $role_id = $this->session->userdata('role_id');
        $query_menu = " SELECT a.id, menu
                FROM user_menu a JOIN user_acces_menu b
                ON a.id = b.menu_id
                WHERE b.role_id = $role_id
                order by b.menu_id ASC ";
        $menu = $this->db->query($query_menu)->result_array();

        ?>


     <hr class="sidebar-divider ">

     <!-- Heading -->
     <?php foreach ($menu as $m) : ?>
         <div class="sidebar-heading">
             <?= $m['menu'] ?>
         </div>



         <?php
            $menu_id = $m['id'];
            $query_sub_menu = " SELECT a.*
                    FROM user_sub_menu a JOIN user_menu b
                    ON a.menu_id = b.id
                    WHERE a.menu_id = $menu_id
                    AND a.is_active = 1";

            $sub_menu = $this->db->query($query_sub_menu)->result_array();
            ?>

         <?php foreach ($sub_menu as $sm) :  ?>
             <?php if ($title == $sm['title']) : ?>
                 <li class="nav-item active">
                 <?php else : ?>
                 <li class="nav-item">
                 <?php endif; ?>
                 <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                     <i class="<?= $sm['icon']; ?>"></i>
                     <span><?= $sm['title']; ?></span></a>
                 </li>


             <?php endforeach; ?>

             <hr class="sidebar-divider mt-3">


         <?php endforeach; ?>





         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('auth_login/logout') ?>">
                 <i class="fas fa-fw fa-sign-out-alt"></i>
                 <span>Logout</span></a>
         </li>



         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

 </ul>
 <!-- End of Sidebar -->