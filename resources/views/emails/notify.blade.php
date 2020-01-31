<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$data['title']}}</title>
    <style type="text/css">
        .checkout-email {
            border-collapse: collapse;
            width: 100%
        }

        .checkout-email td, .checkout-email th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .checkout-email tfoot, .checkout-email thead {
            font-weight: 700;
            font-size: 16px;
            color: #ed060e;
        }

        .checkout-email tfoot span {
            font-weight: normal;
            font-size: 12px;
            color: #222;
        }

    </style>
</head>
<body>

<table style="width: 100%">
    <tr>
        <td colspan="2"
            style="padding:16px 0;text-align:center; border: 1px solid whitesmoke; background-color: whitesmoke;">
            <a href="{{URL('/')}}" style="color: black; text-decoration: none;">
                <h3>Rent a Suit</h3>
            </a>
        </td>
    </tr>

    @if($data['name'])
        <tr>
            <td colspan="2">Dear <strong>{{$data['name']}}:</strong></td>
        </tr>
    @endif

    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
        <td style="vertical-align: top">
            <table>

                <tr>
                    <td>{{$data['title']}}</td>
                </tr>

                @if($data['user_type'] === "bp")
                    <tr>
                        <td>Product #: P{!! $data['product_id']!!}</td>
                    </tr>

                    <tr>
                        <td>Rented #: R{!! $data['rented_id']!!}</td>
                    </tr>
                @endif

                <tr>
                    <td>{!! $data['message']!!}</td>
                </tr>

                @if($data['picture'])

                    <tr>
                        <td>
                            <img style="width: 200px"
                                 src="https://www.rentasuit.ca/{{$data['picture']}}"/>
                        </td>
                    </tr>

                @endif

                @if($data['link'])
                    <tr>
                        <td>
                            Please respond to this request by <a href="{{$data['link']}}">Clicking Here</a>
                        </td>
                    </tr>
                @endif

            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2"><p>Thank you.</p></td>
    </tr>
    <tr>
        <td colspan="2">
            <hr/>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">&copy; {{date('Y')}}, Rent A Suit</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center"><img
                    src="https://www.rentasuit.ca/uploads/others/1496992927__logo.png"></td>
    </tr>

</table>
</body>
