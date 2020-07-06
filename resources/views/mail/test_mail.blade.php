@component('mail::message')
# Order Shipped

Your order has been shipped!
{{$message}}
@component('mail::button', ['url' => "vegetable.com"])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent