<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">SPUD</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="index"><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
        <li class="events"><a href="events.php"><span class="glyphicon glyphicon-calendar"></span>EVENTS</a></li>
        <li class="projects"><a href="projects.php"><span class="glyphicon glyphicon-folder-open"></span>PROJECTS</a></li>
        <li class="about"><a href="about.php"><span class="glyphicon glyphicon-cloud"></span>ABOUT</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-plus"></span>JOIN</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-pencil"></span>SIGN UP</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>LOGIN</a></li>
      </ul>
    </div>
  </div>
</nav>

<script>
var pathname = window.location.pathname; // Returns path only
//var url      = window.location.href;     // Returns full URL
var activeNavigation = '.' + pathname.substr(9, (pathname.length)-14);
$(document).ready(function() {
    console.log(activeNavigation);
    $('.active').addClass('inactive');
    $('.active').removeClass('active');
    $(activeNavigation).addClass('active');
});
</script>
