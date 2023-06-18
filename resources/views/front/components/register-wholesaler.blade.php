<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mt-3 mb-4 text-xl font-bold text-gray-900 dark:text-white">Signup for Wholesale</h2>
      <form wire:submit.prevent="handleForm">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <p>Personal Information</p>
              </div>
              <div class="sm:col-span-2">
                  <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                  <input wire:model.debounce="full_name" type="text" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type your name here..." required="">
              </div>
              <div class="w-full">
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                  <input wire:model.debounce="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="email" required="">
              </div>
              <div class="w-full">
                  <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                  <input wire:model.debounce="phone" type="text" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="phone number" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                  <textarea wire:model.debounce="address" id="address" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type your address here..."></textarea>
              </div>
              <div class="sm:col-span-2">
                  <p>Business Information</p>
              </div>
              <div class="sm:col-span-2">
                  <label for="business_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Name</label>
                  <input wire:model.debounce="business_name" type="text" id="business_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type your business name here..." required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="business_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Email</label>
                  <input wire:model.debounce="business_email" type="email" id="business_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Business email" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="business_contact_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Contact Number</label>
                  <input wire:model.debounce="business_contact_number" type="text" id="business_contact_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Business phone" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="business_sales_tax" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Sales/Tax Number</label>
                  <input wire:model.debounce="business_sales_tax" type="number" id="business_sales_tax" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Business sales/tax number" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="business_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Address</label>
                  <textarea wire:model.debounce="business_address" id="business_address" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type your business address here..."></textarea>
              </div>

              <div class="w-full">
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                  <input wire:model.debounce="password" type="password" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
              </div>
              <div class="w-full">
                  <label for="password_confirm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                  <input wire:model.debounce="password_confirm" type="password" id="password_confirm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
              </div>


              <div class="w-full">
                    @if($business_licence)
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Licence</label>
                        <div class="p-1 aspect-square border-2 border-gray-300 border-dashed rounded-lg h-full w-full">
                            <img class="rounded-lg block w-full h-full object-contain" src="{{ $business_licence->temporaryUrl() }}" alt="">
                        </div>

                        <div class="flex justify-center mt-3">
                            <span wire:click.debounce="revomeBusinessLicence" class="cursor-pointer bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Remove</span>
                        </div>
                    @else
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Licence</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="business_licence" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> Business Licence</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG</p>
                            </div>
                            <input wire:model.debounce="business_licence" id="business_licence" type="file" class="hidden" />
                        </label>
                    </div>
                    @endif
              </div>
              <div class="w-full">
                    @if($business_tax_sales_certificate)
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sales Tax Certificate</label>
                        <div class="p-1 aspect-square border-2 border-gray-300 border-dashed rounded-lg h-full w-full">
                            <img class="rounded-lg block w-full h-full object-contain" src="{{ $business_tax_sales_certificate->temporaryUrl() }}" alt="">
                        </div>

                        <div class="flex justify-center mt-3">
                            <span wire:click.debounce="removeTaxSalesCertificate" class="cursor-pointer bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Remove</span>
                        </div>
                    @else 
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sales Tax Certificate</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="tax-licence" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> Sales Tax Certificate</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG</p>
                            </div>
                            <input wire:model.debounce="business_tax_sales_certificate" id="tax-licence" type="file" class="hidden" />
                        </label>
                    </div>
                    @endif
              </div>


              <div class="sm:col-span-2 mt-10">
                    <div class="flex items-center">
                        <input required wire:model.debounce="terms_of_service" id="terms-and-condition" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="terms-and-condition" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="{{ route('custom-page', ['pageSlug' => 'terms-and-condition']) }}" class="text-blue-600 dark:text-blue-500 hover:underline">terms and conditions</a>.</label>
                    </div>
              </div>
             
          </div>

          <x-validation-errors class="mt-5" />

          <div class="flex justify-end mt-5">
                <x-button type="submit">
                    Submit
                </x-button>
          </div>
      </form>
  </div>

  <x-ui.loading-spinner wire:loading.flex wire:target="business_licence, business_tax_sales_certificate, removeTaxSalesCertificate, revomeBusinessLicence" />

</section>