<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Contact Us</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('contacts.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="naam" class="col-md-4 col-form-label text-md-end">Voornaam</label>

                                <div class="col-md-6">
                                    <input id="naam" type="text"
                                        class="form-control @error('naam') is-invalid @enderror" name="naam"
                                        value="{{ old('naam') }}" required autofocus>

                                    @error('naam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bericht" class="col-md-4 col-form-label text-md-end">Bericht</label>

                                <div class="col-md-6">
                                    <textarea name="bericht" cols="30" rows="10"
                                        required>{{ old('bericht') }}</textarea>

                                    @error('bericht')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>





                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Indienen
                                    </button>


                                </div>
                            </div>
                        </form>

                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>