<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <style>
            body {
                width: 650px;
                font-family: work-Sans, sans-serif;
                background-color: #f6f7fb;
                display: block;
            }
            a {
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
            .text-center {
                text-align: center;
            }
        </style>
    </head>
    <body style="margin: 30px auto;">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td>
                        <table style="background-color: #f6f7fb; width: 100%;">
                            <tbody>
                                <tr>
                                    <td>
                                        <table style="width: 650px; margin: 0 auto; margin-bottom: 30px;">
                                            <tbody>
                                                <tr>
                                                    <td><img src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="" /></td>
                                                    <td style="text-align: right; color: #999;"><span>Password Reset Verification</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 30px;">
                                                        <p>Hi There,</p>
                                                        <p>You are receiving this email because we received a new password request for your account</p>
                                                        <a href="<?php echo e(route('forget_pwd.get', $data)); ?>" style="padding: 10px; background-color: #24695c; color: #ffffff; display: inline-block; border-radius: 4px; margin-bottom: 18px;">Reset My Password </a>
                                                        <p>If you did not reset your password, no further action is required</p>
                                                        <p style="margin-bottom: 0;">Good luck! Hope it works.</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="width: 650px; margin: 0 auto; margin-top: 30px;">
                                            <tbody>
                                                <tr style="text-align: center;">
                                                    <td>
                                                            <p style="color: #999; margin-bottom: 0;">Powered By Tekenens Admins</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
<?php /**PATH C:\P\theme\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>