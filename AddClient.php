<?php
require_once "connection.php";
$id_client = $client_name = $contact_surname = $contact_name = $telephone = $address1 = $address2 = $city = $state = $postal_code = $country = $employee_number = $credit_limit = "";
$id_client_err = $client_name_err = $contact_surname_err = $contact_name_err = $telephone_err = $address1_err = $address2_err = $city_err = $state_err = $postal_code_err = $country_err = $employee_number_err = $credit_limit_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_id_client = trim($_POST["id_client"]);
    if (empty($input_id_client) || $input_id_client == NULL) {
        $id_client_err = "Пожалуйста, введите идентификатор клиента";
    } else{
        $id_client = $input_id_client;
    }
    $input_client_name = trim($_POST["client_name"]);
    if (empty($input_client_name)) {
        $client_name_err = "Пожалуйста, введите имя клиента";
    } else{
        $client_name = $input_client_name;
    }
    $input_contact_surname = trim($_POST["contact_surname"]);
    if (empty($input_contact_surname)) {
        $contact_surname_err = "Пожалуйста, введите контактную фамилию";
    } else{
        $contact_surname = $input_contact_surname;
    }
    $input_contact_name = trim($_POST["contact_name"]);
    if (empty($input_contact_name)) {
        $contact_name_err = "Пожалуйста, введите контактное имя";
    } else{
        $contact_name = $input_contact_name;
    }
    $input_telephone = trim($_POST["telephone"]);
    if (empty($input_telephone)) {
        $telephone_err = "Пожалуйста, введите телефон";
    } else{
        $telephone = $input_telephone;
    }
    $input_address1 = trim($_POST["address1"]);
    if (empty($input_address1)) {
        $address1_err = "Пожалуйста, введите адрес";
    } else{
        $address1 = $input_address1;
    }
    $input_address2 = trim($_POST["address2"]);
    if (empty($input_address2)) {
        $address2_err = "Пожалуйста, введите адрес";
    } else{
        $address2 = $input_address2;
    }
    $input_city = trim($_POST["city"]);
    if (empty($input_city)) {
        $city_err = "Пожалуйста, введите город";
    } else{
        $city = $input_city;
    }
    $input_state = trim($_POST["state"]);
    if (empty($input_state)) {
        $state_err = "Пожалуйста, введите государство";
    } else{
        $state = $input_state;
    }
    $input_postal_code = trim($_POST["postal_code"]);
    if (empty($input_postal_code)) {
        $postal_code_err = "Пожалуйста, введите почтовый код";
    } else{
        $postal_code = $input_postal_code;
    }
    $input_country = trim($_POST["country"]);
    if (empty($input_country)) {
        $country_err = "Пожалуйста, введите страну";
    } else{
        $country = $input_country;
    }
    $input_employee_number = trim($_POST["employee_number"]);
    if (empty($input_employee_number)) {
        $employee_number_err = "Пожалуйста, введите номер работник";
    } else{
        $employee_number = $input_employee_number;
    }
    $input_credit_limit = trim($_POST["credit_limit"]);
    if (empty($input_credit_limit)) {
        $credit_limit_err = "Пожалуйста, введите кредитный лимит";
    } else{
        $credit_limit = $input_credit_limit;
    }
    if(empty($id_client_err) && empty($client_name_err) && empty($contact_surname_err) && empty($contact_name_er)&& empty($telephone_err)&& empty($address1_err)&& empty($address2_err)&& empty($city_err)&& empty($state_err)&& empty($postal_code_err)&& empty($country_err)&& empty($employee_number_err)&& empty($credit_limit_err)){
        $sql = "INSERT INTO клиенты (номер_клиент, имя_клиента, контакная_фамилия, контакная_иия, телефон, адресс1, адресс2, город, государство, почтовый_код, страна,  номер_работник, кредитный_лимит) 
        VALUES ('$id_client', '$client_name', '$contact_surname', '$contact_name', '$telephone', '$address1', '$address2', '$city', '$state', '$postal_code', '$country', '$employee_number', '$credit_limit')";
        if (mysqli_query($mysqli, $sql)) {
            header("location: index.php");
            exit();
        } else {
            header("location: error.php");
            exit();
        }
        mysqli_close($mysqli);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Добавить новый клиент</h2>
                <p>Пожалуйста, заполните эту форму и отправьте, чтобы добавить запись о клиенте в базу данных.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Номер клиент</label>
                        <input type="text" name="id_client" class="form-control <?php echo (!empty($id_client_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $id_client; ?>">
                        <span class="invalid-feedback"><?php echo $id_client_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Имя клиента</label>
                        <input type="text" name="client_name" class="form-control <?php echo (!empty($client_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $client_name; ?>">
                        <span class="invalid-feedback"><?php echo $client_name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Контакная фамилия</label>
                        <input type="text" name="contact_surname" class="form-control <?php echo (!empty($contact_surname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contact_surname; ?>">
                        <span class="invalid-feedback"><?php echo $contact_surname_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Контакная имя</label>
                        <input type="text" name="contact_name" class="form-control <?php echo (!empty($contact_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contact_name; ?>">
                        <span class="invalid-feedback"><?php echo $contact_name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Телефон</label>
                        <input type="text" name="telephone" class="form-control <?php echo (!empty($telephone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telephone; ?>">
                        <span class="invalid-feedback"><?php echo $telephone_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Адресс 1</label>
                        <textarea type="text" name="address1" class="form-control <?php echo (!empty($address1_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address1; ?>"></textarea>
                        <span class="invalid-feedback"><?php echo $address1_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Адресс 2</label>
                        <textarea type="text" name="address2" class="form-control <?php echo (!empty($address2_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address2; ?>"></textarea>
                        <span class="invalid-feedback"><?php echo $address2_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Город</label>
                        <input type="text" name="city" class="form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $city; ?>">
                        <span class="invalid-feedback"><?php echo $city_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Государство</label>
                        <input type="text" name="state" class="form-control <?php echo (!empty($state_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $state; ?>">
                        <span class="invalid-feedback"><?php echo $state_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Почтовый код</label>
                        <input type="text" name="postal_code" class="form-control <?php echo (!empty($postal_code_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $postal_code; ?>">
                        <span class="invalid-feedback"><?php echo $postal_code_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Страна</label>
                        <input type="text" name="country" class="form-control <?php echo (!empty($country_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $country; ?>">
                        <span class="invalid-feedback"><?php echo $country_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Номер работник</label>
                        <input name="employee_number" class="form-control <?php echo (!empty($employee_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $employee_number; ?>">
                        <span class="invalid-feedback"><?php echo $employee_number_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Кредитный лимит</label>
                        <input type="text" name="credit_limit" class="form-control <?php echo (!empty($credit_limit_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $credit_limit; ?>">
                        <span class="invalid-feedback"><?php echo $credit_limit_err;?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>