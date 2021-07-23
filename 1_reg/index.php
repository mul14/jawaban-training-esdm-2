<?php
if ($_POST) {
  $fp = fopen('file.csv', 'a');

  $data[] = $_POST['name'];
  $data[] = $_POST['email'];
  $data[] = $_POST['phone'];
  $data[] = $_FILES['photo']['name'];
  $data[] = $_FILES['doc']['name'];

  
  if (!file_exists('photos')) mkdir('photos');
  move_uploaded_file(
    $_FILES['photo']['tmp_name'],
    'photos/' . time() . $_FILES['photo']['name'],
  );

  if (!file_exists('docs')) mkdir('docs');
  move_uploaded_file(
    $_FILES['doc']['tmp_name'],
    'docs/' . time() . $_FILES['doc']['name'],
  );

  fputcsv($fp, $data);

  fclose($fp);
}
?>

<form method="POST" enctype="multipart/form-data">
  <div>
    <label for="">Name</label>
    <input type="text" name="name" placeholder="Nama">
  </div>
  <div>
    <label for="">Email</label>
    <input type="email" name="email" placeholder="Email">
  </div>
  <div>
    <label for="">Phone</label>
    <input type="phone" name="phone" placeholder="Phone">
  </div>
  <div>
    <label for="">Foto</label>
    <input type="file" name="photo" placeholder="Foto" accept="image/*">
  </div>
  <div>
    <label for="">Dokumen</label>
    <input type="file" name="doc" placeholder="Dokumen">
  </div>
  <button>Simpan</button>
</form>
