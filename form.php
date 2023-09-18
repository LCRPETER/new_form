<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      outline: none;
    }

    body {
      padding: 25px;
      background: lightgoldenrodyellow;
    }

    form {
      width: 60%;
      min-width: 250px;
      max-width: 350px;
      min-height: 80vh;
      background: darkslategray;
      border-radius: 8px;
      margin: 50px auto;
      padding: 20px;
    }

    form div {
      display: grid;
      height: 100px;

    }

    input,
    #gender {
      width: 80%;
      margin: auto;
      height: 35px;
      border: none;
      border-radius: 5px;
      padding: 5px;
      text-align: center;
      font-size: 1rem;
    }

    input::placeholder {
      font-size: 1rem;
    }

    #gender {
      outline: none;
    }

    form input[type="submit"] {
      display: block;
      cursor: pointer;
      width: 20%;
      margin: 0 auto;
      font-size: 1rem;
      background: indianred;
    }

    span {
      color: red;
      text-align: center;
    }
  </style>
</head>

<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST")
    $nameErr = $emailErr = $genderErr = $pwdErr = $cpwdErr = "";
  $name = $email = $gender = $pwd = $cpwd = "";

  if (empty($_POST["name"])) {
    $nameErr = "veuillez remplire le champ";
  } else {
    $name = $_POST["name"];
    if (!preg_match("/^[a-zA-Z-']*$/", $name)) {
      $nameErr = "Le pseudo doit contenir seulement des lettres maj et min, - et ' ";
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "veuillez remplire le champ";
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "L'addresse mail doit avoir un . et @";
    }
  }
  if (isset($_POST["gender"])) {
    $gender = $_POST["gender"];
  }
  if (empty($_POST["password"])) {
    $pwdErr = "veuillez remplire le champ";
  } else {
    $pwd = $_POST["password"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $pwdErr = "Le mode de passe doit contenir au 8 caractères";
    }
  }
  if (empty($_POST["cpwd"])) {
    $cpwdErr = "veuillez remplire le champ";
  } else {
    $cpwd = $_POST["cpwd"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $cpwdErr = "Les deux mots de passes ne corresponde pas ";
    }
  }
  ?>

  <?php
  function ($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    return $data;
  };
  ?>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div>
      <input type="text" name="name" placeholder="Your pseudo">
      <span><?php echo $nameErr; ?></span>
    </div>

    <div>
      <input type="text" name="email" placeholder="Your email">
      <span><?php echo $emailErr; ?></span>
    </div>

    <div>
      <select name="gender" id="gender">
        <option value="">female</option>
        <option value="">male</option>
      </select>
      <span><?php echo $genderErr; ?></span>
    </div>

    <div>
      <input type="text" name="pwd" placeholder="Your password">
      <span><?php echo $pwdErr; ?></span>
    </div>

    <div>
      <input type="text" name="cpwd" placeholder="Confirm your password">
      <span><?php echo $cpwdErr; ?></span>
    </div>
    <input type="submit" value="validate">
  </form>
  <?php
  echo $_POST["name"] . "<br>";
  echo $_POST["email"] . "<br>";
  echo $_POST["gender"] . "<br>";
  echo $_POST["pwd"] . "<br>";
  echo $_POST["cpwd"] . "<br>";
  ?>
</body>

</html>