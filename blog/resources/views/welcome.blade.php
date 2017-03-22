@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h1><u>All Of Your Tasks</u></h1></center>
                     <a href="/create_post">
                         <button type="button" class="btn btn-primary" style="float:right; margin-top:0px;">Create</button><br><br>
                      </a>
                </div>
                <div class="panel-body">
                <table class="table">
                  <tr>
                     <th>Tasks</th>
                     <th>Id</th>
                     <th></th>
                     <th></th>
                    </tr>
                    <tbody id="content">
                      <?php
                     foreach ($tasks as $task) {
                      echo"<tr><td>$task->task</td><td>$task->id</td><td><a href='/edit/$task->id'><button style='float:right;' class='btn btn-primary'>Edit</button></a></td><td><a href='/delete/$task->id'><input type='button' style='float:right;' class='btn btn-danger' value='Delete'></a></td></tr>";
                    }
         
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
            {{ $tasks->links() }}  
            @if (!$Infos->isEmpty())
             <div class="jumbotron">
                <h1>Your Details</h1> 
                <table class="table">
                   <tr>
                   <th>Name</th>
                   <th>Address</th>
                   <th>Phone No.</th>
                   </tr>
                   <?php
                    foreach ($Infos as $Info)
                   echo"<tr><td>$Info->name</td><td>$Info->address</td><td>$Info->fon</td></tr>";
                   ?>
                </table>
            
            @else
           <div class="jumbotron">
             <h1>Enter Details</h1> 
             @if (count($errors) > 0)
                 <div class="alert alert-danger">
                 <ul>
                    @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
                </ul>
               </div>
               @endif
             <form action='/details' method='post'>
              <input type = "hidden"  name = "_token" value = "<?php echo csrf_token() ?>">
                 <div class="form-group">
                     <label for="name">Name:</label>
                     <input type="text" name="name" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                      <label for="address">Address:</label>
                      <input type="text" name="address" class="form-control" id="pwd">
                  </div>
                  <div class="form-group">
                       <label for="phone">Phone:</label>
                      <input type="text" name="fon" class="form-control" id="pwd">
                   </div><br>
                   <button type="submit" class="btn btn-primary">Submit</button>
               </form>
          </div>
          @endif
       </div>
    </div>
</div>
@endsection
