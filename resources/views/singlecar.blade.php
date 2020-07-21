<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
</head>

<body>
    <form action="/review/add" enctype="multipart/form-data" method="POST">
        {{@csrf_field()}}
        <label for="Review">Review</label>
        @foreach($cars as $car)
        <br>
        <input type="hidden" name="car_id" value="{{$car}}">
        @endforeach
        <input type="text" name="review" id="review">
        <input type="submit" value="Submit">
    </form>

</body>

</html>