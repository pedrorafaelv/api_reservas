<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | El following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El :attribute debe ser aceptado',
    'accepted_if' => 'El :attribute debe ser aceptado cuando  :other is :value.',
    'active_url' => 'El :attribute no es una URL valida.',
    'after' => 'El :attribute debe ser una fecha despues de :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha mayor o igual a :date.',
    'alpha' => 'El :attribute sólo debe contener letras.',
    'alpha_dash' => 'El :attribute Sólo debe contener letras, números, puntos o underscores.',
    'alpha_num' => 'El :attributesólo debe contenernetras o números.',
    'array' => 'El :attribute deb ser un array.',
    'before' => 'El :attribute debe ser una fecha antes de :date.',
    'before_or_equal' => 'El :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'file' => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string' => 'El :attribute debe estar entre :min y :max characters.',
        'array' => 'El :attribute debe estar entre :min y :max items.',
    ],
    'boolean' => 'El campo :attribute debe ser true or false.',
    'confirmed' => 'La :attribute confirmación no coincide.',
    'current_password' => 'El password es incorrecto.',
    'date' => 'El campo :attribute no es una fecha válida.',
    'date_equals' => 'El :attribute debe ser una fecha iguala a :date.',
    'date_format' => 'El :attribute no coincide con el formato :format.',
    'declined' => 'El :attribute debe ser rechazado.',
    'declined_if' => 'El :attribute debe ser rechazado cuando :other es :value.',
    'different' => 'El :attribute y :other debe ser diferente.',
    'digits' => 'El :attribute debe ser :digits digitos.',
    'digits_between' => 'El :attribute debe ser entre :min y :max digitos.',
    'dimensions' => 'El :attributetiene dimensiones de imagen no válidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'email' => 'El :attribute debe ser una dirección de email válida.',
    'ends_with' => 'El :attribute debe terminar con uno de los siguientes: :values.',
    'enum' => 'El :attribute seleccionaado es invalido.',
    'exists' => 'El :attribute seleccionado es invalido.',
    'file' => 'El :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe ser un valor.',
    'gt' => [
        'numeric' => 'El :attribute debe ser mayor que :value.',
        'file' => 'El :attribute debe ser mayor que :value kilobytes.',
        'string' => 'El :attribute debe ser mayor que :value characters.',
        'array' => 'El :attribute debe tener mas de:value items.',
    ],
    'gte' => [
        'numeric' => 'El :attribute debe ser mayor o igual que :value.',
        'file' => 'El :attribute debe ser mayor o igual que :value kilobytes.',
        'string' => 'El :attribute debe ser mayor o igual que :value characters.',
        'array' => 'El :attribute debe tener :value items o mas.',
    ],
    'image' => 'El :attribute debe ser una imagen.',
    'in' => 'El :attribute seleccionado no es válido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El :attribute debe ser un entero.',
    'ip' => 'El :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El :attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El :attribute debe ser menor que :value.',
        'file' => 'El :attribute debe ser menor que :value kilobytes.',
        'string' => 'El :attribute debe ser menor que :value characters.',
        'array' => 'El :attribute must have menor que :value items.',
    ],
    'lte' => [
        'numeric' => 'El :attribute debe ser menor o igual que :value.',
        'file' => 'El :attribute debe ser menor o igual que :value kilobytes.',
        'string' => 'El :attribute debe ser menor o igual que :value characters.',
        'array' => 'El :attribute no debe ser mas que :value items.',
    ],
    'mac_address' => 'El :attribute debe ser una MAC address válida.',
    'max' => [
        'numeric' => 'El :attribute no debe ser  mayor que :max.',
        'file' => 'El :attribute no debe ser  mayor que :max kilobytes.',
        'string' => 'El :attribute mno debe ser mayor que :max characters.',
        'array' => 'El :attribute no debe tener mas de :max items.',
    ],
    'mimes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El :attribute debe ser al menos :min.',
        'file' => 'El :attribute debe ser al menos :min kilobytes.',
        'string' => 'El :attribute debe ser al menos :min characters.',
        'array' => 'El :attribute debe tener al menos :min items.',
    ],
    'multiple_of' => 'El :attribute debe ser un múltiplo de :value.',
    'not_in' => 'El seleccionado :attribute no es válido .',
    'not_regex' => 'El formato de :attribute no es válido.',
    'numeric' => 'El :attribute debe ser un número.',
    'password' => 'El password es incorrecto.',
    'present' => 'El campo :attribute  debe ser presente.',
    'prohibited' => 'El campo :attribute es prohibido.',
    'prohibited_if' => 'El campo :attribute  es prohibido cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute is prohibido  a menos que  :other este  en :values.',
    'prohibits' => 'El campo :attribute  prohibe :other de estar presente.',
    'regex' => 'El formato :attribute no es válido.',
    'required' => 'El  campo :attribute es requerido.',
    'required_array_keys' => 'El campo :attribute debe contener entradas para: :values.',
    'required_if' => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless' => 'El campo :attribute es requerido a menos que :other este en :values.',
    'required_with' => 'El campo :attribute es requerido cuando :values este presente.',
    'required_with_all' => 'El campo :attribute es requerido cuando :values esten presentes.',
    'required_without' => 'El campo :attribute es requerido cuando :values no esté presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ningún :values esten presentes.',
    'same' => 'El :attribute y :other dene  coincidir.',
    'size' => [
        'numeric' => 'El :attribute debe ser :size.',
        'file' => 'El :attribute debe tener :size kilobytes.',
        'string' => 'El :attribute debe tener :size characters.',
        'array' => 'El :attribute debe contener :size items.',
    ],
    'starts_with' => 'El :attribute debe comenzar con uno de los sguientes valores: :values.',
    'string' => 'El :attribute debe ser un string.',
    'timezone' => 'El :attribute debe ser una zona horaria válida (timezone).',
    'unique' => 'El :attribute ya ha esta en uso.',
    'uploaded' => 'El :attribute ha fallado al subir.',
    'url' => 'El :attribute debe ser unaa URL válid .',
    'uuid' => 'El :attribute debe ser una UUID válida.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | El following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
