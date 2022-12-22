<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Policies;

<<<<<<< HEAD
use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
=======
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
<<<<<<< HEAD
use Modules\Xot\Contracts\PanelContract;
>>>>>>> a909dfc0 (up)
=======
use Modules\Cms\Contracts\PanelContract;
>>>>>>> fc07af93 (.)
use Modules\Xot\Contracts\UserContract;

/**
 * Class _ModulePanelPolicy.
 */
class _ModulePanelPolicy extends XotBasePanelPolicy {
    public function test(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function choosePubTheme(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function activatePubTheme(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function chooseAdmTheme(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function activateAdmTheme(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function chooseIcons(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function showAllIcons(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function manageLangModule(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function testVideo(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function testVideoEditor(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function testContentSelectionAndHighlighting(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function TestSelectHighlight(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function testSlider(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function menuBuilder(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function grapeJs(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function testComponents(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function tryProgressbar(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function TryDateRangeFlatpickr(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function tryFormBuilder(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function tryFormBuilder1(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function tryFormBuilder2(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function tryFormBuilder3(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function tryFormBuilder4(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function tryFormBuilder5(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function tryFormBuilder8(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function tryFormBuilderArr(UserContract $user, PanelContract $panel): bool {
        return true;
    }

    public function tryGetForm(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
