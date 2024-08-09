<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <form class="container-sm mt-4" action="{{route('auth.resetPassword')}}" method="POST">
        <h4 class="mb-3">Please Enter Your New Password. Reset Password for "{{$email}}"</h1>
        <x-textfield type="text" name="email" :value="$email" label="Enter Email" placeholder="Please enter email" />
        <x-textfield type="password" name="password" label="Password" placeholder="Please enter your new password" />
        <x-textfield type="password" name="password_confirmation" label="Confirm Password" placeholder="Please confirm your new password" />
        <input type="hidden" name="token" value="{{$token}}">
         @csrf 
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</body>
</html>