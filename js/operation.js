function showSpinner() {
    document.getElementById("spinner").style.visibility = "visible";
}
function hideSpinner() {
    setTimeout(function() {
        document.getElementById("spinner").style.visibility = "hidden";
    }, 500);
}

function saveInstruments(trayId, instTypeId, instNumber) {
    showSpinner();
    console.log(trayId, instTypeId, instNumber);
    hideSpinner();
}

function associateTray(operationId, trayTypeId, originalId) {
    
    if (!operationId || !trayTypeId || !originalId) {
        alert('Fill all the fields, Please!');
        return;    
    }
    showSpinner();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            switch (this.status) {
                case 200:
                    try {
                        var response = JSON.parse(this.responseText);
                        alert(response.message);
                        //reload the page
                        location.reload();
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
            hideSpinner();
        }
    }
    xmlhttp.open("POST", "./json/saveTray.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("operationId="+operationId+"&trayTypeId="+trayTypeId+"&originalId="+originalId);
}
