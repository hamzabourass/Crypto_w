<!--h1> Hi {{ $name }} Please confirme your email!</h1>
<p> Activate your Account by copying and pasting the activation code.
<br> Activation code : {{$activation_code}}. <br>

</p>
<p>
  CryptoExchange team.
</p!-->
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="background-color: #000000; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #000000; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We're thrilled to have you here! Get ready to dive into your new account.
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#747474" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#747474" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#000000" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 48px; font-weight: 400; margin: 2;" class="text-light">Welcome {{ $name }}!</h1> <img src="data:image/png;base64,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" width="125" height="120" style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">We're excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#747474"><a href="{{route('app_activation_account_link',['token'=>$activation_token])}}" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #000000; display: inline-block;" >Confirm Account</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">If that doesn't work, copy and paste the following Code: <h2>{{$activation_code}}</h2></p>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">

                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Cheers,<br>CryptoExchange Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help? Contact us on:</h2>
                            <p style="margin: 0;"><h5 href="#" target="_blank" style="color: #FFA73B;">CryptoExchange010@gmail.com</h5></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

</body>

</html>
