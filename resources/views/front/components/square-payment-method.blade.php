<div>
    @if($isPaymentModeOn)
    <x-ui.edit-modal class="max-w-xl">
        <div class="p-5 md:p-10 bg-white rounded-md relative">

            <div class="flex justify-between items-center">
              <h5 class="text-xl font-bold dark:text-white">
                  Pay
              </h5>
              <div wire:click.debounce="cancelPaymentMode" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
            </div>

            <x-validation-errors class="mb-4" />

            <div class="grid grid-cols-1 gap-5 mt-5">

              @if(!$selectedMethod)
                <div class="space-y-3">
                  <div class="flex items-center">
                      <input wire:model.debounce="selectedMethod" value="card"  type="radio"  id="card" name="payment-method" class="hidden" />
                      <label for="card" class="w-full block cursor-pointer text-center  items-center px-4 py-2 primary-bg primary-text secondary-hover-bg secondary-hover-text border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Pay With Card
                      </label>
                  </div>
                  <div class="flex items-center">
                      <input wire:model.debounce="selectedMethod" value="google-pay"  type="radio"  id="google-pay" name="payment-method" class="hidden" />
                      <label for="google-pay" class="w-full block cursor-pointer text-center  items-center px-4 py-2 primary-bg primary-text secondary-hover-bg secondary-hover-text border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Pay With Google Pay
                      </label>
                  </div>
                  <div class="flex items-center">
                      <input wire:model.debounce="selectedMethod" value="apple-pay"  type="radio"  id="apple-pay" name="payment-method" class="hidden" />
                      <label for="apple-pay" class="w-full block cursor-pointer text-center  items-center px-4 py-2 primary-bg primary-text secondary-hover-bg secondary-hover-text border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Pay With Apple Pay
                      </label>
                  </div>
                  <div class="flex items-center">
                      <input wire:model.debounce="selectedMethod" value="ach" type="radio"  id="ach-bank-transfer" name="payment-method" class="hidden" />
                      <label for="ach-bank-transfer" class="w-full block cursor-pointer text-center  items-center px-4 py-2 primary-bg primary-text secondary-hover-bg secondary-hover-text border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Pay With Bank Account
                      </label>
                  </div>
                  <div class="flex items-center">
                      <input wire:model.debounce="selectedMethod" value="gift-card" type="radio"  id="gift-card" name="payment-method" class="hidden" />
                      <label for="gift-card" class="w-full block cursor-pointer text-center  items-center px-4 py-2 primary-bg primary-text secondary-hover-bg secondary-hover-text border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Pay With Gift Cards
                      </label>
                  </div>
                </div>
              @endif


              @if($selectedMethod === 'card')
                <div>
                    <div id="card-container"></div>
                      <button id="pay-with-card-btn"  type="button" class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                          {{ __('Pay ') }}
                      </button>
                </div>
              @endif

              @if($selectedMethod === 'google-pay')
                <div>
                      <button id="pay-with-google-pay-btn"  type="button" class="w-full px-4 py-2">
                          <div id="google-pay-container"></div>
                      </button>
                </div>
              @endif


              @if($selectedMethod === 'apple-pay')
                <div>
                      <button id="pay-with-apple-pay-btn"  type="button" class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                          {{ __('Pay ') }}
                      </button>
                </div>
              @endif


              @if($selectedMethod === 'ach')
                <div>
                    <div class="mb-5">
                        <x-label for="card-holder-name" value="{{ __('Card Holder Name') }}" />
                        <x-input id="card-holder-name" class="block h-8 mt-1 w-full" type="text" />
                    </div>
                    <button id="pay-with-ach-btn"  type="button" class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Pay ') }}
                    </button>
                </div>
              @endif


              @if($selectedMethod === 'gift-card')
                <div>
                    <div id="gift-card-container"></div>
                      <button id="pay-with-gift-card-btn"  type="button" class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                          {{ __('Pay ') }}
                      </button>
                </div>
              @endif


                @if($selectedMethod)
                  <div class="flex items-center justify-end">
                      <x-button wire:click.debounce="back" type="button" class="ml-4">
                          {{ __('Back') }}
                      </x-button>
                  </div>
                @endif
            </div>

            <div id="loading-spinner" style="background-color: rgba(0,0,0, .7)"  class="hidden absolute inset-0 w-full h-full z-50">
                <divf class="w-full h-full flex items-center justify-center">
                    <div role="status">
                      <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                          <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                      </svg>
                      <span class="sr-only">Loading...</span>
                  </div>
                </div>
            </div>

            <x-ui.loading-spinner wire:loading.flex wire:target="selectedMethod, cancelPaymentMode, back" />
        </div>
    </x-ui.edit-modal>
    @endif
