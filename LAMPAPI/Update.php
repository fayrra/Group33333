<?php
    $inData = getRequestInfo();

    $conn = new mysqli("localhost", "Admin", "monstergroup3Key", "COP4331");
	if( $conn->connect_error )
	{
		returnWithError( $conn->connect_error );
	}
	else
	{
        $stmt = $conn->prepare("UPDATE Contacts SET Phone=?, Email=? WHERE Name=? AND UserID=?");
		$stmt->bind_param("ssss", $inData["newPhone"], $inData["newEmail"], $inData["name"], $inData["userId"]);
		$stmt->execute();
        $stmt->close();
		$conn->close();
		returnWithError("");
    }

    function getRequestInfo()
	{
		return json_decode(file_get_contents('php://input'), true);
	}

    function sendResultInfoAsJson( $obj )
	{
		header('Content-type: application/json');
		echo $obj;
	}

    function returnWithError( $err )
	{
		$retValue = '{"error":"' . $err . '"}';
		sendResultInfoAsJson( $retValue );
	}
?>