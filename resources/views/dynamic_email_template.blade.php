<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
  </head>
  <body>
    <h2>Welcome to the site {{ $stockout ['email'] }}</h2>
    <br/>
    I have some request by {{ $stockout ['user_id'] }}
    <br/>
    <form href="{{ route('stockout.confirm', $stockout['user_id']) }}" method="get" target="_blank">
         <button type="submit">Approve</button>
      </form>

          </body>
</html>