</div>


@push('scripts')

<script type="text/javascript" src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
<script type="text/javascript">

  const  appId = "{{ config('square.app_id') }}";
  const  locationId = "{{ config('square.location_id') }}";
  const loadingSpinner = document.getElementById('loading-spinner');

  async function initializeCard(payments, payWithCardBtn) {
    payWithCardBtn.disabled = true;
    payWithCardBtn.innerText = 'Loading...';
    loadingSpinner.classList.toggle('hidden');
    const card = await payments.card();
    await card.attach('#card-container'); 
    payWithCardBtn.disabled = false;
    payWithCardBtn.innerText = 'Pay';
    loadingSpinner.classList.toggle('hidden');
    return card; 
  }


  async function initializeGooglePay(payments, paymentRequestOptions){
    loadingSpinner.classList.toggle('hidden');
    const googlePay = await payments.googlePay(paymentRequestOptions);
    await googlePay.attach('#google-pay-container'); 
    loadingSpinner.classList.toggle('hidden');
    return googlePay;
  }

  async function initializeApplePay(payments, paymentRequestOptions){
    loadingSpinner.classList.toggle('hidden');
    const applePay = await payments.applePay(paymentRequestOptions);
    loadingSpinner.classList.toggle('hidden');
    return applePay;
  }

  async function initializeAchBankTransfer(payments, payWithAchBtn){
    payWithAchBtn.disabled = true;
    payWithAchBtn.innerText = 'Loading...';
    loadingSpinner.classList.toggle('hidden');
    const ach = await payments.ach();
    payWithAchBtn.disabled = false;
    payWithAchBtn.innerText = 'Pay';
    loadingSpinner.classList.toggle('hidden');
    return ach; 
  }

  async function initializeGiftCard(payments){
    const giftCard = await payments.giftCard();
    loadingSpinner.classList.toggle('hidden');
    await giftCard.attach('#gift-card-container'); 
    loadingSpinner.classList.toggle('hidden');
    return giftCard; 
  }



 document.addEventListener('DOMContentLoaded', async function () {

    if (!window.Square) {
      throw new Error('Square.js failed to load properly');
    }



    // Card Payment Process
    window.addEventListener('init:card', async function(){

      const payments = window.Square.payments(appId, locationId);
      
      const payWithCardBtn = document.getElementById('pay-with-card-btn');

      let card;

      try {
        card = await initializeCard(payments, payWithCardBtn);
      } catch (e) {
        console.error('Initializing Card failed', e);
        alert(e);
        return;
      }


      payWithCardBtn.addEventListener('click', async function(){

        payWithCardBtn.disabled = true;
        payWithCardBtn.innerText = 'Processing...';

        try {
          const result = await card.tokenize();
          
          if(result.status === 'OK'){
              const { token } = result;
              console.log(result);
              Livewire.emit('onPayment', token);
              payWithCardBtn.disabled = false;
              payWithCardBtn.innerText = 'Pay';
          }

        }catch(error){
          payWithCardBtn.disabled = false;
          payWithCardBtn.innerText = 'Pay';
          alert(error);
        }

      });

    })



    // Ach Payment Process
    window.addEventListener('init:ach', async function(){

   
        const payments = window.Square.payments(appId, locationId);

        const payWithAchBtn = document.getElementById('pay-with-ach-btn');

        let ach;

        try {
          ach = await initializeAchBankTransfer(payments, payWithAchBtn);
        } catch (e) {
          console.error('Initializing Card failed', e);
          loadingSpinner.classList.toggle('hidden');
          alert(e);
          return;
        }

     
        payWithAchBtn.addEventListener('click', async function(){
          
          payWithAchBtn.disabled = true;
          payWithAchBtn.innerText = 'Processing...';

          try {
            const result = await ach.tokenize({accountHolderName: document.getElementById('card-holder-name').value});
            
            if(result.status === 'OK'){
                const { token } = result;
                Livewire.emit('onPayment', token);
                payWithAchBtn.disabled = false;
                payWithAchBtn.innerText = 'Pay';
            }

          }catch(error){
            payWithAchBtn.disabled = false;
            payWithAchBtn.innerText = 'Pay';
          }

        });

    })


    // Google Pay Payment Process
    window.addEventListener('init:google-pay', async function(){

        const payments = window.Square.payments(appId, locationId);

        const paymentRequest = payments.paymentRequest({
          total: {
            amount: '1.5',
            label: 'Total'
          },
          countryCode: 'US',
          currencyCode: 'USD'
        })

        let googlePay;

        try {
          googlePay = await initializeGooglePay(payments, paymentRequest);
        } catch (e) {
          console.error('Initializing Card failed', e);
          loadingSpinner.classList.toggle('hidden');
          alert(e);
          return;
        }

        const payWithGooglePayBtn = document.getElementById('pay-with-google-pay-btn');

        payWithGooglePayBtn.addEventListener('click', async function(){
          
          payWithGooglePayBtn.disabled = true;
          payWithGooglePayBtn.innerText = 'Processing...';

          try {
            const result = await googlePay.tokenize();
            
            if(result.status === 'OK'){
                const { token } = result;
                Livewire.emit('onPayment', token);
                payWithGooglePayBtn.disabled = false;
                payWithGooglePayBtn.innerText = 'Pay';
            }

          }catch(error){
            payWithGooglePayBtn.disabled = false;
            payWithGooglePayBtn.innerText = 'Pay';
          }

        });

    })

    // Apple Pay Payment Process
    window.addEventListener('init:apple-pay', async function(){

        const payments = window.Square.payments(appId, locationId);

        const paymentRequest = payments.paymentRequest({
          total: {
            amount: '1.5',
            label: 'Total'
          },
          countryCode: 'US',
          currencyCode: 'USD'
        })

        let applePay;

        try {
          applePay = await initializeApplePay(payments, paymentRequest);
        } catch (e) {
          console.error('Initializing Card failed', e);
          loadingSpinner.classList.toggle('hidden');
          alert(e);
          return;
        }

        const payWithApplePayBtn = document.getElementById('pay-with-apple-pay-btn');

        payWithApplePayBtn.addEventListener('click', async function(){
          
          payWithApplePayBtn.disabled = true;
          payWithApplePayBtn.innerText = 'Processing...';

          try {
            const result = await applePay.tokenize();
            
            if(result.status === 'OK'){
                const { token } = result;
                Livewire.emit('onPayment', token);
                payWithApplePayBtn.disabled = false;
                payWithApplePayBtn.innerText = 'Pay';
            }

          }catch(error){
            payWithApplePayBtn.disabled = false;
            payWithApplePayBtn.innerText = 'Pay';
          }

        });

    })


  // Gift Card Payment Process
  window.addEventListener('init:gift-card', async function(){

    const payments = window.Square.payments(appId, locationId);

    let giftCard;

    try {
      giftCard = await initializeGiftCard(payments);
    } catch (e) {
      console.error('Initializing Card failed', e);
      loadingSpinner.classList.toggle('hidden');
      alert(e);
      return;
    }

    const payWithGiftCardBtn = document.getElementById('pay-with-gift-card-btn');

    payWithGiftCardBtn.addEventListener('click', async function(){

      payWithGiftCardBtn.disabled = true;
      payWithGiftCardBtn.innerText = 'Processing...';

      try {
        const result = await giftCard.tokenize();
 
        if(result.status === 'OK'){
            const { token } = result;
            Livewire.emit('onPayment', token);
            payWithGiftCardBtn.disabled = false;
            payWithGiftCardBtn.innerText = 'Pay';
        }

      }catch(error){
        payWithGiftCardBtn.disabled = false;
        payWithGiftCardBtn.innerText = 'Pay';
      }

    });

  })

 
});


 

</script>

@endpush