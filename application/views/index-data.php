<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>halaman index</title>
  </head>
  <body>
    <h1>ini adalah halaman index untuk melihat data</h1><br>

    <?php echo $this->session->flashdata('info'); ?>

    <button><a href="<?php echo base_url('testcontroller/tambahData'); ?>">tambah data</a></button> <br><br>
    <table border="1" cellspacing="2">
      <tr>
        <th>badge</th>
        <th>email</th>
        <th>password</th>
      </tr>
      <?php foreach($tabelData as $data) :?>
      <tr>
        <td><?php echo $data->user_name; ?></td>
        <td><?php echo $data->user_email; ?></td>
        <td><?php echo $data->user_password; ?></td>
      </tr>
    <?php endforeach ?>
    </table>
  </body>
</html>
