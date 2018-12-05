document.addEventListener('DOMContentLoaded', function(){ 
    document.getElementById("saveOperationButton").addEventListener("click", saveOperation);
    loadOperations();
    loadOperationTypes();
}, false)

function loadOperations() {
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
        xmlhttp.open("GET", "./json/getOperations.php", true);
        xmlhttp.send();
    //}
    //populateList([0, 1, 2, 3])
}

function showSpinner() {
    document.getElementById("spinner").style.visibility = "visible";
}
function hideSpinner() {
    setTimeout(function() {
        document.getElementById("spinner").style.visibility = "hidden";
    }, 500);
}

function populateList(operations) {
    var rows = '';
    operations.forEach(function (operation, index) {
        var color = index % 2 === 0 ? 'odd' : null;
        rows +=
            '<form id="form'+operation.id+'" method="POST" action="operationEdit.php">'+
                `<a href='#' onclick='form${operation.id}.submit()' class='listRow ${color}'>`+
                    `<div class='idColumn'>${operation.id}</div>`+
                    `<div class='nameColumn'>${operation.name}</div>`+
                    `<div class='typeColumn'>${operation.type}</div>`+
                    `<div class='dateColumn'>${operation.date}</div>`+
                "</a>"+
            `<input type='hidden' name='operationId' value='${operation.id}'/>`+
            `<input type='hidden' name='operationName' value='${operation.name}'/>`+
            `<input type='hidden' name='operationType' value='${operation.type}'/>`+
            `<input type='hidden' name='operationDate' value='${operation.date}'/>`+
            `<input type='hidden' name='action' value='operationShow'/>`+
            '</form>';
    });
    document.getElementById("listDataContainer").innerHTML = rows;
    hideSpinner();
}

function loadOperationTypes() {
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                switch (this.status) {
                    case 200:
                        //document.getElementById("txtHint").innerHTML = this.responseText;
                        populateOperationTypesList(JSON.parse(this.responseText));
                        break;
                    case 403:
                    case 404:
                    case 500:
                    default:
                        console.log('Error');
                }
            }
        }
        xmlhttp.open("GET", "./json/getOperationTypes.php", true);
        xmlhttp.send();
}


function populateOperationTypesList(operations) {
    var rows = `<option value="-1" selected></option>`;
    operations.forEach(function (operation, index) {
        rows += `<option value="${operation.id}">${operation.name}</option>`;
    });
    document.getElementById("operationType").innerHTML = rows;
}

function saveOperation() {
    const name = document.getElementById('operationName').value;
    const date = document.getElementById('operationDate').value;
    const time = document.getElementById('operationTime').value;
    
    var selector = document.getElementById('operationType');
    var type = selector[selector.selectedIndex].value;
    //alert(time); return;
    if (!name || type < 0 || !date || !time) {
        alert('Fill all the fields, Please!');
        return;    
    }
    showSpinner()
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            switch (this.status) {
                case 200:
                    try {
                        var response = JSON.parse(this.responseText);
                        loadOperations();
                        alert(response.message);
                        response.success && document.getElementById("operationForm").reset();
                    } catch (error) {
                        alert(error);
                    }
                    
                    break;
                case 403:
                case 404:
                case 500:
                default:
                    console.log('Error');
            }
        }
    }
    xmlhttp.open("POST", "./json/saveOperation.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("name="+name+"&type="+type+"&date="+date+" "+time);
}
