    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IMS</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">
    </head>
    <body>
        <section class="h-100 gradient-form" style="background-color: #eee;">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-xl-10">
                <div class="card rounded-3 text-black"> 
                  <div class="row g-0">
                    <div class="col-lg-6">
                      <div class="card-body p-md-5 mx-md-4">

                        <div class="text-center">
                          <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                          style="width: 185px;" alt="logo"> -->
                          <!-- <h4 class="mt-1 mb-5 pb-1">Major Project </h4> -->
                      </div>

                      <form action="" method="POST" class="text-center pt-1 mb-5 pb-1">
                         @csrf 
                         <p>Please login to your account</p>

                         
                         <div class="form-group ">
                             
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="username" class="inp" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <input type="password" id="password" name="password" placeholder="password" class="inp" required>
                        </div>

                        <div class="text-center pt-1 mb-5 pb-1">
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                            in</button>
                        </div>

                    </form>

                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Invoice Management System</h4>
                <p class="small mb-0">An Invoice Management System is a digital solution designed to streamline the process of creating, sending, tracking, and managing invoices for businesses. It automates the billing process, reducing manual errors and improving efficiency.</p>
          </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
</section>

</body>
</html>
