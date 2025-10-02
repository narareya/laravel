<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Grade</th>
            <th>Email</th>
            <th>Address</th>
        </tr>

        @foreach ($students as $student)
            <tr>
                <td>{{ $student['id'] }}</td>
                <td>{{ $student['name'] }}</td>
                <td>{{ $student['birthday'] }}</td>
                <td>{{ $student['gender'] }}</td>
                <td>{{ $student['grade'] }}</td>
                <td>{{ $student['email'] }}</td>
                <td>{{ $student['address'] }}</td>
            </tr>
        @endforeach
    </table>
</x-layout>