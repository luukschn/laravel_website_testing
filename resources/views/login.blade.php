@extends('layouts.app')

@section('title', 'Login')

@section('content')
   <div>
      <form action = "/user/login" method = "post" class="login_form">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      
         <table>
            <tr>
               <td>Username</td>
               <td><input type = "text" name = "username" /></td>
            </tr>
            <tr>
               <td>Password</td>
               <td><input type = "password" name = "password" /></td>
            </tr>
            <tr>
               <td colspan = "2" align = "center">
                  <input type = "submit" value = "Login" />
               </td>
            </tr>
         </table>
      </form>

      @If($errors->any())
         <br>
         <h4>{{ $errors->first()}}</h4>
         <br>
      @endif

      <a href="{{ url('/registration') }}">No account yet? Register here</a>
   </div>
@endsection
