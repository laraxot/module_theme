@props(['content' => 'Content'])

<a {{ $attributes->merge([
    'class' => 'no-underline border border-gray-200 px-1 rounded text-xs uppercase tracking-wide font-semibold text-gray-500',
]) }}
    href="#" x-data="{
  isCopied: false,
  copyToClipBoard() {
   if (! navigator.clipboard) {
    textArea = document.createElement('textarea');
    textArea.value = this.$refs.content.innerHTML;

    textArea.style.top = '0';
    textArea.style.left = '0';
    textArea.style.position = 'fixed';

    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    try {
     if (document.execCommand('copy')) {
      this.isCopied = true;
      setTimeout(() => {
       this.isCopied = false;
      }, 2500);
     }
    } catch (err) {
     console.error('Fallback: Oops, unable to copy', err);
    }

    document.body.removeChild(textArea);
    return;
   } else {
    navigator.clipboard.writeText(this.$refs.content.innerHTML)
     .then(() => {
      this.isCopied = true;
      setTimeout(() => {
       this.isCopied = false;
      }, 2500);
     });
   }
  }
 }" x-on:click.prevent="copyToClipBoard()" x-cloak>
    <span class="hidden" x-ref="content">{!! $content !!}</span>
    <span x-text="isCopied ? 'Copied' : 'Copy'"></span></a>

{{-- https://devdojo.com/mithicher/5-reusable-laravel-blade-components-with-alpinejs
    <x-copytoclipboard
  content="Laravel Blade Component is Awesome"
/>
<x-copytoclipboard
  content='<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 14l9-5-9-5-9 5 9 5z" /><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" /></svg>'
/> --}}
