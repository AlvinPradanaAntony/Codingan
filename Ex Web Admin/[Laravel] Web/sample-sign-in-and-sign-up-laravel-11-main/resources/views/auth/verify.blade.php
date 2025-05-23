
@extends('layouts.app')
@section('content')
<style>
    html,
    body {
        padding: 0;
        margin: 0;
    }
</style>

<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
        <tbody>
            <tr>
                <td align="center" valign="center" style="text-align:center; padding: 10px">
                    <a href="https://souysoeng.com" rel="noopener" target="_blank">
                        <img alt="Logo" src="https://blogger.googleusercontent.com/img/a/AVvXsEi22QSrQgGkTlZ_KdmZx9jRwqTe40SpFx41DukLyxBKKK36XsOCHlPj9NA_ecEZ_ju3Olrt_HcLVrnLXn5Kjgx8pFgPeWslLIJhVu0-Yb5ehLElSJGdsNVamMWksTq8M6-M2_JTtx-2ge_CYS9i_sPgX7noLlbjLbQjFfVXUVS4vxyyp6ULiBR1FxXmYzDO=s256" style="min-height:30px;width: 15%;">
                    </a>
                </td>
            </tr>
            <tr>
                <td align="left" valign="center">
                    <div style="text-align:center; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
                        <!--begin:Email content-->
                        <div style="padding-bottom: 30px; font-size: 17px;">
                            <strong>Welcome to Subscribers!</strong>
                        </div>
                        <div style="padding-bottom: 30px">
                            To activate your account, please click on the button below to verify your email address.
                        </div>
                        <div style="padding-bottom: 40px; text-align:center;">
                            <a href="{{ url('reset/password/'.$token) }}" rel="noopener" target="_blank" style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#ffffff;background-color:#3E97FF;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle" target="_blank">
                                Click Change Password Account
                            </a>
                        </div>
                        <div style="padding-bottom: 30px">
                            This password reset link will expire in 60 minutes.
                            If you did not request a password reset, no further action is required.
                        </div>
                        <div style="border-bottom: 1px solid #eeeeee; margin: 15px 0"></div>
                        <div style="padding-bottom: 50px; word-wrap: break-all;">
                            <p style="margin-bottom: 10px;">Button not working? Try pasting this URL into your browser:</p>
                            <a href=" {{ url('/reset-password/'.$token) }}" rel="noopener" target="_blank" style="text-decoration:none;color: #3E97FF">
                                {{ url('/reset-password/'.$token) }}
                            </a>
                        </div>
                        <!--end:Email content-->
                        <div style="padding-bottom: 10px">Kind regards,<br>The StarCode Kh.
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
                    <p> #248, Preah Monivong Blvd. (Street 110),Phnom Phenh</p>
                    <p> Copyright &copy; 
                        <a href="https://www.readfreekh.com/" rel="noopener" target="_blank">StarCode Kh</a>.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
