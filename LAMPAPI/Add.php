<?php
    $inData = getRequestInfo();

    $conn = new mysqli("localhost", "Admin", "monstergroup3Key", "COP4331");
	if( $conn->connect_error )
	{
		returnWithError( $conn->connect_error );
	}
	else
	{
        $stmt = $conn->prepare("INSERT into Contacts (Name, Phone, Email, UserID) VALUES(?,?,?,?)");
		$stmt->bind_param("ssss", $inData["name"], $inData["phone"], $inData["email"], $inData["userId"]);
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