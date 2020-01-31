<table style="width: 100%">

    <tr>
        <td colspan="3" style="padding:16px 0;text-align:center; border: 1px solid whitesmoke; background-color: whitesmoke;">
            <a href="{{URL('/')}}" style="color: black; text-decoration: none;">
                <h3>Rent a Suit</h3>
            </a>
        </td>
    </tr>

    <tr>
        <td style="width: 32%"></td>
        <td>
            <b><h2>{{$data['title']}}</h2></b>
        </td>
        <td style="width: 41%;"></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a style="font-size: 16px; color: #b0a6a6;">{!! $data['message']!!}</a>
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td style="text-align: right">
            <br>
            <a href="{{$data['url']}}" style="text-decoration: none; font-size: 16px; color: #b0a6a6;">
                <button style="color: white; padding: 10px 15px; background-color: #bf5329; border: 1px solid #bf5329; border-radius: 3px;">{{$data['button']}}</button>
            </a>
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <br>
            <span style="font-size: 16px; color: #b0a6a6;">Regards,</span><br>
            <span style="font-size: 16px; color: #b0a6a6;">{{$data['name']}}</span>
            <hr>
        </td>
        <td></td>
    </tr>
    <tr>
        <td>
        </td>
    </tr>
    <tr>

        <td colspan="3" style="padding:16px 0;text-align:center; border: 1px solid whitesmoke; background-color: whitesmoke;">
            <a style="color: black; text-decoration: none;">
                <span>&copy; {{date('Y')}}, {{$data['name']}}. All rights reserved.</span><br>
                <img src="http://www.rentasuit.ca/uploads/others/1496992927__logo.png">
            </a>
        </td>
        <td>
        </td>
    </tr>

</table>