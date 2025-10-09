<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PerguruanTinggiList extends Component
{
    public $daftar;

    public function __construct()
    {
        $daftar = [
            ['id' => 'polije', 'label' => 'Politeknik Negeri Jember'],
            ['id' => 'polinema', 'label' => 'Politeknik Negeri Malang'],
            ['id' => 'ppns', 'label' => 'Politeknik Perkapalan Negeri Surabaya'],
            ['id' => 'ui', 'label' => 'Universitas Indonesia'],
            ['id' => 'um', 'label' => 'Universitas Malang'],
            ['id' => 'unair', 'label' => 'Universitas Airlangga'],
            ['id' => 'ub', 'label' => 'Universitas Brawijaya'],
            ['id' => 'unesa', 'label' => 'Universitas Surabaya'],
            ['id' => 'itb', 'label' => 'Institut Teknologi Bandung'],
            ['id' => 'ugm', 'label' => 'Universitas Gadjah Mada'],
            ['id' => 'unej', 'label' => 'Universitas Jember'],
        ];

        // Urutkan berdasarkan label (nama PTN) secara ascending
        usort($daftar, function($a, $b) {
            return strcmp($a['label'], $b['label']);
        });

        $this->daftar = $daftar;
    }

    public function render()
    {
        return view('components.perguruan-tinggi-list', [
            'daftar' => $this->daftar
        ]);
    }
}