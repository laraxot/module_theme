<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- services --------

use Modules\Theme\Services\ThemeService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

// -------- bases -----------

/**
 * Class TestSelectHighlightAction.
 */
class TestSelectHighlightAction extends XotBasePanelAction
{
    public bool $onItem = true;
    public string $icon = '<i class="fas fa-vial"></i>';

    /**
     * @return mixed
     */
    public function handle()
    {
        $drivers = [
            // https://css-tricks.com/how-to-create-actions-for-selected-text-with-the-selection-api/
            'web_api',
            // https://www.jqueryscript.net/menu/Medium-style-Floating-Text-highlight-Menu-With-jQuery-CSS3.html
            'jquery_css3',
            // https://github.com/aruminant/tinyq
            'tinyq',
            'custom.v1',
        ];
        $i = request('i', 0);

        $view = ThemeService::getView();

        $view_params = [
            'view' => $view,
            'txt' => '<div id="text"><p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat lacus ut felis posuere, vel
            vulputate mauris varius. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus
            mus. Etiam iaculis enim eget facilisis rutrum. Suspendisse posuere nunc neque, eget euismod mauris ultrices
            sed. Integer velit leo, ultrices ut nisl sed, venenatis pretium turpis. Nam cursus vulputate magna ac
            condimentum. Curabitur mattis mauris massa, in consectetur nisl iaculis non. Duis eget metus vel nisl
            venenatis bibendum. Nam sodales velit eget porttitor luctus. Morbi eu consequat tortor.
        </p>
        <p>
            Nulla feugiat posuere mi, id porttitor sem tristique vel. Vestibulum vestibulum vestibulum leo, ut dictum odio
            dictum sit amet. Duis iaculis dui elit, sagittis ornare sapien consequat id. In auctor pellentesque odio,
            laoreet cursus diam pretium et. Etiam euismod lacus mauris, ac vulputate dui vehicula id. Fusce dapibus
            consequat est, eu ultrices arcu varius vitae. Proin sit amet vehicula tortor. Vestibulum id augue scelerisque,
            pulvinar justo accumsan, consectetur purus. Donec in varius sem, eget fermentum eros. Pellentesque sagittis
            nec augue quis accumsan. Integer ornare, ipsum at gravida interdum, nisl purus mattis velit, sed euismod
            sapien libero quis augue. Sed lobortis eros nisl, ut pretium nibh rhoncus ut. Curabitur in enim porta, iaculis
            justo quis, interdum quam. Vestibulum interdum scelerisque finibus.
        </p>
        <p>
            Proin egestas blandit tellus quis finibus. Ut tempus tincidunt magna, quis volutpat nulla. Nunc non interdum
            massa. Cras commodo quam sed enim fringilla, vitae vestibulum erat interdum. Donec in ultrices leo. Praesent
            vitae dolor non enim gravida semper. Curabitur non lobortis justo. Donec eu commodo enim.
        </p>
        <p>
            Suspendisse efficitur sapien ut justo imperdiet vulputate. In fermentum, ex ac consequat tempor, arcu lectus
            euismod orci, ut luctus magna sem quis est. Ut cursus est vel consectetur maximus. Aliquam ultricies diam vel
            sem pulvinar malesuada nec in ligula. Ut eu quam lorem. Etiam malesuada varius accumsan. Ut ultricies at magna
            ut scelerisque. Praesent iaculis lectus ornare blandit molestie. Nullam libero enim, viverra ac nisi nec,
            placerat sodales odio. Vivamus nisl nisi, fermentum quis convallis ut, molestie nec ex. Vivamus iaculis nibh
            vitae venenatis elementum. Ut venenatis laoreet metus, vel mattis tellus blandit ac. Nunc ut orci ut magna
            ultrices volutpat vitae in odio. Nullam hendrerit tempus justo, eget fringilla ligula. Aenean eu efficitur
            orci.
        </p>
        <p>
            Vivamus arcu est, consequat quis vulputate eu, accumsan sollicitudin ante. Vestibulum porttitor cursus sapien
            in congue. Donec rhoncus turpis orci, eu elementum urna vestibulum eu. In in lobortis sem. Integer tincidunt
            justo nec nisi fermentum viverra. Ut volutpat tellus tortor, vitae tincidunt odio condimentum vel. Fusce
            pulvinar at erat et eleifend. Fusce luctus gravida rhoncus. Aenean fermentum, velit sit amet pretium
            sollicitudin, felis tortor maximus est, nec tempus urna massa sit amet lorem. Donec rutrum purus sit amet
            feugiat venenatis. Vivamus tincidunt, lacus quis efficitur tincidunt, ex ipsum tincidunt lectus, sollicitudin
            dictum lacus urna sed ex. Duis quis sem pharetra, iaculis elit sed, viverra felis. Vestibulum nulla nisi,
            vulputate non nisl sed, tristique pretium turpis. Etiam convallis sapien arcu, in egestas ipsum vulputate nec.
            Fusce in lectus posuere, ultricies nulla sit amet, hendrerit felis.
        </p></div>',
            'drivers' => $drivers,
            'driver' => $drivers[$i],
        ];

        return view()->make($view, $view_params);
    }
}
