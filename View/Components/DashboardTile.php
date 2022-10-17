<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

<<<<<<< HEAD
class DashboardTile extends Component {
=======
class DashboardTile extends Component
{
>>>>>>> ede0df7 (first)
    public string $gridArea;

    public ?int $refreshIntervalInSeconds;

    public ?string $title;

    public bool $fade;

    public bool $show;

    public function __construct(
        string $position,
        ?int $refreshInterval = null,
        ?string $title = null,
        bool $fade = true,
        bool $show = true
    ) {
        $this->gridArea = $this->convertToGridArea($position);

        $this->refreshIntervalInSeconds = $refreshInterval;

        $this->title = $title;

        $this->fade = $fade;

        $this->show = $show;
    }

<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
        return view('theme::components.dashboard-tile');
    }

    protected function convertToGridArea(string $position): string {
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
        return view('theme::components.dashboard-tile');
    }

    protected function convertToGridArea(string $position): string
    {
>>>>>>> ede0df7 (first)
        $parts = explode(':', $position);

        $from = $parts[0];
        $to = $parts[1] ?? null;

<<<<<<< HEAD
        if (\strlen($from) < 2 || ($to && \strlen($to) < 2)) {
=======
        if (strlen($from) < 2 || ($to && strlen($to) < 2)) {
>>>>>>> ede0df7 (first)
            return '';
        }

        $fromColumnNumber = substr($from, 1);
        $areaFrom = "{$fromColumnNumber} / {$this->indexInAlphabet($from[0])}";

        if (! $to) {
            return $areaFrom;
        }

        $toStart = ((int) substr($to, 1)) + 1;

        $toEnd = ((int) $this->indexInAlphabet($to[0])) + 1;

        return "{$areaFrom} / {$toStart} / {$toEnd}";
    }

<<<<<<< HEAD
    private function indexInAlphabet(string $character): int {
        $alphabet = range('a', 'z');

        $index = array_search(strtolower($character), $alphabet, true);
=======
    private function indexInAlphabet(string $character): int
    {
        $alphabet = range('a', 'z');

        $index = array_search(strtolower($character), $alphabet);
>>>>>>> ede0df7 (first)

        return $index + 1;
    }
}
