<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-RN1XFJX4L/vo3v4VG9gCRdSRXuX6PmV/8OG0daKLffg0Pzuj0UjbuKc5zKyWjTbhVbYV+V8PVQjZ4UuiRteh2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <title>Appication gestion stage</title>
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
