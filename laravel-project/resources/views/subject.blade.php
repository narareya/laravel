<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
        </tr>

        @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject['id'] }}</td>
                <td>{{ $subject['name'] }}</td>
                <td>{{ $subject['description'] }}</td>
            </tr>
        @endforeach
    </table>
</x-layout>