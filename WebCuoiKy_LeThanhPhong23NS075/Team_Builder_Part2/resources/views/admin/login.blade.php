<!-- login.html -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite([
      'resources/css/CSS_Admin/styleLoginForAdmin.css'
    ])
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
            crossorigin="anonymous"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    />
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/js/login.js'])
</head>
<body>
<div id="container">
    <div class="login-div">
        <div class="area-logo">
          <div class="logo">
            <a href="{{ route('account.main') }}"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjKeSLQ8sN8zGv2zVND4QiV5N8QgRie8bueWpm8okeFdLCgCFycoUS807_b5q1C3MUltt_cG91QSpgmBaGh_hsC0biOsCO0NFmk7pWnKxDi-ePqvRB_YfpadN404yQVxXC1JfLddfnzC_2GUkWH3xICgxKxXqqPsWM1HtbRqMLQ9CUvPm7VF2QhrlXchA9Q/s775/Logo_VKU.png"></a>
          </div>
        </div>
        @if (Session::has('success'))
              <script>
                  alert("{{ Session::get('success') }}");
              </script>
          @endif
          
          @if (Session::has('error'))
              <script>
                  alert("{{ Session::get('error') }}");
              </script>
          @endif
          <div class="login-form">
              <form
                class="login"
                method="POST"
                action="{{ route('admin.authenticate') }}"
              >
              @csrf
              <h1>Admin</h1>
              {{-- <div id="errormessage"></div> --}}
              <span class="seperator"></span>

              <div class="input-text">
                  <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    class="@error('email') is-invalid @enderror"
                  />
                  @error('email')
                      <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
              </div>
              <div class="input-text">
                  <input
                          type="password"
                          name="password"
                          placeholder="Mật Khẩu"
                          class="@error('password') is-invalid @enderror"
                  /><i
                      class="fa fa-fw fa-eye field-icon toggle-password"
                      id="togglePassword"
                    ></i>
                    @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
              </div>
              <div class="signin-button">
                <input type="submit" value="Đăng Nhập" />
              </div>
              <div class="return">
                <a href="{{ route('account.login') }}" class="return-account">Quay về trang đăng nhập</a>
              </div>
          </form>
          </div>
    </div>
</div>
</body>
</html>