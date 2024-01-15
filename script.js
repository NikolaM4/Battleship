function check(x, y) {
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "check.php?x=" + x + "&y=" + y, true);
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      let response = JSON.parse(xmlhttp.responseText);
      if (response.goal) {
        document.getElementById(x + "-" + y).style.backgroundColor = "red";
        document.getElementById(x + "-" + y).removeAttribute("onclick");
      } else {
        document.getElementById(x + "-" + y).style.backgroundColor = "blue";
        document.getElementById(x + "-" + y).removeAttribute("onclick");
      }

      if (response.end) {
        let cells = document.querySelectorAll("td");
        alert(`Congratulation, you finished game in ${response.tries} tries`);
        cells.forEach(function (cell) {
          cell.removeAttribute("onclick");
        });
      }
    }
  };
  xmlhttp.send();
}
