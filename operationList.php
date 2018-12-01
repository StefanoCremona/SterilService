<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <script src="./js/operations.js"></script>
</head>
<body onload="loadOperations();loadOperationTypes();">
    <div id='spinner' class='itemsCentered' style="position: absolute; width: 100%; height: 100%; visibility: visible">
        <div class="loader"></div>
    </div>
    <h3 class='flex1 itemsCentered'>Operations List</h3>
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
    <h3 class='flex1 itemsCentered'>New Operation</h3>
    <div class='listContainer'>
        <div class='listRow header' >
            <div class='nameColumn'>Name</div>
            <div class='typeColumn'>Type</div>
            <div class='dateColumn'>Date</div>
            <div class='typeColumn'>Actions</div>
        </div>
    </div>
    <div class='listContainer'>
        <div class='horizontalAlign' >
            <div class='nameColumn'>
                <input class='flex1' type="text" />
            </div>
            <div class='typeColumn'>
                <select  class='flex1' id='listOperartionType'>
                </select>
            </div>
            <div class='dateColumn'>
                <input  class='flex05' type="date" id='operationDate' />
                <input  class='flex05' type="time" id='operationTime' />
            </div>
            <div class='typeColumn'>
                <input class='flex1 itemsCentered' type='submit' value='SEND' onClick='showSpinner();hideSpinner()'>
            </div>
        </div>
    </div>
</body>
</html>
