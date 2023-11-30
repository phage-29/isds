<?php
$page = "Response Page";

// requires
require_once 'conn.php';
require_once "sendmail.php";

session_start();

$response = array();

if (isset($_POST['Login'])) {
    $Username = $conn->real_escape_string($_POST['Username']);
    $Password = $conn->real_escape_string($_POST['Password']);

    $query = "SELECT * FROM `users` where `Username`=? or `Email`=?";

    try {
        $result = $conn->execute_query($query, [$Username, $Username]);

        if ($result && $result->num_rows === 1) {

            $row = $result->fetch_object();

            if (password_verify($Password, $row->Password)) {

                $_SESSION['id'] = $row->id;
                $_SESSION['Role'] = $row->Role;

                $response['status'] = 'success';
                $response['message'] = 'Login successful!';
                $response['redirect'] = 'dashboard.php';
            } else {

                $response['status'] = 'error';
                $response['message'] = 'Invalid Password!';
            }
        } else {

            $response['status'] = 'error';
            $response['message'] = 'Username or Email not found!';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

if (isset($_POST['Registration'])) {
    $FirstName = $conn->real_escape_string($_POST['FirstName']);
    $MiddleName = $conn->real_escape_string($_POST['MiddleName']);
    $LastName = $conn->real_escape_string($_POST['LastName']);
    $Position = $conn->real_escape_string($_POST['Position']);
    $DivisionID = $conn->real_escape_string($_POST['DivisionID']);
    $Email = $conn->real_escape_string($_POST['Email']);
    $DateOfBirth = $conn->real_escape_string($_POST['DateOfBirth']);
    $ClientType = $conn->real_escape_string($_POST['ClientType']);
    $Sex = $conn->real_escape_string($_POST['Sex']);
    $Phone = $conn->real_escape_string($_POST['Phone']);
    $PWD = $conn->real_escape_string($_POST['PWD']);
    $Address = $conn->real_escape_string($_POST['Address']);

    $Username = $conn->real_escape_string($_POST['Username']);
    $Password = $conn->real_escape_string($_POST['Password']);

    try {
        $query = "SELECT * FROM `users` where `Email`=?";
        $result = $conn->execute_query($query, [$Email]);

        if ($result->num_rows === 0) {
            $query = "SELECT * FROM `users` where `Username`=?";
            $result = $conn->execute_query($query, [$Username]);

            if ($result->num_rows === 0) {
                $Password = password_hash($Password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users(`FirstName`,`MiddleName`,`LastName`,`Position`,`DivisionID`,`Email`,`DateOfBirth`,`ClientType`,`Sex`,`Phone`,`PWD`,`Address`,`Username`,`Password`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $result = $conn->execute_query($query, [$FirstName, $MiddleName, $LastName, $Position, $DivisionID, $Email, $DateOfBirth, $ClientType, $Sex, $Phone, $PWD, $Address, $Username, $Password]);

                $response['status'] = 'success';
                $response['message'] = 'Registration complete!';
                $response['redirect'] = 'login.php';
            } else {

                $response['status'] = 'error';
                $response['message'] = 'Username Already exist!';
            }
        } else {

            $response['status'] = 'error';
            $response['message'] = 'Email Already exist!';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

if (isset($_POST['EditProfile'])) {
    $FirstName = $conn->real_escape_string($_POST['FirstName']);
    $MiddleName = $conn->real_escape_string($_POST['MiddleName']);
    $LastName = $conn->real_escape_string($_POST['LastName']);
    $DivisionID = $conn->real_escape_string($_POST['DivisionID']);
    $Email = $conn->real_escape_string($_POST['Email']);
    $Phone = $conn->real_escape_string($_POST['Phone']);
    $Address = $conn->real_escape_string($_POST['Address']);


    try {
        $query = "UPDATE `users` SET `FirstName`=?,`MiddleName`=?,`LastName`=?,`DivisionID`=?,`Email`=?,`Phone`=?,`Address`=? WHERE `id`=?";
        $result = $conn->execute_query($query, [$FirstName, $MiddleName, $LastName, $DivisionID, $Email, $Phone, $Address, $_SESSION["id"]]);

        if ($result) {

            $response['status'] = 'success';
            $response['message'] = 'Profile Updated!';
            $response['redirect'] = 'profile.php';
        } else {

            $response['status'] = 'error';
            $response['message'] = 'Failed Updating Profile!';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

if (isset($_POST['ChangePassword'])) {
    $Password = $conn->real_escape_string($_POST['Password']);
    $NewPassword = $conn->real_escape_string($_POST['NewPassword']);
    $VerPassword = $conn->real_escape_string($_POST['VerPassword']);

    try {
        $query = "SELECT * FROM users where `id`=?";
        $result = $conn->execute_query($query, [$_SESSION['id']]);

        if ($result && $result->num_rows === 1) {

            $row = $result->fetch_object();

            if (password_verify($Password, $row->Password)) {
                if ($NewPassword == $VerPassword) {
                    $HashedPassword = password_hash($NewPassword, PASSWORD_DEFAULT);
                    $query2 = "UPDATE `users` SET `Password`=? WHERE `id`=?";
                    try {

                        $result2 = $conn->execute_query($query2, [$HashedPassword, $_SESSION["id"]]);

                        if ($result2) {

                            $response['status'] = 'success';
                            $response['message'] = 'Password Changed!';
                            $response['redirect'] = 'profile.php';
                        } else {

                            $response['status'] = 'error';
                            $response['message'] = 'Failed changing password!';
                        }
                    } catch (Exception $e) {
                        $response['status'] = 'error';
                        $response['message'] = $e->getMessage();
                    }
                } else {

                    $response['status'] = 'error';
                    $response['message'] = 'Password don\'t match!';
                }
            } else {

                $response['status'] = 'error';
                $response['message'] = 'Invalid Password!';
            }
        } else {

            $response['status'] = 'error';
            $response['message'] = 'Username not found!';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

if (isset($_POST['ICTRequest'])) {
    $DateRequested = date('Y-m-d');
    $Ym = date_create($DateRequested)->format("Ym");
    $RequestNo = 'REQ-' . $Ym . '-' . str_pad($conn->query("SELECT COUNT(*) AS RequestCount FROM helpdesks WHERE DATE_FORMAT(DateRequested, '%Y%m') = '$Ym'")->fetch_object()->RequestCount + 1, 5, '0', STR_PAD_LEFT);

    $CategoryID = $conn->real_escape_string($_POST['CategoryID']);
    $SubCategoryID = $conn->real_escape_string($_POST['SubCategoryID']);
    $PreferredSchedule = $conn->real_escape_string($_POST['PreferredSchedule']);
    $Complaint = $conn->real_escape_string($_POST['Complaint']);

    $query = "INSERT INTO helpdesks (`RequestNo`, `CategoryID`, `SubCategoryID`, `PreferredSchedule`, `Complaint`, `RequestedBy`, `DateRequested`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $result = $conn->execute_query($query, [$RequestNo, $CategoryID, $SubCategoryID, $PreferredSchedule, $Complaint, $_SESSION['id'], $DateRequested]);
    $LastID = $conn->insert_id;

    $targetDirectory = "uploads/";
    foreach ($_FILES["Files"]["tmp_name"] as $key => $tmp_name) {
        $originalFilename = $_FILES["Files"]["name"][$key];
        $fileExtension = pathinfo($originalFilename, PATHINFO_EXTENSION);

        $uniqueFilename = uniqid() . '.' . $fileExtension;
        $targetFile = $targetDirectory . $uniqueFilename;

        if (move_uploaded_file($_FILES["Files"]["tmp_name"][$key], $targetFile)) {
            $query = "INSERT INTO files (`HelpdeskID`, `FileName`) VALUES (?, ?)";
            $result = $conn->execute_query($query, [$LastID, $uniqueFilename]);
        }
    }

    $response['status'] = 'success';
    $response['message'] = 'Request Placed!';
    $response['redirect'] = 'ictrequests.php';
}

if (isset($_POST['CancelICTRequest'])) {
    $id = $conn->real_escape_string($_POST['id']);

    $query = "UPDATE helpdesks SET Status=? WHERE id=?";
    $result = $conn->execute_query($query, ['Cancelled', $id]);

    if ($result) {

        $response['status'] = 'success';
        $response['message'] = 'Request Cancelled!';
        $response['redirect'] = 'ictrequests.php';
    } else {

        $response['status'] = 'error';
        $response['message'] = 'Failed to cancel!';
    }
}

if (isset($_POST['ForgotPassword'])) {
    $Email = $conn->real_escape_string($_POST['Email']);

    $query = "SELECT * FROM users WHERE `Email` = ?";
    $result = $conn->execute_query($query, [$Email]);

    if ($result->num_rows > 0) {
        $ChangePassword = substr(strtoupper(uniqid()), 0, 8);
        $HashedPassword = password_hash($ChangePassword, PASSWORD_DEFAULT);

        $query2 = "UPDATE users SET `Password` = ?, `ChangePassword` = ? WHERE `Email` = ?";
        $result2 = $conn->execute_query($query2, [$HashedPassword, $ChangePassword, $Email]);

        if ($result2) {
            while ($row = $result->fetch_object()) {
                $Subject = "ISDS | Password Reset Request";
                $Message = "Hello " . $row->FirstName . " " . $row->LastName . ",<br><br>";
                $Message .= "We received a request to reset your password. If you didn't make this request, you can ignore this email. Otherwise, please login using the provided password to reset your previous password:<br><br>";
                $Message .= "Reset Password: " . $ChangePassword . "<br><br>";
                $Message .= "The password will expire in 120 seconds.<br><br>";
                $Message .= "If you have any questions or need further assistance, please don't hesitate to contact us.<br><br>";
                $Message .= "Thank you for choosing our service!<br><br>";
                $Message .= "Sincerely, Admin<br>";
                sendEmail($row->Email, $Subject, $Message);

                $response['status'] = 'success';
                $response['message'] = 'Temporary Password Sent!';
                $response['redirect'] = '../login.php';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Password update failed!';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Email does not exist!';
    }
}

if (isset($_POST['UpdatePassword'])) {
    $NewPassword = $conn->real_escape_string($_POST['NewPassword']);
    $VerifyPassword = $conn->real_escape_string($_POST['VerifyPassword']);

    $query = "SELECT * FROM users where Username=?";

    try {
        $result = $conn->execute_query($query, [$_SESSION['Username']]);

        if ($result && $result->num_rows === 1) {
            if ($NewPassword == $VerifyPassword) {
                $HashedPassword = password_hash($NewPassword, PASSWORD_DEFAULT);
                $query2 = "UPDATE `users` SET `Password` = ?, `ChangePassword` = NULL WHERE `Username` = ?";
                try {

                    $result2 = $conn->execute_query($query2, [$HashedPassword, $_SESSION["Username"]]);

                    if ($result2) {

                        $response['status'] = 'success';
                        $response['message'] = 'Password Changed!';
                        $response['redirect'] = '../dashboard.php';
                    } else {

                        $response['status'] = 'error';
                        $response['message'] = 'Failed changing password!';
                    }
                } catch (Exception $e) {
                    $response['status'] = 'error';
                    $response['message'] = $e->getMessage();
                }
            } else {

                $response['status'] = 'error';
                $response['message'] = 'Password don\'t match!';
            }
        } else {

            $response['status'] = 'error';
            $response['message'] = 'Username not found!';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

if (isset($_POST['ContactUs'])) {
    $Name = $conn->real_escape_string($_POST['Name']);
    $Email = $conn->real_escape_string($_POST['Email']);
    $Subject = $conn->real_escape_string($_POST['Subject']);
    $Message = $conn->real_escape_string($_POST['Message']);

    if (sendEmail('dace.phage@gmail.com', $Subject, 'Senders Name: ' . $Name . '<br>Senders Email: ' . $Email . '<br><br>' . $Message)) {
        $response['status'] = 'success';
        $response['message'] = 'Email Sent!';
        $response['redirect'] = '../#';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Unable to Send Email!';
    }
}

if (isset($_POST['Request'])) {
    $DateRequested = date('Y-m-d');

    $Ym = date_format(date_create($DateRequested), "Ym");
    $result = $conn->query("SELECT COUNT(*) AS RequestCount FROM helpdesks WHERE DATE_FORMAT(DateRequested, '%Y%m') = '$Ym'");
    $row = $result->fetch_object();
    $RequestNo = 'REQ-' . $Ym . '-' . str_pad($row->RequestCount + 1, 5, '0', STR_PAD_LEFT);
    $Email = $conn->real_escape_string($_POST['Email']);
    $FirstName = $conn->real_escape_string($_POST['FirstName']);
    $LastName = $conn->real_escape_string($_POST['LastName']);
    $DivisionID = $conn->real_escape_string($_POST['DivisionID']);
    $RequestType = $conn->real_escape_string($_POST['RequestType']);
    $PropertyNo = $conn->real_escape_string($_POST['PropertyNo']);
    $CategoryID = $conn->real_escape_string($_POST['CategoryID']);
    $SubCategoryID = $conn->real_escape_string($_POST['SubCategoryID']);
    $Complaints = $conn->real_escape_string($_POST['Complaints']);
    $DatePreferred = $conn->real_escape_string($_POST['DatePreferred']);
    $TimePreferred = $conn->real_escape_string($_POST['TimePreferred']);

    $query = "INSERT INTO
            `helpdesks` (`DateRequested`, `RequestNo`, `Email`, `FirstName`, `LastName`, `DivisionID`, `RequestType`, `PropertyNo`, `CategoryID`, `SubCategoryID`, `Complaints`, `DatePreferred`, `TimePreferred`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $result = $conn->execute_query($query, [$DateRequested, $RequestNo, $Email, $FirstName, $LastName, $DivisionID, $RequestType, $PropertyNo, $CategoryID, $SubCategoryID, $Complaints, $DatePreferred, $TimePreferred]);

    $Subject = 'Ticket Confirmation - Request No. ' . $RequestNo;
    $Message = "Dear " . $FirstName . " " . $LastName . ",<br><br>";
    $Message .= "Thank you for submitting your request to the ICT Service Desk System. Here are the details of your request:<br><br>";
    $Message .= "<strong>Request No.:</strong> " . $RequestNo . "<br>";
    $Message .= "<strong>Your Email:</strong> " . $Email . "<br>";
    $Message .= "<strong>Full Name:</strong> " . $FirstName . " " . $LastName . "<br>";
    $Message .= "<strong>Division:</strong> " . $conn->query("SELECT * FROM divisions WHERE id='" . $DivisionID . "'")->fetch_object()->Division . "<br>";
    $Message .= "<strong>Request Type:</strong> " . $RequestType . "<br>";
    $Message .= "<strong>Category/Nature of Request:</strong> " . $conn->query("SELECT * FROM categories WHERE id='" . $CategoryID . "'")->fetch_object()->Category . " / " . $conn->query("SELECT * FROM subcategories WHERE id='" . $SubCategoryID . "'")->fetch_object()->SubCategory . "<br>";
    $Message .= "<strong>Description of Assistance Requested:</strong> " . $Complaints . "<br>";
    $Message .= "<strong>Preferred Schedule:</strong> " . date_format(date_create($DatePreferred), "d/m/Y") . " " . date_format(date_create($TimePreferred), "H:i a") . "<br><br>";
    $Message .= "<strong>Click the link below to view your request</strong><br>";
    $Message .= "<a href='http://r6itbpm.site/dti-isds/requestserviceview.php?Request=$RequestNo'>View Request</a><br><br>";
    $Message .= "Our team will review your request and address it as soon as possible. You will receive further communication regarding the status and resolution of your request.<br><br>";
    $Message .= "Thank you for choosing our services.<br><br>";
    $Message .= "Best regards,<br><strong>ICT Service Desk Team</strong>";

    sendEmail($Email, $Subject, $Message);

    $response['status'] = 'success';
    $response['message'] = 'Your request has been received';
    $response['redirect'] = '../request.php?Email=' . $Email;
}

if (isset($_POST['Encode'])) {
    $DateRequested = $conn->real_escape_string($_POST['DateRequested']);

    $Ym = date_format(date_create($DateRequested), "Ym");
    $result = $conn->query("SELECT COUNT(*) AS RequestCount FROM helpdesks WHERE DATE_FORMAT(DateRequested, '%Y%m') = '$Ym'");
    $row = $result->fetch_object();
    $RequestNo = 'REQ-' . $Ym . '-' . str_pad($row->RequestCount + 1, 5, '0', STR_PAD_LEFT);
    $Email = $conn->real_escape_string($_POST['Email']);
    $FirstName = $conn->real_escape_string($_POST['FirstName']);
    $LastName = $conn->real_escape_string($_POST['LastName']);
    $DivisionID = $conn->real_escape_string($_POST['DivisionID']);
    $RequestType = $conn->real_escape_string($_POST['RequestType']);
    $PropertyNo = $conn->real_escape_string($_POST['PropertyNo']);
    $CategoryID = $conn->real_escape_string($_POST['CategoryID']);
    $SubCategoryID = $conn->real_escape_string($_POST['SubCategoryID']);
    $Complaints = $conn->real_escape_string($_POST['Complaints']);
    $DatePreferred = $conn->real_escape_string($_POST['DatePreferred']);
    $TimePreferred = $conn->real_escape_string($_POST['TimePreferred']);
    $Status = $conn->real_escape_string($_POST['Status']);
    $DateReceived = $conn->real_escape_string($_POST['DateReceived']);
    $ReceivedBy = $conn->real_escape_string($_POST['ReceivedBy']);
    $DateScheduled = $conn->real_escape_string($_POST['DateScheduled']);
    $RepairType = $conn->real_escape_string($_POST['RepairType']);
    $DatetimeStarted = $conn->real_escape_string($_POST['DatetimeStarted']);
    $DatetimeFinished = $conn->real_escape_string($_POST['DatetimeFinished']);
    $Diagnosis = $conn->real_escape_string($_POST['Diagnosis']);
    $Remarks = $conn->real_escape_string($_POST['Remarks']);
    $ServicedBy = $conn->real_escape_string($_POST['ServicedBy']);
    $ApprovedBy = $conn->real_escape_string($_POST['ApprovedBy']);

    $query = "INSERT INTO
            `helpdesks` (`DateRequested`, `RequestNo`, `Email`, `FirstName`, `LastName`, `DivisionID`, `RequestType`, `PropertyNo`, `CategoryID`, `SubCategoryID`, `Complaints`, `DatePreferred`, `TimePreferred`,`Status`,`DateReceived`,`ReceivedBy`,`DateScheduled`,`RepairType`,`DatetimeStarted`,`DatetimeFinished`,`Diagnosis`,`Remarks`,`ServicedBy`,`ApprovedBy`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $result = $conn->execute_query($query, [$DateRequested, $RequestNo, $Email, $FirstName, $LastName, $DivisionID, $RequestType, $PropertyNo, $CategoryID, $SubCategoryID, $Complaints, $DatePreferred, $TimePreferred, $Status, $DateReceived, $ReceivedBy, $DateScheduled, $RepairType, $DatetimeStarted, $DatetimeFinished, $Diagnosis, $Remarks, $ServicedBy, $ApprovedBy]);

    $response['status'] = 'success';
    $response['message'] = 'Encoded Successfully';
}

if (isset($_POST['UpdateRequest'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $Status = $conn->real_escape_string($_POST['Status']);
    $DateReceived = !empty($_POST['DateReceived']) ? date('Y-m-d', strtotime($_POST['DateReceived'])) : null;
    $ReceivedBy = $_POST['ReceivedBy'] ?? null;
    $DateScheduled = !empty($_POST['DateScheduled']) ? date('Y-m-d H:i:s', strtotime($_POST['DateScheduled'])) : null;
    $RepairType = $conn->real_escape_string($_POST['RepairType']);
    $RepairClassification = $conn->real_escape_string($_POST['RepairClassification']);
    $DatetimeStarted = !empty($_POST['DatetimeStarted']) ? date('Y-m-d H:i:s', strtotime($_POST['DatetimeStarted'])) : null;
    $DatetimeFinished = !empty($_POST['DatetimeFinished']) ? date('Y-m-d H:i:s', strtotime($_POST['DatetimeFinished'])) : null;
    $Diagnosis = $conn->real_escape_string($_POST['Diagnosis']);
    $Remarks = $conn->real_escape_string($_POST['Remarks']);
    $ServicedBy = $_POST['ServicedBy'] ?? null;
    $ApprovedBy = $_POST['ApprovedBy'] ?? null;

    try {
        $query = "SELECT
                    h.`id`,
                    h.`RequestNo`,
                    h.`FirstName`,
                    h.`LastName`,
                    h.`Email`,
                    d.Division as `Division`,
                    h.`DateRequested`,
                    h.`RequestType`,
                    h.`PropertyNo`,
                    c.Category as `Category`,
                    sc.SubCategory as `SubCategory`,
                    h.`Complaints`,
                    h.`DateReceived`,
                    CONCAT(u1.FirstName, ' ', u1.LastName) as `ReceivedBy`,
                    h.`DateScheduled`,
                    h.`RepairType`,
                    h.`RepairClassification`,
                    h.`DatetimeStarted`,
                    h.`DatetimeFinished`,
                    h.`Diagnosis`,
                    h.`Remarks`,
                    CONCAT(u2.FirstName, ' ', u2.LastName) as `ServicedBy`,
                    CONCAT(u3.FirstName, ' ', u3.LastName) as `ApprovedBy`,
                    h.`Status`,
                    h.`CreatedAt`,
                    h.`UpdatedAt`
                FROM helpdesks h
                    LEFT JOIN divisions d ON h.`DivisionID` = d.id
                    LEFT JOIN categories c ON h.`CategoryID` = c.id
                    LEFT JOIN subcategories sc ON h.`SubCategoryID` = sc.id
                    LEFT JOIN users u1 ON h.`ReceivedBy` = u1.id
                    LEFT JOIN users u2 ON h.`ServicedBy` = u2.id
                    LEFT JOIN users u3 ON h.`ApprovedBy` = u3.id WHERE h.id=?";
        $result = $conn->execute_query($query, [$id]);

        if ($result->num_rows) {
            try {
                $updateQuery = "UPDATE helpdesks SET `Status`=?, `DateReceived`=?, `ReceivedBy`=?, `DateScheduled`=?, `RepairType`=?, `RepairClassification`=?, `DatetimeStarted`=?, `DatetimeFinished`=?, `Diagnosis`=?, `Remarks`=?, `ServicedBy`=?, `ApprovedBy`=? WHERE `id`=?";
                $updateResult = $conn->execute_query($updateQuery, [$Status, $DateReceived, $ReceivedBy, $DateScheduled, $RepairType, $RepairClassification, $DatetimeStarted, $DatetimeFinished, $Diagnosis, $Remarks, $ServicedBy, $ApprovedBy, $id]);

                if ($updateResult) {
                    $query2 = "SELECT
                    h.`id`,
                    h.`RequestNo`,
                    h.`FirstName`,
                    h.`LastName`,
                    h.`Email`,
                    d.Division as `Division`,
                    h.`DateRequested`,
                    h.`RequestType`,
                    h.`PropertyNo`,
                    c.Category as `Category`,
                    sc.SubCategory as `SubCategory`,
                    h.`Complaints`,
                    h.`DateReceived`,
                    CONCAT(u1.FirstName, ' ', u1.LastName) as `ReceivedBy`,
                    h.`DateScheduled`,
                    h.`RepairType`,
                    h.`RepairClassification`,
                    h.`DatetimeStarted`,
                    h.`DatetimeFinished`,
                    h.`Diagnosis`,
                    h.`Remarks`,
                    CONCAT(u2.FirstName, ' ', u2.LastName) as `ServicedBy`,
                    CONCAT(u3.FirstName, ' ', u3.LastName) as `ApprovedBy`,
                    h.`Status`,
                    h.`CreatedAt`,
                    h.`UpdatedAt`
                FROM helpdesks h
                    LEFT JOIN divisions d ON h.`DivisionID` = d.id
                    LEFT JOIN categories c ON h.`CategoryID` = c.id
                    LEFT JOIN subcategories sc ON h.`SubCategoryID` = sc.id
                    LEFT JOIN users u1 ON h.`ReceivedBy` = u1.id
                    LEFT JOIN users u2 ON h.`ServicedBy` = u2.id
                    LEFT JOIN users u3 ON h.`ApprovedBy` = u3.id WHERE h.id=?";
                    $result2 = $conn->execute_query($query2, [$id]);

                    while ($row = $result2->fetch_object()) {
                        $Subject = 'Ticket ' . $row->Status . ' - Request No. ' . $row->RequestNo;

                        $Message = "Dear " . $row->FirstName . " " . $row->LastName . ",<br><br>";

                        switch ($row->Status) {
                            case 'Pending':
                                $Message .= "Your request is currently pending review. Our team will assess it shortly.<br><br>";
                                break;
                            case 'On Going':
                                $Message .= "Your request is currently being addressed. Our team is actively working on resolving it.<br><br>";
                                break;
                            case 'Completed':
                                $Message .= "Good news! Your request has been successfully resolved. If you have any further questions, feel free to reach out.<br><br>";
                                break;
                            case 'Denied':
                                $Message .= "Unfortunately, your request has been denied. If you have any concerns or need further clarification, please contact us.<br><br>";
                                break;
                            case 'Unserviceable':
                                $Message .= "We regret to inform you that we are unable to service your request at this time. If you have any other inquiries, please let us know.<br><br>";
                                break;
                            default:
                                $Message .= "Your request is in an undefined status. Please contact our support team for further assistance.<br><br>";
                        }

                        $Message .= "Request details:<br><br>";
                        $Message .= "<strong>Request No.:</strong>" . $row->RequestNo . "<br>";
                        $Message .= "<strong>Your Email:</strong> " . $row->Email . "<br>";
                        $Message .= "<strong>First Name:</strong> " . $row->FirstName . "<br>";
                        $Message .= "<strong>Division:</strong> " . $row->Division . "<br>";
                        $Message .= "<strong>Category:</strong> " . $row->Category . "<br>";
                        $Message .= "<strong>Sub Category:</strong> " . $row->SubCategory . "<br>";
                        $Message .= "<strong>Request Type:</strong> " . $row->RequestType . "<br>";
                        $Message .= "<strong>Description of Assistance Requested:</strong> " . $row->Complaints . "<br><br>";
                        if ($row->Status == 'Completed') {
                            $Message .= "Kindly spare a moment to complete our Customer Satisfaction Form to provide feedback. <br><a href='https://forms.office.com/r/tBGKen7rG6'>CSF Form</a><br><br>";
                        } else {
                            $Message .= "<strong>Click the link below to view your request</strong><br><a href='http://r6itbpm.site/dti-isds/requestserviceview.php?Request=" . $row->RequestNo . "'>View Request</a><br><br>";
                        }

                        $Message .= "Thank you for choosing our services.<br><br>";
                        $Message .= "Best regards,<br><strong>ICT Service Desk Team</strong>";

                        sendEmail($row->Email, $Subject, $Message);

                        $response['status'] = 'success';
                        $response['message'] = 'Request has been updated';
                        $response['redirect'] = '../helpdesks.php';
                    }
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Error updating request record';
                }
            } catch (Exception $e) {
                $response['status'] = 'error';
                $response['message'] = 'Error: ' . $e->getMessage();
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Request record not found';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = 'Error: ' . $e->getMessage();
    }
}

if (isset($_GET['Dashboard'])) {

    // Count per status
    $query = "SELECT * FROM helpdesks WHERE Status = ?";
    $result = $conn->execute_query($query, ['Pending']);
    $response['CountPending'] = $result->num_rows;

    $result = $conn->execute_query($query, ['On Going']);
    $response['CountOnGoing'] = $result->num_rows;

    $result = $conn->execute_query($query, ['Completed']);
    $response['CountCompleted'] = $result->num_rows;

    // // Count per month
    $query = "WITH Months AS (SELECT 1 AS month_number, 'Jan' AS month_name UNION ALL SELECT 2, 'Feb' UNION ALL SELECT 3, 'Mar' UNION ALL SELECT 4, 'Apr' UNION ALL SELECT 5, 'May' UNION ALL SELECT 6, 'Jun' UNION ALL SELECT 7, 'Jul' UNION ALL SELECT 8, 'Aug' UNION ALL SELECT 9, 'Sep' UNION ALL SELECT 10, 'Oct' UNION ALL SELECT 11, 'Nov' UNION ALL SELECT 12, 'Dec') SELECT m.month_name AS month, COALESCE(COUNT(hd.DateRequested), 0) AS count FROM Months m LEFT JOIN helpdesks hd ON m.month_number = MONTH(hd.DateRequested) AND YEAR(hd.DateRequested) = YEAR(CURDATE()) GROUP BY m.month_name ORDER BY m.month_number";
    $result = $conn->execute_query($query);
    while ($row = $result->fetch_object()) {
        $response['months'][] = $row->month;
        $response['monthscount'][] = $row->count;
    }

    // // Count per division
    $query = "SELECT d.`Division` AS `divisions`, COUNT(*) AS `count` FROM `helpdesks` h LEFT JOIN `divisions` d ON h.`DivisionID` = d.id GROUP BY `divisions` ORDER BY `count` DESC";
    $result = $conn->execute_query($query);
    while ($row = $result->fetch_object()) {
        $response['divisions'][] = $row->divisions;
        $response['divisionscount'][] = $row->count;
    }

    // // Count per category
    $query = "SELECT d.`Category` AS `categories`, COUNT(*) AS `count` FROM `helpdesks` h LEFT JOIN `categories` d ON h.`CategoryID` = d.id GROUP BY `categories` ORDER BY `count` DESC";
    $result = $conn->execute_query($query);
    while ($row = $result->fetch_object()) {
        $response['categories'][] = $row->categories;
        $response['categoriescount'][] = $row->count;
    }

    // // Count per status
    $query = "SELECT Status as `status`, COUNT(*) AS `count` FROM `helpdesks` GROUP BY `status` ORDER BY `count` DESC";
    $result = $conn->execute_query($query);
    while ($row = $result->fetch_object()) {
        $response['status'][] = $row->status;
        $response['statuscount'][] = $row->count;
    }
}

$responseJSON = json_encode($response);

echo $responseJSON;
