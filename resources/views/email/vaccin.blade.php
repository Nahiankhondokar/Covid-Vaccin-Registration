@component('mail::message')
    # Welcome to Our Website

    Hello Abdullah,

    Thank you for registration. Your vaccination date is tomorrow. The infomations are given below,

    {{-- **Email         :** {{ $user['email'] }}
    **Phone         :** {{ $user['phone'] }}
    **Vaccin Date   :** {{$user->['vaccin_date']}}
    **Hospital      :** {{$user->vaccinCenter->name}}
    **Location      :** {{$user->vaccinCenter->location}} --}}

    Please come to the given location for taking your vaccin.

    Thanks

    {{ config('app.name') }}
@endcomponent
