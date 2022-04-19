<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

<h1>Customer Data Table</h1>

<table id="customers">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>DOB</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($customerData as $each)
    <tr>
        <td>{{$each->first_name}}</td>
        <td>{{$each->last_name}}</td>
        <td>{{$each->email}}</td>
        <td>{{$each->age}}</td>
        <td>{{$each->dob}}</td>
        <td><a href="/customer/update/{{$each->id}}">Edit</a></td>
        <td><a href="/customer/delete/{{$each->id}}">Delete</a></td>
    </tr>
    @endforeach
</table>

</body>
</html>


