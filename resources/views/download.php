<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Download | Veganresan</title>

  <style>
  button {
    border: 1px solid #ccc;
  }
  </style>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
    var button = document.querySelector('button');
    button.addEventListener('click', function () {
      document.location.href = '<?= $android['apkUrl']; ?>';
    });
  });
  </script>
</head>
<body>
  <h1>Veganresan</h1>
  <button>Download <?= $android['version']; ?></button>
</body>
</html>
