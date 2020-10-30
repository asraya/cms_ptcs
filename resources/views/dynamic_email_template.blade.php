<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
  </head>
  <body>
    <br/>
    
    <br/>
    <form href="{{ route('stockout.confirm', $stockout['emp_id']) }}" method="get" target="_blank">
         <button type="submit">Approve</button>
      </form>

          </body>
</html>