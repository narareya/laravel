<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900">

    <x-admin.navbar />

    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        <x-admin.sidebar />

        <div id="main-content" 
             class="relative w-full h-full overflow-y-auto bg-gray-50 dark:bg-gray-900 lg:ml-64">
            <main class="p-4">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>
