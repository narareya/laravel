<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Job</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
        </tr>

        @foreach ($guardians as $guardian)
            <tr>
                <td>{{ $guardian['id'] }}</td>
                <td>{{ $guardian['name'] }}</td>
                <td>{{ $guardian['gender'] }}</td>
                <td>{{ $guardian['job'] }}</td>
                <td>{{ $guardian['phone'] }}</td>
                <td>{{ $guardian['email'] }}</td>
                <td>{{ $guardian['address'] }}</td>
            </tr>
        @endforeach
    </table>
</x-layout>