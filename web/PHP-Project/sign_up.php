<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
  </head>
  <body>
    <?php
      require("header.php");

      $current = "sign_up";
      head($current);
    ?>
    <h2>Sign Up For Your New Account</h2>
    <form id='sign_up_form' action='create_account.php' method='post'>
      <h3>Account Information</h3>
      <input id='txt_username' name='txt_username' placeholder='Username' />
      <!--<label for="txt_username">Username</label>-->
      <br /><br />

      <input id='txt_password' name='txt_password' placeholder='Password' type='password'/>
      <!--<label for="txt_password">Password</label>-->
      <br /><br />

      <input id='txt_display_name' name='txt_display_name' placeholder='Display Name' />
      <!--<label for="txt_display_name">Display Name</label>-->
      <br /><br />

      <input id='txt_email' name='txt_email' placeholder='Email' type='email'/>
      <!--<label for="txt_email">Email</label>-->
      <br /><br />

      <h3>Site Information (Optional)</h3>
      <label for="txt_url">Site URL</label>
      <input id='txt_url' name='txt_url' placeholder='http://www.example.com' type='url'/>
      <br /><br />

      <label for="txt_admin">Privileges</label>
      <select id='txt_admin' name='txt_admin'>
        <option value='true'>Administrator</option>
        <option value='false'>User</option>
      </select>
      <br /><br />

      <input type='submit' value='Create Account' />
    </form>
  </body>
</html>