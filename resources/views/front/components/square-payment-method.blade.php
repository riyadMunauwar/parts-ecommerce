<div>
    @if($isPaymentModeOn)
    <x-ui.edit-modal class="max-w-xl">
        <div class="p-5 md:p-10 bg-white rounded-md">

            <h5 class="text-xl font-bold dark:text-white">
                Pay
            </h5>

            <x-validation-errors class="mb-4" />

            <div class="grid grid-cols-1 gap-5 mt-5">



                <div id="card-container">

                </div>

                <div class="flex items-center justify-end">
                    <x-button wire:click.debounce="pay" type="button" class="ml-4">
                        {{ __('Payment') }}
                    </x-button>
                    <x-button wire:click.debounce="cancelPaymentMode" type="button" class="ml-4">
                        {{ __('Cancel') }}
                    </x-button>
                </div>
            </div>
            <x-ui.loading-spinner wire:loading.flex wire:target="cancelPaymentMode" />
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


  async function createPayment(token) {

    const body = JSON.stringify({
      locationId,
      sourceId: token,
    });

    const paymentResponse = await fetch('/payment', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body,
    });
    if (paymentResponse.ok) {
      return paymentResponse.json();
    }
    const errorBody = await paymentResponse.text();
    throw new Error(errorBody);
 }

 document.addEventListener('DOMContentLoaded', async function () {
  if (!window.Square) {
    throw new Error('Square.js failed to load properly');
  }

  const payments = window.Square.payments(appId, locationId);
  
  let card;
  try {
    card = await initializeCard(payments);
  } catch (e) {
    console.error('Initializing Card failed', e);
    return;
  }

  // Checkpoint 2.
  async function handlePaymentMethodSubmission(event, paymentMethod) {
    event.preventDefault();

    try {
      // disable the submit button as we await tokenization and make a
      // payment request.
      cardButton.disabled = true;
      const token = await tokenize(paymentMethod);
      const paymentResults = await createPayment(token);
      displayPaymentResults('SUCCESS');

      console.debug('Payment Success', paymentResults);
    } catch (e) {
      cardButton.disabled = false;
      displayPaymentResults('FAILURE');
      console.error(e.message);
    }
  }

  const cardButton = document.getElementById(
    'card-button'
  );
  cardButton.addEventListener('click', async function (event) {
    await handlePaymentMethodSubmission(event, card);
  });
});


 

</script>

@endpush