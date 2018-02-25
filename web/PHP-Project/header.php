  <?php
    require_once("dbConnect.php");

    echo "<head>
            <link rel='stylesheet' href='head-style.css'>
          </head>";
          
    function head($current) {
      echo '<nav>
              <ul>
                <li>
                  <a href="home.php" ';

      # Home
      if($current == "home") {
              echo 'class="active"';
      }
              echo '>SiteMap</a>
                </li>
                <li>
                  <a href="about-us.php" '; 

      # About
      if($current == "about") {
              echo 'class="active"';
      }
              echo '>About</a>
                </li>
                <li>';
      
      # Login / Logout
      # User is NOT logged in, allow for login
      if (!isset($_SESSION['username'])) {
            echo '<a href="login.php" ';
        if ($current == "login") {
              echo 'class="active"';
        }
              echo '>Login</a>
                </li>
                <li>
                <a href="sign_up.php" ';

        # Sign Up
        if ($current == "sign_up") {
                echo 'class="active"';
        }
                echo '>Sign Up</a>
                  </li>';
      # User IS logged in, allow for logout
      } else {
            echo '<a href="logout.php" >Logout</a>
                </li>';
      }

      # Search Bar
          echo "<li>
            <form action='home.php' method='post'>
              <input id='search' name='search' placeholder='Enter URL or search query here' size='50'/>
              <input type='submit' value='Search' />
            </form>
          </li>
        </ul>
      </nav>";
    }
  ?>