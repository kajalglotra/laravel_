<html>
   <head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   </head>
   <style>
      .jumbotron{
        margin-top:20px;
      }
      h1{
        margin-top:0px;
      }
      .btn{
        margin-top:10px;
      }
   </style>
   <body>
      <div class="container">
        <div class="jumbotron">
         <h1>Create Your own Post</h1>  
          <form action = "/create"> 
          <input type="text" class="form-control" id="usr" name="names">
          <input type="submit" class="btn btn-danger" style="float:right;" value="Save">
          </form>
        </div>
        <hr>
      </div>
    </body>
</html>
