<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Reminder for vaccination</title>
    <style media="all" type="text/css">
    
        body {
        font-family: Helvetica, sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 16px;
        line-height: 1.3;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
        }
        
        table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%;
        }
        
        table td {
        font-family: Helvetica, sans-serif;
        font-size: 16px;
        vertical-align: top;
        }
        
        body {
        background-color: #f4f5f6;
        margin: 0;
        padding: 0;
        }
        
        .body {
        background-color: #f4f5f6;
        width: 100%;
        }
        
        .container {
        margin: 0 auto !important;
        padding: 0;
        padding-top: 24px;
        width: 100%;
        margin: auto;
        }
        
    </style>
  </head>
  <body>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
        
      <tr>
        <td>&nbsp;</td>
        <td class="container">
            <h3 class="title">Reminder for covid vaccination</h3>
            <hr>
            <span>Name : {{$user->name}}</span> <br>
            <span>Email : {{$user->email}}</span> <br>
            <span>Phone : {{$user->phone}}</span> <br>
            <span>Hospital : {{$user->vaccin_center['name'] ?? 'No hospital name'}}</span> <br>
            <span>Location : {{$user->vaccin_center->location ?? 'No location'}}</span> <br>
            <span>Date : {{Carbon\Carbon::parse($user->vaccin_date)->format('d M Y')}}</span>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>