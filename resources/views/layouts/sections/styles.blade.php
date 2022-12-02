<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/boxicons.css')) }}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/core.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/theme-default.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/css/demo.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/css/custom.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/css/select2.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/css/daterangepicker.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/css/mdtimepicker.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/css/pikaday.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/css/datatables.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/css/iziToast.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/css/sweetalert2.css')) }}" />



<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')) }}" />

<!-- Vendor Styles -->
@yield('vendor-style')


<!-- Page Styles -->
@yield('page-style')
