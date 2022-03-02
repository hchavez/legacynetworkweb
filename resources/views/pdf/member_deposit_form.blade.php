<div class="page_1" style="background-image: url('/files/AuthorizationDeposit.jpg');">
    <p style="top: 370px">
        <span style="left: 0px;">{{ $user->full_name }}</span>
        <span style="left: 390px;">{{ $user->synergy_id }}</span>
        <span style="left: 550px;">{{ \Carbon\Carbon::now()->format('m/d/Y') }}</span>
    </p>


    <p style="top: 430px">
        <span style="left: 0px;">{{ $bank_name }}</span>
        <span style="left: 390px;">{{ $account_name }}</span>
    </p>

    <p style="top: 470px">
        <span style="left: 0px;">{{ $routing_number }}</span>
        <span style="left: 390px;">{{ $checking_number }}</span>
    </p>

    <p style="top: 575px">
        <img src="{{ $user->signature }}" alt="" height="35" style="margin-left: 280px;">
    </p>
</div>
