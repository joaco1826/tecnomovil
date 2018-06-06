@extends('layouts.master')
@section('title', 'Yellow Club - Editar Dirección')
@section('content')
    <div class="content">
        <div class="blog" style="background: #fff">
            <p style="color: #4d4d4d" class="blog__url"><a href="/">Home</a> / Editar Direcciones</p>
        </div>
    </div>
    <div class="main">
        <div class="content padding-bottom-3">
            <div class="account">
                @component('account', ['user' => 'img/account-28.png', 'cart' => 'img/account-31.png', 'active' => 'address'])
                @endcomponent
                <div class="account__right">
                    <h1>+Editar Dirección</h1>
                    <form id="address" data-abide novalidate>
                        <div class="account__right__form">
                            <div>
                                Descripción* <input class="caja" id="InputDescription" name="description" type="text" value="{{ $address->description }}" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputDescription">Por favor digite la descripción</span>
                            <div>
                                Contacto* <input class="caja" id="InputName" name="name" type="text" value="{{ $address->name }}" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputName">Por favor digite el nombre</span>
                            <div>
                                Dirección* <input class="caja" id="InputAddress" name="address" type="text" value="{{ $address->address }}" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputAddress">Por favor digite la dirección</span>
                            <div>
                                Barrio* <input class="caja" id="InputUrbanization" name="urbanization" type="text" value="{{ $address->urbanization }}" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputUrbanization">Por favor digite el barrio</span>
                            <div>
                                País* <select class="caja" id="country" name="country" required>
                                    <option value="">Seleccione</option>
                                    @foreach($country as $c)
                                        <option @if ($c->id == $address->country_id) selected @endif value="{{ $c->id }}">{{ $c->PaisNombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-error" data-form-error-for="country">Por favor seleccione el país</span>
                            <div>
                                Departamento* <select class="caja opciones_d" id="distric" name="distric" required>
                                    <option value="">Seleccione</option>
                                    @foreach(\App\Models\Distric::where('country_id', $address->country_id)->get() as $d)
                                        <option class="opciones_d" @if ($d->id == $address->distric_id) selected @endif value="{{ $d->id }}">{{ $d->DisNombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-error" data-form-error-for="distric">Por favor seleccione el departamento</span>
                            <div>
                                Ciudad* <select class="caja opciones_c" id="city" name="city" required>
                                    <option value="">Seleccione</option>
                                    @foreach(\App\Models\City::where('distric_id', $address->distric_id)->get() as $c)
                                        <option class="opciones_c" @if ($c->id == $address->city_id) selected @endif value="{{ $c->id }}">{{ $c->CiuNombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-error" data-form-error-for="city">Por favor seleccione la ciudad</span>
                            <div>
                                Celular* <input class="caja" id="InputCellphone" name="cellphone" type="text" value="{{ $address->cellphone }}" required/>
                            </div>
                            <span class="form-error" data-form-error-for="InputCellphone">Por favor digite algún celular</span>
                            <div>
                                Teléfono <input class="caja" name="phone" type="text" value="{{ $address->phone }}"/>
                            </div>
                            {{ csrf_field() }}
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="address_id" value="{{ $address->id }}">
                            <input type="submit" class="button-buy width-100 margin-top-1" value="Guardar" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>
@endsection
