<body style="font-family: Arial, sans-serif; color: #333; background-color: #f9f9f9; padding: 20px;">
    <table style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
        <tr>
            <td style="padding: 20px; text-align: center; background-color: #4CAF50; color: #ffffff;">
                <h1 style="margin: 0; font-size: 24px;" id="product-title">Продукт "{{ $product->name }}" был успешно создан!</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p style="font-size: 16px; line-height: 1.5; margin: 10px 0;" class="product-article">
                    Артикул: <strong>{{ $product->article }}</strong>
                </p>
                <p style="font-size: 16px; line-height: 1.5; margin: 10px 0;" class="product-status">
                    Статус: 
                    <strong>
                        @if($product->status === 'unavailable')
                            Недоступен
                        @elseif($product->status === 'available')
                            Доступен
                        @else
                            Неизвестен
                        @endif
                    </strong>
                </p>
                <p style="font-size: 16px; line-height: 1.5; margin: 10px 0;" class="product-attributes">
                    <strong>Атрибуты:</strong>
                </p>
                @php
                                        $attributes = json_decode($product->data, true);
                                    @endphp
                                    @if($attributes)
                <ul style="font-size: 16px; line-height: 1.5; margin: 10px 0; padding-left: 20px;">
                    @foreach ($attributes as $key => $value)
                        <li>
                            <strong>{{ ucfirst($key) }}:</strong> {{ is_array($value) ? json_encode($value) : $value }}
                        </li>
                    @endforeach
                </ul>
                @endif
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; text-align: center; background-color: #f1f1f1;">
                <p style="font-size: 14px; color: #777;" class="email-footer">
                    Это письмо было сгенерировано автоматически. Пожалуйста, не отвечайте на него.
                </p>
            </td>
        </tr>
    </table>
</body>
