<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/operation.js"></script>
</head>
<body>
    <div id='spinner' class='itemsCentered' style="position: absolute; width: 100%; height: 100%; visibility: visible">
        <div class="loader"></div>
    </div>
    <h3 class='flex1 itemsCentered'>Operation Edit</h3>
    <div class='listContainer'>
        <div class='listContainer'>
            <div class='listRow header' >
                <div class='idColumn'>ID</div>
                <div class='nameColumn'>Name</div>
                <div class='typeColumn'>Type</div>
                <div class='dateColumn'>Date</div>
            </div>
            <div class='listRow odd' >
                <div class='idColumn'><?php echo $_POST["operationId"]?></div>
                <div class='nameColumn'><?php echo $_POST["operationName"]?></div>
                <div class='typeColumn'><?php echo $_POST["operationType"]?></div>
                <div class='dateColumn'><?php echo $_POST["operationDate"]?></div>
            </div>
        </div>
    </div>
</body>
</html>
