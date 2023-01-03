<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Dokumen;

class card extends Component
{



    public function __construct(Dokumen $item)
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
