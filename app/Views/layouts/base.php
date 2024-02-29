<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?: 'Absensi Karyawan' ?></title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'white': '#FFFFFF',
                        'mygrey': '#E6DBD5',
                        'mygreen': '#00535B',
                        'myorange': '#F84117',
                        'black': '#000000',
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        .btn {
            @apply w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mygreen cursor-pointer;
        }
        .table-default {
            @apply items-center min-w-full bg-transparent border-collapse divide-y;
        }
        .table-default tr {
            @apply px-4 text-gray-800 dark:text-gray-200 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 border-l-0 border-r-0 whitespace-nowrap font-semibold;
        }
        .table-default th {
            @apply p-1 font-bold text-center;
        }
        .table-default td {
            @apply px-6 py-4 whitespace-nowrap;
        }
        .card-container {
            @apply bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5;
        }
        .input-group {
            @apply w-full;
        }
        .label {
            @apply block mb-2 text-sm font-medium text-gray-900 dark:text-white;
        }
        .input {
            @apply bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500;
        }
        .select {
            @apply bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500;
        }
        .textarea {
            @apply block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500;
        }
    </style>
    <?= $this->renderSection('head') ?>
</head>
<body>
    <?= $this->renderSection('content') ?>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
