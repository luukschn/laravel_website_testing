@extends('layouts.app')

@section('title', 'Registration')

@section('content')
   <div>
      <form action = "/user/register" method = "post" class="registration_form">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      
         <table>
            <tr>
               <td>E-mail</td>
               <td><input type = "text" name = "email" /></td>
            </tr>
            <tr>
               <td>Username</td>
               <td><input type = "text" name = "username" /></td>
            </tr>
            <tr>
               <td>Password</td>
               <td><input type = "text" name = "password" /></td>
            </tr>
            <tr>
               <td colspan = "2" align = "center">
                  <input type = "submit" value = "Register" />
               </td>
            </tr>
         </table>
      </form>
   </div>
@endsection
