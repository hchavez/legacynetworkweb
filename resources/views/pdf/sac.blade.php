<div class="page_1">
    <p style="top: 148px;">
        {{ $user->formal_full_name }}
        <span style="margin-left: 390px;">{{ $user->tin_ssn or "N/A"}}</span>
    </p>
    <p style="top: 170px;">
        <span style="left: 180px;">{{ $user->mobile or "N/A" }}</span>
        <span style="left: 325px;">{{ $user->email or "N/A" }}</span>
        <span style="left: 545px;">{{ ($user->date_of_birth) ? $user->date_of_birth->format('Y-m-d') : "N/A" }}</span>
    </p>
    <p style="top: 205px;">
        <span style="left: 0;">{{ $user->physical_address_1 }} {{ $user->physical_address_2 }}</span>
        <span style="left: 302px;">{{ $user->physical_city }}</span>
        <span style="left: 522px;">{{ $user->physical_state }}</span>
        <span style="left: 590px;">{{ $user->physical_postal_code }}</span>
    </p>
    <p style="top: 238px;">
        <span style="left: 0;">{{ $user->mailing_address_1 }} {{ $user->mailing_address_2 }}</span>
        <span style="left: 302px;">{{ $user->mailing_city }}</span>
        <span style="left: 522px;">{{ $user->mailing_state }}</span>
        <span style="left: 590px;">{{ $user->mailing_postal_code }}</span>
    </p>
    <p style="top: 310px">
        <span>{{ ($user->sponsor) ? $user->sponsor->formal_full_name : "" }}</span>
        <span style="left: 460px">{{ ($user->sponsor) ? $user->sponsor->synergy_id : "" }}</span>
    </p>
    <p style="top: 925px">
        <img src="{{ $user->signature }}" alt="" height="40" style="margin-left: 315px;">
        <span style="left: 600px">{{ $user->created_at->format('Y-m-d') }}</span>
    </p>
</div>

<div class="page-break"></div>

<div class="page_2">
</div>
