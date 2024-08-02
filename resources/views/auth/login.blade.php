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
    <form class="container-sm mt-4" action="{{route('auth.login')}}" method="POST">
        <h4 class="mb-3">Welcome back. Please login</h1>
        <x-textfield type="email" name="email" label="Email Address" placeholder="Please enter your email" />
        <x-textfield type="password" name="password" label="Password" placeholder="Please enter your password" />
         @csrf 
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</body>
</html>