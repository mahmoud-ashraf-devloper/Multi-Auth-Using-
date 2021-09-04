<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Home</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                <h4>Sellr Data</h4>
                <table class="table table-striped table-inversre ">
                    <thead class=" thead-inverse">
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Logout</td>
                        </tr>
                    </thead>
                    <tr>
                        <td>{{ Auth::guard('seller')->user()->name }}</td>
                        <td>{{ Auth::guard('seller')->user()->email }}</td>

                        <td>
                            <button class="btn btn-block btn-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                type="submit">Logout</button>
                            <form class="d-none" id="logout-form" action="{{ route('seller.logout') }}" method="POST">
                                @csrf</form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
