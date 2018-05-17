<html>
<head>
    <title>docs</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>
<center> <h1>The request must be   "http://recyclbekia.com/public" + URL from table </h1></center>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">URL</th>
        <th scope="col">Request</th>
        <th scope="col">GET / POST</th>
        <th scope="col">Response</th>
        <th scope="col">Type</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>/signup</td>
        <td>
            'FirstName' => noWhitespace, notEmpty,alpha <br>
            'LastName'  => noWhitespace, notEmpty, alpha,<br>
            'Email'     => noWhitespace, notEmpty, Email,<br>
            'Phone'     => noWhitespace, notEmpty, phone,<br>
            'Password'  => noWhitespace, notEmpty,<br>
            'Image'     => noWhitespace, notEmpty,<br>
            'district'  => noWhitespace, notEmpty, alnum

        </td>
        <td>POST</td>
        <td>
            'success' => 200<br>
            'failed'  => 400 , 422
        </td>
        <td>
            'user'
        </td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>/signin</td>
        <td>
            'Email'     => noWhitespace, notEmpty, Email<br>
            'Password'  => noWhitespace, notEmpty,
        </td>
        <td>POST</td>
        <td>//</td>
        <td>user</td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td>/signout</td>
        <td>none</td>
        <td>POST</td>
        <td>//</td>
        <td>user</td>
    </tr>
    <tr>
        <th scope="row">4</th>
        <td>/request/make</td>
        <td>
            'Request_ID' => noWhitespace, notEmpty, intVal<br>
            'Company_ID' => noWhitespace, notEmpty, intVal
        </td>
        <td>POST</td>
        <td>//</td>
        <td>user</td>
    </tr>
    <tr>
        <th scope="row">5</th>
        <td>/search</td>
        <td>
            'LocationTarget'  => noWhitespace, notEmpty, alnum
        </td>
        <td>POST</td>
        <td>//</td>
        <td>user</td>
    </tr>
    <tr>
        <th scope="row">6</th>
        <td>/company/signup</td>
        <td>
            'Name'      => noWhitespace, notEmpty, alpha,<br>
            'Bio'       => noWhitespace, notEmpty, alpha <br>
            'Email'     => noWhitespace, notEmpty, Email<br>
            'Phone'     => noWhitespace, notEmpty, phone<br>
            'Password'  => noWhitespace, notEmpty<br>
            'Image'     => noWhitespace, notEmpty<br>
            'district'  => noWhitespace, notEmpty, alnum<br>
            'LocationTarget' => noWhitespace, notEmpty, alnum<br>
        </td>
        <td>POST</td>
        <td>//</td>
        <td>company</td>
    </tr>
    <tr>
        <th scope="row">7</th>
        <td>/signin</td>
        <td>
            'Email'     => noWhitespace, notEmpty, Email<br>
            'Password'  => noWhitespace, notEmpty,
        </td>
        <td>POST</td>

        <td>//</td>
        <td>company</td>
    </tr>
    <tr>
        <th scope="row">8</th>
        <td>/signout</td>
        <td>none</td>
        <td>POST</td>

        <td>//</td>
        <td>company</td>
    </tr>
    <tr>
        <th scope="row">9</th>
        <td>/company/requests/action</td>
        <td>
            'id'     => noWhitespace, notEmpty, intVal <br>
            'Status'     => noWhitespace, boolVal
        </td>
        <td>POST</td>
        <td>//</td>
        <td>company</td>
    </tr>
    <tr>
        <th scope="row">10</th>
        <td>/request</td>
        <td>none</td>
        <td>GET</td>
        <td>//</td>
        <td>All Request</td>
    </tr>
    <tr>
        <th scope="row">11</th>
        <td>/request</td>
        <td>
            'Name'      => noWhitespace, notEmpty, alpha <br>
            'quantity'  => noWhitespace, notEmpty, intVal<br>
            'SuggetedPrice'  => noWhitespace<br>
            'User_ID'  => noWhitespace, notEmpty, intVal<br>
            'Material_ID'  => noWhitespace, notEmpty, intVal<br>
            'Image'     => noWhitespace, notEmpty<br>
        </td>
        <td>POST</td>
        <td>//</td>
        <td>User</td>
    </tr>
  <tr>
        <th scope="row">12</th>
        <td>/material</td>
        <td>none</td>
        <td>GET</td>
        <td>//</td>
        <td>All materials</td>
    </tr>
    <tr>
        <th scope="row">11</th>
        <td>/material</td>
        <td>
            'Name'        => noWhitespace, notEmpty, alpha,<br>
            'Type'        => noWhitespace, notEmpty, alpha,<br>
            'measurement' => noWhitespace, notEmpty, alpha<br>
        </td>
        <td>POST</td>
        <td>//</td>
        <td>User</td>
    </tr>

    </tbody>
</table>
</body>
</html>
