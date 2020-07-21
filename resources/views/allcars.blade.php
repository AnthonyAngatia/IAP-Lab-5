<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Add new Car</h2>
    @if (Session::has('form_status'))
    <li style="color:greenyellow">
        {{ session('form_status') }}
    </li>
    @endif
    @if(count($errors))
    @foreach($errors->all() as $error)
    <li style="color: red;">{{ $error }}</li>
    @endforeach
    @endif
    <form method="post" action="/car" enctype="multipart/form-data">
        {{csrf_field()}}
        <label for="make">Car Make</label>
        <br>
        <input type="text" name="make" id="make" value="{{ old('make')}}">
        <br>
        <label for="model">Car Model</label>
        <br>
        <input type="text" name="model" id="model" value="{{ old('model')}}">
        <br>
        <label for="produced">Produced on</label>
        <br>
        <input type="text" name="produced_on" id="produced_on">
        <br>
        <label for="image">Image</label>
        <br>
        <input type="file" name="image" id="image">
        <br>
        <input type="submit" name="submit_btn" value="Save">
        <br>
    </form>
    <div style="text-align: center;">
        <table>
            <tr>
                <td>Car ID</td>
                <td>Make</td>
                <td>Model</td>
                <td>Image</td>

            </tr>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->make }}</td>
                <td>{{ $car->model }}</td>
                <td><img src="{{Storage::url('$car->image') }}" alt="Car Image" style="height: 50px;"></td>
                <td><a href="/car/{{$car->id}}"> Add review</a></td>
                @if($car->review != null)
                <td>
                    {{$car->review}}
                </td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>

</body>

</html>