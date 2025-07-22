@props(['name', 'value' => ''])

<div>
    <label for="{{ $name }}" class="block font-semibold mb-1 capitalize">{{ ucfirst(str_replace('_', ' ', $name)) }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" class="w-full border border-gray-300 rounded px-3 py-2">{!! old($name, $value) !!}</textarea>
</div>

@once
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
    @endpush
@endonce

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/turndown/dist/turndown.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const textarea = document.getElementById(@json($name));
            if (textarea) {
                const easyMDE = new EasyMDE({ element: textarea });
                const turndownService = new TurndownService();

                easyMDE.codemirror.on("paste", (cm, event) => {
                    const clipboardData = event.clipboardData || window.clipboardData;
                    const html = clipboardData.getData('text/html');
                    if (html) {
                        event.preventDefault();
                        const markdown = turndownService.turndown(html);
                        cm.replaceSelection(markdown);
                    }
                });
            }
        });
    </script>
@endpush