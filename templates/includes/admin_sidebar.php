<div class="sidenav" id="sidenav">
   <span class="close_btn show-on-small" onclick="hide_sidebar()">&times;</span>
   <div class="view_part">
     <a class="navbar-brand text-dark" href="#">Admin Dashboard</a>
   </div>
   <hr>

   <div class="sidenav_content">
     <a href="admin_dashboard.php">Dashboard</a>
     <a href="users.php">Users</a>
     <a href="sellers.php">Sellers</a>
     <a href="admin_details.php">Admins</a>
     <a href="profile.php">Profile</a>
     <a href="logout.php">Logout</a>
   </div>
</div>

<section class="main_view">
  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container">
      <span class="open_btn show-on-small ml-5" onclick="show_sidebar()">&#9776;</span>
      <a class="navbar-brand text-white " href="#">E-Bazar</a>
    </div>
  </nav>
</section>

<script>
  function show_sidebar(){
     document.getElementById("sidenav").style.width="25%";
  }
  function hide_sidebar(){
     document.getElementById("sidenav").style.width="0";
  }
</script>  