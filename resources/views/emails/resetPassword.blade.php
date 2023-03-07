<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#f6f8fa">
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%"
                    style="
              max-width: 600px;
              margin: auto;
              border-collapse: collapse;
              background-color: #fff;
            ">
                    <tr>
                        <td
                            style="
                  display:none;
                  padding: 20px;
                  text-align: center;
                  background-color: #3b5998;
                ">
                            <a href="#"
                                style="
                    color: #fff;
                    font-size: 24px;
                    font-weight: bold;
                    text-decoration: none;
                  ">Mutammad</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px;">
                            <h1 style="font-size: 28px; margin-top: 0;">
                                Request Reset Password
                            </h1>
                            <p style="font-size: 16px; line-height: 1.5;">
                                Hi, {{ $name }}You recently requested to reset your password
                                for your account. Use the button below to reset it. This
                                password reset is only valid for the next 24 hours.
                            </p>
                            <p style="text-align: center;">
                                <a href="{{ $resetLink }}"
                                    style="
                      background-color: #3b5998;
                      color: #fff;
                      display: inline-block;
                      padding: 10px 20px;
                      text-decoration: none;
                      font-size: 16px;
                      line-height: 1.5;
                      text-align: center;
                    ">Verify
                                    Email Address</a>
                            </p>
                            <p style="font-size: 16px; line-height: 1.5;">
                                For security, this request was received. If you did not
                                request a password reset, please ignore this email or contact
                                support if you have questions.
                            </p>
                            <p style="font-size: 16px; line-height: 1.5;">Best regards,</p>
                            <p style="font-size: 16px; line-height: 1.5;">
                                The Mutammad Team
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="
                  padding: 20px;
                  background-color: #f6f8fa;
                  text-align: center;
                ">
                            <p style="color: #999; font-size: 14px; line-height: 1.5;">
                                You are receiving this email because you signed up for
                                Mutammad. If you didn't sign up, you can safely ignore this
                                email.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
