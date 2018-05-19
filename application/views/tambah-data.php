<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>tambah data admin</title>
  </head>
  <body>
    <form action="<?php echo base_url('testcontroller/simpanData'); ?>" method="POST">
      <table>
        <tr>
          <td>nama : </td>
          <td><input type="text" name="user_name" id="user_name" placeholder="insert your name" required></td>
        </tr>
        <tr>
          <td>email</td>
          <td><input type="email" name="user_email" id="user_email" placeholder="insert your email" required></td>
        </tr>
        <tr>
          <td>password</td>
          <td><input type="password" name="user_password" id="user_password" placeholder="insert your password" required></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="submit">simpan data</button></td>
        </tr>
      </table>
    </form>
  </body>
</html>
