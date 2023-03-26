@props(['disabled' => false])

<div wire:ignore>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes !!} >
</div>



@push('styles')
    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

    <script>
            document.addEventListener('livewire:load', function () {
            FilePond.setOptions({
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort) => {
                        @this.upload('icon', file, load, error, progress)
                    },
                    revert: (filename, load) => {
                        @this.removeUpload('icon', filename, load)
                    }
                }
            });
            const inputElement = document.querySelector('input[type="file"]');
            const pond = FilePond.create(inputElement);
            Livewire.on('filepond.init', () => {
                pond.setOptions({
                    allowMultiple: {{ $attributes->has('multiple') ? 'true' : 'false' }},
                    maxFiles: {{ $attributes->has('max') ? $attributes->get('max') : 'null' }},
                    labelIdle: '{{ __('Drop files here or click to upload') }}',
                });
            });
        });
    </script>
@endpush('scripts')