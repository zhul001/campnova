<?php

return [
    'accepted'             => 'Kolom :attribute harus diterima.',
    'active_url'           => 'Kolom :attribute bukan URL yang valid.',
    'after'                => 'Kolom :attribute harus tanggal setelah :date.',
    'after_or_equal'       => 'Kolom :attribute harus tanggal setelah atau sama dengan :date.',
    'alpha'                => 'Kolom :attribute hanya boleh berisi huruf.',
    'alpha_dash'           => 'Kolom :attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num'            => 'Kolom :attribute hanya boleh berisi huruf dan angka.',
    'array'                => 'Kolom :attribute harus berupa array.',
    'before'               => 'Kolom :attribute harus tanggal sebelum :date.',
    'before_or_equal'      => 'Kolom :attribute harus tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => 'Kolom :attribute harus antara :min dan :max.',
        'file'    => 'Kolom :attribute harus antara :min dan :max kilobyte.',
        'string'  => 'Kolom :attribute harus antara :min dan :max karakter.',
        'array'   => 'Kolom :attribute harus antara :min dan :max item.',
    ],
    'boolean'              => 'Kolom :attribute harus true atau false.',
    'confirmed'            => 'Konfirmasi kolom :attribute tidak cocok.',
    'date'                 => 'Kolom :attribute bukan tanggal yang valid.',
    'date_equals'          => 'Kolom :attribute harus tanggal sama dengan :date.',
    'date_format'          => 'Kolom :attribute tidak cocok dengan format :format.',
    'different'            => 'Kolom :attribute dan :other harus berbeda.',
    'digits'               => 'Kolom :attribute harus :digits digit.',
    'digits_between'       => 'Kolom :attribute harus antara :min dan :max digit.',
    'dimensions'           => 'Kolom :attribute memiliki dimensi gambar yang tidak valid.',
    'distinct'             => 'Kolom :attribute memiliki nilai yang duplikat.',
    'email'                => 'Kolom :attribute harus berupa alamat email yang valid.',
    'ends_with'            => 'Kolom :attribute harus diakhiri dengan salah satu dari berikut: :values.',
    'exists'               => 'Kolom :attribute yang dipilih tidak valid.',
    'file'                 => 'Kolom :attribute harus berupa file.',
    'filled'               => 'Kolom :attribute harus diisi.',
    'gt'                   => [
        'numeric' => 'Kolom :attribute harus lebih besar dari :value.',
        'file'    => 'Kolom :attribute harus lebih besar dari :value kilobyte.',
        'string'  => 'Kolom :attribute harus lebih besar dari :value karakter.',
        'array'   => 'Kolom :attribute harus memiliki lebih dari :value item.',
    ],
    'gte'                  => [
        'numeric' => 'Kolom :attribute harus lebih besar atau sama dengan :value.',
        'file'    => 'Kolom :attribute harus lebih besar atau sama dengan :value kilobyte.',
        'string'  => 'Kolom :attribute harus lebih besar atau sama dengan :value karakter.',
        'array'   => 'Kolom :attribute harus memiliki :value item atau lebih.',
    ],
    'image'                => 'Kolom :attribute harus berupa gambar.',
    'in'                   => 'Kolom :attribute yang dipilih tidak valid.',
    'in_array'             => 'Kolom :attribute tidak ada di :other.',
    'integer'              => 'Kolom :attribute harus berupa angka bulat.',
    'ip'                   => 'Kolom :attribute harus berupa alamat IP yang valid.',
    'ipv4'                 => 'Kolom :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'                 => 'Kolom :attribute harus berupa alamat IPv6 yang valid.',
    'json'                 => 'Kolom :attribute harus berupa string JSON yang valid.',
    'lt'                   => [
        'numeric' => 'Kolom :attribute harus kurang dari :value.',
        'file'    => 'Kolom :attribute harus kurang dari :value kilobyte.',
        'string'  => 'Kolom :attribute harus kurang dari :value karakter.',
        'array'   => 'Kolom :attribute harus memiliki kurang dari :value item.',
    ],
    'lte'                  => [
        'numeric' => 'Kolom :attribute harus kurang dari atau sama dengan :value.',
        'file'    => 'Kolom :attribute harus kurang dari atau sama dengan :value kilobyte.',
        'string'  => 'Kolom :attribute harus kurang dari atau sama dengan :value karakter.',
        'array'   => 'Kolom :attribute tidak boleh memiliki lebih dari :value item.',
    ],
    'max'                  => [
        'numeric' => 'Kolom :attribute tidak boleh lebih besar dari :max.',
        'file'    => 'Kolom :attribute tidak boleh lebih besar dari :max kilobyte.',
        'string'  => 'Kolom :attribute tidak boleh lebih besar dari :max karakter.',
        'array'   => 'Kolom :attribute tidak boleh memiliki lebih dari :max item.',
    ],
    'mimes'                => 'Kolom :attribute harus berupa file dengan tipe: :values.',
    'mimetypes'            => 'Kolom :attribute harus berupa file dengan tipe: :values.',
    'min'                  => [
        'numeric' => 'Kolom :attribute harus minimal :min.',
        'file'    => 'Kolom :attribute harus minimal :min kilobyte.',
        'string'  => 'Kolom :attribute harus minimal :min karakter.',
        'array'   => 'Kolom :attribute harus memiliki minimal :min item.',
    ],
    'not_in'               => 'Kolom :attribute yang dipilih tidak valid.',
    'not_regex'            => 'Format kolom :attribute tidak valid.',
    'numeric'              => 'Kolom :attribute harus berupa angka.',
    'password'             => 'Password salah.',
    'present'              => 'Kolom :attribute harus ada.',
    'regex'                => 'Format kolom :attribute tidak valid.',
    'required'             => 'Kolom :attribute wajib diisi.',
    'required_if'          => 'Kolom :attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Kolom :attribute wajib diisi kecuali :other ada di :values.',
    'required_with'        => 'Kolom :attribute wajib diisi bila :values ada.',
    'required_with_all'    => 'Kolom :attribute wajib diisi bila :values ada.',
    'required_without'     => 'Kolom :attribute wajib diisi bila :values tidak ada.',
    'required_without_all' => 'Kolom :attribute wajib diisi bila tidak ada :values yang ada.',
    'same'                 => 'Kolom :attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Kolom :attribute harus berukuran :size.',
        'file'    => 'Kolom :attribute harus berukuran :size kilobyte.',
        'string'  => 'Kolom :attribute harus berukuran :size karakter.',
        'array'   => 'Kolom :attribute harus mengandung :size item.',
    ],
    'starts_with'          => 'Kolom :attribute harus diawali dengan salah satu dari berikut: :values.',
    'string'               => 'Kolom :attribute harus berupa string.',
    'timezone'             => 'Kolom :attribute harus berupa zona waktu yang valid.',
    'unique'               => 'Kolom :attribute sudah ada sebelumnya.',
    'uploaded'             => 'Kolom :attribute gagal mengunggah.',
    'url'                  => 'Format kolom :attribute tidak valid.',
    'uuid'                 => 'Kolom :attribute harus berupa UUID yang valid.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
