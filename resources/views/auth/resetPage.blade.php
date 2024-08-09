<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Request Reset Password</title>
</head>
<body>

   <x-alert-box />

    <form class="container-sm mt-4" action="{{route('auth.requestForgotPasswordLink')}}" method="POST">
        <h4 class="mb-3">Sorry you forgot your password. We will help you reset it.</h1>
        <x-textfield type="email" name="email" label="Email Address" placeholder="Please enter your email" />
         @csrf 
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('auth.login')}}" class="btn btn-success">Goto Login Page</a>
      </form>
</body>
</html>