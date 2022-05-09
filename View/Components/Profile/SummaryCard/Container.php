<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Profile\SummaryCard;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Container.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class Container extends XotBaseComponent {
    public array $attrs;

    public function __construct(string $img = 'img.png',string $imgalt = 'Image',
    string $fullname = 'Full Name',string $location = '1st Street, NY',string $reviewsnumber = '0',
    string $verificationstatus = 'Unverified', string $name = 'Name') {
        /*string $img = 'img.png',string $img_alt = 'Image',
        string $full_name = 'Full Name',string $location = '1st Street, NY',string $reviews_number = '0',
        string $verification_status = 'Unverified', string $name = 'Name'*/

        $this->attrs['img'] = $img;
        $this->attrs['imgalt'] = $imgalt;
        $this->attrs['fullname'] = $fullname;
        $this->attrs['location'] = $location;
        $this->attrs['reviewsnumber'] = $reviewsnumber;
        $this->attrs['verificationstatus'] = $verificationstatus;
        $this->attrs['name'] = $name;
    }

    public function render(): Renderable {
        $view = 'theme::components.profile.summary_card.container';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
