<?php
/* --------------------------
  Error checking
  ---------------------------*/

//ini_set('display_errors', 'On');

/* -----------------------------------------------------------------------
   Global variables
----------------------------------------------------------------------- */
  
$admin = 'Tucker Tavarone';
$author = '';


$pages = array ('index.php' => 'Home',
                'resume.php' => 'Resume',
                'courses.php' => 'Courses',
                'projects.php' => 'Projects');

$default_pages = array( 
  'login.php' => 'Login',
  'join.php' => 'Join',
  'show_users.php' => 'Users');
                
$user_pages = array(  
  'user_profile.php' => 'Profile',
  'update_user.php' => 'Edit',
  'manage_courses.php' => 'Manage Courses',
  'create_course.php' => 'Add Course',
  'change_pwd.php' => 'Change Password',
);   
                
$admin_pages = array(
  'admin_page.php' => 'Main Admin',
  'manage_users.php' => 'Manage users',
  'manage_courses.php' => 'Manage courses',
  'show_table.php?table_name=th26tava_users' => 'Show users table raw',
  'show_table.php?table_name=th26tava_courses' => 'Show courses table raw',
  'change_pwd.php' => 'Change Password',
);

/* -----------------------------------------------------------------------
   Select menu
----------------------------------------------------------------------- */
function select_menu() {
  global $default_pages;
  global $user_pages;
  global $admin_pages;    
  
  session_start();
  if ($_SESSION['admin'])
    $pages = $admin_pages;
  elseif ($_SESSION['uid']) 
    $pages = $user_pages;
  else
    $pages = $default_pages;
    
  return $pages;
}

/* -----------------------------------------------------------------------
   Make top of the page
----------------------------------------------------------------------- */

function make_top($page_name, $ext_fonts = null, $style = null) {
  global $author;

  if ($style != null) {
    $style = '<style>'.file_get_contents($style).'</style>';
  }

  if ($ext_fonts != null) {
    $ext_fonts = file_get_contents(__DIR__ . '/assets/googleFonts');
  }

  return '
    <!DOCTYPE html>
    <html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    '.$ext_fonts.'
    <head>
      <title>'.$author.' | '.$page_name.'</title>
      <style type="text/css">
        '.$style.'
      </style>
    </head>
    <body>';
}

/* -----------------------------------------------------------------------
   Make bottom of the page
----------------------------------------------------------------------- */

function make_bottom($javascript = null) {
  return '
      <!-- javascript -->
      <script>'.$javascript.'</script>
      <script src="https://code.jquery.com/jquery-3.4.0.js"
              integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
              crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="js/custom.js"></script>
    </body>
    </html>
  ';
}

/* -----------------------------------------------------------------------
   Makes a basic webpage, using $page_name and $page_content to get the
   page name and then any custom content for that webpage
----------------------------------------------------------------------- */

function make_page($page_name, $page_content, $add_script = null) {

  global $author;
  $author = $_SESSION['author'];

  echo make_top($page_name);
  echo make_navbar();
  
  
  echo '<main class="container">';
  echo $page_content;
  echo back_button($page_name);
  echo '</main>';

  echo make_footer();
  echo make_bottom($add_script);
}

/* -----------------------------------------------------------------------
   Makes the navigation bar at the top of all pages
----------------------------------------------------------------------- */

function make_navbar() {
  global $author;

  $pages = select_menu();

  if(isset($_SESSION['uid'])){
    //$author = ($_SESSION['uid'], 'th26tava_users'); // sets author name (top on header) if session is started
    $logout = '<li id="logout_button" class="nav-item">
                <a class="nav-link" href="logout.php" style="color: #B5C0D2">Logout</a>
              </li>';

    $home_btn_val = 'user_profile.php';
  }
  else {
    $home_btn_val = 'login.php';
  }

  foreach ($pages as $link => $name) { // makes a menu for the user based on the uid from session
      $menu_item .= '<a class="dropdown-item" href="'.$link.'">'.$name.'</a><div class="dropdown-divider"></div>';
    }
  
  // will need to change author header style and link 
  return '
        <header style="background-color: #030736">
          <!-- website navbar -->
          <ul class="nav nav-pills">
          <a id="navbar_brand" class="navbar-brand" href="'.$home_btn_val.'" style="color: #B5C0D2">'.$author.'</a> 
            <li class="nav-item">
              <a class="nav-link" href="'.$home_btn_val.'" style="color: #B5C0D2">Home</a>
            </li>
            
            <li class="nav-item  justify-content-end">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: #B5C0D2">Account Settings</a>
                <div class="dropdown-menu">
                  '.$menu_item.'
                </div>
                '.$logout.'
            </li>
            
          </ul>
        </header>';
  }

  /* -----------------------------------------------------------------------
   Makes the footer on the bottom of all pages
----------------------------------------------------------------------- */

  function make_footer() {
    
    global $author;
    $pages = select_menu();

    $menu_item = '';

    foreach ( $pages as $link => $name) {
      $menu_item .= '<a href="'.$link.'" style="color: #05386b">'.$name.'</a>';
    }

    return '
    <footer>
      &copy; 2019 '.$author.'
        <nav>
          '.$menu_item.'
        </nav>
    </footer>';
  }

  /* -----------------------------------------------------------------------
   Makes bootstrap cards
----------------------------------------------------------------------- */

  function make_card($title, $content, $link = null, $link_name = null){
      return '
          <div id="card">
            <div class="card">
              <div class="card-body">
                <h5 id="users_name" class="card-title">'.$user_name.'</h5>
                <p class="card-text">
                  '.$content.'
                </p>
                <a class="btn btn-primary btn-lg active" role="button" aria-pressed="true" href="'.$link.'" style="margin: auto; background-color: #05386b; font-size: 100%;">'.$link_name.'</a>
              </div>
            </div>
          </div>
        ';
    }

  /* ----------------------------------------------------------------------------
   Calls the header function to redirect to the specified file name
---------------------------------------------------------------------------- */
function redirect($file_name) {
  header("Location: $file_name");
}

 /* ----------------------------------------------------------------------------
   Creates a back button for every page except LOGIN
---------------------------------------------------------------------------- */

function back_button($page_name){
  if($page_name == 'Login'){
    $out = '';
  }
  else{
    $out = '<button class="backbtn btn btn-primary">Back</button>';
  }
  return $out;
}

?>