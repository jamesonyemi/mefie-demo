<span 
    class="{{ $text_color ?? 'badge badge-default bx-sm' }} m-0" 
    id="{{ $field_selector_id ?? 'currency-symbol' }}"  
    name="{{ $field_selector_name ?? 'currency-symbol' }}" >
    {{ $set_user_default_currency_symbol ?? config("app.set_default_currency") }}
</span>