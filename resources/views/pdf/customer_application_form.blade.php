<div class="page_1" style="background-image: url('/files/Customer-Application-1.jpg');">
    <p style="top: 150px;">
        <span style="margin-left: 500px; font-size: 20px;">{{ Carbon\Carbon::now()->format('d-m-Y')}}</span>
    </p>
    <p style="top: 180px">
        <span style='font-size: 20px;'>{{ ($user->sponsor) ? $user->sponsor->formal_full_name : "" }}</span>
        <span style="left: 460px; font-size: 20px;">{{ ($user->sponsor) ? $user->sponsor->synergy_id : "" }}</span>
    </p>
    <p style="top: 225px">
        <span style='font-size: 16px;'>{{ ($user->sponsor) ? $user->sponsor->mobile : "" }}</span>
        <span style="left: 300px; font-size: 16px;">{{ ($user->sponsor) ? $user->sponsor->email : "" }}</span>
    </p>
    <p style="top: 295px;">
        <span style="margin-left: 0; font-size: 20px;">{{ $user->formal_full_name }}</span>
    </p>

    <p style="top: 345px;">
        <span style="left: 0;">{{ $user->physical_address_1 }} {{ $user->physical_address_2 }}</span>
        <span style="left: 302px;">{{ $user->physical_city }}</span>
        <span style="left: 522px;">{{ $user->physical_state }}</span>
        <span style="left: 590px;">{{ $user->physical_postal_code }}</span>
    </p>

    <p style="top: 385px;">
        <span style="left: 0;">{{ $user->mailing_address_1 }} {{ $user->mailing_address_2 }}</span>
        <span style="left: 302px;">{{ $user->mailing_city }}</span>
        <span style="left: 522px;">{{ $user->mailing_state }}</span>
        <span style="left: 590px;">{{ $user->mailing_postal_code }}</span>
    </p>

    <p style="top: 425px;">
        <span style="left: 0;">{{ $user->mobile }}</span>
        <span style="left: 200px;">{{ $user->email }}</span>
    </p>

    <p style="top: 790px">
        <span style="left: 10px; font-size: 20px; letter-spacing: 7px;">{{ $user->cc_number }}</span>
    </p>

    <p style="top: 520px">
        <span style="left: 60px; font-size: 16px; ">{{ ($user->order && $user->order->product) ? $user->order->product->sku : '' }}</span>
    </p>

    <p style="top: 675px">
        <span style="left: 60px; font-size: 16px; ">SU70796</span>
    </p>

    <p style="top: 790px">
        <span style="left: 340px; font-size: 20px;">{{ ($user->cc_exp_date) ? $user->cc_exp_date->format('m') : null }}</span>
        <span style="left: 380px; font-size: 20px;">{{ ($user->cc_exp_date) ? $user->cc_exp_date->format('y') : null }}</span>
    </p>

    <p style="top: 880px">
        <span style="left: 0; font-size: 20px;">{{ $user->cc_name }}</span>
    </p>

    <p style="top: 910px">
        <img src="{{ $user->signature }}" alt="" height="30" style="margin-left: 40px;">
    </p>
</div>
