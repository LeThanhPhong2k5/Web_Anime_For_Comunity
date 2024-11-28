<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite([
      'resources/css/CSS_LoginAndRegister/styleRegister.css'
    ])
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous"
      >

    
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    />
    <title>Đăng ký</title>
    <link 
            rel="stylesheet" 
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
            crossorigin="anonymous" 
            referrerpolicy="no-referrer" 
    />
</head>
<body>
<div id="container">
    <div class="register-div">
        <div class="area-logo">
          <div class="logo">
            <a href="{{ route('account.main') }}"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjKeSLQ8sN8zGv2zVND4QiV5N8QgRie8bueWpm8okeFdLCgCFycoUS807_b5q1C3MUltt_cG91QSpgmBaGh_hsC0biOsCO0NFmk7pWnKxDi-ePqvRB_YfpadN404yQVxXC1JfLddfnzC_2GUkWH3xICgxKxXqqPsWM1HtbRqMLQ9CUvPm7VF2QhrlXchA9Q/s775/Logo_VKU.png"></a>
          </div>
        </div>
          <div class="register-form">
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
            <form
              class="register"
              method="POST"
              action="{{ route('account.processRegister') }}"
            >
            @csrf
              <h1>Đăng ký</h1>
                <div class="input-text">
                  <input
                    type="text"
                    name="name"
                    placeholder="Tên người dùng"
                    value="{{ old('name') }}"
                    class="@error('name') is-invalid @enderror"
                  />
                  @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
              </div>
              <div class="input-text">
                  <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    class="@error('email') is-invalid @enderror"
                  >
                  @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
              </div>
              <div class="input-text">
                <input
                  type="password"
                  name="password"
                  placeholder="Mật khẩu"
                  class="@error('password') is-invalid @enderror"
                />
                @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-text">
                <input
                  type="password"
                  name="password_confirmation"
                  placeholder="Nhập lại mật khẩu"
                  class="@error('password_confirmation') is-invalid @enderror"
                >
                @error('password_confirmation')
                        <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
              <div class="register-button">
                <button type="submit">Đăng ký</button>
              </div>                     
          </form>
          
          </div>
  
    </div>
</div>
</body>
</html>