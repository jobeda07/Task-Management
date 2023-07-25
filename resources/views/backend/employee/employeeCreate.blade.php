<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route('employee.create.post')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Name</label>
        <input type="text" name="name">
        <label for="">Employee Id</label>
        <input type="text" name="employee_id">
        <label for="">Image</label>

        <input type="file" name="image">
        <label for="">email</label>

        <input type="email" name="email">
        <label for="">phone</label>

        <input type="text" name="phone">
        <button type="submit">Submit</button>
    </form>

</body>

</html>