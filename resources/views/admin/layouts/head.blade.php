<head>
    <meta charset="utf-8" />
    <title>სამართავი პანელი</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/favicon/faviconagro.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- App css -->
    <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/admin.css')}}" rel="stylesheet" type="text/css" />

  <!-- CSS Files -->
  <link href="{{asset('admin/back/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/back/css/now-ui-dashboard.css?v=1.5.0')}}" rel="stylesheet" />
 



    <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet" type="text/css" />

    @stack('styles')
</head>
