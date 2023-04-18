<section class="container mx-auto grid grid-cols-1 md:grid-cols-3 md:gap-5">
    <div class="col-span-2">
        <div class="bg-white p-5 md:p-7 rounded-md">
            <div class="flex justify-between flex-col md:flex-row">
                <h1 class="mb-3">
                    @if($isEditModeOn)
                        Edit Page
                    @else 
                        Add Page
                    @endif
                </h1>

                <div class="flex gap-2 mb-4">
                    <div class="block">
                        <label for="locale" class="flex items-center">
                            <x-ui.radio wire:model="locale" value="en" id="locale" name="locale" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('English') }}</span>
                        </label>
                    </div>
                    <div class="block">
                        <label for="locale" class="flex items-center">
                            <x-ui.radio wire:model="locale" value="es" id="locale" name="locale" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Spanish') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <x-validation-errors class="mb-4" />

            <div class="space-y-3">

                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Meta Title') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="metaTitle" id="metaTitle" class="block mt-1 h-8 w-full" type="text" />
                </div>

                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Meta Tags') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="metaTags" id="metaTags" class="block mt-1 h-8 w-full" type="text" />
                </div>

                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Meta Description') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-ui.textarea wire:model.debounce="metaDescription" id="metaDesc" class="block mt-1 w-full" type="text" />
                </div>

                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Page Name') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="name" id="name" class="block mt-1 h-8 w-full" type="text" />
                </div>

                <div>
                    <x-label  for="slug" value="{{ __('Page Slug') }}" />
                    <x-input wire:model.debounce="slug" id="slug" class="block mt-1 h-8 w-full" type="text" />
                </div>

                <div wire:ignore>
                    <div class="flex gap-1 mb-2">
                        <x-label  for="" value="{{ __('Content') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <textare wire:model.debounce="content" id="editor">
                        @if($isEditModeOn)
                            {!! $content !!}
                        @endif
                    </textare>
                </div>

                <div class="block mt-5">
                    <label for="isPublished" class="flex items-center">
                        <x-checkbox wire:model.debounce="isPublished" id="isPublished" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Published') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end">
                    @if($isEditModeOn)
                        <x-button wire:click.debounce="updatePage" type="button"  class="ml-4">
                            {{ __('Update') }}
                        </x-button>

                        <x-button wire:click.debounce="cancelPageEditMode" type="button"  class="ml-1">
                            {{ __('Cancel') }}
                        </x-button>
                    @else
                        <x-button wire:click.debounce="createPage" type="button" class="ml-4">
                            {{ __('Create') }}
                        </x-button>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <div>
        <div class="bg-white p-5 md:p-7 rounded-md">
            <h1 class="mb-5">Page list</h1>

            <div class="overflow-x-auto">
                <table class="wrap w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages ?? [] as $page)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{ $Page->image_link ?? '' }}" class="hover:underline" target="_blank">{{ $page->name ?? '' }}</a>
                            </th>
                            <td class="px-4 py-3">
                                @if($page->is_published)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Published</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Unpublished</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button wire:click.debounce="enablePageEditMode({{ $page->id }})" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click.debounce="confirmDeletePage({{ $page->id }})" class="ml-1 text-red-400" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-ui.loading-spinner wire:loading.flex wire:target="confirmDeletePage, enablePageEditMode, updatePage, cancelPageEditMode, createPage" />
</section>



@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>

    <script>
        $(function() {
            'use strict';

            //Tinymce editor
            if ($("#editor").length) {
                tinymce.init({
                selector: '#editor',
                min_height: 350,
                default_text_color: 'red',
                plugins: [
                    'advlist', 'autoresize', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'pagebreak',
                    'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
                image_advtab: true,
                templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                    },
                    {
                    title: 'Test template 2',
                    content: 'Test 2'
                    }
                ],
                content_css: [],

                setup: function (editor) {

                        editor.on('init change', function () {
                            editor.save();
                        });
                        editor.on('change', function (e) {
                            @this.set('content', editor.getContent());
                        });

                        window.addEventListener('page:edit', function(e){
                            editor.setContent(e.detail);
                        })

                        window.addEventListener('content:clear', function(e){
                            editor.setContent('');
                        })
                }

                });
            }

            });
    </script>
@endpush
