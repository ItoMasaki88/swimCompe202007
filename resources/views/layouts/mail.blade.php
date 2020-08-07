<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
  @include('head')
</head>

<body class="my-bg-mail_back">

<header>
  <div class="container-fluid">
    <div class="row justify-content-center py-4">
      <div class="col-auto">
        <h5><strong>SwimCompe</strong></h5>
      </div>
    </div>
  </div>
</header>


<main>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-10 col-md-6 bg-white border-secondary">
        <div class="container py-3">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
</main>


<footer class="container-fluid">
  <div class="row justify-content-center py-4">
    <div class="text-secondary text-center">
      © 2020 SwimCompe. All rights reserved.
    </div>
  </div>
</footer>

</body>

</html>
