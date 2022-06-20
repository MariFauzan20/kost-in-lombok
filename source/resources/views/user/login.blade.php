<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Kost in Lombok</title>

     <!-- Page Logo -->
     <link rel = "icon" href = "/images/logo.svg" type = "image/x-icon">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Local CSS -->
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/auth.css">

</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="box rounded-3">
        <div class="brand d-flex justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 27 27" fill="none">
                <path d="M21.375 21.375V11.0239L13.5 4.81163L5.625 11.0239V21.375H21.375ZM23.625 22.5C23.625 22.7984 23.5065 23.0845 23.2955 23.2955C23.0845 23.5065 22.7984 23.625 22.5 23.625H4.5C4.20163 23.625 3.91548 23.5065 3.7045 23.2955C3.49353 23.0845 3.375 22.7984 3.375 22.5V10.4783C3.37493 10.3083 3.41336 10.1406 3.4874 9.98763C3.56144 9.83468 3.66917 9.70049 3.8025 9.59513L12.8025 2.49525C13.0011 2.3383 13.2469 2.25293 13.5 2.25293C13.7531 2.25293 13.9989 2.3383 14.1975 2.49525L23.1975 9.594C23.331 9.69948 23.4388 9.83385 23.5128 9.98701C23.5869 10.1402 23.6252 10.3081 23.625 10.4783V22.5ZM7.875 13.5H10.125C10.125 14.3951 10.4806 15.2536 11.1135 15.8865C11.7464 16.5194 12.6049 16.875 13.5 16.875C14.3951 16.875 15.2536 16.5194 15.8865 15.8865C16.5194 15.2536 16.875 14.3951 16.875 13.5H19.125C19.125 14.9918 18.5324 16.4226 17.4775 17.4775C16.4226 18.5324 14.9918 19.125 13.5 19.125C12.0082 19.125 10.5774 18.5324 9.52252 17.4775C8.46763 16.4226 7.875 14.9918 7.875 13.5Z" fill="#4EBF4D"/>
            </svg>
            <h3 class="f-18 f-semi-bold align-self-center mt-1 ms-1">Kost in Lombok.</h3>
        </div>
        <div class="form-in mt-3">
            <div class="title text-center">
                <h3 class="f-18 f-medium f-grey">Login</h3>
            </div>
            @if(session()->has('success_registrasi'))
            <div class="alert alert-success text-center mt-3" role="alert">
                {{ session('success_registrasi')}}
            </div>
            @endif

            @if(session()->has('invalid'))
            <div class="alert alert-danger text-center mt-3" role="alert">
                {{ session('invalid')}}
            </div>
            @endif
            <form action="/login" method="POST" class="mt-4">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukkan username anda" value="{{ old('username') }}">
                    <div class="invalid-feedback"> @error('username') {{ $message }} @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password anda" value="{{ old('password') }}">
                    <div class="invalid-feedback"> @error('password') {{ $message }} @enderror</div>
                </div>
                <div class="action mt-4">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    <p class="mt-2 text-center">Belum punya akun ? <a href="/register" class="f-green">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>