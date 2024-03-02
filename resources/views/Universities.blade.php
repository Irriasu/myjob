<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universities</title>
</head>
<body>
    <a href="{{ url('adduni') }}">Add University</a>

    <!-- Form with hidden input field -->
    <form action="{{ url('admin') }}" method="POST">
        @csrf
        <input type="hidden" name="action" value="DeleteUni"/>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($Uni as $U)
                    <tr>
                        <td>{{ $U->getID() }}</td>
                        <td>{{ $U->getName() }}</td>
                        <td><button type="submit">Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</body>
</html>
