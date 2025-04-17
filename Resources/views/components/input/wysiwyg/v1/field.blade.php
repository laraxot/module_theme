<div x-data="editorConfig()" x-init="minHeight = $refs.editor.scrollHeight">
    <div class="border-gray-300 border-2 border-b-0 rounded-t p-2 bg-gray-200">
        <ul class="flex">
            <li>
                <button type="button" class="text-gray-600 mr-4 cursor-pointer" @click="handleClick('header', $el)">
                    <x-theme::svg icon="format-text-size" class="w-4 h-4" />
                </button>
            </li>
            <li>
                <button type="button" class="text-gray-600 mr-4 cursor-pointer" @click="handleClick('bold', $el)">
                    <x-theme::svg icon="format-bold" class="w-4 h-4" />
                </button>
            </li>
            <li>
                <button type="button" class="text-gray-600 mr-4 cursor-pointer" @click="handleClick('italic', $el)">
                    <x-theme::svg icon="format-italic" class="w-4 h-4" />
                </button>
            </li>
            <li>
                <button type="button" class="text-gray-600 mr-4 cursor-pointer" @click="handleClick('quote', $el)">
                    <x-theme::svg icon="s-chevron-right" class="w-5 h-5" />
                </button>
            </li>
            <li>
                <button type="button" class="text-gray-600 mr-4 cursor-pointer" @click="handleClick('code', $el)">
                    <x-theme::svg icon="o-code" class="w-5 h-5" />
                </button>
            </li>
            <li>
                <button type="button" class="text-gray-600 mr-4 cursor-pointer" @click="handleClick('link', $el)">
                    <x-theme::svg icon="o-link" class="w-4 h-4" />
                </button>
            </li>
            <li>
                <button type="button" class="text-gray-600 mr-4 cursor-pointer" @click="handleClick('image', $el)">
                    <x-theme::svg icon="s-photograph" class="w-5 h-5" />
                </button>
            </li>
        </ul>
    </div>
    <textarea @keyup.prevent="expand($refs.editor, minHeight)" @load.window="expand($refs.editor, minHeight)"
        x-ref="editor" name="body" id="body"
        class="editor rounded-t-none resize-none h-40 focus:outline-none">{{ old('body') ?: $value ?? null }}</textarea>
</div>
