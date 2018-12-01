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

function populateList(trays) {
    var rows = '';
    trays.forEach(function (tray, index) {
        var color = index % 2 === 0 ? 'odd' : null;
        rows +=
            `<a href='#' class='listRow ${color}'>`+
                `<div class='idColumn'>${tray.id}</div>`+
                `<div class='typeColumn'>${tray.type}</div>`+
                `<div class='idColumn'>${tray.operationId}</div>`+
                `<div class='typeColumn'>${tray.operationType}</div>`+
                `<div class='dateColumn'>${tray.date}</div>`+
                `<div class='statusColumn'>${tray.trayStatus}</div>`+
            "</a>";
    });
    document.getElementById("trayListDataContainer").innerHTML = rows;
}