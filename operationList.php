<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <script src="./js/operations.js"></script>
</head>
<body>
    <div id='spinner' class='itemsCentered' style="position: absolute; width: 100%; height: 100%; visibility: visible">
        <div class="loader"></div>
    </div>
    <h3 class='flex1 itemsCentered'>Operations List</h3>
    <div class='listContainer'>
        <div class='listRow header' >
            <div class='idColumn'>ID</div>
            <div class='idColumn'>ORIGINAL ID</div>
            <div class='nameColumn'>Name</div>
            <div class='typeColumn'>Type</div>
            <div class='dateColumn'>Date</div>
        </div>
        <div id='listDataContainer'>
        </div>
    </div>
    <h3 class='flex1 itemsCentered'>New Operation</h3>
    <div class='listContainer'>
        <div class='listRow header' >
            <div class='nameColumn'>ORIGINAL ID</div>
            <div class='nameColumn'>Name</div>
            <div class='typeColumn'>Type</div>
            <div class='dateColumn'>Date</div>
            <div class='typeColumn'>Actions</div>
        </div>
    </div>
    <div class='listContainer'>
        <form id="operationForm">
        <div class='horizontalAlign' >
            <div class='nameColumn'>
                <input class='flex1' type="text" id="operationOriginalId"/>
            </div>
            <div class='nameColumn'>
                <input class='flex1' type="text" id="operationName"/>
            </div>
            <div class='typeColumn'>
                <select  class='flex1' id="operationType">
                </select>
            </div>
            <div class='dateColumn'>
                <input  class='flex05' type="date" id='operationDate' />
                <input  class='flex05' type="time" id='operationTime' />
            </div>
            <div class='typeColumn'>
                <input class='flex1 itemsCentered' type='button' value='SEND' id="saveOperationButton" >
            </div>
        </div>
        </form>
    </div>
</body>
</html>
