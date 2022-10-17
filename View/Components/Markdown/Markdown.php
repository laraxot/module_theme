<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Markdown;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use League\CommonMark\MarkdownConverterInterface;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Markdown.
 */
<<<<<<< HEAD
class Markdown extends XotBaseComponent {
=======
class Markdown extends XotBaseComponent
{
>>>>>>> ede0df7 (first)
    protected string $flavor;

    protected string $htmlInput;

    protected bool $allowUnsafeLinks;

    protected array $options;

    protected bool $anchors;

    protected string $url;

    public function __construct(
        string $flavor = 'default',
        string $htmlInput = 'allow',
        bool $allowUnsafeLinks = true,
        array $options = [],
        bool $anchors = false
    ) {
        $this->flavor = $flavor;
        $this->htmlInput = $htmlInput;
        $this->allowUnsafeLinks = $allowUnsafeLinks;
        $this->options = $options;
        $this->anchors = $anchors;
    }

<<<<<<< HEAD
    public function render(): View {
        return view()->make('theme::components.markdown.markdown');
    }

    public function toHtml(string $markdown): string {
=======
    public function render(): View
    {
        return view()->make('theme::components.markdown.markdown');
    }

    public function toHtml(string $markdown): string
    {
>>>>>>> ede0df7 (first)
        if ($this->anchors) {
            $markdown = $this->generateAnchors($markdown);
        }

<<<<<<< HEAD
        return (string) $this->converter()->convertToHtml($markdown);
    }

    protected function converter(): MarkdownConverterInterface {
        $options = array_merge(
            $this->options,
            [
                'html_input' => $this->htmlInput,
                'allow_unsafe_links' => $this->allowUnsafeLinks,
=======
        return strval($this->converter()->convertToHtml($markdown));
    }

    protected function converter(): MarkdownConverterInterface
    {
        $options = array_merge(
            $this->options, [
            'html_input' => $this->htmlInput,
            'allow_unsafe_links' => $this->allowUnsafeLinks,
>>>>>>> ede0df7 (first)
            ]
        );

        if ('github' === $this->flavor) {
            return new GithubFlavoredMarkdownConverter($options);
        }

        return new CommonMarkConverter($options);
    }

<<<<<<< HEAD
    protected function generateAnchors(string $markdown): string {
        preg_match_all('(```[a-z]*\n[\s\S]*?\n```)', $markdown, $matches);
        /**
         * @var array
         */
        $anchors = $matches[0] ?? [];
        collect($anchors)->each(
=======
    protected function generateAnchors(string $markdown): string
    {
        preg_match_all('(```[a-z]*\n[\s\S]*?\n```)', $markdown, $matches);

        collect($matches[0] ?? [])->each(
>>>>>>> ede0df7 (first)
            function (string $match, int $index) use (&$markdown) {
                $markdown = str_replace($match, "<!--code-block-$index-->", $markdown);
            }
        );

        $markdown = collect(explode(PHP_EOL, $markdown))
            ->map(
                function (string $line) {
                    // For levels 2 to 6.
                    $anchors = [
<<<<<<< HEAD
                        '## ',
                        '### ',
                        '#### ',
                        '##### ',
                        '###### ',
=======
                    '## ',
                    '### ',
                    '#### ',
                    '##### ',
                    '###### ',
>>>>>>> ede0df7 (first)
                    ];

                    if (! Str::startsWith($line, $anchors)) {
                        return $line;
                    }

                    $title = trim(Str::after($line, '# '));
                    $anchor = '<a class="anchor" name="'.Str::slug($title).'"></a>';

                    return $anchor.PHP_EOL.$line;
                }
            )
            ->implode(PHP_EOL);
<<<<<<< HEAD
        /**
         * @var array
         */
        $data = $matches[0] ?? [];
        collect($data)->each(
=======

        collect($matches[0] ?? [])->each(
>>>>>>> ede0df7 (first)
            function (string $match, int $index) use (&$markdown) {
                $markdown = str_replace("<!--code-block-$index-->", $match, $markdown);
            }
        );

        return $markdown;
    }
}
