<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{

    public $title;
    public $text;
    public $date;
    public $price;

    public function __construct($title,$text,$date,$price)
    {
        $this->title = $title;
        $this->text = $text;
        $this->date = $date;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
