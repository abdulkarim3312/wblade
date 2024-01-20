<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="icon" type="image/png" href="images/logo.png">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
  <style>
    .btn-google:hover{
      color: #ffffff !important;
    }
    .rounded-pill{
      border-color: var(--secondary-bg);
    }
    .form-control:focus{
      box-shadow: none;
    }
    .agreement_text{
      margin-top: 4px;
      font-size: 15px;
      margin-bottom: 0;
    }
    .error_message p{
      margin-bottom: 0;
      padding-left: 1.5em;
      font-size: 15px;
      color: red;
    }
    .success_message p{
      margin-bottom: 0;
      padding-left: 1.5em;
      font-size: 15px;
      color: green;
    }
    .error_message small{
      margin-bottom: 0;
      font-size: 15px;
      color: red;
    }
  </style>
  @yield('styles')
</head>

<body>
  @yield('auth-content')
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>