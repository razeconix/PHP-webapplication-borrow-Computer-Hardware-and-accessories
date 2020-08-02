<html>
<head>
<title>Login</title>
 <div>
          
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="registration.php">สมัครสมาชิก</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="login.php">เข้าสู่ระบบ</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container">
      <div class="form">
<h3 class="text-uppercase mb-3">Log In </h3>
<form action="check_login.php" method="post" name="login" placeholder="Usernane">
<input name="txtUsername" type="text" id="txtUsername" placeholder="Usernane" required>
<input name="txtPassword" type="password" id="txtPassword" placeholder="Password" required><br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
    </div>
  </header>
  
   
</body>
</html>