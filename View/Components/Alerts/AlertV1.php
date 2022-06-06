<?php

declare(strict_types=1);

/*
https://github.com/dgvai/laravel-adminlte-components/blob/master/src/Components/Alert.php

MINIMUM USAGE
<x-alerts.alert-v1 title="Alert!">
    This is alert
</x-alerts.alert-v1>
or
<x-alerts.alert-v1 title="Alert!" type="danger">
    This is alert
</x-alerts.alert-v1>

ALL AVAILABLE ATTRIBUTES

ATTRIBUTE        DETAILS                                    REQUIRED    TYPE
title            Title of the Alert                        true        string
type            Type of alert.
                Boostrap types:
                success,
                info, primary,... etc                    false        string
dismissable        Is the alert dismissable?(true/false)    false        boolean
*/

namespace Modules\Theme\View\Components\Alerts;

use Illuminate\View\Component;

class AlertV1 extends Component {
    public array $attrs = [];
    public string $icon;
    // public $type;
    public ?string $title;
    public ?bool $dismissable;

    public function __construct(?string $type = 'info', ?bool $dismissable = false, string $title = 'Alert') {
        $this->attrs['class'] = 'alert alert-'.$type.' '.($dismissable ? 'alert-dismissible' : '');
        switch ($type) {
        case 'info': $this->icon = 'info';
            break;
        case 'warning': $this->icon = 'exclamation-triangle';
            break;
        case 'success': $this->icon = 'check';
            break;
        case 'danger': $this->icon = 'ban';
            break;
        default: $this->icon = 'exclamation';
            break;
        }
        // $this->type = $type;
        $this->title = $title;
        $this->dismissable = $dismissable;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::components.alerts.alertV1';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
