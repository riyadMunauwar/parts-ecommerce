<div>
    @if($isPaymentModeOn)
    <x-ui.edit-modal class="max-w-xl">
        <div class="p-5 md:p-10 bg-white rounded-md">

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
            <x-ui.loading-spinner wire:loading.flex wire:target="selectedMethod, cancelPaymentMode, back" />
        </div>
    </x-ui.edit-modal>
    @endif
</div>


@push('scripts')

<script type="text/javascript" src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
<script type="text/javascript">

  const  appId = 'sandbox-sq0idb-Xrn3FKX2QWZItCtTVZjOXA';
  const  locationId = 'LWJFEZ7KD3AZE';

  async function initializeCard(payments) {
    const card = await payments.card();
    await card.attach('#card-container'); 
    return card; 
  }


  async function initializeGooglePay(payments, paymentRequestOptions){
    const googlePay = await payments.googlePay(paymentRequestOptions);
    await googlePay.attach('#google-pay-container'); 
    return googlePay;
  }

  async function initializeApplePay(payments, paymentRequestOptions){
    const applePay = await payments.applePay(paymentRequestOptions);
    return applePay;
  }

  async function initializeAchBankTransfer(payments){
    const ach = await payments.ach();
    return ach; 
  }

  async function initializeGiftCard(payments){
    const giftCard = await payments.giftCard();
    await giftCard.attach('#gift-card-container'); 
    return giftCard; 
  }



 document.addEventListener('DOMContentLoaded', async function () {

    if (!window.Square) {
      throw new Error('Square.js failed to load properly');
    }



    // Card Payment Process
    window.addEventListener('init:card', async function(){

      const payments = window.Square.payments(appId, locationId);
      
      let card;

      try {
        card = await initializeCard(payments);
      } catch (e) {
        console.error('Initializing Card failed', e);
        return;
      }

      const payWithCardBtn = document.getElementById('pay-with-card-btn');

      payWithCardBtn.addEventListener('click', async function(){

        payWithCardBtn.disabled = true;
        payWithCardBtn.innerText = 'Processing...';

        try {
          const result = await card.tokenize();
          
          if(result.status === 'OK'){
              const { token } = result;
              Livewire.emit('onPayment', token);
              payWithCardBtn.disabled = false;
              payWithCardBtn.innerText = 'Pay';
          }

        }catch(error){
          payWithCardBtn.disabled = false;
          payWithCardBtn.innerText = 'Pay';
        }

      });

    })



    // Ach Payment Process
    window.addEventListener('init:ach', async function(){

   
        const payments = window.Square.payments(appId, locationId);

        let ach;

        try {
          ach = await initializeAchBankTransfer(payments);
        } catch (e) {
          console.error('Initializing Card failed', e);
          return;
        }

        const payWithAchBtn = document.getElementById('pay-with-ach-btn');
     
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