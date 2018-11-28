<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <script>
    function loadOperations(id, name, date) {
       /* if (str.length == 0) { 
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {*/
            /*var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "gethint.asp?q=" + str, true);
            xmlhttp.send();*/
        //}
        populateList([0, 1, 2, 3])
    }
    function populateList(data) {
        let rows = '';
        data.forEach((operation) => {
            rows +=
                "<div class='listRow'>"+
                    "<div class='idColumn'>001</div>"+
                    "<div class='nameColumn'> JN Hernia</div>"+
                    "<div class='typeColumn'>Hernia</div>"+
                    "<div class='dateColumn'>10/12/2018</div>"+
                    "<div class='traysColumn'>4</div>"+
                "</div>";
        });
        document.getElementById("listDataContainer").innerHTML = rows;
    }
    </script>
</head>
<body onload="loadOperations()">
Operations List
    <div class='listContainer'>
        <div class='listRow header' >
            <div class='idColumn'>ID</div>
            <div class='nameColumn'>Name</div>
            <div class='typeColumn'>Type</div>
            <div class='dateColumn'>Date</div>
            <div class='traysColumn'>Trays</div>
        </div>
        <div id='listDataContainer'>
        </div>
    </div>
</body>
</html>
