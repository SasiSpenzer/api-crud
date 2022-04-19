<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body{
            font-family: Calibri, Helvetica, sans-serif;
            background-color: pink;
        }
        .container {
            padding: 50px;
            background-color: lightblue;
        }

        input[type=text], input[type=password], textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type=text]:focus, input[type=password]:focus {
            background-color: orange;
            outline: none;
        }
        div {
            padding: 10px 0;
        }
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }
        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        .registerbtn:hover {
            opacity: 1;
        }
    </style>
</head>
<body>



{{ Form::open(array('method' => 'post')) }}
    <div class="container">
        <center>  <h1> Customer Update Form</h1> </center>
        <?php if(isset($success)) {
                echo "<p style='color:red'>".$success. "</p>" ;
        } ?>
        <hr>
        <label> Firstname </label>
        <input value="{{$customerData->first_name}}" type="text" name="firstname" placeholder= "Firstname" size="15" required />

        <label> Lastname: </label>
        <input value="{{$customerData->last_name}}" type="text" name="lastname" placeholder="Lastname" size="15"required />

        <label> Date of Birth: </label>
        <input value="{{$customerData->dob}}" type="text" name="dob" placeholder="dob" size="15"required />

        <label> Age: </label>
        <input value="{{$customerData->age}}" type="text" name="age" placeholder="age" size="15"required />


        <label for="email"><b>Email</b></label>
        <input value="{{$customerData->email}}" type="text" placeholder="Enter Email" name="email" required>


        <button type="submit" class="registerbtn">Register</button>
{{ Form::close() }}
</body>
</html>
