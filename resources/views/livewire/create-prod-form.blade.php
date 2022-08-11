<div>
    {{-- Step 1 --}}
    <form wire:submit.prevent='createProd'>
    @if ($currentStep == 1)
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('color') }}</label>

            <div class="col-md-6">
                <input id="color" type="text" wire:model="color" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color') }}" required autocomplete="color">

                @error('color')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

            <div class="col-md-6">
                <input id="description" type="text" wire:model="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>

            <div class="col-md-6">
                <input id="price" type="number" wire:model="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>

            <div class="col-md-6">
                <input id="image" type="file" wire:model="p_image" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image">

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="qteStock" class="col-md-4 col-form-label text-md-right">{{ __('qteStock') }}</label>

            <div class="col-md-6">
                <input id="qteStock" type="number" wire:model="qteStock" class="form-control @error('qteStock') is-invalid @enderror" name="qteStock" value="{{ old('qteStock') }}" required autocomplete="qteStock">

                @error('qteStock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

    @endif
    {{-- Step 2 --}}

    @if ($currentStep == 2)

        step {{$currentStep}} (Details informations)
        <div class="row">
            <div class="form-group col-md-4">
                    <input id="photo" type="file" wire:model="photo.0" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autocomplete="photo">

                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group col-md-3">
                    <select class="form-control custom-select" id="size" name="size" wire:model="size.0">
                        <option value="" selected>Choose...</option>
                        @foreach ($sizes as $size)
                        <option value="{{$size->id}}">{{$size->taille}}</option>
                        @endforeach
                      </select>
                    @error('size')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group col-md-3">
                    <input id="qte" type="number" wire:model="qte.0" class="form-control @error('qte') is-invalid @enderror" name="qte" value="{{ old('qte') }}" required autocomplete="qte">

                    @error('qte')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror
            </div>
            <div class="form-group col-md-1" >
                <button type="button" class="btn" wire:click='addProdItem({{$i}})'>
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
            </div>
        </div>
            @foreach ($inputs as $key=>$value)
            <div class="row">
                <div class="form-group col-md-4">
                        <input id="photo" type="file" wire:model="photo.{{$value}}" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}" required autocomplete="photo">

                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group col-md-3">
                        <select class="form-control custom-select" id="size"  wire:model="size.{{$value}}">
                            <option value="" selected>Choose...</option>
                            @foreach ($sizes as $size)
                            <option value="{{$size->id}}">{{$size->taille}}</option>
                            @endforeach
                        </select>
                        @error('size')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group col-md-3">
                        <input  type="number" wire:model="qte.{{$value}}" class="form-control @error('qte') is-invalid @enderror"  value="{{ old('qte') }}" required autocomplete="qte">

                        @error('qte')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                        @enderror
                </div>
                <div class="form-group col-md-2" >
                    <button type="button" class="btn" wire:click='addProdItem({{$i}})'>
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            @endforeach
    @endif


    <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">
        @if ($currentStep==1)
            <div></div>
            <button type="button" class="btn btn-primary" wire:click="increaseStep()">Next</button>
        @endif

        @if ($currentStep==2)
            <button type="button" class="btn btn-secondary" wire:click="decreaseStep()">Back</button>
            <button type="submit" class="btn btn-success">Fenish</button>
        @endif

    </div>
</div>
</form>
