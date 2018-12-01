function loadTrays() {
   /* if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {*/
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                switch (this.status) {
                    case 200:
                        //document.getElementById("txtHint").innerHTML = this.responseText;
                        populateList(JSON.parse(this.responseText));
                        break;
                    case 403:
                    case 404:
                    case 500:
                    default:
                        console.log('Error');
                }
            }
        }
        xmlhttp.open("GET", "getTrays.php", true);
        xmlhttp.send();
    //}
    //populateList([0, 1, 2, 3])
}

function populateList(operations) {
    var rows = '';
    operations.forEach(function (operation, index) {
        var color = index % 2 === 0 ? 'odd' : null;
        rows +=
            `<a href='#' class='listRow ${color}'>`+
                `<div class='idColumn'>${operation.id}</div>`+
                `<div class='typeColumn'>${operation.type}</div>`+
                `<div class='idColumn'>${operation.surgey.id}</div>`+
                `<div class='dateColumn'>${operation.date}</div>`+
                `<div class='statusColumn'>${operation.status.desc}</div>`+
            "</a>";
    });
    document.getElementById("trayListDataContainer").innerHTML = rows;
}