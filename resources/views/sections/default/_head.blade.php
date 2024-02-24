<meta charset="utf-8">
<!-- Primary Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="title" content="{{ config('app.name') }}">
<meta name="author" content="Ehsan Ahmed Farooqi">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="shortcut icon" href="{{ asset('assets/img/icons/prophet.png') }}" />

<title>{{ config('app.name', 'BMS') }} - {{ $headTitle ?? '' }}</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- livewire -->
<livewire:styles />

<script type="text/javascript">let site_url = '<?php echo url('/'); ?>'</script>
<script type="text/javascript">let asset_url = '<?php echo asset('/'); ?>'</script>

@yield('styles')
