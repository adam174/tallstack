@if (\Request::is(['admin/reservations*','admin/trips*'])))
@include('vendor.voyager.custom_master')

@else
@include('vendor.voyager.base_master')
@endif
