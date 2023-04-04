<section class="grid grid-cols-1 md:grid-cols-3 md:gap-5">
    <div>
        <div class="bg-white mx-auto p-5 md:p-7 md:rounded-md">
            <h1 class="mb-5">Add Feature Box</h1>

            <x-validation-errors class="mb-4" />

            <div class="space-y-3">
                <div>
                    <x-label  for="sup_title" value="{{ __('Sup Title') }}" />
                    <x-input wire:model.debounce="supTitle" id="sup_title" class="block mt-1 w-full" type="text" required />
                </div>

                <div>
                    <x-label  for="title" value="{{ __('Title') }}" />
                    <x-input wire:model.debounce="title" id="title" class="block mt-1 w-full" type="text" required />
                </div>

                <div>
                    <x-label  for="sub_title" value="{{ __('Sub Title') }}" />
                    <x-input wire:model.debounce="subTitle" id="sub_title" class="block mt-1 w-full" type="text" required />
                </div>

                <div>
                    <x-label  for="button_text" value="{{ __('Button Text') }}" />
                    <x-input wire:model.debounce="buttonText" id="button_text" class="block mt-1 w-full" type="text" required />
                </div>

                <div>
                    <x-label  for="button_link" value="{{ __('Button Link') }}" />
                    <x-input wire:model.debounce="buttonLink" id="button_link" class="block mt-1 w-full" type="text" required />
                </div>


                <div class="">
                    <x-label class="block mb-1" for="parent" value="{{ __('Image') }}" />

                    @if($oldImage && !$image)
                    <div class="flex items-center justify-center mb-3">
                        <img class="w-full rounded-md block" src="{{ $oldImage ?? '' }}">
                    </div>
                    @endif

                    @if($image)
                    <div class="">
                        <div class="flex items-center justify-center">
                            @if ($image)
                                <img class="w-full rounded-md block" src="{{ $image->temporaryUrl() }}">
                            @endif
                        </div>
                        <div class="flex items-center justify-center mt-2">
                            <button wire:click.debounce="removeImage" type="button" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest ">Remove</button>
                        </div>
                    </div>
                    @else
                    <div>
                        <div class="flex items-center justify-center">
                            <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-800">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Select a Image</span>
                                <input wire:model="image" type='file' class="hidden" />
                            </label>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="block">
                    <label for="isPublished" class="flex items-center">
                        <x-checkbox wire:model.debounce="isPublished" id="isPublished" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Published') }}</span>
                    </label>
                </div>


                <div class="flex items-center justify-end">
                    @if($isEditModeOn)
                        <x-button wire:click.debounce="updateFeatureBox" type="button"  class="ml-4">
                            {{ __('Update') }}
                        </x-button>

                        <x-button wire:click.debounce="cancelFeatureBoxEditMode" type="button"  class="ml-1">
                            {{ __('Cancel') }}
                        </x-button>
                    @else
                        <x-button wire:click.debounce="createFeatureBox" type="button" class="ml-4">
                            {{ __('Create') }}
                        </x-button>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <div class="col-span-2">
        <div class="bg-white p-5 md:p-7 rounded-md">
            <h1 class="mb-5">Feature Box list</h1>

            <div class="overflow-x-auto">
                <table class="wrap w-full whitespace-nowrap text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Image</th>
                            <th scope="col" class="px-4 py-3">Sup Title</th>
                            <th scope="col" class="px-4 py-3">Title</th>
                            <th scope="col" class="px-4 py-3">Sub Title</th>
                            <th scope="col" class="px-4 py-3">Button Text</th>
                            <th scope="col" class="px-4 py-3">Button Link</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($featureBoxs ?? [] as $featureBox)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="block w-20 h-20 object-contain" src="{{ $featureBox->image ?? '' }}" alt="">
                            </th>
                            <td class="px-4 py-3">
                                {{ $featureBox->sup_title ?? '' }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $featureBox->title ?? '' }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $featureBox->sub_title ?? '' }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $featureBox->button_text ?? '' }}
                            </td>
                            <td class="px-4 py-3">
                                <a href="{{ $featureBox->button_link ?? '' }}" target="_blank">{{ $featureBox->button_link ?? '' }}</a>
                            </td>
                            <td class="px-4 py-3">
                                @if($featureBox->is_published)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Published</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Unpublished</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button wire:click.debounce="enableFeatureBoxEditMode({{ $featureBox->id }})" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click.debounce="confirmDeleteFeatureBox({{ $featureBox->id }})" class="ml-1 text-red-400" type="button">
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
    <x-ui.text-loading-spinner loadingText="Uploading..." wire:loading.flex wire:target="image" />
    <x-ui.loading-spinner wire:loading.flex wire:target="confirmDeleteFeatureBox, enableFeatureBoxEditMode, updateFeatureBox, updateFeatureBox, cancelFeatureBoxEditMode" />
</section>
