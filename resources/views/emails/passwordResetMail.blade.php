<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Villa Oemah Biru Bali</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 40px 0px 40px 0px; background-color: #e2e2e2;">
    <table align="center" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
        <tr>
            <td align="center" bgcolor="#e6ecf0" style="padding: 0px 0 0px 0; color: #ffffff;">
                <img src="https://i.ibb.co/X8bTyDt/Villa-Oemah-Biru-Bali-Email-Logo.png" alt="Chipo Logo" width="600"
                    height="180" style="display: block" />
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px 30px 20px 30px">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td>
                            <h2>Hai, {{ $details['name'] }}!</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0 10px 0">
                            Kami mendapat pesan bahwa Anda lupa kata sandi. Jika ini Anda, Anda bisa mereset kata sandi
                            Anda sekarang.
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 20px 0 20px 0">
                            <a href="http://localhost:8000/reset-password/{{ $details['token'] }}" style="
                    color: #ffffff;
                    font-weight: 600;
                    font-size: 0.875rem;
                    line-height: 1.25rem;
                    padding-bottom: 0.5rem;
                    padding-top: 0.5rem;
                    padding-left: 1.25rem;
                    padding-right: 1.25rem;
                    background-color: #0071bc;
                    border-radius: 0.5rem;
                    text-decoration: inherit;
                  ">Reset kata sandi</a>
                        </td>
                    </tr>
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
</body>

</html>
