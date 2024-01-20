@if (Route::is('orders.index'))
    Orders
@elseif(Route::is('orders.show'))
    View Order - {{ $order->name }}
@endif
    | Admin Panel -
    @prop(app_name)
