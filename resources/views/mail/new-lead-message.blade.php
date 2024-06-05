<x-mail::message>
    # Introduction

    Sender: Ciao

    Email: bogio@gmail.com

    ## message

    eccomi infami

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
