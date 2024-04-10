<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Appication gestion stage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
    function sortTable(colIndex) {
      var table = document.getElementById("maTable");
      var rows = table.rows;
      var switching = true;

      while (switching) {
          switching = false;
          for (var i = 1; i < (rows.length - 1); i++) {
              var shouldSwitch = false;
              var x = rows[i].getElementsByTagName("TD")[colIndex].textContent.toLowerCase();
              var y = rows[i + 1].getElementsByTagName("TD")[colIndex].textContent.toLowerCase();

              if (x > y) {
                  shouldSwitch = true;
                  break;
              }
          }
          if (shouldSwitch) {
              rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
              switching = true;
          }
      }
  }

</script>
</head>
<body>
