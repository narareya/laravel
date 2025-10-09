<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Subject Name</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>

        @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher['id'] }}</td>
                <td>{{ $teacher['name'] }}</td>
                <td>{{ $teacher->subject->name}}</td>
                <td>{{ $teacher['phone'] }}</td>
                <td>{{ $teacher['address'] }}</td>
            </tr>
        @endforeach
    </table>
</x-layout>