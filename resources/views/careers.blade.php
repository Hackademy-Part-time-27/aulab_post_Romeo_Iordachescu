<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white ">
            <div class="row justify-content-center">
                <h1 class="display-1">Lavora con noi</h1>
            </div>
    </div>
    <div class="container my-5">
        <div class="row justify-conent-center align-items-center border rounded p-2 shadow">
            <div class="col-12 col-md-6">
                <h2>Lavora come amministratore</h2>
                <p>Scegliendo di lavorare come amministratore, ti occuperai di gestire le richieste di lavoro e di aggiungere e modificare le categorie!</p>
                <h2>Lavora come revisore</h2>
                <p>Scegliendo lavorare come revisore, deciderai se un articolo può essere pulicato e meno in piataforma!</p>
                <h2>Lavora come redattore</h2>
                <p>Scegliendo di lavorare come redattore, potrai scrivere gli articoli che saranno pubblicati!</p>
            </div>
            <div class="col-12 col-md-6">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form action="{{ route('careers.submit')}}" method="POST" class="p-5 shadow">
                    @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label">Per quale rolo ti stai candidando?</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Scegli qui il ruolo</option>
                                @if (!Auth::user()->is_admin)
                                    <option value="admin">Amministratore</option>
                                @endif
                                @if(!Auth::user()->is_revisor)
                                    <option value="revisor">Revisore</option>
                                @endif
                                @if(!Auth::user()->is_writer)
                                    <option value="writer">Redattore</option>
                                @endif
                        </select>
                    </div>
                    <div class="md-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') ?? 
                        Auth::user()->email }}">
                    </div>
                    <div class="md-3">
                        <label for="message" class="form-label">Parlaci di te</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control">{{ old('message') }}</textarea>
                    </div>
                    <div class="mt-2">
                       <button class="btn btn-info text-white">Invia la tua candidatura</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>