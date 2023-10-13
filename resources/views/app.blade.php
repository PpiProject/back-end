<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel 9 Vite with Install Vue 3 - Techsolutionstuff</title>

    @vite('resources/css/app.css')
</head>
<body style="margin: 0 auto">

@if (Auth::check())
    @php
        $user_auth_data = [
            'isLoggedin' => true,
            'user' =>  Auth::user()
        ];
    @endphp
@else
    @php
        $user_auth_data = [
            'isLoggedin' => false
        ];
    @endphp
@endif
<script>
    window.Laravel = JSON.parse(atob('{{ base64_encode(json_encode($user_auth_data)) }}'));
</script>

<div id="app"></div>

@vite('resources/js/app.js')
</body>
</html>
