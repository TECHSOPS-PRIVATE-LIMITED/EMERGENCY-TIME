@component('mail::message')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Emergency Time is the platform where you can find solutions for your all medical issues"/>
    <meta name="keywords" content="MEDICAL AI BOT, EMERGENCY TIME"/>
    <meta name="author" content="TECHSOPS PRIVATE LIMITED"/>
    <title>EMERGENCY TIME</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon"/>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet"/>
    <style type="text/css">
      body{
        font-family: 'Nunito Sans', sans-serif;
        background-color: #F9FAFC;
        display: block;
        width: 650px;
        padding: 0 12px;
      }
      a{
        text-decoration: none;
      }
      span {
        font-size: 14px;
      }
      p {
        font-size: 13px;
        line-height: 1.7;
        letter-spacing: 0.7px;
        margin-top: 0;
      }
      .text-center{
        text-align: center
      }
      h6 {
        font-size: 16px;
        margin: 0 0 18px 0;
      }
      @media only screen and (max-width: 767px){
        body{
            width: auto;
            margin: 20px auto;
        }
        .logo-sec{
          width: 500px !important;
        }
      }
      @media only screen and (max-width: 575px){
        .logo-sec{
          width: 400px !important;
        }
      }
      @media only screen and (max-width: 480px){
        .logo-sec{
          width: 300px !important;
        }
      }
      @media only screen and (max-width: 360px){
        .logo-sec{
          width: 250px !important;
        }
      }
    </style>
  </head>
  <body style="margin: 30px auto;">
    <table style="width: 100%">
      <tbody>
        <tr>
          <td>
            <table style="background-color: #F9FAFC; width: 100%">
              <tbody>
                <tr>
                  <td>
                    <table style="margin: 0 auto; margin-bottom: 30px">
                      <tbody>
                        <tr class="logo-sec" style="display: flex; align-items: center; justify-content: space-between; width: 650px;">
                          <td><img class="img-fluid for-light" src="{{ asset('admin/assets/images/other-images/logo-login.png')}}" alt=""></td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table style="margin: 0 auto; background-color: #fff; border-radius: 8px">
              <tbody>
                <tr>
                  <td style="padding: 30px"> 
                    <h6 style="font-weight: 600">Password Reset</h6>
                    <p>You have requested a password reset. Here is your OTP code:</p>
                    <p style="text-align: center" style="padding: 10px; background-color:#b80403; color: #fff; display: inline-block; border-radius:30px; font-weight:700; padding:0.6rem 1.75rem;">{{ $otp }}</style></p>
                    <p>If you did not request this, please ignore this email.</p>
                    <p>Good luck! Hope it works.</p>
                    <p style="margin-bottom: 0">
                      Regards,<br>Emergency Time</p>
                  </td>
                </tr>
              </tbody>
            </table>
            <table style="margin: 0 auto; margin-top: 30px">
              <tbody>       
                <tr style="text-align: center">
                  <td> 
                    <p style="color: #999; margin-bottom: 0">333 Woodland Rd. Baldwinsville, NY 13027</p>
                    <p style="color: #999; margin-bottom: 0">Powered By Emergency Time</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
@endcomponent