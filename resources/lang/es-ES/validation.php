<?php

/*
 * This file is part of Okazanta.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'   => 'El :attribute debe ser aceptado.',
    'active_url' => 'El :attribute no es un enlace válido.',
    'after'      => 'El :attribute debe ser una fecha después de :date.',
    'alpha'      => 'El :attribute sólo puede contener letras.',
    'alpha_dash' => 'El :attribute sólo puede contener letras, números y guiones.',
    'alpha_num'  => 'El :attribute sólo puede contener letras y números.',
    'array'      => 'El :attribute debe ser una matriz.',
    'before'     => 'El :attribute debe ser una fecha antes de :date.',
    'between'    => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'El :attribute debe tener entre :min y :max objetos.',
    ],
    'boolean'        => 'The :attribute field must be true or false.',
    'confirmed'      => 'The :attribute confirmation does not match.',
    'date'           => 'The :attribute is not a valid date.',
    'date_format'    => 'The :attribute does not match the format :format.',
    'different'      => 'The :attribute and :other must be different.',
    'digits'         => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'email'          => 'The :attribute must be a valid email address.',
    'exists'         => 'The selected :attribute is invalid.',
    'distinct'       => 'El campo :attribute tiene un valor duplicado.',
    'filled'         => 'The :attribute field is required.',
    'image'          => 'El :attribute debe ser una imagen.',
    'in'             => 'The selected :attribute is invalid.',
    'in_array'       => 'El campo :attribute no existe en :other.',
    'integer'        => 'The :attribute must be an integer.',
    'ip'             => 'The :attribute must be a valid IP address.',
    'json'           => 'El :attribute debe ser una cadena JSON válida.',
    'max'            => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'El :attribute no puede tener más de :max objetos.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'min'   => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'El :attribute debe tener al menos :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato :attribute es inválido.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'El campo :attribute es obligatorio a no ser que :other se encuentre en :values.',
    'required_with'        => 'El campo del :attribute se requiere cuando :values es presente.',
    'required_with_all'    => 'El campo del :attribute se requiere cuando :values es presente.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'El :attribute debe ser :size kilobytes.',
        'string'  => 'El :attribute debe tener :size caracteres.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'   => 'The :attribute must be a string.',
    'timezone' => 'El :attribute debe ser una zona válida.',
    'unique'   => 'El :attribute ya ha sido usado.',
    'url'      => 'El formato :attribute es inválido.',

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
            'rule-name' => 'mensaje-personalizado',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
