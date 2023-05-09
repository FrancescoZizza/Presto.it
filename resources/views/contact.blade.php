<x-layout>

    <div class="container mx-auto border-form h-100">
        <div class="row justify-content-center my-5 lavora-con-noi-row">
            <h4 class="text-center">{{__('messages.Diventa revisore')}}</h4>
            <div class="col-12 col-md-6">
                <form method="" action="{{route('become.revisor')}}">
                    <div class="mb-3">
                      <label class="form-label">{{__('messages.Nome e cognome')}}</label>
                      <input type="text" class="form-control" name="name">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">{{__('messages.Email address')}}</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('messages.Descrizione')}}</label>
                        <textarea type="text" class="form-control" name="description"></textarea>
                    </div>
                    <div class="text-center text-lg-end">
                        <button type="submit" class="btn btn-cta">{{__('messages.Candidati')}}</button>
                    </div>
                </form>
            </div>

            <div class="col-12 col-md-6 px-5 h-100 mt-5">


                <h6 class="pt-3">{{__('messages.L affidabilità del nostro servizio si basa sul contributo dei nostri revisori')}}.</h6>
                <hr class="linea-form">
                <p>{{__('messages.Compila il form a fianco con i tuoi dati e spiegaci perchè vuoi diventare un revisore di TornoPresto.it')}}</p>
                <p>{{__('messages.Riceverai una risposta il prima possibile')}}.</p>


            </div>
        </div>
    </div>
</x-layout>