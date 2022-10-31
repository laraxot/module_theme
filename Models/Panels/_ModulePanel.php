<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels;

use Modules\Xot\Models\Panels\Actions\ManageLangModuleAction;
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class _ModulePanel.
 */
class _ModulePanel extends XotBasePanel
{
    public function actions(): array
    {
        // $theme = request()->input('theme');
        /**
         * @var string|null
         */
        $theme = request('theme');
        $act = request()->input('_act');
        $actions = [
            new Actions\ChoosePubThemeAction(),
            new Actions\ChooseAdmThemeAction(),
            // new Actions\TestVideoAction(),
            new Actions\TestSliderAction(),
            // new Actions\TestVideoEditorAction(),
            new Actions\TestSelectHighlightAction(),
            // new Actions\ChooseIconsAction(),
            new Actions\MenuBuilderAction(),
            new Actions\GrapeJsAction(),
            // new Actions\ShowAllIconsAction(), //visualizza tutte le icone disponibili per il tema //da rifare
            new Actions\TestComponentsAction(),
            new Actions\TryProgressbarAction(),
            new Actions\TryDateRangeFlatpickrAction(),
            new Actions\TryFormBuilderAction(),
            new Actions\TryFormBuilder1Action(),
            new Actions\TryFormBuilder2Action(),
            new Actions\TryFormBuilder3Action(),
            new Actions\TryFormBuilder4Action(),
            new Actions\TryGetFormAction(),
            new ManageLangModuleAction('theme'),
        ];
        if (\in_array($act, ['choose_pub_theme', 'activate_pub_theme'], true)) {
            $actions[] = new Actions\ActivatePubThemeAction($theme);
        }
        if (\in_array($act, ['choose_adm_theme', 'activate_adm_theme'], true)) {
            $actions[] = new Actions\ActivateAdmThemeAction($theme);
        }

        return $actions;
    }
}
